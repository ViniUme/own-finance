<?php

namespace Tests\Feature\Models;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MovementsTest extends TestCase
{
    public function test_movements_table_exists(): void
    {
        $this->assertTrue(Schema::hasTable('movements'));
    }
}
