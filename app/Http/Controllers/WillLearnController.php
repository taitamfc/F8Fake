<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWillLearnRequest;
use App\Models\Course;
use App\Models\WillLearn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class WillLearnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key        = $request->key ?? '';
        $content      = $request->content ?? '';
        $id         = $request->id ?? '';
        $course_id         = $request->course_id ?? '';

        $query = WillLearn::query(true);
        if ($content) {
            $query->where('content', 'LIKE', '%' . $content . '%')->where('deleted_at', '=', null);
        }
        if ($course_id) {
            $query->where('course_id', 'LIKE', '%' . $course_id . '%')->where('deleted_at', '=', null);
        }
        if ($id) {
            $query->where('id', $id)->where('deleted_at', '=', null);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('content', 'LIKE', '%' . $key . '%')->where('deleted_at', '=', null);
            $query->orWhere('course_id', 'LIKE', '%' . $key . '%')->where('deleted_at', '=', null);
        }
        $WillLearns = $query->where('deleted_at', '=', null)->paginate(5);
        $params = [
            'f_id'        => $id,
            'f_content'     => $content,
            'f_key'       => $key,
            'f_course_id'       => $course_id,
            'WillLearns'    => $WillLearns,
        ];
        return view('Admin.WillLearns.index', $params);
    }

    public function create()
    {
        $courses = Course::all();
        return view('Admin.WillLearns.create', compact('courses'));
    }
    public function store(StoreWillLearnRequest $request)
    {
        $WillLearns = new WillLearn();
        $WillLearns->course_id = $request->course_id;
        $WillLearns->content = $request->content;
        try {
            $WillLearns->save();
            return redirect()->route('WillLearns.index')->with('success', 'Thêm' . ' ' . $request->content . ' ' .  ' mới thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('WillLearns.index')->with('error', 'Thêm' . ' ' . $request->title . ' ' .  ' mới không thành công');
        }
    }
    public function show($id)
    {
    }

    public function edit($id)
    {
        $courses = Course::all();
        $WillLearn =  WillLearn::find($id);
        return view('Admin.WillLEarns.edit', compact('courses', 'WillLearn'));
    }
    public function update(Request $request, $id)
    {
        $WillLearn =  WillLearn::find($id);
        $WillLearn->course_id = $request->course_id;
        $WillLearn->content = $request->content;
        try {
            $WillLearn->save();
            return redirect()->route('WillLearns.index')->with('success', 'Thêm' . ' ' . $request->content . ' ' .  ' mới thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'cập nhật thất bại');
            return redirect()->route('WillLearns.index')->with('error', 'cập nhật' . ' ' . $request->title . ' ' .  ' mới không thành công');
        }
    }

    public function destroy($id)
    {
        try {
            WillLearn::findOrFail($id)->delete();
            Session::flash('success', 'Xóa thanh công');
            return redirect()->route('WillLearns.trash');
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('WillLearns.trash')->with('error', 'xóa không thành công');
        }
    }

    function SoftDeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $course = WillLearn::findOrFail($id);
        $course->deleted_at = date("Y-m-d h:i:s");
        try {
            $course->save();
            Session::flash('success', 'Xóa Thành công');
            return redirect()->route('WillLearns.index');
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('WillLearns.index')->with('error', 'xóa không thành công');
        }
    }

    function RestoreDelete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $WillLearn = WillLearn::findOrFail($id);
        $WillLearn->deleted_at = null;
        try {
            $WillLearn->save();
            Session::flash('success', 'Khôi phục ' . $WillLearn->title . ' thành công');
            return redirect()->route('WillLearns.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('WillLearns.trash')->with('error', 'xóa không thành công');
        }
    }

    function trash(Request $request)
    {
        $key        = $request->key ?? '';
        $content      = $request->content ?? '';
        $id         = $request->id ?? '';
        $course_id         = $request->course_id ?? '';
        $query = WillLearn::query(true);
        if ($content) {
            $query->where('content', 'LIKE', '%' . $content . '%')->where('deleted_at', '!=', null);
        }
        if ($id) {
            $query->where('id', $id)->where('deleted_at', '!=', null);
        }
        if ($course_id) {
            $query->where('course_id', 'LIKE', '%' . $course_id . '%')->where('deleted_at', '=', null);
        }
        if ($key) {

            $query->orWhere('id', $key)->where('deleted_at', '!=', null);
            $query->orWhere('content', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
        }
        $WillLearns = $query->where('deleted_at', '!=', null)->paginate(5);
        $params = [
            'f_id'        => $id,
            'f_content'     => $content,
            'f_key'       => $key,
            'f_course_id'       => $course_id,
            'WillLearns'    => $WillLearns,
        ];
        return view('Admin.WillLearns.trash', $params);
    }
}
