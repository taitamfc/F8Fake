<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::get();
        return view('Admin.students.list',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::get();
        return view('Admin.students.add',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'image' => 'required'
            ],
            [
                'name.required' => 'Yêu cầu nhập Họ tên',
                'email.required' => 'Yêu cầu nhập email',
                // 'email.email' => 'email đã tồn tại',
                'password.required' => 'Yêu cầu nhập mật khẩu',
                'image.required' => 'Yêu cầu thêm ảnh'
            ]
        );
        
        $students = new Student();
        $students->name = $request->input('name');
        $students->email = $request->input('email');
        $students->password = $request->input('password');

        $get_image = $request->image;
        $path = 'AdminTheme/public/uploads/student/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $students->image = $new_image;
        $request['login_image'] = $new_image;

//         $students = $request->input('image');
// $photo = $request->file('image')->getClientOriginalName();
// $destination = base_path() . '/AdminTheme/public/uploads/student/';
// $request->file('image')->move($destination, $photo);

        $students->save();

        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('students.list');
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
        $students = Student::findOrFail($id);

        return view('Admin.students.edit',compact('students'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
