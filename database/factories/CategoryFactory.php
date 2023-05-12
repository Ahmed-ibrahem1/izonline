<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use InvalidArgumentException;

class CategoryFactory extends Factory
{
    /**
     * The current Faker_ar instance.
     *
     * @var \Faker\Generator
     */
    protected $faker_ar;

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
            'parent_id' => function ($attributes) {
                $rand = rand(0, 10);
                if ($rand > 2) {
                    try {
                        return Category::all()->random();
                    } catch (InvalidArgumentException $e) {
                        return null;
                    }
                } else {
                    return null;
                }
            },
            'title' => [
                'en' => $this->faker->word(),
                'ar' => $this->faker_ar->governorate(),
            ],
            'featured' => $this->faker->boolean(),
        ];
    }
}
