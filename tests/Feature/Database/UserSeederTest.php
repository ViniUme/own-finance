<?php

namespace Tests\Feature\Database;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_seeder_exists(): void
    {
        $this->assertTrue(class_exists('Database\Seeders\UserSeeder'));
    }

    public function test_create_admin_user(): void
    {
        $this->seed(UserSeeder::class);

        $adminUser = User::where('email', 'admin@test.com')->first();

        $this->assertEquals('Admin', $adminUser->name);
        $this->assertEquals('admin@test.com', $adminUser->email);
    }
}
