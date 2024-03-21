<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Shop;
use App\Models\Shop1;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\File;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
         User::factory()->create([
             'role_id' => User::ROLES['super_admin'],
             'name' => 'Admin',
             'email' => 'admin@mail.ru',
             'password' => Hash::make('password') ,
         ]);

        User::factory()->create([
            'role_id' => User::ROLES['user'],
            'name' => 'User',
            'email' => 'user@mail.ru',
            'password' => Hash::make('password') ,
        ]);

        Category::factory(10)->create();

        Shop::factory(10)->create();

        Product::factory(40)->afterCreating(function (Product $product){
            File::create([
                'model_type' => File::TYPES['product'],
                'model_id' => $product->id,
                'type' => File::TYPE['images'],
                'position' => File::getPosition(File::TYPES['product'],$product->id,File::TYPE['images']),
                'name' => 'g',
                'original_name' => 'ggg',
                'path' => 'https://img.freepik.com/free-photo/forest-landscape_71767-127.jpg?w=996&t=st=1710849095~exp=1710849695~hmac=b4f53e07c79440dee86118d1d5cf38b8b612b604b2140bd9ef4b9f47324a99a2',
            ]);
        })->create();
        CategoryProduct::factory(60)->create();
    }
}
