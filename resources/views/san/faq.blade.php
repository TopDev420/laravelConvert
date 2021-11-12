@include('header')
         <!-- ====================== ===========================================================
            ==================================Header end==================================
            ========================================================-->
         <div class="abt-banner" data-aos="flip-right">
            <img src="{{ asset('/sa-assets/images/abt-banner.jpg') }}" class="img-responsive">
            <div class="abt_txt">{{$faq->name}}'s</div>
         </div>
         <!-- ====================== ===========================================================
            ==================================about banner end==================================
            ========================================================-->
         <div class="about-actuss text-center wow bounceInUp" >
            
         </div>
         <!-- ====================== ===========================================================
            ==================================about actuss end==================================
            ========================================================-->
        
		<div class="questions">
		  <div class="qustions_list">
            <div class="container">
			   <h4 class="qust wow bounceInLeft">{{$faq->abt_atluss}}</h4>
				<p class="answer wow bounceInRight">{{$faq->atlus_des}}</p>
			</div>
		   </div>
		   <div class="qustions_list">
            <div class="container">
			   <h4 class="qust wow bounceInLeft">{{$faq->abt_atluss}}</h4>
				<p class="answer wow bounceInRight">{{$faq->atlus_des}}</p>
			</div>
		   </div>
		   
         </div>    
         <!-- ====================== ===========================================================
            ==================================referrel end==================================
            ========================================================-->

      <!-- Wrapper end-->
      <div class="signup text-center wow bounceInUp">
         <img src="{{ asset('/sa-assets/images/signup.jpg') }}" class="img-responsive" >
         <div class="signup-txt" >
            <div class="container">
               <h3>Sign Up Now to Get started!</h3>
               <button class="read_more wht">Sign up >></button>
            </div>
         </div>
      </div>
      @include('footer')