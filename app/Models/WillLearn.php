<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WillLearn extends Model
{
    use HasFactory;
    protected $table = 'will_learns';
    function courses(){
        return $this->belongsTo(Courses::class);
    }
}
