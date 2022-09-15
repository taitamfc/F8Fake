<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
        $query = $query->where('parent_id','like','%'.$key.'%');
    }
    return $query;
}
}
