@include('header')

<div id="global-leade-banner" style="background:url({{ $buildlist->image }}) no-repeat; height:450px;">
 	<div class="container">
	    <div class="col-md-12 text-center">
		   <div class="banner-conten">
		    <h1>{{ $buildlist->title }}</h1>
		    <p>{{ $buildlist->monthly_desp_one }}<br>
	          {{ $buildlist->monthly_dep_two }}
	      	</p>
		   </div>
		  
		</div>
 	</div>
</div>	
<div id="overlay"></div>
<?php
$searchid = '';
if(isset($_GET['searchid'])){
	$searchid = $_GET['searchid']; 
}
$serchinfo = DB::table('savesearch')->where('id', $searchid)->first();
?>
<input type="hidden" id="type_filter" value="">
<input type="hidden" id="currnt_usr" value="{{ $currentid }}">
<input type="hidden" class="serch" value="<?php echo $searchid; ?>">
<section class="filter-list company-flterlst">
    <div class="container">
    	<div class="col-md-12">
			<!--main-Tab-->
			<div class="pricing-page-list">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#businesscontact"  aria-controls="home" role="tab" data-toggle="tab"><span class="busnes">Business Contacts</span></a>
				    </li>
					<li role="presentation" >	
						<a href="#Healthcare1" aria-controls="profile" role="tab" data-toggle="tab"><span class="busnes">Healthcare</span></a>
					</li>
					<li role="presentation">
						<a href="#Realestate" aria-controls="messages" role="tab" data-toggle="tab"><span class="busnes">Real Estate Agents</span></a>
					</li>
				</ul>
				
				<div class="tool-top">
					<div class="tool-topinner">
						<div class="col-md-7  rightheader">
						 	<ul class="contact-list">
						 		<?php 
						 		if(!empty($serchinfo)){
								    
								    $totlacontact = $serchinfo->totlacontact;
								?>
								    <li><span class="tool-top-bar__contacts gap-right"><input type="hidden" class="contact_count" value="<?php echo $totlacontact; ?>"><span class="contact_count"><?php echo $totlacontact; ?></span> Contacts</span></li>
								<?php } else { ?>
								    <li><span class="tool-top-bar__contacts gap-right"><input type="hidden" class="contact_count" value=""><span class="contact_count"></span> Contacts</span></li>

								<?php }
						 		?>
						    	
						    	<li><a href="{{url('/')}}{{ Storage::disk('local')->url('documents/builtlistsample.csv')}}" type="button" class="dbtn" download><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i>Download A Sample</a></li>
						    	<?php if($currentid == ''){ ?>
						    		<form
								<li><button type="button" class="dbtn savedsearch" ><i class="fa fa-floppy-o" aria-hidden="true"></i>Save This List</button></li>
								<?php } else { ?>
								<li><button type="button" class="dbtn savedsearch" data-toggle="modal" data-target="#saved"><i class="fa fa-floppy-o" aria-hidden="true"></i>Save This List</button></li>
								<?php } ?>
						 	</ul>
						</div>
						<div class="col-md-5 rightheader">
							<ul class="contactlist-1">
								<?php 
						 		if(!empty($serchinfo)){ 
						 			$totalamt = $serchinfo->totalamt;
						 		?>
						 			<li><span class="tool-top-bar__price gap-right list_amount" name="amount"><input type="hidden" class="counts_price" value="<?php echo $totalamt; ?>"><span class="counts_price"><?php echo $totalamt; ?></span></span></li>

						 		<?php } else { ?>

						 			<li><span class="tool-top-bar__price gap-right list_amount" name="amount"><input type="hidden" class="counts_price" value=""><span class="counts_price"></span></span></li>

						 		<?php } ?>

						 		@if(!empty($currentid))
						 		<form action="{{ url('/payment') }}" method="GET" id="buysearch">
						 			<li><button type="submit" class="priceicart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Buy This List</button></li>
						 		</form>
						 		@else
						 			<li><button type="submit" class="priceicart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Buy This List</button></li>
						 		@endif
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="businesscontact">
			      	<div class="col-md-3">
					    <div class="filter-bg">
						   	<div class="tittle">
							  	<ul class="right-list" id="find-results-check">

							  		

							  		<li class="">
										<label>Select Job-level</label>
										<a href="#div_job" class="over" onclick="toggleVisibility('div_job', 'joblevels');" type="button" data-box="div_job">Select Job-level<span id="joblevels_number"></span><span class="pull-right">
										<i class="fa fa-bars" aria-hidden="true"></i> </span></a>
									  	<div class="right-appera-box"  id="div_job">
		                              		<div class="serch-main">
									   			<div class="search box">
									    			<h4 style="font-weight: bold;text-transform: uppercase;color: #000;">Select Industries</h4>
										    		<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px; margin: 15px 0 10px 0;">You can select one or more joblevels.</p>
													<div class="form-group frmgp"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."><span class="fasearchs"><i class="fa fa-search" aria-hidden="true"></i></span></div>

		                                        	<ul id="myUL">
		                                         	@foreach($filter_jobs as $filter_job)
		                                         		<li><a href="javascript:void(0)"><input class="filter_result" name="joblevels" value="{{$filter_job}}" type="checkbox" id="joblevels_checkbox" data-id="joblevels"><label>{{$filter_job}}</label></a></li>
													@endforeach
													</ul> 
										    	</div>
												<div class="include-selected pull-right">
												    <span style="cursor:pointer;" class="Include-btn include_ind include"><i class="fa fa-check" aria-hidden="true"></i>Include</span>
													<span class="Include-btn red"><i class="fa fa-times" aria-hidden="true"></i>Exclude</span>
											  	</div>
										 	</div>
									        <div class="searchbox-01">
											  	<h4 style="font-weight: bold;text-transform: uppercase;color: #000;">Select Industries</h4>
											  	<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px;">You can select one or more industries.</p>
											  	<div class="after-selected-item">
											     	<div class="form-group selected_value" id="selected_value">
											     	<ul class="joblevels">

											     	</ul>
												   	<p class="joblevels_count">There is no Selected item</p>
												 	</div>
											  	</div>
										    </div>
							      		</div>
									</li>


									<li class="">
										<label>Select Job-function</label>
										<a href="#div_jobfunction" class="over" onclick="toggleVisibility('div_jobfunction', 'Jobfunctions');" type="button" data-box="div_jobfunction">Select Job-function<span id="Jobfunctions_number"></span><span class="pull-right">
										<i class="fa fa-bars" aria-hidden="true"></i> </span></a>
									  	<div class="right-appera-box"  id="div_jobfunction">
		                              		<div class="serch-main">
									   			<div class="search box">
									    			<h4 style="font-weight: bold;text-transform: uppercase;color: #000;">Select Job-function</h4>
										    		<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px; margin: 15px 0 10px 0;">You can select one or more joblevels.</p>
													<div class="form-group frmgp"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."><span class="fasearchs"><i class="fa fa-search" aria-hidden="true"></i></span></div>

		                                        	<ul id="myUL">
		                                         	@foreach($filter_jobfuns as $filter_jobf)
		                                         		<li><a href="javascript:void(0)"><input class="filter_result" name="Jobfunctions" value="{{$filter_jobf}}" type="checkbox" id="joblevels_checkbox" data-id="Jobfunctions"><label>{{$filter_jobf}}</label></a></li>
													@endforeach
													</ul> 
										    	</div>
												<div class="include-selected pull-right">
												    <span style="cursor:pointer;" class="Include-btn include_ind include"><i class="fa fa-check" aria-hidden="true"></i>Include</span>
													<span class="Include-btn red"><i class="fa fa-times" aria-hidden="true"></i>Exclude</span>
											  	</div>
										 	</div>
									        <div class="searchbox-01">
											  	<h4 style="font-weight: bold;text-transform: uppercase;color: #000;">Select Industries</h4>
											  	<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px;">You can select one or more industries.</p>
											  	<div class="after-selected-item">
											     	<div class="form-group selected_value" id="selected_value">
											     	<ul class="Jobfunctions">

											     	</ul>
												   	<p class="Jobfunctions_count">There is no Selected item</p>
												 	</div>
											  	</div>
										    </div>
							      		</div>
									</li>	

		                            <li class="">
										<label>Select Industry</label>
										<a href="#div1" class="over" onclick="toggleVisibility('div1', 'industry');" type="button" data-box="div1">Select Industry<span id="industry_number"></span><span class="pull-right">
										<i class="fa fa-bars" aria-hidden="true"></i> </span></a>
									  	<div class="right-appera-box"  id="div1">
		                              		<div class="serch-main">
									   			<div class="search box">
									    			<h4 style="font-weight: bold;text-transform: uppercase;color: #000;">Select Industries</h4>
										    		<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px; margin: 15px 0 10px 0;">You can select one or more industries.</p>
													<div class="form-group frmgp"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."><span class="fasearchs"><i class="fa fa-search" aria-hidden="true"></i></span></div>

		                                        	<ul id="myUL">
		                                         	@foreach($filter_indus as $indus)
		                                         		<li><a href="javascript:void(0)"><input class="filter_result" name="indus" value="{{$indus}}" type="checkbox" id="industry_checkbox" data-id="industry"><label>{{$indus}}</label></a></li>
													@endforeach
													</ul> 
										    	</div>
												<div class="include-selected pull-right">
												    <span style="cursor:pointer;" class="Include-btn include_ind include"><i class="fa fa-check" aria-hidden="true"></i>Include</span>
													<span class="Include-btn red"><i class="fa fa-times" aria-hidden="true"></i>Exclude</span>
											  	</div>
										 	</div>
									        <div class="searchbox-01">
											  	<h4 style="font-weight: bold;text-transform: uppercase;color: #000;">Select Industries</h4>
											  	<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px;">You can select one or more industries.</p>
											  	<div class="after-selected-item">
											     	<div class="form-group selected_value" id="selected_value">
											     	<ul class="industry">

											     	</ul>
												   	<p class="industry_count">There is no Selected item</p>
												 	</div>
											  	</div>
										    </div>
							      		</div>
									</li>

									<li class="nav-link">
									  	<label>Company Name</label>
									  	<a  href="#div2" class="over"  onclick="toggleVisibility('div2', 'company');" type="button" data-box="div2"> Company name <span id="company_number"></span> <span class="pull-right">
									  	<i class="fa fa-bars" aria-hidden="true"></i></span></a>
									    <div class="right-appera-box"  id="div2">
											<div class="serch-main">
									   			<div class="search box">
									    			<h4 style="font-weight: bold;text-transform: uppercase;color: #000;">Select company name</h4>
										    		<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px; margin: 15px 0 10px 0;">Please type a company name to filter</p>
													<div class="form-group frmgp"><input type="text" class="filter_result comny" data-id="company" name="company_name" id="myInput" onkeyup="myFunction()" placeholder="Enter Company name.."><span class="fasearchs"></span></div>
										     	</div>
											 	<div class="include-selected pull-right">
												    <span style="cursor:pointer;" class="Include-btn ind_incude include"><i class="fa fa-check" aria-hidden="true"></i>Include</span>
													<span class="Include-btn red"><i class="fa fa-times" aria-hidden="true"></i>Exclude</span>
												</div>
										 	</div>
								        	<div class="searchbox-01">
										  		<h4 style="font-weight: bold;text-transform: uppercase;color: #000; margin: 15px 0 10px 0;">Select company name</h4>
										  		<div class="after-selected-item">
										     		<div class="form-group selected_value" id="selected_value">
										     			<ul class="company">

										     			</ul>
											   			<p class="company_count">There is no Selected item</p>
													 </div>
										  		</div>
								    		</div>
							      		</div>
									</li>

									<div class="job-level second">
										<div class="">
											<label>Update</label>
									   		<span class="text-semibold">Employee Range</span>
									   		<span class="pull-right">0 - 1B</span>
										  	<div class="col-md-6 paddzero"> 
										    	<input class="form__control range" placeholder="Minimum" value="" type="text"  id="first_range">
										  	</div>
										   	<div class="col-md-6  paddzero"> 
										     	<input class="form__control range" placeholder="Maximium" value="" type="text" id="second_range">
										  	</div>
										  	<input type="button" value="Update" class="filter_employee" data-id="employee" name="employeeupdate">
										</div>
								
									  	<div class="">
									    	<label>Update</label>
									   		<span class="text-semibold">Revenue Range</span>
									  	 	<span class="pull-right">0 - 1T</span>
										  	<div class="col-md-6 paddzero"> 
										    	<input class="form__control range" placeholder="Minimum" value="" type="text" id="first_revenue">
										  	</div>
										   	<div class="col-md-6  paddzero"> 
										     	<input class="form__control range" placeholder="Maximium" value="" type="text" id="second_revenue">
										  	</div>
										 	<input type="submit" value="Update" class="filter_employee" data-id="revenue" name="revenueupdate">
										</div>
									</div>

								    
									<div class="all-location">
										<li class="">
											<label>Select Country</label>
											<a href="#div3" class="over" onclick="toggleVisibility('div3', 'country');" type="button" data-box="div3">Select Country<span id="country_number"></span><span class="pull-right">
											<i class="fa fa-bars" aria-hidden="true"></i> </span></a>
										  	<div class="right-appera-box"  id="div3">
			                              		<div class="serch-main">
										   			<div class="search box">
										    			<h4 style="font-weight: bold;text-transform: uppercase;color: #000;">Select Country</h4>
											    		<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px; margin: 15px 0 10px 0;">By default only one country (United State)..</p>
														<div class="form-group frmgp"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."><span class="fasearchs"><i class="fa fa-search" aria-hidden="true"></i></span></div>

			                                        	<ul id="myUL">
			                                         	@foreach($filter_contry as $indus)
			                                         		@if($indus=='United States')
			                                         			<li><a href="javascript:void(0)"><input class="filter_result" name="count" checked value="{{$indus}}" type="checkbox" id="country_checkbox" data-id="country"><label>{{$indus}}</label></a></li>
			                                         		@else
			                                         			<li><a href="javascript:void(0)"><input class="filter_result" name="count" value="{{$indus}}" type="checkbox" id="country_checkbox" data-id="country"><label>{{$indus}}</label></a></li>
			                                         		@endif	
														@endforeach
														</ul> 
											    	</div>
													<div class="include-selected pull-right">
													    <span style="cursor:pointer;" class="Include-btn include_ind include"><i class="fa fa-check" aria-hidden="true"></i>Include</span>
														<span class="Include-btn red"><i class="fa fa-times" aria-hidden="true"></i>Exclude</span>
												  	</div>
											 	</div>
										        <div class="searchbox-01">
												  	<h4 style="font-weight: bold;text-transform: uppercase;color: #000;">Select Industries</h4>
												  	<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px;">You can select one or more industries.</p>
												  	<div class="after-selected-item">
												     	<div class="form-group selected_value" id="selected_value">
												     	<ul class="country">

												     	</ul>
													   	<p class="country_count">There is no Selected item</p>
													 	</div>
												  	</div>
											    </div>
								      		</div>
										</li>

										<li class="nav-link loca-tion">
										   	<label>State</label> 
										  	<a  href="#div4" class="over" onclick="toggleVisibility('div4' , 'state');" type="button" data-box="div4">State<span id="state_number"></span><span class="pull-right"><i class="fa fa-bars" aria-hidden="true"></i></span></a>
										  	<div class="right-appera-box"  id="div4">
												<div class="serch-main">
										   			<div class="search box">
										    			<h4 style="font-weight: bold;text-transform: uppercase;color: #000;">Select State  </h4>
											    		<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px; margin: 15px 0 10px 0;">You can select one or more state.</p>
														<div class="form-group frmgp"><input type="text"  id="myInput" onkeyup="myFunction()" placeholder="Search for names.."><span class="fasearchs"><i class="fa fa-search" aria-hidden="true"></i></span></div>

			                                         	<ul id="myUL">
			                                         	@foreach($filter_state as $stat)
														  	<li><a href="javascript:void(0)"><input data-id="state" class="filter_result" value="{{ $stat }}" name="state" type="checkbox"><label>{{ $stat }}</label></a></li>
														@endforeach
													  	</ul> 
											     	</div>
												 	<div class="include-selected pull-right">
													    <span style="cursor:pointer;" class="Include-btn include"><i class="fa fa-check" aria-hidden="true"></i>Include</span>
														<span class="Include-btn red"><i class="fa fa-times" aria-hidden="true"></i>Exclude</span>
													</div>
											 	</div>
									        	<div class="searchbox-01">
											  		<h4 style="font-weight: bold;text-transform: uppercase;color: #000; margin: 15px 0 10px 0;">Select State</h4>
											  		<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px;">You can select one or more state.</p>
											  		<div class="after-selected-item">
											     		<div class="form-group selected_value" id="selected_value">
													     	<ul class="state">

													     	</ul>
												   			<p class="state_count">There is no Selected item</p>
												 		</div>
											  		</div>
										    	</div>
								      		</div>
										</li>

										<li class="nav-link loca-tion">
										  	<label>City</label>
										  	<a class="over" href="#div5" onclick="toggleVisibility('div5', 'city');" type="button" data-box="div4">City<span id="city_number"></span> <span class="pull-right">
										   	<i class="fa fa-bars" aria-hidden="true"></i></span></a>
										  	<div class="right-appera-box"  id="div5">
												<div class="serch-main">
										   			<div class="search box">
										    			<h4 style="font-weight: bold;text-transform: uppercase;color: #000; margin: 15px 0 10px 0;">Select Cities</h4>
											    		<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px;">You can select one or more cities.</p>
														<div class="form-group frmgp"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."><span class="fasearchs"><i class="fa fa-search" aria-hidden="true"></i></span></div>

				                                        <ul id="myUL">
				                                         	@foreach($filter_city as $cities)
															  	<li><a href="javascript:void(0)"><input class="filter_result" data-id="city" value="{{ $cities }}" name="city" type="checkbox"><label>{{ $cities }}</label></a></li>
															@endforeach
														</ul> 
											     	</div>
												 	<div class="include-selected pull-right">
													    <span style="cursor:pointer;" class="Include-btn include"><i class="fa fa-check" aria-hidden="true"></i>Include</span>
														<span class="Include-btn red"><i class="fa fa-times" aria-hidden="true"></i>Exclude</span>
													</div>
											 	</div>
									        	<div class="searchbox-01">
											  		<h4 style="font-weight: bold;text-transform: uppercase;color: #000;">Select cities</h4>
											  		<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px;">You can select one or more cities.</p>
											  		<div class="after-selected-item">
											     		<div class="form-group selected_value citi" id="selected_value">
													     	<ul class="city">

													     	</ul>
												   			<p class="city_count">There is no Selected item</p>
												 		</div>
											  		</div>
												</div>
								      		</div>
										</li>

										<li class="nav-link loca-tion">
										  	<label>Zipcode</label>
										  	<a  href="#div6" class="over"  onclick="toggleVisibility('div6', 'zipcode');" type="button" data-box="div6"> Zipcode<span id="zipcode_number"></span> <span class="pull-right"><i class="fa fa-bars" aria-hidden="true"></i></span></a>
										    <div class="right-appera-box"  id="div6">
												<div class="serch-main">
										   			<div class="search box">
										    			<h4 style="font-weight: bold;text-transform: uppercase;color: #000;">Select Zipcode</h4>
											    		<p style="color: #333; marign:20px 0 40px 0; color: #444; font-size: 18px; margin: 15px 0 10px 0;">Please type a zipcode to filter</p>
														<div class="form-group frmgp">
															<input type="text" class="filter_result zipcod" data-id="zipcode" name="zipcode" id="myInput" onkeyup="myFunction()" placeholder="Enter zipcode.."><span class="fasearchs"></span>
														</div>
									     			</div>
													<div class="include-selected pull-right">
													    <span style="cursor:pointer;" class="Include-btn ind_incude include"><i class="fa fa-check" aria-hidden="true"></i>Include</span>
														<span class="Include-btn red"><i class="fa fa-times" aria-hidden="true"></i>Exclude</span>
												  	</div>
											 	</div>
										        <div class="searchbox-01">
												  	<h4 style="font-weight: bold;text-transform: uppercase;color: #000; margin: 15px 0 10px 0;">Select zipcode</h4>
												  	<div class="after-selected-item">
												     	<div class="form-group selected_value" id="selected_value">
												     		<ul class="zipcode">
												     		</ul>
													   		<p class="zipcode_count">There is no Selected item</p>
													 	</div>
												  	</div>
											    </div>
								      		</div>
										</li>
									</div>
	                        	</ul>
							</div>
						</div>
					
				        
					</div>
			     	
				    <div class="col-md-9">
				    	<!-- Show All selected value -->
				    	<div class="all-seleted-value">
				     		<ul class="all_selected_valu" id="allseclectvalu">
				     				<div class="row">
				     				
				     				<div class="col-md-12">
				     					<div class="tags" style="margin-bottom: 0px;"><strong class="text-success">include</strong>
				     						<span class="tag"> <span  new-data="United States" data-id="country" > Country: United States
				     							<button type="button" class="removeBox fa fa-times"></button>
				     						</span></span>
				     						<span class="all_selected_value">
											@if(  !empty ($filter_data))
												@foreach ($filter_data as $p=>$value)
													@foreach ($value as $q=>$val)
														<li class="filter-save-data" new-data="{{$val}}" data-id="{{$p}}">{{$val}} <button type="button" class="removefiles fa fa-times "></button></li>
													@endforeach
												@endforeach
											@endif
				     						</span>
				     						<span class="remove-button"><button type="button" class="button button--octonary button--xsmall tags__remove-all-btn remove-tags">Clear All Filters
				     						</button></span>
				     					</div>
				     				</div>
				     					</div>
				     		</ul>
				     		<ul class="all_selected_values" id="allseclectvalues4">
				     				
				     		</ul>
				     	</div>
					 <div class="tag-list">
					 	
						  	<table class="table">
	                               <thead>
								    <tr>
										<th>Direct Email</th>
										<th>Contact Name</th>
										<th>Company Name</th>
										<th>Job Title</th>
										<th>Country & City</th>
								  	</tr>
								</thead>
								<tbody id="filtered_result">
									
									@foreach($business_contacts as $row)
									<tr>
										
										<td>{{ $row->email_address }}</td>
										<td>{{ $row->last_name }}</td>
										<td>{{ $row->company_name }}</td>
										<td>{{ $row->job_title }}</td>
										<td>{{ $row->country }}<br>
											{{ $row->city }}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
					    </div>   
				    </div>
				</div>
	        
				<div role="tabpanel" class="tab-pane " id="Healthcare1">
					<div class="col-md-3">
					    <div class="filter-bg" >	
							<div class="job-level second">
							    <h3>Company</h3>
							    <input type="text" placeholder="Enter Company Name" class="filter_result" data-id="company">
							</div>
							<div class="job-level second">
							<h3>Location ?</h3>
							  	<select class="cntry filter_result" data-id="contry">

							  		@foreach($filter_contry as $cnt)
							  		<option value="{{ $cnt }}">{{ $cnt }}</option>
							  		@endforeach
							  	</select>
							   	<select class="cntry filter_result" id="states" data-id="stat">
							   		<option value="">Select State</option>
							   		@foreach($filter_state as $stat)
							    	<option value="{{ $stat }}">{{ $stat }}</option>
							    	@endforeach
							  	</select>
							   	<select class="cntry filter_result" data-id="citi" id="cities">
							   		<option value="">Select City</option>
							   		@foreach($filter_city as $cities)
							    	<option value="{{ $cities }}">{{ $cities }}</option>
							    	@endforeach
							  	</select>
							  	<input type="text" class="filter_result" data-id="zipcod" placeholder="Zipcode">	
						    </div>
						</div>
			     	</div>
			     	<div class="col-md-9">
					    <div class="tag-list">
						  	<table class="table">

								<thead>
								    <tr>
										<th>Direct Email</th>
										<th>Contact Name</th>
										<th>Company Name</th>
										<th>Country & City</th>
										<th>Phone Number</th>
								  	</tr>
								</thead>
								<tbody id="filtered_result">
									
									@foreach($business_contacts as $row)
									<tr>
										
										<td>{{ $row->email_address }}</td>
										<td>{{ $row->last_name }}</td>
										<td>{{ $row->company_name }}</td>
										<td>{{ $row->country }}<br>
											{{ $row->city }}
										</td>
										<td>{{ $row->phone_number }}</td>
									</tr>
									@endforeach
								</tbody>

							</table>
					    </div>   
				    </div>
	            </div>

				<div role="tabpanel" class="tab-pane" id="Realestate">
					<div class="col-md-3">
					    <div class="filter-bg">
							<div class="job-level second">
							    <h3>Company Name</h3>
							    <input type="text" placeholder="Enter Company Name" class="filter_result" data-id="company">
							</div>
							<div class="job-level second">
							<h3>Location ?</h3>
							  	<select class="cntry filter_result" data-id="contry">

							  		@foreach($filter_contry as $cnt)
							  		<option value="{{ $cnt }}">{{ $cnt }}</option>
							  		@endforeach
							  	</select>
							   	<select class="cntry filter_result" id="states" data-id="stat">
							   		<option value="">Select State</option>
							   		@foreach($filter_state as $stat)
							    	<option value="{{ $stat }}">{{ $stat }}</option>
							    	@endforeach
							  	</select>
							   	<select class="cntry filter_result" data-id="citi" id="cities">
							   		<option value="">Select City</option>
							   		@foreach($filter_city as $cities)
							    	<option value="{{ $cities }}">{{ $cities }}</option>
							    	@endforeach
							  	</select>
							  	<input type="text" class="filter_result" data-id="zipcod" placeholder="Zipcode">	
						    </div>
						</div>
			     	</div>
			     	
					<div class="col-md-9">
					    <div class="tag-list">
						  	<table class="table">

								<thead>
								    <tr>
										<th>Direct Email</th>
										<th>Contact Name</th>
										<th>Company Name</th>
										<th>Country & City</th>
										<th>Phone Number</th>
								  	</tr>
								</thead>
								<tbody id="filtered_result">
									
									@foreach($business_contacts as $row)
									<tr>
										
										<td>{{ $row->email_address }}</td>
										<td>{{ $row->last_name }}</td>
										<td>{{ $row->company_name }}</td>
										<td>{{ $row->country }}<br>
											{{ $row->city }}
										</td>
										<td>{{ $row->phone_number }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
					    </div>   
				    </div> 
				</div>
			  <!-- Modal for when user clicked on save search button -->
			  <div class="modal fade" id="saved" role="dialog" style="margin-top:130px;">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h3 class="modal-title">Name Your List</h3>
			          <span>You can give a name to your list or just leave it blank for auto generated one.</span>
			        </div>
			        <div class="modal-body">
			        	<input placeholder="Name of your list" class="form__control full-width gap-bottom list_name" value="" type="text">
			        </div>
			        <div class="modal-footer">
			        	<button class="save_my_list">Save My List</button>
			        </div>
			      </div>
			      
			    </div>
			  </div>
			</div>
		</div>
	</div>
</section>	
  
@include('footer')

<script>
$(document).ready(function () {
	var country_count = 0;
	$('#find-results-check').find('.filter_result:checked').each(function(){
		var incld_value = $(this).val();
		typee = $(this).attr('data-id');
		console.log(typee+''+incld_value);
		if(incld_value=='United States'){
			country_count++;
		}
	});
	if(country_count>0){
		$('.country_count').html("There is "+ country_count +" Selected item"); 
		$('#country_number').html(country_count);
	}
});

var companies = [];
var zipcodes =[];
var save_result_url = 'demobuildlist/';
var setCurrentPage = function(url) {
    $('h2 span').html(url || "/");
    $("#menu-nav a[href='" + url + "']").fadeTo(500, 0.3);
};
function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
// $(document).on('click','.include-run-box',function(){
$(document).on('click','.remove-tags',function(){
    var myNewURL = "demobuildlist"+"/";//the new URL
    window.history.pushState("object or string", "Title", "/" + myNewURL );
	// $('.tags').parent().remove();
	$('.filter_result:checked').each(function(){
		var incld_value = $(this).val();
		
			$(this).prop('checked', false);
		
	});
	$('#selected_value ul li').each(function(){
            
            	$(this).remove();
            
	});
	$('#selected_value  p').each(function(){
            
            	$(this).html('There is no Selected item');
            
	});
	$('.all_selected_value  li').each(function(){
            
            	$(this).remove();
            
	});
	$('.tags span.tag span').each(function(){
            
            	$(this).remove();
            
	});
	$('.text-success').html('');
	$('.tag-list table').hide();
	$(this).remove();
	$('.tag-list').append('<div class="shadow-primary section-flex section-flex--tool-no-result"><div class="full-width section-flex__container"><div class="section-flex__inner"><div class="row"><div class="col-sm-8 col-sm-offset-2"><div><h3 class="primary-title clear-gap-top gap-bottom-small">Welcome to Bookyourdata</h3><p class="gap-bottom-medium">Run an example search for <strong>United States</strong></p></div><button type="button" class="button button--primary include-run-box">Run an Example Search</button></div></div></div></div></div>');
});
$('.remove-serch-fields').on('click', function(){
	var data = $(this).parent().remove();
	var datas = {};
	var result=[];
	var industries=[];
	var states=[];
	var company=[];
	$('.tag-list span[data-id]').each(function(){
		var data1= $(this).attr("data-id");
		var category =  $(this).attr("new-data");
		if(category=='industries'){
			industries.push(data1);
		}else if(category='company'){
			company.push(data1);
		}else if(category='states'){
			states.push(data1);
		}else if(category='city'){
			city.push(data1);
		}
    });
    if(industries != ''){
    	datas['industries']=industries;
    }
    if(company != ''){
    	datas['company']=company;
    }
	// datas['industries']=result;
	console.log(datas);
	if(data.length==1){
		$.ajax({
		    	headers: {
				    'X-CSRF-TOKEN': '{{ csrf_token() }}'
				},
				type:'POST',
					url:"{{ url('/demofilter') }}",
					data: {
						'data':datas,
						'category':1
					},
					success:function(data){
						$('.contact_count').val(data.count);
       		$('.contact_count').text(data.count);
       		$('.counts_price').val(data.price);
       		$('.counts_price').text(data.price);
       		var html ='';
       		$.each(data.result, function( index, value ) {

       			// Display Email In Asterisk Pattern(*)
       			var email = value["email_address"];
       		    var stremail = email.length;
       			var str = '';
       			for(var i=0; i < stremail; i++){
       				if(i < 3 || i > 5 && i != (stremail-2)) {
				       str += '*';
				    } else {
				       str += value["email_address"][i];
				    }
       			}
       			value["email_address"] = str;

       			// Display Lastname In Asterisk Pattern(*)
       			var lastname = value["last_name"];
       			var strlastnm = lastname.length;
       			var str2 = '';
       			for(var j=0; j < strlastnm; j++){
       				if(j < 3 || j > 5 && j != (strlastnm-2)){
       					str2 += '*';
       				}else{
       					str2 += value["last_name"][j];
       				}
       			}
       			value["last_name"] = str2;

       			// Display Company Name In Asterisk Pattern(*)
       			var cmpyname = value["company_name"];
       			var strcmpynm = cmpyname.length;
       			var str3 = '';
       			for(var k=0; k < strcmpynm; k++){
       				if(k < 3 || k > 5 && k != (strcmpynm-2)){
       					str3 += '*';
       				}else{
       					str3 += value["company_name"][k];
       				}
       			}
       			value["company_name"] = str3;

       			html += '<tr>'+
       			'<input type="hidden" class="serchdata" value="'+value["id"]+'">'+
				'<td>'+str+'</td>'+
				'<td>'+str2+'</td>'+
				'<td>'+str3+'</td>'+
				'<td>'+value["job_title"]+'</td>'+
				'<td>'+value["country"]+'<br>'+value["city"]+
				'</td></tr>';
			});
			if (html) {
				
				$('#filtered_result').html(html);

			}else{
				
				$('#filtered_result').html('Not Found');
			}

					}
		    });
	}
})
$('.removeBox ').on('click', function() {

	$('.tag-list').html('');
	$('.all_selected_value').find('.loca-tion').remove(); 
	$('.selected_value').find('.loca-tion').remove();
	$('.loca-tion').hide();
	// console.log(this).parent().val();
	$('div .all-location').find('.filter_result:checked').each(function(){
		console.log($(this).val());
	})
	$('.tag-list').append('<div class="shadow-primary section-flex section-flex--tool-no-result"><div class="full-width section-flex__container"><div class="section-flex__inner"><div class="row"><div class="col-sm-8 col-sm-offset-2"><div><h3 class="primary-title clear-gap-top gap-bottom-small">Welcome to Bookyourdata</h3><p class="gap-bottom-medium">Run an example search for <strong>United States</strong></p></div><button type="button" class="button button--primary">Run an Example Search</button></div></div></div></div></div>');
	
});


$('.include').on('click', function() {
	
	var data = {};
	var state = [];
	var industries = [];
	var city = [];
	var company = [];
	var joblevels= [];
	var job_funtion = [];
	var range={};
	var zipcode = [];
	var filter = '';
	var filter1='';
	var filter_commy1='';
	var count ='';
	var state_count = '';
	var city_count = '';
	var joblevels_counts = '';
	var job_funtion_count = '';
	var zipcode_count = '';
	var company_count = '';
	var zipcode_count = '';
	var filter2=company_filter=filter_company='';

	var url_details = window.location.pathname;
	var type = $('#type_filter').val();
	$('#'+type+'_number').css("z-index", "99999"); 
	 console.log(type);
	//$('.selected_value .'+ type).html('');

	$('#find-results-check').find('.filter_result:checked').each(function(){
		var incld_value = $(this).val();
		typee = $(this).attr('data-id');
		if (/*type =='industry' && */ $(this).val() && typee == 'industry') {
			filter = filter+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry">'+'industry: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}

		if (type =='industry' &&  $(this).val() && typee == 'industry') {console.log('dff');
			filter1 = filter1+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry">'+'industry: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}


		if (type =='country' &&  $(this).val() && typee == 'country') {
			//data['country'] = $(this).val();
			$('.loca-tion').show();
		}
		if (/*type =='country' &&*/  $(this).val() && typee == 'country') {
			//data['country'] = $(this).val();
			$('.loca-tion').show();
		}
		if (/*type =='state' &&*/ $(this).val() && typee == 'state') {
			filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state">'+'State: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}  
		if (type =='state' && $(this).val() && typee == 'state') {
			filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state">'+'State: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}

		if (/*type =='city' &&*/ $(this).val() && typee == 'city') {
			var datas = '';
			filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city">'+'City: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}	
		if (type =='city' && $(this).val() && typee == 'city') {
			var datas = '';
			filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city">'+'City: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}

		if (/*type =='city' &&*/ $(this).val() && typee == 'joblevels') {
			var datas = '';
			filter = filter+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="joblevels">'+'Joblevel: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}	
		if (type =='joblevels' && $(this).val() && typee == 'joblevels') {
			var datas = '';
			filter1 = filter1+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="joblevels">'+'joblevel: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}

		if (/*type =='city' &&*/ $(this).val() && typee == 'Jobfunctions') {
			var datas = '';
			filter = filter+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="Jobfunctions">'+'Jobfunctions: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}	
		if (type =='Jobfunctions' && $(this).val() && typee == 'Jobfunctions') {
			var datas = '';
			filter1 = filter1+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="Jobfunctions">'+'Jobfunctions: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}
	});
	// console.log(filter);

	var zipcod = $('.zipcod').val();
	if(zipcod !=''){
		zipcodes.push(zipcod);
		$('.zipcod').val("");
		
	}
	if(zipcodes.length > 0 && type=='zipcode') {
		$.each(zipcodes,function(index,value){
			if(value== null){
			}else{
				filter = filter+'<li class="filter-save-datav loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times " ></button></li>';
				filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
			}
		});

	}else{

		$.each(zipcodes,function(index,value){
			if(value== null){
			}else{
				filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
			}
		});
	}

	var company_name = $('.comny').val();
	if(company_name!='') {
		companies.push(company_name);
		$('.comny').val("");

	}
	if(companies.length > 0 && type=='company'  ) {
		$.each(companies,function(index,value){
			if(value== null){
			}else{
				filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times loca-tion" ></button></li>';
				filter1 = filter1+'<li class="filter-save-data" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
			}	
		});

	}else{
		$.each(companies,function(index,value){
			if(value== null){
			}else{
				filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
			}
		});
	}

	$('.range').each(function(){
		var type = $(this).attr('id');
		if (type =='first_range' && $(this).val()) {
			range['first_range'] = $(this).val();
		}
		if (type =='second_range' && $(this).val()) {
			range['second_range'] = $(this).val();
		}
		if (type =='first_revenue' && $(this).val()) {
			range['first_revenue'] = $(this).val();
		}
		if (type =='second_revenue' && $(this).val()) {
			range['second_revenue'] = $(this).val();
		}
	});
	console.log(range);
	if(range.first_range != null && range.second_range !=null){console.log('1670');
		filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range.first_range+'-'+range.second_range+'" data-id="Employee_range" > Employee: '+range['first_range']+'-'+range['second_range']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	}else if(range.first_range != null && range.second_range==null){console.log('1671');
		filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range.first_range+'-'+'1B'+'" data-id="Employee_range" > Employee: '+range.first_range+'-'+'1B'+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	}else if(range.first_range == null && range.second_range !=null){
		filter = filter+'<li class="filter-save-data loca-tion"  data-id="Employee_range" > Employee: '+'0'+'-'+range.second_range+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	}
	if(filter != '') {
	  $('.all_selected_value').html('');
	  $('.all_selected_value').append(filter);

    }
    if(filter1 !=''){
    	$('.selected_value .'+ type).html(''); 
    	$('.selected_value .'+ type).append(filter1); 
    }
	$('.all_selected_value li').each(function(){
		var category = $(this).attr('data-id');
		if(category=='industry'){
			//console.log($(this).html());
			industries.push($(this).attr('new-data'));
		}else if(category=='state'){
			state.push($(this).attr('new-data'));
		}else if(category=='city'){
			city.push($(this).attr('new-data'));
		}else if(category=='company'){
			company.push($(this).attr('new-data'));
		}else if(category=='zipcode'){
			zipcode.push($(this).attr('new-data'));
		}else if(category=='joblevels'){
			joblevels.push($(this).attr('new-data'));
		}else if(category=='Jobfunctions'){
			job_funtion.push($(this).attr('new-data'));
		}
		
	});
	Jobfunctions_count = job_funtion.length;
	if(Jobfunctions_count>0){
		$('.Jobfunctions_count').html("There is "+ Jobfunctions_count +" Selected item"); 
		$('#Jobfunctions_number').html(Jobfunctions_count);
	}

	joblevels_counts = joblevels.length;
	if(joblevels_counts>0){
		$('.joblevels_count').html("There is "+ joblevels_counts +" Selected item"); 
		$('#joblevels_number').html(joblevels_counts);
	}
	count = industries.length;
	if(count>0){
		$('.'+type+'_count').html("There is "+ count +" Selected item"); 
		$('#'+type+'_number').html(count); 
	}
	state_count=state.length;
	if(state_count>0){
		$('.'+type+'_count').html("There is "+ state_count +" Selected item"); 
		$('#'+type+'_number').html(state_count); 
	}
	city_count = city.length;
	if(city_count>0){
		$('.city_count').html("There is "+ city_count +" Selected item"); 
		$('#city_number').html(city_count); 
	}
	company_count=companies.length;
	if(company_count>0){
		// company_count
		$('.company_count').html("There is "+ company_count +" Selected item"); 
		$('#company_number').html(company_count);
	}
	zipcode_count =zipcode.length;
	if(zipcode_count>0){
		// company_count
		$('.zipcode_count').html("There is "+ zipcode_count +" Selected item"); 
		$('#zipcode_number').html(zipcode_count);
	}
	
	if(industries!=''){
		data['industries'] = industries;
	}
	if(state!=''){
		data['state'] = state;
	}
	if(company !=''){
		data['company_name'] = company;
	}
	if(city!=''){
		data['city'] = city;
	}
	if(zipcode!=''){
		data['zipcode'] = zipcode;
	}
	if(joblevels != ''){
		data['job_level']=joblevels;
	}
	if(job_funtion != ''){
		data['job_function']=job_funtion;
	}
	if(url_details !=''){
		data['url_details']=url_details;
	}
	$.ajax({
      	headers: {
          	'X-CSRF-TOKEN': '{{ csrf_token() }}'
      	},
       	type:'POST',
       	url:"{{ url('/demofilter') }}",
       	data: {
          	'data': data,
          	'range':range,
      	},
       	success:function(data){
       		//console.log(data);
       		$('.shadow-primary').hide();
       		$('.tag-list table').show();
       		$('.contact_count').val(data.count);
       		$('.contact_count').text(data.count);
       		$('.counts_price').val(data.price);
       		$('.counts_price').text(data.price);
       		var html ='';
       		$.each(data.result, function( index, value ) {

       			// Display Email In Asterisk Pattern(*)
       			var email = value["email_address"];
       		    var stremail = email.length;
       			var str = '';
       			for(var i=0; i < stremail; i++){
       				if(i < 3 || i > 5 && i != (stremail-2)) {
				       str += '*';
				    } else {
				       str += value["email_address"][i];
				    }
       			}
       			value["email_address"] = str;

       			// Display Lastname In Asterisk Pattern(*)
       			var lastname = value["last_name"];
       			var strlastnm = lastname.length;
       			var str2 = '';
       			for(var j=0; j < strlastnm; j++){
       				if(j < 3 || j > 5 && j != (strlastnm-2)){
       					str2 += '*';
       				}else{
       					str2 += value["last_name"][j];
       				}
       			}
       			value["last_name"] = str2;

       			// Display Company Name In Asterisk Pattern(*)
       			var cmpyname = value["company_name"];
       			var strcmpynm = cmpyname.length;
       			var str3 = '';
       			for(var k=0; k < strcmpynm; k++){
       				if(k < 3 || k > 5 && k != (strcmpynm-2)){
       					str3 += '*';
       				}else{
       					str3 += value["company_name"][k];
       				}
       			}
       			value["company_name"] = str3;

       			html += '<tr>'+
       			'<input type="hidden" class="serchdata" value="'+value["id"]+'">'+
				'<td>'+str+'</td>'+
				'<td>'+str2+'</td>'+
				'<td>'+str3+'</td>'+
				'<td>'+value["job_title"]+'</td>'+
				'<td>'+value["country"]+'<br>'+value["city"]+
				'</td></tr>';
			});
			if (html) {
				
				$('#filtered_result').html(html);

			}else{
				
				$('#filtered_result').html('Not Found');
			}
			// var save_result_url='demobuildlist/';
			// var hist = window.history.pushState("object or string", "Title", '');
    		// setCurrentPage(data.save_result_url);
    		const state = '';
			const title = ''
    		let url = 'demobuildlist'+'/'+data.save_result;
    		//var hist = history.replaceState(null, title, url);
    		window.history.pushState(null, null, '/'+url);
        	// navigateToPage();
        	// window.location.hash = '!/'+url ;
    		// console.log(hist);
			//window.history.pushState("object or string", "Title", url);
       	}
    });
});
$(document).on('click','.include-run-box',function(){
	var datas=[];
	$.ajax({
		    	headers: {
				    'X-CSRF-TOKEN': '{{ csrf_token() }}'
				},
				type:'POST',
					url:"{{ url('/demofilter') }}",
					data: {
						'data':datas,
					},
					success:function(data){
						$('.shadow-primary').hide();
						$('.tag-list table').show();
						$('.text-success').html('Include');
						$('.remove-button').html('<button type="button" class="button button--octonary button--xsmall tags__remove-all-btn remove-tags">Clear All Filters</button>');
						var new_country ='<span new-data="United States" data-id="country"> Country: United States<button type="button" class="removeBox fa fa-times"></button>	</span>';
						$('.tag').html(new_country);
								$('.contact_count').val(data.count);
					       		$('.contact_count').text(data.count);
					       		$('.counts_price').val(data.price);
					       		$('.counts_price').text(data.price);
					       		var html ='';

					       		$.each(data.result, function( index, value ) {

					       			// Display Email In Asterisk Pattern(*)
					       			var email = value["email_address"];
					       		    var stremail = email.length;
					       			var str = '';
					       			for(var i=0; i < stremail; i++){
					       				if(i < 3 || i > 5 && i != (stremail-2)) {
									       str += '*';
									    } else {
									       str += value["email_address"][i];
									    }
					       			}
					       			value["email_address"] = str;

					       			// Display Lastname In Asterisk Pattern(*)
					       			var lastname = value["last_name"];
					       			var strlastnm = lastname.length;
					       			var str2 = '';
					       			for(var j=0; j < strlastnm; j++){
					       				if(j < 3 || j > 5 && j != (strlastnm-2)){
					       					str2 += '*';
					       				}else{
					       					str2 += value["last_name"][j];
					       				}
					       			}
					       			value["last_name"] = str2;

					       			// Display Company Name In Asterisk Pattern(*)
					       			var cmpyname = value["company_name"];
					       			var strcmpynm = cmpyname.length;
					       			var str3 = '';
					       			for(var k=0; k < strcmpynm; k++){
					       				if(k < 3 || k > 5 && k != (strcmpynm-2)){
					       					str3 += '*';
					       				}else{
					       					str3 += value["company_name"][k];
					       				}
					       			}
					       			value["company_name"] = str3;

					       			html += '<tr>'+
					       			'<input type="hidden" class="serchdata" value="'+value["id"]+'">'+
									'<td>'+str+'</td>'+
									'<td>'+str2+'</td>'+
									'<td>'+str3+'</td>'+
									'<td>'+value["job_title"]+'</td>'+
									'<td>'+value["country"]+'<br>'+value["city"]+
									'</td></tr>';
								});
								if (html) {
									
									$('#filtered_result').html(html);

								}else{
									
									$('#filtered_result').html('Not Found');
								}
								const state = '';
								const title = ''
					    		let url = 'demobuildlist'+'/'+data.save_result;
					    		//var hist = history.replaceState(null, title, url);
					    		window.history.pushState(null, null, '/'+url);

					}
		    });
});
$(document).on('click','.removefiles',function(){
	var cunrrcategory = $(this).parent().attr("data-id");
	var cunrrcategoryvalue = $(this).parent().attr("new-data");
	console.log(cunrrcategory);
	console.log(cunrrcategoryvalue);
	var url_details = window.location.pathname;

	if(cunrrcategory=='zipcode'){
		$.each(zipcodes,function(index,value){
				if(value==cunrrcategoryvalue){
					delete zipcodes[index];
				}
		});
	}
	if(cunrrcategory=='company'){
		$.each(companies,function(index,value){
				if(value==cunrrcategoryvalue){
					delete companies[index];
				}
		});
	}
	

	$("#selected_value ul."+cunrrcategory+" li").each(function(){
		console.log('select value');
			var categorys = $(this).attr('new-data');
			console.log(categorys);
			// if(cunrrcategoryvalue=='')
            if($(this).attr('new-data')==cunrrcategoryvalue){
            	$(this).remove();
            }
	});

	$('.all_selected_value li').each(function(){
            if($(this).attr('new-data')==cunrrcategoryvalue){
            	$(this).remove();
            }
	});
	$('.filter_result:checked').each(function(){
		var incld_value = $(this).val();
		if(incld_value==cunrrcategoryvalue){
			$(this).prop('checked', false);
		}
	});

	var datas = {};
	var result=[];
	var industries=[];
	var state=[];
	var company=[];
	var city =[];
	var zipcode = [];
	var joblevels = [];
	var job_funtion = [];
	var range = {};

	var count ='';
	var state_count='';
	var city_count='';
	var company_count='';
	var zipcode_count='';
	var joblevels_counts = '';
	var job_funtion_count = '';
	var type = $('#type_filter').val();
	$('.range').each(function(){
		var type = $(this).attr('id');
		if (type =='first_range' && $(this).val()) {
			range['first_range'] = $(this).val();
		}
		if (type =='second_range' && $(this).val()) {
			range['second_range'] = $(this).val();
		}
		if (type =='first_revenue' && $(this).val()) {
			range['first_revenue'] = $(this).val();
		}
		if (type =='second_revenue' && $(this).val()) {
			range['second_revenue'] = $(this).val();
		}
	});
	// console.log(range.second_range);
	// if(range.first_range != null && range.second_range !=null){console.log('1670');
	// 	filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range.first_range+'-'+range.second_range+'" data-id="Employee_range" > Employee: '+range['first_range']+'-'+range['second_range']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	// }else if(range.first_range != null && range.second_range==null){console.log('1671');
	// 	filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range.first_range+'-'+'1B'+'" data-id="Employee_range" > Employee: '+range.first_range+'-'+'1B'+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	// }else if(range.first_range == null && range.second_range !=null){
	// 	filter = filter+'<li class="filter-save-data loca-tion"  data-id="Employee_range" > Employee: '+'0'+'-'+range.second_range+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	// }
	$('#'+type+'_number').css("z-index", "99999"); 
	$('.all_selected_value li').each(function(){
		var category = $(this).attr('data-id');
		if(category=='industry'){
			//console.log($(this).html());
			industries.push($(this).attr('new-data'));
		}else if(category=='state'){
			state.push($(this).attr('new-data'));
		}else if(category=='city'){
			city.push($(this).attr('new-data'));
		}else if(category=='company'){
			company.push($(this).attr('new-data'));
		}else if(category=='zipcode'){
			zipcode.push($(this).attr('new-data'));
		}else if(category=='joblevels'){
			joblevels.push($(this).attr('new-data'));
		}else if(category=='Jobfunctions'){
			job_funtion.push($(this).attr('new-data'));
		}
		
	});


	if(industries!=''){
		datas['industries'] = industries;
	}
	if(state!=''){
		datas['state'] = state;
	}
	if(company !=''){
		datas['company_name'] = company;
	}
	// datas['zipcode'] =industries zipcode
	if(city!=''){
		datas['city'] = city;
	}
	if(joblevels != ''){
		datas['job_level']=joblevels;
	}
	if(job_funtion != ''){
		datas['job_function']=job_funtion;
	}
	if(url_details !=''){
		datas['url_details']=url_details;
	}

	Jobfunctions_count = job_funtion.length;
	if(Jobfunctions_count>0){
		$('.Jobfunctions_count').html("There is "+ Jobfunctions_count +" Selected item"); 
		$('#Jobfunctions_number').html(Jobfunctions_count);
	}else if(state_count==0){console.log('dd');
		$('.Jobfunctions_count').html("There is No Selected item"); 
		$('#Jobfunctions_number').html(''); 
	}

	joblevels_counts = joblevels.length;
	if(joblevels_counts>0){
		$('.joblevels_count').html("There is "+ joblevels_counts +" Selected item"); 
		$('#joblevels_number').html(joblevels_counts);
	}else if(state_count==0){console.log('dd');
		$('.joblevels_count').html("There is No Selected item"); 
		$('#joblevels_number').html(''); 
	}


    count = industries.length;
	state_count=state.length;

	if(state_count>0){
		$('.state_count').html("There is "+ state_count +" Selected item"); 
		$('#state_number').html(state_count); 
	}
	else if(state_count==0){console.log('dd');
		$('.state_count').html("There is No Selected item"); 
		$('#state_number').html(''); 
	}
	if(count>0){
		$('.industry_count').html("There is "+ count +" Selected item"); 
		$('#industry_number').html(count); 
	}
	else if(count==0){
		$('.industry_count').html("There is No Selected item"); 
		$('#industry_number').html(''); 
	}
	city_count = city.length;
	if(city_count>0){
		$('.city_count').html("There is "+ city_count +" Selected item"); 
		$('#city_number').html(city_count); 
	}else if(city_count==0){
		$('.city_count').html("There is No Selected item"); 
		$('#city_number').html(''); 
	}
	company_count=company.length;
	if(company_count>0){
		// company_count
		$('.company_count').html("There is "+ company_count +" Selected item"); 
		$('#company_number').html(company_count);
	}else if(city_count==0){
		$('.company_count').html("There is No Selected item"); 
		$('#company_number').html(''); 
	}
	zipcode_count =zipcode.length;
	if(zipcode_count>0){
		// company_count
		$('.zipcode_count').html("There is "+ zipcode_count +" Selected item"); 
		$('#zipcode_number').html(zipcode_count);
	}else if(zipcode_count==0){
		$('.zipcode_count').html("There is No Selected item"); 
		$('#zipcode_number').html(''); 
	}
	
	
		$.ajax({
		    	headers: {
				    'X-CSRF-TOKEN': '{{ csrf_token() }}'
				},
				type:'POST',
					url:"{{ url('/demofilter') }}",
					data: {
						'data':datas,
						'range':range,
					},
					success:function(data){
						$('.shadow-primary').hide();
						$('.tag-list table').show();
								$('.contact_count').val(data.count);
					       		$('.contact_count').text(data.count);
					       		$('.counts_price').val(data.price);
					       		$('.counts_price').text(data.price);
					       		var html ='';

					       		$.each(data.result, function( index, value ) {

					       			// Display Email In Asterisk Pattern(*)
					       			var email = value["email_address"];
					       		    var stremail = email.length;
					       			var str = '';
					       			for(var i=0; i < stremail; i++){
					       				if(i < 3 || i > 5 && i != (stremail-2)) {
									       str += '*';
									    } else {
									       str += value["email_address"][i];
									    }
					       			}
					       			value["email_address"] = str;

					       			// Display Lastname In Asterisk Pattern(*)
					       			var lastname = value["last_name"];
					       			var strlastnm = lastname.length;
					       			var str2 = '';
					       			for(var j=0; j < strlastnm; j++){
					       				if(j < 3 || j > 5 && j != (strlastnm-2)){
					       					str2 += '*';
					       				}else{
					       					str2 += value["last_name"][j];
					       				}
					       			}
					       			value["last_name"] = str2;

					       			// Display Company Name In Asterisk Pattern(*)
					       			var cmpyname = value["company_name"];
					       			var strcmpynm = cmpyname.length;
					       			var str3 = '';
					       			for(var k=0; k < strcmpynm; k++){
					       				if(k < 3 || k > 5 && k != (strcmpynm-2)){
					       					str3 += '*';
					       				}else{
					       					str3 += value["company_name"][k];
					       				}
					       			}
					       			value["company_name"] = str3;

					       			html += '<tr>'+
					       			'<input type="hidden" class="serchdata" value="'+value["id"]+'">'+
									'<td>'+str+'</td>'+
									'<td>'+str2+'</td>'+
									'<td>'+str3+'</td>'+
									'<td>'+value["job_title"]+'</td>'+
									'<td>'+value["country"]+'<br>'+value["city"]+
									'</td></tr>';
								});
								if (html) {
									
									$('#filtered_result').html(html);

								}else{
									
									$('#filtered_result').html('Not Found');
								}
								const state = '';
								const title = ''
					    		let url = 'demobuildlist'+'/'+data.save_result;
					    		//var hist = history.replaceState(null, title, url);
					    		window.history.pushState(null, null, '/'+url);

					}
		    });
	
})

$('.filter_employee').on('click', function() {
	var datas= {};
	var range={};
	var result=[];
	var industries=[];
	var state=[];
	var company=[];
	var city =[];
	var zipcode = [];
	var joblevels = [];
	var job_funtion = [];

	var count ='';
	var state_count='';
	var city_count='';
	var company_count='';
	var zipcode_count='';
	var joblevels_counts = '';
	var job_funtion_count = '';
	var filter1=filter='';
	var url_details = window.location.pathname;

	$('#type_filter').val($(this).data('id'));
	var type = $('#type_filter').val();
	// console.log(type);
	$('.selected_value .'+ type).html(''); 
	$('#find-results-check').find('.filter_result:checked').each(function(){
		var incld_value = $(this).val();
		typee = $(this).attr('data-id');
		if (/*type =='industry' && */ $(this).val() && typee == 'industry') {
			filter = filter+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry">'+'industry: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}

		if (type =='industry' &&  $(this).val() && typee == 'industry') {console.log('dff');
			filter1 = filter1+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry">'+'industry: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}


		if (type =='country' &&  $(this).val() && typee == 'country') {
			//data['country'] = $(this).val();
			$('.loca-tion').show();
		}
		if (/*type =='country' &&*/  $(this).val() && typee == 'country') {
			//data['country'] = $(this).val();
			$('.loca-tion').show();
		}
		if (/*type =='state' &&*/ $(this).val() && typee == 'state') {
			filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state">'+'State: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}  
		if (type =='state' && $(this).val() && typee == 'state') {
			filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state">'+'State: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}

		if (/*type =='city' &&*/ $(this).val() && typee == 'city') {
			var datas = '';
			filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city">'+'City: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}	
		if (type =='city' && $(this).val() && typee == 'city') {
			var datas = '';
			filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city">'+'City: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}

		if (/*type =='city' &&*/ $(this).val() && typee == 'joblevels') {
			var datas = '';
			filter = filter+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="joblevels">'+'Joblevel: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}	
		if (type =='joblevels' && $(this).val() && typee == 'joblevels') {
			var datas = '';
			filter1 = filter1+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="joblevels">'+'joblevel: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}

		if (/*type =='city' &&*/ $(this).val() && typee == 'Jobfunctions') {
			var datas = '';
			filter = filter+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="Jobfunctions">'+'Jobfunctions: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}	
		if (type =='Jobfunctions' && $(this).val() && typee == 'Jobfunctions') {
			var datas = '';
			filter1 = filter1+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="Jobfunctions">'+'Jobfunctions: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
		}
	});	

	$('.comny').each(function(){
		var incld_value = $(this).val();
		typee = $(this).data('id');
		if (type =='company' && $(this).val() && typee == 'company') {
			company.push($(this).val());
			filter = filter+'<li>'+incld_value+'</li>';
		}
		
	});

	var zipcod = $('.zipcod').val();
	if(zipcod !=''){
		zipcodes.push(zipcod);
		$('.zipcod').val("");
		
	}
	if(zipcodes.length > 0 && type=='zipcode') {
		$.each(zipcodes,function(index,value){
			if(value== null){
			}else{
				filter = filter+'<li class="filter-save-datav loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times " ></button></li>';
				filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
			}
		});

	}else{

		$.each(zipcodes,function(index,value){
			if(value== null){
			}else{
				filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
			}
		});
	}
	var company_name = $('.comny').val();
	if(company_name!='') {
		companies.push(company_name);
		$('.comny').val("");

	}
	if(companies.length > 0 && type=='company'  ) {
		$.each(companies,function(index,value){
			if(value== null){
			}else{
				filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times loca-tion" ></button></li>';
				filter1 = filter1+'<li class="filter-save-data" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
			}	
		});

	}else{
		$.each(companies,function(index,value){
			if(value== null){
			}else{
				filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
			}
		});
	}
	$('.range').each(function(){
		var type = $(this).attr('id');
		if (type =='first_range' && $(this).val()) {
			range['first_range'] = $(this).val();
		}
		if (type =='second_range' && $(this).val()) {
			range['second_range'] = $(this).val();
		}
		if (type =='first_revenue' && $(this).val()) {
			range['first_revenue'] = $(this).val();
		}
		if (type =='second_revenue' && $(this).val()) {
			range['second_revenue'] = $(this).val();
		}
	});
	console.log(range.second_range);
	if(range.first_range != null && range.second_range !=null){console.log('1670');
		filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range.first_range+'-'+range.second_range+'" data-id="Employee_range" > Employee: '+range['first_range']+'-'+range['second_range']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	}else if(range.first_range != null && range.second_range==null){console.log('1671');
		filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range.first_range+'-'+'1B'+'" data-id="Employee_range" > Employee: '+range.first_range+'-'+'1B'+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	}else if(range.first_range == null && range.second_range !=null){
		filter = filter+'<li class="filter-save-data loca-tion"  data-id="Employee_range" > Employee: '+'0'+'-'+range.second_range+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	}
	console.log(filter);
	if(filter != '') {
	  $('.all_selected_value').html('');
	  $('.all_selected_value').append(filter);

    }
    if(filter1 !=''){
    	$('.selected_value .'+ type).html(''); 
    	$('.selected_value .'+ type).append(filter1); 
    }
	$('#'+type+'_number').css("z-index", "99999"); 
	$('.all_selected_value li').each(function(){
		var category = $(this).attr('data-id');
		if(category=='industry'){
			//console.log($(this).html());
			industries.push($(this).attr('new-data'));
		}else if(category=='state'){
			state.push($(this).attr('new-data'));
		}else if(category=='city'){
			city.push($(this).attr('new-data'));
		}else if(category=='company'){
			company.push($(this).attr('new-data'));
		}else if(category=='zipcode'){
			zipcode.push($(this).attr('new-data'));
		}else if(category=='joblevels'){
			joblevels.push($(this).attr('new-data'));
		}else if(category=='Jobfunctions'){
			job_funtion.push($(this).attr('new-data'));
		}
		
	});

	if(industries!=''){
		datas['industries'] = industries;
	}
	if(state!=''){
		datas['state'] = state;
	}
	if(company !=''){
		datas['company_name'] = company;
	}
	// datas['zipcode'] =industries zipcode
	if(city!=''){
		datas['city'] = city;
	}
	if(joblevels != ''){
		datas['job_level']=joblevels;
	}
	if(job_funtion != ''){
		datas['job_function']=job_funtion;
	}
	if(url_details !=''){
		datas['url_details']=url_details;
	}

	Jobfunctions_count = job_funtion.length;
	if(Jobfunctions_count>0){
		$('.Jobfunctions_count').html("There is "+ Jobfunctions_count +" Selected item"); 
		$('#Jobfunctions_number').html(Jobfunctions_count);
	}else if(state_count==0){console.log('dd');
		$('.Jobfunctions_count').html("There is No Selected item"); 
		$('#Jobfunctions_number').html(''); 
	}

	joblevels_counts = joblevels.length;
	if(joblevels_counts>0){
		$('.joblevels_count').html("There is "+ joblevels_counts +" Selected item"); 
		$('#joblevels_number').html(joblevels_counts);
	}else if(state_count==0){console.log('dd');
		$('.joblevels_count').html("There is No Selected item"); 
		$('#joblevels_number').html(''); 
	}


    count = industries.length;
	state_count=state.length;

	if(state_count>0){
		$('.state_count').html("There is "+ state_count +" Selected item"); 
		$('#state_number').html(state_count); 
	}
	else if(state_count==0){console.log('dd');
		$('.state_count').html("There is No Selected item"); 
		$('#state_number').html(''); 
	}
	if(count>0){
		$('.industry_count').html("There is "+ count +" Selected item"); 
		$('#industry_number').html(count); 
	}
	else if(count==0){
		$('.industry_count').html("There is No Selected item"); 
		$('#industry_number').html(''); 
	}
	city_count = city.length;
	if(city_count>0){
		$('.city_count').html("There is "+ city_count +" Selected item"); 
		$('#city_number').html(city_count); 
	}else if(city_count==0){
		$('.city_count').html("There is No Selected item"); 
		$('#city_number').html(''); 
	}
	company_count=company.length;
	if(company_count>0){
		// company_count
		$('.company_count').html("There is "+ company_count +" Selected item"); 
		$('#company_number').html(company_count);
	}else if(city_count==0){
		$('.company_count').html("There is No Selected item"); 
		$('#company_number').html(''); 
	}
	zipcode_count =zipcode.length;
	if(zipcode_count>0){
		// company_count
		$('.zipcode_count').html("There is "+ zipcode_count +" Selected item"); 
		$('#zipcode_number').html(zipcode_count);
	}else if(zipcode_count==0){
		$('.zipcode_count').html("There is No Selected item"); 
		$('#zipcode_number').html(''); 
	}
	// $('.all_selected_value li').each(function(){
	// 	var category = $(this).attr('data-id');
	// 	if(category=='industry'){
	// 		//console.log($(this).html());
	// 		industries.push($(this).attr('new-data'));
	// 	}else if(category=='state'){
	// 		state.push($(this).attr('new-data'));
	// 	}else if(category=='city'){
	// 		city.push($(this).attr('new-data'));
	// 	}else if(category=='company'){
	// 		company.push($(this).attr('new-data'));
	// 	}else if(category=='zipcode'){
	// 		zipcode.push($(this).attr('new-data'));
	// 	}
		
	// });

	
	
	console.log(datas);
	$.ajax({
	headers: {
	    'X-CSRF-TOKEN': '{{ csrf_token() }}'
	},
	type:'POST',
		url:"{{ url('/demofilter') }}",
		data: {
	  	'data': datas,
	  	'range': range
		},
		success:function(data){
			$('.contact_count').val(data.count);
       		$('.contact_count').text(data.count);
       		$('.counts_price').val(data.price);
       		$('.counts_price').text(data.price);
			var html ='';
			$.each(data.result, function( index, value ) {
				// Display Email In Asterisk Pattern(*)
       			var email = value["email_address"];
       		    var stremail = email.length;
       			var str = '';
       			for(var i=0; i < stremail; i++){
       				if(i < 3 || i > 5 && i != (stremail-2)) {
				       str += '*';
				    } else {
				       str += value["email_address"][i];
				    }
       			}
       			value["email_address"] = str;

       			// Display Lastname In Asterisk Pattern(*)
       			var lastname = value["last_name"];
       			var strlastnm = lastname.length;
       			var str2 = '';
       			for(var j=0; j < strlastnm; j++){
       				if(j < 3 || j > 5 && j != (strlastnm-2)){
       					str2 += '*';
       				}else{
       					str2 += value["last_name"][j];
       				}
       			}
       			value["last_name"] = str2;

       			// Display Company Name In Asterisk Pattern(*)
       			var cmpyname = value["company_name"];
       			var strcmpynm = cmpyname.length;
       			var str3 = '';
       			for(var k=0; k < strcmpynm; k++){
       				if(k < 3 || k > 5 && k != (strcmpynm-2)){
       					str3 += '*';
       				}else{
       					str3 += value["company_name"][k];
       				}
       			}
       			value["company_name"] = str3;

       			// var jobtit = value["job_title"];
       			// var strtitl = jobtit.length;
       			// var str4 = '';
       			// for(var l=0; l < strtitl; l++){
       			// 	if(l < 3 || l > 5 && l !=(strtitl-2)){
       			// 		str4 += '*';
       			// 	}else{
       			// 		str4 += value["job_title"][l];
       			// 	}
       			// }
       			// value["job_title"] = str4;

				html += '<tr>'+
				'<input type="hidden" value="'+value["id"]+'">'+
				'<td>'+str+'</td>'+
				'<td>'+str2+'</td>'+
				'<td>'+str3+'</td>'+
				'<td>'+value["job_title"]+'</td>'+
				'<td>'+value["country"]+'<br>'+value["city"]+
				'</td></tr>';
			});
			
			if (html) {
				$('#filtered_result').html(html);
			}
			else
			{
				$('#filtered_result').html('Not Found');
			}
		}
	});
});

/*********ON CLICK SAVESEARCH DATA INTO USER DASHBOARD AND IN DATABASE*********/
$('.savedsearch').on('click', function(){
	var userid = $('#currnt_usr').val();
	// alert(userid);
	if( userid == '' ){
		swal({ 
		  	title: "",
		   	text: "!You must login to save this list.",
	    	type: "error" 
		  });
		
	}else{
		// var result = [];
		// var filter = [];
		// var industries = [];
		// var state = [];
		// var city = [];
		$('.save_my_list').on('click', function(){
			var result = [];
			var filter = [];
			var industries = [];
			var state = [];
			var city = [];
			var userid = $('#currnt_usr').val();
			var listname = $('.list_name').val();
			var listamnt = $('.counts_price').val();
			var totlcontact = $('.contact_count').val();
			alert(totlcontact);
			// alert(listamnt);
		 	$('.tag-list tr input[type="hidden"]').each(function(){
		 		//console.log('ddd');
        		result.push($(this).val());
        	});
        	console.log(result);
		    // var results = $("tr input[type=hidden]").val();
		    $('.industry li').each(function(){
				industries.push($(this).text());
			});
		    var company = $('.company').text();

		    $('.state li').each(function(){
				state.push($(this).text());
			});
			$('.city li').each(function(){
				city.push($(this).text());
			});
		    
		    $.ajax({
		    	headers: {
				    'X-CSRF-TOKEN': '{{ csrf_token() }}'
				},
				type:'POST',
					url:"{{ url('/demosavesearch') }}",
					data: {
						'userid': userid, 'listname': listname, 'listamnt': listamnt, 'totlcontact': totlcontact, 'result': result, 'industries': industries, 'company': company, 'state': state, 'city': city
					},
					success:function(data){
						// alert(data);	
						if(data != 0){
							swal({
					            title: "", 
					            text: "List saved Successfully", 
					            type: "success"
					        },function() {
					            // location.reload();
					            window.location = "http://work4brands.com/glead/buildlist";
					        });

						}else{
							swal("Some error occure! please try again.", "You clicked the button!", "error");
						}

					}
		    });
		});	
	}
});

/*********ON CLICK BUY LIST BUTTON TRANFAR DATA INTO PAYMENT PAGE*********/
$('.priceicart').on('click', function(){
	var userid = $('#currnt_usr').val();
	if(userid == ''){
		swal({ 
		  	title: "",
		   	text: "!You must login to buy this list.",
	    	type: "error" 
		  });
	}else{
		var results = [];

		var userid = $('#currnt_usr').val();
		
		$('tr input[type="hidden"]').each(function(){
    		results.push($(this).val());
    	});

    	var sercid = $('.serch').val();

    	var amount = $('.counts_price').val();

    	var totalcontact = $('.contact_count').val();

    	// var formData = new FormData();
    	// formData.append('userid', userid);
    	// formData.append('result', result);
    	// formData.append('sercid', sercid);
    	// formData.append('amount', amount);
    	// formData.append('totalcontact', totalcontact);
    	$('#buysearch').append('<input type="hidden" name="userid" value="'+ userid +'">');
    	$('#buysearch').append('<input type="hidden" name="results" value="'+ results +'">');
    	$('#buysearch').append('<input type="hidden" name="sercid" value="'+ sercid +'">');
    	$('#buysearch').append('<input type="hidden" name="amount" value="'+ amount +'">');
    	$('#buysearch').append('<input type="hidden" name="totalcontact" value="'+ totalcontact +'">');
    	
    	$('#buysearch').submit();	
	}

});

var divs = ["div1", "div2", "div3", "div4", "div5", "div6","div_job","div_jobfunction"];
    var visibleDivId = null;
    function toggleVisibility(divId,type = '') {

      if(visibleDivId === divId) {
        visibleDivId = null;
      } else {
      	$('#type_filter').val(type);
        visibleDivId = divId;
      }
      hideNonVisibleDivs();
    }
    function hideNonVisibleDivs() {
      var i, divId, div;
      for(i = 0; i < divs.length; i++) {
        divId = divs[i];
        div = document.getElementById(divId);
        if(visibleDivId === divId) {
          div.style.display = "block";
        } else {
          div.style.display = "none";
        }
      }
    }



$('.right-list li a').click(function(){
    $('html, body').stop().animate({
        scrollTop: $( $(this).attr('href') ).offset().top - 130
	}, 1700);
    return false;
});
$('.scrollTop a').scrollTop();
   
$('.over').click(function(e){
    $('#overlay').fadeIn(300);
	e.preventDefault();
});


$(document).on('click','#overlay',function() {
    $(this).fadeOut('3000');
	$('.right-appera-box').css("display", "none");
});
  
</script>

