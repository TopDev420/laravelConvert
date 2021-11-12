@include('header')
<?php
$imageid = $contactdata->image;
$bak_img = DB::table('uploads')->where('id',$imageid)->pluck('name');
$assets = '/new-assets/images';
$img_name = $bak_img['0'];
$img = asset($assets.'/'.$img_name);  
?>
<div id="global-leade-banner" style="background:url({{ $img }}) no-repeat; height:450px;">
    <div class="container">
	    <div class="col-md-12 text-center">
		   <div class="banner-conten">
		   <h1>{{ $contactdata->name }}</h1>
		   </div>  
		</div>
	</div>
</div> 
<section id="our-pricing">
     <div class="container">
		<div class="col-md-12">
			<div class="pricing-page-list">
				<p class="">{{ $contactdata->description }}</p>
			</div>
		</div>
	</div>
</section>
@include('footer')