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
             <ul class="list-inline dashboard-list">
			   <li><a href="calendar.html">Calendar</a></li>
			   <li><a href="user-list.html">User List </a></li>
			   <li><a href="account.html">View Account </a></li>
			   <li><a href="help.html">Help</a></li>
			   <li><a href="feedback.html">Leave Feedback</a></li>
			   <li><a href="logout.html">Log Out</a></li>
			 </ul>
         </div>
         <!-- ====================== ===========================================================
            ==================================about actuss end==================================
            ========================================================-->
        
		
		  <div class="questions contact_pg">
            <div class="container">
			 <div class="pricing-frame wow slideInLeft">
			 <div class="sign_ht user_lists">
			 <div class="heading text-center"><button class="pull-left view mr-t-20">Back</button>Your Account Information</div>
			 
			<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
           User details
        </a>
		<div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
      <div class="panel-body">
       <div class="form-group">
	    <input type="text" class="form-control" placeholder="Edit Name">
	   </div>
	    <div class="form-group">
	    <input type="text" class="form-control" placeholder="Edit Company Name">
	   </div>
		 <button class="add_new">Submit</button>
      </div>
    </div>
		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseone" aria-expanded="false" aria-controls="collapseone">
           Change Password

        </a>
		<div id="collapseone" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
       
       <div class="form-group">
	    <input type="text" class="form-control" placeholder="Change Password">
	   </div>
	    <div class="form-group">
	    <input type="password" class="form-control" placeholder="Confirm Password">
	   </div>
		 <button class="add_new">Submit</button>
		
      </div>
    </div>
		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
           Payment Information
        </a>
		
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
       <h3>Last date Of your Package 31 Dec 2018</h3>
		
      </div>
    </div>
		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
           Cancel Subscription
        </a>
		<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
      <div class="panel-body">
       
       <button class="add_new">Cancel Subscription</button>
		
      </div>
    </div>
		
					</div>
			  </div>
			  
			</div>
		 </div>    
@include('footer')