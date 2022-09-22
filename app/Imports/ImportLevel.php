<?php

namespace App\Imports;

use App\Models\Level;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportLevel implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Level([
            'title' => $row[0]
        ]);
    }
}
