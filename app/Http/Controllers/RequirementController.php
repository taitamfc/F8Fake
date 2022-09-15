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
    public function index()
    {
        $requirements = Requirement::orderBy('created_at','DESC')->search()->paginate(3);

        return view('Admin.requirement.index', compact('requirements'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

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
        Requirement::create($request->all());
        Session::flash('success','Thêm mới thành công');
        return redirect()->route('requirement.index');

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
    public function update(Request $request , Requirement $requirement)
    {
        $requirement->update($request->all());
        Session::flash('success','Cập nhật thành công');
        return redirect()->route('requirement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requirement $requirements , $id)
    {
        $requirement = $requirements->find($id);
        $requirement->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('requirement.index');
    }
}
