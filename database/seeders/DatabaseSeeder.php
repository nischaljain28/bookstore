<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Books::factory()->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@bookstore.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@bookstore.com',
        ]);
    }
}
