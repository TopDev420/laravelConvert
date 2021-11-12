@include('header')
         <!-- ====================== ===========================================================
            ==================================Header end==================================
            ========================================================-->
         <div class="abt-banner" data-aos="flip-right">
            <img src="{{ asset('/sa-assets/images/abt-banner.jpg') }}" class="img-responsive">
            <div class="abt_txt">About Atluss</div>
         </div>
         <!-- ====================== ===========================================================
            ==================================about banner end==================================
            ========================================================-->
         <div class="about-actuss text-center wow bounceInUp" >
            <div class="container">
               <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis dolor euismod, consequat erat nec, porttitor dui. Duis eu rutrum ante. Nulla tempor sagittis leo, eget ultrices nisl auctor et. Cras mollis malesuada ipsum, ac convallis diam tempor in. Aenean iaculis aliquet libero at mollis. Etiam lobortis semper mauris, ac blandit ligula bibendum at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis dolor euismod, consequat erat nec, porttitor dui. Duis eu rutrum ante. Nulla tempor sagittis leo, eget ultrices nisl auctor et. Cras mollis malesuada ipsum, ac convallis diam tempor in.
               </p>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis dolor euismod, consequat erat nec, porttitor dui. Duis eu rutrum ante. Nulla tempor sagittis leo, eget ultrices nisl auctor et. Cras mollis malesuada ipsum, ac convallis diam tempor in. Aenean iaculis aliquet libero at mollis. Etiam lobortis semper mauris, ac blandit ligula bibendum at.</p>
            </div>
         </div>
         <!-- ====================== ===========================================================
            ==================================about text end==================================
            ========================================================-->
         <div class="dashboard" >
            <div class="container">
               <div class="row">
                  <div class="col-sm-6 col-md-5 wow bounceInLeft">
                     <h3>{{$aboutdata->abt_atluss}}</h3>
                     <p>{{$aboutdata->atlus_des}}</p>
                  </div>
                  <div class="col-sm-6 col-md-7 wow bounceInRight">
                     <img src="{{$aboutdata->image}}" class="img-responsive" alt="destop-img">
                  </div>
               </div>
            </div>
         </div>
         <!-- ====================== ===========================================================
            ==================================dashboard end==================================
            ========================================================-->
         <div class="dashboard no-bg">
            <div class="container">
               <div class="row">
                  <div class="col-sm-6 col-md-7 wow bounceInLeft">
                     <img src="{{$aboutdata->fet_img_one}}" class="img-responsive" alt="destop-img">
                  </div>
                  <div class="col-sm-6 col-md-5 wow bounceInRight">
                     <h3>{{$aboutdata->fe_title}}</h3>
                     <p>{{$aboutdata->one_des}}</p>
                   <!--   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis dolor euismod, consequat erat nec, porttitor dui. Duis eu rutrum ante. Nulla tempor sagittis leo, eget ultrices nisl auctor et. Cras mollis malesuada ipsum, ac convallis diam tempor in. Aenean iaculis aliquet libero at mollis. Etiam lobortis semper mauris, ac blandit ligula bibendum at.</p> -->
                  </div>
               </div>
            </div>
         </div>
         <!-- ====================== ===========================================================
            ==================================Schdule end==================================
            ========================================================-->
         <div class="dashboard" >
            <div class="container">
               <div class="row">
                  <div class="col-sm-6 col-md-5 wow bounceInRight" >
                     <h3>{{$aboutdata->two_des}}</h3>
                     <p>{{$aboutdata->three_des}}</p>
                  </div>
                  <div class="col-sm-6 col-md-7 wow bounceInLeft" >
                     <img src="{{$aboutdata->fet_img_two}}" class="img-responsive" alt="destop-img">
                  </div>
               </div>
            </div>
         </div>
         <!-- ====================== ===========================================================
            ==================================referrel end==================================
            ========================================================-->
      </div>
      <!-- Wrapper end-->
      <div class="signup text-center wow bounceInLeft">
         <img src="{{ asset('/sa-assets/images/signup.jpg') }}" class="img-responsive" >
         <div class="signup-txt" >
            <div class="container">
               <h3>Sign Up Now to Get started!</h3>
               <button class="read_more wht" onclick="{{ url('/frontlogin') }}">Sign up >></button>
            </div>
         </div>
      </div>
   @include('footer')