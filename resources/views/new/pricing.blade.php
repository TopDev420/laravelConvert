@include('header')
<div id="global-leade-banner" style="background:url({{ $pricing->image }}) no-repeat; height:450px;">
 <div class="container">
    <div class="col-md-12 text-center">
	   <div class="banner-conten">
	   <h1>{{ $pricing->title }}</h1>
	   <p>{{ $pricing->monthly_desp_one }}<br>
	   	  {{ $pricing->monthly_dep_two }}</p>
	   </div>
	  
	</div>
 </div>
</div>  
  <section id="our-pricing">
     <div class="container">
	
		<div class="col-md-12">
		<!--main-Tab-->
		<div class="pricing-page-list">
		<div class="web-tabs">
	     <ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
			<a href="#business"  aria-controls="home" role="tab" data-toggle="tab">
			<span class="bag"><img src="{{ asset('/new-assets/images/bags.png') }}" alt=""></span><br><span class="busnes">Business Contacts</span></a></li>
			<li role="presentation" ><a href="#Healthcare" aria-controls="profile" role="tab" data-toggle="tab"><span class="bag"><img src="{{ asset('/new-assets/images/user.png') }}" alt=""></span><br><span class="busnes">BusinessHealthcare</span></a></li>
			<li role="presentation"><a href="#Real" aria-controls="messages" role="tab" data-toggle="tab"><span class="bag"><img src="{{ asset('/new-assets/images/box.png') }}" alt=""></span><br><span class="busnes">Real Estate Agents</span></a></li>
		</ul>
     <!-- main-panes-->
		<div class="tab-content">
		    <!--sub-tabs-->	
			 <div role="tabpanel" class="tab-pane active" id="business">
			         <div class="health-care">
			      <h1>Business Contact</h1>
				   <p>Select your desired category.	</p>
					 <div class="health-butn">
						<ul class="health-btn">
						  <li><a href="{{ url('/joblevel') }}" type="button"  class="helthibtn">By Job Level</a></li>
						   <li><a href="{{ url('/jobtitle') }}" type="button"  class="helthibtn">By Job Title</a></li>
							 <li><a href="{{ url('/industrie') }}" type="button"  class="helthibtn">By Industry</a></li>
							  <li><a href="" type="button"  class="helthibtn">By Country</a></li>
						  </ul>
					 </div>
			     </div>
			  <div class="table-records pricing-table">
				      <table>
						 <thead>
						  <tr>
						   <th colspan="">Records</th>
						   <th>PRICES</th>
						  </tr>
						</thead>
						 <tbody>
						   	<?php
						  	foreach($price_slakes as $queries){
						  		$deleted = $queries->deleted_at;
						  		$types = $queries->types;
						  		if(empty($deleted)){
							  		if($types == 'b_contact'){
							  			$record = $queries->record_range;
							  			$price = $queries->price_range;
						  	?>
							  	<tr>
							   		<td><?php echo $record ?></td>
							   		<td><?php echo $price ?></td>
						 		</tr>
							<?php } } } ?>
						  
						</tbody>
					</table>
                 </div>
			 </div>
			  <div role="tabpanel" class="tab-pane " id="Healthcare">
			     <div class="health-care">
			      <h1>healthcare professionals</h1>
				   <p>Click the button to see the list.</p>
					 <div class="health-butn">
						<a href="{{ url('/healthprofessional') }}" type="button"  class="helthibtn">view healthcare professionals</a>
					 </div>
			     </div>
			  <div class="table-records pricing-table">
				      <table>
						 <thead>
						  <tr>
						   <th colspan="">Records</th>
						   <th>Prices</th>
						  </tr>
						</thead>
						 <tbody>
						 	<?php
						  	foreach($price_slakes as $queries){
						  		$deleted = $queries->deleted_at;
						  		$types = $queries->types;
						  		if(empty($deleted)){
							  		if($types == 'h_contact'){
							  			$record = $queries->record_range;
							  			$price = $queries->price_range;
						  	?> 	
								<tr>
								   <td><?php echo $record ?></td>
								   <td><?php echo $price ?></td>
								</tr>
						    <?php } } } ?>
						  
						</tbody>
					</table>
                 </div>
			</div>
			<div role="tabpanel" class="tab-pane" id="Real">
			   <div class="health-care">
			      <h1>real estate agents</h1>
				   <p>Click the button to see the list.</p>
					 <div class="health-butn">
						<a href="{{ url('/realestateagentdata') }}" type="button"  class="helthibtn">view real estate agents</a>
					 </div>
			     </div>
			  <div class="table-records pricing-table">
				      <table>
						 <thead>
						  <tr>
						   <th colspan="">Records</th>
						   <th>Prices</th>
						  </tr>
						</thead>
						 <tbody>
						   	<?php
						  	foreach($price_slakes as $queries){
						  		$deleted = $queries->deleted_at;
						  		$types = $queries->types;
						  		if(empty($deleted)){
							  		if($types == 'r_contact'){
							  			$record = $queries->record_range;
							  			$price = $queries->price_range;
						  	?>
							<tr>
							   <td><?php echo $record ?></td>
							   <td><?php echo $price ?></td>
						    </tr>
							<?php } } } ?>
						</tbody>
					</table>
                 </div>
			
			
			</div>
			</div>
			<!--sub-tabs-content-->	
		</div>
       </div> 
     </div>

     <div class="col-md-12">
	    <div class="gurantee">
		    <h1>{{ $pricing->pricetitle }}</h1>
			<p>{{ $pricing->pricecont }}</p>
		</div>
	 </div>
	 
    </div>                      
   </div>                      
 </div>
</div>
</div>
 </section>
	  
	     <section id="create-own">
			  <div class="container">
				<div class="col-md-8">
				  <div class="Creat-your">
				          <h1>Creat<br>
						   your<br>
						   own<br>
						  </h1>
				  </div>
				  <p>{{ $pricing->Cretcontent }}</p>
				</div>
			   <div class="col-md-4">
				<div class="Creat-your-btn">
				  <a href="{{ url('/buildlist') }}" type="button" class="build-lista">BUILD A LIST</a>
				</div>
			   </div>
		 </section>
	  
  @include('footer')