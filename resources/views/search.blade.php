<?php 
use App\Helper;
$image = new Helper();
$moneyFormat = $image->moneyFormat();


?>
@extends('layouts.main')


@section('content')

	<section class="inner_banner">
   <img src="{{url('/')}}/assets/images/search2.jpg">
   <div class="inner_banner_text">
	 <div class="container">
	   <div class="banner_text_inner">
	 	<h3>SEARCH</h3>
	 	<p>Nothing can be compared with the brilliance of flowers. The innocence, charm, elegance, and beauty are simply mesmerizing. Explore the best premium flowers here and mesmerize your loved ones.</p>
	  </div>
	  </div>
	</div>
</section>

<section class="inner_sec">
	<div class="container">
		<div class="inner_breadcums">
			<div class="inner_left">
           {!! Breadcrumbs::render('search') !!}
				<!-- <ul>
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Flowers</a></li>
				  <li>Prenimum Flowers</li>
				</ul> -->
			</div>
			<div class="inner_right">
				  
				<ul>
				  <li><a href="#">Showing {{ $products->lastItem() }} out of  {{$products->total()}} Gifts</a></li>	
				   <li><a href="#">Sort By</a></li>
				</ul>
			</div>
		</div>
        
        <div class="row">
          <div class="col-xs-12 col-sm-12 ">
          	@if(count($keyword)>0)
          	<p class="search_home">Search result for : {{$keyword}}</p>
          	@endif
          </div>

        	
        </div>
         
		<div class="products_sec">
			<div class="row">
				
               @if(count($products)>0)
             
				<div class="col-xs-12 col-sm-12 product_right_sec">
					<div class="row">
						 @foreach($products as $product)
						<div class="col-xs-12 col-sm-2 prdct_box">

							<div class="wk_prdct_inner">
								<div class="wk_prdct_img">
									<a href="{{url('/')}}/product/{{$product->slug}}">
									<img src="<?php echo $image->productMainImage($product->id); ?>">
								    </a>
								</div>
								<div class="wk_prdct_text">
									<div class="hover_ul">
										<ul>
											@if(Auth::check())
										  <li><a href="#">
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
									<h3 title="{{$product->name}}"><a href="{{url('/')}}/product/{{$product->slug}}">{{$product->name}}</a></h3>
									<h5><?php echo $moneyFormat; ?> {{$product->price}}</h5>
								</div>
							</div>
							
						</div>
						 @endforeach
						 
                        	</div>
                        	{{ $products->appends($_REQUEST)->links() }}
				       </div>
				
				   @else
                      <div class="products_sec">
			            <div class="row">
				        <div class="product_error">
						<div class="product_error_img"><img src="{{url('/')}}/public/assets/images/error_img1.png"></div>
						<div class="product_error_text">
						<h4>Oops!</h4>
						<span>Data not Found</span>
					</div>
				  </div>
				        </div>
				      </div>



                            @endif





                    
					

				



			</div>
		</div>


	</div>
</section>

@endsection
