<?php

namespace Tests\Feature\Models;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_category_table_exists(): void
    {
        $this->assertTrue(Schema::hasTable('categories'));
    }
}
