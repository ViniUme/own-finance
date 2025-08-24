<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use App\Models\Account;
use App\Models\Currency;
use App\Models\User;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_accounts_table_exists(): void
    {
        $this->assertTrue(Schema::hasTable('accounts'));
    }

    public function test_account_model_exists(): void
    {
        $this->assertTrue(class_exists(Account::class));
    }

    public function test_create_account(): void
    {
        $user = User::factory()->create();
        $currency = Currency::create([
            'code' => 'BRL',
            'name' => 'Real Brasileiro',
            'decimal_places' => 2
        ]);

        $account = Account::create([
            'user_id' => $user->id,
            'currency_id' => $currency->id,
            'name' => 'Account Test',
            'type' => 'bank'
        ]);
        $this->assertEquals($user->id, $account->user_id);
        $this->assertEquals($currency->id, $account->currency_id);
        $this->assertEquals('Account Test', $account);
        $this->assertEquals('bank', $account->type);
    }
}
