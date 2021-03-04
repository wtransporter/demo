<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Step;
use Illuminate\Database\Eloquent\Factories\Factory;

class StepFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Step::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $body = 'In a food processor fitted with a metal blade  2 Minutes add the garlic, 
            rosemary, thyme, cayenne, and salt. Pulse until combined. 
            Pour in olive oil and pulse into a paste. Rub the paste on both sides of 
            the lamb chops and let them marinate for at least 1 hour in the refrigerator. 
            Remove from refrigerator and allow the chops to come to room temperature;
                it will take about 20 minutes.';

        return [
            'post_id' => Post::factory(),
            'body' => $body,
            'image' => null
        ];
    }
}
