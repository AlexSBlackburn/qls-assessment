<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

it('shows a shipping label form', function () {
    $this
        ->get('/')
        ->assertOk()
        ->assertViewIs('shipping-label')
        ->assertViewHas([
            'company_id' => config('services.qls.company.id'),
            'brand_id' => config('services.qls.brand.id'),
        ]);
});

it('creates a shipping label', function () {
    $companyId = fake()->uuid;
    $brandId = fake()->uuid;

    Http::fake();

    $this
        ->post('/', [
            'company_id' => $companyId,
            'brand_id' => $brandId,
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect();

    Http::assertSent(fn (Request $request) => str($request->url())->contains('/v2/companies/'.$companyId.'/shipments') && $request['brand_id'] = $brandId);
})->todo('implement API call to create a shipping label');
