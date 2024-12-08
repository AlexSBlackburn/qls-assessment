<?php

namespace App\Services;

use App\DTOs\Shipment;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

final readonly class ShipmentService
{
    public function __construct(private PendingRequest $client) {}

    public function createShipment(array $data): Shipment
    {
        $shipment = $this->client->post('/v2/companies/'.$data['company_id'].'/shipments', [
            'product_combination_id' => $data['product_combination_id'],
            'brand_id' => $data['brand_id'],
            'receiver_contact' => [
                'name' => $data['name'],
                'companyname' => $data['companyname'],
                'street' => $data['street'],
                'housenumber' => $data['housenumber'],
                'postalcode' => $data['postalcode'],
                'locality' => $data['locality'],
                'country' => $data['country'],
            ],
        ])->json('data');

        abort_if(
            boolean: empty($shipment['label_pdf_url']),
            code: 404,
            message: 'Shipping label not found in API response.'
        );

        return new Shipment(
            id: $shipment['id'],
            labelPdfUrl: $shipment['label_pdf_url']
        );
    }

    /**
     * Create a shipping label for a shipment.
     *
     * Fetches the shipping label PDF from the API and stores it locally.
     */
    public function createShippingLabel(Shipment $shipment): File
    {
        $pdf = $this->client->get(
            // Remove API base URL from PDF request URL, this is already set in the service provider
            str($shipment->labelPdfUrl)->remove(config('services.qls.api.url'))
        )->json('data');

        Storage::put($shipment->id.'.pdf', base64_decode($pdf));

        return new File(Storage::path($shipment->id.'.pdf'));
    }
}
