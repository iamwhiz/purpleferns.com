@extends('layouts.main')


@section('content')

   <!--  <section class="inner_banner">
   <img src="{{url('/')}}/public/assets/images/inner_banner.jpg">
   <div class="inner_banner_text">
	 <div class="container">
	   <div class="banner_text_inner">
	 	<h3>Premium Flowers</h3>
	 	<p>Nothing can be compared with the brilliance of flowers. The innocence, charm, elegance, and beauty are simply mesmerizing. Explore the best premium flowers here and mesmerize your loved ones.</p>
	  </div>
	  </div>
	</div>
</section> -->

<section class="inner_sec">
	<div class="container">
		<div class="inner_breadcums">
			<div class="inner_left">
				 {!! Breadcrumbs::render('profile') !!}
			</div>
			<!-- <div class="inner_right">
				  
				<ul>
				  <li><a href="#">Showing 60 gifts out of 125</a></li>	
				   <li><a href="#">Sort By</a></li>
				</ul>
			</div> -->
		</div>


		<div class="products_sec">
			<div class="row">
			@include('profile_sidebar')


		<div class="col-xs-12 col-sm-9 product_right_sec">
				  
		  <div class="profile_page">
		  	<div class="profile_banner">
		  		<img class="prfle_img" src="{{url('/')}}/public/assets/images/profile_banner.jpg">
		  	  <div class="profile_img">
		  	  	<div class="profile_img_box">
		  	  		<div class="profile_img_box_inner">
                 		<img src="{{url('/')}}/public/assets/images/profile/{{$user->profile_img}}" alt="{{Auth::user()->first_name}}">
                 	</div>
                     <div class="border-img">
                     	<form  action="{{url('/')}}/profile-img" method="post" enctype="multipart/form-data">
                     		{{csrf_field()}}
                     		<input type="file" name="profile_img" id="newAvatar" onchange="form.submit()" style="display:none;" />
                     		
                         
                        </form>
                      <img class="myAvatar" src="{{url('/')}}/public/assets/images/camera.png" style="cursor: pointer">
                     </div>
                 </div>
		  	  </div>
		  	</div>

		  <h1 class="heading">My Profile</h1>
         

          <div class="profile_form">
          	<form method="post" action="{{url('/')}}/profile" enctype="multipart/form-data">
          		{{csrf_field()}}
          	  <div class="row">
          	  	<div class="col-xs-12 col-sm-6 profile_input">
          	  		<label><span>*</span> First Name</label>
          	  		<input type="text" name="first_name" value="{{isset($user->first_name) ? $user->first_name : ''}}">
          	  	</div>

          	  	<div class="col-xs-12 col-sm-6 profile_input">
          	  		<label><span>*</span> Last Name</label>
          	  		<input type="text" name="last_name" value="{{isset($user->last_name) ? $user->last_name : ''}}">
          	  	</div>

          	  	<div class="col-xs-12 col-sm-6 profile_input">
          	  		<label><span>*</span> Mobile Number</label>
          	  		<input type="text" name="mobile" value="{{isset($user->mobile) ? $user->mobile : ''}}" placeholder="Mobile">
                  @if ($errors->has('mobile'))
                <span class="help-block">
                    <strong>{{ $errors->first('mobile') }}</strong>
                </span>
            @endif
          	  	</div>

          	  	<div class="col-xs-12 col-sm-6 profile_input">
          	  		<label><span>*</span> Gender</label>
          	  		<label class="wk_radio">Male
					  <input type="radio" name="gender" value="male" <?php echo($user->gender == 'male') ? "checked" : '';?> type="checkbox">
					  <span class="checkmark"></span>
					</label>

					<label class="wk_radio">Female
					  <input type="radio" name="gender" value="female"  <?php echo($user->gender == 'female') ? "checked" : '';?>  type="checkbox">
					  <span class="checkmark"></span>
					</label>
          	  	</div>

          	  	<div class="col-xs-12 col-sm-6 profile_input select_option">
          	  		<label> Date of Birth</label>
          	  	
				           
                <input type="text" name="dob" value="{{isset($user->dob)? $user->dob : '' }}" class="form-control" id='datepicker1' />
          	  	</div>

          	  	<div class="col-xs-12 col-sm-6 profile_input select_option">
          	  		<label> Date of Anniversary</label>
          	  	   <input type="text" name="date_of_anniversary" value="{{isset($user->date_of_anniversary)? $user->date_of_anniversary : '' }}" class="form-control" id='datepicker2' />
          	  	</div>

          	  	<div class="col-xs-12 col-sm-12 profile_input">
          	  		<label><span>*</span> Email Id</label>
          	  		<input type="email" name="email" value="{{isset($user->email) ? $user->email : ''}}" placeholder="Email" readonly>
          	  	</div>

          	  	<!-- <div class="col-xs-12 col-sm-6 profile_input">
          	  		<label><span>*</span>Password </label>
          	  		<input type="text">
          	  	</div> -->

          	  	<div class="col-xs-12 col-sm-6 profile_input">
          	  		<label> Pincode</label>
          	  		<input type="text" name="pincode" value="{{isset($user->pincode) ? $user->pincode : ''}}" placeholder="Pincode">
                  
          	  	</div>

          	  	<div class="col-xs-12 col-sm-6 profile_input">
          	  		<label> Address</label>
          	  		<input type="text" name="address" value="{{isset($user->address) ? $user->address : ''}}" placeholder="Address">
                  @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
          	  	</div>

          	  	<div class="col-xs-12 col-sm-6 profile_input">
          	  		<label> City</label>
          	  		<input type="text" name="city" value="{{isset($user->city) ? $user->city : ''}}" placeholder="City">
          	  	</div>


          	  	<div class="col-xs-12 col-sm-6 profile_input select_option_country">
          	  		<label> Country</label>
          	  		
          	  		<select name="country">
          	  			<option selected disable>Country</option>
					    <!-- <option value="Afghanistan">Afghanistan</option> -->
    <!-- <option value="Albania" >Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antartica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei Darussalam</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo</option>
    <option value="Congo">Congo, the Democratic Republic of the</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
    <option value="Croatia">Croatia (Hrvatska)</option>
    <option value="Cuba">Cuba</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czech Republic</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="East Timor">East Timor</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="France Metropolitan">France, Metropolitan</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option> -->
    <option value="India" <?php echo($user->country == 'India') ? "selected" : '';?>>India</option>
    <option value="Gabon" <?php echo($user->country == 'Gabon') ? "selected" : '';?>>Gabon</option>
    <option value="Gambia" <?php echo($user->country == 'Gambia') ? "selected" : '';?>>Gambia</option>
    <option value="Georgia" <?php echo($user->country == 'Georgia') ? "selected" : '';?>>Georgia</option>
    <option value="Germany" <?php echo($user->country == 'Germany') ? "selected" : '';?>>Germany</option>
    <option value="Ghana" <?php echo($user->country == 'Ghana') ? "selected" : '';?>>Ghana</option>
    <option value="Gibraltar" <?php echo($user->country == 'Gibraltar') ? "selected" : '';?>>Gibraltar</option>
    <option value="Greece" <?php echo($user->country == 'Greece') ? "selected" : '';?>>Greece</option>
    <option value="Greenland" <?php echo($user->country == 'Greenland') ? "selected" : '';?>>Greenland</option>
    <option value="Grenada" <?php echo($user->country == 'Grenada') ? "selected" : '';?>>Grenada</option>
    <option value="Guadeloupe" <?php echo($user->country == 'Guadeloupe') ? "selected" : '';?>>Guadeloupe</option>
    <option value="Guam" <?php echo($user->country == 'Guam') ? "selected" : '';?>>Guam</option>
    <option value="Guatemala"<?php echo($user->country == 'Guatemala') ? "selected" : '';?>>Guatemala</option>
    <option value="Guinea" <?php echo($user->country == 'Guinea') ? "selected" : '';?>>Guinea</option>
    <option value="Guinea-Bissau" <?php echo($user->country == 'Guinea-Bissau') ? "selected" : '';?>>Guinea-Bissau</option>
    <option value="Guyana" <?php echo($user->country == 'Guyana') ? "selected" : '';?>>Guyana</option>
    <option value="Haiti" <?php echo($user->country == 'Haiti') ? "selected" : '';?>>Haiti</option>
    <option value="Heard and McDonald Islands" <?php echo($user->country == 'Heard and McDonald Islands') ? "selected" : '';?>>Heard and Mc Donald Islands</option>
    <option value="Holy See" <?php echo($user->country == 'Holy See') ? "selected" : '';?>>Holy See (Vatican City State)</option>
    <option value="Honduras" <?php echo($user->country == 'Honduras') ? "selected" : '';?>>Honduras</option>
    <option value="Hong Kong" <?php echo($user->country == 'Hong Kong') ? "selected" : '';?>>Hong Kong</option>
    <option value="Hungary" <?php echo($user->country == 'Hungary') ? "selected" : '';?>>Hungary</option>
    <option value="Iceland" <?php echo($user->country == 'Iceland') ? "selected" : '';?>>Iceland</option>
    
    <option value="Indonesia" <?php echo($user->country == 'Indonesia') ? "selected" : '';?>>Indonesia</option>
    <option value="Iran" <?php echo($user->country == 'Iran') ? "selected" : '';?>>Iran (Islamic Republic of)</option>
    <!-- <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
    <option value="Korea">Korea, Republic of</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao">Lao People's Democratic Republic</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon" selected>Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macau">Macau</option>
    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia">Micronesia, Federated States of</option>
    <option value="Moldova">Moldova, Republic of</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn</option> -->
 <!--    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russia">Russian Federation</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
    <option value="Saint LUCIA">Saint LUCIA</option>
    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Slovakia">Slovakia (Slovak Republic)</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
    <option value="Span">Spain</option>
    <option value="SriLanka">Sri Lanka</option>
    <option value="St. Helena">St. Helena</option>
    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syria">Syrian Arab Republic</option>
    <option value="Taiwan">Taiwan, Province of China</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania">Tanzania, United Republic of</option>
    <option value="Thailand">Thailand</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos">Turks and Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Vietnam">Viet Nam</option>
    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Yugoslavia">Yugoslavia</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option> -->
					</select>
				</div>

          	  </div>

              <div class="form_btns">

              	<button type="submit"><a>Save</a></button>
              	<!-- <a href="#">Cancel</a> -->
              </div>

          	</form>
          </div>


		  </div>






		</div>
		</div>
	</div>
</section>

@endsection