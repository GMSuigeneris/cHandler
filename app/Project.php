<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model{
    protected $fillable = [
        'name', 
        'description', 
        'company_id',
        'user_id',
        'weeks',
    ];

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }
}
