<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'nullable|string|min:3|max:30',
            'email' => 'nullable|email|unique:users',
            'birthday' => 'nullable|before:today',
            'phone' => 'nullable|regex:/(0)[1-9][0-9]{7,8}/',
            'address' => 'nullable|min:10|max:255',
            'desc' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Your name is too short',
            'name.max' => 'Your name is too long',
            'email.email' => 'Invalid email',
            'email.unique' => 'Email already exists',
            'birthday.before' => 'Invalid date entered',
            'phone.regex' => 'Invalid phone entered',
            'address.min' => 'Your address is too short',
            'address.max' => 'Your address is too long',
        ];
    }
}
