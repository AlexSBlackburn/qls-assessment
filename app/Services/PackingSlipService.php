<?php

namespace App\Services;

use App\DTOs\ShippingLabel;

class PackingSlipService
{
    public function createPackingSlip(ShippingLabel $shippingLabel): void
    {
        dd($shippingLabel->pdf);
        // @ToDo:
        // - Read shipping label PDF contents into image
        // - Combine shipping label image with order info
        // - Return packing slip PDF
    }
}
