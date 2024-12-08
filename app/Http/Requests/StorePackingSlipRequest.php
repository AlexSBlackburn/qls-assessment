<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackingSlipRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_id' => ['required', 'uuid'],
            'brand_id' => ['required', 'uuid'],
            'product_combination_id' => ['required', 'integer'],
            'name' => ['required'],
            'companyname' => ['required'],
            'street' => ['required'],
            'housenumber' => ['required'],
            'postalcode' => ['required'],
            'locality' => ['required'],
            'country' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'company_id.required' => 'Het bedrijf ID is verplicht.',
            'company_id.uuid' => 'Het bedrijf ID moet een UUID zijn.',
            'brand_id.required' => 'Het brand ID is verplicht.',
            'brand_id.uuid' => 'Het brand ID moet een UUID zijn.',
            'product_combination_id.required' => 'Het product combinatie ID is verplicht.',
            'product_combination_id.integer' => 'Het product combinatie ID moet een cijfer zijn.',
            'name.required' => 'De naam is verplicht.',
            'companyname.required' => 'Het bedrijfsnaam is verplicht.',
            'street.required' => 'De straatnaam is verplicht.',
            'housenumber.required' => 'Het huisnummer is verplicht.',
            'postalcode.required' => 'De postcode is verplicht.',
            'locality.required' => 'De regio is verplicht.',
            'country.required' => 'Het land is verplicht.',
        ];
    }
}
