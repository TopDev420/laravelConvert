@extends("la.layouts.app")

@section("contentheader_title", "BusinessHealthcares")
@section("contentheader_description", "BusinessHealthcares listing")
@section("section", "BusinessHealthcares")
@section("sub_section", "Listing")
@section("htmlheader_title", "BusinessHealthcares Listing")

@section("headerElems")
@la_access("BusinessHealthcares", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Business Healthcares</button>
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

@la_access("BusinessHealthcares", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Business Healthcare</h4>
			</div>
			{!! Form::open(['action' => 'LA\BusinessHealthcareController@store', 'id' => 'priceslake-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'Direct_email')
					@la_input($module, 'contact_name')
					@la_input($module, 'job_level')
					@la_input($module, 'Job_function')
					@la_input($module, 'country_city')
					@la_input($module, 'contact_number')
					--}}
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
<table style="float:right;">
	<tr>
		<td>
			<form action="{{ url('/import_csv') }}" method="post" enctype="multipart/form-data" id="importFrm" style="border:1px solid #ccc;margin: 0px 15px 0 0;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
    			<input id="importfile" type="file" name="file" style="display:inline !important" />
   				 <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT" style="background-color:#0eb7a7;border:1px solid #0eb7a7;border-radius: 0;">
			</form>
		</td>
		<td>
			<a class="btn btn-primary" href="{{url('/')}}{{ Storage::disk('local')->url('documents/sample.csv')}}" style="background-color:#0eb7a7;border:1px solid #0eb7a7;border-radius: 0;">Sample CSV File</a>
		</td>
	</tr>
</table>
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
        ajax: "{{ url(config('laraadmin.adminRoute') . '/businesshealthcares_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#frontpage-add-form").validate({
		
	});
});
</script>
@endpush