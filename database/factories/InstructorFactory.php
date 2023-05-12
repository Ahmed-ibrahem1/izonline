<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => [
                'en' => $this->faker->name(),
                'ar' => $this->faker->name(),
            ],
            'biography' => [
                'en' => $this->faker->paragraph(),
                'ar' => $this->faker->paragraph(),
            ],
            'experience' => [
                'en' => $this->faker->paragraph(),
                'ar' => $this->faker->paragraph(),
            ],
            'instagram' => $this->faker->url(),
            'facebook' => $this->faker->url(),
            'image' => 'instructors/w9C05tgyb2ihT8n4jJGXqmILhPxBSBVXIbYghRc0.jpg',
        ];
    }
}
