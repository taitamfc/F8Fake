<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('steps')->insert([
            "id" => 1,
            "title" => "Mô hình Client - Server là gì?",
            "content" => "d",
            "description" => "d",
            "duration" => 695,
            "video_type" => "d",
            "original_name" => "d",
            "image" => "a",
            "video" => "b",
            "image_url" => "null",
            "video_url" => "null"
        ]);
    }
}
