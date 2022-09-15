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

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Lấy params trên url
        $key        = $request->key ?? '';
        $title      = $request->title ?? '';
        $id         = $request->id ?? '';

        // thực hiện query
        $query = Level::query(true);
        if($title){
            $query->where('title','LIKE','%'.$title.'%');
        }
        if($id){
            $query->where('id',$id);
        }
        if($key){
            $query->orWhere('id',$key);
            $query->orWhere('title','LIKE','%'.$key.'%');
        }
        $levels = $query->paginate(5);

        $params = [
            'f_id'        => $id,
            'f_title'     => $title,
            'f_key'       => $key,
            'levels'    => $levels,
        ];
        return view('Admin.levels.index', $params) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            Session::flash('failed','Thêm mới thất bại');
            return redirect()->route('track.index')->with('error', 'Thêm' . ' ' . $request->title . ' ' .  ' mới không thành công');
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
        return redirect()->route('levels.index')->with($notification);
        try {
            $level->update([
                'title' => $request->title
            ]);
            $notification = array(
                'message' => 'Chỉnh sửa danh mục thành công',
                'alert-type' => 'success'
            );
            return redirect()->route('levels.index')->with($notification);


        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('failed','Thêm mới thất bại');
            return redirect()->route('track.index')->with('error', 'Thêm' . ' ' . $request->title . ' ' .  ' mới không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
       try {
        $level->delete();
        return redirect()->route('levels.index');
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        Session::flash('failed','Thêm mới thất bại');
        return redirect()->route('track.index')->with('error', 'xóa không thành công');
    }
    }

}
