<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issues extends Model
{
    use SoftDeletes;

    public $fillable = ['issue_name', 'customer_id', 'issue_status', 'issue_details',
        'issue_date', 'issue_time', 'issue_date_time', 'department', 'user',
        'issue_date_completed', 'issue_time_completed', 'issue_date_time_completed',
        'issue_duration_days', 'issue_duration_hours', 'issue_duration_minutes'];

    protected $dates = ['issue_date_time', 'issue_date_time_completed', 'deleted_at'];

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
