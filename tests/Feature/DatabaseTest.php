<?php

namespace Tests\Feature;

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
        $this->assertEquals(env('DB_DATABASE'), $databaseName);
    }

    public function test_users_table_is_up(): void
    {
        dump(Schema::hasTable('users'));
        $this->assertTrue(Schema::hasTable('users'));
    }
}
