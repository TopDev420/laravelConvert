<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="images/favicon.png">
      <title>Atluss | Calendar</title>
      <link href="style.css" rel="stylesheet">
	  <link href="css/responsive.css" rel="stylesheet">
	  <link href='css/fullcalendar.min.css' rel='stylesheet' />
<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />

	  <link href="css/scheduler.min.css" rel="stylesheet">
   </head>
   <body>
      <div class="wrapper">
         <header id="header">
            <div class="top_hd">
               <div class="container ">
                  <div class="row">
                     <div class=" col-sm-4 col-md-4">
                        <a href="index.html" class="logo"><img src="images/logo.png" class="img-responsive" alt="logo"/></a>                      
                     </div>
                     <div class="  col-sm-8 col-md-6 pull-right col-xs-12">
                        <ul class="list-inline social-links">
                           <li><a href="" class="icon-facebook" ></a></li>
                           <li><a href="" class="icon-twitter" ></a></li>
                           <li><a href="" class="icon-google" ></a></li>
                           <li><a href="" class="icon-instagram" ></a></li>
                        </ul>
                        <ul id="user-contact" >
                            <li><a href="signup.html">Sign Up</a></li>
                                 <li><a href="login.html">Log in</a></li>
                        </ul>
                        <nav id="navg" class="navbar navbar-tops">
                           <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              </button>
                              <a id="brand" class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"/></a>
                           </div>
                           <div id="navbar" class="collapse navbar-collapse">
                              <ul class="nav navbar-nav">
                                 <li><a href="index.html">Home</a></li>
                                 <li><a href="about.html">About</a></li>
                                 <li><a href="faq.html">faq  </a></li>
                                 <li><a href="contact.html">contact us </a></li>
                                 <li class="active"><a href="pricing.html">pricing</a></li>
								  <li class="visible-xs"><a href="signup.html">Sign Up</a></li>
                                 <li class="visible-xs"><a href="login.html">Log in</a></li>
                              </ul>
                           </div>
                           <!-- /.nav-collapse -->
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
            <!--top-hd-->
         </header>
         <!-- ====================== ===========================================================
            ==================================Header end==================================
            ========================================================-->
         <div class="abt-banner" data-aos="flip-right">
            <img src="images/abt-banner.jpg" class="img-responsive">
            <div class="abt_txt">Welcome</div>
         </div>
         <!-- ====================== ===========================================================
            ==================================about banner end==================================
            ========================================================-->
         <div class="about-actuss text-center wow bounceInUp" >
             <ul class="list-inline dashboard-list">
			   <li><a href="calendar.html">Calendar</a></li>
			   <li><a href="user-list.html">User List </a></li>
			   <li><a href="account.html">View Account </a></li>
			   <li><a href="help.html">Help</a></li>
			   <li><a href="feedback.html">Leave Feedback</a></li>
			   <li><a href="logout.html">Log Out</a></li>
			 </ul>
         </div>
         <!-- ====================== ===========================================================
            ==================================about actuss end==================================
            ========================================================-->
        
		
		  <div class="questions contact_pg">
            <div class="container">
			 <div class="pricing-frame wow slideInLeft">
			<div class="sign_ht clpse">
			 <div class="heading text-center">My Calendar</div>
			 <div class="heading text-center">Wednesday January 31,2018</div>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-warning">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         9:00 - 10:00
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
	  <h3>Details</h3>
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<br/>
		<button class="btn view">More Details</button><br/>
		<button class="btn view">Remove</button>
      </div>
    </div>
  </div>
  <div class="panel panel-warning">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          10:00 - 11:00 <span>Unavailable</span>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
	  
	  <h4 class="time"> 11:00 - 12:00</h4>
	  <label><input type="checkbox" >Make Available</label><br/>
        <input type="text" class="inputs" placeholder="11:00"><span class="to">To</span><input type="text" class="inputs" placeholder="12:00"><br/>
		<button class="btn view">Submit</button>
      </div>
    </div>
  </div>
  <div class="panel panel-warning">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
           11:00 - 12:00<span>open</span>
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <h3>Details</h3>
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<br/>
		<button class="btn view">More Details</button><br/>
		<button class="btn view">Remove</button>
      </div>
    </div>
  </div>
  </div>
				
					</div>
			  </div>
			  
			</div>
		 </div>    
      </div>
      <!-- Wrapper end-->
      
      <!-- jQuery  -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Bootstrap js -->
      <script src="js/bootstrap.min.js"></script>
      <!-- Animation on scroll js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script> 
      <!-- custom js -->
      <script src="js/main.js"></script>
	  <script type="text/javascript" src="js/monthly.js"></script>
	
	  <script src='js/moment.min.js'></script>
<script src='js/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
  <script type="text/javascript" src="js/scheduler.min.js"></script>
  <script>
$(function() { // document ready

    $('#calendar').fullCalendar({
      now: '2017-12-07',
      editable: true, // enable draggable events
      aspectRatio: 1.8,
      scrollTime: '00:00', // undo default 6am scrollTime
      header: {
        left: 'today prev,next',
        center: 'title',
        right: 'timelineDay,timelineThreeDays,agendaWeek,month,listWeek'
      },
      defaultView: 'timelineDay',
      views: {
        timelineThreeDays: {
          type: 'timeline',
          duration: { days: 3 }
        }
      },
      resourceLabelText: 'Rooms',
      resources: [
        { id: 'a', title: 'Auditorium A' },
        { id: 'b', title: 'Auditorium B', eventColor: 'green' },
        { id: 'c', title: 'Auditorium C', eventColor: 'orange' },
        { id: 'd', title: 'Auditorium D', children: [
          { id: 'd1', title: 'Room D1' },
          { id: 'd2', title: 'Room D2' }
        ] },
        { id: 'e', title: 'Auditorium E' },
        { id: 'f', title: 'Auditorium F', eventColor: 'red' },
        { id: 'g', title: 'Auditorium G' },
        { id: 'h', title: 'Auditorium H' },
        { id: 'i', title: 'Auditorium I' },
        { id: 'j', title: 'Auditorium J' },
        { id: 'k', title: 'Auditorium K' },
        { id: 'l', title: 'Auditorium L' },
        { id: 'm', title: 'Auditorium M' },
        { id: 'n', title: 'Auditorium N' },
        { id: 'o', title: 'Auditorium O' },
        { id: 'p', title: 'Auditorium P' },
        { id: 'q', title: 'Auditorium Q' },
        { id: 'r', title: 'Auditorium R' },
        { id: 's', title: 'Auditorium S' },
        { id: 't', title: 'Auditorium T' },
        { id: 'u', title: 'Auditorium U' },
        { id: 'v', title: 'Auditorium V' },
        { id: 'w', title: 'Auditorium W' },
        { id: 'x', title: 'Auditorium X' },
        { id: 'y', title: 'Auditorium Y' },
        { id: 'z', title: 'Auditorium Z' }
      ],
      events: [
        { id: '1', resourceId: 'b', start: '2017-12-07T02:00:00', end: '2017-12-07T07:00:00', title: 'event 1' },
        { id: '2', resourceId: 'c', start: '2017-12-07T05:00:00', end: '2017-12-07T22:00:00', title: 'event 2' },
        { id: '3', resourceId: 'd', start: '2017-12-06', end: '2017-12-08', title: 'event 3' },
        { id: '4', resourceId: 'e', start: '2017-12-07T03:00:00', end: '2017-12-07T08:00:00', title: 'event 4' },
        { id: '5', resourceId: 'f', start: '2017-12-07T00:30:00', end: '2017-12-07T02:30:00', title: 'event 5' }
      ]
    });
  
  });
  </script>
      </div>
   </body>
</html>