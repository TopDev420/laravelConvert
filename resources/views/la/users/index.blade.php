@extends("la.layouts.app")

@section("contentheader_title", "Users")
@section("contentheader_description", "users listing")
@section("section", "Users")
@section("sub_section", "Listing")
@section("htmlheader_title", "Users Listing")

@section("headerElems")

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
<style>
#example1 th {
    background-color: #2a72b7;
    color: white;
    border: 1px solid white;
    border-radius: 5px;
    text-align: center;
}
</style>
<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			<th style="text-align:center"><input id="selectAllCheckbox" style="margin-left:auto;margin-right:auto;" type="checkbox"></th>
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
		<div>With selected: <input type="button" value="Send Message" id="SendMsgBtn"></div>
	</div>
</div>

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
        ajax: "{{ url(config('laraadmin.adminRoute') . '/user_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1,0] }],
		@endif
		columnDefs: [ { orderable: false, targets: [0] }],
		order: [[1, 'desc']],
	});
	$("#user-add-form").validate({
		
	});
});
$("#selectAllCheckbox").click(function(e) {
	var checked = $(this).prop('checked');
	if(checked ) {
		$("#example1 input[type=checkbox]").prop('checked',true);
	} else {
		$("#example1 input[type=checkbox]").prop('checked',false);
	}
})
$(document).on('click', '#example1 input[type=checkbox]', function (e) {
	if($(this).attr('id') == 'selectAllCheckbox'){
		return;
	}
	var checked = $(this).prop('checked');
	if(!checked) {
		$("#selectAllCheckbox").prop('checked',false);
	}
	console.log('checkbox clicked');
})
$("#SendMsgBtn").click(function(e) {
	var id = [];
	$("#example1 input[type=checkbox]").each(function(e) {
		if($(this).attr('id') != 'selectAllCheckbox') {
			var checked = $(this).prop('checked');
			if(checked == true) {
				id.push($(this).parents('tr').children('td:eq(1)')[0].innerText);
			}
		}
	})
	if(id.length == 0) {
		alert('Please select user');
	} else {
		var txt;
		var message = prompt("Please enter message:", "");
		if (message == null || message == "") {
			return;
		} else {
			var csrftoken  ='{{ csrf_token() }}';
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': csrftoken
				},
				type:'POST',
				url:'/admin/send_message_multi',
				data: {
					'ids' : JSON.stringify(id),
					'msg' : message
				},
				success:function(data){
					if(data) {
						location.href = "/admin/users";
					}
				}
			});
		}
	}
	console.log(id);
})
</script>
@endpush