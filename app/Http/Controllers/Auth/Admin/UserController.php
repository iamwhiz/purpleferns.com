<?php
namespace App\Http\Controllers\Auth\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Carbon;
use Mail;
use Auth;
use App\Admin;

class UserController extends Controller
{

	public function index()
	{
		$title = 'All Users';

		return view('admin.users.all-user')->with('title',$title);
	}

	public function filterUser(Request $request)
	{
		

		$columns = array(

		
			
			0 => 'first_name',
		    1 => 'last_name',
			2 => 'email',
			3 => 'address',
			4 => 'status',
			5 => 'id'
			
		
		    
		
		);
		 
		 $totalData = User::count();

		$totalFiltered = $totalData; 
		$post_mystatus = strtolower($request->post_mystatus);
		$limit = $request->input('length');
		$start = $request->input('start');
		
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		
		if(empty($request->input('search')))
		{
			$users = User::select('first_name','last_name','email','address','status','id')
							    ->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = User::select('first_name','last_name','email','address','status','id')
							    ->offset($start)
								->limit($limit)
								 ->orderBy($order,$dir)
								->count();	
		                   
		}
		else
		{ 
			$search = $request->input('search.value');
			$users = User::select('first_name','last_name','email','address','status','id')
							    ->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = User::select('first_name','last_name','email','address','status','id')
							    ->offset($start)
								->limit($limit)
								// ->orderBy($order,$dir)
								->count();
			
								
								
								
					        
		}
							
		$users = $users->toArray();
							
		$json_data = array(
				"draw"				=> intval($request->input('draw')),
				"recordsTotal"		=> intval($totalData),
				"recordsFiltered" 	=> intval($totalFiltered),
				"data"				=> $users
			);
			
		echo json_encode($json_data);
	}


	public function addUser(Request $request)
	{
		$title = "Add User";
         
		if ($request->isMethod('post')) 
		{



           $this->validate($request,[
                                     'first_name'=>'required',
                                     'last_name'=>'required',
                                     'email'=>'required',
                                     'address'=>'required',
                                     'mobile'=>'required',
                                   ]);


			$random = str_random(6);
			$postdata = $request->all();
			
    	    $user				         = new User;
			$user->first_name 			 = $postdata['first_name'];
			$user->last_name 			 = $postdata['last_name'];
			$user->password 			 = bcrypt($random);
			$user->email			     = $postdata['email'];
			$user->address	             = $postdata['address'];
			$user->mobile	             = $postdata['mobile'];
			
			$user->save();

            


            $data = ['password'=> $random];
            Mail::send('email.password',["data1"=>$data], function($message) {
            $message->to('ikwindersingh8@gmail.com', 'Ikwinder Singh')->subject
            ('Laravel HTML Testing Mail');
       
            });

			return redirect('/admin/all-users')->with('success','User Added !')->with('title',$title);
			
		
			
        }

        return view('admin.users.add')->with('title',$title);

	}
	public function editUser($id)
	{
		$title = "Edit User";
		$user = User::where('id',$id)->first();
		return view('admin.users.edit-user')->with('title',$title)->with('user',$user);
	}

	public function updateUser(Request $request)
	{
		$title = "Edit User";
		 

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
                            'status' =>  $request->input('status'),
                        ];


                 User::where('id', $request->input('user_id') )->update($data);
                 return redirect('/admin/all-users/')->with('success','User Updated !')->with('title',$title);  
	}

	public function deleteUser($id)
	{
		$title = "Delete User";
		$user = User::where('id',$id)->delete();
		 return back()->with('success','User Deleted !'); 
	}

}

?>