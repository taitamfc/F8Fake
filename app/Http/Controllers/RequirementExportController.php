<?php

namespace App\Http\Controllers;
use App\Exports\RequirementsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RequirementExportController extends Controller
{
    public function export()
    {
        return Excel::download(new RequirementsExport, 'requirements.xlsx');
    }
}
