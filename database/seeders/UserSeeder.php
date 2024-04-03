<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
