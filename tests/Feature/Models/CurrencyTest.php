<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Currency;
use Illuminate\Support\Str;

class CurrencyTest extends TestCase
{
    use RefreshDatabase;

    public function test_currency_model_exists(): void
    {
        $this->assertTrue(class_exists(Currency::class));
    }

    public function test_create_currency(): void
    {
        $currency = Currency::create([
            'id' => Str::uuid7(),
            'code' => 'BRL',
            'name' => 'Real Brasileiro',
            'decimal_places' => 2
        ]);

        $this->assertInstanceOf(Currency::class, $currency);
        $this->assertNotEmpty($currency->id);
        $this->assertEquals('BRL', $currency->code);
        $this->assertEquals('Real Brasileiro', $currency->name);
        $this->assertEquals('2', $currency->decimal_places);
    }

    public function test_create_fake_through_currency_model(): void
    {
        $currency = Currency::factory()->create();

        $this->assertNotEmpty($currency->id);
        $this->assertNotEmpty($currency->code);
        $this->assertNotEmpty($currency->name);
        $this->assertNotEmpty($currency->decimal_places);
        $this->assertNotEmpty($currency->created_at);
    }
}
