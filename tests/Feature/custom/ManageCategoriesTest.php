<?php

namespace Tests\Feature\Custom;

use Tests\TestCase;
use App\Models\Icon;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    /** @test */
    public function category_slug_must_be_unique()
    {
        $this->signIn();

        $firstCategory = Category::factory()->create(['slug' => 'updated-name']);
        $this->assertDatabaseHas('categories', ['slug' => $firstCategory->slug]);

        $category = Category::factory()->create(['name' => 'New name']);

        $attributes = [
            'name' => 'Upaded name',
            'slug' => 'updated-name'
        ];

        $this->patch("categories/$category->slug", $attributes)
            ->assertSessionHasErrors('slug');
    }

    /** @test */
    public function category_icon_is_required()
    {
        $this->signIn();

        $icon = Icon::factory()->create();

        $attributes = [
            'name' => 'First category',
            'slug' => 'first-category'
        ];

        $this->post("categories", $attributes)
            ->assertSessionHasErrors('icon_id');
    }

    /** @test */
    public function icon_must_exist_in_icons_table_when_assigning_to_a_category()
    {
        $this->signIn();
        Icon::factory()->create(['id' => 1]);

        $attributes = [
            'name' => 'First category',
            'slug' => 'first-category',
            'icon_id' => 2
        ];

        $this->post("categories", $attributes)
            ->assertSessionHasErrors('icon_id');
    }

    /** @test */
    public function authenticated_user_may_see_create_new_category_form()
    {
        $this->signIn();

        $this->get('categories/create')->assertOk();
    }

    /** @test */
    public function unauthenticated_user_may_not_see_create_new_category_form()
    {
        $this->get('categories/create')->assertRedirect('login');
    }

    /** @test */
    public function authenticated_user_may_store_new_category()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $icon = Icon::factory()->create();

        $attributes = [
            'name' => 'Category name',
            'slug' => 'category-name',
            'icon_id' => $icon->id
        ];

        $this->post('categories', $attributes)->assertRedirect(route('categories.create'));

        $this->assertDatabaseHas('categories', $attributes);
    }

    /** @test */
    public function unauthenticated_user_may_not_store_new_category()
    {
        $attributes = [
            'name' => 'Category name',
            'slug' => 'category-name'
        ];

        $this->post('categories', $attributes)->assertRedirect('login');
    }
}