<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "id" => 1,
            "name" => 'nguyen van A',
            "email" => "nguyen van A@gmail.com",
            "password" => "123",
            "remember_token" => "123",
            "username" => "nguyen van A",
            "first_name" => "nguyen van",
            "last_name" => "A",
            "full_name" => "nguyen van A",
            "avatar" => "h",
            "bio" => "a",
            "group_id" => 1,
            "avatar_url" => "1",
            "cover_url" => '1',
            "is_comment_blocked" => "1",
            "is_blocked" => "1"
        ]);
    }
}
