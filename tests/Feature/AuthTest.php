<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\ParallelTesting;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_base_admin_access_exists(): void
    {
        $response = $this->get(route('admin.login'));
        $response->assertStatus(200);
    }

    public function test_abort_if_not_authenticated():void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertStatus(401);
    }

    public function test_login_without_email(): void
    {
        $response = $this->postJson(route('admin.login.auth'), [
            'email' => '',
            'password' => 'password'
        ]);

        $response->assertStatus(422);
    }

    public function test_login_without_password(): void
    {
        $response = $this->postJson(route('admin.login.auth'), [
            'email' => 'test@test.com',
            'password' => ''
        ]);

        $response->assertStatus(422);
    }

    public function test_login_with_undefined_email(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson(route('admin.login.auth'), [
            'email' => 'wrong.email@admin.com',
            'password' => 'password'
        ]);

        $response->assertStatus(401);
    }

    public function test_success_response_body(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson(route('admin.login.auth'), [
            '_token' => csrf_token(),
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ])
            ->assertJsonStructure([
                'success',
                'request',
                'message',
                'status',
                'content'
            ]);
    }
}
