<?php

namespace App\Services;

use App\DTOs\ProductCombination;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;

final readonly class ProductService
{
    public function __construct(private PendingRequest $client) {}

    public function getProductCombinationsByCompanyId(string $companyId, int $productId = 2): Collection
    {
        $dhlPacketProduct = $this->client->get('/companies/'.$companyId.'/products')
            ->collect('data')
            ->first(fn (array $product) => $product['id'] === $productId); // DHL Packet product, hardcoded for demo purposes

        return collect($dhlPacketProduct['combinations'])
            ->map(fn (array $combination) => new ProductCombination(
                id: $combination['id'],
                name: $combination['name'],
            ));
    }
}
