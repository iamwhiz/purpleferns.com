<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    public function cat_relation()
    {
    	return $this->hasMany('App\Product_categories_relation','id','cat_id');
    }
}
