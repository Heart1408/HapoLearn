<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeacherCourse;

class TeacherCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeacherCourse::factory()->count(100)->create();
    }
}
