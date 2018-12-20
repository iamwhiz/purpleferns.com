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
use App\Product_tag;
use App\Product_image;
use App\Product_categories_relation;
use App\Occasion_product;
use App\Occasion;
use App\Product_attribute;
use Wishlist;
use Auth;
use App\Admin;

class ProductController extends Controller
{
	/** Add product **/
	public function addProduct(Request $request)
    {	
		$type = $request->segment(2);
		
		
		if ($request->isMethod('post')) {
			$postdata = $request->all();
			$filesdata = $request->file();
	
			// Save Product
			$product				 = new Product;
			$product->name 			 = $postdata['product_name'];
			$product->type 			 = $postdata['type'];
			$product->slug 			 = $this->productslug($postdata['product_name']);
			$product->description	 = $postdata['product_description'];
			$product->care_instruction	 = $postdata['care_instruction'];
			$product->price			 = $postdata['price'];
			$product->sale_price	 = $postdata['sale_price'];			
			$product->manage_stock 	 = $postdata['manage_stock'];
			$product->stock_qty 	 = $postdata['stock_qty'];
			$product->weight 		 = $postdata['weight'];
			$product->weight_type 	 = $postdata['weight_type'];
			$product->sort 			 = $postdata['sort'];
			$product->tags 			 = $postdata['tags'];
			$product->keywords 		 = $postdata['seo_keywords'];
			$product->seo_description= $postdata['seo_description'];
			$product->product_status = $postdata['product_status'];
			$product->save(); 
			
			$productid = $product->id;
			
			// Assign Categories to product
			if(!empty($postdata['categories'])){
				foreach($postdata['categories'] as $pcat){
					$product_categories	= new Product_categories_relation;
					$product_categories->cat_id		= $pcat;
					$product_categories->product_id	= $productid;
					$product_categories->save(); 
				}
			}
			
			// Insert Tags
			if(!empty($postdata['tags'])){
				$tags = explode(",",$postdata['tags']);
				foreach($tags as $tag){
					$res = Product_tag::where('tag_name',$tag)->count();
					if ($res == 0) {
						$product_tag	= new Product_tag;
						$product_tag->tag_name	= $tag;
						$product_tag->tag_slug	= $this->tagslug($tag);
						$product_tag->save(); 
					}
				}
			}
			
			// Created folder for images
			$productImagespath = "uploads/products/";
			if (!file_exists($productImagespath.''.$productid)) {
				mkdir($productImagespath.''.$productid, 0777, true);
			}
			
			$productImagespath = "uploads/products/".$productid."/";
			
			if(!empty($filesdata['main_image']))
			{
				$tempfile = $filesdata['main_image'];
				$tname = $tempfile->getClientOriginalName();
				$tempfile->move($productImagespath, $tname); 
				
				$filename = explode(".",$tname)[0];
				
				$source_img = $productImagespath.$tname;
				$this->productthumb(200, $productImagespath.'thumb-'.$filename,  $source_img);
				$this->productthumb(300, $productImagespath.'medium-'.$filename, $source_img);
				$this->productthumb(500, $productImagespath.'full-'.$filename,   $source_img);
				
				$product_image	= new Product_image;
				$product_image->product_id	= $productid;
				$product_image->image	= $tname;
				$product_image->main_image	= 1;
				$product_image->save(); 
			}
			
			
			if(!empty($filesdata['product_images']))
			{
				for($i=0; $i<count($filesdata['product_images']);$i++){
					
					$tempfile = $filesdata['product_images'][$i];
					$tname = $tempfile->getClientOriginalName();
					$tempfile->move($productImagespath, $tname); 
					
					$filename = explode(".",$tname)[0];
					
					$source_img = $productImagespath.$tname;
					$this->productthumb(200, $productImagespath.'thumb-'.$filename,  $source_img);
					$this->productthumb(300, $productImagespath.'medium-'.$filename, $source_img);
					$this->productthumb(500, $productImagespath.'full-'.$filename,   $source_img);
					
					$product_image	= new Product_image;
					$product_image->product_id	= $productid;
					$product_image->image	= $tname;
					$product_image->main_image	= 0;
					$product_image->save(); 
				}
				
			}
			
			$type = substr($postdata['type'],0,-1);
			
			// echo '<pre>';
			// print_r($request->file());
			// echo '</pre>';
			// exit;
			return redirect('admin/all-'.$postdata['type'])->with('success',ucfirst($type).' product added successfully <a href="'.url('/admin/edit-product',$productid).'" class="alert-link">Edit</a>');
		}
		

		$types = array("add-flower"=>1, "add-plant"=>2, "add-cake"=>3, "add-gift"=>5);
		// $types = array("add-flower"=>1, "add-plant"=>2, "add-cake"=>3, "add-occasion"=>4, "add-gift"=>5);
		
		$categories = Product_category::where('cat_parent', '=', $types[$type] )->orderBy('cat_type', 'desc')->get()->groupBy('cat_type')->toArray();		
		$producttype = explode("-",$type);
		$producttype = $producttype[1].'s';
        return view('admin.products.add')->with('categories',$categories)->with('type',$type)->with('product_type',$producttype)->with('title',ucwords(str_replace('-',' ',$type)));
    }
	
	/** Edit product **/
	public function editProduct($productid){
	
		$product = Product::with(['product_categories','product_images'])->where('id','=',$productid)->first()->toArray();
		// dd($product);
		$type = $product['type'];
		$types = array("flowers"=>1, "plants"=>2, "cakes"=>3, "occasions"=>4, "gifts"=>5);
		
		$categories = Product_category::where('cat_parent', '=', $types[$type] )->orderBy('cat_type', 'desc')->get()->groupBy('cat_type')->toArray();
		return view('admin.products.edit')->with('product',$product)->with('categories',$categories);
		

    }
	
	/** Update product **/
	public function updateProduct(Request $request){
        
		
		if ($request->isMethod('post')) {

			$postdata = $request->all();

			$filesdata = $request->file();
			$productid = $postdata['product_id'];
	
			// Save Product
			$product				 = Product::find($productid);
			$product->name 			 = $postdata['product_name'];
			$product->type 			 = $postdata['type'];
			$product->slug 			 = $this->productslug($postdata['product_name']);
			$product->description	 = $postdata['product_description'];
			$product->care_instruction	 = $postdata['care_instruction'];
			$product->price			 = $postdata['price'];
			$product->sale_price	 = $postdata['sale_price'];			
			$product->manage_stock 	 = $postdata['manage_stock'];
			$product->stock_qty 	 = $postdata['stock_qty'];
			$product->weight 		 = $postdata['weight'];
			$product->weight_type 	 = $postdata['weight_type'];
			$product->sort 			 = $postdata['sort'];
			$product->tags 			 = $postdata['tags'];
			$product->keywords 		 = $postdata['seo_keywords'];
			$product->seo_description= $postdata['seo_description'];
			$product->product_status = $postdata['product_status'];
			$product->save(); 
			
			
			
			// Assign Categories to product
			if(!empty($postdata['categories'])){
				foreach($postdata['categories'] as $pcat){
					$res = Product_categories_relation::where('cat_id',$pcat)->where('product_id',$productid)->count();
					if ($res == 0) {
						$product_categories	= new Product_categories_relation;
						$product_categories->cat_id		= $pcat;
						$product_categories->product_id	= $productid;
						$product_categories->save(); 
					}
				}
			}
			
			// Insert Tags
			if(!empty($postdata['tags'])){
				$tags = explode(",",$postdata['tags']);
				foreach($tags as $tag){
					$res = Product_tag::where('tag_name',$tag)->count();
					if ($res == 0) {
						$product_tag	= new Product_tag;
						$product_tag->tag_name	= $tag;
						$product_tag->tag_slug	= $this->tagslug($tag);
						$product_tag->save(); 
					}
				}
			}
			
			// Created folder for images
			$productImagespath = "uploads/products/";
			if (!file_exists($productImagespath.''.$productid)) {
				mkdir($productImagespath.''.$productid, 0777, true);
			}
			
			$productImagespath = "uploads/products/".$productid."/";
			
			if(!empty($filesdata['main_image']))
			{
				$tempfile = $filesdata['main_image'];
				$tname = $tempfile->getClientOriginalName();
				$tempfile->move($productImagespath, $tname); 
				
				$filename = explode(".",$tname)[0];
				
				$source_img = $productImagespath.$tname;
				$this->productthumb(200, $productImagespath.'thumb-'.$filename,  $source_img);
				$this->productthumb(300, $productImagespath.'medium-'.$filename, $source_img);
				$this->productthumb(500, $productImagespath.'full-'.$filename,   $source_img);
				$res = Product_image::where('main_image',1)->where('product_id',$productid)->first();
				if (empty($res)) {
					$product_image	= new Product_image;
				}else{
					$product_image	= Product_image::find($res->id);					
				}
				$product_image->product_id	= $productid;
				$product_image->image	= $tname;
				$product_image->main_image	= 1;
				$product_image->save(); 
					
			}
			
			
			if(!empty($filesdata['product_images']))
			{
				for($i=0; $i<count($filesdata['product_images']);$i++){
					
					$tempfile = $filesdata['product_images'][$i];
					$tname = $tempfile->getClientOriginalName();
					$tempfile->move($productImagespath, $tname); 
					
					$filename = explode(".",$tname)[0];
					
					$source_img = $productImagespath.$tname;
					$this->productthumb(200, $productImagespath.'thumb-'.$filename,  $source_img);
					$this->productthumb(300, $productImagespath.'medium-'.$filename, $source_img);
					$this->productthumb(500, $productImagespath.'full-'.$filename,   $source_img);
					
					$product_image	= new Product_image;
					$product_image->product_id	= $productid;
					$product_image->image	= $tname;
					$product_image->main_image	= 0;
					$product_image->save(); 
				}
				
			}
			$type = $product['type'];
		     $types = array("all-flowers"=>'flowers', "all-plants"=>'plants', "all-cakes"=>'cakes', "all-occasions"=>'occasions', "all-gifts"=>'gifts');
			$url = array_search($type, $types);
			return redirect('/admin/'.$url)->with('success','Product Update');
			// return redirect('/admin/edit-product/'.$productid)->with('success','Product Update');
		}
		return redirect('/admin/edit-product/'.$productid)->with('error','Something went wrong. Please try again');
    }
	
	/** Delete product relation data **/
	public function deleteProduct($productid){
		
		if(!empty($productid)){
			$product = Product::where('id','=',$productid)->first()->toArray();
			$res = Product::where('id',$productid)->count();
			if ($res > 0) {
				Product::where('id', '=', $productid)->delete();	
				Product_categories_relation::where('product_id', '=', $productid)->delete();	
				Product_image::where('product_id', '=', $productid)->delete();	
				return redirect('admin/all-'.$product['type'])->with('success','Product deleted Successfully');
			}
		} 
		
		return redirect('admin')->with('error','Something went wrong. Please try again');
	}
	
	/** Get all products **/ 
	public function allproducts(Request $request)
    {
		$type = $request->segment(2);
		$types = array("all-flowers"=>1, "all-plants"=>2, "all-cakes"=>3, "all-occasions"=>4, "all-gifts"=>5);
      
        return view('admin.products.list')->with('type',$types[$type])->with('title',ucwords(str_replace('-',' ',$type)));

    }
	
	/** Get all products **/
	public function filterproducts(Request $request)
    {
		$columns = array(

			// 0 => 'id',
			0 => 'name',
			1 => 'price',
			2 => 'stock_qty',
			3 => 'product_status',
			4 => 'id',
		);
		 
		 $totalData = Product::count();
		
		$totalFiltered = $totalData; 
		$post_mystatus = strtolower($request->post_mystatus);
		$limit = $request->input('length');
		$start = $request->input('start');
		$type = $request->input('types');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		
		if(empty($request->input('search'))){
			$products = Product::selectRaw('id,name,price,stock_qty,product_status')
			                    ->where('type', '=', $type)
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = Product::selectRaw('name,price,stock_qty,product_status')
			                    ->where('type', '=', $type)
								->offset($start)
								->limit($limit)
							    ->orderBy($order,$dir)
								->count();	
		
		}else{ 
			$search = $request->input('search.value');
			$products = Product::selectRaw('id,name,price,stock_qty,product_status')
			                    ->where('type', '=', $type)
								->where('name', 'like', "%{$search}%")
								->where('product_status', 'like', "%{$search}%")
								->where('price', 'like', "%{$search}%")
								->where('created_at', 'like', "%{$search}%")
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = Product::selectRaw('name,price,stock_qty,product_status')
			                    ->where('type', '=', $type)
								->where('name', 'like', "%{$search}%")
								->where('product_status', 'like', "%{$search}%")
								->where('price', 'like', "%{$search}%")
								->where('created_at', 'like', "%{$search}%")
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->count();
			
					        
		}
							
		$products = $products->toArray();
							
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
	
	
	
	
	
	
	
	
	
	/** Add Category **/
	public function addProductCategory(Request $request)
    {	
		$type = request()->segment(2);
		$types = array("add-flower-category"=>1, "add-plant-category"=>2, "add-cake-category"=>3, "add-occasion-category"=>4, "add-gift-category"=>5);
		
		if ($request->isMethod('post')) {
			$postdata = $request->all();
			$filesdata = $request->file();
	
			// Save Product
			$category				     = new Product_category;
			$category->cat_name 		 = $postdata['cat_name'];
			$category->cat_parent 		 = $types[$type];
			$category->cat_slug 	     = $this->productslug($postdata['cat_name']);
			$category->cat_type	         = $postdata['cat_type'];
			$category->description	     = $postdata['description'];
			$category->seo_description	 = $postdata['seo_description'];
			$category->keywords	         = $postdata['keywords'];			
		
			
			
	
			$category->show_in_menu 	 = $postdata['show_in_menu'];
			$category->show_on_home      = $postdata['show_on_home'];
			
			$category->save(); 
			
			$categoryid = $category->id;
			
			// Assign Categories to product
			
			
			// Insert Tags
			// if(!empty($postdata['tags'])){
			// 	$tags = explode(",",$postdata['tags']);
			// 	foreach($tags as $tag){
			// 		$res = Product_tag::where('tag_name',$tag)->count();
			// 		if ($res == 0) {
			// 			$product_tag	= new Product_tag;
			// 			$product_tag->tag_name	= $tag;
			// 			$product_tag->tag_slug	= $this->tagslug($tag);
			// 			$product_tag->save(); 
			// 		}
			// 	}
			// }
			
			// Created folder for images
			$productImagespath = "uploads/categories/";
			if (!file_exists($productImagespath.''.$categoryid)) {
				mkdir($productImagespath.''.$categoryid, 0777, true);
			}
			
			$productImagespath = "uploads/categories/".$categoryid."/";
			
			if(!empty($filesdata['cat_image']))
			{
				$tempfile = $filesdata['cat_image'];
				$tname = $tempfile->getClientOriginalName();
				$tempfile->move($productImagespath, $tname); 
				
				$filename = explode(".",$tname)[0];
				
				
				
				$category	= Product_category::find($categoryid);
			
				
				$category->cat_image	= $tname;
				$category->save(); 
			}
			if(!empty($filesdata['banner_image']))
			{
				$tempfile = $filesdata['banner_image'];
				$bname = $tempfile->getClientOriginalName();
				$tempfile->move($productImagespath, $bname); 
				
				$filename = explode(".",$tname)[0];
				
				
				
				$category	= Product_category::find($categoryid);
			
				
				$category->banner_image	= $bname;
				$category->save(); 
			}
			
			
			$url = str_replace("add-","", $type);
			
			$url1 = preg_replace("%y(?!.*y.*)%", "ies", $url );
			
			
			return redirect('admin/'.$url1)->with('success',' Category added successfully');
		}
		

		$types = array("add-flower-category"=>1, "add-plant-category"=>2, "add-cake-category"=>3, "add-occasion-category"=>4, "add-gift-category"=>5);
		
		// $categories = Product_category::where('cat_parent', '=', $types[$type] )->orderBy('cat_type', 'desc')->get()->groupBy('cat_type')->toArray();		
		// $categorytype = explode("-",$type);  
		// $categorytype = $categorytype[1].'s'; 
        return view('admin.categories.add')->with('type',$type)->with('main_type',$types[$type])->with('title',ucwords(str_replace('-',' ',$type)));
    }
	
	/** Get all Categories **/  
	public function allCategories()
    {
		$type = request()->segment(2);
		
		$types = array("flower-categories"=>1, "plant-categories"=>2, "cake-categories"=>3, "occasion-categories"=>4, "gift-categories"=>5);

        return view('admin.categories.list')->with('type',$types[$type])->with('title',ucwords(str_replace('-',' ',$type)));

    }

    public function editProductCategory($id)
    {	
		$type = request()->segment(2);
		
		
		
		

		$types = array("edit-flower-category"=>1, "edit-plant-category"=>2, "edit-cake-category"=>3, "edit-occasion-category"=>4, "edit-gift-category"=>5);
		
		$categories = Product_category::where('id', '=', $id )->first();		
		
        return view('admin.categories.edit')->with('category',$categories)->with('main_type',$types[$type])->with('title',ucwords(str_replace('-',' ',$type)));
    }
	 public function updateProductCategory(Request $request)
    {	
	
	
		$type = request()->segment(2);
	
		$types = array("edit-flower-category"=>1, "edit-plant-category"=>2, "edit-cake-category"=>3, "add-occasion-category"=>4, "edit-gift-category"=>5);
		
		if ($request->isMethod('post')) {
			$postdata = $request->all();
			$filesdata = $request->file();
			$catId = $postdata['category_id'];
	
			// Save Product
			$category				     = Product_category::find($catId);
			$category->cat_name 		 = $postdata['cat_name'];
			$category->cat_parent 		 = $types[$type];
			$category->cat_slug 	     = $this->productslug($postdata['cat_name']);
			$category->cat_type	         = $postdata['cat_type'];
			$category->description	     = $postdata['description'];
			$category->seo_description	 = $postdata['seo_description'];
			$category->keywords	         = $postdata['keywords'];			
		
			
			
	
			$category->show_in_menu 	 = $postdata['show_in_menu'];
			$category->show_on_home      = $postdata['show_on_home'];
			
			$category->save(); 
			
			$categoryid = $category->id;
			
			// Assign Categories to product
			
			
			
			// Created folder for images
			$productImagespath = "uploads/categories/";
			if (!file_exists($productImagespath.''.$categoryid)) {
				mkdir($productImagespath.''.$categoryid, 0777, true);
			}
			
			$productImagespath = "uploads/categories/".$categoryid."/";
			
			if(!empty($filesdata['cat_image']))
			{
				$tempfile = $filesdata['cat_image'];
				$tname = $tempfile->getClientOriginalName();
				$tempfile->move($productImagespath, $tname); 
				
				$filename = explode(".",$tname)[0];
				
				
				
				$category	= Product_category::find($catId);
			
				
				$category->cat_image	= $tname;
				$category->save(); 
			}
			if(!empty($filesdata['banner_image']))
			{
				$tempfile = $filesdata['banner_image'];
				$bname = $tempfile->getClientOriginalName();
				$tempfile->move($productImagespath, $bname); 
				
				$filename = explode(".",$bname)[0];
				
				
				
				$category	= Product_category::find($catId);
			
				
				$category->banner_image	= $bname;
				$category->save(); 
			}
			
			
			$url = str_replace("edit-","", $type);
			
			$url1 = preg_replace("%y(?!.*y.*)%","ies",$url);
			
			
			return redirect('admin/'.$url1)->with('success',' Category Updated successfully');
		
    }
	}
	public function deleteCategory($id){
		
		if(!empty($id)){
			$product = Product_category::where('id','=',$id)->first()->toArray();
			$res = Product_category::where('id',$id)->count();
			if ($res > 0) {
				Product_category::where('id', '=', $id)->delete();	
				// Product_categories_relation::where('product_id', '=', $productid)->delete();	
				// Product_image::where('product_id', '=', $productid)->delete();	
				// return redirect('admin/all-'.$product['type'])->with('success','Product deleted Successfully');
				return back()->with('success','Category Deleted Succesfully !');
			}
		} 
		
		return redirect()->back()->with('error','Something went wrong. Please try again');
	}
	
	
	
	/** Get all Categories **/
	public function filtercategories(Request $request)
    {
		$columns = array(

		
			0 => 'cat_name',
			1 => 'cat_name',
			2 => 'show_in_menu',
			3 => 'id'
		);
		
		$post_mystatus = strtolower($request->post_mystatus);
		$limit = $request->input('length');
		$start = $request->input('start');
		$type = $request->input('type');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		$totalData = Product_category::count();
		// $totalFiltered = $totalData; 
		
		if(empty($request->input('search.value'))){
			$categories = Product_category::selectRaw('id,cat_name,cat_type,show_in_menu')
								->where('cat_parent', '=', $type)
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = Product_category::selectRaw('id,cat_name,cat_type,show_in_menu')
								->where('cat_parent', '=', $type)
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
							->count();			
		}else{
			$search = $request->input('search.value');
			$categories = Product_category::selectRaw('id,cat_name,cat_type,show_in_menu')
								->where('cat_name', 'like', "%{$search}%")
								->where('cat_parent', '=', $type)
								->where('product_status', 'like', "%{$search}%")
								->where('price', 'like', "%{$search}%")
								->where('created_at', 'like', "%{$search}%")
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = Product_category::selectRaw('id,cat_name,cat_type,show_in_menu')
								->where('cat_name', 'like', "%{$search}%")
								->where('cat_parent', '=', $type)
								->where('product_status', 'like', "%{$search}%")
								->where('price', 'like', "%{$search}%")
								->where('created_at', 'like', "%{$search}%")
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->count();			
		}
							
		$categories = $categories->toArray();
		
		$json_data = array(
				"draw"				=> intval($request->input('draw')),
				"recordsTotal"		=> intval($totalData),
				"recordsFiltered" 	=> intval($totalFiltered),
				"data"				=> $categories
			);
			
		echo json_encode($json_data);
		
		
    }

    

       public function addAttribute(Request $request)
       {

       	$title = 'Add Attribute';

       	if ($request->isMethod('post')) 
       	{
       		$postdata = $request->all();
		
	
			// Save Product
			$attribute				     = new Product_attribute;
			$attribute->attribute_name 	 = $postdata['attribute_name'];
			$attribute->attribute_category 	 = implode('|',$postdata['attribute_category']);
			$attribute->attribute_status 	 = $postdata['attribute_status'];
			$attribute->attribute_slug 	 = $this->attributeslug($postdata['attribute_name']);
		
			$attribute->save(); 

			return redirect('/admin/list-attributes/')->with('success','Attribute Added Succesfully !');
       	}

       	return view('admin.attribute.add')->with('title',$title);
	
		
		

       }

       public function listAttribute()
       {

       	$title = 'All Attribute';

            
       	return view('admin.attribute.list-attribute')->with('title',$title);
	
		
		

       }

       public function editAttribute($id)
       {

       	$title = 'All Attribute';
         $edit_att = Product_attribute::where('id',$id)->first();
            
       	return view('admin.attribute.edit')->with('title',$title)->with('attribute',$edit_att);
	
		
		

       }

        public function updateAttribute(Request $request)
        {

       	$title = 'All Attribute';
        	if ($request->isMethod('post')) 
       	    {
       		$postdata = $request->all();
	
	              $id = $postdata['id'];
		
			$attribute				     = Product_attribute::find($id);
			$attribute->attribute_name 	 = $postdata['attribute_name'];
			$attribute->attribute_category 	 = implode('|',$postdata['attribute_category']);
			$attribute->attribute_status 	 = $postdata['attribute_status'];
			
			// $attribute->attribute_slug 	 = $this->attributeslug($postdata['attribute_name']);
		
			$attribute->save(); 
	print_r($postdata);exit;
			return redirect('/admin/list-attributes/')->with('success','Attribute Updated Succesfully !');
       	    }
	
		
		

        }

        public function deleteAttribute($id)
        {

       	$title = 'All Attribute';
        Product_attribute::where('id',$id)->delete();
            
       return back()->with('success','Attribute Deleted Succesfully !');
	
		
		

        }

       public function filterAttribute(Request $request)
       {

       		$columns = array(

		
			0 => 'attribute_name',
			1 => 'attribute_slug',
			2 => 'id',
			
		     );

	       	$post_mystatus = strtolower($request->post_mystatus);
			$limit = $request->input('length');
			$start = $request->input('start');
			$type = $request->input('type');
			$order = $columns[$request->input('order.0.column')];
			$dir = $request->input('order.0.dir');


			$totalData = Product_attribute::count();
		// $totalFiltered = $totalData; 
		
		if(empty($request->input('search.value'))){
			$attributes = Product_attribute::selectRaw('id,attribute_name,attribute_slug')
								
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = Product_attribute::selectRaw('id,attribute_name,attribute_slug')
								
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
							->count();			
		}else{
			$search = $request->input('search.value');
			$attributes = Product_attribute::selectRaw('id,attribute_name,attribute_slug')
								->where('attribute_name', 'like', "%{$search}%")
							
								->where('created_at', 'like', "%{$search}%")
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = Product_attribute::selectRaw('id,attribute_name,attribute_slug')
								->where('attribute_name', 'like', "%{$search}%")
								
								->where('created_at', 'like', "%{$search}%")
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->count();			
		}
							
		$attributes = $attributes->toArray();
		
		$json_data = array(
				"draw"				=> intval($request->input('draw')),
				"recordsTotal"		=> intval($totalData),
				"recordsFiltered" 	=> intval($totalFiltered),
				"data"				=> $attributes
			);
			
		echo json_encode($json_data);
		



       }
   
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function attributeslug($slug) {
		$invalidSlug = true;
		$count = 1;
		$slug1 = strtolower($slug);
   	    $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
		
		
		while ($invalidSlug) {
			$res = DB::table('product_attributes')->where('attribute_slug',$slug)->count();
			if ($res > 0) {
				$count++;
			if ($count == 2) {
				$slug = $slug.'-'.$count;
			} else {
				$slug++;
			}
			continue;
			} else {
				$invalidSlug = false;
			}
		}
		 return ltrim(rtrim($slug,'-'),'-');
		// return preg_replace('/[^A-Za-z0-9-]+/', '-', $slug);

	}
	
	
	public function productslug($slug) {
		$invalidSlug = true;
		$count = 1;
		$slug1 = strtolower($slug);
   	    $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
		
		
		while ($invalidSlug) {
			$res = DB::table('products')->where('slug',$slug)->count();
			if ($res > 0) {
				$count++;
			if ($count == 2) {
				$slug = $slug.'-'.$count;
			} else {
				$slug++;
			}
			continue;
			} else {
				$invalidSlug = false;
			}
		}
		 return ltrim(rtrim($slug,'-'),'-');
		// return preg_replace('/[^A-Za-z0-9-]+/', '-', $slug);

	}
	
	public function tagslug($slug) {
		$slug1 = strtolower($slug);
		 $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);

		$invalidSlug = true;
		$count = 1;
		while ($invalidSlug) {
			$res = DB::table('product_tags')->where('tag_slug',$slug)->count();
			if ($res > 0) {
				$count++;
			if ($count == 2) {
				$slug = $slug.'-'.$count;
			} else {
				$slug++;
			}
			continue;
			} else {
				$invalidSlug = false;
			}
		}
		return ltrim(rtrim($slug,'-'),'-');

	}
	
	function productthumb_old($source_url, $destination_url, $quality) { 
		$info = getimagesize($source_url); 
		if ($info['mime'] == 'image/jpeg') 
			$image = imagecreatefromjpeg($source_url); 
		elseif ($info['mime'] == 'image/gif') 
			$image = imagecreatefromgif($source_url); 
		elseif ($info['mime'] == 'image/png') 
			$image = imagecreatefrompng($source_url); 
			imagejpeg($image, $destination_url, $quality); 
		return $destination_url; 
	}
	
	function productthumb($newWidth, $targetFile, $originalFile) {
	   $info = getimagesize($originalFile);
	   $mime = $info['mime'];
	   switch ($mime) {
			   case 'image/jpeg':
					   $image_create_func = 'imagecreatefromjpeg';
					   $image_save_func = 'imagejpeg';
					   $new_image_ext = 'jpg';
					   break;
			   case 'image/png':
					   $image_create_func = 'imagecreatefrompng';
					   $image_save_func = 'imagepng';
					   $new_image_ext = 'png';
					   break;
			   case 'image/gif':
					   $image_create_func = 'imagecreatefromgif';
					   $image_save_func = 'imagegif';
					   $new_image_ext = 'gif';
					   break;
			   default: 
					   throw new Exception('Unknown image type.');
	   }
	   $img = $image_create_func($originalFile);
	   list($width, $height) = getimagesize($originalFile);
	   $newHeight = ($height / $width) * $newWidth;
	   $tmp = imagecreatetruecolor($newWidth, $newHeight);
	   imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
	   if (file_exists($targetFile)) {
			   unlink($targetFile);
	   }
	   $image_save_func($tmp, "$targetFile.$new_image_ext");
	}
	
	
}