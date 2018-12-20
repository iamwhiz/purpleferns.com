@extends('admin.layouts.app')
@section('title', 'Add Product')
@section('content')

<div class="row">
<div class="col-12 grid-margin">
	  <div class="card">
	   <h4 class="card-title">{{$title}}</h4>
		<div class="card-body">
		  <form class="form-sample" id="addProduct" action="{{ url('/admin',$type) }}" method="post" enctype="multipart/form-data">
		  <div class="card-body_inner">
		   <input type="hidden" class="form-control"  min="0" name="sale_price" id="sale_price"/>
		   <input type="hidden" class="form-control" min="0" name="type" id="type" value="{{ $product_type }}"/>
		   <input type="hidden" class="form-control" min="0" name="sort" id="sort" value="1"/>
		  {{ csrf_field() }}
			
			
			<div class="col-sm-8 col-xs-12 left_content padding_left_0">
			
			
			<div class="row">
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Product Name</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" name="product_name" id="product_name" />
				  </div>
				</div>
			  </div>
			</div>
			  @if($type != 'add-cake')
			<div class="row">
			  <div class="col-md-6">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Price</label>
				  <div class="col-sm-12">
					<input type="number" class="form-control"  min="0" name="price"  id="price" />
				  </div>
				</div>
			  </div>
			  <div class="col-md-3">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Weight</label>
				  <div class="col-sm-12">
					<input type="number" class="form-control"  min="0" name="weight" id="weight"/>
				  </div>
				</div>
			  </div>
			  <div class="col-md-3">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Type</label>
				  <div class="col-sm-12">
					<select name="weight_type" class="form-control">
						<option value="Kg">Kg</option>
						<option value="Gms">Gms</option>
						<option value="Piece">Piece</option>
					</select>
				  </div>
				</div>
			  </div>
			  
			</div>
            @else
			<fieldset>
			 <legend>Variables</legend> 
			 
			  <div class="imm_variant"><div class="col-md-12"><div class="form-group row"><label class="col-sm-3 col-form-label">Weight</label><div class="col-sm-6"><input type="text"  class="form-control" value="" name="price" placeholder="Price" /></div><div class="col-sm-3"><i class="fa fa-plus-circle fa-lg  add_attribute_button"></i></div></div></div></div>
			</fieldset>
			@endif
			<div class="row">
				
			    <div class="col-md-12">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Manage Stock</label>
				  <div class="col-sm-2 pull-left">
					<div class="form-radio">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input imm_stock" name="manage_stock"  value="yes" > Yes
					  </label>
					</div>
				  </div>
				  <div class="col-sm-2 pull-left">
					<div class="form-radio">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input imm_stock" name="manage_stock" checked value="no"> No
					  </label>
					</div>
				  </div>
				</div>
				<div class="form-group imm_stock_qty" style="display:none">
					<label class="col-sm-12 col-form-label">Stock Qty</label>
					<div class="col-sm-12">
						<input type="number" class="form-control" name="stock_qty" min="1"  value="" >
					</div>
				 
				  
				</div>
			  </div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					  <label class="col-sm-12 col-form-label">Product Description</label>
					  <div class="col-sm-12">
						<textarea class="form-control" name="product_description"/></textarea>
					  </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					  <label class="col-sm-12 col-form-label">Care Instruction</label>
					  <div class="col-sm-12">
						<textarea class="form-control" name="care_instruction"/></textarea>
					  </div>
					</div>
				</div>
			</div>
			<div class="row">
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
			</div>
			
         
			
			
                 
			    



             
			<fieldset>
			 <legend> Product Images</legend> 
			 <p class="card-description immi_add_img"> <button class="add_field_button">Add Image</button></p>
			
			<div class=" imm_image_list">
				<div class="col-md-12"><div class="form-group row"><label class="col-sm-3 col-form-label">Main Image</label><div class="col-sm-6"> <input type="file" class="form-control" name="main_image"/></div><div class="col-sm-3"></div></div></div>
			</div>
			</fieldset>
			
			<fieldset>
			 <legend> SEO</legend> 
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">SEO Keywords</label>
				  <div class="col-sm-12">
					<input type="text" class="form-control" name="seo_keywords"/>
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
			  
			  <div class="col-sm-4 col-xs-12 immi_sel_cat padding_right_0">
				<div class="row">
				<div class="form-group">
				  <label class="col-sm-12 col-form-label">Categories</label>
				  <div class="col-sm-12">
					<select class="form-control"  name="categories[]" multiple>
					<?php 
					foreach($categories as $cattype => $category){
						?>
						<optgroup label="<?php if($cattype != '0' || $cattype != ''){ echo strtoupper(str_replace("-"," ",$cattype)); }else{ echo 'Uncategorized'; } ?>">
						<?php
							foreach($category as $catdata){
								?>
								<option value="<?php echo $catdata['id']; ?>"><?php echo $catdata['cat_name']; ?></option>
								<?php
							}
						?>
						</optgroup>
						<?php
					}
					?>
					</select>
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

	$('.select_att').change(function() {

    var value = $(this).val();

    $(this).siblings('select').children('option').each(function() {
        if ( $(this).val() === value ) {
            $(this).attr('disabled', true).siblings().removeAttr('disabled');   
        }
    });

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