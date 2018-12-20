<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_categories_relation extends Model
{

	protected $table = 'product_categories_relations';
   public function category()
    {
    	return $this->belongsTo('App\Product_category','id','cat_id');
    }
}
