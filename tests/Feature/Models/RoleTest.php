<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_roles_table_exists(): void
    {
        $this->assertTrue(Schema::hasTable('roles'));
    }
}
