<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([

            [
                'user_id' => 1,
                'commentstable_type' => 'Lộ trình học Front-end',
                'comment' => 'tại sao lại phải tạo ra mô hình clan sever trong khi nếu suy nghĩ theo cách đơn giản thì truy cập trực tiết vào một sever thì có phải là tốc độ sử lý sẽ nhanh hơn nhiều không ạ',
                'is_approved' => true,
                'course_id' => 1,
            ],
            [
                'user_id' => 1,
                'commentstable_type' => 'Lộ trình học Front-end',
                'comment' => 'tại sao lại phải tạo ra mô hình clan sever trong khi nếu suy nghĩ theo cách đơn giản thì truy cập trực tiết vào một sever thì có phải là tốc độ sử lý sẽ nhanh hơn nhiều không ạ',
                'is_approved' => true,
                'course_id' => 1,
            ],
            [
                'user_id' => 1,
                'commentstable_type' => 'Lộ trình học Front-end',
                'comment' => 'tại sao lại phải tạo ra mô hình clan sever trong khi nếu suy nghĩ theo cách đơn giản thì truy cập trực tiết vào một sever thì có phải là tốc độ sử lý sẽ nhanh hơn nhiều không ạ',
                'is_approved' => true,
                'course_id' => 1,
            ]


        ]);
    }
}
