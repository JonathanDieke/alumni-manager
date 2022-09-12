<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formation>
 */
class FormationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $alumnusId = User::all()->random()->id;
        return [
            "name" => Str::random(),
            "level" => Arr::random(["bac", "bac1", "bac2", "bac3", 'bac4', 'bac5', 'bac6', 'bac7', 'bac8']),
            "school" => Str::random(),
            "start_date" => $this->faker->dateTimeBetween(startDate: "-10years", endDate:"now"),
            "end_date" => $this->faker->dateTimeBetween(startDate: "-10years", endDate:"now"),
            "alumnus_id" => $alumnusId,
        ];
    }
}
