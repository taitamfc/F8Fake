<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportBanner;
use App\Exports\ExportBanner;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $banners = banner::get();
        // $banners = banner::orderBy('created_at', 'DESC')->search()->paginate(4);
        // return view('Admin.banners.index', compact('banners'));


        $key        = $request->key ?? '';
        $placement      = $request->placement ?? '';
        $type      = $request->type ?? '';
        $title      = $request->title ?? '';
        $id         = $request->id ?? '';


        // thực hiện query
        $query = Banner::query(true);
        if ($placement) {
            $query->where('placement', 'LIKE', '%' . $placement . '%')->where('deleted_at', '=', null);
        }
        if ($type) {
            $query->where('type', 'LIKE', '%' . $type . '%')->where('deleted_at', '=', null);
        }
        if ($title) {
            $query->where('title', 'LIKE', '%' . $title . '%')->where('deleted_at', '=', null);
        }
        if ($id) {
            $query->where('id', $id)->where('deleted_at', '=', null);
        }
        if ($key) {
            $query->orWhere('id', $key)->where('deleted_at', '=', null);
            $query->orWhere('placement', 'LIKE', '%' . $key . '%')->where('deleted_at', '=', null);
            $query->orWhere('type', 'LIKE', '%' . $key . '%')->where('deleted_at', '=', null);
            $query->orWhere('title', 'LIKE', '%' . $key . '%')->where('deleted_at', '=', null);
        }
        $banners = $query->where('deleted_at', '=', null)->paginate(5);

        $params = [
            'f_id'        => $id,
            'f_placement' => $placement,
            'f_type'     => $type,
            'f_title'     => $title,
            'f_key'       => $key,
            'banners'    => $banners,
        ];
        return view('Admin.banners.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            Session::flash('success', 'Tạo mới thành công');
            //tao moi xong quay ve trang danh sach task
            return redirect()->route('banners.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('banners.index')->with('error', 'Tạo mới không thành công');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banners = Banner::findOrFail($id);

        return view('Admin.banners.edit', compact('banners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, $id)
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
            //dung session de dua ra thong bao
            Session::flash('success', 'Cập nhật thành công');
            //tao moi xong quay ve trang danh sach product
            return redirect()->route('banners.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('banners.index')->with('error', 'cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     
    public function destroy($id)
    {
        $banners = Banner::findOrFail($id);

        try {
            $image = str_replace('storage', 'public', $banners->image);;
            Storage::delete($image);
            $banners->destroy($id);
            //dung session de dua ra thong bao
            Session::flash('success', 'Xóa Thành công');
            //xoa xong quay ve trang danh sach banners
            return redirect()->route('banners.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('banners.trash')->with('error', 'Xóa không thành công');
        }
    }

    public function trashedItems(Request $request){
        $key        = $request->key ?? '';
        $placement         = $request->placement ?? '';
        $type      = $request->type ?? '';
        $title      = $request->title ?? '';
        $id         = $request->id ?? '';


        // thực hiện query
        $query = Banner::query(true);
        if ($placement) {
            $query->where('placement', 'LIKE', '%' . $placement . '%')->where('deleted_at', '!=', null);
        }
        if ($type) {
            $query->where('type', 'LIKE', '%' . $type . '%')->where('deleted_at', '!=', null);
        }
        if ($title) {
            $query->where('title', 'LIKE', '%' . $title . '%')->where('deleted_at', '!=', null);
        }
        if ($id) {
            $query->where('id', $id)->where('deleted_at', '!=', null);
        }
        if ($key) {
            $query->orWhere('id', $key)->where('deleted_at', '!=', null);
            $query->orWhere('placement', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
            $query->orWhere('type', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
            $query->orWhere('title', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
        }
        $banners = $query->where('deleted_at', '!=', null)->paginate(5);

        $params = [
            'f_id'        => $id,
            'f_placement' => $placement,
            'f_type'     => $type,
            'f_title'     => $title,
            'f_key'       => $key,
            'banners'    => $banners,
        ];
        return view('Admin.banners.trash', $params);
     }

     public function force_destroy($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $banners = Banner::findOrFail($id);
        $banners->deleted_at = date("Y-m-d h:i:s");
        try {
            $banners->save();
            Session::flash('success', 'Đã chuyển vào thùng rác');
            return redirect()->route('banners.index');
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('banners.index')->with('error', 'xóa không thành công');
        }
       
    }

    public function restore($id)
    {
        $banners = Banner::findOrFail($id);
        $banners->deleted_at = null;
        try {
            $banners->save();
            Session::flash('success', 'Khôi phục thành công');
            return redirect()->route('banners.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('banners.trash')->with('error', 'xóa không thành công');
        }
    }

    public function exportBanners(Request $request){
        return Excel::download(new ExportBanner, 'users.xlsx');
    }
}

