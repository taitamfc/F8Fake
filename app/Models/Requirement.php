<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requirement extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'requirements';
    protected $fillable = ['content', 'course_id'];
    function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function scopeContent($query, $term)
    {
        if ($term) {
            $query->where('content', 'like', '%' . $term . '%');
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
