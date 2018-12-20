@extends('layouts.main')


@section('content')

<?php
$banners = array();
$banners[] = array('image'=> url('/').'/assets/images/homeslider/1.jpg', 'firsttext'=>'Cakes', 'secondtext'=>'PurpleFerns', 'thirdtext'=>'A little bliss in every bite of cakes you get here for your loved ones is for all the sweet <br>occasions as what you dream is what we design and bake.','button_text'=>'Gift For Everyone', 'button_link'=>'#' );
$banners[] = array('image'=> url('/').'/assets/images/homeslider/2.jpg', 'firsttext'=>'Fresh Flowers and delicious cakes!', 'secondtext'=>'PurpleFerns', 'thirdtext'=>'Creating messages of significances means gifting the mesmerizing flowers and finger licking<br>cake by purpleferns!','button_text'=>'Gift For Everyone', 'button_link'=>'#' );
$banners[] = array('image'=> url('/').'/assets/images/homeslider/3.jpg', 'firsttext'=>'Gifts', 'secondtext'=>'PurpleFerns', 'thirdtext'=>'Lorem Ipsum is Placeholder Text Commonly Used in The Graphic Lorem<br>Ipsum is Placeholder','button_text'=>'Gift For Everyone', 'button_link'=>'#' );
$banners[] = array('image'=> url('/').'/assets/images/homeslider/4.jpg', 'firsttext'=>'Bloom with Plants!','secondtext'=>'PurpleFerns', 'thirdtext'=>'If you wish to go green, make sure that you plant your own garden with blooming plants by<br>purpleferns.','button_text'=>'Gift For Everyone', 'button_link'=>'#' );

// echo '<pre>';
// print_r($banner);
// echo '</pre>';
?>
<section class="banner">
	<div id="owl-demo1" class="owl-carousel owl-theme">
		<?php
		foreach($banners as $banner){
		?>
			<div class="item">
				<img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['firsttext']; ?>">
				<div class="banner_inner">
					<div class="container">
						<div class="slider_text">
							<span><?php echo $banner['firsttext']; ?></span>
							<?php if(!empty($banner['secondtext'])){ ?><h1><?php echo $banner['secondtext']; ?></h1> <?php } ?>
							<?php if(!empty($banner['thirdtext'])){ ?><p><?php echo $banner['thirdtext']; ?></p>	 <?php } ?>
							<?php if(!empty($banner['button_link'])){ ?><a href="<?php echo $banner['button_link']; ?>" class="btn_banner"><?php echo $banner['button_text']; ?></a> <?php } ?>
						</div>
					</div>
				</div>
		   </div>
		<?php
		}
		?>
	   
	   
	</div>
</section> 

<!--section class="product_type">
	<div class="container">
		<div class="prdct_inner">
			@foreach($category as $cat)
			<div class="box">
				<div class="box_inner">
					<a href="{{url('/')}}/{{$cat->name}}">
					<div class="prdct_img">
					  <img class="white_img" src="{{url('/')}}/public/assets/images/{{$cat->icon}}" alt="Category Icon">
					  <img class="green_img" src="{{url('/')}}/public/assets/images/{{$cat->image}}" alt="Category Icon">
					</div>
					<h4>{{ucfirst($cat->name)}}</h4>
					</a>
				</div>
			</div>
			@endforeach



		</div>
	</div>
</section-->


<section class="prdct_new">
   <div class="container">
     <div class="row">
     		@foreach($category as $cat)
	   <div class="col-xs-12 col-sm-3 top_prdct">
	   
	     <div class="top_prdct_inner">
		   <img src="{{url('/')}}/public/assets/images/{{$cat->image}}" alt="{{ucfirst($cat->name) }} category Image ">
		   <a href="{{url('/')}}/{{$cat->name}}"><span>{{ucfirst($cat->name)}}</span></a>
		 </div>
		
	   </div>
	    @endforeach
	   
	   <!-- <div class="col-xs-12 col-sm-3 top_prdct">
	     <div class="top_prdct_inner">
		   <img src="{{url('/')}}/public/assets/images/new_prdct2.jpg">
		   <a href="#"><span>Gifts</span></a>
		 </div>
	   </div>
	   
	   
	   <div class="col-xs-12 col-sm-3 top_prdct">
	     <div class="top_prdct_inner">
		   <img src="{{url('/')}}/public/assets/images/new_prdct3.jpg">
		   <a href="#"><span>Cakes</span></a>
		 </div>
	   </div>
	   
	   <div class="col-xs-12 col-sm-3 top_prdct">
	     <div class="top_prdct_inner">
		   <img src="{{url('/')}}/public/assets/images/new_prdct4.jpg">
		   <a href="#"><span>Plants</span></a>
		 </div>
	   </div> -->
	   
	   
	   
	 </div>
   </div>
</section>

<section class="adds_sec">
	<div class="container">
	  <div class="row">
		<div class="col-xs-12 col-sm-6 adds_box">
		   <a href="#"><img src="{{url('/')}}/public/assets/images/year.jpg" alt="Ads Image"></a>
		</div>
		<div class="col-xs-12 col-sm-6 adds_box">
		   <a href="#"><img src="{{url('/')}}/public/assets/images/cr11.jpg" alt="Ads Image"></a>
		</div>
	   </div>
	</div>
</section>

 <section class="flower_sec cake_new_sec">
	<div class="container">
		<h1 class="heading">Cakes</h1>
	      <div class="flower_inner">
	      	@foreach($cakes_cat as $cakes)
			<div class="flower_box">
				<div class="cake_img">
					<?php if(!empty($cakes->cat_image)) {   ?>
					<a href="{{url('/')}}/cakes/{{$cakes->cat_slug}}"><img src="{{url('/')}}/uploads/categories/{{$cakes->id}}/{{$cakes->cat_image}}" alt="{{$cakes->cat_name}}"></a>
                     <?php } else { ?>
                     	<a href="{{url('/')}}/cakes/{{$cakes->cat_slug}}">
							<img src="{{url('/')}}/assets/images/dummy_product1.jpg" alt="">
						</a>
					<?php } ?>

				</div>
				<div class="flower_heading"><h3><a href="{{url('/')}}/cakes/{{$cakes->cat_slug}}">{{$cakes->cat_name}}</a></h3></div>
			</div>
			@endforeach

		
		  </div>

	</div>
</section>

 <section class="flower_sec cake_new_sec">
	<div class="container">
		<h1 class="heading">Gifts</h1>
	      <div class="flower_inner">
	      	@foreach($gifts_cat as $gifts)
			<div class="flower_box">
				<div class="cake_img">
					<?php if(!empty($gifts->cat_image)) {   ?>
						<a href="{{url('/')}}/gifts/{{$gifts->cat_slug}}"><img src="{{url('/')}}/uploads/categories/{{$gifts->id}}/{{$gifts->cat_image}}" alt="{{$gifts->cat_name}}"></a>
						 <?php } else { ?>
						<a href="{{url('/')}}/gifts/{{$gifts->cat_slug}}">
							<img src="{{url('/')}}/assets/images/dummy_product1.jpg" alt="">
						</a>
					<?php } ?>
				</div>
				<div class="flower_heading"><h3><a href="{{url('/')}}/gifts/{{$gifts->cat_slug}}">{{$gifts->cat_name}}</a></h3></div>
			</div>
			@endforeach

		
		  </div>

	</div>
</section>

<section class="add_new_sec">
	<div class="container">
		<div class="add_img">
			<ul>
			  <li><a href="#"><img src="{{url('/')}}/public/assets/images/midnight.jpg" alt="Ads Image"></a></li>
			  <li><a href="#"><img src="{{url('/')}}/public/assets/images/same-day.jpg" alt="Ads Image"></a></li>
			</ul>
		</div>
	</div>
</section>

<section class="flower_sec">
	<div class="container">
		<h1 class="heading">Flowers</h1>
	      <div class="flower_inner">
	      	@foreach($flower_cat as $flower)
			<div class="flower_box">
				<div class="cake_img flower_imgs">
					<?php if(!empty($flower->cat_image)) {   ?>
					<a href="{{url('/')}}/flowers/{{$flower->cat_slug}}"><img src="{{url('/')}}/uploads/categories/{{$flower->id}}/{{$flower->cat_image}}" alt="{{$flower->cat_name}}" alt="{{$flower->cat_name}} alt="{{$flower->cat_name}}"></a>
					 <?php } else { ?>
						<a href="{{url('/')}}/flowers/{{$flower->cat_slug}}">
							<img src="{{url('/')}}/assets/images/dummy_product1.jpg" alt="">
						</a>
					<?php } ?>
				</div>
				<div class="flower_heading"><h3><a href="{{url('/')}}/flowers/{{$flower->cat_slug}}">{{$flower->cat_name}}</a></h3></div>
			</div>
			@endforeach

		  </div>

   
   		<!-- <div class="three_box">
   			<div class="gift_box">
   				<div class="gift_img"><img src="{{url('/')}}/public/assets/images/prdct1.png" alt="Gift Image"></div>
   				<div class="gift_text">
   					<h4>Nurture your</h4>
   					<span>Relationship</span>
   					<a class="gift_btn" href="{{url('/')}}/plants">Gift a Plant</a>
   				</div>
   			</div>

   			<div class="gift_box">
   				<div class="gift_img"><img src="{{url('/')}}/public/assets/images/cake1.png" alt="Gift Image"></div>
   				<div class="gift_text">
   					<h4>Eggless Cake</h4>
   					<span>Delivered in 2 Hrs.</span>
   					<a class="gift_btn" href="{{url('/')}}/cakes">Order Now</a>
   				</div>
   			</div>

   			<div class="gift_box">
   				<div class="gift_img"><img src="{{url('/')}}/public/assets/images/gift.png" alt="Gift Image"></div>
   				<div class="gift_text">
   					<h4>Flowers for</h4>
   					<span>Occasions</span>
   					<a class="gift_btn" href="{{url('/')}}/flowers">Gift a Flower</a>
   				</div>
   			</div>

   		</div> -->

   		<div class="pgifts">

   			<img src="{{url('/')}}/assets/images/personalized_gifts.jpg" alt="Personalized Gifts">
   			
   		</div>

	</div>
</section>






<section class="plant_sec">
	<div class="container">
		 <h1 class="heading">Plants</h1>
        <div class="plant_sec_inner">
        	<div id="owl-demo" class="owl-carousel owl-theme">
        		@foreach($plant_cat as $plant)
			  <div class="owl-item">
	        	<div class="plant_box">
	        		<?php if(!empty($plant->cat_image)) {   ?>
	        		<a href="{{url('/')}}/plants/{{$plant->cat_slug}}">
	        		 <div class="inner_box">
	        		<div class="plant_img"><img src="{{url('/')}}/uploads/categories/{{$plant->id}}/{{$plant->cat_image}}" alt="{{$plant->cat_name}}"></div>
	        		<h4>{{$plant->cat_name}}</h4>
	        		</div>
	        	</a>
	        	<?php } else { ?>
						<a href="{{url('/')}}/plants/{{$plant->cat_slug}}">
	        		 <div class="inner_box">
	        		<div class="plant_img"><img src="{{url('/')}}/assets/images/dummy_product1.jpg" alt=""></div>
	        		<h4>{{$plant->cat_name}}</h4>
	        		</div>
	        	</a>
					<?php } ?>
	        	</div>
	          </div>
	          @endforeach

	       

	         </div>
        </div>
	</div>
</section>





@endsection