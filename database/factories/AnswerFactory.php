<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userId = \App\Models\User::all()->random()->id;
        $questionId = \App\Models\Question::all()->random()->id;
        return [
            "answer" => fake()->realTextBetween(40, 100),
            "user_id" => $userId,
            "question_id" => $questionId,
        ];
    }
}
