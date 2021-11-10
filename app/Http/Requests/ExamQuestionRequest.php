<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamQuestionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'exams_id'=>'nullable|integer',
            'question'=>'nullable|string|max:255',
            'multiple_choice_one'=>'nullable|string|max:255',
            'multiple_choice_two'=>'nullable|string|max:255',
            'multiple_choice_three'=>'nullable|string|max:255',
            'multiple_choice_four'=>'nullable|string|max:255',
            'answer'=>'nullable|string|max:255',
        ];
    }
}
