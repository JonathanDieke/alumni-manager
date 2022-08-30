<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
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
            'title' => Str::random(16),
            'description' => fake()->realTextBetween(35, 200),
            'keywords' => Str::random(4) . ", " . Str::random(4),
            "status" => Arr::random(['closed', 'open', 'resolved']),
            "user_id" => $userId,
        ];
    }
}
