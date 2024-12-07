<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;

class ShippingLabelService
{
    public function __construct(private PendingRequest $client) {}

    public function createShippingLabel(string $companyId)
    {
        $this->client->post('/companies/'.$companyId.'/shipments');
    }
}
