<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    function users(){
        return $this->belongsTo(User::class);
    }
    function courses(){
        return $this->belongsTo(Course::class);
    }

}
