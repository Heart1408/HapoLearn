<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'name' => $this->faker->text($maxNbChars = 100),
            'description' => $this->faker->text(),
            'logo' => $this->faker->imageUrl(),
            'price' => 'free'
        ];
    }
}
