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
            'username_register' => ['required'],
            'email_register' => [
                'required','email'
            ],
            'password_register' => 'required',
            'repeatpass' => 'required|same:password_register',
        ];
    }

    public function messages()
    {
        return [
            'username_register.required' => 'Enter your username',
            'username_register.email' => 'Enter your email',
            'password_register.required' => 'Enter your password',
            'repeatpass.required' => 'Enter your confirm password',
            'repeatpass.same' => 'Passwords do not match',
        ];
    }
}
