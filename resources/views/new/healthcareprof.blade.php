@include('header')
<div id="global-leade-banner" style="background:url({{ $healthprofessional->image }}) no-repeat; height:450px;">
 	<div class="container">
	    <div class="col-md-12 text-center">
		   <div class="banner-conten">
		    <h1>{{ $healthprofessional->title }}</h1>
		    <p>
		    	{{ $healthprofessional->monthly_desp_one }}<br>
               	{{ $healthprofessional->monthly_dep_two }}
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
					    	<h1>{{ $healthprofessional->name }}</h1>
                         	<p>You can select a ready-made list from below.</p>
					  	</span>
					    <span class="bsn-cont-right">
					      	<a href="">Create your list</a>
					  	</span>
					</div> 
				<?php
				foreach ($query as $health) {
					$delete = $health->deleted_at;
				?>	
				<?php if(!empty($delete)){ ?>
				
				<?php } else {?>
				<div class="first-level-row">
				  	<div class="col-md-2 col-sm-2">
				    	<h4><?php echo $health->name; ?></h4>
				  	</div> 
				  	<div class="col-md-2 col-sm-2">
				    	<h4>382,844</h4>
					 	<p>Contacts</p>
			  		</div>
				  	<div class="col-md-6 col-sm-6">
				    	<p><?php echo $health->description ?></p>
				  	</div>
				  	<div class="col-md-2 col-sm-2">
				    	<a href="" type="button" class="reviews"><?php echo $health->price; ?></a>
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
		  	<span class="gurantes"><img src="{{ asset('/new-assets/images/gurnte.png') }}" alt=""></span>
		  	<h2>{{ $healthprofessional->deliverability }}</h2>
			<p>I{{ $healthprofessional->deliverable_content }}</p>
		</div>
	 </div>
	   <div class="col-md-3 col-sm-6">
	    <div class="iocn-list-text">
		  	<span class="gurantes"><img src="{{ asset('/new-assets/images/premium-member.png') }}" alt=""></span>
		  	<h2>{{ $healthprofessional->premium_contact }}</h2>                
			<p>{{ $healthprofessional->premium_content }}</p>
		</div>
	 </div>
	    <div class="col-md-3 col-sm-6">
	    <div class="iocn-list-text">
		  	<span class="gurantes"><img src="{{ asset('/new-assets/images/book-rept.png') }}" alt=""></span>
		  	<h2>{{ $healthprofessional->file_title }}</h2>
		    <p>{{ $healthprofessional->file_content }}</p>
		   
         </div>
	 </div>
	    <div class="col-md-3 col-sm-6">
	    <div class="iocn-list-text">
		  	<span class="gurantes"><img src="{{ asset('/new-assets/images/multiuser.png') }}" alt=""></span>
	  		<h2>D{{ $healthprofessional->direct_contacts }}<br></h2>
         	<p>{{ $healthprofessional->direct_content }}</p> 
		</div>
	 </div>
   </div>
</section>
		
<section id="email-list-btm">
   	<div class="container">
     	<div class="col-md-3 col-sm-6">
	    	<div class="iocn-list-text">
			 	<h2>{{ $healthprofessional->email_list_title }}</h2>
				<p>{{ $healthprofessional->Email_list_content }}</p>
			</div>
	 	</div>
	   	<div class="col-md-3 col-sm-6">
	    	<div class="iocn-list-text">
			 	<h2>{{ $healthprofessional->lead_by_job_title }}</h2>                
				<p>{{ $healthprofessional->lead_by_job_content }}</p>
			</div>
	 	</div>
	    <div class="col-md-3 col-sm-6">
    		<div class="iocn-list-text">
			  	<h2>{{ $healthprofessional->industry_title }}</h2>
			    <p>{{ $healthprofessional->industry_content }}</p>
         	</div>
	 	</div>
	    <div class="col-md-3 col-sm-6">
	    	<div class="iocn-list-text">
			   	<h2>{{ $healthprofessional->healthcare_title }}</h2>
	            <p>{{ $healthprofessional->healthcare_content }}</p> 
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
	  		<p>{{ $healthprofessional->Cretcontent }}</p>
		</div>
   		<div class="col-md-4">
			<div class="Creat-your-btn">
	  			<a href="{{ url('/buildlist') }}" type="button" class="build-lista">BUILD  A LIST</a>
			</div>
   		</div>
	</div>
</section>
@include('footer')