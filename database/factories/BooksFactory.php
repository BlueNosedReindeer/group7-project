<?php

namespace Database\Factories;

use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Genre = $this->faker->randomElement(['Fiction', 'Non-fiction','Narrative', 'Mystery', 'Thriller']);
        $Publisher = $this->faker->randomElement(['Publisher A', 'Publisher B','Publisher C','Publisher D','Publisher E','Publisher F','Publisher G',]);

        return [
            'Title' => $this->faker->sentence,
            'Author' => $this->faker->name,
            'Genre' => $Genre,
            'Publisher' => $Publisher,
            'Price' => $this->faker->numberBetween(20,100),
            'Rating' => $this->faker->numberBetween(1,5),
            'Number Sold' => $this->faker->numberBetween(100, 5000),
            
        ];
    }
}
