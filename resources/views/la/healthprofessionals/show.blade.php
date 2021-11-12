@extends('la.layouts.app')

@section('htmlheader_title')
	Health Professionals View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	<div class="bg-success clearfix">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-9">
				</div>
			</div>
		</div>
		<div class="col-md-3">
		</div>
	
	</div>

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/healthprofessionals') }}" data-toggle="tooltip" data-placement="right" title="Back to pricestake"><i class="fa fa-chevron-left"></i></a></li>
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
						@la_display($module, 'description')
						@la_display($module, 'price')
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
	@if($healthprofessionals->id == Auth::user()->id || Entrust::hasRole("SUPER_ADMIN"))
	$('#password-reset-form').validate({
		
	});
	@endif
});
</script>
@endpush
