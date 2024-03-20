<?php

namespace Database\Factories;

use App\Http\Controllers\FileController;
use App\Models\File;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

//        $product = Product::create([
//            'title' => $this->faker->text(50),
//            'price' => random_int(1000, 5000),
//        ]);
//
//        File::create([
//            'model_type' => File::TYPES['product'],
//            'model_id' => $product->id,
//            'type' => File::TYPE['images'],
//            'position' => File::getPosition(File::TYPES['product'],$product->id,File::TYPE['images']),
//            'name' => $this->faker->title,
//            'original_name' => $this->faker->title,
//            'path' => $this->faker->imageUrl,
//        ]);

        return [
            'title' => $this->faker->text(50),
            'price' => random_int(1000, 5000),
        ];
    }
}
