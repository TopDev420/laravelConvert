@include('header')
<div id="global-leade-banner" style="background:url({{ $gdrp->image }}) no-repeat; height:450px;">
    <div class="container">
	    <div class="col-md-12 text-center">
		   <div class="banner-conten">
		   <h1>{{$gdrp->name}}</h1>
		   </div>  
		</div>
	</div>
</div> 
  <section id="our-pricing">
     <div class="container">
		<div class="col-md-12">
			<div class="pricing-page-list">
				<p class="">{{$gdrp->description}}</p>
			</div>
		</div>
	</div>
</section>

@include('footer')