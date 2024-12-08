<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackingSlipRequest;
use App\Services\PackingSlipService;
use App\Services\ProductService;
use App\Services\ShipmentService;
use Illuminate\Http\Response;
use Illuminate\View\View;

final readonly class PackingSlipController
{
    public function __construct(
        private ShipmentService $shipmentService,
        private PackingSlipService $packingSlipService,
        private ProductService $productService,
    ) {}

    public function create(): View
    {
        return view('create-packing-slip', [
            'company_id' => config('services.qls.company.id'),
            'brand_id' => config('services.qls.brand.id'),
            'product_combinations' => $this->productService->getProductCombinationsByCompanyId(config('services.qls.company.id')),
        ]);
    }

    public function store(StorePackingSlipRequest $request): Response
    {
        $shipment = $this->shipmentService->createShipment($request->validated());
        $shippingLabel = $this->shipmentService->createShippingLabel($shipment);

        return $this->packingSlipService->createPackingSlip($shippingLabel)->stream();
    }
}
