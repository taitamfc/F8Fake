<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $key        = $request->key ?? '';
        $placement      = $request->placement ?? '';
        $type      = $request->type ?? '';
        $title      = $request->title ?? '';
        $description      = $request->description ?? '';
        $id         = $request->id ?? '';

        // thực hiện query
        $query = Banner::query(true);
        if ($placement) {
            $query->where('placement', 'LIKE', '%' . $placement . '%');
        }
        if ($type) {
            $query->where('type', 'LIKE', '%' . $type . '%');
        }
        if ($title) {
            $query->where('title', 'LIKE', '%' . $title . '%');
        }
        if ($description) {
            $query->where('description', 'LIKE', '%' . $description . '%');
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('placement', 'LIKE', '%' . $key . '%');
            $query->orWhere('type', 'LIKE', '%' . $key . '%');
            $query->orWhere('title', 'LIKE', '%' . $key . '%');
            $query->orWhere('description', 'LIKE', '%' . $key . '%');
        }
        $banners = $query->paginate(5);

        $params = [
            'f_id'        => $id,
            'f_placement' => $placement,
            'f_type'     => $type,
            'f_title'     => $title,
            'f_description'     => $description,
            'f_key'       => $key,
            'banners'    => $banners,
        ];
        return view('Admin.banners.index', $params);
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

        try {
            $banners->save();
            Session::flash('success', 'Thêm thành công');

            return redirect()->route('banners.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('banners.index')->with('error', '*thêm không thành công');
        }
    }

    public function edit($id)
    {
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

        try {
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
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('banners.index')->with('error', 'Xóa không thành công');
        }
    }
}
