<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
         <script type="text/javascript" async="" src="{{ asset('new-assets/js/filterpage/f.txt')}}"></script>
    <script src="{{ asset('new-assets/js/filterpage/5640795.js')}}" type="text/javascript" id="hs-analytics"></script>
    <script src="{{ asset('new-assets/js/filterpage/5640795.js(1).download')}}" type="text/javascript" id="cookieBanner-5640795"
        data-loader="hs-scriptloader" data-hsjs-portal="5640795" data-hsjs-env="prod"></script>
    <script src="{{ asset('new-assets/js/filterpage/fb.js')}}" type="text/javascript" id="hs-ads-pixel-5640795"
        data-ads-portal-id="5640795" data-ads-env="prod" data-loader="h                                                                                                                                             s-scriptloader" data-hsjs-portal="5640795"
        data-hsjs-env="prod"></script>
    <script type="text/javascript" async="" src="{{ asset('new-assets/js/filterpage/34cee668imvp.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('new-assets/js/filterpage/mixpanel-2-latest.min.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset('new-assets/js/filterpage/analytics.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script async="" src="{{ asset('new-assets/js/filterpage/gtm.js')}}"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#000000">
    <script src="{{ asset('new-assets/js/filterpage/checkout.js')}}"></script>

    <title>New Designed Filter Page</title>
    <link href="{{ asset('new-assets/css/filterpage/css')}}" rel="stylesheet">
    <style>
        @font-face {
            font-family: FontAwesome;
            src: url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.eot?#iefix&v=4.7.0) format('embedded-opentype'), url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0) format('woff2'), url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.woff?v=4.7.0) format('woff'), url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.ttf?v=4.7.0) format('truetype'), url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular) format('svg');
            font-weight: 400;
            font-style: normal
        }
    </style>
    <link rel="stylesheet" href="{{ asset('new-assets/css/filterpage/font-awesome.css')}}">
    <script src="{{ asset('new-assets/js/filterpage/jquery.min.js')}}"></script>
    <link href="{{ asset('new-assets/css/filterpage/main.439c0ace.chunk.css')}}" rel="stylesheet">
    <script type="application/javascript" async="" src="{{ asset('new-assets/js/filterpage/2930.js')}}"></script>
    <script async="" src="{{ asset('new-assets/js/filterpage/js')}}"></script>
     
     
     <style>
         /* Google Fonts Import Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
  font-size:14px;
}
.sidebar{
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 260px;
  background: #11101d;
  z-index: 100;
  transition: all 0.5s ease;
}
.sidebar.close{
  width: 78px;
}
.sidebar .logo-details{
  height: 60px;
  width: 100%;
  display: flex;
  align-items: center;
}
.sidebar .logo-details i{
  font-size: 30px;
  color: #fff;
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
}
.sidebar .logo-details .logo_name{
  font-size: 22px;
  color: #fff;
  font-weight: 600;
  transition: 0.3s ease;
  transition-delay: 0.1s;
}
.sidebar.close .logo-details .logo_name{
  transition-delay: 0s;
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links{
  height: 100%;
  padding: 30px 0 150px 0;
  overflow: auto;
}
.sidebar.close .nav-links{
  overflow: visible;
}
.sidebar .nav-links::-webkit-scrollbar{
  display: none;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  transition: all 0.4s ease;
}
.sidebar .nav-links li:hover{
  background: #1d1b31;
}
.sidebar .nav-links li .iocn-link{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sidebar.close .nav-links li .iocn-link{
  display: block
}
.sidebar .nav-links li i{
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.sidebar .nav-links li.showMenu i.arrow{
  transform: rotate(-180deg);
}
.sidebar.close .nav-links i.arrow{
  display: none;
}
.sidebar .nav-links li a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
.sidebar .nav-links li a .link_name{
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  transition: all 0.4s ease;
}
.sidebar.close .nav-links li a .link_name{
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links li .sub-menu{
  padding: 6px 6px 14px 80px;
  margin-top: -10px;
  background: #1d1b31;
  display: none;
}
.sidebar .nav-links li.showMenu .sub-menu{
  display: block;
}
.sidebar .nav-links li .sub-menu a{
  color: #fff;
  font-size: 15px;
  padding: 5px 0;
  white-space: nowrap;
  opacity: 0.6;
  transition: all 0.3s ease;
}
.sidebar .nav-links li .sub-menu a:hover{
  opacity: 1;
}
.sidebar.close .nav-links li .sub-menu{
  position: absolute;
  left: 100%;
  top: -10px;
  margin-top: 0;
  padding: 10px 20px;
  border-radius: 0 6px 6px 0;
  opacity: 0;
  display: block;
  pointer-events: none;
  transition: 0s;
}
.sidebar.close .nav-links li:hover .sub-menu{
  top: 0;
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
}
.sidebar .nav-links li .sub-menu .link_name{
  display: none;
}
.sidebar.close .nav-links li .sub-menu .link_name{
  font-size: 18px;
  opacity: 1;
  display: block;
}
.sidebar .nav-links li .sub-menu.blank{
  opacity: 1;
  pointer-events: auto;
  padding: 3px 20px 6px 16px;
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links li:hover .sub-menu.blank{
  top: 50%;
  transform: translateY(-50%);
}
.sidebar .profile-details{
  position: fixed;
  bottom: 0;
  width: 260px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #1d1b31;
  padding: 12px 0;
  transition: all 0.5s ease;
}
.sidebar.close .profile-details{
  background: none;
}
.sidebar.close .profile-details{
  width: 78px;
}
.sidebar .profile-details .profile-content{
  display: flex;
  align-items: center;
}
.sidebar .profile-details img{
  height: 52px;
  width: 52px;
  object-fit: cover;
  border-radius: 16px;
  margin: 0 14px 0 12px;
  background: #1d1b31;
  transition: all 0.5s ease;
}
.sidebar.close .profile-details img{
  padding: 10px;
}
.sidebar .profile-details .profile_name,
.sidebar .profile-details .job{
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  white-space: nowrap;
}
.sidebar.close .profile-details i,
.sidebar.close .profile-details .profile_name,
.sidebar.close .profile-details .job{
  display: none;
}
.sidebar .profile-details .job{
  font-size: 12px;
}
.home-section{
  position: relative;
  background: #fff;
  /*height: 100vh;*/
  left: 260px;
  width: calc(100% - 260px);
  transition: all 0.5s ease;
}
.sidebar.close ~ .home-section{
  left: 78px;
  width: calc(100% - 78px);
}
.home-section .home-content{
  height: 60px;
  display: flex;
  align-items: center;
}
.home-section .home-content .bx-menu,
.home-section .home-content .text{
  color: #11101d;
  font-size: 35px;
}
.home-section .home-content .bx-menu{
  margin: 0 15px;
  cursor: pointer;
}
.home-section .home-content .text{
  font-size: 26px;
  font-weight: 600;
}
@media (max-width: 420px) {
  .sidebar.close .nav-links li .sub-menu{
    display: none;
  }
}
.home-content{
  display:flex;
  justify-content:space-between;
}
.nav_left{
  width:max-content;
}
.nav_right{
  width:max-content;
  padding:10px 20px;
}
.nav_button{
  padding:8px;
  border-radius:10%;
  border:none;
  color:#fff;
  background-color:#000000;
  font-size: 16px;
  cursor:pointer;
}
  .disabled { 

            pointer-events: none; 

            cursor: default; 

        } 
     </style>
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i><img src="{{ asset('new-assets/images/homepage/logo.png') }}" class="image-logo"></i>
      <!--<span class="logo_name">-->
           <img style="height:60px" class="logo_name" src="{{ asset('new-assets/images/new/logo.jpg') }}" alt="Bookyourdata Email List Logo" width="112" height="100">
      <!--</span>-->
    </div>
    <ul class="nav-links">
      <!--<li>-->
      <!--  <a href="#">-->
      <!--    <i class='bx bx-grid-alt' ></i>-->
      <!--    <span class="link_name">Dashboard</span>-->
      <!--  </a>-->
      <!--  <ul class="sub-menu blank">-->
      <!--    <li><a class="link_name" href="#">Category</a></li>-->
      <!--  </ul>-->
      <!--</li>-->
        <!--@if(isset($allcontacts)) -->
        <!--<div class="search-header">-->
        <!--    <div class="leads-count" style="display:none">{{$allcontacts}} Contacts</div>-->
        <!--</div>-->
        <!--@endif-->
         <!--@if(isset($allcontacts)) -->
         <!-- <li>-->
         <!--   <a href="#">-->
         <!--     <i class='bx bxs-contact' ></i>-->
         <!--     <span class="link_name">{{$allcontacts}} Contacts</span>-->
         <!--   </a>-->
         <!--   <ul class="sub-menu blank">-->
         <!--     <li><a class="link_name" href="#">{{$allcontacts}} Contacts</a></li>-->
         <!--   </ul>-->
         <!-- </li>-->
         <!-- @endif-->

          <!--<li>-->
          <!--  <a href="#">-->
          <!--    <i class='bx bx-money' ></i>-->
          <!--    <span class="link_name">Unused Credits {{$userinfo->credit}}</span>-->
          <!--  </a>-->
          <!--  <ul class="sub-menu blank">-->
          <!--    <li><a class="link_name" href="#">Unused Credits {{$userinfo->credit}}</a></li>-->
          <!--  </ul>-->
          <!--</li>-->
      <li id="page_dashboard">
        <a href="#">
          <!--<i class='bx bx-pie-chart-alt-2' ></i>-->
          <i class='bx bxs-dashboard'></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li>
      <li id="page_filter">
        <a href="#">
          <i class='bx bx-search-alt' ></i>
          <span class="link_name">Advanced Search</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Advanced Search</a></li>
        </ul>
      </li>
      <li id="page_company">
        <a href="#">
          <i class='bx bxs-business'></i>
          <span class="link_name">Company Search</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Coming Soon</a></li>
        </ul>
      </li>
      <li id="page_email" >
        <a href="#">
          <i class='bx bx-envelope' ></i>
          <span class="link_name">Email Search</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Coming Soon</a></li>
        </ul>
      </li>
      <li id="page_phone">
        <a href="#">
          <i class='bx bx-phone' ></i>
          <span class="link_name">Phone Search</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Coming Soon</a></li>
        </ul>
      </li>
      <li id="page_myleads">
        <a href="#">
          <i class='bx bx-trophy' ></i>
          <span class="link_name">My Leads</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">My Leads</a></li>
        </ul>
      </li>
      <!--<li id="page_upgradeplan">-->
      <!--  <a href="#">-->
      <!--    <i class='bx bx-upload'></i>-->
      <!--    <span class="link_name">Upgrade Plan</span>-->
      <!--  </a>-->
      <!--  <ul class="sub-menu blank">-->
      <!--    <li><a class="link_name" href="#">Upgrade Plan</a></li>-->
      <!--  </ul>-->
      <!--</li>-->
          
          
          
          
          
          
          
      <!--<li>-->
      <!--  <div class="iocn-link">-->
      <!--    <a href="#">-->
      <!--      <i class='bx bx-collection' ></i>-->
      <!--      <span class="link_name">Category</span>-->
      <!--    </a>-->
      <!--    <i class='bx bxs-chevron-down arrow' ></i>-->
      <!--  </div>-->
      <!--  <ul class="sub-menu">-->
      <!--    <li><a class="link_name" href="#">Category</a></li>-->
      <!--    <li><a href="#">HTML & CSS</a></li>-->
      <!--    <li><a href="#">JavaScript</a></li>-->
      <!--    <li><a href="#">PHP & MySQL</a></li>-->
      <!--  </ul>-->
      <!--</li>-->
      <!--<li>-->
      <!--  <div class="iocn-link">-->
      <!--    <a href="#">-->
      <!--      <i class='bx bx-book-alt' ></i>-->
      <!--      <span class="link_name">Posts</span>-->
      <!--    </a>-->
      <!--    <i class='bx bxs-chevron-down arrow' ></i>-->
      <!--  </div>-->
      <!--  <ul class="sub-menu">-->
      <!--    <li><a class="link_name" href="#">Posts</a></li>-->
      <!--    <li><a href="#">Web Design</a></li>-->
      <!--    <li><a href="#">Login Form</a></li>-->
      <!--    <li><a href="#">Card Design</a></li>-->
      <!--  </ul>-->
      <!--</li>-->
      <!--<li>-->
      <!--  <a href="#">-->
      <!--    <i class='bx bx-pie-chart-alt-2' ></i>-->
      <!--    <span class="link_name">Analytics</span>-->
      <!--  </a>-->
      <!--  <ul class="sub-menu blank">-->
      <!--    <li><a class="link_name" href="#">Analytics</a></li>-->
      <!--  </ul>-->
      <!--</li>-->
      <!--<li>-->
      <!--  <a href="#">-->
      <!--    <i class='bx bx-line-chart' ></i>-->
      <!--    <span class="link_name">Chart</span>-->
      <!--  </a>-->
      <!--  <ul class="sub-menu blank">-->
      <!--    <li><a class="link_name" href="#">Chart</a></li>-->
      <!--  </ul>-->
      <!--</li>-->
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-power-off'></i>
            <span class="link_name">{{$username}}</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">{{$username}}</a></li>
          <li id="account_account"><a href="#">Account</a></li>
          <li id="account_billing"><a href="#">Billing</a></li>
          <li id="account_support"><a href="#">Support</a></li>
          <li id="account_sign_out"><a href="#">Logout</a></li>
        </ul>
      </li>
      <!--<li>-->
      <!--  <a href="#">-->
      <!--    <i class='bx bx-compass' ></i>-->
      <!--    <span class="link_name">Explore</span>-->
      <!--  </a>-->
      <!--  <ul class="sub-menu blank">-->
      <!--    <li><a class="link_name" href="#">Explore</a></li>-->
      <!--  </ul>-->
      <!--</li>-->
      <!--<li>-->
      <!--  <a href="#">-->
      <!--    <i class='bx bx-history'></i>-->
      <!--    <span class="link_name">History</span>-->
      <!--  </a>-->
      <!--  <ul class="sub-menu blank">-->
      <!--    <li><a class="link_name" href="#">History</a></li>-->
      <!--  </ul>-->
      <!--</li>-->
      <!--<li>-->
      <!--  <a href="#">-->
      <!--    <i class='bx bx-cog' ></i>-->
      <!--    <span class="link_name">Setting</span>-->
      <!--  </a>-->
      <!--  <ul class="sub-menu blank">-->
      <!--    <li><a class="link_name" href="#">Setting</a></li>-->
      <!--  </ul>-->
      <!--</li>-->
      <!--<li>-->
            <!--<li class="dropdown account-info open" style="position:relative">-->
            <!--    <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-decoration:none">-->
                    
            <!--        <div class="upgrade-header-btn has-dropdown" id="expand_account">-->
            <!--            {{$username}}-->
            <!--            <i class="fa fa-chevron-down"  style="padding-left:5px;"></i>-->
            <!--        </div>-->
            <!--    </a>-->
            <!--    <ul class="dropdown-menu" id="account_dropdown" style="display:none">-->
            <!--        <div class="arrow"></div>-->
            <!--        <li class="account-item" id="account_account"><a><i class="fa fa-user"></i>Account </a></li>-->
            <!--        <li class="account-item" id="account_billing"><a><i class="fa fa-suitcase"></i>Billing </a></li>-->
            <!--        <li class="account-item" id="account_support"><a><i class="fa fa-question-circle"></i>Support </a></li>-->
            <!--        <li class="account-item" id="account_sign_out"><a><i class="fa fa-sign-out"></i>Logout </a></li>-->
            <!--    </ul>-->
            <!--</li>-->
            <!---->
    <!--<div class="profile-details">-->
    <!--  <div class="profile-content">-->
        <!--<img src="image/profile.jpg" alt="profileImg">-->
    <!--    <h3 style="color:white;">{{$username}}</h3>-->
    <!--  </div>-->
    <!--  <div class="name-job">-->
        <!--<div class="profile_name">Prem Shahi</div>-->
    <!--    <div class="job">Web Desginer</div>-->
    <!--  </div>-->
    <!--  <i class='bx bx-log-out' ></i>-->
    <!--</div>-->
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <div class="nav_left">
        <!--<i class='bx bx-menu'></i>-->
        <span class="text"></span>
      </div>
      <div class="nav_right">
        <button class="nav_button" id="realtime_credit">Unused Credits {{$userinfo->credit}}</button>
        <button class="nav_button" id="page_upgradeplan"><i class='bx bx-upload'></i> Upgrade Plan</button>
        <button class="nav_button"><i class='bx bx-search-alt-2'></i></button>
        <button class="nav_button"><i class='bx bx-phone' ></i></button>
        <button class="nav_button"><i class='bx bx-help-circle' ></i></button>
        <button class="nav_button"><i class='bx bx-bell' ></i></button>
      </div>
    </div>
        @yield('content')
  </section>
  <!--<script>-->
  <!--let arrow = document.querySelectorAll(".arrow");-->
  <!--for (var i = 0; i < arrow.length; i++) {-->
  <!--  arrow[i].addEventListener("click", (e)=>{-->
   <!--let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow-->
  <!-- arrowParent.classList.toggle("showMenu");-->
  <!--  });-->
  <!--}-->
  <!--let sidebar = document.querySelector(".sidebar");-->
  <!--let sidebarBtn = document.querySelector(".bx-menu");-->
  <!--console.log(sidebarBtn);-->
  <!--sidebarBtn.addEventListener("click", ()=>{-->
  <!--  sidebar.classList.toggle("close");-->
  <!--});-->
  <!--</script>-->
  
  <!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>  -->
<!--    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
<!--    <script type="text/javascript" async="" src="{{ asset('new-assets/js/filterpage/f.txt')}}"></script>-->
<!--    <script src="{{ asset('new-assets/js/filterpage/5640795.js')}}" type="text/javascript" id="hs-analytics"></script>-->
<!--    <script src="{{ asset('new-assets/js/filterpage/5640795.js(1).download')}}" type="text/javascript" id="cookieBanner-5640795"-->
<!--        data-loader="hs-scriptloader" data-hsjs-portal="5640795" data-hsjs-env="prod"></script>-->
<!--    <script src="{{ asset('new-assets/js/filterpage/fb.js')}}" type="text/javascript" id="hs-ads-pixel-5640795"-->
<!--        data-ads-portal-id="5640795" data-ads-env="prod" data-loader="h                                                                                                                                             s-scriptloader" data-hsjs-portal="5640795"-->
<!--        data-hsjs-env="prod"></script>-->
<!--    <script type="text/javascript" async="" src="{{ asset('new-assets/js/filterpage/34cee668imvp.js')}}"></script>-->
<!--    <script type="text/javascript" async="" src="{{ asset('new-assets/js/filterpage/mixpanel-2-latest.min.js')}}"></script>-->
<!--    <script type="text/javascript" async="" src="{{ asset('new-assets/js/filterpage/analytics.js')}}"></script>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!--    <script async="" src="{{ asset('new-assets/js/filterpage/gtm.js')}}"></script>-->
<!--    <meta name="viewport" content="width=device-width,initial-scale=1">-->
<!--    <meta name="theme-color" content="#000000">-->
<!--    <script src="{{ asset('new-assets/js/filterpage/checkout.js')}}"></script>-->

<!--    <title>New Designed Filter Page</title>-->
<!--    <link href="{{ asset('new-assets/css/filterpage/css')}}" rel="stylesheet">-->
<!--    <style>-->
<!--        @font-face {-->
<!--            font-family: FontAwesome;-->
<!--            src: url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.eot?#iefix&v=4.7.0) format('embedded-opentype'), url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0) format('woff2'), url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.woff?v=4.7.0) format('woff'), url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.ttf?v=4.7.0) format('truetype'), url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular) format('svg');-->
<!--            font-weight: 400;-->
<!--            font-style: normal-->
<!--        }-->
<!--    </style>-->
<!--    <link rel="stylesheet" href="{{ asset('new-assets/css/filterpage/font-awesome.css')}}">-->
<!--    <script src="{{ asset('new-assets/js/filterpage/jquery.min.js')}}"></script>-->
<!--    <link href="{{ asset('new-assets/css/filterpage/main.439c0ace.chunk.css')}}" rel="stylesheet">-->
<!--    <script type="application/javascript" async="" src="{{ asset('new-assets/js/filterpage/2930.js')}}"></script>-->
<!--    <script async="" src="{{ asset('new-assets/js/filterpage/js')}}"></script>-->
<!--    <style>-->
<!--        .header {-->
<!--            padding-left : 0px !important;-->
<!--            display : flex;-->
<!--            background : #209ad4;-->
<!--        }-->
<!--        .header nav .search-header {-->
<!--            width : 15%;-->
<!--        }-->
<!--        .header nav {-->
<!--            width : 80%;-->
<!--        }-->
<!--        .header nav .search-header .leads-count  {-->
<!--            border-left : none !important;-->
<!--            color : #fff;-->
<!--        }-->
        
<!--        .header nav ul li .upgrade-header-btn {-->
<!--            background : #eee0;-->
<!--        }-->
<!--        .header nav ul li .no-dropdown:hover {-->
<!--            border-bottom: inset;-->
<!--        }-->
<!--        .header nav ul li .has-dropdown:hover {-->
<!--            border-bottom: none;-->
<!--        }-->
<!--        .dropdown-menu {-->
<!--            position: absolute;-->
<!--            top: 100%;-->
<!--            right: 0;-->
<!--            z-index: 1000;-->
<!--            display: none;-->
<!--            min-width: 160px;-->
<!--            padding: 5px 0;-->
<!--            margin: 2px 0 0;-->
<!--            font-size: 14px;-->
<!--            text-align: left;-->
<!--            list-style: none;-->
<!--            background-color: #fff;-->
<!--            -webkit-background-clip: padding-box;-->
<!--            background-clip: padding-box;-->
<!--            border: 1px solid #ccc;-->
<!--            border: 1px solid rgba(0,0,0,.15);-->
<!--            border-radius: 4px;-->
<!--            -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);-->
<!--            box-shadow: 0 6px 12px rgba(0,0,0,.175);-->
<!--        }-->
<!--        ul.dropdown-menu .arrow {-->
<!--            position: absolute;-->
<!--            display: block;-->
<!--            width: 1rem;-->
<!--            height: 0.5rem;-->
<!--            top: -0.6rem;-->
<!--            right: 1.5rem;-->
<!--        }-->
<!--        ul.dropdown-menu {-->
<!--            top: 2.3rem;-->
<!--        }-->
<!--        ul.dropdown-menu {-->
<!--            -webkit-box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3);-->
<!--            box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3);-->
<!--        }-->
<!--        ul.dropdown-menu {-->
<!--            padding-top: 0px;-->
<!--            padding-bottom: 0px;-->
<!--            border-radius: 0.2rem;-->
<!--            margin-top : 0px;-->
<!--            right: 0;-->
<!--            left: auto;-->
<!--        }-->
<!--        i.fa-chevron-down {-->
<!--            font-weight: 900;-->
<!--            -webkit-font-smoothing: antialiased;-->
<!--            font-size: 10px;-->
<!--            vertical-align: top;-->
<!--            padding-top: 5px;-->
<!--            float: right;-->
<!--            color: #ffffff;-->
<!--        }-->
<!--        .arrow:before {-->
<!--            content: "";-->
<!--            display: block;-->
<!--            position: absolute;-->
<!--            border-width: 0 0.5rem 0.5rem 0.5rem;-->
<!--            border-color: transparent;-->
<!--            border-style: solid;-->
<!--            top: 0;-->
<!--            border-bottom-color: rgba(0,0,0,0.25);-->
<!--        }-->
<!--        .arrow:after {-->
<!--            content: "";-->
<!--            display: block;-->
<!--            position: absolute;-->
<!--            border-width: 0 0.5rem 0.5rem 0.5rem;-->
<!--            border-color: transparent;-->
<!--            border-style: solid;-->
<!--        }-->
<!--        ul.dropdown-menu li {-->
<!--            color : #4F4F4F;-->
<!--            min-width : 10rem;-->
<!--            transition: background-color 0.25s ease-in-out;-->
<!--        }-->
<!--        ul.dropdown-menu li a {-->
<!--            color : #4F4F4F;-->
<!--            padding: 15px;-->
<!--            display: block;-->
<!--            width: 100%;-->
<!--            cursor: pointer;-->
<!--            transition: background-color 0.25s ease-in-out;-->
<!--            text-decoration : none;-->
<!--            clear: both;-->
<!--            font-weight: 400;-->
<!--            line-height: 1.42857143;-->
<!--            white-space : nowrap;-->
<!--        }-->
<!--        ul.dropdown-menu li a i {-->
<!--            margin-right : 1rem;-->
<!--        }-->
<!--        .account-item:hover {-->
<!--            background: #eee;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!-- Start Header -->
<!--<header class="header">-->
<!--    <div style="width: 20%">-->
<!--        <a href="{{ url('/') }}" class="logo-link">-->
<!--            <img style="height:60px" class="logo" src="{{ asset('new-assets/images/new/logo.jpg') }}" alt="Bookyourdata Email List Logo" width="112" height="100">-->
<!--        </a>-->
<!--    </div>-->
<!--    <nav>-->
<!--        @if(isset($allcontacts)) -->
<!--        <div class="search-header">-->
<!--            <div class="leads-count" style="display:none">{{$allcontacts}} Contacts</div>-->
<!--        </div>-->
<!--        @endif-->
<!--        <div class="search-header">-->
<!--            <div class="leads-count">Unused Credits {{$userinfo->credit}}</div>-->
<!--        </div>-->
<!--        <ul>-->
<!--            <li>-->
<!--                <div class="upgrade-header-btn no-dropdown" id="page_dashboard">Dashboard</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="upgrade-header-btn no-dropdown" id="page_filter">Advanced Search</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="upgrade-header-btn no-dropdown" id="page_company">Company Search</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="upgrade-header-btn no-dropdown" id="page_email">Email Search</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="upgrade-header-btn no-dropdown" id="page_phone">Phone Search</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="upgrade-header-btn no-dropdown" id="page_myleads">My Leads</div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="upgrade-header-btn no-dropdown" id="page_upgradeplan">Upgrade Plan</div>-->
<!--            </li>-->
<!--            <li class="dropdown account-info open" style="position:relative">-->
<!--                <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-decoration:none">-->
                    
<!--                    <div class="upgrade-header-btn has-dropdown" id="expand_account">-->
<!--                        {{$username}}-->
<!--                        <i class="fa fa-chevron-down"  style="padding-left:5px;"></i>-->
<!--                    </div>-->
<!--                </a>-->
<!--                <ul class="dropdown-menu" id="account_dropdown" style="display:none">-->
<!--                    <div class="arrow"></div>-->
<!--                    <li class="account-item" id="account_account"><a><i class="fa fa-user"></i>Account </a></li>-->
<!--                    <li class="account-item" id="account_billing"><a><i class="fa fa-suitcase"></i>Billing </a></li>-->
<!--                    <li class="account-item" id="account_support"><a><i class="fa fa-question-circle"></i>Support </a></li>-->
<!--                    <li class="account-item" id="account_sign_out"><a><i class="fa fa-sign-out"></i>Logout </a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </nav>-->
<!--</header>-->
<!-- End Header -->
<script>
$("#page_filter").click(function(e){
    // location.href = "/tool/dashboard";
    location.href = "/tool/advanced-search";
});
// $("#page_company").click(function(e){
//     location.href = "/tool/company-search";
// });
// $("#page_email").click(function(e){
//     location.href = "/tool/email-search";
// });
// $("#page_phone").click(function(e){
//     location.href = "/tool/phone-search";
// });
$("#page_myleads").click(function(e){
    location.href = "/tool/my-leads";
});
$("#page_dashboard").click(function(e){
     location.href = "/tool/advanced-search";
});
$("#page_upgradeplan").click(function(e){
    location.href = "/tool/upgrade-plan";
});
$("#page_myaccount").click(function(e){
    location.href = "/tool/my-account";
});
$("#expand_account").click(function(e){
    var expanded = $(this).parents('a').attr('aria-expanded');
    console.log(expanded);
    if(expanded == "false") {
        $(this).parents('li').addClass('open');
        $(this).parents('a').attr('aria-expanded','true');
        $("#account_dropdown").css("display","block");
    } else {
        $(this).parents('li').removeClass('open');
        $(this).parents('a').attr('aria-expanded','false');
        $("#account_dropdown").css("display","none");
    }
})
$("#account_account").click(function(e) {
    location.href = "/tool/account";
})
$("#account_billing").click(function(e) {
    location.href = "/tool/account-billing";
})
$("#account_support").click(function(e) {

})
$("#account_sign_out").click(function(e) {
    window.location = '/alogout';
})
$("#account_dropdown").mouseleave(function(e) {
    $(this).css("display","none");
})
</script>