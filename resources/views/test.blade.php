


		
				<div class="col-xs-12 col-sm-9 product_right_sec">
					<div class="row">
						 @foreach($products as $product)
						<div class="col-xs-12 col-sm-4 prdct_box">

							<div class="wk_prdct_inner">
								<div class="wk_prdct_img">
									<img src="{{url('/')}}/public/assets/images/prdct2.png">
								</div>
								<div class="wk_prdct_text">
									<div class="hover_ul">
										<ul>
										@if(Auth::check())
										  <li><a href="{{url('/')}}/add-to-wishlist/{{$product->id}}">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/heart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/heart_white.png">
										  </a></li>
										  @endif
										  <li><a href="{{url('/')}}/product-detail/{{$product->slug}}">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/eye_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/eye_white.png">
										  </a></li>

										  <li><form method="post" action="{{url('/')}}/add-to-cart">
										  		{{csrf_field()}}
										  		<input type="hidden" name="id" value="{{$product->id}}">
										  		<input type="hidden" name="name" value="{{$product->name}}">
										  		<input type="hidden" name="qty" value="1">
										  		<input type="hidden" name="price" value="{{$product->price}}">
										  	<button type="submit">
										  	<img class="black_img" src="{{url('/')}}/public/assets/images/cart_black.png">
										  	<img class="white_img" src="{{url('/')}}/public/assets/images/cart_white.png">
										  </button>
										  	</form></li>

										</ul>
									</div>
									<h3><a href="#"> {{$product->name}}</a></h3>
									<h5><i class="fas fa-rupee-sign"></i> {{$product->price}}</h5>
								</div>
							</div>
							
						</div>
						 @endforeach
						
                        	</div>
				</div>
                    
					


				



