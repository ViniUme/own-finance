<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_database_is_accessible(): void
    {
        $databaseName = DB::connection()->getDatabaseName();

        $this->assertNotNull($databaseName);
        $this->assertEquals(config('database.connections.mysql.database'), $databaseName);
    }

    public function test_users_table_is_up(): void
    {
        $this->assertTrue(Schema::hasTable('users'));
    }

    public function test_users_table_has_default_user(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->assertDatabaseHas('users', [
            'email' => 'admin@admin.com'
        ]);
    }

    public function test_payment_categories_table_is_up(): void
    {
        $this->assertTrue(Schema::hasTable('payment_categories'));
    }

    public function test_payment_types_table_is_up():void
    {
        $this->assertTrue(Schema::hasTable('payment_types'));
    }

    public function test_currencies_table_is_up(): void
    {
        $this->assertTrue(Schema::hasTable('currencies'));
    }

    public function test_accounts_table_is_up(): void
    {
        $this->assertTrue(Schema::hasTable('accounts'));
    }

    public function test_records_table_is_up(): void
    {
        $this->assertTrue(Schema::hasTable('records'));
    }
}
