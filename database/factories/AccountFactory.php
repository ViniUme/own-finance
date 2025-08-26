<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(),
            'currency_id' => Currency::factory()->create(),
            'name' => fake()->name(),
            'type' => fake()->randomElement(['wallet', 'bank', 'investment']),
            'color_hex' => fake()->regexify('[a-z0-9]{6}'),
            'current_balance' => fake()->randomNumber(10, false)
        ];
    }
}
