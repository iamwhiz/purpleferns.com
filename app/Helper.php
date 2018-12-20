<?php 
		
		namespace App;
    use App\Product_category;
    use App\Category;
    use App\Product_image;
    use App\Setting;
    use App\Occasion;
    
    class Helper
    {
         



        function moneyFormat()
        {


          return "Rs.";
        }
         function priceFormat($price)
        {


          return "Rs.".$price;
        }


        public function categoryBanner($id){ 

        
            $banner = Category::where('id',$id)->first();
            return $banner;
           
        }

        public function subCategoryBanner($id){ 

        
            $subBanner = Product_category::where('id',$id)->first();
            
            return $subBanner;
                       
        }
        public function productMainImage($productid,$size=NULL){ 

            $folderpath = '/uploads/products/'.$productid.'/';
            $products_img = Product_image::where('product_id',$productid)->where('main_image',1)->first();
            if(!empty($products_img)){

              return $folderpath.$products_img->image;
            }
            return '/assets/images/prdct2.png';
        }
        public function multipleImages($product_id,$sizee=NULL){ 

          
            $products_img = Product_image::where('product_id',$product_id)->where('main_image',0)->get();
            if(!empty($products_img)){

              return $products_img;
            }
            return 'assets/images/prdct2.png';
        }

           public function category(){
             $flowers_id = Category::where('name','flowers')->pluck('id')->first();
             $plants_id = Category::where('name','plants')->pluck('id')->first();
             $cakes_id = Category::where('name','cakes')->pluck('id')->first();
             $gifts_id = Category::where('name','gifts')->pluck('id')->first();
           	$cat_f_types = Product_category::where('cat_parent',$flowers_id)->where('cat_type','types')->where('show_in_menu',1)->orderBy('sort','desc')->get();
            $cat_f_combo = Product_category::where('cat_parent',$flowers_id)->where('cat_type','flower-combo')->where('show_in_menu',1)->orderBy('sort','desc')->get();
             $cat_p_types = Product_category::where('cat_parent',$plants_id)->where('cat_type','types')->where('show_in_menu',1)->orderBy('sort','desc')->get();
             $cat_cake_types = Product_category::where('cat_parent', $cakes_id)->where('cat_type','types')->where('show_in_menu',1)->orderBy('sort','desc')->get();
              $cat_cake_flavour = Product_category::where('cat_parent', $cakes_id)->where('cat_type','flavour')->where('show_in_menu',1)->orderBy('sort','desc')->get();
              $cat_cake_occasion = Product_category::where('cat_parent', $cakes_id)->where('cat_type','occasion')->where('show_in_menu',1)->orderBy('sort','desc')->get();
              $cat_personalized_gift = Product_category::where('cat_parent',$gifts_id)->where('cat_type','personalized-gifts')->where('show_in_menu',1)->orderBy('sort','desc')->get();
             $cat_Special_gift = Product_category::where('cat_parent',$gifts_id)->where('cat_type','special-gifts')->where('show_in_menu',1)->orderBy('sort','desc')->get();
              $cat_gift_recipients = Product_category::where('cat_parent',$gifts_id)->where('cat_type','by-recipients')->where('show_in_menu',1)->orderBy('sort','desc')->get();
           
           	return [
                      'cat_f_types' =>$cat_f_types,
                      'cat_f_combo' =>$cat_f_combo,
                      'cat_p_types' =>$cat_p_types,
                      'cat_cake_types' =>$cat_cake_types,
                      'cat_cake_flavour' =>$cat_cake_flavour,
                      'cat_cake_occasion' =>$cat_cake_occasion,
                      'cat_gift_recipients' =>$cat_gift_recipients,
                      'cat_Special_gift' =>$cat_Special_gift,
                      'cat_personalized_gift' => $cat_personalized_gift

                  ];
           	
           }

            public function occasion(){

            $oc = Occasion::get();
             
            return $oc;
            
           }

           

           public function web_settings(){



           
            $contact_email = Setting::where('setting_key','email')->first();
            $facebook_link = Setting::where('setting_key','facebook_link')->first();
            $twitter_link = Setting::where('setting_key','twitter_link')->first();
            $youtube_link = Setting::where('setting_key','youtube_link')->first();
            $insta_link = Setting::where('setting_key','instagram_link')->first();
         
            $phone = Setting::where('setting_key','phone')->first();
            $footer_content = Setting::where('setting_key','footer_content')->first();
            $home_keywords = Setting::where('setting_key','home_keywords')->first();
            $home_description = Setting::where('setting_key','home_description')->first();


             return [
                
                'email' => $contact_email['setting_value'],
                'twitter_link' => $twitter_link['setting_value'],
                'facebook_link' => $facebook_link['setting_value'],
                'youtube_link' => $youtube_link['setting_value'],
               'instagram_link' => $insta_link['setting_value'],
              
                'phone' => $phone['setting_value'],
                'footer_content' => $footer_content['setting_value'],
                'home_keywords' => $home_keywords['setting_value'],
                'home_description' => $home_description['setting_value'],
               
              ];
          
            
           }
             function addhttp($url) {  
              if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                  $url = "http://" . $url;
              }
              return $url;
          }
         }
            

?>