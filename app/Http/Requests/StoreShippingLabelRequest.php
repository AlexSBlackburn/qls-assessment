<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShippingLabelRequest extends FormRequest
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
}
