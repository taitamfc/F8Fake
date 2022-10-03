<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete
class Comment extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'comments';
   
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('id', 'like', '%' . $key . '%');
        }
        return $query;
    }


    function user(){
        return $this->belongsTo(User::class);
    }
    function course(){
        return $this->belongsTo(Course::class);
    }

}
