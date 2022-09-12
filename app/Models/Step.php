<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    protected $table = 'Steps';
    function track_step()
    {
        return $this->belongsTo(Track_steps::class);
    }
}
