<?php

namespace App\Http\Controllers;
use App\Exports\StepsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StepExportController extends Controller
{
    public function export()
    {
        return Excel::download(new StepsExport, 'steps.xlsx');
    }
}
