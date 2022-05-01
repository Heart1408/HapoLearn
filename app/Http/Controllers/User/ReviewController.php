<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $user = Auth()->user();
        $course = Course::find($data['id']);
        $course->reviews()->attach($user, ['comment' => $data['comment'], 'rate' => $data['vote']]);
        return response()->json(true);
    }
}
