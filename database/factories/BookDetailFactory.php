<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookDetail>
 */
class BookDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isbn' => $this->faker->isbn13(),
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'publication_year' => $this->faker->year(),
            'genre' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'copies_sold' => $this->faker->numberBetween(0, 1000)
        ];
    }
}
