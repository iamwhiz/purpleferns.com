@extends('layouts.main')


@section('content')
  <section class="inner_sec">
	<div class="container">
		<div class="inner_breadcums">
			<div class="inner_left">
				<ul>
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Flowers</a></li>
				  <li>Prenimum Flowers</li>
				</ul>
			</div>
			<div class="inner_right">
				  
				<ul>
				  <li><a href="#">Showing 60 gifts out of 125</a></li>	
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
						  <li><a href="#">By Price </a><span><img src="images/arrow_down.png"></span>
						  	<ul>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul>
						  </li>
						  <li><a href="#">By Occasion</a><span><img src="images/arrow_down.png"></span>
						  <ul>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul>
						  </li>
						  <li><a href="#">By Type</a><span><img src="images/arrow_down.png"></span>
						  	<ul>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul>
						  </li>
						  <li><a href="#">By Color</a><span><img src="images/arrow_down.png"></span>
						  	<ul>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul>

						  </li>
						  <li><a href="#">Flower Combos</a><span><img src="images/arrow_down.png"></span>
						  	<ul>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul>

						  </li>
						  <li><a href="#">Special Flowers</a><span><img src="images/arrow_down.png"></span>
						  <ul>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul>
						  </li>
						  <li><a href="#">Festive Special</a><span><img src="images/arrow_down.png"></span>
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
						<img src="images/mothersday.png">
					</div>
				</div>


				<div class="col-xs-12 col-sm-9 product_right_sec">
					
                  <div class="product_error">
					<div class="product_error_img"><img src="{{url('/')}}/public/assets/images/error_img1.png"></div>
					<div class="product_error_text">
					<h4>Oops!</h4>
					<span>Data not Found</span>
					</div>
				  </div>

				</div>



			</div>
		</div>


	</div>
</section>
@endsection