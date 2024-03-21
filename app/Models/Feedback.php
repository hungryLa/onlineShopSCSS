<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feedback extends Model
{
    use HasFactory;

    const TYPE = 'feedback';

    const MAX_FILES = [
        'images' => 6,
    ];

    public function images(): HasMany
    {
        return $this->hasMany(File::class, 'model_id')
            ->where('model_type', File::TYPES['product'])
            ->where('type', File::TYPE['images']);
    }

}
