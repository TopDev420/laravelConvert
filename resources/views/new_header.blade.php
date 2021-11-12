<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ LAConfigs::getByKey('sitename') }} | {{$page}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('new-assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('new-assets/css/custom.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body>

    <header class="header header-fixed">
        <div id="loading-root"></div>
        <input type="hidden" name="" value="{{Session::get('user_id')}}" id="getsessionid">
        <div class="header-inner">
            <button id="mobileMenuOpenBtn" class="mobile-menu-toggle-btn" type="button"></button>
            <a href="{{ url('/') }}" class="logo-link">
                <img class="logo" src="{{ asset('new-assets/images/new/logo.jpg') }}" alt="Bookyourdata Email List Logo" width="112" height="100">

            </a>
            <nav id="main-nav" class="main-nav">
                <ul class="main-nav-list nav nav-primary">
                    <li class="nav-item">
                        <a class="nav-item-link" href="{{url('/tool/business')}}">Build a List</a>
                        <ul class="main-nav-sub nav nav-secondary">
                            <li class="nav-item">
                                <a class="nav-item-link  " href="{{url('/tool/business')}}">Business Contacts</a>
                                <a class="nav-item-link  " href="{{url('/tool/healthcare')}}">Healthcare
                                    Professionals</a>
                                <a class="nav-item-link  " href="{{url('/tool/real_estate')}}">Real Estate Agents</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-link" href="{{ url('/ready-made-lists') }}">Ready-made Lists</a>
                        <ul class="main-nav-sub nav nav-secondary">
                            <li class="nav-item">
                                <a class="nav-item-link" href="{{url('/ready-made-lists/job-levels')}}">Job Levels</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-item-link" href="{{ url('/ready-made-lists/job-titles') }}">Job Titles</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-item-link" href="{{url('/ready-made-lists/job-functions')}}">Job Functions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item-link" href="{{url('/ready-made-lists/industries')}}">Industries</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item-link" href="{{url('/ready-made-lists/healthcare-professionals')}}">Healthcare
                                    Professionals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item-link" href="{{url('/ready-made-lists/internationals')}}">International</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item-link" href="{{url('/ready-made-lists/real-estate')}}">Real Estate</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-link" href="{{url('/pricing')}}">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-link" href="{{url('/about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-link" href="#">Popular</a>
                        <ul class="main-nav-sub nav nav-secondary">
                            <li class="nav-item">
                                <a class="nav-item-link" href="{{url('/email-list-database/ceo')}}">CEO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item-link" href="{{url('/email-list-functions/hr')}}">HR</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item-link" href="{{url('/email-list-functions/attorney')}}">Attorney</a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-item-link" href="{{url('/email-list-industries/colleges-universities')}}">Colleges
                                    Universities</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item-link" href="{{url('/email-list-industries/pharmaceutical')}}">Pharmaceutical</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item-link" href="{{url('/email-list-functions/admission')}}">Admission</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="header-build-btn dropdown dropdown-build-list dropdown-arrow">
                <a class="button button-primary dropdown-btn" href="#" data-toggle="dropdown">Build a list</a>
                <div class="dropdown-container">
                    <div class="menu menu-secondary text-uppercase">
                        <a class="menu-item gap-bottom-small" href="{{url('/tool/business')}}">Business Contacts</a>
                        <a class="menu-item gap-bottom-small" href="{{url('/tool/healthcare')}}">Healthcare Professionals</a>
                        <a class="menu-item" href="{{url('/tool/real_estate')}}">Real Estate Agents</a>
                    </div>
                </div>
            </div>
            <div class="header-iconic-box iconic-box">
                <img src="{{ asset('new-assets/images/new/user-icon.jpg') }}" alt="">

                @if(!$currentid)
                    <div class="iconic-box-content">
                        <a href="{{ url('/frontlogin') }}" class="iconic-box-content-title iconic-box-content-title-link ">
                            <strong>User
                                Login</strong> </a>
                             


                                <br>
                        <a href="{{ url('/signup') }}" class="iconic-box-content-subtitle link-secondary">Not a member? Sign
                            up!</a>
                    </div>
                @else    

                    <div class="iconic-box-content dropdown dropdown-dashboard-menu dropdown-arrow dashbord-menu">
                    <a href="{{url('/dashboard/home')}}" class=" iconic-box-content-title iconic-box-content-title-link no-hover-text-decoration dropdown-btn" data-toggle="dropdown" aria-expanded="true">
                        <span class="u-flex u-flex-align-middle">
                            Hi {{Session::get('user_name')}}
                            <span style="margin-left: 10px;">
                                <img src="{{ asset('new-assets/images/new/dropdown-arrow.png') }}">
                            </span>
                        </span>
                    </a>
                    <a class="iconic-box-content-subtitle iconic-box-content-subtitle-link" href="{{url('dashboard/home')}}">
                        Dashboard
                    </a>
                    <div class="dropdown-container font-regular">
                        <ul class="list list-tertiary">
                            <li class="list-item list-tertiary-item-no-pad">
                                <div class="sidebar-nav sidebar-nav-without-icon">
                                    <a class="sidebar-nav-item sidebar-nav-item-tertiary" href="{{url('/dashboard/home')}}">Dashboard Home</a>
                                    <a class="sidebar-nav-item sidebar-nav-item-tertiary" href="{{url('/dashboard/profile')}}">Account Details</a>
                                    <a class="sidebar-nav-item sidebar-nav-item-tertiary" href="{{url('/dashboard/saved-searches')}}">Saved Searchs</a>
                                    <a class="sidebar-nav-item sidebar-nav-item-tertiary" href="{{url('/dashboard/downloads')}}">Exported Files</a>
                                    <a class="sidebar-nav-item sidebar-nav-item-tertiary" href="{{url('/dashboard/billing')}}">Billing</a>
                                    <a class="sidebar-nav-item sidebar-nav-item-tertiary" href="{{url('/dashboard/support')}}">Support</a>
                                    <a class="sidebar-nav-item sidebar-nav-item-tertiary" href="{{ url('/alogout') }}">Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif    

            </div>
            <div class="header-iconic-box header-iconic-box-phone iconic-box">
                <img src="{{ asset('new-assets/images/new/mobile-icon.jpg') }}" alt="">
                <div class="iconic-box-content">
                    <strong class="iconic-box-content-title" style="line-height: 18px;">866-340-4687</strong><br>
                    <span class="iconic-box-content-subtitle">Toll Free</span>
                </div>
            </div>
        </div>
    </header>

    <div class="aleart-login">
        <p><span><i class="fa fa-exclamation"></i></span> <div class="addmessage"></div></p>
    </div>

    <div class="aleart-success">
        <p><span><i class="fa fa-check" style="color: green;"></i></span><div class="addsuccess"></div></p>
    </div>

    @php
   
    $user_id = (Session::get('user_id')!='') ? Session::get('user_id') : '';
    $usercartdetails  = DB::table('cart')->where('user_id', $user_id)->get();

    $cart = array();

    if(!empty($_COOKIE['products'])) 
    {

        $cart = json_decode($_COOKIE['products'], true);
        $totalcartcount = count($cart);

    }else if(!empty($usercartdetails)){

        $cart = $usercartdetails;
        $totalcartcount = count($usercartdetails );
 
    }

    @endphp

    @if(!empty($cart))

    <div class="shopping-card-layout" data-toggle="modal" data-target="#getCodeModal">
        <a  class="shopping-card">
            <span><img src="{{ asset('new-assets/images/new/cart.png') }}" style="padding-top: 32px;"></span>
            <span class="shopping-card-count totalcarcount">{{$totalcartcount}}</span>
        </a>
    </div>

    @else

     <div class="shopping-card-layout">
        <a href="" class="shopping-card">
            <span><img src="{{ asset('new-assets/images/new/cart.png') }}" style="padding-top: 32px;"></span>
            <span class="shopping-card-count totalcarcount">0</span>
        </a>
    </div>

    @endif
   