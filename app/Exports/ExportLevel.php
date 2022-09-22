<?php

namespace App\Exports;

use App\Models\Level;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportLevel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Level::select('title','updated_at','created_at')->where('deleted_at','=',null)->get() ;
    }
}
