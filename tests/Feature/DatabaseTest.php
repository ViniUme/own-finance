<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_database_is_accessible(): void
    {
        $databaseName = DB::connection()->getDatabaseName();

        $this->assertNotNull($databaseName);
        $this->assertEquals(env('DB_DATABASE'), $databaseName);
    }
}
