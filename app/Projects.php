<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public $fillable = ['project_name', 'customer_id', 'project_status', 'project_date', 'project_completed_date',
        'project_details'];


}
