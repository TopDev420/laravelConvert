@include('new_header')
<div class="page-title">
        <div class="container">
            <span class="page-title-title heading">Hi {{Session::get('user_name')}},</span>
        </div>
    </div>
    <div class="container">
        <div class="l-dashboard">
            <div class="l-dashboard-sidebar gap-bottom-large-tld">
                <div class="c-dashboard-toggle-menu">
                    <div class="sidebar-nav sidebar-nav-without-icon shadow-primary c-dashboard-toggle-menu-menu">
                        <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link"
                            href="{{url('/dashboard/home')}}">Dashboard Home</a>
                        <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link is-active"
                            href="{{url('/dashboard/profile')}}">Account Details</a>
                        <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link"
                            href="{{url('dashboard/saved-searches')}}">Saved Searches</a>
                        <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
                            href="{{url('dashboard/downloads')}}">Exported Files</a>
                        <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
                            href="{{url('/dashboard/billing')}}">Billing</a>
                        <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
                            href="{{url('dashboard/support')}}">Support</a>
                    </div>
                    <button id="tab-toggle-btn" class="c-dashboard-toggle-menu-button" type="button"></button>
                </div>
            </div>
           
            <div class="l-dashboard-content">
                <h3 class="primary-title clear-gap-vertical">Account Details</h3>
                <p>You can update your profile info by filling the fields and clicking “Update my info” button.</p>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="form">
                    <form id="form" action="{{ url('/updateinfo') }}" method="post" role="form">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    	@foreach($dashbrd as $row)
                        <div class="row">
                            <div class="col-md-6 gap-bottom">
                            	<input class="form-control updtinfo" placeholder="First Name*" name="fname" type="text" value="{{ $row->fname }}"> 

                                 @if ($errors->has('fname'))<span class="text-danger">{{ $errors->first('fname') }}</span>@endif
                            </div>
                            <div class="col-md-6 gap-bottom">
                                <input class="form-control updtinfo" placeholder="Last Name*" name="lname" type="text" value="{{ $row->lname }}">
                                @if ($errors->has('lname'))<span class="text-danger">{{ $errors->first('lname') }}</span>@endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 gap-bottom">
                                <div class="custom-selectbox is-selected">
                                    <select class="form-control" name="cntry" id="exampleFormControlSelect1" required>
                                    <option value="{{old('cntry')}}">Select Country*</option>
                                    <?php
                                    $country = DB::table('san_countries')->get(); 
                                    foreach($country as $contry){
                                    $id = $contry->id; 
                                    ?>
                                    <option value="<?php echo $contry->name; ?>" @if($row->cntry==$contry->name) selected="selected" @endif><?php echo $contry->name; ?></option>
                                    <?php } ?> 
                                    </select>
                                    <!-- <label class="custom-selectbox-mask">Bangladesh</label> -->
                                </div>
                                @if ($errors->has('cntry'))<span class="text-danger">{{ $errors->first('cntry') }}</span>@endif
                            </div>
                            <div class="col-md-6 gap-bottom">
                                <input class="form-control updtinfo" placeholder="Company Name" name="cname" value="{{ $row->cname }}" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 gap-bottom">
                                <input class="form-control updtinfo" id="email" placeholder="Business Email*" name="email" type="email" value="{{ $row->email }}">
                                @if ($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span>@endif
                            </div>
                            <div class="col-sm-6 gap-bottom">
                                <div class="phone-field">
                                   
                                    <input id="phone" class="form-control updtinfo" placeholder="Mobile Number (Only Enter Digit)" name="phone" type="tel" value="{{ $row->phone }}">
                                    @if ($errors->has('phone'))<span class="text-danger">{{ $errors->first('phone') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 gap-bottom">
                                <input type="password" class="form-control" placeholder="Password*" name="password" type="password" value="{{old('password')}}">
                                 @if ($errors->has('password'))<span class="text-danger">{{ $errors->first('password') }}</span>@endif
                            </div>
                            <div class="col-md-6 gap-bottom">
                                <input type="password" class="form-control" placeholder="Confirm Password*" name="cpassword" type="password" value="{{old('cpassword')}}">
                                @if ($errors->has('cpassword'))<span class="text-danger">{{ $errors->first('cpassword') }}</span>@endif
                            </div>
                        </div>
                        <div class="row">
                            <div 
                                <button class="updtaeinfo button button-primary full-width">Update My Info</button>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>

        
       
         
        </div>

    </div>
    </div>

@include('new_footer')

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