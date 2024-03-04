<?php

namespace App\Filters;

class ProductFilter extends QueryFilter
{

    public function title($title = '')
    {
        return $this->builder
            ->where('title',  'LIKE', "%$title%");
    }

    public function price_start($priceStart = null)
    {
        return $this->builder
            ->where('price', '>=', $priceStart);
    }

    public function price_end($priceEnd = null)
    {
        return $this->builder
            ->where('price', '<=', $priceEnd);
    }

    public function categories($categories_id = [])
    {
        return $this->builder->whereHas('categories', function ($query) use ($categories_id) {
            $query->whereIn('categories.id', $categories_id);
        });

    }
}
