@extends('admin.layouts.app')
@section('title', 'Edit Attribute')
@section('content')
<?php
// echo '<pre>';
// print_r();
// echo '</pre>';
$categories = explode("|",$attribute->attribute_category);
?>

<div class="row">
<div class="col-12 grid-margin">
	  <div class="card">
	   <h4 class="card-title">{{$title}}</h4>
		<div class="card-body">
		  <form class="form-sample" id="addProduct" action="{{ url('/admin/edit-attribute') }}" method="post" enctype="multipart/form-data">
		  <div class="card-body_inner">
		   
		  {{ csrf_field() }}
			
			
			<div class="col-sm-8 col-xs-12 left_content padding_left_0">
			
			
			<div class="row">
			  <div class="col-md-8">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Attribute Name</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" name="attribute_name" value="{{$attribute->attribute_name}}" id="product_name" />
				  </div>
				</div>
			  </div>
			  <div class="col-md-8">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Category Type</label>
				  <div class="col-sm-12">
					<select class="form-control" name="attribute_category[]" id="attribute_category" multiple />
						<option value="flowers" <?php if(in_array('flowers',$categories)){ echo 'selected'; } ?> >Flowers</option>
						<option value="cakes"   <?php if(in_array('cakes',$categories)){ echo 'selected'; } ?> >Cakes</option>
						<option value="gifts"   <?php if(in_array('gifts',$categories)){ echo 'selected'; } ?> >Gifts</option>						
						<option value="plants"  <?php if(in_array('plants',$categories)){ echo 'selected'; } ?> >Plants</option>
					</select>
				  </div>
				</div>
			  </div>
			  <div class="col-md-8">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Publish</label>
				  <div class="col-sm-12">
					<select class="form-control" name="attribute_status" >
							<option value="0" <?php if($attribute->attribute_status == 0){ echo 'selected'; } ?> >Yes</option>
							<option value="1" <?php if($attribute->attribute_status == 1){ echo 'selected'; } ?> >No</option>									
						</select>
				  </div>
				</div>
			  </div>
			</div> 
			
			  
			 
			  
			  
			  </div>
			</div>
			<input type="hidden" name="id" value="{{$attribute->id}}">
			<div class="card_footer"><button type="submit" class="btn btn-success mr-2">Submit</button></div>
			
		  </form>
		</div>
	  </div>
	</div>
</div>

@endsection

