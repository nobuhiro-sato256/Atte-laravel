<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class TimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'date' => $this->faker->datetimeBetween('-1 week','+1 week'),
            'start_time' => $this->faker->datetime(),
            'end_time' => $this->faker->datetime(),
            'break_time' => $this->faker->datetime(),
            'work_time' => $this->faker->datetime(),
        ];
    }
}
