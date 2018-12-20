<?php
  use App\Helper;

  $cate = new Helper();
  // $category = $cate->category();
  
  $setting = $cate->web_settings();
  // $oc = $cate->occasion();
  

?>
@extends('layouts.main')


@section('content')

<!-- <section class="inner_banner">
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

<section class="inner_sec contact_page">
	<div class="container">
<div class="inner_breadcums">
			<div class="inner_left">
            {!! Breadcrumbs::render('contact') !!}
			</div>
			
		</div>
		
		
    <div class="contact_heading">
	  <h1>{!! $header->page_name !!}</h1>
	  <p>{!! $header->page_description !!}</p>
	</div>
	
	<div class="contact_map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d13722.731837432968!2d76.71996277074271!3d30.69919515706436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1seBook+Bazaar+Inc.+Plot+No+F-26+First+Floor+Phase+8%2C!5e0!3m2!1sen!2sin!4v1542350708234" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	
	<div class="contact_page_form">
		<h1>Contact Us</h1>

	 @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
   
<div>
@if(session()->has('message'))
   <div class="alert alert-success">
       {{ session()->get('message') }}
   </div>
@endif
</div>
		<form method="post" action="{{url('/')}}/contact-us">	
		{{csrf_field()}}
		<div class="row">
		<div class="col-xs-12 col-sm-6 input_box ">
		<label>First Name</label>
		<input type="text" name="first_name" placeholder="Enter First Name">
		</div>
		<div class="col-xs-12 col-sm-6 input_box">
		<label>Last Name</label>
		<input type="text" name="last_name" placeholder="Enter Last name">
		</div>
		<div class="col-xs-12 col-sm-6 input_box">
		<label>Email</label>
		<input type="text" name="email" placeholder="Enter Email">
		</div>
		<div class="col-xs-12 col-sm-6 input_box">
		<label>Phone</label>
		<input type="text" name="mobile" placeholder="Enter Phone Number">
		</div>
		
		<div class="col-xs-12 col-sm-12 input_box">
		<label>Message</label>
		<textarea name="message" placeholder="Write Somthings"></textarea>
		</div>
        <div class="col-xs-12 col-sm-12 submit_btn">
		<div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="6LeFLXsUAAAAAFFZFFzjzJGK_LTHuCkFH-xgad6R"></div>
	    </div>
		<div class="col-xs-12 col-sm-12 submit_btn">
		<input type="submit" value="Submit">
		</div>
		</div>
		</form>
		
	</div>
	
	
	<div class="contact_info">
	  <div class="row">
	   <div class="col-xs-12 col-sm-4 info_outer">
	     <div class="icon_img"><img src="{{url('/')}}/public/assets/images/location1.png" alt="Loaction Icon" /></div>
		 <h5>Location</h5>
		 <p>Purpleferns,1130, dummy city</p>
	   </div>
	   
	   <div class="col-xs-12 col-sm-4 info_outer">
	     <div class="icon_img"><img src="{{url('/')}}/public/assets/images/email_2.png" alt="Email Icon" /></div>
		 <h5>Email</h5>
		 <p>info@purpleferns.com</p>
	   </div>
	   
	   <div class="col-xs-12 col-sm-4 info_outer">
	     <div class="icon_img"><img src="{{url('/')}}/public/assets/images/hand1.png" alt="Thumb Up Icon" /></div>
		 <h5>Follow Us</h5>
		 <ul>
		  <li><a href="{{$cate->addhttp($setting['facebook_link'])}}"><img src="{{url('/')}}/public/assets/images/fb_new.png" alt="Facebook Icon"></a></li>
		  <li><a href="{{$cate->addhttp($setting['twitter_link'])}}"><img src="{{url('/')}}/public/assets/images/twitter_new.png" alt="Twitter Up Icon"></a></li>
		  <li><a href="{{$cate->addhttp($setting['email'])}}"><img src="{{url('/')}}/public/assets/images/google_new.png" alt="google plus Icon"></a></li>
		  <li><a href="{{$cate->addhttp($setting['instagram_link'])}}"><img src="{{url('/')}}/public/assets/images/insta22.png" alt="Pinterest Icon"></a></li>
		 </ul>
	   </div>
	   
	  </div>
	</div>



	

</div>
</section>

@endsection