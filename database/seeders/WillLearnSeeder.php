<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WillLearnSeeder extends Seeder
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
            ]
        ]);
    }
}
