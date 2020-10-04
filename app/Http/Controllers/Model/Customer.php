<?php

namespace App\Http\Controllers\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table ="customer";

    public function order(){
    	return $this->hasMany('App\Http\Controllers\Model\order','order_id','customer_id');
    }
 }