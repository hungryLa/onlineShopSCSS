<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    const TYPE = 'product';

    const MAX_FILES = [
        'images' => 6
    ];

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }
    public function files(): MorphMany
    {
        return $this->morphMany(File::class,'model');
    }
    public function images(): MorphMany
    {
        return $this->morphMany(File::class,'model')
            ->where('type', File::TYPE['images']);
    }


    public function cover(): HasMany
    {
        return $this->hasMany(File::class, 'model_id')
            ->where('model_type', File::TYPES['product'])
            ->where('type', File::TYPE['images'])
            ->orderBy('id')
            ->first();
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_products', 'product_id');
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }
}
