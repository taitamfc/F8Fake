<?php

namespace App\Http\Controllers;

use App\Http\Requests\levelRequest;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdatelevelRequest;
use App\Models\Level;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Exports\ExportLevel;
use Maatwebsite\Excel\Facades\Excel;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key        = $request->key ?? '';
        $title      = $request->title ?? '';
        $id         = $request->id ?? '';

        $query = Level::query(true);
        if($title){
            $query->where('title','LIKE','%'.$title.'%')->where('deleted_at', '=', null);
        }
        if($id){
            $query->where('id',$id)->where('deleted_at', '=', null);
        }
        if($key){
            $query->orWhere('id',$key)->where('deleted_at', '=', null);
            $query->orWhere('title','LIKE','%'.$key.'%')->where('deleted_at', '=', null);
        }
        $levels = $query->where('deleted_at', '=', null)->paginate(5);
        $params = [
            'f_id'        => $id,
            'f_title'     => $title,
            'f_key'       => $key,
            'levels'    => $levels,
        ];
        return view('Admin.levels.index', $params) ;
    }


    public function create()
    {
        return view('Admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLevelRequest $request)
    {
        try {
            Level::create([
                'title' => $request->title,
            ]);
            Session::flash('success','thêm mới thanh công');
            return redirect()->route('levels.index')->with('success', 'Thêm' . ' ' . $request->title . ' ' .  ' mới thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error','Thêm mới thất bại');
            return redirect()->route('levels.index')->with('error', 'Thêm' . ' ' . $request->title . ' ' .  ' mới không thành công');
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
    public function edit(Level $level)
    {
        return view('Admin.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Level $level, UpdateLevelRequest $request)
    {

        $level->update([
            'title' => $request->title
        ]);
        $notification = array(
            'message' => 'Chỉnh sửa danh mục thành công',
            'alert-type' => 'success'
        );
        Session::flash('success','thêm mới thanh công');
        return redirect()->route('levels.index')->with($notification);
        try {
            $level->update([
                'title' => $request->title
            ]);
            Session::flash('success','cập nhật thành công thanh công');
            return redirect()->route('levels.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error','Thêm mới thất bại');
            return redirect()->route('levels.index')->with('error', 'Thêm' . ' ' . $request->title . ' ' .  ' mới không thành công');
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
       try {
        Level::findOrFail($id)->delete();
        Session::flash('success','Xóa thanh công');
        return redirect()->route('levels.trash');
    } catch (\Exception $e) {

        Log::error($e->getMessage());
        Session::flash('error','xóa thất bại ');
        return redirect()->route('levels.trash')->with('error', 'xóa không thành công');
    }
    }

    function SoftDeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $Level = Level::findOrFail($id);
        $Level->deleted_at = date("Y-m-d h:i:s");
        try {
            $Level->save();
            Session::flash('success', 'Xóa Thành công');
            return redirect()->route('levels.index');
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('levels.index')->with('error', 'xóa không thành công');
        }
    }

    function RestoreDelete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $Level = Level::findOrFail($id);
        $Level->deleted_at = null;
        try {
            $Level->save();
            Session::flash('success', 'Khôi phục ' . $Level->title . ' thành công');
            return redirect()->route('levels.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('levels.trash')->with('error', 'xóa không thành công');
        }
    }

    function trash(Request $request)
    {
        $key        = $request->key ?? '';
        $title      = $request->title ?? '';
        $id         = $request->id ?? '';
        $query = Level::query(true);
        if ($title) {
            $query->where('title', 'LIKE', '%' . $title . '%')->where('deleted_at', '!=', null);
        }
        if ($id) {
            $query->where('id', $id)->where('deleted_at', '!=', null);
        }
        if ($key) {

            $query->orWhere('id', $key)->where('deleted_at', '!=', null);
            $query->orWhere('content', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
        }
        $levels = $query->where('deleted_at', '!=', null)->paginate(5);
        $params = [
            'f_id'        => $id,
            'f_title'     => $title,
            'f_key'       => $key,
            'levels'    => $levels,
        ];
        return view('Admin.levels.trash', $params);
    }
    public function exportLevel(Request $request){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        return Excel::download(new ExportLevel, "Levels-".date("Y-m-d h:i:s").".xlsx");
    }

}
