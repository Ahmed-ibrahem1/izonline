<?php

namespace Database\Factories;


use App\Models\Program;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                try {
                    return User::all()->random();
                } catch (\Throwable $th) {
                    return null;
                }
            },
            'program_id' => function() {
                try {
                    return Program::all()->random();
                } catch (\Throwable $th) {
                    return null;
                }
            },
            'coupon_id' => NULL,
            'ref_no' => $this->faker->text(6),

            
            'amount' => $this->faker->numberBetween(500, 1000),
           
        ];
    }
}
