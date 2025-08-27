<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Category;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MovementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Str::uuid7(),
            'account_id' => Account::factory()->create()->id,
            'currency_id' => Currency::factory()->create()->id,
            'category_id' => Category::factory()->create()->id,
            'amount' => fake()->randomNumber(9),
            'type' => fake()->randomElement(['income', 'expense', 'transfer']),
            'description' => fake()->sentence(),
            'date' => fake()->date(),
            'previous_balance' => fake()->randomNumber(9)
        ];
    }
}
