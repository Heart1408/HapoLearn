<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->numberBetween($min = 1, $max = 100),
            'description' => $this->faker->text(),
            'requirement' => $this->faker->text(),
            'time' => $this->faker->numberBetween($min = 1, $max = 200),
        ];
    }
}
