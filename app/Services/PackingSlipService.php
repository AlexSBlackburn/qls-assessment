<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf as DomPdf;
use Illuminate\Http\File;
use Illuminate\Support\Facades\File as Filesystem;
use Spatie\PdfToImage\Pdf;

final class PackingSlipService
{
    private array $order = [
        'number' => '#958201',
        'billing_address' => [
            'companyname' => null,
            'name' => 'John Doe',
            'street' => 'Daltonstraat',
            'housenumber' => '65',
            'address_line_2' => '',
            'zipcode' => '3316GD',
            'city' => 'Dordrecht',
            'country' => 'NL',
            'email' => 'email@example.com',
            'phone' => '0101234567',
        ],
        'delivery_address' => [
            'companyname' => '',
            'name' => 'John Doe',
            'street' => 'Daltonstraat',
            'housenumber' => '65',
            'address_line_2' => '',
            'zipcode' => '3316GD',
            'city' => 'Dordrecht',
            'country' => 'NL',
        ],
        'order_lines' => [
            [
                'amount_ordered' => 2,
                'name' => 'Jeans - Black - 36',
                'sku' => 69205,
                'ean' => '8710552295268',
            ],
            [
                'amount_ordered' => 1,
                'name' => 'Sjaal - Rood Oranje',
                'sku' => 25920,
                'ean' => '3059943009097',
            ],
        ],
    ];

    /**
     * Convert shipping label PDF to image and combine with order information to create packing slip PDF.
     */
    public function createPackingSlip(File $shippingLabel): \Barryvdh\DomPDF\PDF
    {
        $shippingLabelImagePath = new Pdf($shippingLabel->path())->save(str($shippingLabel->path())->replace('.pdf', '.jpg'));

        $packingSlip = DomPdf::loadView('pdfs/packing-slip', [
            'shipping_label' => $shippingLabelImagePath[0],
            'order' => $this->order,
        ])
            ->setPaper('a4', 'landscape')
            ->save($shippingLabel->path());

        Filesystem::delete($shippingLabelImagePath);

        return $packingSlip;
    }
}
