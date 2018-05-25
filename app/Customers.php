<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    public $fillable = ['customer_name', 'customer_city', 'customer_state'];
}
