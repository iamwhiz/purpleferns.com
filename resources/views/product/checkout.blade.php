
<?php 
use App\Helper;
$image = new Helper();
$price = $image;
// $banner = $image->categoryBanner($banner_id);
$moneyFormat = $image->moneyFormat();
?>

@extends('layouts.main')


@section('content')


<section class="inner_sec">
	<div class="container">
		<div class="inner_breadcums">
			<div class="inner_left">
               {!! Breadcrumbs::render('checkout') !!}
			</div>
		</div>
		


<form id="msform" id="form"  method="post" action="{{url('/')}}/place-order">	

     {{csrf_field()}}
		<div class="check_out_ul">
		   <h2>Checkout</h2>
		  <ul>
		    <li class="green_li">
			  <div class="checkout_img wh_green">
			  <img class="active_green" src="{{url('/')}}/public/assets/images/sender_green.png">
			  <img class="unactive" src="{{url('/')}}/public/assets/images/sender.png"></div>
			  <label>Sender Detail</label>
			</li>
			
			<li>
			  <div class="checkout_img">
			  <img class="active_green" src="{{url('/')}}/public/assets/images/shipping_green.png">
			  <img class="unactive" src="{{url('/')}}/public/assets/images/shipping.png">
			  </div>
			  <label>Shipping Method</label>
			</li>
			
			<li>
			  <div class="checkout_img">
			  <img class="active_green" src="{{url('/')}}/public/assets/images/order_green.png">
			  <img class="unactive" src="{{url('/')}}/public/assets/images/order.png">
			  </div>
			  <label>Order review</label>
			</li>
			
			<li>
			  <div class="checkout_img">
			  <img class="active_green" src="{{url('/')}}/public/assets/images/card_green.png">
			  <img class="unactive" src="{{url('/')}}/public/assets/images/card.png">
			  </div>
			  <label>Payment</label>
			</li>
		  </ul>
		</div>
		
		<fieldset>	
		<div class="checkout_box">
		  <h3>Sender Detail</h3>
		  <?php $userdata = Auth::user(); ?>
		  <div class="row">
		
		    
			
			 <div class="col-xs-12 col-sm-3 check_input">
			  <label>Full Name <span>*</span> </label>
			  <input type="text" value="{{$userdata->first_name}} {{$userdata->last_name}}" name="sender_full_name" placeholder="" required>
			</div>
			
			
			 <div class="col-xs-12 col-sm-6 check_input">
			  <label>Mobile Number <span>*</span> </label>
			  <input type="text" name="sender_phone_no"  value="{{$userdata->mobile}}" placeholder="" required>
			</div>
			
			<div class="col-xs-12 col-sm-3 check_input">
			  <label>State/Province <span>*</span> </label>
			  <select name="sender_state" required>
			  <option value="volvo">Select</option>
			  <option value="Punjab">Punjab</option>
			  <option value="Haryana">Haryana</option>
			  <option value="Himachal">Himachal</option>
			</select>
			</div>
			
			<div class="col-xs-12 col-sm-3 check_input">
			  <label>Country <span>*</span> </label>
			 <select name="sender_country" required="required">
			 <!--  <option value="volvo">Select</option>
			  <option value="saab">Saab</option> -->
			  <option value="{{$userdata->country}}">{{$userdata->country}}</option>
			 <!--  <option value="audi">Audi</option> -->
			</select>
			</div>
			
		  </div>
		  
		</div>
	
		
		<div class="checkout_box">
		  <h3>Reciever’s Detail</h3>
		  
		  <div class="row">
	
		   
			
			 <div class="col-xs-12 col-sm-3 check_input">
			  <label>Full Name  <span>*</span> </label>
			  <input type="text" name="reciever_full_name" placeholder="" required>
			</div>
			
			
			 <div class="col-xs-12 col-sm-3 check_input">
			  <label>Address <span>*</span> </label>
			  <input type="text" name="reciever_address" placeholder="" required>
			</div>
			
			<div class="col-xs-12 col-sm-3 check_input">
			  <label>Address 2 <span></span> </label>
			  <input type="text" name="reciever_address2" placeholder="">
			</div>
			
			<div class="col-xs-12 col-sm-3 check_input">
			  <label>State/Province <span>*</span> </label>
			 <select name="reciever_state" required="required">
			  <option selected="" disabled>Select</option>
			  <option value="Punjab">Punjab</option>
			  <option value="Haryana">Haryana</option>
			  <option value="Himachal">Himachal</option>
			</select>
			</div>
			
			<div class="col-xs-12 col-sm-3 check_input">
			  <label>Country <span>*</span> </label>
			 <select name="reciever_country" required="required">
			  <option>Select</option>
			  <option value="India">India</option>
			 <option value="Canada">Canada</option>
			 
              <option value="Australia">Australia</option>
			</select>
			</div>
			
			<div class="col-xs-12 col-sm-3 check_input">
			  <label>City <span>*</span> </label>
			  <select name="reciever_city" id="city" required="required">
			  <option selected="" disabled="">Select</option>
			  <option value="Ajmer">Ajmer</option>
			 <option value="Delhi">Delhi</option>
			 <option value="Aligarh">Aligarh</option>
			 
             
			</select>
			</div>
			
			<div class="col-xs-12 col-sm-3 check_input">
			  <label>Zip/Postal Code <span>*</span> </label>
			  <input type="text" name="reciever_zipcode" placeholder="" required>
			</div>
			
			<div class="col-xs-12 col-sm-3 check_input">
			  <label>Mobile Number <span>*</span> </label>
			  <input type="text" name="reciever_phone_no" placeholder="" required>
			</div>
			
		
			
		  </div>
		  
		</div>
		
		
		<div class="checkout_btn">
		  <button type="button" class="next">Next !</button>
		</div>
		
		</fieldset>
		
		
		<fieldset>
		<div class="checkout_box">
		  <h3>Shipping  Method</h3>
		  
		  <div class="row">
			<div class="col-xs-12 col-sm-6 check_input form_datetime">
			  <label>Delivery Date </label>
			  <input type="text" name="delivery_date"    id='datepicker' required>
			</div>
		  </div>
			
			<h3 class="wh_h3">Delivery Type</h3>
			
		<div class="row">
		   <div id="ajmer" style="display: none">
			<div class="col-xs-12 col-sm-6 check_input radio_btn">
			  <label class="label1">Standard Delivery
				  <input type="radio" class="standard" name="delivery_type" value="standard_delivery">
				  <span class="checkmark"></span>
				</label>
				<div class="sd">
					
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-6 check_input radio_btn">
			  <label class="label1">Fixed Time Delivery
				
				  <input type="radio" class="fixed" name="delivery_type" value="fixed_time_delivery">
				  <span class="checkmark"></span>
				</label>
				<div class="fd">
					
				</div>
			</div>
			
			
			<div class="col-xs-12 col-sm-6 check_input radio_btn">
			  <label class="label1">Midnight Delivery  
			
				  <input type="radio" class="mid_nit" name="delivery_type" value="midnight_delivery">
				  <span class="checkmark"></span>
				</label>
				<div class="md">
					
				</div>
			</div>
		</div>
		 <div id="delhi" style="display: none">
			<div class="col-xs-12 col-sm-6 check_input radio_btn">
			  <label class="label1">Standard Delivery 
				  <input type="radio" class="standard" name="delivery_type" value="standard_delivery">
				  <span class="checkmark"></span>
				</label>
				<div class="sd">
					
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-6 check_input radio_btn">
			  <label class="label1">Fixed Time Delivery 
				  <input type="radio" class="fixed" name="delivery_type" value="fixed_time_delivery">
				  <span class="checkmark"></span>
				</label>
				<div class="fd">
					
				</div>
			</div>
			
			
			<div class="col-xs-12 col-sm-6 check_input radio_btn">
			  <label class="label1">Midnight Delivery 
			
				  <input type="radio" class="mid_nit" name="delivery_type" value="midnight_delivery">
				  <span class="checkmark"></span>
				</label>
				<div class="">
					
				</div>
			</div>
		</div>
		<div id="aligarh" style="display: none">
			<div class="col-xs-12 col-sm-6 check_input radio_btn">
			  <label class="label1">Standard Delivery 
				  <input type="radio" class="standard" name="delivery_type" value="standard_delivery">
				  
				  <span class="checkmark"></span>
				</label>
				<div class="sd">
					
				</div>
				
			</div>
		
			
		</div>
			
		 </div>
		 
		<h3 class="wh_h3">Delivery Time</h3>
		<div class="row">
		<div class="col-xs-12 col-sm-6 check_input radio_btn">
	     
		 <div class="time" >
		 	
		 </div>
	
		</div>
	</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 check_input">
			  <label>Message Card </label>
			  <input type="text" name="message_card" placeholder="">
			</div>
			
			<div class="col-xs-12 col-sm-6 check_input">
			  <label>Special Instruction </label>
			  <input type="text" name="special_instruction" placeholder="">
			</div>
			
			
			
			
		  </div>
		  
		</div>
		
		
		<div class="checkout_btn">
		  <button class="back previous" type="button">Back</button>
		  <button type="button" class="next">Next !</button>
		</div>
		
		</fieldset>
		
		
		<fieldset>
		<div class="checkout_box">
		   <h3>Order review</h3>
		   
		   <table class="table">
			<thead>
			  <tr>
				<th>Product</th>
				<th>Price</th>
				<th>QTY</th>
				<th>Subtotal</th>
			  </tr>
			</thead>
			<tbody>
				@foreach($checkout as $check)
			  <tr>
				<td>{{$check->name}}</td>
				<td>{{ $price->priceFormat($check->price)}}</td>
				<td>{{$check->qty}}</td>
				<td>{{ $price->priceFormat($check->price)}}</td>
			  </tr>
               <input type="hidden" name="product_id" value="{{$check->id}}">
               <input type="hidden" name="rowId" value="{{$check->rowId}}">
               <input type="hidden" name="product_name" value="{{$check->name}}">
               <input type="hidden" name="product_qty" value="{{$check->qty}}">
               <input type="hidden" name="product_price" value="{{$check->price}}">
			  @endforeach
			
            
               <input type="hidden" name="tax" value="{{Cart::tax()}}">
               <input type="hidden" name="total_cost" value="{{Cart::total()}}">
               <input type="hidden" name="shipping_cost" value="50">
			  <tr class="subtotal wh_sub">
				<td colspan="2">Subtotal</td>
				<td colspan="1"></td>
				<td colspan="1">{{ $price->priceFormat(Cart::subtotal())}} </td>
			  </tr>
				<!--tr class="subtotal">
				<td colspan="2">Tax</td>
				<td colspan="1"></td>
				<td colspan="1">{{ $price->priceFormat(Cart::tax())}} </td>
			  </tr-->
			  <tr class="subtotal">
				<td colspan="2">Shipping & Handing (Delivery Type - <span class="div_type" ></span> Between 
					<span class="div_time" ></span></td>
				<td colspan="1"></td>
				<td colspan="1">{{ $price->priceFormat(50)}}</td>
			  </tr>

			  
			  <tr class="grand_total">
				<td colspan="2"><b>Grand Total</b></td>
				<td colspan="1"></td>
				<td colspan="1">{{ $price->priceFormat(Cart::total())}}</td>
			  </tr>
			  
			  <tr class="subtotal">
				<td colspan="4"><label class="label1">I Agree to the Terms &  Conditions
				  <input type="radio" name="radio" required>
				  <span class="checkmark"></span>
				</label></td>
			  </tr>
			  
			  
			</tbody>
		  </table>
		   
		</div>
		
		
		<div class="checkout_btn">
		  <button class="back previous" type="button">Back</button>
		  <button type="button" class="next">Proceed to Pay</button>
		</div>
		
		</fieldset>
		
		
		<fieldset>
		<div class="checkout_box crdt">
		  
		  <div class="row">
		   <div class="col-xs-12 col-sm-6">
		   <h3>Order review</h3>
		   <label class="label1">Cash on Delivery
			  <input type="radio" id="cod" name="payment_type" value="COD" checked>
			  <span class="checkmark"></span>
			</label>
		 <!--   <label class="label1">Credit Card / Debit Card
			  <input type="radio" name="payment_type" value="CC" >
			  <span class="checkmark"></span>
			</label>
			
			
			
			<label class="label1">Netbanking
			  <input type="radio" name="payment_type" value="Netbanking">
			  <span class="checkmark"></span>
			</label> -->
		   
		   </div>
		   
		   <div class="col-xs-12 col-sm-6">
		   <!-- <h3>Credit Card/ Debit Card</h3> -->
		   
		   <!-- <div class="card_box">
		   <div class="row">
		    <div class="col-xs-12 col-sm-12 check_input ">
		    <label>Card Number</label>
			<input type="text" name="card_number" >
			</div>
			
			<div class="col-xs-12 col-sm-12 check_input ">
		    <label>Card Holder Name</label>
			<input type="text" name="card_holder_name" placeholder="Your Name and Surname" >
			</div>
			
			<div class="col-xs-12 col-sm-6 check_input ">
		    <label>Valid Until</label>
			<input type="text" name="valid_until" placeholder="Month / Year" >
			</div>
			<div class="col-xs-12 col-sm-6 check_input ">
			<label>CVV</label>
			<input type="text" name="cvv"  placeholder="CVV" >
			</div>
			
			
		   </div>
		   
		   </div> -->
		   
		   
		   <!-- <label class="label1">Save Card Data For Future Payments
			  <input type="radio" name="payment">
			  <span class="checkmark"></span>
			</label> -->
			
			
			<button type="submit" class="proceed_btn next">Place Order</button>
			
			
			
		  </div>
		 </div>
		</div>
		
		<div class="checkout_btn">
		  <button class="back previous" type="button">Back</button>
		</div>
		
		</fieldset>
		
		
</form>
		
		
	</div>
</section>



@endsection
@section('javascript')
<script>

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	
	current_fs = $(this).parent().parent();
	next_fs = $(this).parent().parent().next();
	  var  valid = true;
	  current_fs.find("input").each(function(){
			if($(this).prop('required') && $(this).val() == ''){
				$(this).addClass('invalid')
				 valid = false;
			}else{
				$(this).removeClass('invalid');
			}
		});
			
	   if (!valid) {
		return;
	  }
	  
	if(animating) return false;
	
	animating = true;  
	//  return valid; // return the valid status
	//activate next step on progressbar using the index of next_fs
	$(".check_out_ul ul li").eq($("fieldset").index(next_fs)).addClass("green_li");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'relative'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent().parent();
	previous_fs = $(this).parent().parent().prev();
	
	//de-activate current step on progressbar
	$(".check_out_ul ul li").eq($("fieldset").index(current_fs)).removeClass("green_li");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})
</script>



@endsection