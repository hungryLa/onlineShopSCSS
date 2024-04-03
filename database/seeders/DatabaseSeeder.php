<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        Category::factory(10)->create();

        Shop::factory(10)->create();

        Product::factory(40)->create();

        CategoryProduct::factory(60)->create();

        $this->call(SlugSeeder::class);
    }
}
