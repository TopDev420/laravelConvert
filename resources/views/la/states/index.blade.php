@extends("la.layouts.app")

@section("contentheader_title", "States")
@section("contentheader_description", "States listing")
@section("section", "States")
@section("sub_section", "Listing")
@section("htmlheader_title", "States Listing")

@section("headerElems")
@la_access("States", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add State</button>
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
		<!-- <tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Actions</th>
			@endif
		</tr> -->

		<tr class="success" role="row">
			<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 80px;">Id</th>
			<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 348px;">Name</th>
			<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Code: activate to sort column ascending" style="width: 348px;">Code</th>

			<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 217px;">display list page</th>
			<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 137px;">Actions</th></tr>


		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("States", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add State</h4>
			</div>
			{!! Form::open(['action' => 'LA\StatesController@store', 'id' => 'state-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'list_text')
					@la_input($module, 'banner_desc')
					@la_input($module, 'description')
					@la_input($module, 'more_desc')
					--}}
					<div class="form-group">
						<label for="role">Show in states list page ? </label>
						<select class="form-control" required="1" data-placeholder="Select" id="" rel="select2" name="option">
							<option value="">Select..</option>
							<option value="yes">Yes</option>
							<option value="no">No</option>
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
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/state_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#state-add-form").validate({
		
	});
});
</script>
@endpush
