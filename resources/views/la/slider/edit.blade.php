@extends("la.layouts.app")
<!-- frontpages
slider_images
slider_images -->
@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/slider_images') }}">Front Pages</a> :
@endsection
@section("contentheader_description", $frontpages->$view_col)
@section("section", "Slider Images")
@section("section_url", url(config('laraadmin.adminRoute') . '/slider_images'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Slider Image Edit : ".$frontpages->$view_col)

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
				{!! Form::model($frontpages, ['route' => [config('laraadmin.adminRoute') . '.slider_images.update', $frontpages->id ], 'method'=>'PUT', 'id' => 'slider_images-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'image')
					@la_input($module, 'content')
					@la_input($module, 'description_second')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/slider_images') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<!-- <script src="{{ asset('/tinymce/tinymce.min.js') }}"></script> -->
<script>
$(function () {
    
 //    tinymce.init({
	//   selector: 'textarea',
	//   height: 200,
	//   menubar: false,
	//   plugins: [
	//     'advlist autolink lists link image charmap print preview anchor textcolor',
	//     'searchreplace visualblocks code fullscreen',
	//     'insertdatetime media table contextmenu paste code help wordcount'
	//   ],
	//   toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
	//   content_css: [
	//     '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	//     '//www.tinymce.com/css/codepen.min.css']
	// });
    
	$("#slider_images-edit-form").validate({
		
	});
});
</script>
@endpush
