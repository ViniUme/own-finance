<?php

namespace Tests\Feature\Routes;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ApiRoutesTest extends TestCase
{
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
}
