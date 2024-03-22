<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Product\ForCategoryProductResource;
use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'slug' => $this?->slug?->key,
            'products' => ForCategoryProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
