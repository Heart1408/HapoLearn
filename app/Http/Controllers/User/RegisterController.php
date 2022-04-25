<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(array $data)
    {
        return User::create([
            'name' => $data['register_username'],
            'email' => $data['register_email'],
            'password' => Hash::make($data['register_password']),
            'role' => User::ROLE['student']
        ]);
    }

    public function store(RegisterRequest $request)
    {
        if ($request->validated()) {
            $this->create($request->all());
            return redirect()->back()->with('success', 'Sign Up Success!');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
