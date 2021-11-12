@include('header')
<div id="global-leade-banner" style="background:url({{ asset('new-assets/images/inner-bner.jpg') }}) no-repeat; height:351px;">
 <div class="container">
    <div class="col-md-12 text-center">
	   <div class="dashboard-content">
	        <h1>EXPORTED FILES</h1>
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
							<li>
						     	<a href="http://work4brands.com/glead/savedsearches">Saved Searches</a>
							</li>
							<li class="active">
						     	<a href="http://work4brands.com/glead/downloadfile">Exported files</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_default_4">
								<div class="tab-cnt-detail">
									<h2>Exported Files</h2>
									<p>In this page, you can re-download your previously exported files.</p>
									<table class="savd_info" style="width:100%;float:left;">
										<tr>
											<th></th>
											<th>Downlaod LIst</th>
											<th>Total Contacts</th>
										</tr>
										<?php
										$i=1;
											foreach ($download as $value) {
												$dataid = $value->data_ids;
									            $dataids=explode(",",$dataid);
									            $contactlist = DB::table('businesscontacts')->whereIn('id', $dataids)->get();
									    ?>
										<tr style="line-height: 30px;">
											<td><?php echo $i; ?></td>
											<td>
									        	<a class="export-file" target="_blank" href="{{ url('/exportfile?id='.$dataid) }}" value="<?php echo $dataid; ?>">Export File</a><br>
											</td>
											<td><?php echo $value->totalcontact; ?></td>										
										</tr>
										<?php $i++; } ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> 

@include('footer')
<!-- <script>
$(document).ready(function (){
	$('.export-file').on('click', function(){

	});
});
</script> -->