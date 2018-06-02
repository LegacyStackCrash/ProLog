<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public $fillable = ['project_name', 'customer_id', 'project_status', 'project_date',
        'project_completed_date', 'project_details', 'department', 'user'];

    protected $dates = ['project_date', 'project_completed_date'];

    public function departments()
    {
        return $this->belongsToMany('App\Departments')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function customer()
    {
        return $this->belongsTo('App\Customers');
    }

}
