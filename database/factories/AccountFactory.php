<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AccountFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Str::uuid7(),
            'user_id' => User::factory()->create()->id,
            'currency_id' => Currency::factory()->create()->id,
            'name' => fake()->name(),
            'type' => fake()->randomElement(['wallet', 'bank', 'investment']),
            'color_hex' => fake()->regexify('[a-z0-9]{6}'),
            'current_balance' => fake()->randomNumber(6, false)
        ];
    }
}
