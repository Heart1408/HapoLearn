<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'login_username' => 'required|email',
            'login_password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'login_username.required' => 'Enter your email',
            'login_username.email' => 'Enter your email',
            'login_password.required' => 'Enter your password',
        ];
    }
}
