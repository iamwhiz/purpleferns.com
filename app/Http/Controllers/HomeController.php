<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_category;
use App\Category;
use App\Page;
use Auth;
use Validator;
use App\User;
use App\Contact;
use Mail;
class HomeController extends Controller
{
    
    public function index()
    {


        $header = Page::where('id',6)->first();
        $meta = Page::where('id',6)->pluck('seotitle')->first();
    	 $category = Category::orderBy('sort','asc')->get();
        
    	
		$flower_id = Category::where('name','flowers')->pluck('id')->first();
		$cake_id = Category::where('name','cakes')->pluck('id')->first();
		$gift_id = Category::where('name','gifts')->pluck('id')->first();
		$plant_id = Category::where('name','plants')->pluck('id')->first();
		$flower_cat =  Product_category::where('cat_parent',$flower_id)->where('show_on_home',1)->get()->take(6);
		$cakes_cat =  Product_category::where('cat_parent',$cake_id)->where('show_on_home',1)->get()->take(6);
		$gifts_cat =  Product_category::where('cat_parent',$gift_id)->where('show_on_home',1)->get()->take(6);
		$plant_cat = Product_category::where('cat_parent', $plant_id)->where('show_on_home',1)->get();
        return view('index')->with('category',$category)->with('plant_cat',$plant_cat)
        									            ->with('flower_cat',$flower_cat)
                                                        ->with('cakes_cat',$cakes_cat)
                                                        ->with('gifts_cat',$gifts_cat)
                                                        ->with('header',$header)
        									            ->with('meta',$meta);
    }


     public function profile(Request $request)
    {
         $meta = 'Profile';
        if(Auth::check())
        {
         
        $userdata = $request->all();
         $user=Auth::user();

          if(count($userdata) > 0){
               $validator = Validator::make($request->all(), [
                    'first_name' => 'required|max:255',
                    'last_name' => 'required|max:255',
                    'email' => 'required',
                    'mobile' => 'required|numeric',
                   
                  
                  
                    'gender' => 'required',
                  
                  
                   
                ]);

                 if ($validator->fails()) {
                     return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
                }
                
               

                $data = [
                            'first_name' => $request->input('first_name'),
                            'last_name' => $request->input('last_name'),
                            'email' => $request->input('email'),
                            'mobile' => $request->input('mobile'),
                            'dob' => $request->input('dob'),
                            'date_of_anniversary' => $request->input('date_of_anniversary'),
                            'pincode' => $request->input('pincode'),
                            'gender' => $request->input('gender'),
                            'city' => $request->input('city'),
                            'country' => $request->input('country'),
                            'address' => $request->input('address'),
                        ];
        
               User::where('id', Auth::user()->id)->update($data);
              
             $notification = array(
            'message' => 'Profile Updated Successfully !', 
            'alert-type' => 'success'
        );
             
              return redirect()->back()->with($notification);  

          
         }
            
         
        return view('profile')->with('user',$user)->with('meta',$meta); 

        }
    }

     public function profile_update(Request $request)
    {
        if(Auth::check())
        {

             $validator = Validator::make($request->all(), [
                   'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                   
                   
                ]);

                 if ($validator->fails()) {
                     return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
                }

                 
    
            if ($request->hasFile('profile_img')) {

           $old_img = User::where('id',Auth::user()->id)->pluck('profile_img')->first();
           if(count($old_img)>0){
           
            unlink(public_path("/assets/images/profile/{$old_img}"));
        }
 
        $image = $request->file('profile_img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('assets/images/profile');
        $image->move($destinationPath, $name);
       

       User::where('id',Auth::user()->id)->update(['profile_img' => $name]);

        return back()->with('success','Image Upload successfully');
    }


        }
    }

      public function about()
    {  
         
         $header = Page::where('id',8)->first();
        $meta = Page::where('id',8)->pluck('seotitle')->first();
        $content  = Page::where('id',8)->first();
        $vision   = Page::where('id',9)->pluck('page_description')->first();
        $mission   = Page::where('id',10)->pluck('page_description')->first();
        return view('about')->with('header',$header)
                            ->with('content',$content)
                            ->with('vision',$vision)
                            ->with('mission',$mission)
                            ->with('meta',$meta);
    }

     public function contact()
    {

                  
      $header = Page::where('id',7)->first();
        $meta = Page::where('id',7)->pluck('seotitle')->first();
        return view('contact')->with('header',$header)
                              ->with('meta',$meta);
    }

    public function addContact(Request $request)
    {
         $validator = Validator::make($request->all(), [
                    'first_name' => 'required|max:255',
                    'last_name' => 'required|max:255',
                    'email' => 'required',
                    'mobile' => 'required|numeric',
                    
                    'message' => 'required',
                    'g-recaptcha-response'=> 'required'
                   
                ]);

                 if ($validator->fails()) {
                     return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
                }

                $data = [
                             'first_name' => $request->input('first_name'),
                            'last_name' => $request->input('last_name'),
                            'email' => $request->input('email'),
                            'mobile' => $request->input('mobile'),
                            'message' => $request->input('message'),
                            'g-recaptcha-response' => $request->input('g-recaptcha-response'),
                        ];

               Contact::insert($data);   

            //    $to_name = 'TO_NAME';
            // $to_email = 'ikwindersingh8@gmail.com';
            //  $data = array('name'=>"Sam Jose", "body" => "Test mail");
    
            // Mail::send('email.mail', $data, function($message) use ($to_name, $to_email) {
            //   $message->to($to_email, $to_name)
            // ->subject('Artisans Web Testing Mail');
            //    $message->from('testing.whizkraft1@gmail.com','Artisans Web');
// });
               return back()->with('message',"We will Contact Soon !");
    }

     public function termsConditions()
    {               
         $meta =  Page::where('id',1)->pluck('seotitle')->first();

         $terms = Page::where('id',1)->first();
        return view('terms')->with('terms',$terms)->with('meta',$meta);
    }
     public function privacyPolicy()
    {
         $meta =  Page::where('id',2)->pluck('seotitle')->first();

         $policy = Page::where('id',2)->first();
        return view('policy')->with('policy',$policy)->with('meta',$meta);
    }
     public function MyOrder()
    {
         $meta =  'My Orders';

        
        return view('order')->with('meta',$meta);
    }
     public function ViewOrder()
    {
         $meta =  'View Orders';

        
        return view('view_order')->with('meta',$meta);
    }
}
