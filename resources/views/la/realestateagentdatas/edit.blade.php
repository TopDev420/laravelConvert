@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/realestateagentdatas') }}">RealEstateAgentdatas</a> :
@endsection
@section("contentheader_description", $realestateagentdatas->$view_col)
@section("section", "RealEstateAgentdatas")
@section("section_url", url(config('laraadmin.adminRoute') . '/realestateagentdatas'))
@section("sub_section", "Edit")

@section("htmlheader_title", "RealEstateAgentdatas Edit : ".$realestateagentdatas->$view_col)

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
				{!! Form::model($realestateagentdatas, ['route' => [config('laraadmin.adminRoute') . '.realestateagentdatas.update', $realestateagentdatas->id ], 'method'=>'PUT', 'id' => 'businesscontact-edit-form']) !!}
					<!-- @la_form($module) -->
					
					<!-- {{--
					@la_input($module, 'name')
					@la_input($module, 'description')
					@la_input($module, 'price')
					--}} -->
					<div class="form-group"><label for="name">Name :</label><input class="form-control" placeholder="Enter Name" data-rule-maxlength="256" name="name" type="text" value="{{$RealEstateAgentdatas['name']}}"></div>

					<div class="form-group">
						<label for="description">Banner Description:</label>
						<textarea class="form-control" placeholder="Banner Description" cols="30" rows="3" name="description">{{$RealEstateAgentdatas['description']}}</textarea>
					</div>

					<div class="form-group"><label for="description">Basic Description :</label><textarea class="form-control" placeholder="Bacis Description" cols="30" rows="3" name="banner_desc">{{$RealEstateAgentdatas['banner_desc']}}</textarea></div>

					<div class="form-group"><label for="description">More Description :</label><textarea class="form-control" placeholder="More Description" cols="30" rows="3" name="more_desc">{{$RealEstateAgentdatas['more_desc']}}</textarea></div>

					<div class="form-group">
						<label for="role">Show in Real Estate list page ? </label>
						<select class="form-control" required="1" data-placeholder="Select" id="" rel="select2" name="display_list_page">
							<option value="">Select..</option>
							<option value="yes"@if($RealEstateAgentdatas['display_list_page'] =='yes') selected="selected" @endif>Yes</option>
							<option value="no"@if($RealEstateAgentdatas['display_list_page'] =='no') selected="selected" @endif >No</option>
						</select>
					</div>

					<div class="form-group"><label for="industries">Country :</label>
						<select  class="form-control"  data-placeholder="Select Country" id="san_country" rel="select2" name="county_name">
							<option value="">Select Country..</option>
							@if(!empty($countryDetails))
								@foreach($countryDetails as $country)
									@if($country->name==$RealEstateAgentdatas['county_name'])
									<option value="{{$country->name}}" selected>{{$country->name}}</option> 
									@else
									<option value="{{$country->name}}" >{{$country->name}}</option> 
									@endif
								
								@endforeach
							@endif
						</select>
					</div>

                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/realestateagentdatas') }}">Cancel</a></button>
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
