<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    // protected $fillable = ['description', 'due_date','priority','due_date']; 
    public function task(){
        return $this->belongsTo(Group::class);
    }
}
