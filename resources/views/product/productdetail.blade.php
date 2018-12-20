<?php 
use App\Helper;
$image = new Helper();
$price = $image;
$moneyFormat = $price->moneyFormat();

$type = request()->segment(1);

?>
@extends('layouts.main')


@section('content')

	<section class="inner_sec">
	<div class="container">
		<div class="inner_breadcums">
			<div class="inner_left">
				{!! Breadcrumbs::render($type,$meta) !!}
				
			</div>
		</div>

		<div class="product_info">
			<div class="col-xs-12 col-sm-4 prdct_slider">
			  <div id="owl-demo2" class="owl-carousel owl-theme">
	  			 <div class="item">
	  			 	<img src="<?php echo $image->productMainImage($detail->id); ?>">
	  			 </div>
                 @foreach($image->multipleImages($detail->id) as $img)
                 @if(!empty($img))
	  			 <div class="item">
	  			 	<img src="/uploads/products/{{$detail->id}}/{{$img->image}}">
	  			 </div>
	  			 @endif
	  			 @endforeach

	  			

	  		  </div>
			</div>

			<div class="col-xs-12 col-sm-8 product_detail">
				<div class="product_top">
					<div class="product_name">
						<h2>{{ucwords($detail->name)}}
						  <?php  
						  			
						  ?>
						<div class="product_price">
						<div class="price_txt">
							<?php if(($detail->product_type) != '1') { ?>
							<h5>{{$price->priceFormat($detail->price)}}
								<!-- <span><i class="fas fa-rupee-sign"></i> {{$detail->price}}</span> --> </h5>
							<?php } else {

								  foreach($combinations as $combination)
						  			  {
						  			    $priceProduct =  $combination->product_price;
						  			      ?>
                                             <h5  ><?php echo $moneyFormat; ?><div style="display: inline-block;" class="product_rs"> {{$priceProduct}}</div></h5>
						  			      <?php
                                        break;
						  			  } 
                                  

							} ?>
						<!-- @if(($detail->price)>0)

							<div class="off">({{floor((($detail->price-$detail->sale_price)*100)/$detail->price)}} % Off) </div>
						@endif -->
							
						</div>
					</div>
						</h2>
						<!-- <div class="star_ul">
							<ul>
							  <li><i class="fas fa-star"></i></li>
							  <li><i class="fas fa-star"></i></li>
							  <li><i class="fas fa-star"></i></li>
							  <li><i class="fas fa-star"></i></li>
							  <li><i class="far fa-star"></i></li>
							</ul>
						</div>
						<div class="reviews">497 Reviews</div> -->
						<?php  

						 foreach($combinations as $combination)
						  			  {
						  			    $weightProduct =  $combination->combination;
						  			      
                                        break;
						  			  } 

                           if(($detail->product_type) == '1')   
                           {
							?>
                             <div class="btn_sec">           
						      <form method="post" action="{{url('/')}}/add-to-cart">
									{{csrf_field()}}
									<input type="hidden" name="id" value="{{$detail->id}}">
									<input type="hidden" name="name" value="{{$detail->name}}">
									<input type="hidden" name="qty" value="1">
									<input type="hidden" class="product_rupees"  name="price" value="{{ $priceProduct}}">
									<input type="hidden" class="product_weight" name="product_weight" value="{{$weightProduct}}">
									<button type="submit"><a class="cart_btn"><img src="{{url('/')}}/public/assets/images/cart_new_icon.png">Buy Now</a></button>
							</form>
						</div>
							<?php
                             
                           } else {

						?>
						
						<div class="btn_sec">           
						<form method="post" action="{{url('/')}}/add-to-cart">
									{{csrf_field()}}
									<input type="hidden" name="id" value="{{$detail->id}}">
									<input type="hidden" name="name" value="{{$detail->name}}">
									<input type="hidden" name="qty" value="1">
									<input type="hidden" name="price" value="{{$detail->price}}">
									<button type="submit"><a class="cart_btn"><img src="{{url('/')}}/public/assets/images/cart_new_icon.png">Buy Now</a></button>
							</form>
						</div>
					<?php } ?>
					</div>

					
				</div>
				  <?php

				 if(($detail->product_type) == '1') { ?>
				<div class="new_box">
				  <ul> 
				     <?php if($detail->variable_type == 'weight') { ?>    
				    <li><span>Product Weight :</span> 
                     <?php 

                           
                           foreach($combinations as $combination)
                           {
                           	  ?>
                           	  <div id="radioId" >
                           	  <input  type="radio" class="checked_variant" data-rs="{{$combination->product_price}}"  name="combination" value="{{$combination->combination}}">{{ str_replace("weight-","",$combination->combination)}} {{ $detail->weight_type}}
                               </div>

                           	  <?php
                           }
                     ?>
				    </li>
				    <?php } elseif($detail->variable_type  == 'color') {  ?>
				   <li><span>Product color :  </span>
				   	 <?php 

                         
                           foreach($combinations as $combination)
                           {
                           	  ?>
                           	   <div id="radioId" >
                           	  <input  type="radio" class="checked_variant" data-rs="{{$combination->product_price}}"  name="combination" value="{{$combination->combination}}">{{ str_replace("color-","",$combination->combination)}}
                               </div>
                           	  <?php
                           }
                     ?>
                   </li>
                  <?php } ?>
				    <!-- <li><span>No of Rose : </span> 10 Yellow Carnations</li> -->
				  </ul>
				</div>
				 <?php } ?>

            <!--div class="delivery_status">
            	<ul>
            	  <li>
            	  	<img src="{{url('/')}}/public/assets/images/deliver_car.png">
            	  	<strong> Delivering <span>Since 1994</span></strong>
            	  </li>
            	  <li>
            	  	<img src="{{url('/')}}/public/assets/images/deliver_box.png">
            	  	<strong>  Order Delivered  <span>2.5 Seconds</span></strong>
            	  </li>

            	  <li>
            	  	<img src="{{url('/')}}/public/assets/images/deliver_time.png">
            	  	<strong> We Deliver On Time</strong>
            	  </li>
            	</ul>
            </div-->

      

            
             <!--  <div class="btn_sec">
            	@if(Auth::check())
            	<a class="wish_btn" href="{{url('/')}}/add-to-wishlist/{{$detail->id}}"><img src="{{url('/')}}/public/assets/images/heart_new_icon.png">Add to Wishlist</a>
            	@endif
          
            </div> -->
			
			
			<div class="prdct_inner_text"> 
			<?php if(count($detail->description)>0) { ?>
				<h2 class="heading_new">Description</h2>
				<!-- <h3>Product Details:</h3> -->
             
				{!! $detail->description !!}

			<?php } ?>
				
			    <?php if(count($detail->care_instruction)>0) { ?>
				<h2 class="heading_new head">Care Instructions</h2>
				{!! $detail->care_instruction !!}
                 <?php } ?>
			
				
				
				<?php  

                           if(($detail->product_type) == '1')   
                           {
							?>
                             <div class="btn_sec">           
						      <form method="post" action="{{url('/')}}/add-to-cart">
									{{csrf_field()}}
									<input type="hidden" name="id" value="{{$detail->id}}">
									<input type="hidden" name="name" value="{{$detail->name}}">
									<input type="hidden" name="qty" value="1">
									<input type="hidden" class="product_rupees"  name="price" value="{{ $priceProduct}}">
									<input type="hidden" class="product_weight" name="product_weight" value="{{$weightProduct}}">
									<button type="submit"><a class="cart_btn"><img src="{{url('/')}}/public/assets/images/cart_new_icon.png">Buy Now</a></button>
							</form>
						</div>
							<?php
                             
                           } else {

						?>
						
						<div class="btn_sec">           
						<form method="post" action="{{url('/')}}/add-to-cart">
									{{csrf_field()}}
									<input type="hidden" name="id" value="{{$detail->id}}">
									<input type="hidden" name="name" value="{{$detail->name}}">
									<input type="hidden" name="qty" value="1">
									<input type="hidden" name="price" value="{{$detail->price}}">
									<button type="submit"><a class="cart_btn"><img src="{{url('/')}}/public/assets/images/cart_new_icon.png">Buy Now</a></button>
							</form>
						</div>
					<?php } ?>


			</div>
			
			
			

			</div>

		</div>

	</div>
</section>

<!--section class="product_abt">
	<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 description">
					<div class="prdct_inner_text">
						<h2 class="heading_new">Description</h2>
						 <h3>Product Details:</h3>

						<p>{!! $detail->description !!}</p>
						<ul>
						 <li><strong>35 Red Roses</strong></li>
						 <li><strong>Heart Shaped Basket</strong></li>
						</ul>

						<h3>Flowers Trivia:</h3>
						<ul>
						 <li>Did you know a rose bush can grow quite tall? The tallest ever recorded rose
						 bush stands at over 23 feet (7 meters) tall!</li>
						</ul>

						<h3>Please Note:</h3>
						<ul>
						 <li>The Ribbon can be saved and used later for decorating gifts!</li>
						 <li>Green Fillers may vary as per local and seasonal availability.</li>
						</ul> 


					</div>
				</div>


				<div class="col-xs-12 col-sm-6 description">
					<div class="prdct_inner_text">
						<h2 class="heading_new">Care Instructions</h2>

						<p>{!! $detail->care_instruction !!}</p>
					
					</div>
				</div>

			</div>
		</div>
</section-->


<!-- <section class="customer_review">
	<div class="container">
		<h2 class="heading_new">Customers Reviews
			<div class="star_new">
				<div class="star_txt">4/5</div>
			<div class="star_box">
			<div class="star_ul">
				<ul>
				  <li><i class="fas fa-star"></i></li>
				  <li><i class="fas fa-star"></i></li>
				  <li><i class="fas fa-star"></i></li>
				  <li><i class="fas fa-star"></i></li>
				  <li><i class="far fa-star"></i></li>
				</ul>
			</div><br>
			<div class="reviews">497 Reviews</div>
			</div>
		</div>
		</h2>



      <div class="row">
      	<div class="col-xs-12 col-sm-4 review_sec">
      		<div class="review_box">
      			<div class="review_top">
      				<div class="client_img">
      					<img src="{{url('/')}}/public/assets/images/client1.png">
      				</div>
      				<div class="client_name">
      					<h5>Anwar Masood</h5>
      					<span>Delivered at: Pune </span>
      					<div class="star_ul">
      					<ul>
						  <li><i class="fas fa-star"></i></li>
						  <li><i class="fas fa-star"></i></li>
						  <li><i class="fas fa-star"></i></li>
						  <li><i class="fas fa-star"></i></li>
						  <li><i class="far fa-star"></i></li>
						</ul>
      					</div>
      				</div>
      				<div class="client_date">21/10/2018,10:54</div>
      			</div>

      			<div class="review_text">
      				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut laboreet dolore magna aliqua Lorem ipsum dolor sit amet.</p>
      			</div>
      		</div>
      	</div>

      	<div class="col-xs-12 col-sm-4 review_sec">
      		<div class="review_box">
      			<div class="review_top">
      				<div class="client_img">
      					<img src="{{url('/')}}/public/assets/images/client1.png">
      				</div>
      				<div class="client_name">
      					<h5>Anwar Masood</h5>
      					<span>Delivered at: Pune </span>
      					<div class="star_ul">
      					<ul>
						  <li><i class="fas fa-star"></i></li>
						  <li><i class="fas fa-star"></i></li>
						  <li><i class="fas fa-star"></i></li>
						  <li><i class="fas fa-star"></i></li>
						  <li><i class="far fa-star"></i></li>
						</ul>
      					</div>
      				</div>
      				<div class="client_date">21/10/2018,10:54</div>
      			</div>

      			<div class="review_text">
      				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut laboreet dolore magna aliqua Lorem ipsum dolor sit amet.</p>
      			</div>
      		</div>
      	</div>


      	<div class="col-xs-12 col-sm-4 review_sec">
      		<div class="review_box">
      			<div class="review_top">
      				<div class="client_img">
      					<img src="{{url('/')}}/public/assets/images/client1.png">
      				</div>
      				<div class="client_name">
      					<h5>Anwar Masood</h5>
      					<span>Delivered at: Pune </span>
      					<div class="star_ul">
      					<ul>
						  <li><i class="fas fa-star"></i></li>
						  <li><i class="fas fa-star"></i></li>
						  <li><i class="fas fa-star"></i></li>
						  <li><i class="fas fa-star"></i></li>
						  <li><i class="far fa-star"></i></li>
						</ul>
      					</div>
      				</div>
      				<div class="client_date">21/10/2018,10:54</div>
      			</div>

      			<div class="review_text">
      				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut laboreet dolore magna aliqua Lorem ipsum dolor sit amet.</p>
      			</div>
      		</div>
      	</div>
      </div>


	</div>
</section> -->

<section class="flower_sec">
	<div class="container">
		<h1 class="heading">You May Also Like</h1>
	      <div class="flower_inner">
	      	@foreach($category as $cat)

	        @if($parent == 'flowers')
			<div class="flower_box">
				<div class="cake_img flower_imgs">
					  <?php if(!empty($cat->cat_image)) {   ?>
					 <a href="{{url('/')}}/flowers/{{$cat->cat_slug}}">
					<img src="{{url('/')}}/uploads/categories/{{$cat->id}}/{{$cat->cat_image}}">
				      </a>
					<?php } else { ?>
                                  <a href="{{url('/')}}/flowers/{{$cat->cat_slug}}">
                                <img src="{{url('/')}}/assets/images/dummy_product1.jpg" alt="">
                                 </a>

                             <?php } ?>
				</div>
				<div class="flower_heading"><h3><a href="{{url('/')}}/flowers/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></h3></div>
			</div>
			@elseif($parent == 'plants') 
			<div class="flower_box">
				<div class="cake_img flower_imgs">
					 <?php if(!empty($cat->cat_image)) {   ?>
					<a href="{{url('/')}}/plants/{{$cat->cat_slug}}">
					<img src="{{url('/')}}/uploads/categories/{{$cat->id}}/{{$cat->cat_image}}">
				    </a>
					<?php } else { ?>
                                  <a href="{{url('/')}}/plants/{{$cat->cat_slug}}">
                                <img src="{{url('/')}}/assets/images/dummy_product1.jpg" alt="">
                                 </a>

                             <?php } ?>
				</div>
				<div class="flower_heading"><h3><a href="{{url('/')}}/plants/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></h3></div>
			</div>
			@elseif($parent == 'cakes') 
             <div class="flower_box">
				<div class="cake_img flower_imgs">
					 <?php if(!empty($cat->cat_image)) {   ?>
					<a href="{{url('/')}}/cakes/{{$cat->cat_slug}}">
					<img src="{{url('/')}}/uploads/categories/{{$cat->id}}/{{$cat->cat_image}}">
				    </a>
				    <?php } else { ?>
                                  <a href="{{url('/')}}/cakes/{{$cat->cat_slug}}">
                                <img src="{{url('/')}}/assets/images/dummy_product1.jpg" alt="">
                                 </a>

                             <?php } ?>
				</div>
				<div class="flower_heading"><h3><a href="{{url('/')}}/cakes/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></h3></div>
			</div>
			@elseif($parent == 'gifts') 

			<div class="flower_box">
				<div class="cake_img flower_imgs">
					<?php if(!empty($cat->cat_image)) {   ?>
					<a href="{{url('/')}}/gifts/{{$cat->cat_slug}}">
					<img src="{{url('/')}}/assets/images/{{$cat->banner_image}}">
				    </a>
				     <?php } else { ?>
                                  <a href="{{url('/')}}/cakes/{{$cat->cat_slug}}">
                                <img src="{{url('/')}}/assets/images/dummy_product1.jpg" alt="">
                                 </a>

                             <?php } ?>
				</div>
				<div class="flower_heading"><h3><a href="{{url('/')}}/gifts/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></h3></div>
			</div>
			@endif
            @endforeach
			<!-- <div class="flower_box">
				<div class="cake_img flower_imgs"><img src="{{url('/')}}/public/assets/images/flower2.jpg"></div>
				<div class="flower_heading"><h3><a href="#">Orchids and Lillies </a></h3></div>
			</div>


			<div class="flower_box">
				<div class="cake_img flower_imgs"><img src="{{url('/')}}/public/assets/images/flower3.jpg"></div>
				<div class="flower_heading"><h3><a href="#">Premium Flowers</a></h3></div>
			</div>

			<div class="flower_box">
				<div class="cake_img flower_imgs"><img src="{{url('/')}}/public/assets/images/flower4.jpg"></div>
				<div class="flower_heading"><h3><a href="#"> Bouquets </a></h3></div>
			</div>
			<div class="flower_box">
				<div class="cake_img flower_imgs"><img src="{{url('/')}}/public/assets/images/flower4.jpg"></div>
				<div class="flower_heading"><h3><a href="#"> Bouquets </a></h3></div>
			</div> -->
		  </div>

	</div>
</section>






@endsection