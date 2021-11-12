@extends("la.layouts.app")

@section("contentheader_title", "Advisors")
@section("contentheader_description", "advisors listing")
@section("section", "Advisors")
@section("sub_section", "Listing")
@section("htmlheader_title", "Advisors Listing")

@section("headerElems")
@la_access("Advisors", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Advisor</button>
@endla_access
@endsection

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

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Actions</th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("Advisors", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Advisor</h4>
			</div>
			{!! Form::open(['action' => 'LA\AdvisorsController@store', 'id' => 'employee-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'gender')
					@la_input($module, 'mobile')
					@la_input($module, 'email')
					@la_input($module, 'address')
					--}}
					<div class="form-group">
						<label for="role">Country :</label>
						<select class="form-control" required="1" data-placeholder="Select Country" id="san_country" rel="select2" name="country">
							@foreach($countries as $country)
								@if($country->id)
									<option value="{{ $country->id }}">{{ $country->name }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="role">State :</label>
						<select class="form-control" required="1" data-placeholder="Select State" id="san_state" rel="select2" name="state">
								
						</select>
					</div>
					<div class="form-group">
						<label for="role">City :</label>
						<select class="form-control" required="1" data-placeholder="Select City" id="san_city" rel="select2" name="city">
							
						</select>
					</div>
					<div class="form-group">
						<label for="role">Role* :</label>
						<select class="form-control" required="1" data-placeholder="Select Role" rel="select2" name="role">
							<?php $roles = App\Role::all(); ?>
							@foreach($roles as $role)
								@if($role->id != 1)
									<option value="{{ $role->id }}">{{ $role->name }}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$('#san_country').on('change', function() {
		$('#san_state').find('option').remove();
	  var id = this.value;
	  $.ajax({
            	headers: {
		            'X-CSRF-TOKEN': '{{ csrf_token() }}'
		        },
               type:'POST',
               url:"{{ url('/get_states') }}",
               data: {
		            'id': id
		        },
               success:function(data){
                  var option = '<option value="">Select State..</option>';
                  $.each(data, function( index, value ) {
                  	option += '<option value="'+value.id+'">'+value.name+'</option>';
					  
				  });
				  $('#san_state').append(option);
               }
            });
	});
	$('#san_state').on('change', function() {
		$('#san_city').find('option').remove();
	  var id = this.value;
	  $.ajax({
            	headers: {
		            'X-CSRF-TOKEN': '{{ csrf_token() }}'
		        },
               type:'POST',
               url:"{{ url('/get_cities') }}",
               data: {
		            'id': id
		        },
               success:function(data){
                  var option = '<option value="">Select City..</option>';
                  $.each(data, function( index, value ) {
                  	option += '<option value="'+value.id+'">'+value.name+'</option>';
				  });
				  $('#san_city').append(option);
                  console.log(option);
               }
            });
	});
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/advisors_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#employee-add-form").validate({
		
	});
});
</script>
@endpush