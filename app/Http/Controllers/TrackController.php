<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackRequest;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = Track::orderBy('created_at','DESC')->search()->paginate(3);

        return view('Admin.track.index', compact('tracks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Admin.track.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrackRequest $request)
    {

        try {
            Track::create($request->all());
            Session::flash('success','Thêm mới thành công');
            return redirect()->route('track.index')->with('success', 'Thêm' . ' ' . $request->title . ' ' .  ' mới thành công');

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
    public function edit($id)
    {
        $tracks = Track::all();
        $tracks = Track::find($id);
        Session::flash('success','Sửa thành công');
        return view('Admin.track.edit', compact('tracks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        $track->update($request->all());
        Session::flash('success','Cập nhật thành công');
        return redirect()->route('track.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $tracks,$id)
    {
        $track = $tracks->find($id);
        $track->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('track.index');
    }
}
