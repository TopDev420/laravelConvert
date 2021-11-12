@include('header')
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
            @if($status == 'add')
              <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                     <strong>Well done!</strong> Signed Up Successfully.
                  </div>
          @endif
			 <div class="row">
			    <div class="col-sm-6  ">
			    <form action="{{ url('/login') }}" method="post">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="pricing-frame wow slideInLeft">
				  <div class="sign_ht">
				    <h2>Login</h2>
					<div class="form-group">
				   <input type="text" class="form-control" placeholder="Email" name="email">
				   </div>
				   <div class="form-group">
				   <input type="password" class="form-control" placeholder="Password" name="password">
				   </div>
				   <a href="{{ url('/password/reset') }}" class="f_pswd">Forgot Password</a>
				   </div>
					<div class="text-center">
					
					<button type="submit" class="read_more text-capt">Login >></button>
					
					</div>
				  </div>
				  </form>
				</div>
			    <div class="col-sm-6 ">
			    <form action="{{ url('/dosignup') }}" method="post">
				  <div class="pricing-frame wow slideInRight"> 
				   <input type="hidden" name="_token" value="{{ csrf_token() }}">
				   <input type="hidden" name="role" value="2">
					 <div class="sign_ht">
				     <h2>Signup</h2>
				    <div class="form-group">
				     <ul class="list-inline">
				         <li> <span style="float: left;padding: 5px;">Monthly</span>
				              <input name="mem_type" style="display: block;" value="month" type="radio"> </li>
				              
				                   <li>    <span style="float: left;padding: 5px;">Yearly</span>    <input name="mem_type" style="display: block;" value="year" type="radio"> </li>
				                   
				    </ul>
                   </div>
					<div class="form-group">
				   <input type="text" class="form-control" placeholder="Company Name" name="comp_name">
				   </div>
				   <div class="form-group">
				   <input type="text" class="form-control" placeholder="Full Name" name="name">
				   </div>
				   <div class="form-group">
				   <input type="text" class="form-control" placeholder="Email" name="email">
				   </div>
				   <div class="form-group">
				   <input type="password" class="form-control" placeholder="Password" name="pswd">
				   </div>
				    <div class="form-group">
				   <input type="password" class="form-control" placeholder="Re-type Password" name="r_pswd">
				   </div>
				   </div>
					<div class="text-center">
					
					<button class="read_more text-capt">Sign up >></button>
					</div>
				  </div>
				  </form>
				</div>
			  </div>
			</div>
		 </div>    
      </div>
  @include('footer')