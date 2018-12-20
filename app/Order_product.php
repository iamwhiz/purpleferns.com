<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
     public function orders()
    {

		return $this->belongsTo('App\Order','order_id','id');
	
    }
}
