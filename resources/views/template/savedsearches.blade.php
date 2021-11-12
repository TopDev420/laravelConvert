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
					<a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link  is-active"
					href="{{url('/dashboard/saved-searches')}}">Saved Searches</a>
					<a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
					href="{{url('/dashboard/downloads')}}">Exported Files</a>
					<a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
					href="{{url('/dashboard/billing')}}">Billing</a>
					<a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
					href="dashboard-support.html">Support</a>
				</div>
				<button id="tab-toggle-btn" class="c-dashboard-toggle-menu-button" type="button"></button>
			</div>
		</div>
		<div class="l-dashboard-content">
			<h3 class="primary-title clear-gap-vertical">Saved Searches</h3>
			<p>You can view your previously saved searches and purchase the lists here.</p>

			@if($saved == '')
			<div class="tab-pane active" id="tab_default_3">
				<div class="tab-cnt-detail">
					<h4>You do not have any saved searches yet.</h4>
					<a href="{{ url('/tool/business') }}" class="button button-septenary button-slim text-uppercase ">build a list now!</a>

				</div>
			</div>
			@else

			<div class="table-responsive shadow-primary">
				<table class="table table-primary table-hover table-fixed">
					<thead>
						<tr class="text-nowrap">
							<th width="50%">File Name</th>
							<th width="25%">Created At</th>
							<th class="hidden-dd" width="25%"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($saved as $search)
						@php

						$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				        $charactersLength = strlen($characters);
				        $randomStringfirst = '';
				        $randomStringlast = '';
				        $getcoun=array();
				        $where = '';
				        for ($i = 0; $i < 8; $i++) {
				            $randomStringlast .= $characters[rand(0, $charactersLength - 1)];
				        }
				        for ($i = 0; $i < 10; $i++) {
				            $randomStringfirst .= $characters[rand(0, $charactersLength - 1)];
				        }


				        $count_save_result =base64_encode('id='.$search->id.$randomStringlast);
				        $count_save_result=$randomStringfirst.$count_save_result;

						@endphp
						<tr>
							<td class="table-stong-text">
								{{$search->listname}}
								<br>
								<a href="#" data-toggle="modal" data-target="#rename_sav{{ $search->id }}" class="font-small rename-button" data-id="7155" data-placeholder="new job list">Rename</a>
								|
								<span data-id="{{$search->id}}"  class="font-small savedelete" style="color: red">Delete Search</span>
							</td>
							<td>{{$search->savetime}}</td>
							<td class="hidden-dd"><a href="<?Php echo url("/tool/{$search->types}/{$count_save_result}") ?>" class="button button-septenary button-slim text-uppercase full-width">Build</a></td>
						</tr>
						

						<div class="modal fade" id="rename_sav{{ $search->id }}" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-padded-content">
										<div class="row">
											<div class="col-md-11">
												<h3 class="primary-title clear-gap-vertical">Rename Your Saved Search</h3>
												<span>You can rename your saved search via input below.</span>
											</div>
											<div class="col-md-1 text-right">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: transparent;border: none;font-size: 24px;"><span aria-hidden="true">×</span></button>
											</div>
										</div>
									</div>
									<div class="modal-padded-content" style="padding-top: 0">
										<form action="{{ url('/renamelist') }}" method="post" role="form">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="rowid" class="rowid" value="{{ $search->id }}">
											<div class="row">
												<div class="col-sm-12 gap-bottom">
													<input type="text" class="form-control" id="rename_Placeholder" placeholder="Name Your Saved Search" name="renmlist" value="{{ $search->listname }}" required="">
												</div>
												<div class="col-sm-6"></div>
												<div class="col-sm-6 text-right">
													<button class="button button-primary full-width" data-id="{{ $search->id }}" class="rename_save_list">Save</button>


												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						@endforeach	
					</tbody>
				</table>
			</div>

			@endif

			<div style="margin-top: 24px;">
			</div>
			
		</div>

	</div>

</div>
</div>

@include('new_footer')