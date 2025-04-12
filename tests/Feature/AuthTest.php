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

    public function test_redirect_to_login_if_not_authenticated():void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('admin.login'))->assertStatus(307);
    }

    public function test_login_without_email(): void
    {
        $response = $this->postJson(route('api.admin.login.auth'), [
            'email' => '',
            'password' => 'password'
        ]);

        $response->assertStatus(422);
    }

    public function test_login_without_password(): void
    {
        $response = $this->postJson(route('api.admin.login.auth'), [
            'email' => 'test@test.com',
            'password' => ''
        ]);

        $response->assertStatus(422);
    }

    public function test_login_with_undefined_email(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson(route('api.admin.login.auth'), [
            'email' => 'wrong.email@admin.com',
            'password' => 'password'
        ]);

        $response->assertStatus(401);
    }

    public function test_success_response_body(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson(route('api.admin.login.auth'), [
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
                'content',
                'timestamp'
            ]);
    }

    public function test_failure_response_body(): void
    {
        $response = $this->postJson(route('api.admin.login.auth'), [
            '_token' => csrf_token(),
            'email' => 'wrong.email@admin.com',
            'password' => 'password'
        ]);

        $response
            ->assertStatus(401)
            ->assertJson([
                'success' => false
            ])
            ->assertJsonStructure([
                'success',
                'request',
                'message',
                'status',
                'errors',
                'timestamp'
            ]);
    }

    public function test_logout_when_its_logged(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->postJson(route('api.admin.login.auth'), [
            '_token' => csrf_token(),
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $response = $this->get(route('admin.logout'));

        $response->assertRedirect(route('admin.login'))->assertStatus(307);
    }

    public function test_admin_user_is_admin(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->assertTrue(User::find(1)->isAdmin());
    }
}
