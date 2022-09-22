<?php

namespace App\Exports;

use App\Models\WillLearn;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportWillLearn implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return WillLearn::all()->where('deleted_at',null);
    }
}
