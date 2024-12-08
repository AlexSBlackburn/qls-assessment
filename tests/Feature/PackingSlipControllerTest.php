<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

it('shows a packing slip form', function () {
    $this
        ->get('/')
        ->assertOk()
        ->assertViewIs('create-packing-slip')
        ->assertViewHas([
            'company_id' => config('services.qls.company.id'),
            'brand_id' => config('services.qls.brand.id'),
        ]);
});

it('creates a packing slip', function () {
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
