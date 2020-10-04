<?php

namespace App\Http\Controllers\Model;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table ="order";

	public function order_detail(){
    	return $this->hasMany('App\Http\Controllers\Model\order_detail','order_detail_id','order_id');
    }

    public function order(){
    	return $this->belongsTo('App\Http\Controllers\Model\customer','customer_id','order_id');
    }
 }