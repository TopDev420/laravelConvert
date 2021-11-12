@include('header')
<style>
.intl-tel-input.allow-dropdown {
    width: 100% !important;
}
</style>
<div id="global-leade-banner" style="background:url({{ asset('new-assets/images/inner-bner.jpg') }}) no-repeat; height:651px;">
    <div class="container">
        <div class="register-content">
			<div class="col-md-12">
				<form action="{{ url('/dosignup') }}" method="post" role="form">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<fieldset>
						<div class="sign-up">
						    <span class="signp">Signup</span> 
							<span class="member-login"> Already a member? <a href="{{ url('/frontlogin') }}">Login</a></span>

							@if(Session::has('mail_error'))
				                <div class="alert alert-success">{{ Session::get('mail_error') }}</div>
				            @endif
						</div>
				        <div class="col-md-6">
				      	   	<div class="form-group">
						     	<input class="form-control" placeholder="First Name*" name="fname" type="text" value="{{old('fname')}}" required />
						   	</div>
						    <div class="form-group">
						     	<input class="form-control" id="email" placeholder="Business Email*" name="email" type="email" value="{{old('email')}}"  required />
						   	</div>
						    <div class="form-group">
						     	<select class="country-select" name="cntry" required />
						     		<option value="{{old('cntry')}}">Select Country*</option>
						     	<?php
						    	$country = DB::table('san_countries')->get(); 
						    	foreach($country as $contry){
						    		$id = $contry->id; 
						    	?>
								    <option value="<?php echo $contry->name; ?>"><?php echo $contry->name; ?></option>
								<?php } ?>	
							 	</select>
							</div>
							<div class="form-group">
						       <input id="password" minlength="8" pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{7,19}$" class="form-control"  title="Must contain at least  number and  uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password*" name="password" type="password" value="{{old('password')}}">
						    </div>
						    <div class="form-group">
						       <span class="chbx"><input class="form-control" type="checkbox" required />
							   <label>I’ve read and agreed Terms of Use and Privacy Policy</label></span>
						    </div>
				        </div>
				        <div class="col-md-6">
				            <div class="form-group">
						      	<input class="form-control" placeholder="Last Name*" name="lname" type="text" value="{{old('lname')}}" required />
						    </div>
						   	<div class="form-group phone-no">
						     	<input class="form-control mobile" placeholder="Mobile Number (Only Enter Digit)" name="phone" type="tel" value="{{old('phone')}}" required />
								 
						   	</div>
						    <div class="form-group">
						     	<input class="form-control" placeholder="Company Name" name="cname" type="text" value="{{old('cname')}}">
						   	</div>
						    <div class="form-group">
						       <input minlength="8"  id="cpassword" class="form-control" placeholder="Confirm Password*" name="cpassword" type="password" value="{{old('cpassword')}}">
						    </div>
							<button class="createaccnt">Create My Account</button>
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

<script type="text/javascript">
	$(document).ready(function(e){
	 	$('input[type="email"]').on("blur", function(){
	 		var email = $('#email').val();
	 		var reg = /^([\w-\.]+@(?!gmail.com)(?!yahoo.com)(?!hotmail.com)(?!yahoo.co.in)(?!aol.com)(?!abc.com)(?!xyz.com)(?!pqr.com)(?!rediffmail.com)(?!live.com)(?!outlook.com)(?!me.com)(?!msn.com)(?!ymail.com)([\w-]+\.)+[\w-]{2,4})?$/;
	  		if (reg.test(email)){
	 			return 0;
	 		}
 			else{
	 			alert('Please enter your "business email", sorry we don`t accept free email providers like hotmail, yahoo, gmail or etc.');
	 			return false;
 			}
	 	});

	 	$('input[type="email"]').on("blur", function(){
	 		var email = $('#email').val();
	 		$.ajax({
		        headers: {
		            'X-CSRF-TOKEN': '{{ csrf_token() }}'
		        },
		    	type:'POST',
		       	url:"{{ url('/emailcheck') }}",
		       	data: {
		          	'email': email,
		      	},
		       	success:function(data){
		       	    if(data != 0){
		       	    	$("#email").after( '<span class="validetta-inline validetta-inline--right" style="color:#E74C3C;">This email address you entered is already in use on another account!<br></span>' );
		       	    }else{
		       	    	$(".validetta-inline").remove();
		       	    }
		       	}
    		});
	 	});
	});

// $(function() {
//   $('.phone-no').on('keydown', '.mobile', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
// });

jQuery('.mobile').keyup(function(e){
  if (/\D/g.test(this.value))
  {
    this.value = this.value.replace(/\D/g, '');
  }
});


$(".mobile").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/13.0.4/js/utils.js"
});
</script> 