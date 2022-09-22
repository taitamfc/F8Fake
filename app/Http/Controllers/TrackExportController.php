<?php

namespace App\Http\Controllers;
use App\Exports\TracksExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TrackExportController extends Controller
{
    public function export()
    {
        return Excel::download(new TracksExport, 'tracks.xlsx');
    }
}
