<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function index(){

        $user = User::find(1);
 
        foreach ($user->courses as $course) {
            echo $course->pivot->course_id;
        }
    }
}
