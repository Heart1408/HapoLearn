<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'lesson_id' => $this->faker->numberBetween($min = 1, $max = 100),
            'name' => $this->faker->name,
            'link' => $this->faker->url(),
        ];
    }
}
