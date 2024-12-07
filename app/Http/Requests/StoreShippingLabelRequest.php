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
        ];
    }
}
