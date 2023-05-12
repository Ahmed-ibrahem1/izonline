<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrganisationFactory extends Factory
{

    function __construct(...$args)
    {
        parent::__construct(...$args);

        $this->faker_ar = \Faker\Factory::create('ar_SA');
    }


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => [
                'en' => $this->faker->word(),
                'ar' => $this->faker_ar->word(),
            ],
            'description' => [
                'en' => $this->faker->paragraph(),
                'ar' => $this->faker_ar->paragraph(),
            ],
            'attributes' => [
                'en' => $this->faker->sentence(),
                'ar' => $this->faker_ar->sentence(),
            ],
            'website' => $this->faker->url(),
            'image' => $this->faker->randomElement([
                'course_images/mXy6YzXEGYL1rQjuj3SEUE0ixMY9JDZTj896TvpR.png',
            ]),
            'instagram' => $this->faker->url(),
            'facebook' => $this->faker->url(),
            'twitter' => $this->faker->url(),
        ];

        
    }
}
