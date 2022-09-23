<?php

namespace App\Http\Controllers;

use App\Exports\TracksExport;
use App\Http\Requests\TrackRequest;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

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
            $query->title($title);
        }
        if ($is_free) {
            $query->is_free($is_free);
        }
        if ($position) {
            $query->position($position);
        }
        if ($course_id) {
            $query->course_id($course_id);
        }
        if ($id) {
            $query->id($id);
        }
        // thực hiện tìm kiếm nhanh
        if ($key) {
            $query->orWhere('id', $key);
        }
        if ($key) {
            $query->orWhere('title', $key);
        }
        // sắp xếp và phân trang
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
        return view('Admin.tracks.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.tracks.create');
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
            return redirect()->route('tracks.index')->with('success', 'Thêm' . ' ' . $request->title . ' ' .  ' thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('failed', 'Thêm mới thất bại');
            return redirect()->route('tracks.index')->with('failed', 'Thêm' . ' ' . $request->title . ' ' .  ' không thành công');
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
        return view('Admin.tracks.edit', compact('tracks'));
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
            return redirect()->route('tracks.index')->with('success', 'Sửa' . ' ' . $request->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('tracks.index')->with('failed', 'Sửa' . ' ' . $request->title . ' ' .  'không thành công');
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
            return redirect()->route('tracks.index')->with('success', 'Xóa' . ' ' . $track->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('tracks.index')->with('failed', 'Xóa' . ' ' . $track->title . ' ' .  'không thành công');
        }
    }

    public function getTrashed(Request $request)
    {
        $tracks = Track::onlyTrashed()->latest()->paginate(5);
        $params = [
            'tracks' => $tracks,
        ];
        return view('admin.tracks.trash', $params);
    }

    public function force_destroy($id)
    {
        $track = Track::withTrashed()->findOrFail($id);
        $track->forceDelete();
        try {
            $track->forceDelete();
            return redirect()->route('tracks.index')->with('success', 'Xóa' . ' ' . $track->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('tracks.index')->with('failed', 'Xóa' . ' ' . $track->title . ' ' .  'không thành công');
        }
    }

    public function restore($id)
    {
        $track = Track::withTrashed()->find($id);
        $track->restore();
        try {
            return redirect()->route('tracks.index')->with('success', 'Khôi phục' . ' ' . $track->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('tracks.index')->with('failed', 'Khôi phục' . ' ' . $track->title . ' ' .  'không thành công');
        }
    }
    public function export()
    {
        return Excel::download(new TracksExport, 'tracks.xlsx');
    }
}
