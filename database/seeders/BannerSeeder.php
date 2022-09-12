<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            [
                'placement' => 'home',
                'type' => 'slideshow',
                'banner' => 'banners/20/6308a6bf603a4.png',
                'title' => 'Khóa học HTML CSS Pro',
                'description' => 'Đây là khóa học đầy đủ và chi tiết nhất bạn có thể tìm thấy được ở trên Internet!',
                'cta_title' => 'Tìm hiểu thêm',
                'link_to' =>  "https://fullstack.edu.vn/landing/htmlcss",
                'priority' => 1,
                'expires' => '2022-12-18 ',
            ]
        ]);
    }
}
