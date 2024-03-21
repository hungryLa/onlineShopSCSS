<?php

namespace App\Filters;

class ShopFilter extends QueryFilter
{

    public function title($title = '')
    {
        return $this->builder
            ->where('title',  'LIKE', "%$title%");
    }

}
