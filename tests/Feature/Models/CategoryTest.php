<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_table_exists(): void
    {
        $this->assertTrue(Schema::hasTable('categories'));
    }

    public function test_category_model_exists(): void
    {
        $this->assertTrue(class_exists('App\Models\Category'));
    }
}
