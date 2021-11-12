@include('new_header')

<div class="">
        <div class="page-title tab">
            <div class="container page-title-container table-layout-fixed">
                <div class="page-title-col page-title-col-4">
                    <a href="/checkout/step1" class="checkout-steps-link is-active">
                        <span class="checkout-steps-link-count">1</span>
                        <span class="checkout-steps-link-text">Know Your Data</span>
                    </a>
                </div>
                <div class="page-title-col page-title-col-4">
                    <a href="/checkout/step2" class="checkout-steps-link  is-disabled">
                        <span class="checkout-steps-link-count">2</span>
                        <span class="checkout-steps-link-text">Login &amp; Sign up</span>
                    </a>
                </div>
                <div class="page-title-col page-title-col-4">
                    <a href="/checkout/step3" class="checkout-steps-link  ">
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
                <div class="statistics">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="clear-gap-bottom">Order Number #{{$updateorderno}}</h2>
                            <span class="font-xsmall gap-bottom-small text-muted inline-block">
                                Last Update: 07/04/2020
                            </span>
                        </div>
                        <div class="col-md-4 text-right">
                        </div>
                    </div>
                    <hr class="hr-line">
                    <section class="statistics-item statistics-count">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="statistics-count-number">{{$totalContactFirst}}</span>
                                <span class="text-uppercase font-xsmall">Total Email Contacts</span>
                            </div>
                        </div>
                    </section>
                    <hr class="hr-line">
                    <section class="statistics-item statistics-filters">
                        <h3 class="text-uppercase gap-bottom h5">Your Selection of Criterias</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tags">
                                    <span class="tag">
                                        Country: United States (include)
                                    </span>
                                    <span class="tag">
                                        Job Level: C-Level (include)
                                    </span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <hr class="hr-line">
                    <section class="statistics-item statistics-filters">
                        <h3 class="text-uppercase gap-bottom h5">Structure of Your Perfect Data</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="statistics-header">Direct Email Address</span>
                                <span class="statistics-header">First Name</span>
                                <span class="statistics-header">Last Name</span>
                                <span class="statistics-header">Job Level</span>
                                <span class="statistics-header">Job Title</span>
                                <span class="statistics-header">Job Function</span>
                                <span class="statistics-header">Company Name</span>
                                <span class="statistics-header">Major Division Description</span>
                                <span class="statistics-header">SIC2 Code</span>
                                <span class="statistics-header">SIC2 Description</span>
                                <span class="statistics-header">SIC4 Code</span>
                                <span class="statistics-header">SIC4 Description</span>
                                <span class="statistics-header">Postal Address</span>
                                <span class="statistics-header">BYD Industries</span>
                            </div>
                            <div class="col-md-6">
                                <span class="statistics-header">City</span>
                                <span class="statistics-header">State</span>
                                <span class="statistics-header">Zipcode</span>
                                <span class="statistics-header">Employee</span>
                                <span class="statistics-header">Revenue</span>
                                <span class="statistics-header">Area Code</span>
                                <span class="statistics-header">County</span>
                                <span class="statistics-header">Country</span>
                                <span class="statistics-header">Founded</span>
                                <span class="statistics-header">Type</span>
                                <span class="statistics-header">Phone Number</span>
                                <span class="statistics-header">Fax Number</span>
                                <span class="statistics-header">Website</span>
                            </div>
                        </div>
                    </section>
                    <hr class="hr-line">
                    <section class="statistics-item statistics-ratio">
                        <h3 class="text-uppercase gap-bottom h5">Some Statistics</h3>
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <div class="statistics-ratio-pie-chart" >
                                    <div class="statistics-ratio-pie-chart-container">
                                        <span class="statistics-ratio-pie-chart-number">100%</span>
                                        <span class="text-uppercase font-xsmall">Email Address</span>
                                    </div>
                                    <canvas height="160" width="160"></canvas>
                                </div>
                                <span class="text-uppercase font-xsmall">Email Address</span>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="statistics-ratio-pie-chart">
                                    <div class="statistics-ratio-pie-chart-container">
                                        <span class="statistics-ratio-pie-chart-number">100%</span>
                                        <span class="text-uppercase font-xsmall">Company</span>
                                    </div>
                                    <canvas height="160" width="160"></canvas>
                                </div>
                                <span class="text-uppercase font-xsmall">Company</span>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="statistics-ratio-pie-chart">
                                    <div class="statistics-ratio-pie-chart-container">
                                        <span class="statistics-ratio-pie-chart-number">100%</span>
                                        <span class="text-uppercase font-xsmall">Job Level</span>
                                    </div>
                                    <canvas height="160" width="160"></canvas>
                                </div>
                                <span class="text-uppercase font-xsmall">Job Level</span>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="statistics-ratio-pie-chart">
                                    <div class="statistics-ratio-pie-chart-container">
                                        <span class="statistics-ratio-pie-chart-number">100%</span>
                                        <span class="text-uppercase font-xsmall">Job Function</span>
                                    </div>
                                    <canvas height="160" width="160"></canvas>
                                </div>
                                <span class="text-uppercase font-xsmall">Job Function</span>
                            </div>
                        </div>
                    </section>
                    <hr class="hr-line">
                    <section class="statistics-item statistics-pie-chart">
                        <h3 class="text-uppercase gap-bottom h5">Top Countries</h3>
                        <div class="row">
                            <div class="col-md-9">
                                <canvas class="pie-chart"></canvas>
                            </div>
                            <div class="col-md-3 legend">
                                <ul class="pie-legend">
                                    <li><span style="background-color:#eb3d32"></span>United States</li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <hr class="hr-line">
                    <section class="statistics-item statistics-bar-chart">
                        <h3 class="text-uppercase gap-bottom h5">Top States</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <canvas class="bar-chart"></canvas>
                            </div>
                        </div>
                    </section>
                    <hr class="hr-line">
                    <section class="statistics-item statistics-bar-chart">
                        <h3 class="text-uppercase gap-bottom h5">Top Cities</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <canvas class="bar-chart"></canvas>
                            </div>
                        </div>
                    </section>
                    <hr class="hr-line">
                    <section class="statistics-item statistics-bar-chart">
                        <h3 class="text-uppercase gap-bottom h5">Top Job Departments</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <canvas class="bar-chart"></canvas>
                            </div>
                        </div>
                    </section>
                </div>
                
                
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
		                                            <span class="font-xsmall block text-primary"><span
		                                                    class="text-semibold">{{$carts['contacts']}}</span> Contacts</span>
                                                              @if(isset($carts['single_set_name'])) {{$carts['single_set_name']}} @endif

		                                        </td>
		                                        <td align="right">
		                                            <span class="shopping-card-item-price inline-block">
		                                                $ {{$carts['price']}}
		                                            </span>
		                                            <button
		                                                class="close-btn close-btn-small remove-cart-item gap-left align-top removeitemcart"
		                                                data-id="{{$carts['original_save_id']}}" data-type="{{$types}}"></button>
		                                        </td>
		                                    </tr>
		                                @endforeach    
	                                @endif

                                    <tr class="cart-total g">
                                        <td>
                                            <span
                                                class="shopping-card-item-title shopping-card-item-title-total">Total</span>
                                        </td>
                                        <td>
                                            <span class="shopping-card-item-price shopping-card-item-price-total ">
                                                $ <span class="totalammount">{{$totalsum}}</span>
                                            </span>
                                        </td>
                                    </tr>

                                    
                                    <tr class="addcoupon">
                                        
                                    </tr>

                                    <tr class="totalwithcoupon">
                                        
                                    </tr>


                                </tbody>
                            </table>
                        </li>
                    </ul>

                    @if($currentid !='')
	                    <a class="button button-primary full-width" href="{{url('/checkout/step3')}}">
	                        Continue To Checkout L
	                    </a>
	                @else

	                    <a class="button button-primary full-width" href="{{url('/checkout/step2')}}">
	                        Continue To Checkout NL
	                    </a>
	                

	                @endif    

                    <div class="discount-code-link ggg">Enter a discount code</div>
                    <div class="row hide">
                       
                            <div class="col-xs-8">
                                <input type="text" class="form-control coupon" placeholder="Discount Code" name="coupon" >
                            </div>

                            <div class="col-xs-4">
                                <button class="button button-primary full-width applycoupon">Apply</button>
                            </div>

                            <span class="hs-error-msg" style="font-size: 14px;color: #fd000d;font-weight: 700;"></span>
                        
                    </div>
                </div>
                <div></div>
            </div>
        </div>
    </div>

@include('new_footer')