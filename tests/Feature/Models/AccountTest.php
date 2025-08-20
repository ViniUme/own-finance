<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;

class AccountTest extends TestCase
{
    public function test_accounts_table_exists(): void
    {
        $this->assertTrue(Schema::hasTable('accounts'));
    }
}
