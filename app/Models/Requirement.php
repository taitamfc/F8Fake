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
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('content', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
