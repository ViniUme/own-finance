<?php

namespace Tests\Feature\Routes;

use Tests\TestCase;

class WebRoutesTest extends TestCase
{
    public function test_home_route_needs_auth(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }
}
