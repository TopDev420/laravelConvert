@include('header')
         <!-- ====================== ===========================================================
            ==================================Header end==================================
            ========================================================-->
         <div class="abt-banner" data-aos="flip-right">
            <img src="{{ asset('/sa-assets/images/abt-banner.jpg') }}" class="img-responsive">
            <div class="abt_txt">{{$pricing->name}}</div>
         </div>
         <!-- ====================== ===========================================================
            ==================================about banner end==================================
            ========================================================-->
         <div class="about-actuss text-center wow bounceInUp" >
             <p>{{$pricing->description}}</p>
         </div>
         <!-- ====================== ===========================================================
            ==================================about actuss end==================================
            ========================================================-->
        
		
		  <div class="questions contact_pg">
            <div class="container">
			
			  <h2>Send Us a Message</h2>
			  <div class="row">
			    <div class="col-sm-5 col-sm-offset-1 col-xs-12 col-xs-offset-0">
				  <div class="pricing-frame wow slideInLeft">
				    <h2 class="title">Monthly</h2>
					<div class="pricing_content ">
					{{$pricing->month_des}}
					</div>
					<div class="text-center">
					<div class="rate">${{$pricing->month_price}}</div>
					<button class="read_more" onclick="window.location.href='signup.html'">Signup >></button>
					</div>
				  </div>
				</div>
			    <div class="col-sm-5  col-xs-12">
				  <div class="pricing-frame wow slideInRight">
				    <h2 class="title">Yearly</h2>
					<div class="pricing_content">
					{{$pricing->year_desc}}
					</div>
					<div class="text-center">
					<div class="rate">${{$pricing->year_price}}</div>
					<button class="read_more" onclick="window.location.href='signup.html'">Signup >></button>
					</div>
				  </div>
				</div>
			  </div>
			  
			  
			  
		   </div>
		   
         </div>    
       
         <!-- ====================== ===========================================================
            ==================================questions end==================================
            ========================================================-->
      </div>
      <!-- Wrapper end-->
      <div class="signup text-center wow bounceInUp">
         <img src="{{ asset('/sa-assets/images/signup.jpg') }}" class="img-responsive" >
         <div class="signup-txt" >
            <div class="container">
               <h3>Sign Up Now to Get started!</h3>
               <button class="read_more wht" onclick="window.location.href='signup.html'">Learn More >></button>
            </div>
         </div>
      </div>
       @include('footer')