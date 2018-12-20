<?php 
use App\Helper;
$image = new Helper();
$moneyFormat = $image->moneyFormat();
?>

@extends('admin.layouts.app')
@section('title', 'All Order')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Order Status</h4>
            <input type="hidden" name="order_id" id="order_id" value="{{$order->id}}"/>
			<div class="container">
			    <div class="row">
			        <div class="col-xs-12 col-md-12">
			    		<div class="invoice-title">
			    			<h5>Order # {{$order->id}}</h5><span class="float-right status-drop">
			    				<select name="status" id="change_status" class="form-control">
			    										<option value="0" <?php echo($order->order_status == '0')? "selected" : "" ?>>Pending</option>
			    										<option value="1" <?php echo($order->order_status == '1')? "selected" : "" ?>>Approved</option>
			    										<option value="2" <?php echo($order->order_status == '2')? "selected" : "" ?>>Dis-Approved</option>
			    				</select>
			    			    </span>
    		            </div>
    		             <hr>
					    		<div class="row">
					    		
					    			<div class="col-md-6">
					    				<address>
					    				<strong>Billed To:</strong><br>
					    					Name : {{$order->sender_full_name}}<br>
					    				   Phone : {{$order->sender_phone_no}}<br>
					    				   State : {{$order->sender_state}}<br>
					    				 Country : {{$order->sender_country}}
					    				</address>
					    			</div>
					    			<div class="col-md-6 text-right">
					    				<address>
					        			<strong>Delivered To:</strong><br>
					    					Name : {{$order->reciever_full_name}}<br>
					    				 Address : {{$order->reciever_address}}<br>
					    				   State : {{$order->reciever_state}}<br>
					    				 Country : {{$order->reciever_country}}<br>
					    					City : {{$order->reciever_city}}<br>
					    					 Zip : {{$order->reciever_zipcode}}<br>
					    				   Phone : {{$order->reciever_phone_no}}
					    				</address>
					    			</div>
    		
    		                     </div>
					    		<div class="row">
					    			<div class="col-md-6 ">
					    				<address>
					    					<strong>Payment Method:</strong><br>
					    					{{$order->payment_type}}<br>
					    				
					    				</address>
					    			</div>
					    			<div class="col-md-6 text-right">
					    				<address>
					    					<strong>Order Date:</strong><br>
					    					{{date('F d, Y',strtotime($order->created_at))}}<br><br>
					    				</address>
					    			</div>
					    		</div>
					    		<div class="row">
					    			<div class="col-md-12 ">
					    				<address>
					    					<strong>Delivery:</strong><br>
					    					<?php 
					                             $del_type = str_replace('_', ' ', $order->delivery_type);
					    					?>
					    					Delivery Date : {{date('F d, Y',strtotime($order->delivery_date))}}<br>
					    					Delivery Type : {{ucwords($del_type)}}<br>
					    					Delivery Time : {{$order->delivery_time}}<br>
					    				
					    				</address>
					    			</div>
					    			
					    		</div>

    	             </div>
                   </div>
    
					    <div class="row">
					    	<div class="col-md-12">
					    		<div class="card">
							     <div class="card-body">

								  <h4 class="card-title">Summery</h4>
					    			
					    		       
					    				<div class="table-responsive">
					    					<table class="table table-approved table-condensed">
					    						<thead>
					                                <tr>
					        							<td><strong>Item</strong></td>
					        							<!-- <td class="text-center"><strong>Status</strong></td> -->
					        							<td class="text-center"><strong>Price</strong></td>
					        							<td class="text-center"><strong>Quantity</strong></td>
					        							<td class="text-center"><strong>Total</strong></td>
					        							
					        							
					                                </tr>
					    						</thead>
					    						<tbody>
					    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
					    							<tr>
					    								<td>{{$order->product_name}}</td>
					    					
					    								<td class="text-center"><?php echo $moneyFormat; ?>{{$order->product_price}}</td>
					    								<td class="text-center">{{$order->product_qty}}</td>
					    								<td class="text-center"><?php echo $moneyFormat; ?>{{$order->product_price}}</td>
					    								
					    								
					    							</tr>
					    								<tr>
					    								<td class="thick-line"></td>
					    								<td class="thick-line"></td>
					    							
					    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
					    								<td class="thick-line text-right"><?php echo $moneyFormat; ?>{{$order->product_price}}</td>
					    							</tr>
					    								<tr>
					    								<td class="no-line"></td>
					    								<td class="no-line">
					    									
					    								</td>
					    							
					    								<td class="no-line text-center"><strong>Gst</strong></td>
					    								<td class="no-line text-right"><?php echo $moneyFormat; ?>{{$order->tax_cost}}</td>
					    							</tr>
					    							<tr>
					    								<td class="no-line"></td>
					    								<td class="no-line"></td>
					    								
					    								<td class="no-line text-center"><strong>Shipping</strong></td>
					    								<td class="no-line text-right"><?php echo $moneyFormat; ?>{{$order->shipping_cost}}</td>
					    							</tr>
					    							<tr>
					    								<td class="no-line"></td>
					    								<td class="no-line"></td>
					    								
					    								<td class="no-line text-center"><strong>Total</strong></td>
					    								<td class="no-line text-right"><?php echo $moneyFormat; ?>{{$order->total_cost}}</td>
					    							</tr>
					    							<tr>
					    								<td class="thick-line"></td>
					    								<td class="thick-line"></td>
					    								<td class="thick-line"></td>
					    								<td class="thick-line"></td>
					    								
					    							</tr>
					                             
					    						</tbody>
					    					</table>
					    				</div>
					    			</div>
					    		</div>
					    	</div>
					    </div>
                   </div>
              </div>
         </div>


@endsection