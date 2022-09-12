<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Student_sourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_sourse')->insert([
            [
                'id' =>1,
                'course_id' =>'1',
                'student_id' =>'1'
            ],
            [
                'id' =>2,
                'course_id' =>'2',
                'student_id' =>'2'
            ],
            [
                'id' =>3,
                'course_id' =>'3',
                'student_id' =>'3'
            ]
        ]);
    }
}
