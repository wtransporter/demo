<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Ingredients;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingredients::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => Post::factory(),
            'description' => $this->faker->sentence
        ];
    }
}
