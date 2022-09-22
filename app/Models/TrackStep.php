<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrackStep extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'track_steps';
    function track()
    {
        return $this->belongsTo(Track::class);
    }
    function step()
    {
        return $this->belongsTo(Step::class);
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('step_type', 'like', '%' . $key . '%');
        }
        return $query;
    }
    

}
