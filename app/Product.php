<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = "products";

	public function product_image()
	{
		return $this->hasMany('App\Product_image');
	}

	public function product_categories()
	{
		return $this->hasMany('App\Product_categories_relation','product_id','id');
	}

	public function product_images()
	{
		return $this->hasMany('App\Product_image','product_id','id');
	}
	public function order_products()
	{
		return $this->hasOne('App\Order_product','product_id','id');
	}
}
