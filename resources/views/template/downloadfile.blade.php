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
					<a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
					href="{{url('/dashboard/profile')}}">Account Details</a>
					<a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link"
					href="{{url('/dashboard/saved-searches')}}">Saved Searches</a>
					<a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link   is-active"
					href="{{url('/dashboard/downloads')}}">Exported Files</a>
					<a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
					href="{{url('/dashboard/billing')}}">Billing</a>
					<a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
					href="{{url('dashboard/support')}}">Support</a>
				</div>
				<button id="tab-toggle-btn" class="c-dashboard-toggle-menu-button" type="button"></button>
			</div>
		</div>
		<div class="l-dashboard-content">
			<h3 class="primary-title clear-gap-vertical">Exported Files</h3>
			<p>In this page, you can re-download your previously exported files.</p>
			
			<br>
			@if(!empty($downloadseach))
				<div class="table-responsive shadow-primary">
					<table class="table table-primary table-hover table-fixed">
						<thead>
							<tr class="text-nowrap">
								<th width="25%">Trasaction id </th>
								<th width="25%">Total Contact</th>
								<th width="25%">Trasaction Date</th>								
								<th class="hidden-dd" width="25%"></th>
							</tr>
						</thead>
						<tbody>
						@foreach($downloadseach as $key=>$value)
								<tr>
								<td class="table-stong-text">
									{{$value['values']->trasactionid}}
									<br>	
								</td>
								<td>{{$value['totalsavedata']}}</td>
								<td>{{$value['values']->Trasactiondate}}</td>
								
								<td class="hidden-dd"><a href="<?Php echo url("downloadsfiles/{$value['downloadlinkids']}") ?>" class="button button-septenary button-slim text-uppercase full-width">Download</a></td>
							</tr>


						@endforeach


					</table>
				</div>	
			@else 
				<div class="text-center">
					<span class="gap-bottom-small block">You do not have any purchased download yet.</span>
					<a href="/tool/business" class="button button-primary">Build a List Now!</a>
				</div>	
			@endif
		</div>

	</div>

</div>
</div>

@include('new_footer')
<!-- <script>
$(document).ready(function (){
	$('.export-file').on('click', function(){

	});
});
</script> -->