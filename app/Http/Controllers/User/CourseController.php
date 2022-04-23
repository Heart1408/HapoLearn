<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Tag;

use App\Models\UserCourse;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $courses = Course::search($data)->paginate(config('course.pagination'));
        $teachers = User::teacher()->get();
        $tags = Tag::get();
        return view('courses.index', compact('courses', 'teachers', 'tags'));
    }
}
