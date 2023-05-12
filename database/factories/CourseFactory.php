<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Level;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
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
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Program::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => function () {
                try {
                    return Category::all()->random();
                } catch (\Throwable $th) {
                    return null;
                }
            },
            'level_id' => Level::all()->random(),

            'title' => [
                'en' => $this->faker->word(),
                'ar' => $this->faker_ar->governorate(),
            ],

            'duration' => $this->faker->randomDigit(),
            'image' => $this->faker->randomElement([
                'course_images/mXy6YzXEGYL1rQjuj3SEUE0ixMY9JDZTj896TvpR.png',
            ]),
            'price' => $this->faker->numberBetween(500, 1000),
            'language' => $this->faker->randomElement(['en', 'ar']),
            'delivery_mode' => 'online',
            'featured' => $this->faker->boolean(),
        ];
    }
}
