<?php 
use App\Helper;
$image = new Helper();
$banner = $image->categoryBanner($banner_id);
?>
@extends('layouts.main')


@section('content')

	<section class="inner_banner">
   <img src="{{url('/')}}/public/assets/images/gift_pak.jpg">
   <div class="inner_banner_text">
	 <div class="container">
	   <div class="banner_text_inner">
	 	<h3>{{strtoupper($banner->banner_heading)}}</h3>
	 	<p>{{$banner->content}}</p>
	  </div>
	  </div>
	</div>
</section>

<section class="inner_sec">
	<div class="container">
		<div class="inner_breadcums">
			<div class="inner_left">
          
                 
				<!-- <ul>
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Flowers</a></li>
				  <li>Prenimum Flowers</li>
				</ul> -->
			</div>
				<div class="inner_right cake_selection">
				  
				<ul>
			<li><span>Showing {{ $products->lastItem() }} out of  {{$products->total()}} Gifts
				  
				   </span> 	<form>
				   		 <input type="hidden" name="type" value="gifts" id="type">
				   		<select name="sort" id="drop">
				   			<option selected disabled>Sort By</option>
				   			<option value="A-Z" >A - Z</option>
				   			<option value="Z-A">Z - A</option>
				   		
				   		</select>
				   	</form></li>
				</ul>
			</div>
		</div>


		<div class="products_sec">
			<div class="row">
			@include('sidebar')

              @if(count($products)>0)
				<div class="col-xs-12 col-sm-9 product_right_sec">
					<div class="row" id="old_div">
						 @foreach($products as $product)
						<div class="col-xs-12 col-sm-3 prdct_box">

							<div class="wk_prdct_inner">
								<div class="wk_prdct_img">
									<img src="<?php echo $image->productMainImage($product->id); ?>">
								</div>
								<div class="wk_prdct_text">
									<div class="hover_ul">
										<ul>
											@if(Auth::check())
										  <li><a href="{{url('/')}}/add-to-wishlist/{{$product->id}}">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/heart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/heart_white.png">
										  </a></li>
										  	@endif
										  <li><a href="{{url('/')}}/product/{{$product->slug}}">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/eye_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/eye_white.png">
										  </a></li>

										  <li><form method="post" action="{{url('/')}}/add-to-cart">
										  		{{csrf_field()}}
										  		<input type="hidden" name="id" value="{{$product->id}}">
										  		<input type="hidden" name="name" value="{{$product->name}}">
										  		<input type="hidden" name="qty" value="1">
										  		<input type="hidden" name="price" value="{{$product->price}}">
										  	<button type="submit">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/cart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/cart_white.png">
										  </button>
										  	</form></li>

										</ul>
									</div>
								<h3 title="{{$product->name}}"><a href="#">{{ substr($product->name,0,20)}}</a></h3>
									<h5><i class="fas fa-rupee-sign"></i> {{$product->price}}</h5>
								</div>
							</div>
							
						</div>
						 @endforeach
						    
                        	</div>
				</div>


				@else
                  <div class="col-xs-12 col-sm-9 product_right_sec" id="new_div">
                  	<div class="row">

                  	  <div class="text-center">
				      	<img src="{{url('/')}}/assets/images/cart-empty.png">
				      </div>
                  	</div>

                  	
                  </div> 
                  @endif 



			</div>
		</div>


	</div>
</section>

@endsection
