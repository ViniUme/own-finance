<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use App\Models\Account;

class AccountTest extends TestCase
{
    public function test_accounts_table_exists(): void
    {
        $this->assertTrue(Schema::hasTable('accounts'));
    }

    public function test_account_model_exists(): void
    {
        $this->assertTrue(class_exists(Account::class));
    }
}
