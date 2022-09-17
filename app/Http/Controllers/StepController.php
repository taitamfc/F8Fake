<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepRequest;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class StepController extends Controller
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
        $original_name      = $request->original_name ?? '';
        $id         = $request->id ?? '';

        // thực hiện query
        $query = Step::query(true);
        if ($title) {
            $query->where('title', 'LIKE', '%' . $title . '%');
        }
        if ($original_name) {
            $query->where('original_name', 'LIKE', '%' . $original_name . '%');
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            // $query->orWhere('title', 'LIKE', '%' . $key . '%');
            // $query->orWhere('original_name', 'LIKE', '%' . $key . '%');
        }

        $query->orderBy('id', 'DESC');
        $steps = $query->paginate(5);

        $params = [
            'id'        => $id,
            'title'     => $title,
            'original_name'     => $original_name,
            'key'       => $key,
            'steps'    => $steps,
        ];
        return view('Admin.step.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        try {
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
            // dd($path);
            $steps->save();
            return redirect()->route('step.index')->with('success', 'Thêm' . ' ' . $request->title . ' ' .  ' mới thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('failed', 'Thêm mới thất bại');
            return redirect()->route('step.index')->with('failed', 'Thêm' . ' ' . $request->title . ' ' .  ' mới không thành công');
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
    public function edit(Request $request,$id)
    {
        $steps = Step::all();
        $steps = Step::find($id);

        return view('Admin.step.edit', compact('steps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $step = Step::find($id);
            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
                $fileName = time(); //45678908766 tạo tên file theo thời gian
                $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
                $path = 'storage/' . $request->file('image')->store('image', 'public'); //lưu file vào mục public/steps với tê mới là $newFileName
                $step->image = $path;
            }

            $step->title = $request->title;
            $step->content = $request->content;
            $step->description = $request->description;
            $step->duration = $request->duration;
            $step->video_type = $request->video_type;
            $step->original_name = $request->original_name;
            $step->video = $request->video;
            $step->image_url = $request->image_url;
            $step->video_url = $request->video_url;

            $step->save();
            return redirect()->route('step.index')->with('success', 'Sửa' . ' ' . $request->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('step.index')->with('failed', 'Sửa' . ' ' . $request->title . ' ' .  'không thành công');
        }
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
        try {
            $step->delete();
            return redirect()->route('step.index')->with('success', 'Xóa' . ' ' . $step->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('step.index')->with('failed', 'Xóa' . ' ' . $step->title . ' ' .  'không thành công');
        }
    }
}
