<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    static function model($name_table){
        $model = '\App\Models\\'.\ucfirst(\Illuminate\Support\Str::singular($name_table));
        $model = new $model();
        return $model;
    }
}
