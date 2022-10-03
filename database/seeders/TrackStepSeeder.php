<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TrackStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('track_steps')->insert([
            [
            'id' => 1,
            'track_id' => 1,
            'step_type' => "App\\Common\\Models\\Video",
            'step_id' => 1,
            'position' => 1,
            'is_published' => false,
            ]
        ]);
    }
}
