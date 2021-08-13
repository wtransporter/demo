<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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

}