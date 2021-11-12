@include('new_header')
<style type="text/css">
	.form-soft .form-control{border-width: thin;}
</style>
<div class="">
	<div class="page-title tab">
		<div class="container page-title-container table-layout-fixed">
			<div class="page-title-col page-title-col-4">
				<a href="{{url('/checkout/step1')}}" class="checkout-steps-link ">
					<span class="checkout-steps-link-count">1</span>
					<span class="checkout-steps-link-text">Know Your Data</span>
				</a>
			</div>
			<div class="page-title-col page-title-col-4">
				<a href="#" class="checkout-steps-link is-active">
					<span class="checkout-steps-link-count">2</span>
					<span class="checkout-steps-link-text">Login &amp; Sign up</span>
				</a>
			</div>
			<div class="page-title-col page-title-col-4">
				<a href="#" class="checkout-steps-link  is-disabled">
					<span class="checkout-steps-link-count">3</span>
					<span class="checkout-steps-link-text">
						Payment &amp; Download
					</span>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
		<div class="col-md-8">
			<h3 class="primary-title clear-gap-vertical">Returning Customers</h3>
			<p>Welcome back! Please provide your email and password information to sign in.</p>
			<form class="form form-soft gap-bottom" accept-charset="UTF-8" role="form" action="{{url('/dologin')}}" method="post">	
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="gap-bottom" style="color: red;">
				</div>
				<div class="row">
					<input type="hidden" name="return_url" value="checkout/step3">
					<div class="col-sm-6 gap-bottom">
						<input class="form-control" placeholder="Email" name="email" type="email" required />
					</div>
					<div class="col-sm-6 gap-bottom">
						<input class="form-control" placeholder="Password" name="password" type="password" value="" required />
					</div>
					<div class="col-sm-6 inline-align-fix">
						<a href="/forgot-password" class="link-secondary font-xsmall link-underline">Password Recovery</a>
					</div>
					<div class="col-sm-6">
						<button type="submit" class="button button-primary full-width"  >Continue</button>						
					</div>
				</div>
			</form>
			<hr class="hr-large">
			<h3 class="primary-title clear-gap-bottom">New Customer? Signup</h3>
			<p>Sign up to register with us, please provide the following required information:</p>
			
				<form id="signup-form" class="form form-soft no-loading" action="{{ url('/checkoutsignup') }}" method="post" role="form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="text-alert gap-bottom-small hide" id="signup-form-errors"></div>
				<div class="row">
					<div class="col-md-6 gap-bottom">
						<input class="form-control" placeholder="First Name*" name="fname" type="text" value="{{old('fname')}}" />
						@if ($errors->has('fname'))<span class="text-danger">{{ $errors->first('fname') }}</span>@endif
					</div>
					<div class="col-md-6 gap-bottom">
						<input class="form-control" placeholder="Last Name*" name="lname" type="text" value="{{old('lname')}}" />
						@if ($errors->has('lname'))<span class="text-danger">{{ $errors->first('lname') }}</span>@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 gap-bottom">
						<input class="form-control" id="email" placeholder="Business Email*" name="email" type="email" value="{{old('email')}}" />
						@if ($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span>@endif

						@if (\Session::has('mail_error'))
						    <span class="text-danger">
						       {!! \Session::get('mail_error') !!}
						    </span>
						@endif
					</div>
					<div class="col-md-6 gap-bottom">
						<div class="phone-field">
							<input class="form-control mobile" placeholder="Mobile Number (Only Enter Digit)" name="phone" type="tel" value="{{old('phone')}}"  />
							@if ($errors->has('phone'))<span class="text-danger">{{ $errors->first('phone') }}</span>@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 gap-bottom">
						<div class="form-group">

                                <select class="form-control" name="cntry" id="exampleFormControlSelect1">
                                <option value="{{old('cntry')}}">Select Country*</option>
                                <?php
                                $country = DB::table('san_countries')->get(); 
                                foreach($country as $contry){
                                $id = $contry->id; 
                                ?>
                                <option value="<?php echo $contry->name; ?>"><?php echo $contry->name; ?></option>
                                <?php } ?> 
                                </select>
                              </div>
                               @if ($errors->has('cntry'))<span class="text-danger">{{ $errors->first('cntry') }}</span>@endif
					</div>
					<div class="col-md-6 gap-bottom">
						<input class="form-control" placeholder="Company Name" name="cname" type="text" value="{{old('cname')}}">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 gap-bottom">
						<input id="password" minlength="8" class="form-control"  title="Must contain at least  number and  uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password*" name="password" type="password" value="{{old('password')}}">
						@if ($errors->has('password'))<span class="text-danger">{{ $errors->first('password') }}</span>@endif
					</div>
					<div class="col-md-6 gap-bottom">
						<input minlength="8"  id="cpassword" class="form-control" placeholder="Confirm Password*" name="cpassword" type="password" value="{{old('cpassword')}}">

						@if ($errors->has('cpassword'))<span class="text-danger">{{ $errors->first('cpassword') }}</span>@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 font-small inline-align-fix">
						<div class="custom-checkbox custom-checkbox-secondary gap-right-small">
							<input class="custom-checkbox-inp" type="checkbox" id="cb1" name="terms" data-validetta="required" data-vd-parent-up="1" data-vd-message-required="You must accept Terms of Use and Privacy Policy to continue.">
							<label class="custom-checkbox-mask" for="cb1"></label>
						</div>
						<label class="align-middle" for="cb1">I’ve read and agreed</label>
						<a class="link-primary link-underline" href="/terms-of-use" target="_blank">Terms of Use</a> and
						<a class="link-primary link-underline" href="/privacy-policy" target="_blank">Privacy Policy</a>
					</div>
					<div class="col-md-6">
						<button type="submit" class="button button-primary full-width">Create My Account</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-4 cart-layout">
			<div id="cart" style="z-index: 1000;">
				<ul class="list list-tertiary shadow-primary gap-bottom-small">
					<li class="list-item">
						<h6 class="secondary-title font-xsmall">Your Cart</h6>
					</li>
					<li class="list-item list-tertiary-item-no-pad">
						<table class="table table-fixed table-quaternary cart-table">
							<tbody>
								@if(!empty($cart)) 
                                @foreach($cart as $key=>$carts)

									<tr>
										<Input type="hidden" name="arraykey" class="arraykey" value="{{$key}}">
										<td width="140" align="left">
											<span class="shopping-card-item-title font-xsmall">#{{isset($carts['savesearchid'])?$carts['savesearchid'] : ''}}</span>
											<span class="font-xsmall block text-primary"><span class="text-semibold">{{$carts['contacts']}}</span> Contacts</span>
											
										</td>
										<td align="right">
											<span class="shopping-card-item-price inline-block">
												$ {{$carts['price']}}
											</span>
										<button class="close-btn close-btn-small remove-cart-item gap-left align-top removeitemcart" data-id="{{$carts['original_save_id']}}" data-type="{{$types}}"></button>
										</td>
									</tr>

							    @endforeach    
	                            @endif	
								<tr class="cart-total">
									<td>
										<span class="shopping-card-item-title shopping-card-item-title-total">Total</span>
									</td>
									<td>
										<span class="shopping-card-item-price shopping-card-item-price-total">
										  $ <span class="totalammount">{{$totalsum}}</span>
										</span>
									</td>
								</tr>
                               
                                @if(isset($_COOKIE['coupon']) && !empty($_COOKIE['coupon']) )

                                @php $couponval = json_decode($_COOKIE['coupon'], true);@endphp

                                <tr>
									<td width="140" align="left">
										<span class="shopping-card-item-title font-xsmall">Discount Coupon</span>
										<span class="font-xsmall block text-primary">{{$couponval[0]['name']}}</span>
										
									</td>
									<td align="right">
										<span class="shopping-card-item-price shopping-card-item-price-total">
											- $ <span class="dicval">{{$couponval[0]['value']}}</span>
										</span>
										
									</td>
								</tr>

								<tr class="cart-total">
									<td>
										<span class="shopping-card-item-title shopping-card-item-title-total">Total</span>
									</td>
									<td>
										<span class="shopping-card-item-price shopping-card-item-price-total">
										  $ <span class="totalammount ctotalval">{{($totalsum-$couponval[0]['value'])}}</span>
										</span>
									</td>
								</tr>


                               
                                @else



                                @endif


							</tbody>
						</table>
					</li>
				</ul>
				
			</div><div></div>
		</div>
	</div>
</div>

@include('new_footer')