@include('new_header')
<div class="">
	<div class="page-title tab">
		<div class="container page-title-container table-layout-fixed">
			<div class="page-title-col page-title-col-4">
				<a href="{{url('/checkout/step1')}}" class="checkout-steps-link is-disabled">
					<span class="checkout-steps-link-count">1</span>
					<span class="checkout-steps-link-text">Know Your Data</span>
				</a>
			</div>
			<div class="page-title-col page-title-col-4">
				<a href="#" class="checkout-steps-link is-disabled">
					<span class="checkout-steps-link-count">2</span>
					<span class="checkout-steps-link-text">Login &amp; Sign up</span>
				</a>
			</div>
			<div class="page-title-col page-title-col-4">
				<a href="{{url('/checkout/step3')}}" class="checkout-steps-link  is-active">
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
			<h3 class="primary-title clear-gap-vertical">MAKE YOUR PAYMENT</h3>
			<p></p>
			 @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif
                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
		         <a href="{{url('/payment')}}">	<img src="{{ asset('new-assets/images/new/paypal.png') }}" style="width: 39%"> </a>
			
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
                                @foreach($cart as $carts)

									<tr>
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