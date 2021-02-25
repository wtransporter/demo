<?php

namespace Database\Factories;

use App\Models\Post;
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
            'category_id' => 1,
            'title' => $this->faker->sentence(3),
            'body' => $this->faker->paragraph(10),
            'description' => $this->faker->paragraph(1),
            'image' => 'potatoe.jpeg',
            'visits' => rand(0, 10)
        ];
    }
}
