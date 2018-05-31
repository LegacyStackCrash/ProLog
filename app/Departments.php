<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    public $fillable = ['department_name'];

    public function projects()
    {
        return $this->belongsToMany('App\Projects')->withTimestamps();
    }

    public function issues()
    {
        return $this->belongsToMany('App\Issues')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
