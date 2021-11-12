@include('header')
<div id="global-leade-banner" style="background:url({{ $country->image }}) no-repeat; height:450px;">
 	<div class="container">
	    <div class="col-md-12 text-center">
		   <div class="banner-conten">
		    <h1>{{ $country->title }}</h1>
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
					    	<h1>Country</h1>
                         	<p>You can select a ready-made list from below.</p>
					  	</span>
					    <span class="bsn-cont-right">
					      	<a href="{{ url('/buildlist') }}">Create your list</a>
					  	</span>
					</div> 
				<div class="first-level-row">
				  	<div class="col-md-2 col-sm-2">
				    	<h4>United State</h4>
				  	</div> 
				  	<div class="col-md-2 col-sm-2">
				    	<h4>253,346</h4>
					 	<p>Contacts</p>
			  		</div>
				  	<div class="col-md-6 col-sm-6">
				    	<p>Lorem Ipsum lorem ipsum</p>
				  	</div>
				  	<div class="col-md-2 col-sm-2">
				    	<a href="" type="button" class="reviews">$14.72</a>
				  	</div>
		        </div>
		  		</div>
	 		</div>
	 	</div>
   	</div>
</section>
@include('footer')