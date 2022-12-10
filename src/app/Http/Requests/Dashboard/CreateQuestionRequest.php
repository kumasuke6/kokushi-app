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
            'subjectId' => ['required', 'integer'],
            'number' => ['required', 'integer'],
            'caption' => ['required', 'string', 'max:1000'],
            'captionImg' => [File::image()],
            'choice1' => ['required', 'string', 'max:255'],
            'choice2' => ['required', 'string', 'max:255'],
            'choice3' => ['nullable', 'string', 'max:255'],
            'choice4' => ['nullable', 'string', 'max:255'],
            'choice5' => ['nullable', 'string', 'max:255'],
            'choiceImg1' => [File::image()],
            'choiceImg2' => [File::image()],
            'choiceImg3' => [File::image()],
            'choiceImg4' => [File::image()],
            'choiceImg5' => [File::image()],
            'answer' => ['required', 'integer'],
            'explan' => ['string', 'max:1000'],
            'explanImg' => [File::image()],
            'inappropriateFlg' => ['required', 'integer'],
        ];
    }

    public function withValidator($validator)
    {
        $subject_id = $this->input('subjectId');
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
            'subjectId' => '試験選択',
            'number' => '問題番号',
            'answer' => '回答',
            'caption' => '問題説明',
            'captionImg' => '問題説明画像',
            'choice1' => '選択肢(1)',
            'choice2' => '選択肢(2)',
            'choice3' => '選択肢(3)',
            'choice4' => '選択肢(4)',
            'choice5' => '選択肢(5)',
            'choiceImg1' => '選択肢(1)画像',
            'choiceImg2' => '選択肢(2)画像',
            'choiceImg3' => '選択肢(3)画像',
            'choiceImg4' => '選択肢(4)画像',
            'choiceImg5' => '選択肢(5)画像',
            'answer' => '回答',
            'explan' => '解説',
            'explanImg' => '解説画像',
            'inappropriateFlg' => '不適切フラグ'
        ];
    }
}
