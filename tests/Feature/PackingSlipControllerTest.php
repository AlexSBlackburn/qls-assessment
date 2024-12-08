<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

it('shows a packing slip form', function () {
    $this
        ->get('/')
        ->assertOk()
        ->assertViewIs('create-packing-slip')
        ->assertViewHas([
            'company_id' => config('services.qls.company.id'),
            'brand_id' => config('services.qls.brand.id'),
            'product_combination' => config('services.qls.product_combination'),
        ]);
});

it('creates a packing slip', function () {
    Cache::flush();

    $companyId = fake()->uuid;
    $brandId = fake()->uuid;
    $companyName = fake()->company;
    $name = fake()->name;
    $street = fake()->streetName;
    $houseNumber = fake()->randomDigitNotZero();
    $postcode = fake()->postcode;
    $locality = fake()->city;
    $country = 'NL';
    $shippingLabelResponse = file_get_contents(base_path('tests/stubs/shipping-label.json'));

    Http::fake([
        '*/v2/companies/*/shipments' => Http::response(file_get_contents(base_path('tests/stubs/shipment.json'))),
        '*/v2/companies/*/shipments/*/labels/pdf' => Http::response($shippingLabelResponse),
    ]);

    $response = $this->post('/', [
        'company_id' => $companyId,
        'brand_id' => $brandId,
        'product_combination_id' => 3,
        'name' => $name,
        'companyname' => $companyName,
        'street' => $street,
        'housenumber' => $houseNumber,
        'postalcode' => $postcode,
        'locality' => $locality,
        'country' => $country,
    ]);

    Http::assertSent(fn (Request $request) => str($request->url())->endsWith('/v2/companies/'.$companyId.'/shipments') &&
        $request->method() === 'POST' &&
        $request['brand_id'] === $brandId &&
        $request['product_combination_id'] === 3 &&
        $request['receiver_contact'] === [
            'name' => $name,
            'companyname' => $companyName,
            'street' => $street,
            'housenumber' => $houseNumber,
            'postalcode' => $postcode,
            'locality' => $locality,
            'country' => $country,
        ]
    );
    Http::assertSent(fn (Request $request) => str($request->url())->contains('/v2/companies/9e606e6b-44a4-4a4e-a309-cc70ddd3a103/shipments/777bb11d-64e3-46b2-b726-a76fb66060d9/labels/pdf'));

    $response
        ->assertOk()
        ->assertHeader('Content-Type', 'application/pdf')
        ->assertHeader('Content-Disposition', 'inline; filename=document.pdf');

    Storage::assertExists('777bb11d-64e3-46b2-b726-a76fb66060d9.pdf');

    // Cleanup
    File::delete(Storage::path('777bb11d-64e3-46b2-b726-a76fb66060d9.pdf'));
})->only();
