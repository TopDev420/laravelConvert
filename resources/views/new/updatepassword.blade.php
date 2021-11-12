@include('header')
<div id="global-leade-banner" style="background:url({{ asset('/new-assets/images/inner-bner.jpg') }}) no-repeat; height:651px;">
 	<div class="container">
	    <div class="col-md-12 text-center">
		   	<div class="login-content">
		        <h1>RESET PASSWORD</h1>
		     	<form action="" method="post" role="form">
		            <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="New Password" id="newpassword" name="newpassword" type="password">
						</div>
						<div class="form-group">
			    		    <input class="form-control" placeholder="Re-Type New Password" id="cnewpassword" name="cnewpassword" type="password">
						</div>
		    			<input class="login-btnn" id="uptpassword" type="submit" value="RESET PASSWORD">
						
					</fieldset>
		      	</form>
		   	</div>  
		</div>
 	</div>
</div> 



@include('footer')