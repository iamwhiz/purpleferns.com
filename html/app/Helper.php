<?php 
		
		namespace App;
		use App\Product_category;
    use App\Setting;
    use App\Occasion;
    
		class Helper
		{

           public function category(){

           	$cat_f_types = Product_category::where('cat_parent','flowers')->where('cat_type','types')->where('show_in_menu',1)->get();
            $cat_f_combo = Product_category::where('cat_parent','flowers')->where('cat_type','flower-combo')->where('show_in_menu',1)->get();
             $cat_p_types = Product_category::where('cat_parent','plants')->where('cat_type','types')->where('show_in_menu',1)->get();
             $cat_cake_types = Product_category::where('cat_parent','cakes')->where('cat_type','types')->where('show_in_menu',1)->get();
              $cat_cake_flavour = Product_category::where('cat_parent','cakes')->where('cat_type','flavour')->where('show_in_menu',1)->get();
              $cat_cake_occasion = Product_category::where('cat_parent','cakes')->where('cat_type','occasion')->where('show_in_menu',1)->get();
              $cat_personalized_gift = Product_category::where('cat_parent','gifts')->where('cat_type','personalized-gifts')->where('show_in_menu',1)->get();
             $cat_Special_gift = Product_category::where('cat_parent','gifts')->where('cat_type','special-gifts')->where('show_in_menu',1)->get();
              $cat_gift_recipients = Product_category::where('cat_parent','gifts')->where('cat_type','by-recipients')->where('show_in_menu',1)->get();
           
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


             return [
                
                'email' => $contact_email['setting_value'],
                'twitter_link' => $twitter_link['setting_value'],
                'facebook_link' => $facebook_link['setting_value'],
                'youtube_link' => $youtube_link['setting_value'],
               'instagram_link' => $insta_link['setting_value'],
              
                'phone' => $phone['setting_value'],
                'footer_content' => $footer_content['setting_value'],
               
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