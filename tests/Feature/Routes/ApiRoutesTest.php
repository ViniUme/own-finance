<?php

namespace Tests\Feature\Routes;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ApiRoutesTest extends TestCase
{
    public function test_login_authentication_route_exists(): void
    {
        $routeExists = Route::has('api.login.authentication');
        $this->assertTrue($routeExists);
    }
}
