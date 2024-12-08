<?php

namespace App\DTOs;

readonly class Shipment
{
    public function __construct(
        public string $id,
        public string $labelPdfUrl,
    ) {}
}
