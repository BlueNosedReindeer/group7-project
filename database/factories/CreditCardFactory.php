<?php

namespace Database\Factories;

use App\Models\CreditCard;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = CreditCard::class;

    public function definition()
    {
        return [
            'profile_id' => Profile::factory(),
            'cardholder_name' => $this->faker->name,
            'card_number' => $this->faker->creditCardNumber,
            'expiration_date' => $this->faker->date('Y-m','now'),
            'cvv' => $this->faker->numberBetween(100, 999)
        ];
    }
}
