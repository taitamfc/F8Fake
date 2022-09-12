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
                'id' =>1,
                'placement' => 'học viên',
                'type' => '',
                'banner' => '',
                'title' => 'Học IT cần tố chất gì?',
                'description' => 'ngành công nghệ thông tin có cái nhìn đúng ngành nghề và gặt hái thành công trong lĩnh vực này.',
                'cta_title' => '',
                'link_to' => 'https://htt.edu.vn/nhung-to-chat-can-co-de-hoc-tot-nganh-cong-nghe-thong-tin/',
                'priority' => '',
                'expires' => '',
            ]
        ]);
    }
}
