<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key        = $request->key ?? '';
        $title      = $request->title ?? '';
        $id         = $request->id ?? '';
         $query = Course::query(true);
       if($title){
            $query->where('title','LIKE','%'.$title.'%')->where('deleted_at','=',null);
        }
        if($id){
            $query->where('id',$id)->where('deleted_at','=',null);
        }
        if($key){
            $query->orWhere('id',$key)->where('deleted_at','=',null);
            $query->orWhere('title','LIKE','%'.$key.'%')->where('deleted_at','=',null);
        }
        $Courses = $query->where('deleted_at','=',null)->paginate(5);
        $params = [
            'f_id'        => $id,
            'f_title'     => $title,
            'f_key'       => $key,
            'courses'    => $Courses,
        ];
        return view('Admin.courses.index', $params) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $levels = Level::all();
       return view('Admin.courses.create', compact('levels'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        // dd($request->all());
        $course= new Course();
        $course->level_id = $request->level_id;
        $course->title = $request->title;
        $course->certificate_name = $request->certificate_name;
        $course->slug = $request->slug;
        $course->description = $request->description;
        $course->compeleted_content = $request->compeleted_content;
        $course->icon = $request->icon;
        $course->content = $request->content;
        $course->video_type = $request->video_type;
        $course->video = $request->video;
        $course->pass_percent = $request->pass_percent;
        $course->priority = $request->priority;
        $course->student_count = $request->student_count;
        $course->old_prive = $request->old_prive;
        $course->price = $request->price;
        $course->pre_order_price = $request->pre_order_price;
        $course->is_relatable = $request->is_relatable;
        $course->is_coming_soon = $request->is_coming_soon;
        $course->is_pro = $request->is_pro;
        $course->is_completable = $request->is_completable;
        $course->published_at = $request->published_at;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension();//jpg,png lấy ra định dạng file và trả về
            $fileName = time();//45678908766 tạo tên file theo thời gian
            $newFileName = $fileName.'.'.$fileExtension;//45678908766.jpg
            $path = 'storage/'. $request->file('image')->store('images', 'public');//lưu file vào mục public/images với tê mới là $newFileName
            $course->image = $path;
        }

        try {
            $course->save();
            Session::flash('success','Thêm mới Thành công');
            return redirect()->route('courses.index');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error','Thêm mới thất bại');
            return redirect()->route('courses.index')->with('error', 'Thêm' . ' ' . $request->title . ' ' .  ' mới không thành công');
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
        $course = Course::find($id);
        $levels = Level::all();
        return view('Admin.courses.edit', compact('levels','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, $id)
    {
        $course = Course::find($id);
        $course->level_id = $request->level_id;
        $course->title = $request->title;
        $course->certificate_name = $request->certificate_name;
        $course->slug = $request->slug;
        $course->description = $request->description;
        $course->compeleted_content = $request->compeleted_content;
        $course->icon = $request->icon;
        $course->content = $request->content;
        $course->video_type = $request->video_type;
        $course->video = $request->video;
        $course->pass_percent = $request->pass_percent;
        $course->priority = $request->priority;
        $course->student_count = $request->student_count;
        $course->old_prive = $request->old_prive;
        $course->price = $request->price;
        $course->pre_order_price = $request->pre_order_price;
        $course->is_relatable = $request->is_relatable;
        $course->is_coming_soon = $request->is_coming_soon;
        $course->is_pro = $request->is_pro;
        $course->is_completable = $request->is_completable;
        $course->published_at = $request->published_at;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension();//jpg,png lấy ra định dạng file và trả về
            $fileName = time();//45678908766 tạo tên file theo thời gian
            $newFileName = $fileName.'.'.$fileExtension;//45678908766.jpg
            $path = 'storage/'. $request->file('image')->store('images', 'public');//lưu file vào mục public/images với tê mới là $newFileName
            $course->image = $path;
        }

        try {
            $course->save();
            Session::flash('success','Cập nhật Thành công');
            return redirect()->route('courses.index');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error','Thêm mới thất bại');
            return redirect()->route('courses.index')->with('error', 'Thêm' . ' ' . $request->title . ' ' .  ' mới không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            Course::findOrFail($id)->delete();
            Session::flash('success','Xóa Thành công');
            return redirect()->route('courses.trash');
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            Session::flash('error','xóa thất bại ');
            return redirect()->route('courses.trash')->with('error', 'xóa không thành công');
        }
    }
    function SoftDeletes($id){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $course = Course::findOrFail($id);
        $course->deleted_at= date("Y-m-d h:i:s");
        try {
            $course->save();
            Session::flash('success','Xóa Thành công');
            return redirect()->route('courses.index');
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            Session::flash('error','xóa thất bại ');
            return redirect()->route('courses.index')->with('error', 'xóa không thành công');
        }
    }
    function RestoreDelete($id){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $course = Course::findOrFail($id);
        $course->deleted_at= null;
        try {
            $course->save();
            Session::flash('success','Khôi phục ' .$course->title . ' thành công');
            return redirect()->route('courses.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error','xóa thất bại ');
            return redirect()->route('courses.trash')->with('error', 'xóa không thành công');
        }
    }
    function trash(Request $request){
        $key        = $request->key ?? '';
        $title      = $request->title ?? '';
        $id         = $request->id ?? '';
         $query = Course::query(true);
       if($title){
            $query->where('title','LIKE','%'.$title.'%')->where('deleted_at','!=',null);
        }
        if($id){
            $query->where('id',$id)->where('deleted_at','!=',null);
        }
        if($key){

            $query->orWhere('id',$key)->where('deleted_at','!=',null);
            $query->orWhere('title','LIKE','%'.$key.'%')->where('deleted_at','!=',null);
        }
        $Courses = $query->where('deleted_at','!=',null)->paginate(5);
        $params = [
            'f_id'        => $id,
            'f_title'     => $title,
            'f_key'       => $key,
            'courses'    => $Courses,
        ];
        return view('Admin.courses.trash', $params) ;
    }

}
