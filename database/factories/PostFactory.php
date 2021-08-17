<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => rand(1,3),
            'title' => $this->faker->sentence(3),
            'body' => $this->faker->paragraph(10),
            'description' => $this->faker->paragraph(1),
            'image' => null,
            'visits' => rand(0, 10),
            'status' => rand(0,1)
        ];
    }
}
