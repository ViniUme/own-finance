<?php

namespace Tests\Feature\Models;

use App\Models\Account;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Movement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use Illuminate\Support\Str;

class MovementTest extends TestCase
{
    use RefreshDatabase;

    public function test_movements_table_exists(): void
    {
        $this->assertTrue(Schema::hasTable('movements'));
    }

    public function test_movements_model_exists(): void
    {
        $this->assertTrue(class_exists('App\Models\Movement'));
    }

    public function test_create_movement(): void
    {
        $id = Str::uuid7();
        $account = Account::factory()->create();
        $currency = Currency::factory()->create();
        $category = Category::factory()->create();
        $date = now();

        $movement = Movement::create([
            'id' => $id,
            'account_id' => $account->id,
            'currency_id' => $currency->id,
            'category_id' => $category->id,
            'amount' => 100,
            'type' => 'bank',
            'description' => 'Movement Test',
            'date' => $date,
            'previous_balance' => 50,
        ]);

        $this->assertNotEmpty($id, $movement->id);
        $this->assertNotEmpty($account->id, $movement->account_id);
        $this->assertNotEmpty($currency->id, $movement->currency_id);
        $this->assertNotEmpty($category->id, $movement->category_id);
        $this->assertNotEmpty(100, $movement->amount);
        $this->assertNotEmpty('bank', $movement->type);
        $this->assertNotEmpty('Movement Test', $movement->description);
        $this->assertNotEmpty($date, $movement->date);
        $this->assertNotEmpty(50, $movement->previous_balance);
    }
}
