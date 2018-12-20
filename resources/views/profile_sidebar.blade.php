	<div class="col-xs-12 col-sm-3 product_sidebar">
					<div class="product_sidebar_inner">
						<h3>Profile</h3>
						<ul>
						  <li><a href="#">My Profile </a><span><img src="{{url('/')}}/public/assets/images/arrow_down.png"></span>
						  	<ul>
						  		<li><a href="{{ route('profile') }}">Edit Profile</a></li>
						  		<!-- <li><a href="{{ route('password.request') }}">Change Password</a></li> -->
						  	</ul>
						  </li>
						  <li><a href="{{url('/')}}/my-order">My Orders</a><span></span>
						  <!-- <ul>
						  		<li><a href="#">My Orders</a></li>
						  		<li><a href="#">Dummy</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul> -->
						  </li>
						  <!-- <li><a href="#">Gift Coupens</a><span><img src="{{url('/')}}/public/assets/images/arrow_down.png"></span>
						  	<ul>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul>
						  </li> -->
						  <li><a href="{{url('/')}}/wishlist">Wishlist<span class="badge badge-success">{{Wishlist::count(Auth::user()->id)}}</span></a>
						  	
						  </li>
						 <!--  <li><a href="#">Reminders</a><span><img src="{{url('/')}}/public/assets/images/arrow_down.png"></span>
						  	<ul>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul>

						  </li> -->
						 <!--  <li><a href="#">Special Flowers</a><span><img src="{{url('/')}}/public/assets/images/arrow_down.png"></span>
						  <ul>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  		<li><a href="#">Dummy Tag</a></li>
						  	</ul>
						  </li> -->
						  <li>
						  	 <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
						  </li>
						</ul>
					</div>
				</div>