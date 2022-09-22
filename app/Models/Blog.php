<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Blog extends Model
{
    use HasFactory;
    use Notifiable,
    SoftDeletes;// add soft delete
    protected $table = 'blogs';
    function user(){
        return $this->belongsTo(User::class);
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
        $query = $query->where('title','like','%'.$key.'%');
    }
    return $query;
}
}
