<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    public $fillable = ['customer_name', 'customer_city', 'customer_state'];

    public function projects()
    {
        return $this->hasMany('App\Projects', 'customer_id');
    }

    public function issues()
    {
        return $this->hasMany('App\Issues', 'customer_id');
    }
}
