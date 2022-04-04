<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(UserCoursesTableSeeder::class);
        $this->call(TeacherCoursesTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        $this->call(UserLessonsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CourseTagsTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
    }
}
