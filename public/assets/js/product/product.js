$('.quantity-wrapper').on('click' , '.sub',  function(){
            if(parseInt($('.quantity-count').val()) !== 1){
                var new_quantity =  parseInt($('.quantity-count').val())-1;
                $('.quantity-count').val(new_quantity);
                updatecart($(this));                
               }       
        });    

        $('.quantity-wrapper').on('click' , '.add',  function(){
            var new_quantity =  parseInt($('.quantity-count').val())+1;
            $('.quantity-count').val(new_quantity);
            updatecart($(this));            
        });


          function updatecart($this){
             var new_quantity = ($('.quantity-count')).val();
            var per_unit_price =$this.closest('ul').attr('product-price');            
            var new_per_unit_price =  parseInt(new_quantity) * parseInt(per_unit_price);
            $this.closest('ul').find('.t-p').text(new_per_unit_price);
            // var rowId =$this.closest('ul').attr('rowid'); 
            
            // var token = '<?php echo csrf_token(); ?>';
            //  var base = "{{url('/')}}";
            //  var datatopost = { _token : token , rowId : rowId , qty : new_quantity};    
            //  var url = base + '/update-cart';
            //   commonajax(datatopost,url,[]);
          
           
     } 


   function commonajax(datatopost,url,$this){
                $.ajax({
                                url: url,
                                type: "post",
                                data: datatopost,
                                beforeSend: function() {
                                    //console.log("Beforsend")
                                },
                                complete: function(){
                                    console.log("complete")
                                },
                                success: function(data){

                                  }  
            });

    }



    
    $('#city').on('change',function(){
    
        var data = $(this).val();
       
        if(data == 'Ajmer'){
             $('#ajmer').show();
            $('#aligarh').hide();
              $('#delhi').hide();
        }
        else if(data == 'Delhi'){
             $('#delhi').show();
             $('#ajmer').hide();
               $('#aligarh').hide();
        }
        else if(data == 'Aligarh'){
             $('#aligarh').show();
              $('#delhi').hide();
              $('#ajmer').hide();


        }


       
      });


    $('.standard').click(function(){
       
    
        $('div .time').html('<select id="del_time" name="delivery_time"><option value="10:00 - 14:00">10:00 - 14:00 hrs</option><option value="14:00 - 18:00">14:00 - 18:00 hrs</option><option value="18:00 - 22:00">18:00 - 22:00 hrs</option></select>');
        $('.div_type').html('Standart Delivery');             

    });


    $('.fixed').click(function(){
       
         
        $('div .time').html('<select id="del_time" name="delivery_time"><option value="11:00 - 12:00">11:00 - 12:00 hrs</option><option value="12:00 - 13:00">12:00 - 13:00 hrs</option><option value="14:00 - 15:00">14:00 - 15:00 hrs</option></select>');
        $('.div_type').html('Fixed Delivery');  
                      

    });
     $('.mid_nit').click(function(){
       
    
        $('div .time').html('<select id="del_time" name="delivery_time"><option value="23:00 - 23:59">23:00 - 23:59 hrs</option>');
         $('.div_type').html('Mid-Night Delivery');                  

    });
	
   $('div#del_time').on('change',function(){
       alert();
           var time =  $(this).val();
		   
        $('.div_time').html(time);
                          

    });

    
     $("#radioId input:radio:not(:disabled):first-child").attr("checked", true);
       
       $('.checked_variant').on('click',function(){
         
               var rs = ($(this).data('rs'));
               var data = ($(this).val());
               $('.product_rs').html(rs);
               $('.product_rupees').val(rs);
               $('.product_weight').val(data);
                
                  
                 });

	
	
	
	
	 



