@extends('layouts.main')
@section('content')

<section class="inner_sec error_page">
 <div class="container">
     <div class="error_img"><img src="{{url('/')}}/public/assets/images/error_img.png"></div>
	 <div class="error_text">
	  <h4>Oops! You are lost</h4>
	  <span>Sorry The Page Not  Found</span>
	 </div>
 </div>
</section>



@endsection