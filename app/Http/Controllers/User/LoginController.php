<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request['username'],
            'password' => $request['password'],
        ];

        if ($request->validated()) {
            if (Auth::attempt($data)) {
                Auth::login(Auth::user());
                return redirect()->back();
            } else {
                return redirect()->back()->with('error', 'Invalid username or password');
            }
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect(route('homepage'));
    }
}
