@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/jobtitles') }}">BusinessContact</a> :
@endsection
@section("contentheader_description", $jobtitles->$view_col)
@section("section", "JobTitles")
@section("section_url", url(config('laraadmin.adminRoute') . '/jobtitles'))
@section("sub_section", "Edit")

@section("htmlheader_title", "JobTitles Edit : ".$jobtitles->$view_col)

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
				{!! Form::model($jobtitles, ['route' => [config('laraadmin.adminRoute') . '.jobtitles.update', $jobtitles->id ], 'method'=>'PUT', 'id' => 'businesscontact-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'description')
					@la_input($module, 'price')
					@la_input($module, 'format')

					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/jobtitles') }}">Cancel</a></button>
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
	$("#businesscontact-edit-form").validate({
		
	});
});
</script>
@endpush
