<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Subject;

class CreateSubjectRequest extends FormRequest
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
            'type' => ['required', 'integer'],
            'year' => ['required', 'integer'],
            'number' => ['required', 'integer'],
            'harfDiv' => ['required', 'integer']
        ];
    }

    public function withValidator($validator)
    {
        $type = $this->input('type');
        $year = $this->input('year');
        $harf_div = $this->input('harfDiv');

        $validator->after(function ($validator) use ($type, $year, $harf_div) {
            $subject = new Subject();
            $count = $subject->getSubjectsForValidation($type, $year, $harf_div);
            if ($count != 0) {
                $validator->errors()->add('errMsg', '同じ試験が既にあります。');
            }
        });
    }

    public function attributes()
    {
        return [
            'type' => '試験種別',
            'year' => '年度',
            'number' => '実施回',
            'harfDiv' => '午前・午後区分',
        ];
    }
}
