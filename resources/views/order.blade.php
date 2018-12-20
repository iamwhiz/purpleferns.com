@extends('layouts.main')


@section('content')

   <!--  <section class="inner_banner">
   <img src="{{url('/')}}/public/assets/images/inner_banner.jpg">
   <div class="inner_banner_text">
	 <div class="container">
	   <div class="banner_text_inner">
	 	<h3>Premium Flowers</h3>
	 	<p>Nothing can be compared with the brilliance of flowers. The innocence, charm, elegance, and beauty are simply mesmerizing. Explore the best premium flowers here and mesmerize your loved ones.</p>
	  </div>
	  </div>
	</div>
</section> -->

<section class="inner_sec">
	<div class="container">
		<div class="inner_breadcums">
			<div class="inner_left">
				 <!-- {!! Breadcrumbs::render('profile') !!} -->
			</div>
			<!-- <div class="inner_right">
				  
				<ul>
				  <li><a href="#">Showing 60 gifts out of 125</a></li>	
				   <li><a href="#">Sort By</a></li>
				</ul>
			</div> -->
		</div>


		<div class="products_sec">
			<div class="row">
			@include('profile_sidebar')  
			
			<div class="col-xs-12 col-sm-9 product_right_sec wish">
			  <h3>My Orders</h3>
			  
				<div class="table-responsive">          
				  <table class="table">
					<thead>
					  <tr>
						<th>Order ID</th>
						<th>Date</th>
						<th>Total</th>
						<th></th>
					  </tr>
					</thead>
					<tbody>
						@foreach($myorder as $order)
					  <tr>
					  	 @foreach($order['order_products'] as $productid)
						<td>#{{$productid->order_id}}</td>
						@endforeach
						<td>{{$order->created_at}}</td>
						<td>Rs. {{$order->total_cost}}</td>
						<td><a href="{{url('/')}}/view-order/{{$productid->order_id}}" class="eye_btn"><img src="{{url('/')}}/public/assets/images/eye_view.png"></a></td>
					  </tr>
					  @endforeach
					 <!--  <tr>
						<td>#389</td>
						<td>Sep 05,2018</td>
						<td>$30</td>
						<td><a href="#" class="eye_btn"><img src="{{url('/')}}/public/assets/images/eye_view.png"></a></td>
					  </tr>
					  
					  
					  <tr>
						<td>#389</td>
						<td>Sep 05,2018</td>
						<td>$30</td>
						<td><a href="#" class="eye_btn"><img src="{{url('/')}}/public/assets/images/eye_view.png"></a></td>
					  </tr>
					  
					  
					  <tr>
						<td>#389</td>
						<td>Sep 05,2018</td>
						<td>$30</td>
						<td><a href="#" class="eye_btn"><img src="{{url('/')}}/public/assets/images/eye_view.png"></a></td>
					  </tr> -->
					</tbody>
				  </table>
				</div>
			 
			</div>



		   </div>
	    </div>
	</div>
</section>


@endsection