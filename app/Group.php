<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // protected $fillable = ['title', 'user_id', 'color']; 
    protected $guarded=[];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

