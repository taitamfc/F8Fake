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
            $query->title($title);
        }
        if ($original_name) {
            $query->original_name($original_name);
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
        if ($key) {
            $query->orWhere('original_name', $key);
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
        return view('Admin.steps.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $steps = Step::all();
        return view('Admin.steps.create', compact('steps'));
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

            $steps->save();
            return redirect()->route('steps.index')->with('success', 'Thêm' . ' ' . $request->title . ' ' .  ' thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('failed', 'Thêm mới thất bại');
            return redirect()->route('steps.index')->with('failed', 'Thêm' . ' ' . $request->title . ' ' .  ' không thành công');
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

        return view('Admin.steps.edit', compact('steps'));
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
            return redirect()->route('steps.index')->with('success', 'Sửa' . ' ' . $request->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('steps.index')->with('failed', 'Sửa' . ' ' . $request->title . ' ' .  'không thành công');
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
            return redirect()->route('steps.index')->with('success', 'Xóa' . ' ' . $step->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('steps.index')->with('failed', 'Xóa' . ' ' . $step->title . ' ' .  'không thành công');
        }
    }
    public function getTrashed(Request $request)
    {
        $steps = Step::onlyTrashed()->latest()->paginate(5);
        $params = [
            'steps' => $steps,
        ];
        return view('admin.steps.trash', $params);
    }

    public function force_destroy($id)
    {
        $step = Step::withTrashed()->findOrFail($id);
        $step->forceDelete();
        try {
            $step->forceDelete();
            return redirect()->route('steps.index')->with('success', 'Xóa' . ' ' . $step->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('steps.index')->with('failed', 'Xóa' . ' ' . $step->title . ' ' .  'không thành công');
        }
    }

    public function restore($id)
    {
        $step = Step::withTrashed()->find($id);
        $step->restore();
        try {
            return redirect()->route('steps.index')->with('success', 'Khôi phục' . ' ' . $step->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('steps.index')->with('failed', 'Khôi phục' . ' ' . $step->title . ' ' .  'không thành công');
        }
    }
}

