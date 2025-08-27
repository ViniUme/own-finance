<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->name();

        return [
            'id' => Str::uuid7(),
            'name' => $name,
            'slug' => Str::slug($name),
            'group' => fake()->randomDigitNot(0),
            'icon' => fake()->word() . '-' . fake()->word()
        ];
    }
}
