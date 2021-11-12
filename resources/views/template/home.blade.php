<!DOCTYPE html>
<html lang="en-US" class="js svg background-fixed">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ZoomData | Best B2B Contact Data Provider &amp; Sales Intelligence Platform</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Quicksand&display=swap" rel="stylesheet">
    <!--<link href="{{ asset('new-assets/css/homepage/css')}}" rel="stylesheet" type="text/css" media="all"> -->

    <script src="{{ asset('new-assets/js/filterpage/jquery.min.js')}}"></script>
    <!-- New Hompage Style -->
    <style type="text/css">
        body {
            background-color: #eee;
        }
        a {
            text-decoration: none;
            color: black;
            padding: 10px 20px;
            font-size: 14px;
            font-family: 'Quicksand', sans-serif;
        }
        .header {
            display: flex;
            height: 50px;
            justify-content: space-between;
            padding: 15px 30px;
        }
        .image-logo {

        }

        .trial-button {
            font-weight: bold;
            font-family: 'Quicksand', sans-serif;
            position: relative;
            margin-left: 30px;
        }
        .button-blue {
            background-color: rgb(70, 113, 255);
            border-radius : 20px;
            color: white;
            box-shadow: 3px 5px 3px rgb(150 166 221);
            width: 150px;
            font-family: 'Quicksand', sans-serif;
            transform: 0.3s all;
        }
        .button-blue:hover {
            background-color: rgb(25, 68, 207);
        }
        .overlay {
            position: absolute;
            z-index: -1;
        }
        .container {
            margin-left: auto;
            margin-right: auto;
        }
        .mini-filterpage-image {
            width: 100%;
        }
        @media (max-width: 600px) {
            .container {
                width: 60%;
            }
            .heading1 {
                font-size: 20px;
            }
        }
        @media (min-width: 600px) and (max-width: 750px) {
            .container {
                width: 80%;
            }
            .heading1 {
                font-size: 25px;
            }
        }
        @media (min-width: 750px) and (max-width: 1200px) {
            .container {
                width: 80%;
            }
            .heading1 {
                font-size: 25px;
            }
        }
        @media (min-width: 1200px) {
            .container {
                width: 1200px;
            }
            .section1-description {
                max-width: 40%;
            }
            .section1-button-container {
                max-width: 35%;
            }
            .mini-filterpage {
                max-width: 45%;
            }
            .heading1 {
                font-size: 40px;
            }
        }
        .section1-header {
            margin-left: auto;
            margin-right: auto;
            max-width: 50%;
        }
        .heading1 {
            text-align: center;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
        }
        .text {
            font-size: 12px;
            font-family: 'Poppins', sans-serif;
        }
        .section1-description {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            margin-top: 15px;
        }
        .section1-button-container {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            margin-top: 20px;
        }
        .mini-filterpage {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            margin-top: 50px;
        }
        .play-image {
            position: absolute;
            top: 4px;
            left: -11px;
            width: 30px;
        }
    </style>
</head>
</head>

<body>
    <!-- header -->
    <div class="header">
        <div class="logo">
            <img src="{{ asset('new-assets/images/homepage/logo.png')}}" class="image-logo"/>
        </div>
        <div class="header-buttons">
            <a href="/frontlogin" class="trial-button">FREE TRIAL </a>
            <a href="/frontlogin" class="button-blue">SIGN IN </a>
        </div>
    </div>
    
    <!-- section1 -->
    <div class="section1">
        <div class="overlay">
            <img src="{{ asset('new-assets/images/homepage/back_section1.png')}}" style="overlay-image"/>
        </div>
        <div class="container">
            <div class="section1-header">
                <div class="heading1">
                    Drafting Ultimate </br>
                    Content Marketing Strategy
                </div>
            </div>
            <div class="section1-description">
                <div class="text">
                    Lorem Ipsum is absolutely necessary in most design cases, too.</br>
                    Web design projects like landing pages
                </div>
            </div>
            <div class="section1-content">
                <div class="section1-button-container">
                    <a href="" class="button-blue">GET STARTED </a>
                    <a href="" class="trial-button"><img src="{{ asset('new-assets/images/homepage/play.png')}}" class="play-image"/> WATCH VIDEO</a>
                </div>
                <div class="mini-filterpage">
                    <img src="{{ asset('new-assets/images/homepage/mini_filter.png')}}" class="mini-filterpage-image"/>
                </div>
            </div>
            <div class="text"></div>
        </div>
    </div>

    <!-- section2 -->
    <div class="section2">
    </div>

    
    <!-- section3 -->
    <div class="section3">
    </div>

    
    <!-- section4 -->
    <div class="section4">
    </div>

    
    <!-- section5 -->
    <div class="section5">
    </div>

    
    <!-- section6 -->
    <div class="section6">
    </div>

    
    <!-- section7 -->
    <div class="section7">
    </div>

    
    <!-- section8 -->
    <div class="section8">
    </div>

    <!-- footer -->
    <div class="footer">
    </div>
</body>


<script>
$(document).ready(function(){
    console.log('document ready');
})
$(document).on('mouseenter', '.purpose-item', function (e) {
    console.log('purpose-item mouseenter');
 //   $(this).removeClass('purpose-item');
  //  $(this).addClass('purpose-item-focus');
})
$(document).on('mouseleave', '.purpose-item-focus', function (e) {
    console.log('purpose-item-focus mouseout');
 //   $(this).removeClass('purpose-item-focus');
 //   $(this).addClass('purpose-item');

})
</script>
</html>