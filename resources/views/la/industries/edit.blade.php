@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/industries') }}">Industries</a> :
@endsection
@section("contentheader_description", $industries->$view_col)
@section("section", "Industries")
@section("section_url", url(config('laraadmin.adminRoute') . '/industries'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Industries Edit : ".$industries->$view_col)

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
				{!! Form::model($industries, ['route' => [config('laraadmin.adminRoute') . '.industries.update', $industries->id ], 'method'=>'PUT', 'id' => 'businesscontact-edit-form']) !!}
					<!-- @la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'description')
					@la_input($module, 'price')

					--}}
                    <br> -->
                     <div class="form-group"><label for="name">Name :</label><input class="form-control" placeholder="Enter Name" data-rule-maxlength="256" name="name" type="text" value="{{$industries->name}}"></div>

					<div class="form-group"><label for="description">Text On List :</label><textarea class="form-control" placeholder="Text On List" cols="30" rows="3" name="listtext">{{$industries->list_text}}</textarea></div>

					<div class="form-group">
						<label for="description">Banner Description:</label>
						<textarea class="form-control" placeholder="Banner Description" cols="30" rows="3" name="bannerdescription">{{$industries->banner_desc}}</textarea>
					</div>

					<div class="form-group"><label for="description">Basic Description :</label><textarea class="form-control" placeholder="Bacis Description" cols="30" rows="3" name="description">{{$industries->description}}</textarea></div>
                    
                    <div class="form-group"><label for="description">More Description :</label><textarea class="form-control" placeholder="More Description" cols="30" rows="3" name="moredescription">{{$industries->more_desc}}</textarea></div>

                     <div class="form-group">
						<label for="role">Show in industry list page ? </label>
						<select class="form-control" required="1" data-placeholder="Select" id="" rel="select2" name="option">
							<option value="">Select..</option>
							<option value="yes" @if($industries->display_list_page =='yes') selected="selected" @endif>Yes</option>
							<option value="no" @if($industries->display_list_page =='no') selected="selected" @endif>No</option>
						</select>
					</div>

                    
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/industries') }}">Cancel</a></button>
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
