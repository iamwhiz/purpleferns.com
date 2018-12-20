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

        $meta = 'Home';
    	 $category = Category::get();

    	 $plant_cat = Product_category::where('cat_parent','plants')->get();
    	 $flower_cat =  Product_category::where('cat_parent','flowers')->get()->take(5);
    	 $cakes_cat =  Product_category::where('cat_parent','cakes')->get()->take(5);
        return view('index')->with('category',$category)->with('plant_cat',$plant_cat)
        									            ->with('flower_cat',$flower_cat)
                                                        ->with('cakes_cat',$cakes_cat)
        									            ->with('meta',$meta);
    }


     public function profile(Request $request)
    {

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
                    'date' => 'required',
                    'month' => 'required',
                    'year' => 'required',
                    'a_year' => 'required',
                    'a_date' => 'required',
                    'a_month' => 'required',
                    'gender' => 'required',
                  
                    'pincode' => 'required',
                    'city' => 'required',
                    'country' => 'required',
                    'address' => 'required',
                   
                ]);

                 if ($validator->fails()) {
                     return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
                }
                
                $dob = $request->input('date') . "," . $request->input('month') . "," . $request->input('year');
                $doa = $request->input('a_date') . "," . $request->input('a_month') . "," . $request->input('a_year');

                $data = [
                            'first_name' => $request->input('first_name'),
                            'last_name' => $request->input('last_name'),
                            'email' => $request->input('email'),
                            'mobile' => $request->input('mobile'),
                            'dob' => $dob,
                            'date_of_anniversary' => $doa,
                            'pincode' => $request->input('pincode'),
                            'gender' => $request->input('gender'),
                            'city' => $request->input('city'),
                            'country' => $request->input('country'),
                            'address' => $request->input('address'),
                        ];
        
               User::where('id', Auth::user()->id)->update($data);
              
             
             
              return redirect()->back()->with('success', 'Website Settings Updated Successfully!');  

          
         }
            
         
        return view('profile')->with('user',$user); 

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
        return view('about');
    }

     public function contact()
    {

                  

        return view('contact');
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
         $meta =  Page::where('id',1)->pluck('page_name')->first();

         $terms = Page::where('id',1)->first();
        return view('terms')->with('terms',$terms)->with('meta',$meta);
    }
     public function privacyPolicy()
    {
         $meta =  Page::where('id',2)->pluck('page_name')->first();

         $policy = Page::where('id',2)->first();
        return view('policy')->with('policy',$policy)->with('meta',$meta);
    }
}
