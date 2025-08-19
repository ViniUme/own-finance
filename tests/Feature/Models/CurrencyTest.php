<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Currency;

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
            'code' => 'BRL',
            'name' => 'Real Brasileiro',
            'decimal_places' => '2',
        ]);

        $this->assertInstanceOf(Currency::class, $currency);
        $this->assertEquals('BRL', $currency->code);
        $this->assertEquals('Real Brasileiro', $currency->name);
        $this->assertEquals('2', $currency->decimal_places);
    }
}
