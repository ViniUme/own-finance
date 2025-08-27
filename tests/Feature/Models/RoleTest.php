<?php

namespace Tests\Feature\Models;

use App\Models\Role;
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

    public function test_role_model_exists(): void
    {
        $this->assertTrue(class_exists('App\Models\Role'));
    }

    public function test_create_role(): void
    {
        $role = Role::create([
            'name' => 'Test Role'
        ]);

        $this->assertNotEmpty($role->id);
        $this->assertEquals('Test Role', $role->name);
        $this->assertNotEmpty($role->created_at);
    }
}
