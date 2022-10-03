<?php

namespace App\Exports;

use App\Models\Step;
use Maatwebsite\Excel\Concerns\FromCollection;

class StepsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Step::all();
    }
}
