<?php

namespace App\Http\Controllers\Model;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table ="order_detail";

	public function food(){
    	return $this->hasMany('App\Http\Controllers\Model\food','foodid','order_detail_id');
    }

    public function order(){
    	return $this->belongsTo('App\Http\Controllers\Model\customer','customer_id','order_detail_id');
    }
 }