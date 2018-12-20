@extends('admin.layouts.app')
@section('title', 'Edit User')
@section('content')

<div class="row">
<div class="col-12 grid-margin">
	  <div class="card">
	   <h4 class="card-title">{{$title}}</h4>
		<div class="card-body">
		  <form class="form-sample" id="addProduct" action="{{ url('/admin/update-user') }}" method="post" enctype="multipart/form-data">
		  <div class="card-body_inner">
		  
		  {{ csrf_field() }}
			
			
		
			
			
			<div class="row">
			  <div class="col-md-6">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">First Name</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" value="{{isset($user->first_name)? $user->first_name : '' }}" name="first_name" id="product_name" />
					<span class="text-danger">{{ $errors->first('first_name') }}</span>
				  </div>
				</div>
			  </div>
			   <div class="col-md-6">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Last Name</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" name="last_name" value="{{isset($user->last_name)? $user->last_name : '' }}" id="product_name" />
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
						<input type="text" class="form-control" value="{{isset($user->mobile)? $user->mobile : '' }}" name="mobile"/>
						<span class="text-danger">{{ $errors->first('mobile') }}</span>
					  </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					 <label class="col-sm-12 col-form-label">Email</label>
					  <div class="col-sm-12">
						<input type="text" class="form-control" value="{{isset($user->email)? $user->email : '' }}" name="email"/>
						<span class="text-danger">{{ $errors->first('email') }}</span>
					  </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					  
					   <label class="col-sm-12 col-form-label">Address</label>
					  <div class="col-sm-12">
						<input type="text" class="form-control" value="{{isset($user->address)? $user->address : '' }}" name="address"/>
						<span class="text-danger">{{ $errors->first('address') }}</span>
					  </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					  
					   <label class="col-sm-12 col-form-label">Status</label>
					  <div class="col-sm-12">
				
						<select name="status" class="form-control">
							<option value="0" <?php echo($user->status == 0) ? "selected" : '';?>>Activate</option>
							<option value="1" <?php echo($user->status == 1) ? "selected" : '';?>>De-Activate</option>

						</select>
						<span class="text-danger">{{ $errors->first('status') }}</span>
					  </div>
					</div>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-6">
					<div class="form-group">
					   <label class="col-md-12 col-form-label">Date of Birth</label>
					   <div class="dob_admin">
					     <div class="col-sm-12">
					
					  		<input type="text" name="dob" value="{{isset($user->dob)? $user->dob : '' }}" class="form-control" id='datepicker' />
					</div>
				    </div>
			      </div>
				  </div>

				  <div class="col-md-6">
					<div class="form-group">
					   <label class="col-md-12 col-form-label">Date of Anniversary</label>
					   <div class="dob_admin">
					     <div class="col-sm-12">
					
					  			<input type="text" name="date_of_anniversary" value="{{isset($user->date_of_anniversary)? $user->date_of_anniversary : '' }}" class="form-control" id='datepicker1' />
				    </div>
			      </div>
				  </div>
				</div>
                </div>
				  <div class="row">
				       <div class="col-md-6">
					    <div class="form-group">
					  
					   <label class="col-sm-12 col-form-label">Address</label>
					    <div class="col-sm-12">
						<input type="text" class="form-control" value="{{isset($user->address)? $user->address : '' }}" name="address"/>
						<span class="text-danger">{{ $errors->first('address') }}</span>
					 </div>
					</div>
				   </div>

				   <div class="col-md-6">
					    <div class="form-group">
					  
					   <label class="col-sm-12 col-form-label">Pin Code</label>
					    <div class="col-sm-12">
						<input type="text" class="form-control" value="{{isset($user->pincode)? $user->pincode : '' }}" name="pincode"/>
						<span class="text-danger">{{ $errors->first('pincode') }}</span>
					 </div>
					</div>
				   </div>
				</div>
				 <div class="row">
				       <div class="col-md-6">
					    <div class="form-group">
					  
					   <label class="col-sm-12 col-form-label">City</label>
					    <div class="col-sm-12">
						<input type="text" class="form-control" value="{{isset($user->city)? $user->city : '' }}" name="city"/>
						<span class="text-danger">{{ $errors->first('address') }}</span>
					 </div>
					</div>
				   </div>

				   <div class="col-md-6">
					    <div class="form-group">
					  
					   <label class="col-sm-12 col-form-label">Country</label>
					    <div class="col-sm-12">
						<input type="text" class="form-control" value="{{isset($user->country)? $user->country : '' }}" name="country"/>
						<span class="text-danger">{{ $errors->first('pincode') }}</span>
					 </div>
					</div>
				   </div>
				</div>
			
					 
					

				
				
			
			
			
			
			
			
			  
			  
			  
			  
			  
			  <input type="hidden" name="user_id" value="{{$user->id}}" />
			<div class="card_footer"><button type="submit" class="btn btn-success mr-2">Submit</button></div>
			
		  </form>
		</div>
	  </div>
	</div>
</div>

@endsection

