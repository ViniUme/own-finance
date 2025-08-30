<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'id' => Str::uuid7(),
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password')
        ]);

        $role = Role::create([
            'name' => 'Admin'
        ]);

        $user->roles()->attach($role->id);
    }
}
