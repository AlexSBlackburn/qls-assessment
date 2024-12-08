<?php

namespace App\DTOs;

use Illuminate\Http\Client\Response;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

readonly class ShippingLabel
{
    public function __construct(
        public File $pdf,
    ) {}

    public static function createFromResponse(Response $response): ShippingLabel
    {
        dd($response->json());
        $fileName = $response['data']['id'].'.pdf';
        Storage::put($fileName, file_get_contents($response['data']['label_pdf_url']));

        return new self(pdf: new File(Storage::get($fileName)));
    }
}
