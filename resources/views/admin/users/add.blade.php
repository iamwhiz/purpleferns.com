@extends('admin.layouts.app')
@section('title', 'Add User')
@section('content')

<div class="row">
<div class="col-12 grid-margin">
	  <div class="card">
	   <h4 class="card-title">{{$title}}</h4>
		<div class="card-body">
		  <form class="form-sample" id="addProduct" action="{{ url('/admin/add-user') }}" method="post" enctype="multipart/form-data">
		  <div class="card-body_inner">
		  
		  {{ csrf_field() }}
			
			
		
			
			
			<div class="row">
			  <div class="col-md-6">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">First Name</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" name="first_name" id="product_name" />
					<span class="text-danger">{{ $errors->first('first_name') }}</span>
				  </div>
				</div>
			  </div>
			   <div class="col-md-6">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Last Name</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" name="last_name" id="product_name" />
					<span class="text-danger">{{ $errors->first('last_name') }}</span>
				  </div>
				</div>
			  </div>
			</div>
			
				
			
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					  <label class="col-sm-12 col-form-label">Mobile</label>
					  <div class="col-sm-12">
						<input type="text" class="form-control" name="mobile"/>
						<span class="text-danger">{{ $errors->first('mobile') }}</span>
					  </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					 <label class="col-sm-12 col-form-label">Email</label>
					  <div class="col-sm-12">
						<input type="text" class="form-control" name="email"/>
						<span class="text-danger">{{ $errors->first('email') }}</span>
					  </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					  
					   <label class="col-sm-12 col-form-label">Address</label>
					  <div class="col-sm-12">
						<input type="text" class="form-control" name="address"/>
						<span class="text-danger">{{ $errors->first('address') }}</span>
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

