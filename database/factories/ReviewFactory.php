<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 100),
            'course_id' => $this->faker->numberBetween($min = 1, $max = 100),
            'rate' => $this->faker->numberBetween($min = 1, $max = 5),
            'comment' => $this->faker->text(),
        ];
    }
}
