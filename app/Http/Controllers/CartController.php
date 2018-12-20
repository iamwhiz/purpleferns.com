<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use Cart;

class CartController extends Controller
{
   public function cart(){
    
    $meta = 'Cart';
    $cart = Cart::content();
    
   	return view('product.cart')->with('cart_item',$cart)->with('meta',$meta);
   }


    public function addToCart(Request $request){
  /*    if((Cart::count()) > 0){
        return back();
      }
      else
      {*/
      // dd($request->all());
      $p_id = $request->input('id');
      $name = $request->input('name');
      $qty = $request->input('qty');
      $price = $request->input('price');
      $user_id = isset(Auth::user()->id) ? Auth::user()->id : '';
      $weight = $request->input('product_weight');
     

    $cart = Cart::add(['id' => $p_id, 'name' =>$name, 'qty' => $qty, 'price' => $price, 'options' => ['user_id' => $user_id , 'product_weight' => $weight]]);
  
      $notification = array(
            'message' => 'Item Added To Cart !', 
            'alert-type' => 'success'
        );
   	return redirect('/cart')->with($notification);
  /* }*/
   }

    public function removeItem($id){

    Cart::remove($id);
    
   
   	return back();
   }
   
   

   public function proceedcheckout(Request $request){

    
    if(Auth::check()){

      $rowId = $request->input('rowId');
   $check = Cart::content($rowId);
    
    return view('product.checkout')->with('checkout',$check);
  }
  $url = "cart";
  return redirect('/login?redirect_url='.$url);
   }
   
   public function updatecart(Request $request){

    if((Cart::count())>0){
      return back();
    }
    else{

   
    $rowid = $request->input('rowId');
    $qty = $request->input('qty');
	
	Cart::update($rowid, $qty);
   
   	return back();
   }
   }
}
