<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'community_id' => rand(1, 5),
            'user_id' => rand(1, 101),
            'title' => $this->faker->text(30),
            'post_text' => $this->faker->text(500),
            //'post_image'=>$this->faker->image(),
            'post_url' => $this->faker->url(),
        ];
    }
}
