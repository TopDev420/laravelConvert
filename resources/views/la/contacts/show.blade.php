@extends('la.layouts.app')

@section('htmlheader_title')
	Contact View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	<div class="bg-success clearfix">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-3">
					<img class="profile-image" src="{{ Gravatar::fallback(asset('/img/avatar5.png'))->get(Auth::user()->email, ['size'=>400]) }}" alt="">
				</div>
				<div class="col-md-9">
					<h4 class="name">{{ $employee->$view_col }}</h4>
					<div class="row stats">
						<div class="col-md-6 stat"><div class="label2" data-toggle="tooltip" data-placement="top" title="Designation">{{ $employee->designation }}</div></div>
						<div class="col-md-6 stat"><i class="fa fa-map-marker"></i> {{ $employee->city or "NA" }}</div>
					</div>
					<p class="desc">{{ substr($employee->about, 0, 33) }}@if(strlen($employee->about) > 33)...@endif</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="dats1"><i class="fa fa-envelope-o"></i> {{ $employee->email }}</div>
			<div class="dats1"><i class="fa fa-phone"></i> {{ $employee->mobile }}</div>
			<div class="dats1"><i class="fa fa-clock-o"></i> Joined on {{ date("M d, Y", strtotime($employee->date_hire)) }}</div>
		</div>
	
	</div>

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/employees') }}" data-toggle="tooltip" data-placement="right" title="Back to Employees"><i class="fa fa-chevron-left"></i></a></li>
		<li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active fade in" id="tab-info">
			<div class="tab-content">
				<div class="panel infolist">
					<div class="panel-default panel-heading">
						<h4>General Info</h4>
					</div>
					<div class="panel-body">
						@la_display($module, 'name')
						@la_display($module, 'email')
						@la_display($module, 'phone')
						@la_display($module, 'message')
						
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
	@if($employee->id == Auth::user()->id || Entrust::hasRole("SUPER_ADMIN"))
	$('#password-reset-form').validate({
		
	});
	@endif
});
</script>
@endpush
