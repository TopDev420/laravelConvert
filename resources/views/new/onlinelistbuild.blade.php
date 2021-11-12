@include('header')
<div id="global-leade-banner" style="background:url({{ $onlinelistbuild->image }}) no-repeat; height:450px;">
</div>
<section class="filter-list">
   <div class="container">
      <div class="col-md-3">
	    <div class="filter-bg">
		    <h3>Contact Title</h3>
			<div class="job-level">
			    <ul class="job-function">
		      		<li class="dropdown">
                 		<a href="" type="button" class="dropdown-toggle"  data-toggle="dropdown" data-target="">Job Level
			      		<span class="tgl-btn"><i class="fa fa-bars" aria-hidden="true"></i></span></a>
				   		<div class="dropdown-menu">
			       			<div class="search-option">
						       <h2>Select Job Levels</h2>
						       <p>You can select one or more job levels.</p>
						    <div class="search-group">
                               	<span class="fasearch"><i class="fa fa-search" aria-hidden="true"></i></span>
                               	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Type to search.." title="Type in a name">
								<ul id="myUL">
								    <li>
								    	<a href="#"><label class="control control--checkbox"> +C-Level 
										<input type="checkbox" checked=""/>
										<div class="control__indicator"></div>
										</label></a>
									</li>
									<li>
										<a href="#"><label class="control control--checkbox"> VP-Level 
										<input type="checkbox" checked=""/>
										<div class="control__indicator"></div>
										</label></a>
									</li>
									<li>
										<a href="#"><label class="control control--checkbox"> Director-Level 
										<input type="checkbox" checked=""/>
										<div class="control__indicator"></div>
										</label></a>
									</li>
									<li>
										<a href="#"><label class="control control--checkbox"> Manager-Level 
										<input type="checkbox" checked=""/>
										<div class="control__indicator"></div>
										</label></a>
									</li>
									<li>
										<a href="#"><label class="control control--checkbox"> Non-Manager 
										<input type="checkbox" checked=""/>
										<div class="control__indicator"></div>
										</label></a>
									</li>
								</ul>
                      		</div>
						 </div>
					  </div>
				  </li>
			   </ul>
			</div>
			
			<div class="job-level second">
			 	<select class="cntry">
				    <option>Industries</option>
					<option>Cooprate</option>
					<option>Cooprate</option>
					<option>Cooprate</option>
			  	</select>
			    <h3>Company</h3>
			    <input type="text" placeholder="Enter Company Name">
		   		<div class="">
			   		<span class="text-semibold">Employee Range</span>
			   		<span class="pull-right">0 - 1B</span>
				  	<div class="col-md-6 paddzero"> 
				    	<input class="form__control" placeholder="Minimum" value="" type="text">
				  	</div>
				   	<div class="col-md-6  paddzero"> 
				     	<input class="form__control" placeholder="Maximium" value="" type="text">
				  	</div>
				  	<input type="submit" value="Update" name="employeeupdate">
				</div>
			
			  	<div class="">
			    	<label>Update</label>
			   		<span class="text-semibold">Revenue Range</span>
			  	 	<span class="pull-right">0 - 1T</span>
				  	<div class="col-md-6 paddzero"> 
				    	<input class="form__control" placeholder="Minimum" value="" type="text">
				  	</div>
				   	<div class="col-md-6  paddzero"> 
				     	<input class="form__control" placeholder="Maximium" value="" type="text">
				  	</div>
				 	<input type="submit" value="Update" name="revenueupdate">
				</div>
			</div>
			<div class="job-level second">
			<h3>Location ?</h3>
			  	<select class="cntry">
			    	<option>United State</option>
			  	</select>
			   	<select class="cntry">
			    	<option>State</option>
			  	</select>
			   	<select class="cntry">
			    	<option>City</option>
			  	</select>
			  	<input type="text" placeholder="Zipcode">	
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
						<th>Company & Job Level</th>
						<th>Job Function & Department</th>
						<th>Country & City</th>
				  	</tr>
				</thead>
				<tbody>
					<tr>
						<td>John</td>
						<td>Doe</td>
						<td>john@ex</td>
						<td>Doe</td>
						<td>john@example</td>
					</tr>
					<tr>
						<td>Mary</td>
						<td>Moe</td>
						<td>mary@example.com</td>
						<td>Doe</td>
						<td>john@exam</td>
					</tr>
					<tr>
						<td>July</td>
						<td>Dooley</td>
						<td>july@example.com</td>
						<td>Doe</td>
						<td>john@examp</td>
					</tr>
					<tr>
						<td>July</td>
						<td>Dooley</td>
						<td>july@example.com</td>
						<td>Doe</td>
						<td>john@examp</td>
					</tr>
					<tr>
						<td>July</td>
						<td>Dooley</td>
						<td>july@examp</td>
						<td>Doe</td>
						<td>john@examp</td>
					</tr>
				</tbody>
			</table>
	    </div>
    </div>
</section>	  
	
<section class="build-your-lis">
    <div class="container">
	    <div class="col-md-8">
		  <div class="redy-sale">
		    <h3>READY TO BOOST YOUR SALES LIKE YOUR COMPETITORS? TRY OUR TOOL 
			    FOR FREE.</h3>
		  </div>	
		</div>
		<div class="col-md-4">
		    <a href="" type="button" class="build-list">BUILD YOUR LIST</a>
		</div>
	</div>
</section> 
@include('footer')