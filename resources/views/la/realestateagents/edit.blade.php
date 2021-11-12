@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/realestateagents') }}">PriceSlakes</a> :
@endsection
@section("contentheader_description", $realestateagents->$view_col)
@section("section", "RealEstateAgents")
@section("section_url", url(config('laraadmin.adminRoute') . '/realestateagents'))
@section("sub_section", "Edit")

@section("htmlheader_title", "RealEstateAgents Edit : ".$realestateagents->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($realestateagents, ['route' => [config('laraadmin.adminRoute') . '.realestateagents.update', $realestateagents->id ], 'method'=>'PUT', 'id' => 'priceslake-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'direct_email')
					@la_input($module, 'contact_name')
					@la_input($module, 'company_job_level')
					@la_input($module, 'Job_function')
					@la_input($module, 'country_city')
					@la_input($module, 'contact_number')
					--}}
					<br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/realestateagents') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
				
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#priceslake-edit-form").validate({
		
	});
});
</script>
@endpush
