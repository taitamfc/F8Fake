<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table = 'groups';
    function user()
    {
        return $this->hasMany(User::class);
    }
    function Role()
    {
        return $this->belongsToMany(Role::class);
    }
}
