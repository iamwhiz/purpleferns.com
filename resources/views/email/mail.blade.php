<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  border: 0;
  list-style-type: none;
}
body {
  margin:0px;
}
html, body {
  width: 100%;
}
</style>
<section style="float:left; box-sizing: border-box; width:100%; padding:30px 0px;">
   <div style="margin:0px auto;  width:800px;">
   <div style="float:left; width:100%; background-color:#f7f6f6; font-family:roboto;">
     <div style="float:left; width:100%; padding:30px 0px; background-color:#2a2c2b; text-align:center;">
	  <img style="width:200px;" src="http://purpleferns.com/public/assets/images/footer_logo.png">
     </div>
	 
	 <div style="float:left; width:100%;">
		<div style="width:34%; padding:20px; height:165px; float:left; background-color:#039b49;">
	     <p style="color:#fff; font-size:14px; margin-top:0px; margin-bottom:5px;">{{$data1['first_name']}}</p>
	     <p style="color:#fff; font-size:14px; margin-top:0px; margin-bottom:5px;">{{$data1['email']}}</p>
	     <p style="color:#fff; font-size:14px; margin-top:0px; margin-bottom:5px;">{{$data1['mobile']}}</p>		 
		 <div style="float:left; width:100%; margin-top:20px; color:#fff; font-size:24px;">Order Id #: {{$data1['order_id']}}</div>
		</div>
	   
	    <div style="width:56%; padding:20px; height:165px; float:left; background-color:#03b253;">
		   <h4 style="color:#fff; font-weight:400; font-size:40px; margin-top:0px; margin-bottom:5px;">Thank you for the Order</h4>
		   <p style="color:#fff; font-size:14px; margin-top:0px; margin-bottom:5px;">Your order has been received and is now being processed. 
			Your Order details are shown Below for Your Reference:</p>
		</div>
	 </div>
	 
	 
	 <div style="float:left;width: 95%;padding: 20px;">
	    <table style="float:left; width:100%; text-align:left;box-shadow:0px 0px 27px rgba(0,0,0,0.07); margin-bottom:15px;">
		 <thead>
		   <tr>
		    <th style="font-size: 16px; color: #03b253; padding: 15px; background: #f5f5f5;">Product</th>
		    <th style="font-size: 16px; color: #03b253; padding: 15px; background: #f5f5f5;">Quantity</th>
		    <th style="font-size: 16px; color: #03b253; padding: 15px; background: #f5f5f5;">Price</th>
		    <th style="font-size: 16px; color: #03b253; padding: 15px; background: #f5f5f5;">Variant</th>
		   </tr>
		 </thead>
		 
		 <tbody>
		   <tr>
		    <td style="font-size: 16px; color: #000; padding: 15px; background: #fff;">{{$data1['product_name']}}</td>
		    <td style="font-size: 16px; color: #000; padding: 15px; background: #fff;">{{$data1['product_qty']}}</td>
		    <td style="font-size: 16px; color: #000; padding: 15px; background: #fff;">{{$data1['product_price']}}</td>
		    <td style="font-size: 16px; color: #000; padding: 15px; background: #fff;">{{$data1['product_weight']}}</td>
		   </tr>
		   
		  <!--  <tr>
		    <td style="font-size: 16px; color: #000; padding: 15px; background: #fff;">Red Rose</td>
		    <td style="font-size: 16px; color: #000; padding: 15px; background: #fff;">1</td>
		    <td style="font-size: 16px; color: #000; padding: 15px; background: #fff;">$15</td>
		   </tr> -->
		 </tbody>
	    </table>
		
		
		<table style="float:left; width:100%; text-align:left;box-shadow:0px 0px 27px rgba(0,0,0,0.07); background:#fff; margin-bottom:15px;">
		  <tbody>
		   <tr>
		    <td style="font-size: 16px; color: #03b253; font-weight:500; padding:8px 15px; background: #fff;">Cart Sub Total :</td>
		    <td style="font-size: 16px; color: #000; padding:8px 15px; background: #fff; width:26%;">{{$data1['product_price']}}</td>
		   </tr>
		   
		   <tr>
		    <td style="font-size: 16px; color: #03b253; font-weight:500; padding: 8px 15px; background: #fff;">Tax (6.85%) :</td>
		    <td style="font-size: 16px; color: #000; padding: 8px 15px; background: #fff; width:26%;">{{$data1['tax_cost']}}</td>
		   </tr>
		   
		   <tr>
		    <td style="font-size: 16px; color: #03b253; font-weight:500; padding: 8px 15px; background: #fff;">Shipping :</td>
		    <td style="font-size: 16px; color: #000; padding: 8px 15px; background: #fff; width:26%;">{{$data1['shipping_cost']}}</td>
		   </tr>
		   
		   
		   <tr>
		    <td style="font-size: 16px; color: #03b253; font-weight:500; padding: 8px 15px; background: #fff;">Order Total :</td>
		    <td style="font-size: 16px; color: #000; padding: 8px 15px; background: #fff; width:26%;">{{$data1['total_cost']}}</td>
		   </tr>
		   
		   
		 </tbody>
		</table>
		
		
	<div style="float:left; width:100%; margin-top:20px;">
	   <div style="float:left; width:48%; padding-right:2%;">
	      <h4 style="float:left; width:100%; font-weight:400; color:#00a639; font-size:20px; margin-bottom:10px;">Payment Method</h4>
		  <div style="float:left; width:85%; border-radius:5px;  height:150px; background:#fff; padding:30px; box-shadow:1px 0px 13px rgba(0,0,0,0.09); ">
		     <p style="color:#424242; font-size:15px; margin-bottom:10px; ">
				<strong style="color:#03b253; font-weight:500;">Created:</strong> 2018-10-16 09:56:06 <br>
				<strong style="color:#03b253; font-weight:500;">Payment method:</strong> {{$data1['payment_type']}}</p>
				
			 <p style="color:#424242; font-size:15px; "><strong style="color:#03b253; font-weight:500;">Card No.:</strong> ############1111<br>
				<strong style="color:#03b253; font-weight:500;">Transaction id:</strong> ET195591</p>
			 
		  </div>
	   </div>
	   
	   <div style="float:left; width:48%; padding-left:2%;">
	      <h4 style="float:left; width:100%; font-weight:400; color:#00a639; font-size:20px; margin-bottom:10px;">Shipping Address</h4>
		  <div style="float:left; border-radius:5px; height:150px; width:83%; background:#fff; padding:30px; box-shadow:1px 0px 13px rgba(0,0,0,0.09); ">
		     <p style="color:#424242; font-size:15px; margin-bottom:10px; ">{{$data1['reciever_address']}}, {{$data1['reciever_country']}},<br>
				City - {{$data1['reciever_city']}}</p> 
		  </div>
	   </div>
	   
	   
	   
	</div> 
		
	 </div>
	 
	 
	
	<div style="float:left; width:100%; padding:40px 0px; margin-top:15px; background-color:#2a2c2b; text-align:center;">
	  <ul style="float:left; width:100%; padding:0px; margin:0px; list-style-type:none">
	    <li style="display:inline-block; margin-right:10px;"><a href="#"><img src="http://purpleferns.com/public/assets/images/fb_login.png">	</a></li>
	    <li style="display:inline-block;"><a href="#"><img src="http://purpleferns.com/public/assets/images/twitter_login.png"></a></li>
	  </ul>
	  <p style="font-size:14px; float:left; width:100%; margin-top:10px; color:#fff;">© 2018 All rights reserved. <a href="#" style="color:#03b253; text-decoration:none;">purpleferns.com</a></p>
	</div>
	 
	 
	 
   </div>
   </div>
 
</section>