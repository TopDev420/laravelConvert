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
    padding: 2.5rem;
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
    z-index: 2;
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
.password-reset-description {
    color: #4d5769;
    font-size: 16px;
}
</style>
<div class="rr-content">  
    <div class="rr-auth-page pure-g  max-width-layout">
		<div>
			<div class="rr-auth-box">
				<div class="signup-pending">
        			<h4 class="heading">
						PASSWORD RESET
        			</h4>
					<div class="form-container">
					<div class="col-xs-12 col-sm-6 oauth-signup">
						<form class="row form-box " action="{{ url('/resetpassword') }}" method="post" role="form">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
							<fieldset>
							<div class="form-group">

								<div class="peeky-placeholder-wrapper" is-invalid="false" required="required">
									<label for="email" class="peeky-placeholder ">
									<input id="email" name="email" type="email" ply-unique-email-validator="" placeholder="Email" autocomplete="username" class="form-control" is-invalid="false" required="required" style=""><span>Email</span></label>
								</div>
							</div>
                            @if(session()->has('message'))
                                <div class="alert alert-danger">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
							<div>
								<button type="submit" class="btn btn-primary">
									RESET PASSWORD
								</button>
							</div>
                            <div style="margin-top: 20px; text-align: center">
                                <a href="/frontlogin">Go back to login</a>
                            </div>
							<div>
								<p class="password-reset-description">To reset your password, fill out this form, then check your email.</p>
							</div>
							</fieldset>
						</form>
					</div>
						<!-- oauth -->
						<!-- ngIf: !!processing -->
					</div>
				</div><!-- end ngIf: !showSuccessAnimation || (showSuccessAnimation && user && user.state!='registered') -->
				<!-- ngIf: user && user.state=='registered' -->
			</div>
		</div>
	</div><!-- end ngIf: user && user.state!='registered' -->
</div>