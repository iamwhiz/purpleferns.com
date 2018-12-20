<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Order;
use App\Order_product;
use Cart;
use Mail;


class OrderController extends Controller
{

	public function order(Request $request)
	{
       if(Auth::check())
       {
            
          
                      


				$order_detail = [

							'user_id' => Auth::user()->id,
							'payment_type' => $request->input('payment_type'),
							'total_cost' => $request->input('total_cost'),
							'shipping_cost' => $request->input('shipping_cost'),
							'tax_cost' => $request->input('tax'),
						
							
						
							'sender_full_name' => $request->input('sender_full_name'),
							
							'sender_phone_no' => $request->input('sender_phone_no'),
							'sender_state' => $request->input('sender_state'),
							'sender_country' => $request->input('sender_country'),
							'reciever_full_name' => $request->input('reciever_full_name'),
							'reciever_address' => $request->input('reciever_address'),
							
							'reciever_state' => $request->input('reciever_state'),
							'reciever_country' => $request->input('reciever_country'),
							'reciever_city' => $request->input('reciever_city'),
							'reciever_zipcode' => $request->input('reciever_zipcode'),
							'reciever_phone_no' => $request->input('reciever_phone_no'),
							'delivery_date' => $request->input('delivery_date'),
							'delivery_type' => $request->input('delivery_type'),
							// 'delivery_name' => $request->input('delivery_name'),
							'delivery_time' => $request->input('delivery_time'),
							'message_card' => $request->input('message_card'),
							'special_instruction' => $request->input('special_instruction'),
							
							'transaction_id' => $request->input('transaction_id'),
							
							
				         ];


				        

				         $insert_id =Order::insertGetId($order_detail);

				         $order = [

						
							'order_id' => $insert_id,
							'product_id' => $request->input('product_id'),
							'product_name' => $request->input('product_name'),
						
						
							
						
							'product_price' => $request->input('product_price'),
							
							'product_qty' => $request->input('product_qty'),
							
							
							
				         ];

                         Order_product::insert($order);

                         $rowid = $request->input('rowId');

                         Cart::remove($rowid);
                          $data = [
                          	        'order_id' => $insert_id,
                         			'product_name' => $request->input('product_name'),
                         			'product_price' => $request->input('product_price'),
                         			'product_qty' => $request->input('product_qty'),
                         		    'tax_cost' => $request->input('tax'),
                         		    'shipping_cost' => $request->input('shipping_cost'),
                         		    'total_cost' => $request->input('total_cost'),
                         		    'payment_type' => $request->input('payment_type'),
                         		    'reciever_full_name' => $request->input('reciever_full_name'),
									'reciever_address' => $request->input('reciever_address'),
									
									'reciever_state' => $request->input('reciever_state'),
									'reciever_country' => $request->input('reciever_country'),
									'reciever_city' => $request->input('reciever_city'),
									'reciever_zipcode' => $request->input('reciever_zipcode'),
									'reciever_phone_no' => $request->input('reciever_phone_no'),
									'first_name' => Auth::user()->first_name,
									'mobile' => Auth::user()->mobile,
									'email' => Auth::user()->email,
                                 ];
                        Mail::send('email.mail', ["data1"=>$data], function($message) {
                     $message->to('ikwindersingh8@gmail.com', 'Ikwinder Singh')->subject
                      ('Order Invoice');
       
                   });
      

                         return view('product.thankyou')->with('order_id',$insert_id);



				

	 }
	}
	public function MyOrder()
	{
		$meta = 'My Order';
		$MyOrder = Order::where('user_id',Auth::user()->id)->with(['order_products'])->get();
		return view('order')->with('myorder',$MyOrder)->with('meta',$meta);
	}
	public function ViewOrder($id)
	{ 
		$userdata = Auth::user();
		$meta = 'View Order';
		$viewOrder = Order::where('id',$id)->with(['order_products'])->first();
		return view('view_order')->with('vieworder',$viewOrder)->with('meta',$meta)->with('userdata',$userdata);
	}
	public function thankyou()
	{
		return view('product.thankyou');
	}

}



?>