@extends('layouts.main')


@section('content')

<section class="inner_banner">
   <img src="{{url('/')}}/public/assets/images/about-us.jpg" alt="Contact Banner">
   <div class="inner_banner_text">
	 <div class="container">
	   <div class="banner_text_inner">
	 	<h3>Buy The Most Enchanting Flowers and Cakes Online Here</h3>
	 	<p>Purpleferns is the prime stop to buy <strong>cake online</strong> and for the ones calling out for one of the best leading florists who <strong>send flowers online</strong> in India.  Order now!</p>
	  </div>
	  </div>
	</div>
</section>

<section class="inner_sec about_sec">
	<div class="container">
	<div class="inner_breadcums">
			<div class="inner_left">
            {!! Breadcrumbs::render('about') !!}
			
			</div>
		</div>


    <div class="row">
	 <div class="col-xs-12 col-sm-4 about_img">
	   <img src="{{url('/')}}/public/assets/images/abt.jpg" alt="Contact Body Image">
	 </div>
	 <div class="col-xs-12 col-sm-8 about_text">
	   <h4>About US </h4>

	   {!! $content->page_description !!}
	   
	  <!--  <p>
	   	If there is something which is cherished by all the people in the world, it is plants and flowers. Because they bring an instant smile on the face making everyone feel calm and peace within, flowers are the real-time emotions gifted to the loved ones. From the warmth of sunshine to delightful fragrance, the flowers by purpleferns are the choices of every human messenger of emotions.
	   </p>
	   <p>
	   	Plants and flowers are blissful, but a delicious cake makes your loved one speak ultimate happiness. But the place you find an ideal bouquet and mouth-watering cake flooded with emotional touch is where purpleferns steps in. You cannot be settled here as we have many gift options to drop in the best in your shopping cart. While you sit at home, a few taps on our online shop will avail you and your loved ones the quality plants, flowers, and cake in the most convenient way.
	   </p>
	   <p>
	   	If your recipient loves Roses or maybe Orchids or Lilies, the choice to buy the best is purpleferns. We believe in delivering fresh flowers and delightful cakes so that your experience recalls us every time you need prime service. Where words are not enough, our online delivery of flowers, plants, and cakes are ecstatic gifts suiting every occasion. So, the next time you wish to send the flowers and gifts in India, you should know that www.purpleferns.com is the place to head to.
	   </p> -->
	 </div>
	</div>
	
	
	
	<div class="row_outer">
	 <div class="col-xs-12 col-sm-6 padding_0 wh_box_new">
	  <div class="wh_vision">
	   <h4>Vision</h4>
	   <p>{!! $vision !!}</p>
	   </div>
	 </div>
	 
	 <div class="col-xs-12 col-sm-6 padding_0 wh_box_new">
	  <div class="wh_mission">
	   <h4>Mission</h4>
	   <p>{!! $mission !!}</p>
		</div>
	 </div>
	</div>
	

</div>
</section>

<section class="team_members">
	<div class="container">
		<h1>Our Teams</h1>		 
					
		<div class="row">
		
		<div class="col-xs-12 col-sm-3 team_box">
				<div class="team_sec">
					<div class="member_img">
						<img src="{{url('/')}}/public/assets/images/member1.jpg" alt="Team Image">
						<div class="hover_ul_new">
							<ul>
							  <li><a href="#"><img src="{{url('/')}}/public/assets/images/fb2.png" alt="Fb Icon"></a></li>
							  <li><a href="#"><img src="{{url('/')}}/public/assets/images/insta.png" alt="instagram Icon"></a></li>
							  <li><a href="#"><img src="{{url('/')}}/public/assets/images/email11.png" alt="email Icon"></a></li>
							</ul>
						</div>
					</div>
					<div class="member_text">
						<h5>Person 1</h5>
						<span>Manager</span>
					</div>
					<ul class="info_ul">
						<li><a href="tel:+012-345-6789"><img src="{{url('/')}}/public/assets/images/phone.png" alt="Icon"> +012-345-6789</a></li>
						<li><a href="mailto:info@sbtechnosoft.com"><img src="{{url('/')}}/public/assets/images/email2.png" alt="Icon"> info@dummy.com</a></li>
					</ul>
				</div>
			</div>
			
			
			<div class="col-xs-12 col-sm-3 team_box">
				<div class="team_sec">
					<div class="member_img">
						<img src="{{url('/')}}/public/assets/images/member2.jpg" alt="Team Image">
						<div class="hover_ul_new">
							<ul>
							  <li><a href="#"><img src="{{url('/')}}/public/assets/images/fb2.png" alt="fb Icon"></a></li>
							  <li><a href="#"><img src="{{url('/')}}/public/assets/images/insta.png" alt="instagram Icon"></a></li>
							  <li><a href="#"><img src="{{url('/')}}/public/assets/images/email11.png" alt="email Icon"></a></li>
							</ul>
						</div>
					</div>
					<div class="member_text">
						<h5>Person 2</h5>
						<span>Manager</span>
					</div>
					<ul class="info_ul">
						<li><a href="tel:+012-345-6789"><img src="{{url('/')}}/public/assets/images/phone.png" alt="phone Icon"> +012-345-6789</a></li>
						<li><a href="mailto:info@sbtechnosoft.com"><img src="{{url('/')}}/public/assets/images/email2.png" alt="email Icon"> info@dummy.com</a></li>
					</ul>
				</div>
			</div>
			
			
			<div class="col-xs-12 col-sm-3 team_box">
				<div class="team_sec">
					<div class="member_img">
						<img src="{{url('/')}}/public/assets/images/member3.jpg" alt="Team Image">
						<div class="hover_ul_new">
							<ul>
							  <li><a href="#"><img src="{{url('/')}}/public/assets/images/fb2.png" alt="fb Icon"></a></li>
							  <li><a href="#"><img src="{{url('/')}}/public/assets/images/insta.png" alt="instagram Icon"></a></li>
							  <li><a href="#"><img src="{{url('/')}}/public/assets/images/email11.png" alt="email Icon"></a></li>
							</ul>
						</div>
					</div>
					<div class="member_text">
						<h5>Person 3</h5>
						<span>Manager</span>
					</div>
					<ul class="info_ul">
						<li><a href="tel:+012-345-6789"><img src="{{url('/')}}/public/assets/images/phone.png" alt="phone Icon"> +012-345-6789</a></li>
						<li><a href="mailto:info@sbtechnosoft.com"><img src="{{url('/')}}/public/assets/images/email2.png" alt="email Icon"> info@dummy.com</a></li>
					</ul>
				</div>
			</div>
		 	
			<div class="col-xs-12 col-sm-3 team_box">
				<div class="team_sec">
					<div class="member_img">
						<img src="{{url('/')}}/public/assets/images/member4.jpg" alt="Team Image">
						<div class="hover_ul_new">
							<ul>
							  <li><a href="#"><img src="{{url('/')}}/public/assets/images/fb2.png" alt="fb Icon"></a></li>
							  <li><a href="#"><img src="{{url('/')}}/public/assets/images/insta.png" alt="instagram Icon"></a></li>
							  <li><a href="#"><img src="{{url('/')}}/public/assets/images/email11.png" alt="email Icon"></a></li>
							</ul>
						</div>
					</div>
					<div class="member_text">
						<h5>Person 4</h5>
						<span>Manager</span>
					</div>
					<ul class="info_ul">
						<li><a href="tel:+012-345-6789"><img src="{{url('/')}}/public/assets/images/phone.png" alt="phone Icon"> +012-345-6789</a></li>
						<li><a href="mailto:info@sbtechnosoft.com"><img src="{{url('/')}}/public/assets/images/email2.png" alt="email Icon"> info@dummy.com</a></li>
					</ul>
				</div>
			</div>

 	
			

 	
			

 	
			

 
		</div>
	</div>
</section>

@endsection