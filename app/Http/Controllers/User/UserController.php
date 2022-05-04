<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {
        $id = Auth()->user()->id;
        $courses = Course::whereHas('users', function ($query) use ($id) {
            $query->where('user_id', $id);
        })->get();
        return view('users.profile', compact('courses'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = User::find(Auth()->user()->id);
        if ($request->validated()) {
            if ($request['name'] != null) {
                    $user->name = $request['name'];
            }
            if ($request['email'] != null) {
                $user->email = $request['email'];
            }
            if ($request['phone'] != null) {
                $user->phone = $request['phone'];
            }
            if ($request['address'] != null) {
                $user->address = $request['address'];
            }
            if ($request['birthday'] != null) {
                $user->birthday = $request['birthday'];
            }
            if ($request['desc'] != null) {
                $user->description = $request['desc'];
            }
        }
        $user->save();
        return redirect()->back();
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find(Auth()->user()->id);
        $avatar = $request->file('file');
        $storePath = $avatar->move('images', $avatar->getClientOriginalName());
        $user->avartar = $storePath;
        $user->save();
        return response()->json(true);
    }
}
