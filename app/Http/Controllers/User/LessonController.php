<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Tag;

class LessonController extends Controller
{
    public function show($courseId, $id)
    {
        $lesson = Lesson::find($id);
        $course = Course::with('tags')->find($courseId);
        $otherCourses = Course::inRandomOrder()->take(5)->get();
        return view('lessons.show', compact('lesson', 'course', 'otherCourses'));
    }
}
