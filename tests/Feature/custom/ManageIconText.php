<?php

namespace Tests\Feature;

use App\Models\Icon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageIconText extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function auhenticated_user_may_see_list_of_icons()
    {
        $this->signIn();
        $this->get('/icons')->assertStatus(200);
    }

    /** @test */
    public function unauhenticated_user_may_not_see_list_of_icons()
    {
        $this->get('/icons')->assertRedirect('login');
    }

    /** @test */
    public function authenticated_user_may_create_icon()
    {
        $this->signIn();

        $attributes = [
            'body' => 'fa fa-icon'
        ];

        $this->post('icons', $attributes);

        $this->assertDatabaseHas('icons', $attributes);
    }

    /** @test */
    public function unauthenticated_user_may_not_create_icon()
    {
        $attributes = [
            'body' => 'fa fa-icon'
        ];

        $this->post('icons', $attributes)->assertRedirect('login');
    }

    /** @test */
    public function unauthenticated_user_may_not_delete_icon()
    {
        $icon = Icon::create([
            'body' => 'fa fa-icon'
        ]);

        $response = $this->delete("icons/$icon->id");

        $this->assertDatabaseHas('icons', ['id' => $icon->id]);

        $response->assertRedirect('login');
    }

    /** @test */
    public function authenticated_user_may_delete_icon()
    {
        $this->signIn();
        $icon = Icon::create([
            'body' => 'fa fa-icon'
        ]);

        $this->delete("icons/$icon->id")->assertRedirect(route('icons.index'));

        $this->assertDatabaseMissing('icons', ['id' => $icon->id]);
    }

    /** @test */
    public function authenticated_user_may_update_icon()
    {
        $this->signIn();
        $icon = Icon::create([
            'body' => 'fa fa-icon'
        ]);

        $attributes = [
            'body' => 'fas fa'
        ];

        $this->patch("icons/$icon->id", $attributes)->assertRedirect(route('icons.index'));

        $this->assertEquals('fas fa', $icon->fresh()->body);
    }

    /** @test */
    public function unauthenticated_user_may_not_update_icon()
    {
        $icon = Icon::create([
            'body' => 'fa fa-icon'
        ]);

        $attributes = [
            'body' => 'fas fa'
        ];

        $this->patch("icons/$icon->id", $attributes)->assertRedirect('login');
    }
}