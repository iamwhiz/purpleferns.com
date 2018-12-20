<?php
namespace App\Http\Controllers\Auth\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\City;


use Auth;
use App\Admin;

class CityController extends Controller
{

	public function index(Request $request)
	{

		$title = "Add City";

		if ($request->isMethod('post')) {
			$postdata = $request->all();
			$filesdata = $request->file();

			$city				       = new City;
			$city->city 			   = $postdata['city'];
			$city->level               = $postdata['level'];
			
			$city->save(); 

			return redirect('admin/all-cities')->with('success','City added successfully');
          

		}
		return view('admin.cities.add-city')->with('title',$title);
	}

	    public function allCities()
	    {
	    	$title = "All Cities";
	    	return view('admin.cities.all-city')->with('title',$title);
	    }
	     public function editCity($id)
	    {
	    	$title = "Edit Cities"; 

            $city = City::where('id',$id)->first();
	    	return view('admin.cities.edit-city')->with('title',$title)->with('city',$city);
	    }
	    public function updateCity(Request $request)
	    {
	    	$title = "Update Cities"; 

           if ($request->isMethod('post')) {
			$postdata = $request->all();
			      $id = $postdata['id'];

			$city				       = City::find($id);
			$city->city 			   = $postdata['city'];
			$city->level               = $postdata['level'];
		
			$city->save(); 

			return redirect('admin/all-cities')->with('success','City Updated successfully');
          

		}

	        return back()->with('error','Something Went Wrong !');
	    }
	      public function deleteCity($id)
	    {
	    	$title = "Delete Cities"; 

            $city = City::where('id',$id)->delete();
	    	return back()->with('success','City Deleted successfully');
	    }

		public function filterCities(Request $request)
	    {

		$title = "All Cities";

	

		$columns = array(

			
			0 => 'city',
			1 => 'level',
			2 => 'id'
			
		);
		
		$post_mystatus = strtolower($request->post_mystatus);
		$limit = $request->input('length');
		$start = $request->input('start');
		$type = $request->input('type');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		$totalData = City::count();
		// $totalFiltered = $totalData; 
		
		if(empty($request->input('search.value'))){
			$cities =City::selectRaw('id,city,level')
								
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered =City::selectRaw('id,city,level')
						
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
							->count();			
		}else{
			$search = $request->input('search.value');
			$cities = City::selectRaw('id,city,level')
								->where('city', 'like', "%{$search}%")
							
								
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = City::selectRaw('id,city,level')
								->where('city', 'like', "%{$search}%")
		
							
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->count();			
		}
							
		$cities = $cities->toArray();
		
		$json_data = array(
				"draw"				=> intval($request->input('draw')),
				"recordsTotal"		=> intval($totalData),
				"recordsFiltered" 	=> intval($totalFiltered),
				"data"				=> $cities
			);
			
		echo json_encode($json_data);
		
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
        // $products = Product::paginate(6);
        // return view('admin.products.list')->with('products',$products);
		// return response()->json($_POST);
    }
		
}


?>