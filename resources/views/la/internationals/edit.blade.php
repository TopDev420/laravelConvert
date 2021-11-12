@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/internationals') }}">International</a> :
@endsection
@section("contentheader_description", $international->$view_col)
@section("section", "Internationals")
@section("section_url", url(config('laraadmin.adminRoute') . '/internationals'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Internationals Edit : ".$international->$view_col)

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
				{!! Form::model($international, ['route' => [config('laraadmin.adminRoute') . '.internationals.update', $international->id ], 'method'=>'PUT', 'id' => 'international-edit-form']) !!}
					<!-- @la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'list_text')
					--}} -->
					 <div class="form-group"><label for="name">Name :</label><input class="form-control" placeholder="Enter Name" data-rule-maxlength="256" name="name" type="text" value="{{$international->name}}"></div>

					<div class="form-group"><label for="description">Text On List :</label><textarea class="form-control" placeholder="Text On List" cols="30" rows="3" name="listtext">{{$international->list_text}}</textarea></div>

					<div class="form-group">
						<label for="description">Banner Description:</label>
						<textarea class="form-control" placeholder="Banner Description" cols="30" rows="3" name="bannerdescription">{{$international->banner_desc}}</textarea>
					</div>

					<div class="form-group"><label for="description">Basic Description :</label><textarea class="form-control" placeholder="Bacis Description" cols="30" rows="3" name="description">{{$international->description}}</textarea></div>
                    
                    <div class="form-group"><label for="description">More Description :</label><textarea class="form-control" placeholder="More Description" cols="30" rows="3" name="moredescription">{{$international->more_desc}}</textarea></div>

                     <div class="form-group">
						<label for="role">Show in industry list page ? </label>
						<select class="form-control" required="1" data-placeholder="Select" id="" rel="select2" name="option">
							<option value="">Select..</option>
							<option value="yes" @if($international->display_list_page =='yes') selected="selected" @endif>Yes</option>
							<option value="no" @if($international->display_list_page =='no') selected="selected" @endif>No</option>
						</select>
					</div>

					
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/internationals') }}">Cancel</a></button>
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
	$("#international-edit-form").validate({
		
	});
});
</script>
@endpush
