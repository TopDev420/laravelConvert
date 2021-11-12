@include('header')
         <!-- ====================== ===========================================================
            ==================================Header end==================================
            ========================================================-->
         <div class="abt-banner" data-aos="flip-right">
            <img src="{{ asset('/sa-assets/images/abt-banner.jpg') }}" class="img-responsive">
            <div class="abt_txt">Welcome</div>
         </div>
         <!-- ====================== ===========================================================
            ==================================about banner end==================================
            ========================================================-->
         <div class="about-actuss text-center wow bounceInUp" >
             
         </div>
         <!-- ====================== ===========================================================
            ==================================about actuss end==================================
            ========================================================-->
        
		
		  <div class="questions contact_pg">
            <div class="container">
            <form action="{{ url('/finalstep') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="userdetails" value="{{serialize($billingdetail)}}">
			 <div class="pricing-frame wow slideInLeft">
			 <div class="row">
			    <div class="col-sm-6 ">
				 
				  <div class="sign_ht">
				     <div class="heading text-center">Credit Card Info</div>
					<div class="form-group">
				   <input type="text" class="form-control" placeholder="Name" name="credit_name">
				   </div>
				   <div class="form-group">
				   <input type="text" class="form-control" placeholder="card Number" name="card_no">
				   </div>
				   <div class="form-group">
				   <input type="text" class="form-control" placeholder="Expiry date" name="expire_date">
				   </div>
				   <div class="form-group">
				   <input type="text" class="form-control" placeholder="CVC" name="cvc">
				   </div>
				   
				   </div>
					
				  </div>
				
			    <div class="col-sm-6 ">
					 <div class="sign_ht">
				     <div class="heading text-center">Billing Address</div>
					<div class="form-group">
				   <input type="text" class="form-control" placeholder="Name" name="billing_name">
				   </div>
				   <div class="form-group">
				   <input type="text" class="form-control" placeholder="Adress" name="billing_address">
				   </div>
				   <div class="form-group">
				   <select  class="form-control" placeholder="Country" id="san_country" name="country">
				   <option value="" selected="selected">Country</option>
				   @foreach($countries as $country)
                        @if($country->id)
                           <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endif
                     @endforeach
				   </select>
				   
				   </div>
				   <div class="form-group">
				    <select  class="form-control" placeholder="State" id="san_state" rel="select2" name="state">
				   <option value="" selected="selected">Select State..</option>
				   </select>
				   </div>
				    <div class="form-group">
				   <select  class="form-control" placeholder="City" id="san_city" rel="select2" name="city">
				   <option value="" selected="selected">Select City..</option>
				  
				   </select>
				   </div>
               <div class="form-group">
                  <input type="text" class="form-control" placeholder="Zipcode" name="zipcode">
               </div>
				   </div>
					
				  
				</div>
				</div>
				<div class="text-center">
					<button class="read_more text-capt">Submit  <span>>></span></button>
					</div>
			  </div>
			  </form>
			</div>
		 </div>    
      @include('footer')