@extends('admin.layouts.app')
@section('title', 'Edit Page')
@section('content')


	<div class="row">
<div class="col-12 grid-margin">
	  <div class="card">
	   <h4 class="card-title">{{$title}}</h4>
		<div class="card-body">
		  <form class="form-sample" id="addPage" action="{{ url('/admin/update-page') }}" method="post" enctype="multipart/form-data">
		  <div class="card-body_inner">
		 
		  {{ csrf_field() }}
			
			
			<div class="col-sm-8 col-xs-12 left_content padding_left_0">
			
			
			<div class="row">
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Page Title</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" name="page_name" value="{{$page->page_name}}" id="product_name" />
				  </div>
				</div>
			  </div>
			</div>
	
			
		
			
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					  <label class="col-sm-12 col-form-label">Page Description</label>
					  <div class="col-sm-12">
						<textarea class="form-control" name="page_description"/>{{$page->page_description}} </textarea>
					  </div>
					</div>
				</div>
			</div>
			
			
			
		
			
			<fieldset>
			 <legend> SEO</legend> 
			 <div class="col-md-12">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">SEO Title</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" value="{{$page->seotitle}}"  name="seotitle"/>
				  </div>
				</div>
			  </div>
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">SEO Keywords</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" value="{{$page->keywords}}"  name="keywords"/>
				  </div>
				</div>
			  </div>
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">SEO Description</label>
				  <div class="col-sm-12">
					<textarea class="form-control" name="seo_description"/>{{$page->seo_description}}</textarea>
				  </div>
				</div>
			  </div>
			  </fieldset>
			  </div>
			  
		      <input type="hidden" name="id" value="{{$page->id}}">
			  
			  
			  </div>
			<div class="card_footer"><button type="submit" class="btn btn-success mr-2">Update</button></div>
			
		  </form>
		</div>
	  </div>
	</div>
</div>

@endsection
@section('custom-js')
 <script>
 	CKEDITOR.replace( 'page_description' );
 </script>
 @endsection