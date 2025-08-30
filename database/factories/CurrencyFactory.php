<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid7(),
            'code' => fake()->unique()->currencyCode(),
            'name' => fake()->name(),
            'decimal_places' => fake()->randomElement([1, 2, 3, 4])
        ];
    }
}
