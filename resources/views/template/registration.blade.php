@include('new_header')
<div class="jmbtrn jmbtrn-signup jmbtrn-regular-bg">
        <div class="container jmbtrn-container">
            <div class="jmbtrn-inner">
                <div class="gap-bottom">
                    <h1 class="jmbtrn-title">Sign up for free</h1>
                    <div>
                        <span>Already a member?</span>
                        <a class="link-primary link-underline" href="{{ url('/frontlogin') }}">Login</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <p class="hidden-tld">Become a member for free to gain access to great tools and features:</p>
                        <ul class="list list-secondary hidden-tld">
                            <li class="list-item">Build your own direct business email list of valuable contacts within
                                your targeted audience using our list-builder tool.</li>
                            <li class="list-item">Connect now by using accurate, 95% guaranteed information from our
                                human verified custom and/or pre-made lists.</li>
                            <li class="list-item">Find direct business blocks at an affordable price with then best rate
                                guarantee!</li>
                        </ul>
                    </div>
                    <div class="col-lg-8 col-md-7 pad-top-tlnu">
                        
                        <form id="signup-form" class="form form-soft no-loading" action="{{ url('/dosignup') }}" method="post" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="text-alert gap-bottom-small hide" id="signup-form-errors"></div>
                            <div class="row">
                                <div class="col-sm-6 gap-bottom">
                                    <input class="form-control" placeholder="First Name*" name="fname" type="text" value="{{old('fname')}}" required />
                                </div>
                                <div class="col-sm-6 gap-bottom">
                                    <input class="form-control" placeholder="Last Name*" name="lname" type="text" value="{{old('lname')}}" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 gap-bottom">
                                    <input class="form-control" id="email" placeholder="Business Email*" name="email" type="email" value="{{old('email')}}"  required />
                                </div>
                                <div class="col-sm-6 gap-bottom">
                                    <div class="phone-field">
                                        
                                        

                                        <input class="form-control mobile" placeholder="Mobile Number (Only Enter Digit)" name="phone" type="tel" value="{{old('phone')}}" required />

                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 gap-bottom">
									
									<div class="form-group">

	<select class="form-control" name="cntry" id="exampleFormControlSelect1" required>
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


                                </div>
                                <div class="col-sm-6 gap-bottom">
                                    <input class="form-control" placeholder="Company Name" name="cname" type="text" value="{{old('cname')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 gap-bottom">
                                    <input id="password" minlength="8" pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{7,19}$" class="form-control"  title="Must contain at least  number and  uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password*" name="password" type="password" value="{{old('password')}}">
                                </div>
                                <div class="col-sm-6 gap-bottom">
                                    <input minlength="8"  id="cpassword" class="form-control" placeholder="Confirm Password*" name="cpassword" type="password" value="{{old('cpassword')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 font-small inline-align-fix-dnu gap-bottom-tld">
                                    <div class="custom-checkbox custom-checkbox-secondary gap-right-small">
                                        <input class="custom-checkbox-inp" name="terms" type="checkbox" id="cb1"
                                            data-validetta="required" data-vd-parent-up="1"
                                            data-vd-message-required="You must accept Terms of Use and Privacy Policy to continue.">
                                        <label class="custom-checkbox-mask" for="cb1"></label>
                                    </div>
                                    <label class="align-middle" for="cb1">I’ve read and agreed</label>
                                    <a class="link-primary link-underline" target="_blank" href="{{ url('/terms-of-use') }}"  >Terms of
                                        Use</a> and
                                    <a class="link-primary link-underline" target="_blank" href="{{ url('/privacy-policy') }}"
                                         >Privacy Policy</a>
                                </div>
                                <div class="col-sm-6">
                                    
                                        <button class="createaccnt button button-primary full-width">Create My Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('new_footer')

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