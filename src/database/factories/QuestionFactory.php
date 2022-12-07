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
            'caption_img' => storage_path('storage/app/public/test_img') . 'dummy-540X400.png',
            'choice1' => fake()->realText(20),
            'choice2' => fake()->realText(20),
            'choice3' => fake()->realText(20),
            'choice4' => fake()->realText(20),
            'choice5' => fake()->realText(20),
            'choice_img1' => storage_path('storage/app/public/test_img') . 'dummy-540X400.png',
            'choice_img2' => storage_path('storage/app/public/test_img') . 'dummy-540X400.png',
            'choice_img3' => storage_path('storage/app/public/test_img') . 'dummy-540X400.png',
            'choice_img4' => storage_path('storage/app/public/test_img') . 'dummy-540X400.png',
            'choice_img5' => storage_path('storage/app/public/test_img') . 'dummy-540X400.png',
            'answer' => rand(1, 5),
            'explan' => fake()->realText(100),
            'explan_img'  => storage_path('app/public/test_img') . 'dummy-540X400.png',
            'inappropriate_flg' => rand(0, 1),
        ];
    }
}
