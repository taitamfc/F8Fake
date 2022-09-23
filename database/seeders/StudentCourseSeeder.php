<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_course')->insert([
            [
                'course_id' =>'1',
                'student_id' =>'1'
            ],
            [
                'course_id' =>'2',
                'student_id' =>'2'
            ]
          
        ]);
    }
}