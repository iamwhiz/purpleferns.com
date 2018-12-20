<?php 
use App\Helper;
$image = new Helper();
$price = $image;
?>
@extends('layouts.main')


@section('content')


<section class="inner_baner new_banner">
	<img src="{{url('/')}}/assets/images/banner3.jpg">
</section>



<section class="inner_sec">
	<div class="container">
		<div class="inner_breadcums">
			<div class="inner_left">

				{!! Breadcrumbs::render('cart') !!}
				<!-- <ul>
				  <li><a href="#">Home</a></li>
				  <li>Cart</li>
				</ul> -->
			</div>
		</div>

        @if((count($cart_item))>0)
		<div class="cart_sec">
		 <div class="row">
			<div class="col-xs-12 col-sm-8 cart_left">
                @foreach($cart_item as $item)
				<div class="cart_product">
					<div class="cart_img_sec">
						<img src="<?php echo $image->productMainImage($item->id); ?>">
					</div>
					<div class="cart_text">
					  <h4>{{ucfirst($item->name)}} </h4>
					  <!-- <span>Add gift wrap </span> -->
					</div>
					<div class="cart_price">
						<ul  class="p-w" product-id="{{$item->id}}"  rowId = "{{$item->rowId}}" product-price="{{$item->price}}">
						  <li><div class="price_text t-p">{{$price->priceFormat($item->price)}}</div></li>
						  <li><div class="price_text t-p">{{$item->options->product_weight}}</div></li>
						<!--   <li><div class="product_quantity">
						  	<div class="form-group form-group-options">
                            <div id="2" class="input-group input-group-option quantity-wrapper">
                            
                                <span  class="input-group-addon input-group-addon-remove quantity-remove btn">
                                    <span class="glyphicon glyphicon-minus sub"></span>
                                </span>
                                
                                <input  id="2inp" type="text" value="{{$item->qty}}" min="1" name="option" class="form-control quantity-count" placeholder="1">

                                <span class="input-group-addon input-group-addon-remove quantity-add btn">
                                    <span class="glyphicon glyphicon-plus add"></span>
                                </span>
                                
                            </div>
                            
                        </div>
						  </div></li> -->
						  
						  <!-- <li class="update_cart">
						     <form method="post" action="{{url('/')}}/update-cart">
			                  {{csrf_field()}}
			
			                     <input type="hidden" name="rowId" value="{{$item->rowId}}" >
			                     <input type="hidden" name="qty" class="quantity-count" value="{{$item->qty}}" >
								 <a><i style="font-size: 13px" class="fas fa-sync-alt"></i>  <input type="submit" value="Update Cart"> </a>
			                     </form>
						  </li> -->
						  <li class="remove_btn"><div class="cart_remove"><a href="{{url('/')}}/remove-from-cart/{{$item->rowId}}"><i class="far fa-trash-alt"></i> Remove</a></div></li>
						  <li class="cart_wish"><div class="cart_wishlist"><a href="#"><i class="fas fa-heart"></i> Move to Wishlist</a></div></li>

						</ul>
					</div>
				</div>
                 
             @endforeach
		
			</div>

            

			<div class="col-xs-12 col-sm-4 cart_right">
				<div class="coupon_code">
					Have a Coupon Code? You can apply the discount 
					coupon in the Checkout Process
				</div>

				<div class="coupon_input">
					<input type="text" placeholder="Discount Coupon">
					<input type="submit" value="Apply"> 
				</div>
                
				<div class="total">
					<ul>
					  <li>Subtotal <strong><div class="s-t">{{$price->priceFormat(Cart::subtotal())}}</div></strong></li>
					  <!--li>Shipping Charges <strong><i class="fas fa-rupee-sign"></i>50</strong></li>
					  <li>GST <strong>{{$price->priceFormat(Cart::tax())}}</strong></li-->
					  <li>Grand Total <strong><div class="g-t">{{$price->priceFormat(Cart::total())}}</div></strong></li>
					</ul>
                  
                    <form method="post" action="{{url('/')}}/checkout">  
                       

                       @foreach($cart_item as $i)
						<input type="hidden" name="rowId" value="{{ $i->rowId }}">
						@endforeach

                    	{{csrf_field()}}
                       <input type="hidden" name="redirect_url" value="checkout">
                      
					<input type="submit" value="PROCEED TO CHECKOUT">
					
					</form>
				</div>

			</div>


		  </div>
		</div>
		@else

			<div class="cart_sec">
		      <div class="row">
		      	 <div class="text-center">
		      	<img src="{{url('/')}}/assets/images/cart-empty.png">
		      	<h3>Your Cart Is Empty !</h3>
				
		      </div>
		      </div>
		  </div>

		@endif

  
   	</div>		
</section>



@endsection