<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Slug;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        foreach (Category::all() as $item){
//            Slug::create([
//                'reference_type' => Category::class,
//                'reference_id' => $item->id,
//            ]);
//        }
    }
}
