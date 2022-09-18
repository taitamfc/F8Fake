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
    public function index(Request $request)
    {
        //Lấy params trên url
        $key        = $request->key ?? '';
        $title      = $request->title ?? '';
        $is_free      = $request->is_free ?? '';
        $position      = $request->position ?? '';
        $course_id      = $request->course_id ?? '';
        $id         = $request->id ?? '';

        // thực hiện query
        $query = Track::query(true);
        if ($title) {
            $query->where('title', 'LIKE', '%' . $title . '%');
        }
        if ($is_free) {
            $query->where('is_free', 'LIKE', '%' . $is_free . '%');
        }
        if ($position) {
            $query->where('position', 'LIKE', '%' . $position . '%');
        }
        if ($course_id) {
            $query->where('course_id', $course_id);
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
        }
        $query->orderBy('id', 'DESC');
        $tracks = $query->paginate(5);

        $params = [
            'id'        => $id,
            'title'     => $title,
            'is_free'     => $is_free,
            'position'     => $position,
            'course_id'     => $course_id,
            'key'       => $key,
            'tracks'    => $tracks,
        ];
        return view('Admin.track.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.track.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrackRequest $request)
    {

        $track = new Track();
        $track->title = $request->title;
        $track->is_free = $request->is_free;
        $track->position = $request->position;
        $track->course_id = $request->course_id;
        try {
            $track->save();
            return redirect()->route('track.index')->with('success', 'Thêm' . ' ' . $request->title . ' ' .  ' thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('failed', 'Thêm mới thất bại');
            return redirect()->route('track.index')->with('failed', 'Thêm' . ' ' . $request->title . ' ' .  ' không thành công');
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
        return view('Admin.track.edit', compact('tracks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrackRequest $request, $id)
    {
        $track = Track::find($id);
        $track->title = $request->title;
        $track->is_free = $request->is_free;
        $track->position = $request->position;
        $track->course_id = $request->course_id;
        try {
            $track->save();
            return redirect()->route('track.index')->with('success', 'Sửa' . ' ' . $request->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('track.index')->with('failed', 'Sửa' . ' ' . $request->title . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $tracks, $id)
    {
        $track = $tracks->find($id);
        try {
            $track->delete();
            return redirect()->route('track.index')->with('success', 'Xóa' . ' ' . $track->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('track.index')->with('failed', 'Xóa' . ' ' . $track->title . ' ' .  'không thành công');
        }
    }

    public function getTrashed(Request $request)
    {
        $tracks = Track::onlyTrashed()->latest()->get();
        $params = [
            'tracks' => $tracks,
        ];
        return view('admin.track.trash', $params);
    }

    public function force_destroy($id)
    {
        $track = Track::withTrashed()->findOrFail($id);
        $track->forceDelete();
        try {
            $track->forceDelete();
            return redirect()->route('track.index')->with('success', 'Xóa' . ' ' . $track->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('track.index')->with('faild', 'Xóa' . ' ' . $track->title . ' ' .  'không thành công');
        }
    }

    public function restore($id)
    {
        $track = Track::withTrashed()->find($id);
        $track->restore();
        try {
            return redirect()->route('track.index')->with('success', 'Khôi phục' . ' ' . $track->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('track.index')->with('faild', 'Khôi phục' . ' ' . $track->title . ' ' .  'không thành công');
        }
    }
}
