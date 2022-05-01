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
        $checkJoinCourse = Course::isJoined($id);
        return view('courses.detail_course', compact('course', 'lessons', 'otherCourses', 'checkJoinCourse'));
    }

    public function store(Request $request)
    {
        $course = Course::find($request['course_id']);
        $user = Auth()->user();
        $course->students()->attach($user);
        return redirect()->back()->with('message', 'Tham gia khóa học thành công');
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $user = Auth()->user();
        $course->students()->detach($user);
        return redirect()->back()->with('message', 'Rời khóa học thành công');
    }

    public function getreviews(Request $request)
    {
        $id = $request->id;
        $course = Course::with('reviews')->GetDataReviews()->find($id);
        return response()->json($course);
    }
}
