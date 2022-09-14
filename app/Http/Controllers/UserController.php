<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = User::orderBy('created_at', 'DESC')->paginate(3);
        return view('Admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.users.add');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->remember_token = $request->remember_token;
        $users->username = $request->username;
        $users->first_name = $request->first_name;
        $users->last_name = $request->last_name;
        $users->full_name = $request->full_name;
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('avatar')->store('avatar', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $users->avatar = $path;
        }
        $users->bio = $request->bio;
        $users->group_id = $request->group_id;
        $users->avatar_url = $request->avatar_url;
        $users->cover_url = $request->cover_url;
        $users->is_comment_blocked = $request->is_comment_blocked;
        $users->is_blocked = $request->is_blocked;
        $users->save();
        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('users.index');
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
        $users = User::findOrFail($id);

        return view('Admin.users.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $users = User::findOrFail($id);

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->remember_token = $request->remember_token;
        $users->username = $request->username;
        $users->first_name = $request->first_name;
        $users->last_name = $request->last_name;
        $users->full_name = $request->full_name;
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('avatar')->store('avatar', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $users->avatar = $path;
        }
        $users->bio = $request->bio;
        $users->group_id = $request->group_id;
        $users->avatar_url = $request->avatar_url;
        $users->cover_url = $request->cover_url;
        $users->is_comment_blocked = $request->is_comment_blocked;
        $users->is_blocked = $request->is_blocked;



        $users->save();
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->destroy($id);
        // return response()->json(['customer' => 'delete successFully']);

        Storage::delete($users->avatar);
        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach customer
        return redirect()->route('users.index');
    }
}
