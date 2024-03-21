<?php

namespace Database\Factories;

use App\Models\Category;
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
        $category = Category::inRandomOrder()->limit(1)->first();
        $parent_id = $category?->id;
        return [
            'parent_id' => $parent_id,
            'type' => $this->faker->randomElement(Category::TYPES),
            'title' => $this->faker->text(15),
        ];
    }
}
