<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public $fillable = ['customer_name', 'customer_city', 'customer_state', 'customer_phone'];

    public function projects()
    {
        return $this->hasMany('App\Projects', 'customer_id');
    }

    public function issues()
    {
        return $this->hasMany('App\Issues', 'customer_id');
    }
}
