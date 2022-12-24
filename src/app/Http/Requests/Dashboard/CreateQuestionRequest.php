<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
use App\Models\Question;

class CreateQuestionRequest extends FormRequest
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
            'subject_id' => ['required', 'integer'],
            'number' => ['required', 'integer'],
            'caption' => ['required', 'string', 'max:1000'],
            'caption_img' => [File::image()],
            'choice1' => ['nullable', 'string', 'max:255'],
            'choice2' => ['nullable', 'string', 'max:255'],
            'choice3' => ['nullable', 'string', 'max:255'],
            'choice4' => ['nullable', 'string', 'max:255'],
            'choice5' => ['nullable', 'string', 'max:255'],
            'choice_img1' => [File::image()],
            'choice_img2' => [File::image()],
            'choice_img3' => [File::image()],
            'choice_img4' => [File::image()],
            'choice_img5' => [File::image()],
            'answer' => ['required', 'integer'],
            'explan' => ['string', 'max:1000'],
            'explan_img' => [File::image()],
            'inappropriate_flg' => ['required', 'integer'],
        ];
    }

    public function withValidator($validator)
    {
        $subject_id = $this->input('subject_id');
        $number = $this->input('number');

        if (is_null($subject_id) || is_null($number)) {
            return;
        }

        $validator->after(function ($validator) use ($subject_id, $number) {
            $subject = new Question();
            $count = $subject->getQuestionForCreateQuestionReq($subject_id, $number);
            if ($count != 0) {
                $validator->errors()->add('errMsg', '同じ問題が既にあります。');
            }
        });
    }

    public function attributes()
    {
        return [
            'subject_id' => '試験選択',
            'number' => '問題番号',
            'answer' => '回答',
            'caption' => '問題説明',
            'caption_img' => '問題説明画像',
            'choice1' => '選択肢(1)',
            'choice2' => '選択肢(2)',
            'choice3' => '選択肢(3)',
            'choice4' => '選択肢(4)',
            'choice5' => '選択肢(5)',
            'choice_img1' => '選択肢(1)画像',
            'choice_img2' => '選択肢(2)画像',
            'choice_img3' => '選択肢(3)画像',
            'choice_img4' => '選択肢(4)画像',
            'choice_img5' => '選択肢(5)画像',
            'answer' => '回答',
            'explan' => '解説',
            'explan_img' => '解説画像',
            'inappropriate_flg' => '不適切フラグ'
        ];
    }
}
