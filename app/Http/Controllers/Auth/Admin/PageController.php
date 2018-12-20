<?php
namespace App\Http\Controllers\Auth\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Page;

use Auth;
use App\Admin;

class PageController extends Controller
{
  

    public function index()
    {
       $title = "Add Page";
    	return view('admin.pages.add-page')->with('title',$title);
    }

    public function savePage(Request $request)
    {
       
         $title = "All Pages";
		if ($request->isMethod('post')) {
			$postdata = $request->all();
			
    	    $page				         = new Page;
			$page->page_name 			 = $postdata['page_name'];
			$page->page_slug 			 = $this->productslug($postdata['page_name']);
			$page->page_description	     = $postdata['page_description'];
			$page->seotitle 		     = $postdata['seotitle'];
			$page->keywords 		     = $postdata['keywords'];
			$page->seo_description       = $postdata['seo_description'];
			$page->save();


			return redirect('/admin/all-pages')->with('success','Page Created !')->with('title',$title);
			
		
			
    }

}

 public function allPages()
    {
       
         $title = "All Pages";
		
 

       return view('admin.pages.all-pages')->with('title',$title);
			
		
			
    }



    public function pageFilter(Request $request)
    {
         $columns = array(

			// 0 => 'id',
			0 => 'page_name',
			// 1 => 'seo_description',
			// 2 => 'keywords',
			1 => 'id',
			
		);
		
		// $post_mystatus = strtolower($request->post_mystatus);
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		$totalData = Page::count();
		
		
		if(empty($request->input('search.value'))){
			$pages = Page::selectRaw('id,page_name')
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = Page::selectRaw('page_name')
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
							->count();			
		}else{
			$search = $request->input('search.value');
			$pages = Page::selectRaw('id,page_name')
								->where('page_name', 'like', "%{$search}%")
								// ->orWhere('product_status', 'like', "%{$search}%")
								// ->orWhere('price', 'like', "%{$search}%")
								// ->orWhere('created_at', 'like', "%{$search}%")
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->get();
			$totalFiltered = Page::selectRaw('page_name')
								->where('page_name', 'like', "%{$search}%")
								// ->orWhere('product_status', 'like', "%{$search}%")
								// ->orWhere('price', 'like', "%{$search}%")
								// ->orWhere('created_at', 'like', "%{$search}%")
								->offset($start)
								->limit($limit)
								->orderBy($order,$dir)
								->count();			
		}
							
		$pages = $pages->toArray();
							// echo '<pre>';
							// print_r($products);
							// echo '</pre>';exit;
		
		$json_data = array(
				"draw"				=> intval($request->input('draw')),
				"recordsTotal"		=> intval($totalData),
				"recordsFiltered" 	=> intval($totalFiltered),
				"data"				=> $pages
			);
			
		echo json_encode($json_data);

    }

     public function editPage($id)
    {
       
         $title = "Edit Page";
		
          $page =Page::where('id',$id)->first();

			return view('admin.pages.edit')->with('title',$title)->with('page',$page);
			
		
			
    }
    public function updatePage(Request $request)
    {
       
         // $title = "Edit Page";

    	if ($request->isMethod('post')) {
			$postdata = $request->all();
			$pageid = $postdata['id'];
			// dd($pageid);
			
    	    $page				         = Page::find($pageid);
			$page->page_name 			 = $postdata['page_name'];
			$page->page_slug 			 = $this->productslug($postdata['page_name']);
			$page->page_description	     = $postdata['page_description'];
			$page->seotitle 		     = $postdata['seotitle'];
			$page->keywords 		     = $postdata['keywords'];
			$page->seo_description       = $postdata['seo_description'];
			$page->save();


			return redirect('/admin/all-pages/')->with('success','Page Updated !');
			
		
			
    }
		
         
			
		
			
    }
      public function deletePage($id)
    {
       
         $title = "All Pages";
		
          $page =Page::where('id',$id)->delete();

			return redirect('/admin/all-pages/')->with('title',$title)->with('success','Page Deleted !');
			
		
			
    }





public function productslug($slug) {
		$slug = strtolower($slug);
		$invalidSlug = true;
		$count = 1;
		while ($invalidSlug) {
			$res = DB::table('pages')->where('page_slug',$slug)->count();
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

}