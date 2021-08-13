<?php

namespace Tests\Feature;

use App\Models\Ingredient;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ManageIngredientsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_users_may_see_admin_ingredients()
    {
        $this->signIn();

        $post = Post::factory()->create();

        $this->get("posts/$post->id/ingredients")
            ->assertOk();
    }

    /** @test */
    public function unauthenticated_users_may_not_access_admin_ingredients()
    {
        $post = Post::factory()->create();

        $this->get("posts/$post->id/ingredients")
            ->assertRedirect('login');
    }

    /** @test */
    public function authenticated_users_may_update_ingredients()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $post = Post::factory()->create();
        $ingredient1 = Ingredient::create([
            'post_id' => $post->id,
            'description' => 'Initial description'
        ]);

        $attributes = [
            'post_id' => $post->id,
            'description' => 'Updated'
        ];

        $response = $this->patch("posts/$post->id/ingredients/$ingredient1->id", $attributes);

        $this->assertDatabaseHas('ingredients', $attributes);

        $response->assertRedirect("posts/$post->id/ingredients")->assertStatus(302);
    }

}