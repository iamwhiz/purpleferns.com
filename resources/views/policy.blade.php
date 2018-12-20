@extends('layouts.main')


@section('content')

<section class="inner_banner">
   <img src="{{url('/')}}/public/assets/images/inner_banner.jpg">
   <div class="inner_banner_text">
	 <div class="container">
	   <div class="banner_text_inner">
	 	<h3>Premium Flowers</h3>
	 	<p>Nothing can be compared with the brilliance of flowers. The innocence, charm, elegance, and beauty are simply mesmerizing. Explore the best premium flowers here and mesmerize your loved ones.</p>
	  </div>
	  </div>
	</div>
</section>

<section class="inner_sec">
	<div class="container">
<div class="inner_breadcums">
			<div class="inner_left">
            {!! Breadcrumbs::render('policy') !!}
			
			<!-- <ul>
				  <li></li>
				  <li><a href="#">Flowers</a></li>
				  <li>Prenimum Flowers</li>
				</ul> -->
			</div>
			<!-- <div class="inner_right">
				  
				<ul>
				  <li><a href="#">Showing 60 gifts out of 125</a></li>	
				   <li><a href="#">Sort By</a></li>
				</ul>
			</div> -->
		</div>


	<p>{!! $policy->page_description !!}</p>
	

</div>
</section>

@endsection