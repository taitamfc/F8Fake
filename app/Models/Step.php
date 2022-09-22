<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'steps';
    protected $fillable = ['title', 'content', 'description', 'duration', 'video_type', 'original_name', 'image', 'video', 'image_url', 'video_url'];
    function track_step()
    {
        return $this->belongsTo(TrackStep::class);
    }
    public function scopeTitle($query, $term)
    {
        if ($term) {
            $query->where('title', 'like', '%' . $term . '%');
        }
        return $query;
    }
    public function scopeOriginal_name($query, $term)
    {
        if ($term) {
            $query->where('original_name', 'like', '%' . $term . '%');
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
