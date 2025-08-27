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
            'type' => 'income',
            'description' => 'Movement Test',
            'date' => $date,
            'previous_balance' => 50,
        ]);

        $this->assertEquals($id, $movement->id);
        $this->assertEquals($account->id, $movement->account_id);
        $this->assertEquals($currency->id, $movement->currency_id);
        $this->assertEquals($category->id, $movement->category_id);
        $this->assertEquals(100, $movement->amount);
        $this->assertEquals('income', $movement->type);
        $this->assertEquals('Movement Test', $movement->description);
        $this->assertEquals($date, $movement->date);
        $this->assertEquals(50, $movement->previous_balance);
    }

    public function test_create_fake_through_movements_model(): void
    {
        $movement = Movement::factory()->create();

        $this->assertNotEmpty($movement->id);
        $this->assertNotEmpty($movement->account_id);
        $this->assertNotEmpty($movement->currency_id);
        $this->assertNotEmpty($movement->category_id);
        $this->assertNotEmpty($movement->amount);
        $this->assertNotEmpty($movement->type);
        $this->assertNotEmpty($movement->description);
        $this->assertNotEmpty($movement->date);
        $this->assertNotEmpty($movement->previous_balance);
        $this->assertNotEmpty($movement->created_at);
    }
}
