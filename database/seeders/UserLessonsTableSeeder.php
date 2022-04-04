<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserLesson;

class UserLessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserLesson::factory()->count(100)->create();
    }
}
