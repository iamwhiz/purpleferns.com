<?php
namespace App\Http\Controllers\Auth\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;
use Carbon;
use Mail;
use Auth;
use App\Admin;

class OrderController extends Controller
{

	public function index()
	{ 
		$title = "All Orders";
		return view('admin.orders.list-order')->with('title',$title);
	}

	public function filterOrder(Request $request)
	{
		$columns = array(

		
			
			0 => 'order_id',
		    1 => 'order_status',
			2 => 'total_cost',
			3 => 'created_at',
			4 => 'id',
			
		
		    
		
		);
		 
		 $totalData = Order::count();

		$totalFiltered = $totalData; 
		$post_mystatus = strtolower($request->post_mystatus);
		$limit = $request->input('length');
		$start = $request->input('start');
		
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		
		if(empty($request->input('search')))
		{
			$orders = Order::Join('order_products','orders.id','=','order_products.order_id')
                                ->select(array('order_products.order_id','orders.order_status','orders.total_cost','orders.created_at','orders.id'))
			                    
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = Order::Join('orders.id','=','order_products.order_id')
                                ->select(array('orders.user_id','order_products.order_id','orders.order_status','orders.total_cost','orders.created_at','orders.id'))
								->offset($start)
								->limit($limit)
								 ->orderBy($order,$dir)
								->count();	
		                   
		}
		else
		{ 
			$search = $request->input('search.value');
			$orders = Order::Join('order_products','orders.id','=','order_products.order_id')
                               ->select(array('order_products.order_id','orders.order_status','orders.total_cost','orders.created_at','orders.id'))
								->where('orders.order_status', 'like', "%{$search}%")
							
								
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = Order::Join('order_products','orders.id','=','order_products.order_id')
                                ->select(array('order_products.order_id','orders.order_status','orders.total_cost','orders.created_at','orders.id'))
								->where('orders.order_status', 'like', "%{$search}%")
								
								
								->offset($start)
								->limit($limit)
								// ->orderBy($order,$dir)
								->count();
			
					        
		}
							
		$orders = $orders->toArray();
							
		$json_data = array(
				"draw"				=> intval($request->input('draw')),
				"recordsTotal"		=> intval($totalData),
				"recordsFiltered" 	=> intval($totalFiltered),
				"data"				=> $orders
			);
			
		echo json_encode($json_data);
		
		
    }

    public function viewOrder($id)
    { 

         $order = Order::Join('order_products','orders.id','=','order_products.order_id')
                         ->select('orders.id','orders.user_id','orders.total_cost','orders.shipping_cost','orders.tax_cost','orders.order_status','orders.reciever_full_name','orders.reciever_address','orders.reciever_state','orders.reciever_country','orders.reciever_city','orders.reciever_zipcode','orders.reciever_phone_no','orders.payment_type','orders.transaction_id','orders.created_at','orders.sender_full_name','orders.sender_phone_no','orders.sender_state','orders.sender_country','orders.reciever_city','order_products.product_name','order_products.product_price','order_products.product_qty','orders.delivery_date', 'orders.delivery_type','orders.delivery_time')
                         ->where('orders.id',$id)
                         ->first();
       
        return view('admin.orders.view-order')->with('order',$order);
    }
     public function approveOrder(Request $request)
    { 

       
       $status = $request->all();

       Order::where('id',$status['order_id'])->update(['order_status' => $status['status']]);
       
         $data = array('password'=> $random);
      Mail::send('email.mail', $data, function($message) {
         $message->to('ikwindersingh8@gmail.com', 'Ikwinder Singh')->subject
            ('Your Password');
       
      });
      return "HTML Email Sent. Check your inbox.";
    }
}


?>