<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Slug extends Model
{
    use Sluggable;

    protected $guarded = [
        'id', 'created_at','updated_at'
    ];

    public function sluggable(): array
    {
        return [
            'key' => [
                'source' => 'CustomSlug',
            ]
        ];
    }

    public function getCustomSlugAttribute()
    {
        return $this->reference->title;
    }

    public function reference(): MorphTo
    {
        return $this->morphTo();
    }
}
