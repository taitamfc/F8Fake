<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackStep extends Model
{
    use HasFactory;
    protected $table = 'track_steps';
    function track()
    {
        return $this->belongsTo(Track::class);
    }
    function step()
    {
        return $this->belongsTo(Step::class);
    }
    

    

}
