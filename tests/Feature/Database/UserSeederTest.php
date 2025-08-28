<?php

namespace Tests\Feature\Database;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_seeder_exists(): void
    {
        $this->assertTrue(class_exists('Database/seeders/UserSeeder'));
    }
}
