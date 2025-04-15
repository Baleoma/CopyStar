<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Roles;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Roles::factory()->createMany([
            ['name' => 'admin'],
            ['name' => 'client'],
        ]);


        User::factory()->create([
            'name' => 'admin',
            'surname' => 'admin',
            'patronymic' => 'admin',
            'login' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin11',
            'role_id' => 1,
        ]);

        User::factory(10)->create();
        Categories::factory(10)->create();
        Products::factory(10)->create();
    }
}
