<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    protected $table = 'requirements';
    protected $fillable = ['content','course_id'];
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
