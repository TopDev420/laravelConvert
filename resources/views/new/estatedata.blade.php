@include('header')
<div id="global-leade-banner" style="background:url({{ $realestateagentdata->image }}) no-repeat; height:450px;">
 	<div class="container">
	    <div class="col-md-12 text-center">
		   <div class="banner-conten">
		    <h1>{{ $realestateagentdata->title }}</h1>
		    <p>{{ $realestateagentdata->monthly_desp_one }}<br>
               {{ $realestateagentdata->monthly_dep_two }}
          	</p>
		   </div>
		</div>
	</div>
</div> 
<section class="readymade-lists">	  
   <div class="container">
	    <div class="col-md-12">
		     <div class="Ready-listorder" >
		        <div class="business-contact">
				    <div class="bus-head">
					  	<span class="bsn-contact">
					    	<h1>Real Estate Agent</h1>
                         <p>You can select a ready-made list from below.</p>
					  	</span>
					    <span class="bsn-cont-right">
					      	<a href="">Create your list</a>
					 	</span>
					</div> 
					<?php
					foreach($estate as $value){ 
						$delete = $value->deleted_at;
					?>
					<?php if(!empty($delete)){ ?>
					<?php } else { ?>
					<div class="first-level-row">
				  		<div class="col-md-2 col-sm-2">
				    		<h4><?php echo $value->name; ?></h4>
				  		</div> 
				  		<div class="col-md-2 col-sm-2">
				    		<h4>12,144</h4>
					 		<p>Contacts</p>
				  		</div>
				  		<div class="col-md-6 col-sm-6">
				    		<p><?php echo $value->description; ?></p>
				  		</div>
				  		<div class="col-md-2 col-sm-2">
				    		<a href="" type="button" class="reviews"><?php echo $value->price; ?></a>
				  		</div>
		        	</div>

		        <?php } } ?> 	
		  		</div>
	 		</div>
	 	</div>
   	</div>
</section>
  
<section id="directs-contacts-only">
   <div class="container">
     <div class="col-md-3 col-sm-6">
	    <div class="iocn-list-text">
		  	<span class="gurantes"><img src="{{ asset('new-assets/images/gurnte.png') }}" alt=""></span>
		  
		  	<h2>{{ $realestateagentdata->deliverability }}</h2>
			<p>I{{ $realestateagentdata->deliverable_content }}</p>
		</div>
	 </div>
	   <div class="col-md-3 col-sm-6">
	    <div class="iocn-list-text">
		  	<span class="gurantes"><img src="{{ asset('new-assets/images/premium-member.png') }}" alt=""></span>
		  
		  	<h2>{{ $realestateagentdata->premium_contact }}</h2>                
			<p>{{ $realestateagentdata->premium_content }}</p>
		</div>
	 </div>
	    <div class="col-md-3 col-sm-6">
	    <div class="iocn-list-text">
		  	<span class="gurantes"><img src="{{ asset('new-assets/images/book-rept.png') }}" alt=""></span>
		  
		  	<h2>{{ $realestateagentdata->file_title }}</h2>
		    <p>{{ $realestateagentdata->file_content }}</p>
		   
         </div>
	 </div>
	    <div class="col-md-3 col-sm-6">
	    <div class="iocn-list-text">
		  	<span class="gurantes"><img src="{{ asset('new-assets/images/multiuser.png') }}" alt=""></span>
		  
	  		<h2>D{{ $realestateagentdata->direct_contacts }}<br></h2>
         	<p>{{ $realestateagentdata->direct_content }}</p> 
		</div>
	 </div>
   </div>
</section>
		
<section id="email-list-btm">
   <div class="container">
     <div class="col-md-3 col-sm-6">
	    <div class="iocn-list-text">
		 	<h2>{{ $realestateagentdata->email_list_title }}</h2>
			<p>{{ $realestateagentdata->Email_list_content }}</p>
		</div>
	 </div>
	   <div class="col-md-3 col-sm-6">
	    <div class="iocn-list-text">
		 	<h2>{{ $realestateagentdata->lead_by_job_title }}</h2>                
			<p>{{ $realestateagentdata->lead_by_job_content }}</p>
		</div>
	 </div>
	    <div class="col-md-3 col-sm-6">
	    <div class="iocn-list-text">
		  	<h2>{{ $realestateagentdata->industry_title }}</h2>
		    <p>{{ $realestateagentdata->industry_content }}</p>
		   
         </div>
	 </div>
	    <div class="col-md-3 col-sm-6">
	    <div class="iocn-list-text">
		   	<h2>{{ $realestateagentdata->healthcare_title }}</h2>
             <p>{{ $realestateagentdata->healthcare_content }}</p> 
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
		  <p>{{ $realestateagentdata->Cretcontent }}</p>
		</div>
	   <div class="col-md-4">
		<div class="Creat-your-btn">
		  <a href="{{ url('/buildlist') }}" type="button" class="build-lista">BUILD  A LIST</a>
		</div>
	   </div>
 </section>
@include('footer')