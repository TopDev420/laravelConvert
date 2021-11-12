@include('header')
<div id="global-leade-banner" style="background:url({{ $joblevel->image }}) no-repeat; height:450px;">
 	<div class="container">
	    <div class="col-md-12 text-center">
		   <div class="banner-conten">
		    <h1>{{ $joblevel->title }}</h1>
		    <p>{{ $joblevel->monthly_desp_one }}<br>
               {{ $joblevel->monthly_dep_two }}
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
					    	<h1>{{ $joblevel->name }}</h1>
                         	<p>You can select a ready-made list from below.</p>
					  	</span>
					    <span class="bsn-cont-right">
					      	<a href="">Create your list</a>
					  	</span>
					</div> 
				<?php
				
				foreach($query as $levels){
					$delete = $levels->deleted_at;
				?>	
				<?php if(!empty($delete)){ ?>

				<?php } else { ?>
				<div class="first-level-row">
				  	<div class="col-md-2 col-sm-2">
				    	<h4><?php echo $levels->name; ?></h4>
				  	</div> 
				  	<div class="col-md-2 col-sm-2">
				    	<h4>371,679</h4>
					 	<p>Contacts</p>
			  		</div>
				  	<div class="col-md-6 col-sm-6">
				    	<p><?php echo $levels->description; ?></p>
				  	</div>
				  	<div class="col-md-2 col-sm-2">
				    	<a href="" type="button" class="reviews"><?php echo $levels->price; ?></a>
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
	  		<p>{{ $joblevel->Cretcontent }}</p>
		</div>
   		<div class="col-md-4">
			<div class="Creat-your-btn">
	  			<a href="{{ url('/buildlist') }}" type="button" class="build-lista">BUILD  A LIST</a>
			</div>
   		</div>
	</div>
</section>
@include('footer')