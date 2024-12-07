<?php

namespace App\Services;

use App\DTOs\ShippingLabel;
use Illuminate\Http\Client\PendingRequest;

class ShippingLabelService
{
    public function __construct(private PendingRequest $client) {}

    public function createShippingLabel(array $data): ShippingLabel
    {
        $response = $this->client->post('/companies/'.$data['company_id'].'/shipments', [
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
        ]);

        return ShippingLabel::createFromResponse($response);
    }
}
