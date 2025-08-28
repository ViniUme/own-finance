<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name()
        ];
    }

    public function withUser(): Factory
    {
        return $this->afterCreating(function (Role $role) {
            $user = User::factory()->create();
            $user->roles()->attach($role->id);
        });
    }
}
