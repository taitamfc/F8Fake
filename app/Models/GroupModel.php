<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupModel extends Model
{
    use HasFactory;
    protected $table = 'groups';
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function groupRole()
    {
        return $this->belongsTo(GroupRole::class);
    }
}
