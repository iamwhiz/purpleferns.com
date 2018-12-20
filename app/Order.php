<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    public function order_products()
    {

		return $this->hasMany('App\Order_product','order_id','id');
	
    }
}
