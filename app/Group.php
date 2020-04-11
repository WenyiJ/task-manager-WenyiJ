<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['title', 'user_id', 'color']; 
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

