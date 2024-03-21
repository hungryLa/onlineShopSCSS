<?php

namespace App\Http\Resources\Shop;

use App\Http\Resources\Product\ForShopProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'products' => ForShopProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
