<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(2)->sequence(
            [
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('admin123')
            ],
            [
                'name' => 'Test',
                'email' => 'test@test.com',
                'password' => Hash::make('test123')
            ]
        )->create();
    }
}
