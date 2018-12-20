<?php
namespace App\Http\Controllers\Auth\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
	/** Add product **/
	public function addProduct()
    {		
		$categories = Product_category::paginate();		
        return view('admin.products.add')->with('categories',$categories);
    }
	
	/** Add product **/
	public function editProduct(Request $request)
    {
        return view('admin.products.add');

    }
	
	/** Get all products **/
	public function allproducts()
    {
        $products = Product::paginate(6);
        return view('admin.products.list')->with('products',$products);

    }
	
	/** Get all products **/
	public function filterproducts(Request $request)
    {
		$columns = array(

			// 0 => 'id',
			0 => 'name',
			1 => 'price',
			2 => 'stock_qty',
			3 => 'created_at',
			4 => 'id',
		);
		
		$post_mystatus = strtolower($request->post_mystatus);
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		$totalData = Product::count();
		$totalFiltered = Product::count();
		
		$products = Product::selectRaw('id,name,price,stock_qty,created_at')
							->offset($start)
							->limit($limit)
							->orderBy($order,$dir)
							->get();
		$totalFiltered = Product::selectRaw('name,price,stock_qty,created_at')
							->offset($start)
							->limit($limit)
							->orderBy($order,$dir)
							->count();				
		$products = $products->toArray();
							// echo '<pre>';
							// print_r($products);
							// echo '</pre>';exit;
		
		$json_data = array(
				"draw"				=> intval($request->input('draw')),
				"recordsTotal"		=> intval($totalData),
				"recordsFiltered" 	=> intval($totalFiltered),
				"data"				=> $products
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