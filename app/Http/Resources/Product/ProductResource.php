<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\File\FileResource;
use App\Http\Resources\Shop\ForProductShopResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'price' => $this->price,
            'shop' => new ForProductShopResource($this->whenLoaded('shop')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'images' => FileResource::collection($this->whenLoaded('images')),
        ];
    }
}
