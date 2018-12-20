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
			
		</div>


		<div class="products_sec">
			<div class="row">
			@include('profile_sidebar')  
			
			
			<div class="col-xs-12 col-sm-9 product_right_sec wish">
			  <h3>My Orders</h3>
			  <div class="order_id">Order Id #: {{$vieworder->id}}</div>
			     <table class="table table_new">
					 <thead>
					  <tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>Price</th>
					  </tr>
					 </thead>
					 
					 <tbody>
					  <tr>
					  	@foreach($vieworder['order_products'] as $name)
						  <td>{{$name->product_name}}</td>
						  @endforeach
						  <td>{{$name->product_qty}}</td>
						  <td>Rs.{{$vieworder->total_cost}}</td>
					  </tr>
					  
					<!--   <tr>
						  <td>Red Rose</td>
						  <td>1</td>
						  <td>$15</td>
					  </tr>
					  
					  <tr>
						  <td>Red Rose</td>
						  <td>1</td>
						  <td>$15</td>
					  </tr> -->
					 <tbody>
			    </table>
				
				
				<table class="table table_new order_cart">
						 
					 <tbody>
					  <tr>
						  <td><strong>Cart Sub Total :</strong></td>
						  <td>Rs. {{$name->product_price}}</td>
					  </tr>
					  <tr>
						  <td><strong>Tax (6.85%) : </strong></td>
						  <td>Rs. {{$vieworder->tax_cost}}</td>
					  </tr>
					  
					  <tr>
						  <td><strong>Shipping : </strong></td>
						  <td>Rs. {{$vieworder->shipping_cost}}</td>
					  </tr>
					  
					  <tr>
						  <td><strong>Order Total : </strong></td>
						  <td>Rs.{{$vieworder->total_cost}}</td>
					  </tr>
					  
					 <tbody>
			    </table>
				
				
				
				
			<div class="detail_box">
			  <div class="row">
			    <div class="col-xs-12 col-sm-4 detail_box_outer">
				  <div class="order_id">Customer Details</div>
				  <div class="detail_box_inner">
				    <p><b>{{$userdata->first_name}} {{$userdata->last_name}}</b></p>
				    <p>{{$userdata->email}}</p>
				    <p>{{$userdata->mobile}}</p>
				  </div>
				</div>
				
				<div class="col-xs-12 col-sm-4 detail_box_outer">
				  <div class="order_id">Payment Method</div>
				  <div class="detail_box_inner">
				    <p><strong>Date:</strong>  {{date('F d, Y',strtotime($vieworder->created_at))}}</p>
				    <p><strong>Payment method:</strong> {{$vieworder->payment_type}}</p>
				    @if($vieworder->payment_type !== 'COD')
				    <p><strong>Card No.</strong> ############1111 </p>
				    <p><strong>Transaction id. </strong>{{$vieworder->transaction_id}}</p>
				    @endif
				  </div>
				</div>
				
				<div class="col-xs-12 col-sm-4 detail_box_outer">
				  <div class="order_id">Shipping Address</div>
				  <div class="detail_box_inner">
				    <p>{{$vieworder->reciever_address}},
					City - {{$vieworder->reciever_city}}</p>
				  </div>
				</div>

				
			  </div>
			</div>
			
			</div>
			
			




		    </div>

	    </div>
	</div>

</section>

@endsection