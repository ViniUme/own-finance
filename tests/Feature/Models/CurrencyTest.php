<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Currency;

class CurrencyTest extends TestCase
{
    public function test_currency_model_exists(): void
    {
        $this->assertTrue(class_exists(Currency::class));
    }
}
