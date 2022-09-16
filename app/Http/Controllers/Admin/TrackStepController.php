<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrackStepRequest;
use App\Http\Requests\UpdateTrackStepRequest;
use App\Models\Step;
use App\Models\Track;
use App\Models\TrackStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TrackStepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Lấy params trên url
        $key            = $request->key ?? '';
        $step_type      = $request->step_type ?? '';
        $position       = $request->position ?? '';
        $id             = $request->id ?? '';

        // thực hiện query
        $query = TrackStep::query(true);
        if ($step_type) {
            $query->where('step_type', 'LIKE', '%' . $step_type . '%');
        }
        if ($position) {
            $query->where('position', 'LIKE', '%' . $position . '%');
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('step_type', 'LIKE', '%' . $key . '%');
            $query->orWhere('position', 'LIKE', '%' . $key . '%');
        }
        $tracksteps = $query->paginate(3);

        $params = [
            'f_id'            => $id,
            'f_step_type'     => $step_type,
            'f_position'      => $position,
            'f_key'           => $key,
            'tracksteps'      => $tracksteps,
        ];
        return view('Admin.tracksteps.index', $params);
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
        return view('Admin.tracksteps.add', compact('tracksteps', 'tracks', 'steps'));
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
        //dung session de dua ra thong bao

        try {
            $tracksteps->save();
            Session::flash('success', 'Thêm mới thành công');
            return redirect()->route('tracksteps.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Thêm mới thất bại');
            return redirect()->route('tracksteps.index')->with('error', 'Thêm' . ' ' . $request->title . ' ' .  ' mới không thành công');
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
        $tracks = Track::get();
        $steps = Step::get();
        $tracksteps = TrackStep::findOrFail($id);
        return view('Admin.tracksteps.edit', compact('tracksteps', 'tracks', 'steps'));
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

        try {
            $tracksteps->save();
            //dung session de dua ra thong bao
            Session::flash('success', 'Sửa thành công');
            return redirect()->route('tracksteps.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('tracksteps.index')->with('error', 'Sửa' . ' ' . $request->step_type . ' ' .  'không thành công');
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
            $tracksteps = TrackStep::findOrFail($id);
            $tracksteps->delete();
            Session::flash('error', 'Xóa thành công');
            return redirect()->route('tracksteps.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error','Xóa thất bại');
            return redirect()->route('tracksteps.index');
        }
    }
}
