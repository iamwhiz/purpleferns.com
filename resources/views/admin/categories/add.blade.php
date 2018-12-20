@extends('admin.layouts.app')
@section('title', 'Add Category')
@section('content')

<div class="row">
<div class="col-12 grid-margin">
	  <div class="card">
	   <h4 class="card-title">{{$title}}</h4>
	  
		<div class="card-body">
		  <form class="form-sample" id="addProduct" action="{{ url('/admin',$type) }}" method="post" enctype="multipart/form-data">
		  <div class="card-body_inner">
		   <input type="hidden" class="form-control" min="0" name="type" id="type" value="{{ $main_type }}"/>
		  {{ csrf_field() }}
			
			
			<div class="col-sm-12 col-xs-12 left_content padding_left_0">
			
			
			<div class="row">
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Category Name</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" name="cat_name" id="cat_name" />
				  </div>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-md-4">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Show Under Type</label>
				  <div class="col-sm-12">
						<select class="form-control" name="cat_type" >
							@if($main_type == 1)
							<option value="types">By Types</option>
							<option value="flower-combo">Flower Combo</option>
							@elseif($main_type == 2)
							<option value="types">By Types</option>
						    @elseif($main_type == 3)
						    <option value="types">By Types</option>
							<option value="flavour">By Flavour</option>
							<option value="occasion">By Occasion</option>
							@elseif($main_type == 5)
							<option value="personalized-gifts">Personalized Gifts</option>
							<option value="special-gifts">Special Gifts</option>
							<option value="by-recipients">By Recipients</option>
							@endif

						</select>
				  </div>
				</div>
			  </div>
			  <div class="col-md-4">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Show Menu</label>
				  <div class="col-sm-4 pull-left">
					<div class="form-radio">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input" name="show_in_menu" checked value="1" > Yes
					  </label>
					</div>
				  </div>
				  <div class="col-sm-4 pull-left">
					<div class="form-radio">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input" name="show_in_menu" value="0"> No
					  </label>
					</div>
				  </div>
				</div>
			  </div>

			   <div class="col-md-4">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Show on Home</label>
				  <div class="col-sm-4 pull-left">
					<div class="form-radio">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input" name="show_on_home" checked value="1" > Yes
					  </label>
					</div>
				  </div>
				  <div class="col-sm-4 pull-left">
					<div class="form-radio">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input" name="show_on_home" value="0"> No
					  </label>
					</div>
				  </div>
				</div>
			  </div>
			  
			</div>
	
			
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					  <label class="col-sm-12 col-form-label">Description</label>
					  <div class="col-sm-12">
						<textarea class="form-control" name="description"/></textarea>
					  </div> 
					</div>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-6">
					<div class="form-group">
					  <label class="col-sm-12 col-form-label">Tags</label>
					  <div class="col-sm-12">
						<input type="text" class="form-control" name="tags"/>
					  </div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					  <label class="col-sm-12 col-form-label">Status</label>
					  <div class="col-sm-12">
						<select class="form-control" name="product_status" >
							<option value="0">Draft</option>
							<option value="1">Publish</option>									
						</select>
					  </div>
					</div>
				</div>
			</div> -->
			
			<fieldset>
				<legend>Category Images</legend> 
				<div class=" imm_image_list">
					<div class="col-md-12">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Banner Image</label>
							<div class="col-sm-6"><input type="file" class="form-control" name="banner_image"/></div>
							<div class="col-sm-3"></div>
						</div>
					</div>
				</div>
				<div class=" imm_image_list">
					<div class="col-md-12">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label"> Image</label>
							<div class="col-sm-6"><input type="file" class="form-control" name="cat_image"/></div>
							<div class="col-sm-3"></div>
						</div>
					</div>
				</div>
			</fieldset>
			
			<fieldset>
			 <legend> SEO</legend> 
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">SEO Keywords</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" name="keywords"/>
				  </div>
				</div>
			  </div>
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">SEO Description</label>
				  <div class="col-sm-12">
					<textarea class="form-control" name="seo_description"/></textarea>
				  </div>
				</div>
			  </div>
			  </fieldset>
			  </div>
			  
			 
			  
			  
			  </div>
			<div class="card_footer"><button type="submit" class="btn btn-success mr-2">Submit</button></div>
			
		  </form>
		</div>
	  </div>
	</div>
</div>

@endsection

@section('custom-js')
<script>
$(document).ready(function() {
	$(".imm_stock").click(function() {
		if($(this).val() == 'no'){
			$(".imm_stock_qty").hide();			
		}else{
			$(".imm_stock_qty").show();
		}
		debugger;
    });

	CKEDITOR.replace( 'product_description' );
	CKEDITOR.replace( 'care_instruction' );
		
		
	var max_fields      = 1000; //maximum input boxes allowed
	var wrapper   		= $(".imm_image_list"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 0; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			// <div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>
			$(wrapper).append('<div class="col-md-12"><div class="form-group row"><label class="col-sm-3 col-form-label">Image '+x+'</label><div class="col-sm-6"> <input type="file" class="form-control" name="product_images[]"/></div><div class="col-sm-3"> <a href="#" class="remove_field">Remove</a></div></div></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').parent('div').parent('div').remove(); x--;
	});
	
	
	// validate signup form on keyup and submit
	$("#addProduct").validate({
		rules: {
			product_name: "required",
			// price: { graterThanEqual: "#sale_price" },
			sale_price: { lessThanEqual: "#price" },
			
		},
		messages: {
			product_name: "Please enter your product name"
		}
	});

	$.validator.addMethod('lessThanEqual', function(value, element, param) {
		if (this.optional(element)) return true;
		var i = parseInt(value);
		var j = parseInt($(param).val());
		return i <= j;
	}, "Sale price must be less than price");

	$.validator.addMethod('graterThanEqual', function(value, element, param) {
		if (this.optional(element)) return true;
		var i = parseInt(value);
		var j = parseInt($(param).val());
		return i >= j;
	}, "Price must be grater than sale price");
		
} );
</script>
@endsection