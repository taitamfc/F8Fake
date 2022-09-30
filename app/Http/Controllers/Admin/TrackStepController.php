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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\exportTrackSteps;
use App\Exports\TrackStepExport;

class TrackStepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export() 
    {
        return Excel::download(new TrackStepExport, 'tracksteps.xlsx');
    }
    public function index(Request $request)
    {
        $this->authorize('viewAny', TrackStep::class);
        //Lấy params trên url
        $key            = $request->key ?? '';
        $step_type      = $request->step_type ?? '';
        $position       = $request->position ?? '';
        $id             = $request->id ?? '';

        // thực hiện query
        $query = TrackStep::select("*");
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
        $this->authorize('create', TrackStep::class);
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
        $this->authorize('update', $tracksteps);
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
        
        $tracksteps = TrackStep::findOrFail($id);
        $this->authorize('delete', $tracksteps);
        try {
            $tracksteps->delete();
            Session::flash('error', 'Xóa thành công');
            return redirect()->route('tracksteps.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error','Xóa thất bại');
            return redirect()->route('tracksteps.index');
        }
    }
    function SoftDeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $tracksteps = TrackStep::withTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $tracksteps);
        $tracksteps->deleted_at = date("Y-m-d h:i:s");
        try {
            $tracksteps->save();
            Session::flash('success', 'Xóa Thành công');
            return redirect()->route('tracksteps.index');
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('tracksteps.index')->with('error', 'xóa không thành công');
        }
    }

    function RestoreDelete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $tracksteps = TrackStep::withTrashed()->findOrFail($id);
        $this->authorize('restore', $tracksteps);
        $tracksteps->deleted_at = null;
        try {
            $tracksteps->save();
            Session::flash('success', 'Khôi phục ' . $tracksteps->title . ' thành công');
            return redirect()->route('tracksteps.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('tracksteps.trash')->with('error', 'xóa không thành công');
        }
    }

    function trash(Request $request)
    {
        $key        = $request->key ?? '';
        $step_type      = $request->step_type ?? '';
        $id         = $request->id ?? '';
        $position         = $request->position ?? '';
        
        $query = TrackStep::onlyTrashed();

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
            'f_id'        => $id,
            'f_step_type'     => $step_type,
            'f_key'       => $key,
            'f_position'       => $position,
            'tracksteps'    => $tracksteps,
        ];
        return view('Admin.tracksteps.trash', $params);
    }
}
