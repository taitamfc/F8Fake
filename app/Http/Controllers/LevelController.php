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
    public function index()
    {
        $levels = Level::search()->paginate(5);
        return view('Admin.levels.index', compact('levels')) ;
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

        Level::create([
            'title' => $request->title,
        ]);
        Session::flash('success','thêm mới thanh công');
        return redirect()->route('levels.index');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
       $level->delete();
       return redirect()->route('levels.index');
    }

}
