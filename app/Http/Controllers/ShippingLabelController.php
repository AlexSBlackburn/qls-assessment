<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShippingLabelRequest;
use App\Services\ShippingLabelService;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ShippingLabelController
{
    public function __construct(
        private ShippingLabelService $shippingLabelService
    ) {}

    public function create(): View
    {
        return view('shipping-label', [
            'company_id' => config('services.qls.company.id'),
            'brand_id' => config('services.qls.brand.id'),
            'product_combination' => config('services.qls.product_combination'),
        ]);
    }

    public function store(StoreShippingLabelRequest $request): BinaryFileResponse
    {
        $shippingLabel = $this->shippingLabelService->createShippingLabel($request->validated());

        return response()->file($shippingLabel->pdf->path());
    }
}
