<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = DB::table('courses')->select('name', 'description', 'logo')->limit(3)->get();
        $sumcourse = DB::table('courses')->count();
        $sumlesson = DB::table('lessons')->count();
        $learners = DB::table('users')->where('role', '=', 1)->count();
        $reviews = DB:: table('reviews')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->select('reviews.comment', 'reviews.rate', 'users.name', 'users.avartar')->limit(4)->get();
        // dd($reviews);
        return view('homepage', compact('courses', 'sumcourse', 'sumlesson', 'learners', 'reviews'));
    }
}
