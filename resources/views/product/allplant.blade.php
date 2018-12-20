<?php 
use App\Helper;
$image = new Helper();
?>
@extends('layouts.main')


@section('content')
<section class="inner_banner">
   <img src="{{url('/')}}/assets/images/plants_b.jpg">
   <div class="inner_banner_text">
	 <div class="container">
	   <div class="banner_text_inner">
	 	<h3>{{ucfirst($header->banner_heading)}}</h3>

	 	<p>{{$header->content}}</p>
	  </div>
	  </div>
	</div>
</section>

<section class="inner_sec">
	<div class="container">
		<div class="inner_breadcums">
			<div class="inner_left">
           
			{!! Breadcrumbs::render('plants') !!}
			<!-- <ul>
				  <li></li>
				  <li><a href="#">Flowers</a></li>
				  <li>Prenimum Flowers</li>
				</ul> -->
			</div>
			
		</div>


		<div class="products_sec">
			<div class="row">
		

             


             
				<div class="product_right_sec">
					<div class="row">
						 @foreach($categories as $product)
						<div class="flower_box">
								<div class="cake_img flower_imgs"><a href="{{url('/')}}/plants/{{$product->cat_slug}}"><img src="{{url('/')}}/uploads/categories/{{$product->id}}/{{$product->cat_image}}" alt="{{$product->cat_name}}"></a></div>
								<div class="flower_heading"><h3><a href="{{url('/')}}/plants/{{$product->cat_slug}}">{{$product->cat_name}}</a></h3></div>
			            </div>
						 @endforeach
                        	</div>
				</div>
                    
						


				



			</div>
		</div>


	</div>
</section>

@endsection
