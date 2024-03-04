<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    const TYPE = 'product';

    const MAX_FILES = [
        'images' => 30
    ];

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }

    public function files($type = null): HasMany
    {
        return $this->hasMany(File::class, 'model_id')
            ->where('model_type', File::TYPES['product'])->where('type', $type);
    }


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_products', 'product_id');

    }
}
