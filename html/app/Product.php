<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     public function product_relation()
    {
    	return $this->belongsTo('App\Product_categories_relation','id','product_id');
    }
}
