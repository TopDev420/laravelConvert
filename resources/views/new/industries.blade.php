@include('header')
<div id="global-leade-banner" style="background:url({{ $industrie->image }}) no-repeat; height:450px;">
 	<div class="container">
	    <div class="col-md-12 text-center">
		   <div class="banner-conten">
		    <h1>{{ $industrie->title }}</h1>
		    <p>{{ $industrie->monthly_desp_one }}<br>
               {{ $industrie->monthly_dep_two }}
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
					    	<h1>Industries</h1>
                         	<p>You can select a ready-made list from below.</p>
					  	</span>
					    <span class="bsn-cont-right">
					      	<a href="{{ url('/buildlist') }}">Create your list</a>
					  	</span>
					</div> 
				<?php
				foreach($industry as $industries){
					$delete = $industries->deleted_at;
				?>
				<?php if(!empty($delete)) {?>
				<?php } else {?>
				<div class="first-level-row">
				  	<div class="col-md-2 col-sm-2">
				    	<h4><?php echo $industries->name;; ?></h4>
				  	</div> 
				  	<div class="col-md-2 col-sm-2">
				    	<h4>253,346</h4>
					 	<p>Contacts</p>
			  		</div>
				  	<div class="col-md-6 col-sm-6">
				    	<p><?php echo $industries->description; ?></p>
				  	</div>
				  	<div class="col-md-2 col-sm-2">
				    	<a href="" type="button" class="reviews"><?php echo $industries->price; ?></a>
				  	</div>
		        </div>
		        <?php } } ?> 
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
	  		<p>{{ $industrie->Cretcontent }}</p>
		</div>
   		<div class="col-md-4">
			<div class="Creat-your-btn">
	  			<a href="{{ url('/buildlist') }}" type="button" class="build-lista">BUILD  A LIST</a>
			</div>
   		</div>
	</div>
</section>
@include('footer')