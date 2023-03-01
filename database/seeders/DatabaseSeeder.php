<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;
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
        Book::factory(10)->create();
        Category::factory(3)->create();
        User::create([
            'role' => User::ROLES['Admin'],
            'username' => 'admin',
            'password' => Hash::make('password'),
            'name' => 'admin',
            'address' => fake()->address()
        ]);
        User::create([
            'role' => User::ROLES['Admin'],
            'username' => 'adminjava',
            'password' => 'password',
            'name' => 'admin',
            'address' => fake()->address()
        ]);
        User::create([
            'role' => User::ROLES['Librarian'],
            'username' => 'librarian',
            'password' => Hash::make('password'),
            'name' => 'librarian',
            'address' => fake()->address()
        ]);
        User::create([
            'role' => User::ROLES['Member'],
            'username' => 'member',
            'password' => Hash::make('password'),
            'name' => 'member',
            'address' => fake()->address()
        ]);

    }
}
