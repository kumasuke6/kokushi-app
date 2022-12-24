<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'subject_ids' => ['required', 'array',],
            'q_random' => ['nullable', 'integer'],
            'choice_random' => ['nullable', 'integer'],
            'seed' => ['nullable', 'integer']
        ];
    }

    public function attributes()
    {
        return [
            'subject_ids' => '試験問題',
            'q_random' => '出題順をランダムにする',
            'choice_random' => '選択肢をランダムにする',
        ];
    }
}
