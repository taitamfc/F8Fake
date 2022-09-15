<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    public function index(){
        $banners = Banner::orderBy('created_at', 'DESC')->search()->paginate(4);
        return view('Admin.banners.index', compact('banners'));
    }

    public function create()
    {
        $banners = Banner::get();
        return view('Admin.banners.add', compact('banners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $banners = new Banner();
        $banners->placement = $request->input('placement');
        $banners->type = $request->input('type');
        
        if ($request->hasFile('banner')) {
            $file = $request->banner;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('banner')->store('banner', 'public'); //lưu file vào mục public/banners với tê mới là $newFileName
            $banners->banner = $path;
        }
        $banners->title = $request->input('title');
        $banners->cta_title = $request->input('cta_title');
        $banners->description = $request->input('description');
        $banners->link_to = $request->input('link_to');
        $banners->priority = $request->input('priority');
        $banners->expires = $request->input('expires');
        $banners->save();
        Session::flash('success', 'Thêm thành công');

        return redirect()->route('banners.index');
    }

    public function edit($id){
        $banners = Banner::findOrFail($id);
        return view('Admin.banners.edit', compact('banners'));
    }

    public function update(UpdateBannerRequest $request, $id)
    {
        $banners = Banner::findOrFail($id);
        $banners->placement = $request->input('placement');
        $banners->type = $request->input('type');

        if ($request->hasFile('banner')) {
            $file = $request->banner;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('banner')->store('banner', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $banners->banner = $path;
        }
        $banners->title = $request->input('title');
        $banners->cta_title = $request->input('cta_title');
        $banners->description = $request->input('description');
        $banners->link_to = $request->input('link_to');
        $banners->priority = $request->input('priority');
        $banners->expires = $request->input('expires');
        
        $banners->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach banner
        return redirect()->route('banners.index');
    }

    public function destroy($id)
    {
        $banners = Banner::findOrFail($id);
        $image = $banners->image;
        $image = 'public/uploads/banners/' . $banners->image;
        if (file_exists($image)) {
            unlink($image);
        }
        $banners->delete();
        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach banners
        return redirect()->route('banners.index');
    }
}
