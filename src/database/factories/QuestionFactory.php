<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
        if (!Storage::exists('public/test_img')) {
            Storage::makeDirectory('public/test_img');
        }
        return [
            'subject_id' => rand(1, 4),
            'number' => function () {
                return self::$sequence++;
            },
            'caption' => fake()->realText(60),
            'choice1' => fake()->realText(20),
            'choice2' => fake()->realText(20),
            'choice3' => fake()->realText(20),
            'choice4' => fake()->realText(20),
            'choice5' => fake()->realText(20),
            'answer' => rand(1, 5),
            'explan' => fake()->realText(100),
            'inappropriate_flg' => rand(0, 1),
        ];
    }
}
