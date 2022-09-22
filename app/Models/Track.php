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
        return $this->belongsTo(Course::class);
    }
    function track_steps(){
        return $this->hasMany(TrackStep::class);
    }
    public function scopeTitle($query, $term)
    {
        if ($term) {
            $query->where('title', 'like', '%' . $term . '%');
        }
        return $query;
    }
    public function scopeIs_free($query, $term)
    {
        if ($term) {
            $query->where('is_free', 'like', '%' . $term . '%');
        }
        return $query;
    }
    public function scopePosition($query, $term)
    {
        if ($term) {
            $query->where('position', 'like', '%' . $term . '%');
        }
        return $query;
    }
    public function scopeCourse_id($query, $term)
    {
        if ($term) {
            $query->where('course_id', 'like', '%' . $term . '%');
        }
        return $query;
    }
    public function scopeId($query, $term)
    {
        if ($term) {
            $query->where('id', 'like', '%' . $term . '%');
        }
        return $query;
    }
}
