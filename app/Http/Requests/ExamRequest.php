<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'users_id'=>'nullable|integer',
            'class_students_id'=>'nullable|integer',
            'name'=>'nullable|string|max:100',
            'photo_exam' => 'nullable|image|max:2048',
        ];
    }
}
