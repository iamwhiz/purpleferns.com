<?php
  use App\Helper;

  $cate = new Helper();
  $category = $cate->category();
  
  $setting = $cate->web_settings();
  $oc = $cate->occasion();
  

?>
<!DOCTYPE html>
<html>
<head>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
               new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
				})(window,document,'script','dataLayer','GTM-57FBPP9');</script>
	<title>{{isset($meta) ? $meta : request()->segment(1)}} - Purpleferns</title>
	<link rel='shortcut icon' href="{{url('/')}}/assets/images/ms-icon-150x150.png" type='image/x-icon' />
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	 <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{isset($header->seo_description) ? $header->seo_description : $setting['home_description'] }}">
         <meta name="keywords" content="{{isset($header->keywords) ? $header->keywords : $setting['home_keywords']}}">
         <meta name="author" content="">
         <meta name="google-site-verification" content="THs1cZvCxg_z1kMnqatD7A-2C_SPs_J4wy8viCZYO9g" />
          <link rels="canonical" href="https://www.purpleferns.com/" />
         <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

           <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/owl.carousel.css')}}">
	        <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/owl.theme.css')}}">
	        <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/bootstrap.min.css')}}">
	            <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	        <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/datepicker.css')}}">
	       
	         <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.css')}}">
	          <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/responsive.css')}}">
	          <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
	          <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
	          <script src='https://www.google.com/recaptcha/api.js'></script>
             



	          
</head>

<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-57FBPP9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<section class="top_sec">
	<div class="container">
		<div class="top_left">
			<ul>
			  <li><a href="#">Call us on our 24x7</a></li>
			  <li><a href="#">Help Line {{$setting['phone']}}</a></li>
			</ul>
		</div>
		<div class="top_right">
			 <div class="dropdown">
			  <button onclick="myFunction()" class="dropbtn"><img class="locate" src="{{asset('public/assets/images/location.png')}}" alt="Location"> Chandigarh <img class="arrow_img" src="{{asset('public/assets/images/arrow_down.png')}}" alt="Arrow"></button>
			  <div id="myDropdown" class="dropdown-content">
			    <a href="#">Chandigarh</a>
			    <a href="#">Mohali</a>
			    <a href="#">Ludhiana</a>
			    <a href="#">Patiala</a>
			    <a href="#">Mansa</a>
			  </div>
			</div>
		</div>
	</div>
</section>

<section class="header">
	<div class="container">
		<div class="logo"><a href="{{url('/')}}"><img src="{{asset('public/assets/images/logo.png')}}" alt="Logo"></a></div>

		<div class="header_right">
			<div class="search_sec">
				<form method="get"  action="{{url('/')}}/search">
					{{csrf_field()}}
				<input type="text" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>"  placeholder="Search.."  required>
				<input type="submit" value="Send">
				</form>
			</div>
			<div class="cart_ul">
				<ul>
				  <li><a href="{{url('/')}}/cart"><img class="cart_img" src="{{asset('public/assets/images/cart_icon.png')}}" alt="Cart">@if((Cart::count())>0)<span class="badge badge-secondary">{{Cart::count()}}</span>@endif</a></li>
				  <li>
				  @if (Auth::guest())
                    <!--a href="{{ route('login') }}"><img class="login_img" src="{{asset('public/assets/images/login_icon.png')}}"></a-->
                    <a href="{{ route('login') }}"><img class="login_img" src="{{asset('public/assets/images/login_icon.png')}}" alt="Login"></a>
				 @else
					  <a href="{{ route('profile') }}"><img class="login_img" src="{{asset('public/assets/images/login_icon.png')}}" alt="Profile"></a>
				  @endif
				  </li>
				</ul>
			</div>
		</div>
	</div>
</section>                                                                      
<section class="navigation">
	<div class="container">
		<div class="toggle"><i class="fas fa-bars"></i></div>
	 <div class="nav_bar">
		<ul>
		  <li><a href="{{url('/')}}">Home</a></li>
		  <li class="sub_menu"><a href="{{url('/')}}/flowers">Flowers  </a> <img class="arrow" src="{{asset('public/assets/images/arrow_down.png')}}" alt="Flowers">

		    <div class="nav_hover">
			   <div class="nav_hover_inner">
			   	<h4>By Types <img src="{{asset('public/assets/images/arrow_right1.png')}}" alt="By Types"></h4>
			  	<ul>
				 @foreach($category['cat_f_types'] as $cat)
			  	 <li><a title="{{$cat->cat_name}}" href="{{url('/')}}/flowers/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></li>
			  	 @endforeach
			  
			  	</ul>
			  </div>

			  <div class="nav_hover_inner">
			  	  <h4>Flower Combo <img src="{{asset('public/assets/images/arrow_right1.png')}}" alt="Flower Combo"></h4>
			  	<ul>
			  		 @foreach($category['cat_f_combo'] as $cat)
			  	 <li><a title="{{$cat->cat_name}}" href="{{url('/')}}/flowers/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></li>
			  	 @endforeach
			  	
			  	</ul>
			  </div>


             </div>


		  </li>
		 
		  <li class="sub_menu"><a href="{{url('/')}}/cakes">Cakes</a><img class="arrow"  src="{{asset('public/assets/images/arrow_down.png')}}" alt="Cakes">

		  	<div class="nav_hover">
			   <div class="nav_hover_inner">
			   	<h4>By Types <img src="{{asset('public/assets/images/arrow_right1.png')}}" alt="By Types"></h4>
			  	<ul>
			     @foreach($category['cat_cake_types'] as $cat)
			  	 <li><a title="{{$cat->cat_name}}" href="{{url('/')}}/cakes/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></li>
			  	 @endforeach
			  	</ul>
			  </div>

			  <div class="nav_hover_inner">
			  	  <h4>By Flavour <img src="{{asset('public/assets/images/arrow_right1.png')}}" alt="By Flavour "></h4>
			  	<ul>
			  	 	 @foreach($category['cat_cake_flavour'] as $cat)
			  	 <li><a title="{{$cat->cat_name}}" href="{{url('/')}}/cakes/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></li>
			  	 @endforeach
			  	</ul>
			  </div>

			  <div class="nav_hover_inner">
			  	  <h4>By Occasion <img src="{{asset('public/assets/images/arrow_right1.png')}}" alt="By Occasion "></h4>
			  	<ul>
			  	 @foreach($category['cat_cake_occasion'] as $cat)
			  	 <li><a title="{{$cat->cat_name}}" href="{{url('/')}}/cakes/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></li>
			  	 @endforeach
			  	</ul>
			  </div>


             </div>


		  </li>
		   <li class="sub_menu"><a href="{{url('/')}}/gifts">Gifts</a><img class="arrow"  src="{{asset('public/assets/images/arrow_down.png')}}" alt="Gifts ">

		  	<div class="nav_hover">
			   <div class="nav_hover_inner">
			   	<h4>Personalized Gifts <img src="{{asset('public/assets/images/arrow_right1.png')}}"  alt="Personalized Gifts"></h4>
			  	<ul>
			     @foreach($category['cat_personalized_gift'] as $cat)
			  	 <li><a title="{{$cat->cat_name}}" href="{{url('/')}}/gifts/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></li>
			  	 @endforeach
			  	</ul>
			  </div>

			  <div class="nav_hover_inner">
			  	  <h4>Special Gifts <img src="{{asset('public/assets/images/arrow_right1.png')}}" alt="Special Gifts"></h4>
			  	<ul>
			  	 	 @foreach($category['cat_Special_gift'] as $cat)
			  	 <li><a title="{{$cat->cat_name}}" href="{{url('/')}}/gifts/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></li>
			  	 @endforeach
			  	</ul>
			  </div>

			  <div class="nav_hover_inner">
			  	  <h4>By Recipients <img src="{{asset('public/assets/images/arrow_right1.png')}}" alt="By Recipients"></h4>
			  	<ul>
			  	 @foreach($category['cat_gift_recipients'] as $cat)
			  	 <li><a title="{{$cat->cat_name}}" href="{{url('/')}}/gifts/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></li>
			  	 @endforeach
			  	</ul>
			  </div>


             </div>


		  </li>
		   <li class="sub_menu"><a href="{{url('/')}}/plants">Plants</a> <img class="arrow"  src="{{asset('public/assets/images/arrow_down.png')}}" alt="Plants">

		  	<div class="nav_hover">
			   <div class="nav_hover_inner">
			   	<h4>By Types <img src="{{asset('public/assets/images/arrow_right1.png')}}" alt="By Types"></h4>
			  	<ul>
			  	 @foreach($category['cat_p_types'] as $cat)
			  	 <li><a title="{{$cat->cat_name}}" href="{{url('/')}}/plants/{{$cat->cat_slug}}">{{$cat->cat_name}}</a></li>
			  	 @endforeach
			  	
			  	</ul>
			  </div>
             </div>
		  </li>
		  <!-- <li class="sub_menu"><a href="#">Occasions</a> <img class="arrow"  src="images/arrow_down.png"></li> -->
		  <li class=""><a href="{{url('/')}}/about">About Us</a>
		  </li>
		  <li><a href="{{url('/')}}/contact">Contact us</a></li>
		</ul>


	</div>
	</div>
</section>

 

@yield('content')


<section class="footer">
	<div class="container">
		<div class="col-xs-12 col-sm-4 footer_box">
			<div class="footer_logo"><a href="{{url('/')}}"><img src="{{url('/')}}/public/assets/images/footer_logo.png"alt="Footer Logo"></a></div>
			<div class="social_icon">
				<ul>
				  <li><a href="{{$cate->addhttp($setting['facebook_link'])}}"><img src="{{asset('public/assets/images/fbnew1.png')}}" alt="Facebook"></a></li>
				  <li><a href="{{$cate->addhttp($setting['email'])}}"><img src="{{asset('public/assets/images/google_new1.png')}}" alt="google"></a></li>
				  <li><a href="{{$cate->addhttp($setting['twitter_link'])}}"><img src="{{asset('public/assets/images/twitternew1.png')}}" alt="Twitter"></a></li>
				  <li><a href="{{$cate->addhttp($setting['instagram_link'])}}"><img src="{{asset('public/assets/images/insta11.png')}}" alt="pinterest"></a></li>
				  
				</ul>
			</div>
		</div>
		<div class="col-xs-12 col-sm-8 footer_box footer_ul">
			<ul>
			<li><a href="{{url('/')}}">Home</a></li>
			<li><a href="{{url('/')}}/about">About Us</a></li>
			<li><a href="{{url('/')}}/contact">Contact Us</a></li>
			<li><a href="{{url('/')}}/privacy-policy">Privacy Policy</a></li>
			<li><a href="{{url('/')}}/terms-and-conditions">Terms and Conditions</a></li>
			</ul>
			<div class="copy_right">&copy; 2018, <h1 class="purple_h1">Purpleferns</h1>.  All Rights Reserved.</div>
			<div class="design_by"> Design and Maintained By <a href="http://imminentsoftwares.com/" target="_blank">Imminent Softwares</a></div>
			
			
		</div>
		
	</div>
</section>

<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('public/assets/js/product/product.js')}}"></script> 
<script src="{{asset('public/assets/js/owl.carousel.js')}}"></script>

<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 
<script type="text/javascript">
 
$(".myAvatar").click(function() {
    $("#newAvatar").trigger("click");
});
</script>


<script type="text/javascript">
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>


<script type="text/javascript">


    $(document).ready(function() {
     
      $("#owl-demo").owlCarousel({
     
          navigation : true, // Show next and prev buttons  
          slideSpeed : 300,
          pagination : false,
          paginationSpeed : 400,
          autoplay : true,
          items : 6, 
          itemsDesktop : [1199,6],
          itemsDesktopSmall : [979,3],
          itemsTablet : [768,3],
          itemsTablet : [767,2],
          itemsMobile : [479,2],
           navigationText: [
				  '<img src="public/assets/images/arrow_left.png">',
				  '<img src="public/assets/images/arrow_right.png">'
				],


     
      });
     
    });

  
</script>
<script type="text/javascript">


    $(document).ready(function() {
     
      $("#owl-demo1").owlCarousel({
            
			navigation : true, // Show next and prev buttons  
			slideSpeed : 300,
			loop:true,
			addClassActive:true,
			pagination : false,
			paginationSpeed : 400,
			autoPlay : true,
			items :1,
			itemsDesktop : [1199,1],
			itemsDesktopSmall : [979,1],
			itemsTablet : [768,1],
			itemsMobile : [479,1],

           navigationText: [
				  '<img src="public/assets/images/arrow_left.png">',
				  '<img src="public/assets/images/arrow_right.png">'
				],

     
      });
     
    });

  
</script>

<script type="text/javascript">


    $(document).ready(function() {
     
      $("#owl-demo2").owlCarousel({
     
          navigation : true, // Show next and prev buttons  
          slideSpeed : 300,
          pagination : true,
          paginationSpeed : 400,
          autoplay : true,
          items :1,
          itemsDesktop : [1199,1],
          itemsDesktopSmall : [979,1],
          itemsTablet : [768,1],
          itemsMobile : [479,1],
           navigationText: [
				    '<img src="{{url('/')}}/public/assets/images/arrow_left.png">',
				  '<img src="{{url('/')}}/public/assets/images/arrow_right.png">'
				],
     
      });
     
    });

  
</script>

<script type="text/javascript">
 $(document).ready(function(){
	   $(".toggle").click(function(){
			$(".navigation .nav_bar").slideToggle("slow");
		});	

	});
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery(".product_sidebar_inner ul li span").click(function(){
      if(jQuery(this).hasClass('active')){
      	jQuery('.product_sidebar_inner ul li ul').hide('fast');
        jQuery(this).removeClass('active');
      
      }else{
        jQuery('.product_sidebar_inner ul li ul').hide('fast');
        jQuery('.product_sidebar_inner ul li span').removeClass('active');
        jQuery(this).next('.product_sidebar_inner ul li ul').show('fast');
        jQuery(this).addClass('active');
      }  
    });
});
</script>



<script type="text/javascript">
 $(document).ready(function(){
	   $(".navigation ul li.sub_menu img.arrow").click(function(){
	   		if($(this).next(".nav_hover").hasClass('active')){
	   			$(this).next(".nav_hover").removeClass('active');
   				$(this).next(".nav_hover").slideUp("slow");
			}else{
				$(".nav_hover.active").slideUp("slow");
				$(".navigation ul li .nav_hover_inner ul.active").slideUp("slow");
				$(".nav_hover.active").removeClass('active');
				$(this).next(".nav_hover").addClass('active');
				$(this).next(".nav_hover.active").slideDown("slow");
			}
		});	

	});
</script>


<script type="text/javascript">

 if($(window).width() < 768){
 $(document).ready(function(){
	   $(".navigation ul li .nav_hover_inner h4").click(function(){
	   		if($(this).next(".navigation ul li .nav_hover_inner ul").hasClass('active')){
	   			$(this).next(".navigation ul li .nav_hover_inner ul").removeClass('active');
   				$(this).next(".navigation ul li .nav_hover_inner ul").slideUp("slow");
			}else{
				$(".navigation ul li .nav_hover_inner ul.active").slideUp("slow");
				$(".navigation ul li .nav_hover_inner ul.active").removeClass('active');
				$(this).next(".navigation ul li .nav_hover_inner ul").addClass('active');
				$(this).next(".navigation ul li .nav_hover_inner ul.active").slideDown("slow");
			}
		});	

	});
}
</script>
<script type="text/javascript">
     $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
<script type="text/javascript">
     $( function() {
    $( "#datepicker1" ).datepicker();
  } );
</script>
<script type="text/javascript">
     $( function() {
    $( "#datepicker2" ).datepicker();
  } );
</script>
</script>
  <script type="text/javascript">
   $('#datepicker').datepicker({
         dateFormat: 'dd-mm-yy'
   });
</script>
 <script type="text/javascript">
   $('#datepicker1').datepicker({
         dateFormat: 'dd-mm-yy'
   });
</script>
 <script type="text/javascript">
   $('#datepicker2').datepicker({
         dateFormat: 'dd-mm-yy'
   });
</script>

<script type="text/javascript">
  
  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 100, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		$( "#amount1" ).val( + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
         // $( "#amount1" ).val();
			var base_url = '<?php echo url('by-price'); ?>';
            $.ajax({
               type:'post',
               url:base_url,
               data:
					{
					'amount' : $("#amount1").val(),
					'_token' : '<?php echo csrf_token() ?>'
					},
               success:function(responce){
                 if(responce)

{

document.getElementById("publisherEmailValidation").innerHTML = "";

// alert(responce);

$('#count_result .result').html(responce);





}
               }
            });

		
      }
    });
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  </script>
<script type="text/javascript">
	  
        $('#sort').submit(function(event) {
        	event.preventDefault();

            var data = $form.find( 'select[name="sort"]' ).val()
            alert(data);
           
            $.ajax({
               type:'post',
               url:base_url,
               data:
					{
					'amount' : $(this).val(),
					'_token' : '<?php echo csrf_token() ?>'
					},
               success:function(responce){
                 if(responce)

{

document.getElementById("publisherEmailValidation").innerHTML = "";

// alert(responce);

$('#count_result .result').html(responce);





}
               }
            });
        });
   
</script>


 <script type="text/javascript">
 $(document).ready(function(){
    $('#user').click(function(e){
     e.preventDefault();
           common();
      });
$('#drop').on('change',function(e){
     e.preventDefault();
        var data = $(this).val();
        
        var type = $('#type').val();

        common(data,type);
      }); 
$('.paginate a').on('click',function(e){
     e.preventDefault();
        

        common();
      }); 

     var url= "{{url('/sort-by')}}";
     function common(data,type){
     $.ajax({
      url:url,
      type: "get",
      data:{
					'sort' :data,
					'type' : type,
					
					},
    dataType: "html",
      

      success: function (data) {
          
         
       


        $('#old_div').html(data);
         console.log(data)
       
      } 

    });
 }
  
  });

   
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
<script>
	jQuery(document).ready(function() { 
 
 var stickyNavTop = jQuery('.header , .navigation').offset().top;
 var stickyNav = function(){ var scrollTop = jQuery(window).scrollTop();
 if (scrollTop > stickyNavTop) { jQuery('.header , .navigation').addClass('sticky');
		}
	else 
		{ 
	jQuery('.header , .navigation').removeClass('sticky'); 
	}
 }; stickyNav(); 
 jQuery(window).scroll(function() { stickyNav(); 
 });
 }); 
</script>

  @yield('javascript')
  
</body>
</html>