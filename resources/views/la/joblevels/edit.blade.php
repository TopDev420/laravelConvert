@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/joblevels') }}">Job Levels</a> :
@endsection
@section("contentheader_description", $joblevels->$view_col)
@section("section", "JobLevels")
@section("section_url", url(config('laraadmin.adminRoute') . '/joblevels'))
@section("sub_section", "Edit")

@section("htmlheader_title", "JobLevels Edit : ".$joblevels->$view_col)

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
				{!! Form::model($joblevels, ['route' => [config('laraadmin.adminRoute') . '.joblevels.update', $joblevels->id ], 'method'=>'PUT', 'id' => 'businesscontact-edit-form']) !!}
					<!-- @la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'description')
					@la_input($module, 'price')
					--}}
                    <br> -->


                    <div class="form-group"><label for="name">Name :</label><input class="form-control" placeholder="Enter Name" data-rule-maxlength="256" name="name" type="text" value="{{$joblevels->name}}"></div>

                    <div class="form-group"><label for="name">Chose Parent Name :</label>

                   @if(!empty($parentName))

                     	<select  size="" class="form-control"  data-placeholder="Select Parent Name" id="pname" rel="select2" name="pname">
						    <option value="">Select Parent Name</option>
                            @foreach($parentName as $parentNames)
							<option value="{{$parentNames->id}}"  @if($parentNames->id == $joblevels->parent_id ) selected="selected" @endif>{{$parentNames->name}}</option>
							
							@endforeach

						</select>

                    @else

					    <select  size="" class="form-control" required="1" data-placeholder="Select Parent Name" id="pname" rel="select2" name="pname">
						    <option value="">Select Parent Name</option>
                           
						</select>
				   
				   @endif

				   </div>	
                    
					<div class="form-group"><label for="description">Text On List :</label><textarea class="form-control" placeholder="Text On List" cols="30" rows="3" name="listtext">{{$joblevels->list_text}}</textarea></div>

					<div class="form-group">
						<label for="description">Banner Description:</label>
						<textarea class="form-control" placeholder="Banner Description" cols="30" rows="3" name="bannerdescription">{{$joblevels->banner_desc}}</textarea>
					</div>

					<div class="form-group"><label for="description">Basic Description :</label><textarea class="form-control" placeholder="Bacis Description" cols="30" rows="3" name="description">{{$joblevels->description}}</textarea></div>
                    
                    <div class="form-group"><label for="description">More Description :</label><textarea class="form-control" placeholder="More Description" cols="30" rows="3" name="moredescription">{{$joblevels->more_desc}}</textarea></div>


					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/joblevels') }}">Cancel</a></button>
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
