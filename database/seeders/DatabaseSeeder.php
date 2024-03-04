<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\CategoryProduct;
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
        Product::factory(40)->create();
        CategoryProduct::factory(60)->create();
    }
}
