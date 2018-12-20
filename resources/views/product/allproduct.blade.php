@extends('layouts.main')


@section('content')

	<section class="inner_banner">
   <img src="{{url('/')}}/public/assets/images/inner_banner.jpg">
   <div class="inner_banner_text">
	 <div class="container">
	   <div class="banner_text_inner">
	 	<h3>Premium Flowers</h3>
	 	<p>Nothing can be compared with the brilliance of flowers. The innocence, charm, elegance, and beauty are simply mesmerizing. Explore the best premium flowers here and mesmerize your loved ones.</p>
	  </div>
	  </div>
	</div>
</section>

<section class="inner_sec">
	<div class="container">
		<div class="inner_breadcums">
			<div class="inner_left">
            
			{!! Breadcrumbs::render('products') !!}
			<!-- <ul>
				  <li></li>
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


		<div class="products_sec">
			<div class="row">
				<div class="col-xs-12 col-sm-3 product_sidebar">
					<div class="product_sidebar_inner">
						<h3>Categories</h3>
						<ul>

							 <li><a href="#">By Categories </a><span><img src="{{url('/')}}/public/assets/images/arrow_down.png"></span>
						  	<ul>
						  		@foreach($side_cat as $s_cat)

						  		<li><a href="{{url('/')}}/{{$s_cat->slug}}">{{$s_cat->name}}</a></li>
						  		<!-- <li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li> -->
						  		@endforeach
						  	</ul>
						  </li>
						  <li><a href="#">By Price </a><span><img src="{{url('/')}}/public/assets/images/arrow_down.png"></span>
						  	<ul>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul>
						  </li>
						  <li><a href="#">By Occasion</a><span><img src="{{url('/')}}/public/assets/images/arrow_down.png"></span>
						  <ul>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul>
						  </li>
						
						 
						
						  <li><a href="#">Special Flowers</a><span><img src="{{url('/')}}/public/assets/images/arrow_down.png"></span>
						  <ul>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul>
						  </li>
						
						</ul>
					</div>

					<div class="sidebar_add">
						<img src="{{url('/')}}/public/assets/images/mothersday.png">
					</div>
				</div>



             
				<div class="col-xs-12 col-sm-9 product_right_sec">
					<div class="row">
						 @foreach($products as $product)
						<div class="col-xs-12 col-sm-3 prdct_box">

							<div class="wk_prdct_inner">
								<div class="wk_prdct_img">
									<img src="{{url('/')}}/public/assets/images/prdct2.png">
								</div>
								<div class="wk_prdct_text">
									<div class="hover_ul">
										<ul>
										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/heart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/heart_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/eye_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/eye_white.png">
										  </a></li>

										  <li>
										  	<form method="post" action="{{url('/')}}/add-to-cart">
										  		{{csrf_field()}}
										  		<input type="hidden" name="id" value="{{$product->id}}">
										  		<input type="hidden" name="name" value="{{$product->name}}">
										  		<input type="hidden" name="qty" value="1">
										  		<input type="hidden" name="price" value="{{$product->price}}">
										  	<button type="submit">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/cart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/cart_white.png">
										  </button>
										  	</form>
										  </li>

										</ul>
									</div>
									<h3><a href="#"> {{$product->name}}</a></h3>
									<h5><i class="fas fa-rupee-sign"></i> {{$product->price}}</h5>
								</div>
							</div>
							
						</div>
						 @endforeach
						   {{$products->links()}}
                        	</div>
				</div>
                    
						<!-- <div class="col-xs-12 col-sm-4 prdct_box">
							<div class="wk_prdct_inner">
								<div class="wk_prdct_img">
									<img src="{{url('/')}}/public/assets/images/prdct3.png">
								</div>
								<div class="wk_prdct_text">
									<div class="hover_ul">
										<ul>
										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/heart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/heart_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/eye_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/eye_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/cart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/cart_white.png">
										  </a></li>

										</ul>
									</div>
									<h3><a href="#"> Red Roses</a></h3>
									<h5><i class="fas fa-rupee-sign"></i> 1799</h5>
								</div>
							</div>
						</div>


						<div class="col-xs-12 col-sm-4 prdct_box">
							<div class="wk_prdct_inner">
								<div class="wk_prdct_img">
									<img src="{{url('/')}}/public/assets/images/prdct4.png">
								</div>
								<div class="wk_prdct_text">
									<div class="hover_ul">
										<ul>
										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/heart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/heart_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/eye_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/eye_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/cart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/cart_white.png">
										  </a></li>

										</ul>
									</div>
									<h3><a href="#"> Red Roses</a></h3>
									<h5><i class="fas fa-rupee-sign"></i> 1799</h5>
								</div>
							</div>
						</div>





						<div class="col-xs-12 col-sm-4 prdct_box">
							<div class="wk_prdct_inner">
								<div class="wk_prdct_img">
									<img src="{{url('/')}}/public/assets/images/prdct5.png">
								</div>
								<div class="wk_prdct_text">
									<div class="hover_ul">
										<ul>
										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/heart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/heart_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/eye_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/eye_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/cart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/cart_white.png">
										  </a></li>

										</ul>
									</div>
									<h3><a href="#"> Red Roses</a></h3>
									<h5><i class="fas fa-rupee-sign"></i> 1799</h5>
								</div>
							</div>
						</div>


						<div class="col-xs-12 col-sm-4 prdct_box">
							<div class="wk_prdct_inner">
								<div class="wk_prdct_img">
									<img src="{{url('/')}}/public/assets/images/prdct6.png">
								</div>
								<div class="wk_prdct_text">
									<div class="hover_ul">
										<ul>
										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/heart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/heart_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/eye_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/eye_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/cart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/cart_white.png">
										  </a></li>

										</ul>
									</div>
									<h3><a href="#"> Red Roses</a></h3>
									<h5><i class="fas fa-rupee-sign"></i> 1799</h5>
								</div>
							</div>
						</div> -->


						<!-- <div class="col-xs-12 col-sm-4 prdct_box">
							<div class="wk_prdct_inner">
								<div class="wk_prdct_img">
									<img src="{{url('/')}}/public/assets/images/prdct3.png">
								</div>
								<div class="wk_prdct_text">
									<div class="hover_ul">
										<ul>
										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/heart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/heart_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/eye_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/eye_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/cart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/cart_white.png">
										  </a></li>

										</ul>
									</div>
									<h3><a href="#"> Red Roses</a></h3>
									<h5><i class="fas fa-rupee-sign"></i> 1799</h5>
								</div>
							</div>
						</div> -->


						<!-- <div class="col-xs-12 col-sm-4 prdct_box">
							<div class="wk_prdct_inner">
								<div class="wk_prdct_img">
									<img src="{{url('/')}}/public/assets/images/prdct4.png">
								</div>
								<div class="wk_prdct_text">
									<div class="hover_ul">
										<ul>
										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/heart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/heart_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/eye_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/eye_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/cart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/cart_white.png">
										  </a></li>

										</ul>
									</div>
									<h3><a href="#"> Red Roses</a></h3>
									<h5><i class="fas fa-rupee-sign"></i> 1799</h5>
								</div>
							</div>
						</div> -->


						<!-- <div class="col-xs-12 col-sm-4 prdct_box">
							<div class="wk_prdct_inner">
								<div class="wk_prdct_img">
									<img src="{{url('/')}}/public/assets/images/prdct5.png">
								</div>
								<div class="wk_prdct_text">
									<div class="hover_ul">
										<ul>
										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/heart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/heart_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/eye_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/eye_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/cart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/cart_white.png">
										  </a></li>

										</ul>
									</div>
									<h3><a href="#"> Red Roses</a></h3>
									<h5><i class="fas fa-rupee-sign"></i> 1799</h5>
								</div>
							</div>
						</div> -->


						<!-- <div class="col-xs-12 col-sm-4 prdct_box">
							<div class="wk_prdct_inner">
								<div class="wk_prdct_img">
									<img src="{{url('/')}}/public/assets/images/prdct6.png">
								</div>
								<div class="wk_prdct_text">
									<div class="hover_ul">
										<ul>
										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/heart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/heart_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/eye_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/eye_white.png">
										  </a></li>

										  <li><a href="#">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/cart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/cart_white.png">
										  </a></li>

										</ul>
									</div>
									<h3><a href="#"> Red Roses</a></h3>
									<h5><i class="fas fa-rupee-sign"></i> 1799</h5>
								</div>
							</div>
						</div>
 -->


				



			</div>
		</div>


	</div>
</section>

@endsection
