@include('header')
<div id="global-leade-banner" style="background:url({{ asset('new-assets/images/inner-bner.jpg') }}) no-repeat; height:351px;">
 <div class="container">
    <div class="col-md-12 text-center">
    	@if($update)
    		<script type="text/javascript">
			    alert("Update Successfully");
		    </script>
    	@endif
	   <div class="dashboard-content">
	        <h1>PROFILE</h1>
	   </div>  
	</div>
 </div>
</div>  
	
<section class="dashboard-admin-details">
	<div class="container">
		<div class="col-md-12">
			<div class="dasboard-admin">
				<div class="tabbable-panel">
					<div class="tabbable-line">
						<ul class="nav nav-tabs ">
							<li >
								<a href="http://work4brands.com/glead/dashboard">Dashboard</a>
							</li>
							<li class="active">
								<a href="http://work4brands.com/glead/profile">Account Details</a>
						  	</li>
							<li>
						     	<a href="http://work4brands.com/glead/savedsearches">Saved Searches</a>
							</li>
							<li>
						     	<a href="http://work4brands.com/glead/downloadfile">Exported files</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_default_2">
								<div class="tab-cnt-detail">
									<h2>Account Details</h2>
									<p>You can update your profile info by filling the fields and clicking “Update my info” button.></p>
									<div class="update-content">
										<div class="col-md-12">
											<form id="form" action="{{ url('/updateinfo') }}" method="post" role="form">
												<fieldset>
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													@foreach($dashbrd as $row)
													<div class="col-md-6">
											      	   	<div class="form-group">
													     	<input class="form-control updtinfo" placeholder="First Name*" name="fname" type="text" value="{{ $row->fname }}">
													   	</div>
													    <div class="form-group">
													     	<input class="form-control updtinfo" id="email" placeholder="Business Email*" name="email" type="email" value="{{ $row->email }}">
													   	</div>
													    <div class="form-group">
													     	<select class="country-select updtinfo" name="cntry">
													     		<option selected value="{{ $row->cntry }}">{{ $row->cntry }}</option>
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
													       <input  minlength="8" id="newpassword" pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{7,19}$" class="form-control updtinfo newpassword"  title="Must contain at least  number and  uppercase and lowercase letter, and at least 8 or more characters" placeholder="New Password" name="password" type="password">
													    </div>
											        </div>
											        <div class="col-md-6">
											            <div class="form-group">
													      	<input class="form-control updtinfo" placeholder="Last Name*" name="lname" type="text" value="{{ $row->lname }}">
													    </div>
													   	<div class="form-group phone-no">
													     	<input id="phone" class="form-control updtinfo" placeholder="Mobile Number (Only Enter Digit)" name="phone" type="tel" value="{{ $row->phone }}">
													   	</div>
													    <div class="form-group">
													     	<input class="form-control updtinfo" placeholder="Company Name" name="cname" value="{{ $row->cname }}" type="text">
													   	</div>
													    <div class="form-group"> 
													       <input id="checkpass" class="form-control updtinfo checkpass" placeholder="Password Check" name="cpassword" type="password">
													    </div>
													    <div class="nosamepass" style="display:none">Passwords Don't Match</div>
														<button class="updtaeinfo">Update My Info</button>
										     		</div>
										     		@endforeach
									     		</fieldset>
									     	</form>
									    </div>
									</div>
							   	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> 

@include('footer')

<script type="text/javascript">
$(document).ready(function(){
	$('.updtaeinfo').on('click', function() {
	var first = $("#newpassword").val();
	var second = $("#checkpass").val();
	if(first != second)
	{
		swal("Password not match!");
		return false;
	}
	else{
		$("#form").submit();
	}

	});
});

$("#phone").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/13.0.4/js/utils.js"
});
</script>