<?php

namespace Database\Factories;

use App\Http\Controllers\FileController;
use App\Models\File;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Slug;
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
        return [
            'shop_id' => Shop::inRandomOrder()->limit(1)->first()->id,
            'title' => $this->faker->text(50),
            'price' => random_int(1000, 5000),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Product $product){
            File::create([
                'model_type' => Product::class,
                'model_id' => $product->id,
                'type' => File::TYPE['images'],
                'position' => File::getPosition(Product::class,$product->id,File::TYPE['images']),
                'name' => $this->faker->title,
                'original_name' => $this->faker->title,
                'path' => $this->faker->imageUrl,
            ]);

            Slug::create([
                'reference_type' => Product::class,
                'reference_id' => $product->id,
            ]);
        });
    }
}
