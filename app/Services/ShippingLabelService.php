<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ShippingLabelService
{
    public function __construct(private PendingRequest $client) {}

    public function createShippingLabel(array $data): File
    {
        // Create new shipment
        // Don't spam the API while testing
        $shipment = Cache::remember(
            key: __METHOD__.$data['company_id'],
            ttl: now()->addDay(),
            callback: fn () => $this->client->post('/'.$data['company_id'].'/shipments', [
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
            ])->json('data'));

        abort_if(
            boolean: empty($shipment['label_pdf_url']),
            code: 404,
            message: 'Shipping label not found in API response.'
        );

        // Fetch shipping label PDF
        $pdf = Cache::remember(
            key: __METHOD__.$shipment['label_pdf_url'],
            ttl: now()->addDay(),
            callback: fn () => $this->client->get(str($shipment['label_pdf_url'])->remove(config('services.qls.api.url')))->json('data')
        );

        // Store PDF locally
        Storage::put($shipment['id'].'.pdf', base64_decode($pdf));

        return new File(Storage::path($shipment['id'].'.pdf'));
    }
}
