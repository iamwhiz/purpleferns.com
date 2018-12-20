<?php 
use App\Helper;
$image = new Helper();
?>
@extends('layouts.main')


@section('content')


<section class="inner_baner new_banner">
	<img src="{{url('/')}}/public/assets/images/banner3.jpg">
</section>



<section class="inner_sec">
	<div class="container">
		<div class="inner_breadcums">
			<div class="inner_left">

				{!! Breadcrumbs::render('wishlist') !!}
				
			</div>
		</div>


		<div class="products_sec">
		 <div class="row">
		 	@include('profile_sidebar')


             @if(count($wishlist)>0)
			<div class="col-xs-12 col-sm-9 product_right_sec wish">
			
			   <h3>Wishlist</h3>
                @foreach($wishlist as $list)
				
				<div class="wishlist_sec">
				 <div class="wishlist_img"><img src="<?php echo $image->productMainImage($list->product->id); ?>"></div>
				 <div class="wish_list_text">{{$list->product->name}}</div>
				 <div class="wish_list_price">{{$list->product->price}}</div>
				 <div class="wish_button">
				  <ul>

				  <li>
				  <form method="post" action="{{url('/')}}/add-to-cart">
						{{csrf_field()}}
						<input type="hidden" name="id" value="{{$list->product->id}}">
						<input type="hidden" name="name" value="{{$list->product->name}}">
						<input type="hidden" name="qty" value="1">
						<input type="hidden" name="price" value="{{$list->product->price}}">

					<button type="submit" class=" btn btn-success">
					<img src="{{url('/')}}/public/assets/images/cart_wish.png">
				  </button>
					</form>
				  </li>
				   <li class="remove_btn">
				   <button >
				  <a href="{{url('/')}}/remove-wishlist/{{$list->product->id}}"><img src="{{url('/')}}/assets/images/dlt.png"></a></button>
				   </li>
				  </ul>
				 </div>
				</div>

             @endforeach
		
			</div>
            @else
            <div class="col-xs-12 col-sm-9 product_right_sec wish">
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