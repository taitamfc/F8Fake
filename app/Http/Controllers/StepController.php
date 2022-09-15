<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepRequest;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $steps = Step::orderBy('created_at','DESC')->search()->paginate(3);

        return view('Admin.step.index', compact('steps'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $steps = Step::all();
        return view('Admin.step.create', compact('steps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StepRequest $request)
    {

        $steps = new Step();
        $steps->title = $request->input('title');
        $steps->content = $request->input('content');
        $steps->description = $request->input('description');
        $steps->duration = $request->input('duration');
        $steps->video_type = $request->input('video_type');
        $steps->original_name = $request->input('original_name');
        $steps->video = $request->input('video');
        $steps->image_url = $request->input('image_url');
        $steps->video_url = $request->input('video_url');

        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('image')->store('image', 'public'); //lưu file vào mục public/steps với tê mới là $newFileName
            $steps->image = $path;
        }
        $steps->save();
        Session::flash('success','Thêm mới thành công');
        return redirect()->route('step.index');

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
        $steps = Step::all();
        $steps = Step::find($id);
        Session::flash('success','Sửa thành công');
        return view('Admin.step.edit', compact('steps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Step $step)
    {
        $step->update($request->all());
        Session::flash('success','Cập nhật thành công');
        return redirect()->route('step.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Step $steps, $id)
    {
        $step = $steps->find($id);
        $step->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('step.index');
    }
}
