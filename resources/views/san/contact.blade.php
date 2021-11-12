@include('header')
<?php //echo '<pre>';print_r($status);exit; ?>
         <!-- ====================== ===========================================================
            ==================================Header end==================================
            ========================================================-->
         <div class="abt-banner" data-aos="flip-right">
            <img src="{{ asset('/sa-assets/images/abt-banner.jpg') }}" class="img-responsive">
            <div class="abt_txt">{{$contactdata->name}}</div>
         </div>
         <!-- ====================== ===========================================================
            ==================================about banner end==================================
            ========================================================-->
         <div class="about-actuss text-center wow bounceInUp" >
             <p>{{$contactdata->description}}</p>
         </div>
         <!-- ====================== ===========================================================
            ==================================about actuss end==================================
            ========================================================-->
        
		
		  <div class="questions contact_pg">
         <div class="container">
        @if($status == 'add')
              <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                     <strong>Well done!</strong> Thankyou For Contacting Us.
                  </div>
          @endif
               
			  <form action="{{ url('/contactus/1') }}" method="post">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
			  <h2>Send Us a Message</h2>
			  <div class="row">
			    <div class="col-sm-6 wow bounceInLeft">
				 <div class="form-group">
				   <input type="text" class="form-control" placeholder="Full Name" name="name">
				 </div>
				  <div class="form-group">
				   <input type="text" class="form-control" placeholder="Email" name="email">
				 </div>
				  <div class="form-group">
				   <input type="text" class="form-control" placeholder="Phone" name="phone">
				 </div>
				</div>
				<div class="col-sm-6  wow bounceInRight">
				 <div class="form-group">
				   <textarea  class="form-control" placeholder="Message" name="message" rows="7"></textarea>
				 </div>
				</div>
			  
			  </div>
			  <div class="text-center wow bounceInDown">
			  <button type="submit" class="read_more">Send us >></button>
			  </div>
			  </form>
			  
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
               <button class="read_more wht">Sign up >></button>
            </div>
         </div>
      </div>
   @include('footer')