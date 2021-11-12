<style>
    body {
        background: #3A589B;
    }
    .rr-content {
        padding-left : 25%;
        padding-right : 25%;
    }
    .rr-content>div {
        min-height: calc(100vh - 24.3rem);
        padding-bottom : 1.5rem;
    }
    .rr-auth-page {
        padding-top: 1vh!important;
    }
    .rr-auth-box {
        font-family: "Avenir","rr-venir",-apple-system,BlinkMacSystemFont,"Helvetica Neue",Arial,Helvetica,sans-serif;
        text-align: center;
    }
    .rr-auth-box .heading {
        color: #fff;
        opacity: 0.5;
        padding-bottom: 1rem;
        font-weight: bold;
        text-align: center;
    }
    H4 {
        font-family: "Avenir","rr-venir",-apple-system,BlinkMacSystemFont,"Helvetica Neue",Arial,Helvetica,sans-serif;
    }
    .rr-auth-box .form-box {
    position:relative;
    }
    .rr-auth-box .form-container {
        display : flex;
        background: white; 
        -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
        border-radius: 1rem;
        margin-left: 15px;
        margin-right: 15px;
        margin-top: 1rem;
        text-align: left;
        padding: 1.5rem;
    }
    .rr-auth-box .heading .subheading {
        font-size: 0.8em;
        display: block;
        margin: 0;
        font-weight: normal;
        padding: 0;
        margin-top: .8rem;
    }
    .oauth-signup{
        border-right: 1px solid #c0c0c0;
        padding-right : 30px !important;
    }
    .manual-signup {
        padding-left : 30px !important;
    }
    .row [class*="col-"] {
        position: inherit;
    }
    .col-sm-6 {
        width: 50%;
    }
    .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
        float: left;
    }
    .col-xs-12 {
        width: 100%;
    }
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }
    fieldset {
        min-width: 0;
        padding: 0;
        margin: 0;
        border: 0;
    }
    .rr-auth-page .form-box .manual-signup .signup-disclaimer-box {
        text-align: center;
        margin-top: 2rem;
        color: #898989;
        font-weight: 400;
        font-size: 20px;
        top: calc(100% + 2rem);
    }
    .form-group {
        margin-bottom: 15px;
    }
    .rr-auth-page .manual-signup .password-wpr {
        position: relative;
    }
    .rr-auth-page .rr-auth-box ul.error-messages {
        height: .75rem;
        display: block!important;
        font-size : 14px;
        padding: 0;
        margin: 0;
        color: #b94a48;
        list-style-type: none;
    }
    label.peeky-placeholder {
        position: relative;
        font-weight: normal;
        display: block;
        background: #f7f7f7;
        border-radius: .5rem;
        max-width: unset;
        width: 100%;
        overflow: hidden;
        height: 70px;
    }
    label.peeky-placeholder input {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        display: block;
        padding: 1.5rem;
        height: auto;
        background: none;
        border: none;
        width: 100%;
        -webkit-box-shadow: none!important;
        box-shadow: none!important;
        outline: none;
        color: #4F4F4F;
    }
    .RR2018 ul.error-messages>li, .RR2018 ul.errorlist>li {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .ul.error-messages li:before, ul.errorlist li:before, ul.warning-messages li:before, ul.warninglist li:before {
        font: normal normal normal 14px/1 FontAwesome;
        display: inline-block;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        margin-right: 5px;
    }
    .rr-auth-page .rr-auth-box button[type='submit'] {  
        width: 100%;
        font-size: 20px;
        padding-top: 15px;
        padding-bottom: 15px;
        height: 60px !important;
    }
    .rr-auth-page .form-box .manual-signup .or-login, .PLY .rr-auth-page .form-box .manual-signup .alt-action, .PLY .rr-auth-page .form-box .manual-signup .signup-disclaimer-box {
        text-align: center;
        margin-top: 2rem;
        color: #898989;
        font-weight: 400;
        font-size: 1.4rem;
        top: calc(100% + 2rem);
    }
    .btn.btn-primary, .btn.btn-primary:focus {
        background-color: #3A589B;
        border-color: #3A589B;
        color: #ffffff;
    }
    .btn.btn-primary:hover {
        background-color: #142956;
    }
    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .btn-primary {
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
    }
    .rr-auth-page .form-box .manual-signup .signup-disclaimer-box p {
        margin-bottom: 0;
    }
    .form-control:focus {
        outline : none;
        border-color : #b3b3b3;
    }
    input:focus {
        padding-top : 2.5rem;
    }
    label.peeky-placeholder.rr-invalid input {
        color : #b94a48;
    }
    label.peeky-placeholder input:focus, label.peeky-placeholder input.peek-mode, label.peeky-placeholder input:-webkit-autofill {
        padding-top: 2.5rem;
    }
    label.peeky-placeholder input:focus + span, label.peeky-placeholder input.peek-mode + span, label.peeky-placeholder input:-webkit-autofill + span {
        opacity: 1;
        position: absolute;
        top: 0.5rem;
        font-size: 10px;
        color: #049cdb;
    }
    label.peeky-placeholder span {
        color: #049cdb;
        pointer-events: none;
        position: absolute;
        top: 30%;
        left: 1.5rem;
        opacity: 0;
        -webkit-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }
    .rr-auth-page .form-box .manual-signup .or-login, .rr-auth-page .form-box .manual-signup .alt-action, .rr-auth-page .form-box .manual-signup .signup-disclaimer-box {
        text-align: center;
        margin-top: 2rem;
        color: #898989;
        font-weight: 400;
        font-size: 1.4rem;
        top: calc(100% + 2rem);
    }
    .terms-text{
        text-align: center;
        margin-top: 2rem;
        color: #898989;
        font-weight: 400;
        font-size: 17px;
        top: calc(100% + 2rem);
    }
    .heading-title {
        font-size : 25px;
        color : mediumslateblue;
        margin-bottom: 40px;
    }
    .oauth-divider-vertical-or {
        position: absolute;
        display: block;
        left: -1rem;
        top: 25%;
        z-index: 0;
        background: #fff;
        width: 2rem;
        padding: 1rem 0;
        text-align: center;
        color: #757575;
        font-size: 14px;
    }
    .signup-disclaimer-box {
        text-align: center;
        margin-top: 2rem;
        color: #898989;
        font-weight: 400;
        top: calc(100% + 2rem);
    }
    a {
        color: #08c;
        text-decoration: none;
        cursor: pointer;
    }
    .signup-disclaimer-box a {
        font-weight: 500;
    }
    .signup-disclaimer-box a:hover {
        color: #142956;
    }


    .resend_otp{
        text-decoration: none;
        float: right;
        font-size: 18px;
        padding-bottom: 10px;
        padding-top: 20px;
    }

</style>
<style>
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 22; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 26%;
    }

    /* The Close Button */
    .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    }

    #partitioned {
        padding-left: 15px;
        letter-spacing: 42px;
        border: 0;
        background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
        background-position: bottom;
        background-size: 50px 1px;
        background-repeat: repeat-x;
        background-position-x: 35px;
        width: 300px;
    }
</style>
<!-- Trigger/Open The Modal -->
<!-- <button id="myBtn">Open Modal</button> -->
<link rel="stylesheet" href="{{url('public/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{url('public/build/css/demo.css')}}">
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="already_phone_success" style="color: green;padding-bottom: 10px;"></div>
    <div class="phone_success" style="color: green;padding-bottom: 10px;"></div>
    <div class="phone_error" style="color: red;padding-bottom: 10px;"></div>
    <!-- @if(isset($error_verify_email) && $error_verify_email)
        <li id="error_verify_email" class="" style="color: green;padding-bottom: 10px;">Please verify your email address.</li>
    @endif -->

    <form class="row form-box " name="loginForm"  accept-charset="UTF-8" role="form" action="{{url('/verify_otp')}}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset class="email-signup-container">
            <div class="email-registration-inputs">
                <div class="form-group">
                    <!-- name -->

                    <div class="peeky-placeholder-wrapper" style="width: 300px;margin-top: 20px;" is-invalid="false" required="required">
                        <label for="name" class="peeky-placeholder ">
                        <input id="verify_otp"  maxlength="6" name="verify_otp"  type="text"  ply-valid-name="" placeholder="OTP" autofocus class="form-control" is-invalid="false" required="required" style=""><span>OTP</span></label>
                        <?php 
                            if(isset($data)){
                                $phone = $data->phone;
                            }else{
                                $phone = '0';
                            }
                            if(isset($data)){
                                $email = $data->email;
                            }else{
                                $email = '0';
                            }
                        ?>
                        <input type="hidden" name="mobile_number" id="mobile_number" value="<?php echo $phone; ?>">
                        <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                        <a href="#" class="resend_otp" id="resend_otp" value="Send OTP">Resend OTP</a>
                    </div>
                    <ul class="error-messages">
                        <li id="error_fullname_require" class="" style="display:none">Full name is required.</li>
                        <li id="error_fullname_long" class="" style="display:none">Name appears to be too long.</li>
                        @if(isset($error_fullname_both) && $error_fullname_both)
                        <li id="error_fullname_both" class="" style="">Please enter both your first and last name.</li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="rr-auth-page">
                <button type="submit" class="btn btn-primary signup-button" style="float: right;margin-top: 40px;width: 130px;height: 50px;font-size: 20px;">
                    Verify OTP
                </button>
            </div>
        </fieldset>
    </form>
  </div>

</div>
<div class="rr-content">  
    <div class="rr-auth-page pure-g  max-width-layout">
		<div>
			<div class="rr-auth-box">
				<div class="signup-pending">
        			<h4 class="heading">
            			LOGIN & CREATE ACCOUNT
            			<p class="subheading">Create your Free Account Today! No Credit Card Required!</p>
        			</h4>
					<div class="form-container">
					<div class="col-xs-12 col-sm-6 oauth-signup">
						<div class="heading-title">Login</div>
                        @if (\Session::has('success'))
                            <div class="alert alert-success" style="color: green;padding-bottom: 20px;">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        @if (\Session::has('error'))
                            <div class="alert alert-success" style="color: red;padding-bottom: 20px;">
                                {!! \Session::get('error') !!}
                            </div>
                        @endif
						<form class="row form-box " name="loginForm"  accept-charset="UTF-8" role="form" action="{{url('/dologin')}}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
							<fieldset class="email-signup-container">
								<div class="email-registration-inputs">
									<div class="form-group">
										<!-- email -->
										<div class="peeky-placeholder-wrapper" is-invalid="false" required="required">
										<label for="email" class="peeky-placeholder ">
										<input id="email" name="email" type="email" ply-unique-email-validator="" placeholder="Email" autocomplete="username" class="form-control" is-invalid="false" required="required" style=""><span>Email</span></label>
										</div>
										<ul class="error-messages">
											<li style="display:none" id="error_email_require">Email is required.</li>
											<li style="display:none" id="error_email_invalid" >Invalid email.</li>
                                            @if(isset($error_email_business_login) && $error_email_business_login)
											<li style="" id="error_email_business_login">Business email address required.</li>
                                            @endif
                                            @if(isset($error_no_user) && $error_no_user)
											<li style="" id="error_no_user">No user exists</li>
                                            @endif
                                            @if(isset($error_email_verify) && $error_email_verify)
											<li style="" id="error_email_verify">Please Verify your email</li>
                                            @endif
										</ul>
									</div>
									<div class="form-group password-wpr">
										<!-- password -->
										<div class="peeky-placeholder-wrapper" is-invalid="false" required="required">
										<label for="password" class="peeky-placeholder "><input id="password" name="password" type="password" placeholder="Password" autocomplete="new-password" class="form-control" rr-password-strength-directive="signupForm.password" is-invalid="false" required="required"><span>Password</span></label>
										</div>
										<ul class="error-messages">
											<li style="display:none" id="error_password_require">Password is required.</li>
                                            @if(isset($error_password_incorrect) && $error_password_incorrect)
											<li id="error_password_incorrect">Password incorrect.</li>
                                            @endif
										</ul>
									</div>
								</div>
								<div>
									<button type="submit" class="btn btn-primary">
										Login
									</button>
								</div>
							<div class="signup-disclaimer-box">
								<!-- forgot -->
								<a target="_self" href="{{url('/forgot-password')}}">Forgot password?</a>
                    		</div>
							</fieldset>
							</form>
						</div>
						<div class="col-xs-12 col-sm-6 manual-signup">
							<div class="heading-title">Register</div>
							<div class="oauth-divider-vertical-or">
								<span>or</span>
							</div>
        					<form class="row form-box " name="signupForm" action="/registeruser" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
							<fieldset class="email-signup-container">
								<div class="email-registration-inputs">
									<div class="form-group">
										<!-- name -->
										<div class="peeky-placeholder-wrapper " is-invalid="false" required="required">
											<label for="name" class="peeky-placeholder ">
											<input id="name" name="name" type="text" ply-valid-name="" placeholder="Full Name" autocomplete="name" class="form-control" is-invalid="false" required="required" style=""><span>Full Name</span></label>
										</div>
										<ul class="error-messages">
											<li id="error_fullname_require" class="" style="display:none">Full name is required.</li>
											<li id="error_fullname_long" class="" style="display:none">Name appears to be too long.</li>
											@if(isset($error_fullname_both) && $error_fullname_both)
                                            <li id="error_fullname_both" class="" style="">Please enter both your first and last name.</li>
                                            @endif
                                        </ul>
									</div>	
									<div class="form-group">
										<!-- email -->
										<div class="peeky-placeholder-wrapper" is-invalid="false" required="required">
										<label for="email" class="peeky-placeholder ">
										<input id="email" name="email" type="email" ply-unique-email-validator="" placeholder="Business Email" autocomplete="username" class="form-control" is-invalid="false" required="required" style=""><span>Business Email</span></label>
										</div>
										<ul class="error-messages">
                                        @if(isset($error_email_business) && $error_email_business)
											<li id="error_email_business">Business email address required.</li>
                                        @endif
                                        @if(isset($error_email_valid) && $error_email_valid)
											<li id="error_email_valid">Please enter a valid email.</li>
                                        @endif
                                        @if(isset($error_email_exist) && $error_email_exist)
											<li style="" id="error_email_exist">Existing Account!</li>
										@endif
                                        </ul>
									</div>
                                    <!-- <div class="form-group phone-wpr">
										<div class="peeky-placeholder-wrapper"  required="required">
										<label for="phone" class="peeky-placeholder ">
                                            <input type="tel"  id="phone" name="phone" placeholder="Phone Number" class="form-control"  required="required"><span>Phone Number</span>
                                        </label>
										</div>
										<ul class="error-messages">
											<li style="display:none" id="error_phone_number_require">Phone number is required.</li>                                            
                                        @if(isset($error_phone_number_valid) && $error_phone_number_valid)
											<li id="error_phone_number_valid">You have to enter valid phone number</li>
                                        @endif
										</ul>
									</div> -->
									<div class="form-group password-wpr">
										<!-- password -->
										<div class="peeky-placeholder-wrapper" is-invalid="false" required="required">
										<label for="password" class="peeky-placeholder "><input id="password" name="password" type="password" placeholder="Password" autocomplete="new-password" class="form-control" rr-password-strength-directive="signupForm.password" is-invalid="false" required="required"><span>Password</span></label>
										</div>
										<ul class="error-messages">
											<li style="display:none" id="error_password_require">Password is required.</li>                                            
                                        @if(isset($error_password_minimum) && $error_password_minimum)
											<li id="error_password_minimum">Password minimum is 8 characters.</li>
                                        @endif
											<li style="display:none" id="error_password_long">Password appears to be too long.</li>
											<li style="display:none" id="error_password_strong">Please choose a stronger password.
										</ul>
									</div>
									
									
								</div>
								<div>
									<button type="submit" class="btn btn-primary signup-button">
										create account
									</button>
								</div>
							</fieldset>
							<!-- disclaimer-->
							<div class="terms-text">
								<p for="terms" class="ng-binding">
									<input hidden="" id="terms" type="checkbox" checked="" required="" ng-model="createAccountFormData.agreeTerms" class="ng-pristine ng-untouched ng-valid ng-valid-required">
									By clicking 'create account', you agree to our <br>
									<a href="/terms" target="_blank">Terms of Service</a>
								</p>
							</div>
							</form>
						</div>
						<!-- oauth -->
						<!-- ngIf: !!processing -->
					</div>
				</div><!-- end ngIf: !showSuccessAnimation || (showSuccessAnimation && user && user.state!='registered') -->
				<!-- ngIf: user && user.state=='registered' -->
			</div>
		</div>
		</ply-signup-form-directive>
	</div><!-- end ngIf: user && user.state!='registered' -->
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#verify_otp').bind('keyup paste', function(){
            this.value = this.value.replace(/[^0-9]/g, '');
    });

    // $(document).on("#verify_otp", ".numeric", function() {
    //     this.value = this.value.replace(/[^0-9]/g, '');
    // });

    $('.resend_otp').on("click",function(){
        // alert('f');
        var number = $("#mobile_number").val()
        var input = {
			"mobile_number" : number,
			"action" : "resend_otp",
			"_token": "{{ csrf_token() }}"
		};
        $.ajax({
			url : "{{ url('/resend_otp') }}",
			type : 'POST',
			data : input,
			success : function(response) {
                console.log(response);
                if(response == 1){
                    already_phone_success
                    $(".already_phone_success").text("");
                    $(".phone_error").text("");
                    $(".phone_success").text("We sent a code on your phone number please check and enter your verification code or OTP code in the box");
                    // setTimeout(function() {
                    //     $('.phone_success').fadeOut('slow');
                    // }, 3000);
                }else{
                    
                    $(".already_phone_success").text("");
                    $(".phone_error").text("Unable to create record: Permission to send an SMS has not been enabled for the region indicated by the 'To' number: <?php echo $data->phone ?? '' ?>");
                    // setTimeout(function() {
                    //     $('.phone_error').fadeOut('slow');
                    // }, 3000);
                }
                // location.reload();
			}
		});
    //post code
    });
});
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 

<?php 
if(isset($data)){
if($data->verify_otp != 1){
?>
// btn.onclick = function() {
    // We sent a code on your phone number please check and enter your verification code or OTP code in the box
  modal.style.display = "block";
// }

$(".already_phone_success").text("We sent a code on your phone number please check and enter your verification code or OTP code in the box")
// setTimeout(function() {
//     $('.already_phone_success').fadeOut('slow');
// }, 3000);
<?php } } ?>

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }
</script>
<script src="{{url('public/build/js/intlTelInput.js') }}"></script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      allowDropdown: true,
      autoPlaceholder: "on",
      dropdownContainer: document.body,
      formatOnDisplay: true,
      geoIpLookup: function(callback) {
        $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "";
          callback(countryCode);
        });
      },
      hiddenInput: "full_number",
      localizedCountries: { 'us': 'Deutschland' },
      separateDialCode: true,
      initialDialCode: true,
      displayNumber: true,
      utilsScript: "{{url('public/build/js/utils.js') }}",
    });
  </script>