<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostVoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id'=> rand(1,500),
'user_id'=>rand(1,100),
            'vote'=> $this->faker->randomElement([1,-1])
        ];
    }
}
