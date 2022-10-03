<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Banner;
class BannerTest extends TestCase
{
    use WithFaker;//tao du lieu gia
    // use RefreshDatabase;//chay xong test thi xoa toan bo database

    //kiem tra duong dan co ton tai hay khong
    // public function banner()
    // {
    //     $this->get('/banners')->assertStatus(200);//kiem tra URL /banners co ton tai voi method GET ko - xem tat ca
    //     $this->get('/banners/create')->assertStatus(200);//kiem tra URL /banners/create co ton tai voi method GET ko - trang them moi
    //     $this->post('/banners')->assertStatus(200);//kiem tra URL /banners co ton tai voi method POST ko - xu ly them moi
    //     $this->get('/banners/1')->assertStatus(200);//kiem tra URL /banners/1 co ton tai voi method GET ko - trang xem chi tiet
    //     $this->get('/banners/1/edit')->assertStatus(200);//kiem tra URL /banners/1/edit co ton tai voi method GET ko - trang chinh sua
    //     $this->put('/banners/1')->assertStatus(200);//kiem tra URL /banners co ton tai voi method PUT ko - xu ly chinh sua
    //     $this->delete('/banners/1')->assertStatus(200);//kiem tra URL /banners co ton tai voi method GET ko - xu ly xoa
    // }

    // public function create()
    // {
    //     $banners = Banner::factory(Banner::class)->create();//goi factory de tao moi du lieu
    //     $this->assertNotNull($banners);//kiem tra ket qua tra ve co NULL hay khong
    // }

    public function test_create_banner_by_fillable()
    {
        $banners = new Banner();
        $data = [
            'placement' => $this->faker->word
        ];
        $this->assertInstanceOf(Banner::class, $banners->create($data));//kiem tra ket qua tra ve co phai la doi tuong Level ko
    }
}
