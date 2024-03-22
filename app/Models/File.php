<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class File extends Model
{
    protected $guarded = [];
    const TYPE = [
        'images' => 'images',
        'documents' => 'documents',
    ];

    const TYPES = [
        'product' => Product::TYPE,
        'feedback' => Feedback::TYPE,
    ];

    const MAX_FILES = [
        'images' => 4,
        'documents' => 1,
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    static function getPosition($modelType, $modelId, $fileType)
    {
        if(count(File::all()) != 0){
            $last_file = File::where([
                'model_type' => $modelType,
                'model_id' => $modelId,
                'type' => $fileType,
            ])->orderBy('position','desc')->first();

            if($last_file){
                $position = $last_file->position + 1;
            }else{
                $position = 1;
            }
        }else{
            $position = 1;
        }

        return $position;
    }
}
