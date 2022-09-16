<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $students = Student::get();
        // $students = Student::orderBy('created_at', 'DESC')->search()->paginate(4);
        // return view('Admin.students.index', compact('students'));


        $key        = $request->key ?? '';
        $name         = $request->name ?? '';
        $email      = $request->email ?? '';
        $id         = $request->id ?? '';


        // thực hiện query
        $query = Student::query(true);
        if($name){
            $query->where('name','LIKE','%'.$name.'%');
        }
        if($email){
            $query->where('email','LIKE','%'.$email.'%');
        }
        if($id){
            $query->where('id',$id);
        }
        if($key){
            $query->orWhere('id',$key);
            $query->orWhere('name','LIKE','%'.$key.'%');
            $query->orWhere('email','LIKE','%'.$key.'%');
        }
        $students = $query->paginate(5);

        $params = [
            'f_id'        => $id,
            'f_name'     => $name,
            'f_email'     => $email,
            'f_key'       => $key,
            'students'    => $students,
        ];
        return view('Admin.students.index', $params) ;
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::get();
        return view('Admin.students.add', compact('students'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $students = new Student();
        $students->name = $request->name;
        $students->email = $request->email;
        $students->password = $request->password;
        
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('image')->store('image', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $students->image = $path;
        }
        $students->save();

        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('students.index');
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

        return view('Admin.students.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        
        $students = Student::findOrFail($id);
        $students->name = $request->name;
        $students->email = $request->email;
        $students->password = $request->password;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('image')->store('image', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $students->image = $path;
        }
        $students->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach product
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $image = $student->image;
        $image = 'public/uploads/student/' . $student->image;
        if (file_exists($image)) {
            unlink($image);
        }
        $student->delete();
        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach student
        return redirect()->route('students.index');
    }
}
