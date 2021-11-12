@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/membershipplans') }}">MembershipPlans</a> :
@endsection
@section("contentheader_description", $membershipplans->$view_col)
@section("section", "MembershipPlans")
@section("section_url", url(config('laraadmin.adminRoute') . '/membershipplans'))
@section("sub_section", "Edit")

@section("htmlheader_title", "MembershipPlans Edit : ".$membershipplans->$view_col)

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
				{!! Form::model($membershipplans, ['route' => [config('laraadmin.adminRoute') . '.membershipplans.update', $membershipplans->id ], 'method'=>'PUT', 'id' => 'businesscontact-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'plans')
					@la_input($module, 'price')
					@la_input($module, 'points')
					@la_input($module, 'tutorial')
					@la_input($module, 'supportaccess')
					@la_input($module, 'automatic')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/membershipplans') }}">Cancel</a></button>
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
