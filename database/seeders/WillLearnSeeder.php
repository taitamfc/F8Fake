<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class will_learnsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('will_learns')->insert([
        [
            'course_id' =>1,
            'content' => 'Hiểu về khái niệm SPA/MPA"'
        ],
        [
            'course_id' =>2,
            'content' => 'Hiểu về khái niệm SPA/MPA"'
        ],
        [
            'course_id' =>3,
            'content' => 'Hiểu về khái niệm SPA/MPA"'
        ],
        [
            'course_id' =>5,
            'content' => 'Hiểu về khái niệm SPA/MPA"'
        ]
        ]);
    }
}
