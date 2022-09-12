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
        $alumnusId = \App\Models\User::all()->random()->id;
        $questionId = \App\Models\Question::all()->random()->id;
        return [
            "answer" => fake()->realTextBetween(40, 100),
            "alumnus_id" => $alumnusId,
            "question_id" => $questionId,
        ];
    }
}
