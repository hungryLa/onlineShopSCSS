<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasFactory;
    const TYPE = 'shop';

    const MAX_FILES = [
        'images' => 6,
    ];

    protected $guarded = [
        'id'
    ];

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }

    public function images(): HasMany
    {
        return $this->hasMany(File::class, 'model_id')
            ->where('model_type', File::TYPES['product'])
            ->where('type', File::TYPE['images']);
    }

    public function products(): HasMany
    {
        return  $this->hasMany(Product::class);
    }
}
