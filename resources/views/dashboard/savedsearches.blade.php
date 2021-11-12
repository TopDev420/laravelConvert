@include('header')
<div id="global-leade-banner" style="background:url({{ asset('new-assets/images/inner-bner.jpg') }}) no-repeat; height:351px;">
 <div class="container">
    <div class="col-md-12 text-center">
    	@if($update)
    		<script type="text/javascript">
			    alert("Update Successfully");
		    </script>
    	@endif
	   <div class="dashboard-content">
	        <h1>SAVED SEARCHES</h1>
	   </div>  
	</div>
 </div>
</div>  

<section class="dashboard-admin-details">
	<div class="container">
		<div class="col-md-12">
			<div class="dasboard-admin">
				<div class="tabbable-panel">
					<div class="tabbable-line">
						<ul class="nav nav-tabs ">
							<li>
								<a href="http://work4brands.com/glead/dashboard">Dashboard</a>
							</li>
							<li>
								<a href="http://work4brands.com/glead/profile">Account Details</a>
						  	</li>
							<li class="active">
						     	<a href="http://work4brands.com/glead/savedsearches">Saved Searches</a>
							</li>
							<li>
						     	<a href="http://work4brands.com/glead/downloadfile">Exported files</a>
							</li>
						</ul>
						<div class="tab-content">
							@if($saved=='')
							<div class="tab-pane active" id="tab_default_3">
								<div class="tab-cnt-detail">
									<h2>Saved Searches</h2>
									<p>You can view your previously saved searches and purchase the lists here.</p>
									<h4>You do not have any saved searches yet.</h4>
									<a href="{{ url('/buildlist?'.$currentid) }}" type="button" class="butn-submit">build a list now!</a>
							   	</div>
							</div>
							@else
							<div class="tab-pane active" id="tab_default_3">
								<div class="tab-cnt-detail">
									<h2>Saved Searches</h2>
									<p>You can view your previously saved searches and purchase the lists here.</p>
									
									<table class="savd_info" style="width:100%;float:left;">
										<tr>
											<th>File Name</th>
											<th></th>
										</tr>
										@foreach($saved as $search)

										<tr style="line-height: 30px;">
											<td>
												<h5 class="list_title">{{$search->listname}}</h5><br>
												<div class="rndbtn">
			                                        <button class="rnm" type="button" data-toggle="modal" data-target="#rename_sav{{ $search->id }}">Rename</button>
			                                        |
			                                        <a href="{{ url('/deletesearch/'.$search->id) }}" class="dlt">Delete Search</a>
		                                    	</div>
											</td>
											<td><a href="{{ url('/buildlist?searchid='.$search->id) }}"  class="dahb_seach_btn">Build</a></td>
										</tr>
										<!-- Modal for when user want to rename contactlist name -->
										<div class="modal fade" id="rename_sav{{ $search->id }}" role="dialog" style="margin-top:130px;">
											<div class="modal-dialog">
											  	<div class="modal-content">
											    	<div class="modal-header">
												      	<button type="button" class="close" data-dismiss="modal">&times;</button>
												      	<h3 class="modal-title ren_title">Rename Your Saved Search</h3>
												      	<span class="rnm_cont">You can rename your saved search via input below.</span>
											    	</div>
											    	<form action="{{ url('/renamelist') }}" method="post" role="form">
											    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
												    	<div class="modal-body">
												    		<input type="hidden" name="rowid" class="rowid" value="{{ $search->id }}">
												    		<input  type="text" name="renmlist" value="{{ $search->listname }}" placeholder="Name Your Saved Search" class="rename_list">
												    	</div>
												    	<div class="modal-footer">
												    		<button data-id="{{ $search->id }}" class="rename_save_list">Save</button>
												    	</div>
											    	</form>
											  	</div>
											</div>
										</div>
										
										@endforeach	
									</table>
							   	</div>
							</div>
							@endif
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</section> 

@include('footer')