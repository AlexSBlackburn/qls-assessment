<?php

namespace App\DTOs;

final readonly class ProductCombination
{
    public function __construct(
        public int $id,
        public string $name,
    )
    {
    }
}
