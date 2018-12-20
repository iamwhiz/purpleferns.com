<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_category;
use App\Category;
use App\Product_categories_relation;
use App\Occasion_product;
use App\Occasion;
use Wishlist;
use Auth;

class ProductController extends Controller
{
   

    public function flowercat($slug)
    {
        $meta = 'Flowers';
       
         
        $catid = Product_category::where('cat_slug',$slug)->pluck('id')->first();
        $catname = Product_category::where('cat_slug',$slug)->pluck('cat_name')->first();
        $catparent = Product_category::where('cat_slug',$slug)->pluck('cat_parent')->first();
        $all_cat = Product_category::where('cat_parent',$catparent)->get();


        $product_id = Product_categories_relation::where('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->paginate(6);
        return view('product.flower')->with('products',$products)->with('catname',$catname)->with('side_cat',$all_cat)->with('meta',$meta);

    }

      public function plantcat($slug)
    {
        $meta = 'Plants';
       
         
        $catid = Product_category::where('cat_slug',$slug)->pluck('id')->first();
        $catname = Product_category::where('cat_slug',$slug)->pluck('cat_name')->first();
        $catparent = Product_category::where('cat_slug',$slug)->pluck('cat_parent')->first();
        $all_cat = Product_category::where('cat_parent',$catparent)->get();


        $product_id = Product_categories_relation::where('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->paginate(6);
        return view('product.plant')->with('products',$products)->with('catname',$catname)->with('side_cat',$all_cat)->with('meta',$meta);

    }
      public function cakecat($slug)
    {
        $meta = 'Cakes';
       
         
        $catid = Product_category::where('cat_slug',$slug)->pluck('id')->first();
        $catname = Product_category::where('cat_slug',$slug)->pluck('cat_name')->first();
        $catparent = Product_category::where('cat_slug',$slug)->pluck('cat_parent')->first();
        $all_cat = Product_category::where('cat_parent',$catparent)->get();


        $product_id = Product_categories_relation::where('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->paginate(6);
        return view('product.cake')->with('products',$products)->with('catname',$catname)->with('side_cat',$all_cat)->with('meta',$meta);

    }

      public function gifts($slug)
    {
        $meta = 'Gifts';
       
         
        $catid = Product_category::where('cat_slug',$slug)->pluck('id')->first();
        $catname = Product_category::where('cat_slug',$slug)->pluck('cat_name')->first();
        $catparent = Product_category::where('cat_slug',$slug)->pluck('cat_parent')->first();
        $all_cat = Product_category::where('cat_parent',$catparent)->get();


        $product_id = Product_categories_relation::where('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->paginate(6);
        return view('product.gift')->with('products',$products)->with('catname',$catname)->with('side_cat',$all_cat)->with('meta',$meta);

    }

     public function allGifts()
    {
        $meta = 'Gifts';
       
         
       

      
        $catid = Product_category::where('cat_parent','gifts')->pluck('id')->all();
        $all_cat = Product_category::where('cat_parent','gifts')->get();
        $product_id = Product_categories_relation::whereIn('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->paginate(6);
        return view('product.allgifts')->with('products',$products)->with('side_cat',$all_cat)->with('meta',$meta);

    }
     public function allproduct()
    {
        $meta = 'Products';
       
         
        // $catid = Product_category::where('cat_slug',$slug)->pluck('id')->first();
        // $catname = Product_category::where('cat_slug',$slug)->pluck('cat_name')->first();
        // $catparent = Product_category::where('cat_slug',$slug)->pluck('cat_parent')->first();
        $categories = Category::get();


       
        $products = Product::paginate(6);
        return view('product.allproduct')->with('products',$products)->with('side_cat',$categories)->with('meta',$meta);

    }
    public function allFlower()
    {

    	$meta = 'Flowers';

      
        $catid = Product_category::where('cat_parent','flowers')->pluck('id')->all();
        $all_cat = Product_category::where('cat_parent','flowers')->get();
        $product_id = Product_categories_relation::whereIn('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->paginate(6);
        return view('product.allflower')->with('products',$products)->with('side_cat',$all_cat)->with('meta',$meta);

    }
  
    public function allPlant()
    {

        $meta = 'Plants';

       
        $catid = Product_category::where('cat_parent','plants')->pluck('id')->all();
         $all_cat = Product_category::where('cat_parent','plants')->get();
        $product_id = Product_categories_relation::whereIn('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->paginate(6);
        return view('product.allplant')->with('products',$products)->with('side_cat',$all_cat)->with('meta',$meta);

    }

   
    public function allCake()
    {

        $meta = 'Cakes';

       
        $catid = Product_category::where('cat_parent','cakes')->pluck('id')->all();
      $all_cat = Product_category::where('cat_parent','cakes')->get();
        $product_id = Product_categories_relation::whereIn('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->paginate(6);
        return view('product.allcake')->with('products',$products)->with('side_cat',$all_cat)->with('meta',$meta);

    }


    public function ocProduct($slug)
    {

        $meta = 'Occasion';

       
        $ocid = Occasion::where('oc_slug',$slug)->pluck('id')->first();
        $ocname = Occasion::where('oc_slug',$slug)->pluck('oc_name')->first();

      $oc_pid = Occasion_product::where('id',$ocid)->pluck('product_id')->all();
      $all_oc = Occasion::get();
        $products = Product::whereIn('id',$oc_pid)->paginate(6);
        
        return view('product.ocproducts')->with('products',$products)->with('ocname',$ocname)->with('side_cat',$all_oc)->with('meta',$meta);

    }

    public function allOccasions()
    {

        $meta = 'Occasion';

         $oc_pid = Occasion_product::pluck('product_id')->all();
        $all_oc = Occasion::get();
        $products = Product::whereIn('id',$oc_pid)->paginate(6);
        return view('product.alloccasion')->with('products',$products)->with('side_cat',$all_oc)->with('meta',$meta);

    }
    public function search(Request $request)
    {

        $q = $request->input('search');
        $search = Product::where('name','LIKE','%'.$q.'%')->orWhere('keywords','LIKE','%'.$q.'%')->paginate(6);
        if(count($search) > 0){
        return view('search')->with('products',$search)->with('message', '');
    }
    else{
     return view ('search')->with('message', 'No Details found. Try to search again !')->with('products',$search);
 }
    }

      public function productDetail($slug){
       $meta = "Product Detail";
        $detail = Product::where('slug',$slug)->first();

        return view('product.productdetail')->with('detail',$detail)->with('meta',$meta);
    }

    public function wishlist($id){

      Wishlist::add($id,Auth::user()->id);
      return back();

    }

     public function view_wishlist(){
     $meta = 'Wishlist';
    $wishlist = Wishlist::getUserWishlist(Auth::user()->id)->load('product');
    return view('product.wishlist')->with('wishlist',$wishlist)->with('meta',$meta);

    }


     public function removeWishlist($id){
     
    $wishlist = Wishlist::removeByProduct($id, Auth::user()->id);
    return back();

    }
    public function sortBy(Request $request){
     
     
    $get_data = $request->input('sort');

    $type = $request->input('type');
     $catids = Product_category::where('cat_parent',$type)->pluck('id')->all();
  
   $product_id = Product_categories_relation::whereIn('cat_id',$catids)->pluck('product_id')->all();
 
      
    if($get_data == 'A-Z') {        
   $data = Product::whereIn('id',$product_id)->orderBy('name','asc')->get(); 
     


                    return $aa;

   }
    elseif($get_data == 'Z-A'){
    $data = Product::whereIn('id',$product_id)->orderBy('name','desc')->get();
     return $data;
}




    }
    public function test(){

return view('errors.204');
    }



    

}
