<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(),
            'category_id' => rand(1,3),
            'penulis' => fake()->name(),
            'penerbit' => fake()->company(),
            'tanggal_terbit' => fake()->date(),
            'cover' => null,
            'jumlah' => rand(1,10),
            'sinopsis' => fake()->paragraphs(2, true),
            'status' => Book::STATUSES['Available'],
        ];
    }
}
