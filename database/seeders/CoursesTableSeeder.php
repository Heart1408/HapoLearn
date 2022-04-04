<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('courses')->insert([
            'name' => 'nametest',
            'description' => 'descriptiontest',
            'logo' => 'logotest',
            'price' => 'free'
        ]);
    }
}
