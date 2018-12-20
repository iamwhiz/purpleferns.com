<div class="col-xs-12 col-sm-3 product_sidebar">
					<div class="product_sidebar_inner">
						<h3>Categories</h3>
				<ul>

					
						  <?php 
$ii = 0;
						  foreach($side_cat as $cattype => $s_cat) { ?>
                    
                                <?php
                              if($cattype != '0' || $cattype != ''){ ?>
                                 
                      <li class="wh_active"><a href="javascript:void()"><?php echo ucfirst(str_replace("-"," ",$cattype)); ?> </a><span <?php if($ii == 0){ echo 'class="active"';} ?> ><img src="{{url('/')}}/assets/images/arrow_down.png"></span>
						<ul  <?php if($ii == 0){ echo 'style="display: block;"';} ?>>

                            <?php
						  		 foreach($s_cat as $s) { 
						  		  if($s['cat_parent'] == 2) {
						  	      ?>
                               
						  		<li><a href="{{url('/')}}/plants/<?php echo $s['cat_slug']; ?>"><?php echo $s['cat_name']; ?></a></li>
						  		 <?php } 
						  		 	elseif($s['cat_parent'] == 1){
						  		  ?>
						  	       <li><a href="{{url('/')}}/flowers/<?php echo $s['cat_slug']; ?>"><?php echo $s['cat_name']; ?></a></li>
						  	       <?php } 
						  		 	elseif($s['cat_parent'] == 3) {
						  		  ?>
						  		   <li><a href="{{url('/')}}/cakes/<?php echo $s['cat_slug']; ?>"><?php echo $s['cat_name']; ?></a></li>
						  		    <?php } 
						  		 	elseif($s['cat_parent'] == 5) {
						  		  ?>
						  		  <li><a href="{{url('/')}}/gifts/<?php echo $s['cat_slug']; ?>"><?php echo $s['cat_name']; ?></a></li>
						  		<?php }} ?>
						  	</ul>
						  		
						  </li>
					
                        
				
                             
						  	<?php 


						  } 
						  	
						  	  else {
                                 ?>
                           
                               <li class="wh_active"><a href="javascript:void()"><?php echo ucfirst('Uncategorized') ?> </a><span><img src="{{url('/')}}/assets/images/arrow_down.png"></span>
                               	<ul>
                               <?php
                                  foreach($s_cat as $s) { 
						  		  if($s['cat_parent'] == 2) {
						  	      ?>
                             
						  		<li><a href="{{url('/')}}/plants/<?php echo $s['cat_slug']; ?>"><?php echo $s['cat_name']; ?></a></li>
						  		 <?php } 
						  		 	elseif($s['cat_parent'] == 1){
						  		  ?>
						  	       <li><a href="{{url('/')}}/flowers/<?php echo $s['cat_slug']; ?>"><?php echo $s['cat_name']; ?></a></li>
						  	       <?php } 
						  		 	elseif($s['cat_parent'] == 3) {
						  		  ?>
						  		   <li><a href="{{url('/')}}/cakes/<?php echo $s['cat_slug']; ?>"><?php echo $s['cat_name']; ?></a></li>
						  		    <?php } 
						  		 	elseif($s['cat_parent'] == 5) {
						  		  ?>
						  		  <li><a href="{{url('/')}}/gifts/<?php echo $s['cat_slug']; ?>"><?php echo $s['cat_name']; ?></a>
                                <?php }} ?>
                                    </li>
						  		</ul>
                                <?php


                            }
                                 $ii++;
                            } 

                                 ?>
                          
                      </ul>
                  
						  
					</div>

					<!-- <div class="sidebar_add">
						<img src="{{url('/')}}/assets/images/mothersday.png">
					</div> -->
				</div>

