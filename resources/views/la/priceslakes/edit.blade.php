@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/priceslakes') }}">PriceSlakes</a> :
@endsection
@section("contentheader_description", $priceslakes->$view_col)
@section("section", "Priceslakes")
@section("section_url", url(config('laraadmin.adminRoute') . '/priceslakes'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Priceslake Edit : ".$priceslakes->$view_col)

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
				{!! Form::model($priceslakes, ['route' => [config('laraadmin.adminRoute') . '.priceslakes.update', $priceslakes->id ], 'method'=>'PUT', 'id' => 'priceslake-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'record_range')
					@la_input($module, 'price_range')
					--}}
					<div class="form-group">
						<label for="role">Type :</label>
						<select class="form-control" required="1" data-placeholder="Select Type" id="san_country" rel="select2" name="types">
						<option value="">Select Type..</option>
									<option @if($priceslakes->types =='b_contact') selected="selected" @endif value="b_contact">Buisness Contact</option>
									<option @if($priceslakes->types =='h_contact') selected="selected" @endif value="h_contact">Buisness Health Care</option>
									<option @if($priceslakes->types =='r_contact') selected="selected" @endif value="r_contact">Real Estate Agent</option>
						</select>
					</div>
					<br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/priceslakes') }}">Cancel</a></button>
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
	$("#priceslake-edit-form").validate({
		
	});
});
</script>
@endpush
