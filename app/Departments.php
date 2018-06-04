<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departments extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
