@extends('admin.layouts.app')
@section('title', 'Add Attribute')
@section('content')

<div class="row">
<div class="col-12 grid-margin">
	  <div class="card">
	   <h4 class="card-title">{{$title}}</h4>
		<div class="card-body">
		  <form class="form-sample" id="addProduct" action="{{ url('/admin/add-attribute') }}" method="post" enctype="multipart/form-data">
		  <div class="card-body_inner">
		   
		  {{ csrf_field() }}
			
			
			<div class="col-sm-8 col-xs-12 left_content padding_left_0">
			
			
			<div class="row">
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Attribute Name</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" name="attribute_name" id="product_name" />
				  </div>
				</div>
			  </div>
			   <div class="col-md-8">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Category Type</label>
				  <div class="col-sm-12">
					<select class="form-control" name="attribute_category[]" id="attribute_category" multiple />
						<option value="flowers" >Flowers</option>
						<option value="cakes"   >Cakes</option>
						<option value="gifts"   >Gifts</option>						
						<option value="plants"  >Plants</option>
					</select>
				  </div>
				</div>
			  </div>
			  <div class="col-md-8">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Publish</label>
				  <div class="col-sm-12">
					<select class="form-control" name="attribute_status" >
							<option value="0">Yes</option>
							<option value="1">No</option>									
						</select>
				  </div>
				</div>
			  </div>
			</div>
			
			  
			 
			  
			  
			  </div>
			</div>
			<div class="card_footer"><button type="submit" class="btn btn-success mr-2">Submit</button></div>
			
		  </form>
		</div>
	  </div>
	</div>
</div>

@endsection

