@include('header')

    <div id="global-leade-banner" style="background:url({{ asset('new-assets/images/inner-bner.jpg') }}) no-repeat; height:651px;">
	    <div class="container">
		    <div class="col-md-12 text-center">
		    @if($signup)
			    <script type="text/javascript">
		        	alert("Signup Successfully");
			    </script>
			@endif
			   <div class="login-content">
			        <h1>login</h1>
			     	<form accept-charset="UTF-8" role="form" action="{{url('/dologin')}}" method="post">
			     		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                	    <fieldset>
				    	  	<div class="form-group">
				    		    <input class="form-control" placeholder="Email" name="email" type="email" required />
				    		</div>
				    		<div class="form-group">
				    			<input class="form-control" placeholder="Password" name="password" type="password" value="" required />
				    		</div>
				    		<input class="login-btnn" type="submit" value="Login To My Account">
							<div class="insta-icon">
	                        <input class="insta-login" type="submit" value="Login with linkdin">
							<i class="fa fa-instagram" aria-hidden="true"></i></div>
							  <div class="checkbox">
				    	    	<label>
									<span class="rember"><input name="remember" type="checkbox" value="Remember Me"> Remember Signin</span>
									<span class="forgot-pasw"><a href="{{url('/reset')}}" class="forgot-passw">Forgot Password</a></span>
				    	    	</label>
				    	      </div>
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
  
   </body>
</html>

