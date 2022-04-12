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
            'name' => $data['username_register'],
            'email' => $data['email_register'],
            'password' => Hash::make($data['password_register']),
            'role' => 1,
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

