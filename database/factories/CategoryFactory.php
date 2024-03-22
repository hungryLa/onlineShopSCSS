<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Slug;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'parent_id' => null,
            'title' => $this->faker->text(15),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Category $category){

            $parent_category = Category::inRandomOrder()->limit(1)->first();

            if($parent_category->id != $category->id){
                $parent_id = $parent_category?->id;
                $category->update([
                    'parent_id' => $parent_id,
                ]);
            }

            Slug::create([
                'reference_type' => Category::class,
                'reference_id' => $category->id,
            ]);

        });
    }
}
