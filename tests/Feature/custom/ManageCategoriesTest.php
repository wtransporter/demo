<?php

namespace Tests\Feature\Custom;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageCategoriesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_see_categories()
    {
        $this->signIn();

        $response = $this->get('categories');

        $response->assertStatus(200);
    }

    /** @test */
    public function unauthenticated_user_can_not_see_categories()
    {
        $response = $this->get('categories');

        $response->assertRedirect('login');
    }

    /** @test */
    public function authenticated_user_may_delete_category()
    {
        $this->signIn();

        $category = Category::factory()->create();

        $this->delete('categories/' . $category->slug);

        $this->assertDatabaseMissing('categories', ['slug' => $category->slug]);
    }

    /** @test */
    public function unauthenticated_user_may_not_delete_category()
    {
        $category = Category::factory()->create();

        $this->delete('categories/' . $category->slug)
            ->assertRedirect('login');
    }

    /** @test */
    public function authenticated_user_may_see_category_edit_form()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $category = Category::factory()->create();

        $this->get("categories/$category->slug/edit")
            ->assertStatus(200);
    }

    /** @test */
    public function unauthenticated_user_may_not_see_category_edit_form()
    {
        $category = Category::factory()->create();

        $this->get("categories/$category->slug/edit")
            ->assertRedirect('login');
    }

    /** @test */
    public function unauthenticated_user_may_not_update_category()
    {
        $category = Category::factory()->create(['name' => 'New name']);

        $attributes = [
            'name' => 'Upaded name',
            'slug' => 'updated-name'
        ];

        $this->patch("categories/$category->slug", $attributes)
            ->assertRedirect('login');
    }

        /** @test */
    public function authenticated_user_may_update_category()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $category = Category::factory()->create(['name' => 'New name']);

        $attributes = [
            'name' => 'Upaded name',
            'slug' => 'updated-name'
        ];

        $this->patch("categories/$category->slug", $attributes);

        $this->assertDatabaseHas('categories', $attributes);

        $this->get("categories/" . $category->fresh()->slug . "/edit")->assertOk();
    }
}