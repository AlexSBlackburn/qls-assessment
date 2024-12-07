<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShippingLabelRequest;
use App\Services\ShippingLabelService;
use Illuminate\View\View;

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
        ]);
    }

    public function store(StoreShippingLabelRequest $request)
    {
        $this->shippingLabelService->createShippingLabel($request->validated());

        $request->dd();
    }
}
