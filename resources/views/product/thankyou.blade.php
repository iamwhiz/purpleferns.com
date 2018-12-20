
@extends('layouts.main')


@section('content')



<section class="inner_sec ">
 <div class="container">
   <div class="thankyou_sec">
    <div class="thank_you_img"><img src="{{url('/')}}/public/assets/images/thanks.png"></div> 
    <div class="thank_you_text">
	  <h2>Thank You</h2>
	  <h5>Thank you for the Order</h5>
	  
	  <div class="order_id_sec">Order Id #: {{$order_id}}</div>
	  
	  <a href="{{url('/')}}" class="back_to_home">Back to Home</a>
	</div> 
  </div>
 </div>
</section>

@endsection
