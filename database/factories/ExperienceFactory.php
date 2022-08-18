<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userId = User::all()->random()->id;

        return [
            'title' => Str::random(),
            'company' => Str::random(),
            'location' => Str::random(),
            "start_year" => $this->faker->dateTimeBetween(startDate: "-10years", endDate:"now"),
            "end_year" => $this->faker->dateTimeBetween(startDate: "-10years", endDate:"now"),
            "user_id" => $userId,
        ];
    }
}
