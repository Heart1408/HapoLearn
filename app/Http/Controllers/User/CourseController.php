<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Tag;

use App\Models\UserCourse;

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

    public function show($id, Request $request)
    {
        $data = $request->all();
        $course = Course::with('teachers', 'reviews', 'tags')->find($id);
        $otherCourses = Course::inRandomOrder()->take(config('course.random'))->get();
        $lessons = Lesson::getLessons($data, $id)->paginate(config('course.pagination'));
        return view('courses.detail_course', compact('course', 'lessons', 'otherCourses'));
    }
}
