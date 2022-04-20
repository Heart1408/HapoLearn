<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'register_username' => ['required'],
            'register_email' => [
                'required','email'
            ],
            'register_password' => 'required|min:3',
            'confirm_password' => 'required|same:register_password',
        ];
    }

    public function messages()
    {
        return [
            'register_username.required' => 'Enter your username',
            'register_username.email' => 'Enter your email',
            'register_password.required' => 'Enter your password',
            'register_password.min' => 'Password must be longer than 3 characters',
            'confirm_password.required' => 'Enter your confirm password',
            'confirm_password.same' => 'Passwords do not match',
        ];
    }
}
