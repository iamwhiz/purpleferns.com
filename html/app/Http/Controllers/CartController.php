<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use Cart;

class CartController extends Controller
{
   public function cart(){
   
    $cart = Cart::content();
    
   	return view('product.cart')->with('cart_item',$cart);
   }


    public function addToCart(Request $request){

      $p_id = $request->input('id');
      $name = $request->input('name');
      $qty = $request->input('qty');
      $price = $request->input('price');
      $user_id = isset(Auth::user()->id) ? Auth::user()->id : '';
      // $data = [
                
      //           'product_id' => $request->input('id'),
      //           'qty' => $request->input('qty'),
      //         ];

    $cart = Cart::add(['id' => $p_id, 'name' =>$name, 'qty' => $qty, 'price' => $price, 'options' => ['user_id' => $user_id]]);
  

   	return back();
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
  return redirect()->route('login');
   }
   
   public function updatecart(Request $request){

    
    $rowid = $request->input('rowId');
    $qty = $request->input('qty');
	
	Cart::update($rowid, $qty);
   
   	return back();
   }
}
