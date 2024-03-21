<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    const TYPES = [
        'clothes' => 'clothes',
    ];

    public function getCustomSlugAttribute()
    {
        $mas = collect();
        $title = 'custom slug';
//        $model = $this;
//        while ($model->getParent() != null){
//            $mas->prepend($model->title);
//            $model = $model->getParent();
//        }
//
//        foreach ( $mas as $element){
//            $title =+ $element.' ';
//        }

        return $title;
    }

    public function getParent()
    {
        return Product::find($this->parent_id);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'CustomSlug',
            ]
        ];
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'category_products',
            'category_id'
        );
    }
}
