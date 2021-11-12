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
	        <h1>DASHBOARD</h1>
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
							<li class="active">
								<a href="http://work4brands.com/glead/dashboard">Dashboard</a>
							</li>
							<li>
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
							<div class="tab-pane active" id="tab_default_1">
							   	<div class="tab-cnt-detail">
									<h2>Your Dashboard</h2>
									<p>Your Bookyourdata dashboard.</p>
									<hr class="hr-line">

									<h2>Registration Date</h2>
									@foreach($dashbrd as $key => $value)
									<p>{{ $registration_date = $value->created_at }}</p>
									@endforeach
									<hr class="hr-line">
									<h3><b>BUILD A LIST</b></h3>
									<h4 style="text-transform: capitalize;">Create a new contact list now.</h4>
									<a href="{{ url('/buildlist?'.$currentid) }}" type="button" class="butn-submit">build a list now!</a>
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