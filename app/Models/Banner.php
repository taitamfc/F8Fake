<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';

    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('placement', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
