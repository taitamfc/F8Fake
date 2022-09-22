<?php

namespace App\Exports;

use App\Models\Track;
use Maatwebsite\Excel\Concerns\FromCollection;

class TracksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Track::all();
    }
}
