<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_base_admin_access_exists(): void
    {
        $response = $this->get(route('admin.login'));
        $response->assertStatus(200);
    }
}
