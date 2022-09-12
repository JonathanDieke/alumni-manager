<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
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
            'title' => Str::random(),
            'description' => $this->faker->sentence(nbWords: 23),
            'company' => Str::random(),
            'type' => Arr::random(["stage", "job"]),
            'localization' => Str::random(),
            "deadline" => $this->faker->dateTimeBetween(startDate: "-10years", endDate:"now"),
            "alumnus_id" => $alumnusId,
        ];
    }
}
