<!DOCTYPE html>
<html lang="en">
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
        .header {
            padding-left : 0px !important;
            display : flex;
            background : #209ad4;
        }
        .header nav .search-header {
            width : 20%;
        }
        .header nav {
            width : 80%;
        }
        .header nav .search-header .leads-count  {
            border-left : none !important;
            color : #fff;
        }
        
        .header nav ul li .upgrade-header-btn {
            background : #eee0;
        }
        .header nav ul li .no-dropdown:hover {
            border-bottom: inset;
        }
        .header nav ul li .has-dropdown:hover {
            border-bottom: none;
        }
        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            z-index: 1000;
            display: none;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            font-size: 14px;
            text-align: left;
            list-style: none;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #ccc;
            border: 1px solid rgba(0,0,0,.15);
            border-radius: 4px;
            -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
            box-shadow: 0 6px 12px rgba(0,0,0,.175);
        }
        ul.dropdown-menu .arrow {
            position: absolute;
            display: block;
            width: 1rem;
            height: 0.5rem;
            top: -0.6rem;
            right: 1.5rem;
        }
        ul.dropdown-menu {
            top: 2.3rem;
        }
        ul.dropdown-menu {
            -webkit-box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3);
            box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3);
        }
        ul.dropdown-menu {
            padding-top: 0px;
            padding-bottom: 0px;
            border-radius: 0.2rem;
            margin-top : 0px;
            right: 0;
            left: auto;
        }
        i.fa-chevron-down {
            font-weight: 900;
            -webkit-font-smoothing: antialiased;
            font-size: 10px;
            vertical-align: top;
            padding-top: 5px;
            float: right;
            color: #ffffff;
        }
        .arrow:before {
            content: "";
            display: block;
            position: absolute;
            border-width: 0 0.5rem 0.5rem 0.5rem;
            border-color: transparent;
            border-style: solid;
            top: 0;
            border-bottom-color: rgba(0,0,0,0.25);
        }
        .arrow:after {
            content: "";
            display: block;
            position: absolute;
            border-width: 0 0.5rem 0.5rem 0.5rem;
            border-color: transparent;
            border-style: solid;
        }
        ul.dropdown-menu li {
            color : #4F4F4F;
            min-width : 10rem;
            transition: background-color 0.25s ease-in-out;
        }
        ul.dropdown-menu li a {
            color : #4F4F4F;
            padding: 15px;
            display: block;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.25s ease-in-out;
            text-decoration : none;
            clear: both;
            font-weight: 400;
            line-height: 1.42857143;
            white-space : nowrap;
        }
        ul.dropdown-menu li a i {
            margin-right : 1rem;
        }
        .account-item:hover {
            background: #eee;
        }
    </style>
</head>
<!-- Start Header -->
<header class="header">
    <div style="width: 20%">
        <a href="{{ url('/') }}" class="logo-link">
            <img style="height:60px" class="logo" src="{{ asset('new-assets/images/new/logo.jpg') }}" alt="Bookyourdata Email List Logo" width="112" height="100">
        </a>
    </div>
    <nav>
        <div class="search-header">
            <div class="leads-count" style="display:none">{{$allcontacts}} Contacts</div>
        </div>
        <div class="search-header">
            <div class="leads-count">Unused Credits {{$userinfo->credit}}</div>
        </div>
        <ul>
            <li>
                <div class="upgrade-header-btn no-dropdown" id="page_dashboard">Dashboard</div>
            </li>
            <li>
                <div class="upgrade-header-btn no-dropdown" id="page_filter">Advanced Search</div>
            </li>
            <li>
                <div class="upgrade-header-btn no-dropdown" id="page_myleads">My Leads</div>
            </li>
            <li>
                <div class="upgrade-header-btn no-dropdown" id="page_upgradeplan">Upgrade Plan</div>
            </li>
            <li class="dropdown account-info open" style="position:relative">
                <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-decoration:none">
                    
                    <div class="upgrade-header-btn has-dropdown" id="expand_account">
                        {{$username}}
                        <i class="fa fa-chevron-down"  style="padding-left:5px;"></i>
                    </div>
                </a>
                <ul class="dropdown-menu" id="account_dropdown" style="display:none">
                    <div class="arrow"></div>
                    <li class="account-item" id="account_account"><a><i class="fa fa-user"></i>Account </a></li>
                    <li class="account-item" id="account_billing"><a><i class="fa fa-suitcase"></i>Billing </a></li>
                    <li class="account-item" id="account_support"><a><i class="fa fa-question-circle"></i>Support </a></li>
                    <li class="account-item" id="account_sign_out"><a><i class="fa fa-sign-out"></i>Logout </a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<!-- End Header -->
<script>
$("#page_filter").click(function(e){
    location.href = "/tool/advanced-search";
});
$("#page_myleads").click(function(e){
    location.href = "/tool/my-leads";
});
$("#page_dashboard").click(function(e){
    location.href = "/tool/dashboard";
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