<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
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

        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($description) {
            $query->where('description', 'LIKE', '%' . $description . '%');
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('name', 'LIKE', '%' . $key . '%');
        }
        //Phân trang
        $groups = $query->paginate(3);

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
        $groups = Group::find($id);
        return view('Admin.groups.edit', compact('groups'));
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
        $groups = Group::findOrFail($id);
        $groups->name = $request->name;
        $groups->description = $request->description;
        try {
            $groups->save();
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
            return redirect()->route('groups.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Xóa không thành công');
            return redirect()->route('groups.index');
        }
    }
}
