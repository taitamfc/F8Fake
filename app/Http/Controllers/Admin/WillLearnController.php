<?php

namespace App\Http\Controllers\Admin;


use App\Exports\ExportWillLearn;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWillLearnRequest;
use App\Models\Course;
use App\Models\WillLearn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class WillLearnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', WillLearn::class);

        $courses = Course::all();
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
            'f_id'          => $id,
            'f_content'     => $content,
            'f_key'         => $key,
            'f_course_id'   => $course_id,
            'f_courses'       => $courses,
            'WillLearns'    => $WillLearns,
        ];
        return view('Admin.will_learns.index', $params);
    }

    public function create()
    {
        $this->authorize('create', WillLearn::class);

        $courses = Course::all()->where('deleted_at','=',null);
        return view('Admin.will_learns.create', compact('courses'));
    }
    public function store(StoreWillLearnRequest $request)
    {
        $WillLearns = new WillLearn();
        $WillLearns->course_id = $request->course_id;
        $WillLearns->content = $request->content;
        try {
            $WillLearns->save();
            return redirect()->route('Will-learns.index')->with('success', 'Thêm' . ' ' . $request->content . ' ' .  ' mới thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('Will-learns.index')->with('error', 'Thêm' . ' ' . $request->title . ' ' .  ' mới không thành công');
        }
    }
    public function show($id)
    {
    }

    public function edit($id)
    {
        $this->authorize('update', WillLearn::class);
        $courses = Course::all()->where('deleted_at','=',null);
        $WillLearn =  WillLearn::find($id);
        return view('Admin.will_learns.edit', compact('courses', 'WillLearn'));
    }
    public function update(Request $request, $id)
    {
        $WillLearn =  WillLearn::find($id);
        $WillLearn->course_id = $request->course_id;
        $WillLearn->content = $request->content;
        try {
            $WillLearn->save();
            return redirect()->route('Will-learns.index')->with('success', 'Thêm' . ' ' . $request->content . ' ' .  ' mới thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'cập nhật thất bại');
            return redirect()->route('Will-learns.index')->with('error', 'cập nhật' . ' ' . $request->title . ' ' .  ' mới không thành công');
        }
    }

    public function destroy($id)
    {
        $this->authorize('delete', WillLearn::class);
        try {
            WillLearn::findOrFail($id)->delete();
            Session::flash('success', 'Xóa thanh công');
            return redirect()->route('Will-learns.trash');
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('Will-learns.trash')->with('error', 'xóa không thành công');
        }
    }

    function SoftDeletes($id)
    {
        $this->authorize('forceDelete', WillLearn::class);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $course = WillLearn::findOrFail($id);
        $course->deleted_at = date("Y-m-d h:i:s");
        try {
            $course->save();
            Session::flash('success', 'Xóa Thành công');
            return redirect()->route('Will-learns.index');
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('Will-learns.index')->with('error', 'xóa không thành công');
        }
    }

    function RestoreDelete($id)
    {
        $this->authorize('restore', WillLearn::class);

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $WillLearn = WillLearn::findOrFail($id);
        $WillLearn->deleted_at = null;
        try {
            $WillLearn->save();
            Session::flash('success', 'Khôi phục ' . $WillLearn->title . ' thành công');
            return redirect()->route('Will-learns.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('Will-learns.trash')->with('error', 'xóa không thành công');
        }
    }

    function trash(Request $request)
    {
        $courses = Course::all();
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
            'f_courses'       => $courses,
        ];
        return view('Admin.will_learns.trash', $params);
    }
    public function exportWillLearn(Request $request){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        return Excel::download(new ExportWillLearn, "WillLearns-".date("Y-m-d h:i:s").".xlsx");
    }
}
