<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            [
                'name' =>'Nguyễn Đức Thuần',
                'email' =>'thuan@gmail.com',
                'password' =>123456,
                'image' => ""
            ],
            [
                'name' =>'Trần Ngọc Vinh',
                'email' =>'Vinh@gmail.com',
                'password' =>12345,
                'image' => ""
            ],
            [
                'name' =>'Hoàng Thanh Hải',
                'email' =>'Hai@gmail.com',
                'password' =>1234,
                'image' => ""
            ]
        ]);
    }
}
