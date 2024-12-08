<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackingSlipRequest;
use App\Services\PackingSlipService;
use App\Services\ShippingLabelService;
use Illuminate\Http\Response;
use Illuminate\View\View;

final readonly class PackingSlipController
{
    public function __construct(
        private ShippingLabelService $shippingLabelService,
        private PackingSlipService $packingSlipService,
    ) {}

    public function create(): View
    {
        return view('create-packing-slip', [
            'company_id' => config('services.qls.company.id'),
            'brand_id' => config('services.qls.brand.id'),
            'product_combination' => config('services.qls.product_combination'),
        ]);
    }

    public function store(StorePackingSlipRequest $request): Response
    {
        $shippingLabel = $this->shippingLabelService->createShippingLabel($request->validated());

        return $this->packingSlipService->createPackingSlip($shippingLabel)->stream();
    }
}
