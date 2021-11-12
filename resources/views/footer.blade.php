<footer>
    <div class="container-fluid">
        <div class="col-md-7">
    	   <div class="left-foter" style="background:url({{ asset('new-assets/images/footer-bg.png') }}) no-repeat; background-size:100%;">
    	    <div class="col-md-6">
    		   <div class="news-later">
    		     <h4>NEWSLETTER</h4>
    				<p>We will never share your 
    				email with third parties.</p>
                    <form id="newslettr_form" action="{{ url('/newsletter') }}" method="post" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        				<input type="email" name="email" class="emladres" placeholder="Email Address" required />
        				<span style="cursor:pointer;" class="submitbtn">Submit</span>
                        
                    </form>
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session()->get('message') }}
                        </div>
                    @endif
    				<ul class="social-icons">
    				   <li><i class="fa fa-facebook-square" aria-hidden="true"></i></li>
    				   <li><i class="fa fa-twitter-square" aria-hidden="true"></i></li>
    				   <li><i class="fa fa-google-plus-square" aria-hidden="true"></i></li>
                       <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
    				</ul>
    		   </div>
    	    </div>
    		<div class="col-md-6">
    		   <div class="glob-leds">
                    <h4>Glob Leads</h3>
				    <h3>1234 Florida Ave.<br>
				    NW, Washington, DC 12345<br>
				    P: (123)-456-7890</h3>
    		   </div>
    	    </div>
    			  <div class="botm-fote">
    	             <ul class="social-ico">
    				   <li>2018, GlobLeads-All Rights Reserved</li>
    				   <li><a href="{{ url('/termsofuse') }}">Terms of Use</a></li>
                       <li><a href="{{ url('/privacypolicy') }}">Privacy Policy</a></li>
    				   <li><a href="{{ url('/legalnotice') }}">Legal Notice</a></li>
    				 </ul>
    	          </div>
    	  </div>
    
    	</div>
    	<div class="col-md-3 col-sm-6">
    	   <div class="write-foter">
    	        <h4>Products</h4>
    		    <ul class="products">
                   <!--  <li><a href="{{ url('/onlinelistbuild') }}" >Online List Builder</a></li> -->
                    <!-- <li><a href="{{ url('/joblevel') }}" >Lists By Job Levels</a></li> -->
                    <li><a href="{{ url('/jobtitle') }}" >Lists By Job Titles</a></li>
    		        <li><a href="{{ url('/industrie') }}" >Lists By Industries</a></li>
    			    <li><a href="{{ url('/healthprofessional') }}" >Healthcare Professionals</a></li>
    		    </ul>
    	    </div>
    	</div>
    	<div class="col-md-2 col-sm-6">
    	    <div class="compny-foter">
    	    <h4>COMPANY</h4>
    		  <ul class="products">
    		     <li><a href="{{ url('/pricing') }}" >Pricing</a></li>
    			 <li><a href="{{ url('/contact') }}" >Contact</a></li>
    			 <li><a href="{{ url('/about') }}" >About Us</a></li>
    			 <li><a href="{{ url('/external') }}" >External</a></li>
    			 <li><a href="{{ url('/leadership') }}" >Leadership</a></li>
    			 <li><a href="{{ url('/press') }}" >Press Room</a></li>
    			 <li><a href="{{ url('/gdrp') }}" >GDRP Ready</a></li>
    			 <li><a href="{{ url('/guarantees') }}" >Our Guarantees</a></li>
    		  </ul>
    	    </div>
    	</div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('new-assets/js/wow.min.js') }}"></script>
<script src="{{ asset('new-assets/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/13.0.4/js/intlTelInput.js"></script>
<script src="{{ asset('new-assets/js/select2.min.js') }}"></script>
<script src="{{ asset('new-assets/js/custom.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.submitbtn').on("click", function(){
        var email = $('.emladres').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            type:'POST',
            url:"{{ url('/newsltremail') }}",
            data: {
                'email': email,
            },
            success:function(data){
                if(data != 0){
                    $(".emladres").after( '<span class="validetta-inline validetta-inline--right" style="color:#E74C3C;">This email address you entered is already exist!<br></span>' );
                    return false;
                }else{
                    $(".validetta-inline").remove();
                }
            }
        });
    });
});
</script>
<script>     
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script> 

<script>
$(function () {
    $(".createaccnt").click(function () {
        var password = $("#password").val();
        var confirmPassword = $("#cpassword").val();
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    });
    $(function () {
        $("#uptpassword").click(function () {
            var newpassword = $("#newpassword").val();
            var confirmNewpassword = $("#cnewpassword").val();
            if (newpassword != confirmNewpassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });

    $(".country-select").select2();
});
</script>
<script>
$('#main-nav li > a').each(function(){
        if(urlRegExp.test($(this).attr('href'))){
            $(this).addClass('active');
        }
    });
</script>
   </body>
</html>