<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Question;

class DeleteSubjectRequest extends FormRequest
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
            'id' => ['required', 'integer']
        ];
    }

    public function withValidator($validator)
    {
        $id = $this->input('id');

        $validator->after(function ($validator) use ($id) {
            $question = new Question();
            $count = $question->getQuestionsForDeleteSubject($id);
            if ($count != 0) {
                $validator->errors()->add('errMsg', '問題が登録されている試験です。');
            }
        });
    }
}
