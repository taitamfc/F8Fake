<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrackStepRequest;
use App\Http\Requests\UpdateTrackStepRequest;
use App\Models\Step;
use App\Models\Track;
use App\Models\TrackStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TrackStepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracksteps = TrackStep::orderBy('created_at', 'DESC')->search()->paginate(3);
        return view('Admin.tracksteps.index',compact('tracksteps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tracks = Track::get();
        $steps = Step::get();
        $tracksteps = TrackStep::get();
        return view('Admin.tracksteps.add', compact('tracksteps','tracks','steps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrackStepRequest $request)
    {
        $tracksteps = new TrackStep();
        $tracksteps->track_id = $request->track_id;
        $tracksteps->step_type = $request->step_type;
        $tracksteps->step_id = $request->step_id;
        $tracksteps->position = $request->position;
        $tracksteps->is_published = $request->is_published;
        $tracksteps->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('tracksteps.index');
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
        $tracks = Track::get();
        $steps = Step::get();
        $tracksteps = TrackStep::findOrFail($id);
        return view('Admin.tracksteps.edit', compact('tracksteps','tracks','steps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackStepRequest $request, $id)
    {
        $tracksteps = TrackStep::findOrFail($id);
        $tracksteps->track_id = $request->track_id;
        $tracksteps->step_type = $request->step_type;
        $tracksteps->step_id = $request->step_id;
        $tracksteps->position = $request->position;
        $tracksteps->is_published = $request->is_published;
        $tracksteps->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Sửa thành công');
        return redirect()->route('tracksteps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tracksteps = TrackStep::findOrFail($id);
        $tracksteps->delete();
        Session::flash('success', 'Xóa thành công');
        return redirect()->route('tracksteps.index');
    }
}
