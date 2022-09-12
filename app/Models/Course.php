<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    function level(){
        return $this->belongsTo(level::class);
    }
    function WillLeans(){
        return $this->hasMany(WillLean::class);
    }
}
