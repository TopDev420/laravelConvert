@extends("la.layouts.app")

@section("contentheader_title", "Organizations")
@section("contentheader_description", "Organizations listing")
@section("section", "Organizations")
@section("sub_section", "Listing")
@section("htmlheader_title", "Organizations Listing")

@section("headerElems")
@la_access("Organizations", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Organization</button>
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
{{ csrf_token() }}
<meta name="csrf-token" content="{{ csrf_token() }}">
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

@la_access("Organizations", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Organization</h4>
			</div>
			{!! Form::open(['action' => 'LA\OrganizationsController@store', 'id' => 'organization-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'email')
					@la_input($module, 'phone')
					@la_input($module, 'website')
					@la_input($module, 'assigned_to')
					@la_input($module, 'connect_since')
					@la_input($module, 'address')
					@la_input($module, 'city')
					@la_input($module, 'description')
					@la_input($module, 'profile_image')
					@la_input($module, 'profile')
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

<div class="modal fade" id="showkey" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">School Secret Key</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
                   <p><span onclick="copyToClipboard(this)" id="key_val" class="copybutton"></span></p>
                   <button class="btn btn-success btn-xs" id="copytext" type="button" style="margin-top: -23px;">Copy</button>
                   <span id="tell_coyt" style="margin-left: 15px;"></span>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
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
function showKey(key){
	$("#key_val").text(key);
	$("#tell_coyt").text('');
	$('#showkey').modal('show');
}
/*Block School*/
function blockSchool(id,key){
			if ( $("#block_btn_"+id).hasClass( "btn-success" ) ) {
				var action = 'unblock';
			}else{
				var action = 'block';
			}
            $.ajax({
            	headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        },
               type:'POST',
               url:"{{ url(config('laraadmin.adminRoute') . '/blockschool') }}",
               data: {
               		'action' : action,
		            'id': id,
		            'key': key
		        },
               success:function(data){
                  console.log(data);
                  if (data == 'unblocked') {
                  	  $("#block_btn_"+id).addClass('btn-danger');
	                  $("#block_btn_"+id).removeClass('btn-success');
	                  $("#block_btn_"+id).text('block');
                  }else if(data == 'blocked'){
                  	  $("#block_btn_"+id).removeClass('btn-danger');
	                  $("#block_btn_"+id).addClass('btn-success');
	                  $("#block_btn_"+id).text('Unblock');
                  }
                  
               }
            });

}
function viewDashboard(email, pwd){
		$.ajax({
            	headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        },
               type:'POST',
               url:"{{ url(config('laraadmin.adminRoute') . '/blockschool') }}",
               data: {
               		'action' : action,
		            'id': id,
		            'key': key
		        },
               success:function(data){
                  console.log(data);
                  
               }
            });
}
function copyToClipboard(elem) {
	  // create hidden text element, if it doesn't already exist
  var targetId = "_hiddenCopyText_";
  var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
  var origSelectionStart, origSelectionEnd;
  if (isInput) {
      // can just use the original source element for the selection and copy
      target = elem;
      origSelectionStart = elem.selectionStart;
      origSelectionEnd = elem.selectionEnd;
  } else {
      // must use a temporary form element for the selection and copy
      target = document.getElementById(targetId);
      if (!target) {
          var target = document.createElement("textarea");
          target.style.position = "absolute";
          target.style.left = "-9999px";
          target.style.top = "0";
          target.id = targetId;
          document.body.appendChild(target);
      }
      target.textContent = elem.textContent;
  }
  // select the content
  var currentFocus = document.activeElement;
  target.focus();
  target.setSelectionRange(0, target.value.length);
  
  // copy the selection
  var succeed;
  try {
  	  succeed = document.execCommand("copy");
  } catch(e) {
      succeed = false;
  }
  // restore original focus
  if (currentFocus && typeof currentFocus.focus === "function") {
      currentFocus.focus();
  }
  
  if (isInput) {
      // restore prior selection
      elem.setSelectionRange(origSelectionStart, origSelectionEnd);
  } else {
      // clear temporary content
      target.textContent = "";
  }
  if(succeed){
	  $("#tell_coyt").text("Copied..");
   }
  return succeed;
}
$(function () {
	$("#copytext").click(function(){
		$("#key_val").click();
	});
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/organization_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#organization-add-form").validate({
		
	});
});
</script>
@endpush
