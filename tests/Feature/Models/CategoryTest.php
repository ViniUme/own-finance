<?php

namespace Tests\Feature\Models;

use App\Models\Category;
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

    public function test_create_category(): void
    {
        $category = Category::create([
            'name' => 'Category Test',
            'slug' => 'category-test',
            'group' => 0,
            'icon' => 'credit-card'
        ]);

        $this->assertTrue('Category Test', $category->name);
        $this->assertTrue('category-test', $category->slug);
        $this->assertTrue(0, $category->group);
        $this->assertTrue('credit-card', $category->icon);
    }
}
