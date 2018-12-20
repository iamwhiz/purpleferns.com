@extends('admin.layouts.app')
@section('title', 'Add City')
@section('content')

<div class="row">
   <div class="col-12 grid-margin">
	  <div class="card">
	   <h4 class="card-title">{{$title}}</h4>
	  
		<div class="card-body">
		  <form class="form-sample" id="addProduct" action="{{ url('/admin/add-city') }}" method="post" enctype="multipart/form-data">
		  <div class="card-body_inner">
		  
		  {{ csrf_field() }}
			
			
			<div class="col-sm-12 col-xs-12 left_content padding_left_0">
			
			
			<div class="row">
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">City Name</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" name="city" id="cat_name" />
				  </div>
				</div>
			  </div>
			</div>
			
	
			
			<div class="row">
			  <div class="col-md-4">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Level</label>
				  <div class="col-sm-12">
					<select name="level" class="form-control">
						<option value="Level 1"  selected>Level 1</option>
						<option value="Level 2"          >Level 2</option>
						<option value="Level 3"          >Level 3</option>
						<option value="Level 4"          >Level 4</option>
						<option value="Level 5"          >Level 5</option>
						
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


