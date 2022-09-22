<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table = 'levels';
    protected $fillable = ['title'];
    function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('title', 'like', '%' . $key . '%')->orwhere('id', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
