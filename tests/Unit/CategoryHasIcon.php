<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Icon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryHasIcon extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function recipe_has_icon_assigned()
    {
        $icon = Icon::factory()->create();

        $category = Category::factory()->create(['icon_id' => $icon->id]);

        $this->assertEquals(1, $category->icon->count());
    }
}
