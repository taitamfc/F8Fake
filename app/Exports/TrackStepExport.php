<?php

namespace App\Exports;

use App\Models\TrackStep;
use Maatwebsite\Excel\Concerns\FromCollection;

class TrackStepExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TrackStep::select('*')->Where('deleted_at','=',Null)->get();
    }
}
