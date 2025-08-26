<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use Illuminate\Support\Str;

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
            'id' => Str::uuid7(),
            'name' => 'Category Test',
            'slug' => 'category-test',
            'group' => 0,
            'icon' => 'credit-card'
        ]);

        $this->assertEquals('Category Test', $category->name);
        $this->assertEquals('category-test', $category->slug);
        $this->assertEquals(0, $category->group);
        $this->assertEquals('credit-card', $category->icon);
    }

    public function test_create_fake_through_category_model(): void
    {
        $category = Category::factory()->create();

        $this->assertNotEmpty($category->id);
        $this->assertNotEmpty($category->name);
        $this->assertNotEmpty($category->slug);
        $this->assertNotEmpty($category->group);
        $this->assertNotEmpty($category->icon);
        $this->assertNotEmpty($category->created_at);
    }
}
