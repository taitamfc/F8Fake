<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequirementRequest;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
            $query->where('content', 'LIKE', '%' . $content . '%');
        }
        if ($course_id) {
            $query->where('course_id', 'LIKE', '%' . $course_id . '%');
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            // $query->orWhere('content', 'LIKE', '%' . $key . '%');
            // $query->orWhere('course_id', 'LIKE', '%' . $key . '%');
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
        return view('Admin.requirement.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.requirement.create');
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
            return redirect()->route('requirement.index')->with('success', 'Thêm' . ' ' . $request->content . ' ' .  ' mới thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('failed', 'Thêm mới thất bại');
            return redirect()->route('requirement.index')->with('error', 'Thêm' . ' ' . $request->content . ' ' .  ' mới không thành công');
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
        return view('Admin.requirement.edit', compact('requirements'));
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
            return redirect()->route('requirement.index')->with('success', 'Sửa' . ' ' . $request->content . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('requirement.index')->with('error', 'Sửa' . ' ' . $request->content . ' ' .  'không thành công');
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
            return redirect()->route('requirement.index')->with('failed', 'Xóa' . ' ' . $requirement->content . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('requirement.index')->with('error', 'Xóa' . ' ' . $requirement->content . ' ' .  'không thành công');
        }
    }
}
