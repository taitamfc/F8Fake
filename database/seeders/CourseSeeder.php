<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('courses')->insert([
            [
                'level_id' => 1,
                'title' => 'Xây Dựng Website với ReactJS',
                'certificate_name' => 'Build Website With ReactJS',
                'slug' => 'reactjs',
                'description' => 'Khóa học ReactJS từ cơ bản tới nâng cao, kết quả của khóa học này là bạn có thể làm hầu hết các dự án thường gặp với ReactJS. Cuối khóa học này bạn sẽ sở hữu một dự án giống Tiktok.com, bạn có thể tự tin đi xin việc khi nắm chắc các kiến thức được chia sẻ trong khóa học này.',
                'compeleted_content' => 'Chúc mừng bạn đã hoàn thành khóa học! Bạn đã làm được một điều thật tuyệt vời!',
                'content' => '',
                'pass_percent' => '48',
                'video_type' => 'youtube',
                'video' => 'x0fSBAgBrOQ',
                'priority' => 7,
                'student_count' => 32534,
                'old_prive' => 0,
                'price' => 0,
                'pre_order_price' => 0,
                'is_relatable' => '',
                'is_coming_soon' => false,
                'is_pro' => false,
                'is_completable' => false,
                'delete_at'=>''
            ],
            [
                'level_id' => 2,
                'title' => 'Xây Dựng Website với ReactJS',
                'certificate_name' => 'Build Website With ReactJS',
                'slug' => 'reactjs',
                'description' => 'Khóa học ReactJS từ cơ bản tới nâng cao, kết quả của khóa học này là bạn có thể làm hầu hết các dự án thường gặp với ReactJS. Cuối khóa học này bạn sẽ sở hữu một dự án giống Tiktok.com, bạn có thể tự tin đi xin việc khi nắm chắc các kiến thức được chia sẻ trong khóa học này.',
                'compeleted_content' => 'Chúc mừng bạn đã hoàn thành khóa học! Bạn đã làm được một điều thật tuyệt vời!',
                'content' => '',
                'pass_percent' => '48',
                'video_type' => 'youtube',
                'video' => 'x0fSBAgBrOQ',
                'priority' => 7,
                'student_count' => 32534,
                'old_prive' => 0,
                'price' => 0,
                'pre_order_price' => 0,
                'is_relatable' => '',
                'is_coming_soon' => false,
                'is_pro' => false,
                'is_completable' => false,
                'delete_at'=>''
            ],
            [
                'level_id' => 1,
                'title' => 'Xây Dựng Website với ReactJS',
                'certificate_name' => 'Build Website With ReactJS',
                'slug' => 'reactjs',
                'description' => 'Khóa học ReactJS từ cơ bản tới nâng cao, kết quả của khóa học này là bạn có thể làm hầu hết các dự án thường gặp với ReactJS. Cuối khóa học này bạn sẽ sở hữu một dự án giống Tiktok.com, bạn có thể tự tin đi xin việc khi nắm chắc các kiến thức được chia sẻ trong khóa học này.',
                'compeleted_content' => 'Chúc mừng bạn đã hoàn thành khóa học! Bạn đã làm được một điều thật tuyệt vời!',
                'content' => '',
                'pass_percent' => '48',
                'video_type' => 'youtube',
                'video' => 'x0fSBAgBrOQ',
                'priority' => 7,
                'student_count' => 32534,
                'old_prive' => 0,
                'price' => 0,
                'pre_order_price' => 0,
                'is_relatable' => '',
                'is_coming_soon' => false,
                'is_pro' => false,
                'is_completable' => false,
                'delete_at'=>''
            ]
        ]);
    }
}
