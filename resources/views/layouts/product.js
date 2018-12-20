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
       
    
        $('div .time').html('<input name="efvfv">');
                         

    });



