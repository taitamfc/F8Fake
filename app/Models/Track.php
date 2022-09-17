<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Track extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tracks';
    protected $fillable = ['title', 'is_free', 'position', 'course_id'];
    function course()
    {
        return $this->belongsTo(Courses::class);
    }
    function track_steps()
    {
        return $this->hasMany(Track_steps::class);
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('title', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
