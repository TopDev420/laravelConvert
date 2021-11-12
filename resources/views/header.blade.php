<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ LAConfigs::getByKey('sitename') }} | {{$page}}</title>
    <link href="{{ asset('new-assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new-assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/13.0.4/css/intlTelInput.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('new-assets/css/select2.min.css') }}">
    <link href="{{ asset('new-assets/css/style.css') }}" rel="stylesheet">  
    <link href="{{ asset('new-assets/css/glead.css') }}" rel="stylesheet">  
    <link href="{{ asset('new-assets/css/Responsive.css') }}" rel="stylesheet">
  </head>
  <style>
  .dropdown {
    position: relative !important;
  }
  .dropdown-content {
    display: none !important;
    position: absolute !important;
    background-color: #f1f1f1 !important;
    min-width: 160px !important;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2) !important;
    z-index: 1 !important;
    list-style: none;
  }
  .dropdown-content li a {
    color: black !important;
    padding: 12px 16px !important;
    text-decoration: none !important;
    display: block !important;
    float: left;
  }
  .dropdown:hover .dropdown-content {display: block !important;}
  </style>
  <body>
    <header id="navigation-bar">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="col-md-2">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ LAConfigs::getByKey('logo') }}" alt=""></a>
            </div>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="col-md-8">
              @if(!$currentid)
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{ url('/') }}">Home  </a></li>
                <li><a href="{{ url('/pricing') }}">Pricing</a></li>
                <li><a href="{{ url('/buildlist') }}">Build A List</a></li>
                <li class="dropdown">
                  <a href="{{ url('/readymade') }}" class="dropbtn">Ready Made Lists <span class="caret"></span></a>
                  <ul class="dropdown-content">
                    <li><a href="{{ url('/jobtitle') }}">Job Titles</a></li>
                    <li><a href="{{ url('/industrie') }}">Industries</a></li>
                    <li><a href="{{ url('/healthprofessional') }}">Healthcare professionals</a></li>
                    <li><a href="{{ url('/healthprofessional') }}">Real Estate Agent</a></li>
                  </ul>
                </li>
                <li><a href="{{ url('/monthlyplan') }}">Monthly Plan</a></li>
                <li><a href="{{ url('/buildlist') }}"><button class="create-list">Create your list</button></a></li>
              </ul>
              @else
              <ul class="nav navbar-nav">
                 <li class="active"><a href="{{ url('/') }}">Home  </a></li>
                 <li><a href="{{ url('/pricing') }}">Pricing</a></li>
                 <li><a href="{{ url('/buildlist') }}">Build A List</a></li>
                 <li class="dropdown">
                    <a href="{{ url('/readymade') }}" class="dropbtn">Ready Made Lists <span class="caret"></span></a>
                    <ul class="dropdown-content">
                      <li><a href="{{ url('/jobtitle') }}">Job Titles</a></li>
                      <li><a href="{{ url('/industrie') }}">Industries</a></li>
                      <li><a href="{{ url('/healthprofessional') }}">Healthcare professionals</a></li>
                      <li><a href="{{ url('/healthprofessional') }}">Real Estate Agent</a></li>
                    </ul>
                 </li>
                 <li><a href="{{ url('/monthlyplan') }}">Monthly Plan</a></li>
                 <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                 <li><a href="{{ url('/buildlist') }}"><button class="create-list">Create your list</button></a></li>
              </ul>
              @endif
            </div>
            <div class="col-md-2">
              <ul class="nav navbar-nav navbar-right">
                @if(!$currentid)
                  <li><a href="{{ url('/frontlogin') }}"><i class="fa fa-user" aria-hidden="true"></i>user login</a></li>
                  <li><a href="{{ url('/signup') }}">Not a member? Sign up!</a></li>
                @else
                  <li><a href="{{ url('/alogout') }}">Logout</a></li>
                @endif
              </ul>
            </div>
          </div>
           <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>