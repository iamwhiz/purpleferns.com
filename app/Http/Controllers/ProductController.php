<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_category;
use App\Category;
use App\Product_categories_relation;
use App\Occasion_product;
use App\Occasion;
use App\Product_image;
use App\Product_variants_combination;
use App\Product_variant;
use Wishlist;
use Auth;
use DB;
use App\Helper;


class ProductController extends Controller
{
   

    public function flowercat($slug)
    {
       
        $flowers_id = Category::where('name','flowers')->pluck('id')->first();
        $header = Product_category::where('cat_slug',$slug)->first();
        $catid = Product_category::where('cat_slug',$slug)->pluck('id')->first();
        $category = Product_category::where('id',$catid)->first();
        $catname = Product_category::where('cat_slug',$slug)->pluck('cat_name')->first();
        $catparent = Product_category::where('cat_slug',$slug)->pluck('cat_parent')->first();
       $category_parent = Category::where('name','flowers')->first();
        $all_cat = Product_category::where('cat_parent',$flowers_id)->get()->groupBy('cat_type')->toArray();
      
        $product_id = Product_categories_relation::where('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->where('product_status',1)->orderBy('id','desc')->paginate(24);
        $products_img = Product_image::whereIn('product_id',$product_id)->where('main_image',1)->get();
      
        return view('product.flower')->with('products',$products)
                                     ->with('catname',$catname)
                                     ->with('side_cat',$all_cat)
                                     ->with('meta',$catname)
                                     ->with('category',$category)
                                      ->with('category_parent',$category_parent)
                                     ->with('header',$header)
                                     ->with('banner_id',$flowers_id);

      }
    

    public function plantcat($slug)
    {
        // $meta = 'Plants';
       
        $header = Product_category::where('cat_slug',$slug)->first();
        $plants_id = Category::where('name','plants')->pluck('id')->first();
        $catid = Product_category::where('cat_slug',$slug)->pluck('id')->first();
        $catname = Product_category::where('cat_slug',$slug)->pluck('cat_name')->first();
        $catparent = Product_category::where('cat_slug',$slug)->pluck('cat_parent')->first();
        $category = Product_category::where('id',$catid)->first();
         $category_parent = Category::where('name','plants')->first();
          $all_cat = Product_category::where('cat_parent',$plants_id)->get()->groupBy('cat_type')->toArray();
        $product_id = Product_categories_relation::where('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->where('product_status',1)->orderBy('id','desc')->paginate(24);
      
        return view('product.plant')->with('products',$products)
                                    ->with('catname',$catname)
                                    ->with('side_cat',$all_cat)
                                    ->with('meta',$catname)
                                    ->with('category',$category)
                                     ->with('category_parent',$category_parent)
                                    ->with('header',$header)
                                    ->with('banner_id',$plants_id);

    }


    public function cakecat($slug)
    {
        // $meta = 'Cakes';
       
        $header = Product_category::where('cat_slug',$slug)->first();
        $cakes_id = Category::where('name','cakes')->pluck('id')->first();
        $category_parent = Category::where('name','cakes')->first();
        $catid = Product_category::where('cat_slug',$slug)->pluck('id')->first();
        $catname = Product_category::where('cat_slug',$slug)->pluck('cat_name')->first();
        $catparent = Product_category::where('cat_slug',$slug)->pluck('cat_parent')->first();
        $category = Product_category::where('id',$catid)->first();

          $all_cat = Product_category::where('cat_parent',$cakes_id)->get()->groupBy('cat_type')->toArray();
        $product_id = Product_categories_relation::where('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->where('product_status',1)->orderBy('id','desc')->paginate(24);
       
        return view('product.cake')->with('products',$products)
                                   ->with('catname',$catname)
                                   ->with('side_cat',$all_cat)
                                   ->with('meta',$catname)
                                   ->with('category',$category)
                                   ->with('category_parent',$category_parent)
                                   ->with('header',$header)
                                   ->with('banner_id',$cakes_id);

    }

      

    public function gifts($slug)
    {
        // $meta = 'Gifts';
       
        $header = Product_category::where('cat_slug',$slug)->first();
        $gifts_id = Category::where('name','gifts')->pluck('id')->first();
        $catid = Product_category::where('cat_slug',$slug)->pluck('id')->first();
        $catname = Product_category::where('cat_slug',$slug)->pluck('cat_name')->first();
        $catparent = Product_category::where('cat_slug',$slug)->pluck('cat_parent')->first();
         $category = Product_category::where('id',$catid)->first();
        $category_parent = Category::where('name','gifts')->first();
          $all_cat = Product_category::where('cat_parent',$gifts_id)->get()->groupBy('cat_type')->toArray();
        $product_id = Product_categories_relation::where('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->where('product_status',1)->orderBy('id','desc')->paginate(24);
        
        return view('product.gift')->with('products',$products)
                                   ->with('catname',$catname)
                                   ->with('side_cat',$all_cat)
                                   ->with('meta',$catname)
                                   ->with('category',$category)
                                    ->with('category_parent',$category_parent)
                                   ->with('header',$header)
                                   ->with('banner_id',$gifts_id);

    }

     

    public function allGifts()
    {
        $meta = 'Gifts';
       
         
        $header = Category::where('name','gifts')->first();
        $gifts_id = Category::where('name','gifts')->pluck('id')->first();
      
        $categories = Product_category::where('cat_parent',$gifts_id)->get();
        // $all_cat = Product_category::where('cat_parent','gifts')->get();
        //  $all_cat =DB::table('categories')->where('cat_parent',$gifts_id)
        //     ->leftJoin('product_categories', 'categories.id', '=', 'product_categories.cat_parent')
        //     ->get();
        // $product_id = Product_categories_relation::whereIn('cat_id',$catid)->pluck('product_id')->all();
        // $products = Product::whereIn('id',$product_id)->paginate(8);
        return view('product.allgifts')->with('categories',$categories)
                                       ->with('meta',$meta)
                                       ->with('header',$header);


    }
     public function allproduct()
    {
        $meta = 'Products';
       
         
       
        $categories = Category::get();


       
        $products = Product::paginate(8);
        return view('product.allproduct')->with('products',$products)->with('side_cat',$categories)->with('meta',$meta);

    }
    public function allFlower()
    {

    	  $meta = 'Flowers';
        $header = Category::where('name','flowers')->first();
        $flowers_id = Category::where('name','flowers')->pluck('id')->first();
        $categories = Product_category::where('cat_parent',$flowers_id)->where('cat_type','types')->get();
        // $all_cat = Product_category::where('cat_parent','flowers')->get();
        //  $all_cat =DB::table('categories')->where('cat_parent',$flowers_id)
        //     ->leftJoin('product_categories', 'categories.id', '=', 'product_categories.cat_parent')
        //     ->get();
        // $product_id = Product_categories_relation::whereIn('cat_id',$catid)->pluck('product_id')->all();
        // $categories = Product::whereIn('id',$product_id)->paginate(8);
        return view('product.allflower')->with('categories',$categories)->with('meta',$meta)->with('header',$header);

    }
  
    public function allPlant()
    {

        $meta = 'Plants';
        $header = Category::where('name','plants')->first();
        $plants_id = Category::where('name','plants')->pluck('id')->first();
       $categories = Product_category::where('cat_parent',$plants_id)->where('cat_type','types')->get();
         // $all_cat = Product_category::where('cat_parent',$plants_id)->get();
        //   $all_cat =DB::table('categories')->where('cat_parent',$plants_id)
        //     ->leftJoin('product_categories', 'categories.id', '=', 'product_categories.cat_parent')
        //     ->get();
        // $product_id = Product_categories_relation::whereIn('cat_id',$catid)->pluck('product_id')->all();
        // $products = Product::whereIn('id',$product_id)->paginate(8);
        return view('product.allplant')->with('categories',$categories)->with('meta',$meta)->with('header',$header);

    }

   
    public function allCake()
    {

        $meta = 'Cakes';
        $header = Category::where('name','cakes')->first();
        $cakes_id = Category::where('name','cakes')->pluck('id')->first();
        $categories = Product_category::where('cat_parent',$cakes_id)->where('cat_type','types')->get();
      // $all_cat = Product_category::where('cat_parent','cakes')->get();
       // $all_cat =DB::table('categories')->where('cat_parent',$cakes_id)
       //      ->leftJoin('product_categories', 'categories.id', '=', 'product_categories.cat_parent')
       //      ->get();
       //  $product_id = Product_categories_relation::whereIn('cat_id',$catid)->pluck('product_id')->all();
       //  $products = Product::whereIn('id',$product_id)->paginate(8);
        return view('product.allcake')->with('categories',$categories)
                                      ->with('meta',$meta)
                                      ->with('header',$header);

    }
     public function wishGift()
    {
        $meta = 'Gifts';
       
        $type = request()->segment(2);
         
        $header = Category::where('name',$type)->first();
        $plants_id = Category::where('name',$type)->pluck('id')->first();
      
        $catid = Product_category::where('cat_parent', $plants_id)->pluck('id')->all();
        // $all_cat = Product_category::where('cat_parent','plants')->get();
         $all_cat =DB::table('categories')->where('cat_parent',$plants_id)
            ->leftJoin('product_categories', 'categories.id', '=', 'product_categories.cat_parent')
            ->get();
        $product_id = Product_categories_relation::whereIn('cat_id',$catid)->pluck('product_id')->all();
        $products = Product::whereIn('id',$product_id)->paginate(24);
        return view('product.homegifts')->with('products',$products)
                                        ->with('side_cat',$all_cat)
                                        ->with('meta',$meta)
                                        ->with('header',$header)
                                        ->with('banner_id',$plants_id);

    }



    public function ocProduct($slug)
    {

        $meta = 'Occasion';

       
        $ocid = Occasion::where('oc_slug',$slug)->pluck('id')->first();
        $ocname = Occasion::where('oc_slug',$slug)->pluck('oc_name')->first();

      $oc_pid = Occasion_product::where('id',$ocid)->pluck('product_id')->all();
      $all_oc = Occasion::get();
        $products = Product::whereIn('id',$oc_pid)->paginate(24);
        
        return view('product.ocproducts')->with('products',$products)
                                         ->with('ocname',$ocname)
                                         ->with('side_cat',$all_oc)
                                         ->with('meta',$meta);

    }

    public function allOccasions()
    {

        $meta = 'Occasion';

         $oc_pid = Occasion_product::pluck('product_id')->all();
        $all_oc = Occasion::get();
        $products = Product::whereIn('id',$oc_pid)->paginate(24);
        return view('product.alloccasion')->with('products',$products)
                                          ->with('side_cat',$all_oc)
                                          ->with('meta',$meta);

    }
    public function search()
    {
       $meta = "Search";

        $s = $_GET['search'];
        $search = Product::where('name','LIKE','%'.$s.'%')->orWhere('keywords','LIKE','%'.$s.'%')->paginate(25);
        $search->appends(['search' => $s]);
        if(count($search) > 0){
        return view('search')->with('products',$search)->with('meta',$meta)->with('keyword',$s)->with('message', '');
    }
    else{
     return view ('search')->with('message', 'No Details found. Try to search again !')->with('products',$search)->with('meta',$meta);
 }
    }

      public function productDetail($slug){
       // $meta = "Product Detail";
        $product_id = Product::where('slug',$slug)->pluck('id')->first();

        $cat_id =  Product_categories_relation::where('product_id',$product_id)->pluck('cat_id')->first();
       
        $cat_parent = Product_category::where('id',$cat_id)->pluck('cat_parent')->first();
        $parent = Category::where('id',$cat_parent)->pluck('name')->first();
        $category =   Product_category::where('cat_parent',$cat_parent)->inRandomOrder()->get()->take(6);
       
       

      
        $variant_type  = Product_variant::where('product_id',$product_id)->get();
      
        $combination = Product_variants_combination::where('product_id',$product_id)->get();
        // dd($combination);
        $detail = Product::where('slug',$slug)->first();
        $meta = ucwords($detail->name);
        return view('product.productdetail')->with('detail',$detail)
                                            ->with('parent',$parent)
                                            ->with('category',$category)
                                            ->with('colorWeight',$variant_type)
                                            ->with('combinations',$combination)
                                            ->with('meta',$meta)
                                            ->with('header',$detail);
    }

    public function wishlist($id)
    {

      Wishlist::add($id,Auth::user()->id);
      return back();

    }

     public function view_wishlist()
     {
        $meta = 'Wishlist';
        $wishlist = Wishlist::getUserWishlist(Auth::user()->id)->load('product');
       
        return view('product.wishlist')->with('wishlist',$wishlist)->with('meta',$meta);
        


     }


     public function removeWishlist($id)
     {
     
        $wishlist = Wishlist::removeByProduct($id, Auth::user()->id);
        return back();

     }
    public function sortBy()
    {
     
     
        $get_data = $_GET['sort'];
        $type = $_GET['type'];
        $idd = Category::where('name',$type)->pluck('id')->first();
        $catids = Product_category::where('cat_parent',$idd)->pluck('id')->all();
        $product_id = Product_categories_relation::whereIn('cat_id',$catids)->pluck('product_id')->all();
  
        if($get_data == 'A-Z') 
        {    
         $products = Product::whereIn('id',$product_id)->orderBy('name','asc')->paginate(24); 
       }
        elseif($get_data == 'Z-A'){
           $products = Product::whereIn('id',$product_id)->orderBy('name','desc')->paginate(24);
         }

         $products->appends(['sort' => $get_data]); 
         $products->appends(['type' => $type]); 
         $image = new Helper(); 
          foreach($products as $product) { ?>
                 <div class="col-xs-12 col-sm-3 prdct_box">

                            <div class="wk_prdct_inner">
                                <div class="wk_prdct_img">
                                    <img src="<?php echo $image->productMainImage($product->id); ?>">
                                </div>
                                <div class="wk_prdct_text">
                                    <div class="hover_ul">
                                        <ul>
                                        <?php  if(Auth::check()) { ?>
                                          <li><a href="<?php echo url('/'); ?>/add-to-wishlist/<?php echo $product->id; ?>">
                                            <img class="black_img" src="<?php echo "/assets/images/heart_black.png"; ?>">
                                            <img class="white_img" src="<?php echo "/assets/images/heart_white.png"; ?>">
                                          </a></li>
                                          <?php } ?>
                                          <li><a href="<?php echo url('/'); ?>/product/<?php echo $product->slug; ?>">
                                            <img class="black_img" src="<?php echo "/assets/images/eye_black.png"; ?>">
                                            <img class="white_img" src="<?php echo "/assets/images/eye_white.png"; ?>">
                                          </a></li>

                                          <li><form method="post" action="<?php echo url('/'); ?>/add-to-cart">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                                                <input type="hidden" name="name" value="<?php echo $product->name; ?>">
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="price" value="<?php echo $product->price; ?>">
                                            <button type="submit">
                                            <img class="black_img" src="<?php echo "/assets/images/cart_black.png"; ?>">
                                            <img class="white_img" src="<?php echo "/assets/images/cart_white.png"; ?> ">
                                          </button>
                                            </form></li>

                                        </ul>
                                    </div>
                                    <h3 title="<?php echo $product->name ?>"><a href="#"><?php echo substr($product->name,0,20); ?></a></h3>
                                    <h5><i class="fas fa-rupee-sign"></i> <?php echo $product->price; ?></h5>
                                </div>
                            </div>
                            
                        </div> 
  
                  
   
          
                       
            <?php        

             } 
            ?>

             <?php
     
 


        }
    




    // }
    public function test()
    {

         return view('errors.204');
    }



    

}
