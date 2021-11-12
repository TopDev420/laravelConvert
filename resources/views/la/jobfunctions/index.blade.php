@extends("la.layouts.app")

@section("contentheader_title", "JobFunctions")
@section("contentheader_description", "JobFunctions listing")
@section("section", "JobFunctions")
@section("sub_section", "Listing")
@section("htmlheader_title", "JobFunctions Listing")

@section("headerElems")
@la_access("JobFunctions", "create")
	
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Job Function</button>
	
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

@la_access("JobFunctions", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Job Function</h4>
			</div>
			{!! Form::open(['action' => 'LA\JobFunctionController@store', 'id' => 'businesscontact-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                   <!--  @la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'description')
					--}} -->

					<div class="form-group"><label for="name">Name :</label><input class="form-control" placeholder="Enter Name" data-rule-maxlength="256" name="name" type="text" value=""></div>

					<div class="form-group"><label for="name">Chose Parent Name :</label>

                   @if(!empty($parentName))

                     	<select  size="" class="form-control"  data-placeholder="Select Parent Name" id="pname" rel="select2" name="pname">
						    <option value="">Select Parent Name</option>
                            @foreach($parentName as $parentNames)
							<option value="{{$parentNames->id}}">{{$parentNames->name}}</option>
							
							@endforeach

						</select>

                    @else

					    <select  size="" class="form-control" required="1" data-placeholder="Select Parent Name" id="pname" rel="select2" name="pname">
						    <option value="">Select Parent Name</option>
                           
						</select>
				   
				   @endif

				   </div>	

					<div class="form-group"><label for="description">Text On List :</label><textarea class="form-control" placeholder="Text On List" cols="30" rows="3" name="listtext"></textarea></div>

					<div class="form-group"><label for="description">Banner Description:</label><textarea class="form-control" placeholder="Banner Description" cols="30" rows="3" name="bannerdescription"></textarea></div>

					<div class="form-group"><label for="description">Basic Description :</label><textarea class="form-control" placeholder="Bacis Description" cols="30" rows="3" name="description"></textarea></div>

					<div class="form-group"><label for="description">More Description :</label><textarea class="form-control" placeholder="More Description" cols="30" rows="3" name="moredescription"></textarea></div>

					





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
        ajax: "{{ url(config('laraadmin.adminRoute') . '/jobfunctions_dt_ajax') }}",
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