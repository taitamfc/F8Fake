<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Lấy params trên url
        $key                    = $request->key ?? '';
        $name                   = $request->name ?? '';
        $id                     = $request->id ?? '';
        $description            = $request->description ?? '';
        // thực hiện query
        $query = Group::query(true);
        $query->orderBy('id', 'DESC');
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%')->where('deleted_at', '=', null);
        }
        if ($description) {
            $query->where('description', 'LIKE', '%' . $description . '%')->where('deleted_at', '=', null);
        }
        if ($id) {
            $query->where('id', $id)->where('deleted_at', '=', null);
        }
        if ($key) {
            $query->orWhere('id', $key)->where('deleted_at', '=', null);
            $query->orWhere('name', 'LIKE', '%' . $key . '%')->where('deleted_at', '=', null);
        }
        //Phân trang
        $groups = $query->where('deleted_at', '=', null)->paginate(3);

        $params = [
            'f_id'           => $id,
            'f_name'         => $name,
            'f_key'          => $key,
            'groups'         => $groups,
            'description'    => $description,
        ];
        return view('Admin.groups.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.groups.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
        $groups = new Group();
        $groups->name = $request->name;
        $groups->description = $request->description;

        try {
            $groups->save();
            //dung session de dua ra thong bao
            Session::flash('success', 'Tạo mới thành công');
            return redirect()->route('groups.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Thêm không thành công');
            return redirect()->route('groups.index');
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
        $group = Group::find($id);
        $roles = Role::all()->toArray();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        $group_names = [];
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'group_names' => $group_names
        ];
        return view('Admin.groups.edit', $params);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, $id)
    {
        $group = Group::findOrFail($id);
        $group->name = $request->name;
        $group->description = $request->description;
        // dd($request->all());
        try {
            $group->save();
             //detach xóa hết tất cả các record của bảng trung gian hiện tại
             $group->roles()->detach();
             //attach cập nhập các record của bảng trung gian hiện tại
             $group->roles()->attach($request->roles);
            //dung session de dua ra thong bao
            Session::flash('success', 'Cập nhật thành công');
            return redirect()->route('groups.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('groups.index')->with('error', 'Cập nhật' . ' ' . $request->name . ' ' .  ' không thành công');
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
        // dd($id);
        $groups = Group::findOrFail($id);

        try {
            $groups->delete();
            Session::flash('success', 'Xóa thành công');
            return redirect()->route('groups.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Xóa không thành công');
            return redirect()->route('groups.trash');
        }
    }
    function SoftDeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $groups = Group::findOrFail($id);
        $groups->deleted_at = date("Y-m-d h:i:s");
        try {
            $groups->save();
            Session::flash('success', 'Xóa Thành công');
            return redirect()->route('groups.index');
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('groups.index')->with('error', 'xóa không thành công');
        }
    }

    function RestoreDelete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $groups = Group::findOrFail($id);
        $groups->deleted_at = null;
        try {
            $groups->save();
            Session::flash('success', 'Khôi phục ' . $groups->title . ' thành công');
            return redirect()->route('groups.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('groups.trash')->with('error', 'xóa không thành công');
        }
    }

    function trash(Request $request)
    {
        $key        = $request->key ?? '';
        $name      = $request->name ?? '';
        $id         = $request->id ?? '';
        $description         = $request->description ?? '';
        
        $query = Group::query(true);
        $query->orderBy('id', 'DESC');

        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%')->where('deleted_at', '!=', null);
        }
        if ($description) {
            $query->where('description', 'LIKE', '%' . $description . '%')->where('deleted_at', '!=', null);
        }
        if ($id) {
            $query->where('id', $id)->where('deleted_at', '!=', null);
        }
        if ($key) {
            $query->orWhere('id', $key)->where('deleted_at', '!=', null);
            $query->orWhere('name', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
            $query->orWhere('description', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
        }
        $groups = $query->where('deleted_at', '!=', null)->paginate(5);
        $params = [
            'f_id'        => $id,
            'f_name'     => $name,
            'f_key'       => $key,
            'description'       => $description,
            'groups'    => $groups,
        ];
        return view('Admin.groups.trash', $params);
    }
}
