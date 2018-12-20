
$(document).ready(function() {


   $(".check_variation").click(function() {
		if($(this).val() == 'variable'){
			$(".imm_variant").show();			
		}else{
			$(".imm_variant").hide();
		}
	
    });



   var max_attribute      = 1000; //maximum input boxes allowed
	var wrapper1   		= $(".imm_variant"); //Fields wrapper
	var add_attribute_button      = $(".add_attribute_button");
	
	var y = 0; //initlal text box count
	$(add_attribute_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(y < max_attribute){ //max input box allowed
			y++; //text box increment
			// <div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>
			$(wrapper1).append('<div class="col-md-12"><div class="form-group row"><label class="col-sm-3 col-form-label">Weight'+y+'</label><div class="col-sm-6"><input type="text"  class="form-control" value="" name="price" placeholder="Price" /></div><div class="col-sm-3"><i class="fa fa-minus-circle fa-lg remove_attribute"></i></div></div></div>'); //add input box
		}
	});

		$(wrapper1).on("click",".remove_attribute", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').parent('div').parent('div').remove(); y--;
	});



		
    });


