<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $table = 'tracks';
    function course()
    {
        return $this->belongsTo(Courses::class);
    }
    function track_steps(){
        return $this->hasMany(Track_steps::class);
    }
}
