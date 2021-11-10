<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'nullable|string|max:50',
            'main_number' => 'nullable|string|max:50',
            'email' => 'nullable|email|unique:users',
            'roles'=>'nullable|string|in:ADMIN,SISWA,GURU',
            'gender' => 'nullable|string|max:10',
            'class' => 'nullable|string|max:50',
            'photo_user' => 'nullable|image|max:2048',

        ];
    }
}
