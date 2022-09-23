<?php

namespace App\Http\Controllers;

use App\Exports\RequirementsExport;
use App\Http\Requests\RequirementRequest;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class RequirementController extends Controller
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
        $content      = $request->content ?? '';
        $course_id      = $request->course_id ?? '';
        $id         = $request->id ?? '';

        // thực hiện query
        $query = Requirement::query(true);
        if ($content) {
            $query->content($content);
        }
        if ($course_id) {
            $query->course_id($course_id);
        }
        if ($id) {
            $query->id($id);
        }
        //thực hiện tìm kiếm nhanh
        if ($key) {
            $query->orWhere('id', $key);
        }
        if ($key) {
            $query->orWhere('content', $key);
        }
        if ($key) {
            $query->orWhere('course_id', $key);
        }

        $query->orderBy('id', 'DESC');
        $requirements = $query->paginate(5);
        $params = [
            'id'        => $id,
            'content'     => $content,
            'course_id'     => $course_id,
            'key'       => $key,
            'requirements'    => $requirements,
        ];
        return view('Admin.requirements.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.requirements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequirementRequest $request)
    {
        $requirement = new Requirement();
        $requirement->content = $request->content;
        $requirement->course_id = $request->course_id;
        try {
            $requirement->save();
            return redirect()->route('requirements.index')->with('success', 'Thêm' . ' ' . $request->content . ' ' .  ' thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('failed', 'Thêm mới thất bại');
            return redirect()->route('requirements.index')->with('failed', 'Thêm' . ' ' . $request->content . ' ' .  ' không thành công');
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
        $requirements = Requirement::all();
        $requirements = Requirement::find($id);
        return view('Admin.requirements.edit', compact('requirements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequirementRequest $request, $id)
    {
        $requirement = Requirement::find($id);
        $requirement->content = $request->content;
        $requirement->course_id = $request->course_id;
        try {
            $requirement->save();
            return redirect()->route('requirements.index')->with('success', 'Sửa' . ' ' . $request->content . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('requirements.index')->with('failed', 'Sửa' . ' ' . $request->content . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requirement $requirements, $id)
    {
        $requirement = $requirements->find($id);
        try {
            $requirement->delete();
            return redirect()->route('requirements.index')->with('success', 'Xóa' . ' ' . $requirement->content . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('requirements.index')->with('failed', 'Xóa' . ' ' . $requirement->content . ' ' .  'không thành công');
        }
    }
    public function getTrashed(Request $request)
    {
        $requirements = Requirement::onlyTrashed()->latest()->paginate(5);
        $params = [
            'requirements' => $requirements,
        ];
        return view('admin.requirements.trash', $params);
    }

    public function force_destroy($id)
    {
        $requirement = Requirement::withTrashed()->findOrFail($id);
        $requirement->forceDelete();
        try {
            $requirement->forceDelete();
            return redirect()->route('requirements.index')->with('success', 'Xóa' . ' ' . $requirement->content . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('requirements.index')->with('failed', 'Xóa' . ' ' . $requirement->content . ' ' .  'không thành công');
        }
    }

    public function restore($id)
    {
        $requirement = Requirement::withTrashed()->find($id);
        $requirement->restore();
        try {
            return redirect()->route('requirements.index')->with('success', 'Khôi phục' . ' ' . $requirement->content . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('requirements.index')->with('failed', 'Khôi phục' . ' ' . $requirement->content . ' ' .  'không thành công');
        }
    }
    public function export()
    {
        return Excel::download(new RequirementsExport, 'requirements.xlsx');
    }
}
