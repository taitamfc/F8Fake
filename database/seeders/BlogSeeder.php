<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'user_id'=> 1,
                'parent_id'=>1,
                'title'=>'Trong Javascript cũng có \"Typescript\" mà bấy lâu nay ta không biết',
                'slug'=>'trong-javascript-cung-co-typescript-ma-bay-lau-nay-ta-khong-biet',
                'description'=>'',
                'meta_title'=>'Trong Javascript cũng có \"Typescript\" mà bấy lâu nay ta không biết',
                'meta_description'=>'Có thể tiêu đề sẽ gây hoang mang cho một số bạn chưa, mới hoặc đã biết về Typescript (TS), chúng mình cùng bắt đầu bài viết để...',
                'thumbnail'=>'',
                'image'=>'',
                'content'=>'![ảnh.png](https://files.fullstack.edu.vn/f8-prod/blog_posts/4685/63117986d6356.png)\nCó thể tiêu đề sẽ gây hoang mang cho một số bạn chưa, mới hoặc đã biết về Typescript **(TS)**, chúng mình cùng bắt đầu bài viết để giải đáp thắc mắc nào:\n### Tại sao bài viết này ra đời\n- Dành cho các bạn muốn gán type trong code ReactJS đang sử dụng JS mà dự án đang không xài TS\n### Làm sao để viết \"TS\" trong JS\nĐầu tiên chúng ta sẽ tìm hiểu từ khoá **PropTypes** trong ReactJS\n### 1. PropTypes là cái chi chi:\nKhái niệm Prop trong React thì ắt hẳn các bạn cũng đã biết (ai chưa biết thì mở ngay video của anh Sơn xem nhé). \n\nKhi chúng ta truyền Prop từ Component **(Com)** cha xuống **(Com)** con thì mỗi Prop có 1 type khác nhau đúng k nè. \n\nChúng ta muốn mỗi Prop đều có type riêng, tránh trường hợp Prop đó là 1 function mà bạn lại truyền object thì có phải \"Râu ông này cắm cầm bà kia không\" =))\n### 2. Cách cài đặt:\n\n> npm install --save prop-types\n### 3. Cách sử dụng:\n\n\n```javascript\nimport PropTypes from \"prop-types\";\n\nexport default function Counter({ count, setCount }) {\n  return (\n    <div className=\"App\">\n      <p>{count}</p>\n      <button onClick={() => setCount(count + 1)}>+</button>\n    </div>\n  );\n}\n\nCounter.propTypes = {\n  count: PropTypes.number,\n  setCount: PropTypes.func\n};\n\n```\n\n- Trong đoạn code trên ta có thể thấy ở dòng `Counter.propTypes = ...` chúng ta đã khai báo kiểu dữ liệu cho nó\n- VD: Chúng ta truyền sai kiểu dữ liệu thì sao? (Thay vì truyền count là number, mình sẽ truyền string)\n\n- Bùm, đã có lỗi xảy ra ở đây\n![Screen Shot 2022-09-02 at 10.57.17.png](https://files.fullstack.edu.vn/f8-prod/blog_posts/4685/63117f2cee213.png)\n\n### Nhược điểm so với TS\nCó 1 nhược điểm của thằng PropTypes này so với TS là nó sẽ không báo error trực tiếp khi bạn code sai type như trong TS, nó chỉ báo error ở trên log của các bạn.\n\n### Tóm lại\nQua bài viết này mình mong sẽ đem lại sự hữu ích cho các bạn.',
                'min_read'=>'1',
                'view_count'=>'110',
                'is_recommend'=>true,
                'is_approved'=>true,
                'reaction_count'=>'1',
                'comments_count'=>'0',
                'published_at'=>'2002-10-10',
                'is_reacted'=>false,
                'is_bookmark'=>false,
                'is_published'=> true,
            ],

        ]);
    }
}
