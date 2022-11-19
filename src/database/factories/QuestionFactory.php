<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    private static int $sequence = 1;

    public function definition()
    {
        return [
            'subject_id' => rand(1,4),
            'question_number' => function () { return self::$sequence++; },
            'caption' => $this->faker->sentence(),
        ];
    }
}
