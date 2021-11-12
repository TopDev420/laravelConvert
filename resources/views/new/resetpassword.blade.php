@include('header')
<div id="global-leade-banner" style="background:url({{ asset('/new-assets/images/inner-bner.jpg') }}) no-repeat; height:651px;">
 	<div class="container">
	    <div class="col-md-12 text-center">
		   	<div class="login-content">
		        <h1>PASSWORD RESET</h1>
		     	<form action="{{ url('/resetpassword') }}" method="post" role="form">
		     		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Email" name="email" type="email">
						</div>
		    			<input class="login-btnn" type="submit" value="RESET PASSWORD">
						<p class="reset-pasw">To reset your password, fill out this form, then check your email.</p>
					</fieldset>
		      	</form>
		   	</div>  
		</div>
 	</div>
</div>  	
<section class="build-your-lis">
    <div class="container">
	    <div class="col-md-8">
		  <div class="redy-sale">
		    <h3>READY TO BOOST YOUR SALES LIKE YOUR COMPETITORS? TRY OUR TOOL 
			FOR FREE.</h3>
		  </div>	
		</div>
		<div class="col-md-4">
		  <a href="{{ url('/buildlist') }}" type="button" class="build-list">BUILD YOUR LIST</a>
		</div>
	</div>
</section> 	  
@include('footer')