<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tracks')->insert([
            "id" => 1,
            "course_id" => 1,
            "title" => "Khái niệm kỹ thuật cần biết",
            "is_free" => true,
            "position" => 1
        ]);
    }
}
