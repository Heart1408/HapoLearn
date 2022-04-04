<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('user_course', 'user_courses');
        Schema::rename('teacher_course', 'teacher_courses');
        Schema::rename('user_lesson', 'user_lessons');
        Schema::rename('course_tag', 'course_tags');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('user_courses', 'user_course');
        Schema::rename('teacher_courses', 'teacher_course');
        Schema::rename('user_lessons', 'user_lesson');
        Schema::rename('course_tags', 'course_tag');
    }
}
