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
            'subjectIds' => ['required', 'array',],
            'qRandom' => ['nullable', 'integer'],
            'choiceRandom' => ['nullable', 'integer'],
            'seed' => ['nullable', 'integer']
        ];
    }

    public function attributes()
    {
        return [
            'subjectIds' => '試験問題',
            'qRandom' => '出題順をランダムにする',
            'choiceRandom' => '選択肢をランダムにする',
        ];
    }
}
