@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/businesscontacts') }}">BusinessContact</a> :
@endsection
@section("contentheader_description", $businesscontact->$view_col)
@section("section", "BusinessContacts")
@section("section_url", url(config('laraadmin.adminRoute') . '/businesscontacts'))
@section("sub_section", "Edit")

@section("htmlheader_title", "BusinessContacts Edit : ".$businesscontact->$view_col)

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
				{!! Form::model($businesscontact, ['route' => [config('laraadmin.adminRoute') . '.businesscontacts.update', $businesscontact->id ], 'method'=>'PUT', 'id' => 'businesscontact-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'direct_phone')
					@la_input($module, 'elink')
					@la_input($module, 'clink')
					@la_input($module, 'address1')
					@la_input($module, 'address2')
					@la_input($module, 'county')
					@la_input($module, 'active')
					@la_input($module, 'Business Model')
					@la_input($module, 'first_name')
					@la_input($module, 'last_name')
					@la_input($module, 'job_title')
					@la_input($module, 'email_address')
					@la_input($module, 'company_name')
					@la_input($module, 'company_website')
					@la_input($module, 'phone_number')
					@la_input($module, 'city')
					@la_input($module, 'state')
					@la_input($module, 'zipcode')
					@la_input($module, 'country')
					@la_input($module, 'industries')
					@la_input($module, 'employees')
					@la_input($module, 'revenue')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/businesscontacts') }}">Cancel</a></button>
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
