<?php

namespace Tests\Feature\Routes;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ApiRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_authentication_route_exists(): void
    {
        $routeExists = Route::has('api.login.auth');
        $this->assertTrue($routeExists);
    }

    public function test_error_when_request_authentication_without_data(): void
    {
        $authRoute = route('api.login.auth');
        $response = $this->postJson($authRoute);

        $response->assertUnprocessable();
    }

    public function test_error_when_send_wrong_email_format(): void
    {
        $authRoute = route('api.login.auth');
        $data = [
            'email' => 'teste',
            'password' => 'password'
        ];
        $response = $this->postJson($authRoute, $data);

        $response->assertUnprocessable();
    }

    public function test_generate_bearer_token_when_login(): void
    {
        $authRoute = route('api.login.auth');
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);
        $data = [
            'email' => $user->email,
            'password' => 'password'
        ];
        $response = $this->postJson($authRoute, $data);

        $response->assertSuccessful();
        $response->assertJson([
            'message' => 'Success login',
            'token_type' => 'Bearer'
        ]);
        $this->assertNotEmpty($response['access_token']);
    }
}
