 $(document).ready(function(){
         
   

/* FIXED */
//Scroll Menu f*/
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
        $(".top_hd").addClass("fixed");
    } else {
        $(".top_hd").removeClass("fixed");
    }
});	

/* animation scroll */

 // wow = new WOW(
      // {
        // animateClass: 'animated',
        // offset:       100,
        // callback:     function(box) {
          // console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        // }
      // }
    // );
    // wow.init();
    // document.getElementById('moar').onclick = function() {
      // var section = document.createElement('section');
      // section.className = 'section--purple wow fadeInDown';
      // this.parentNode.insertBefore(section, this);
    // };
	
	/* slider fade index page */
	 $('.carousel-fade').carousel({
      interval: 1000
    })
         });
		 
		 
		 var sampleEvents = {
	"monthly": [
		{
		"id": 1,
		"name": "Whole month event",
		"startdate": "2016-10-01",
		"enddate": "2016-10-31",
		"starttime": "12:00",
		"endtime": "2:00",
		"color": "#99CCCC",
		"url": ""
		},
		{
		"id": 2,
		"name": "Test encompasses month",
		"startdate": "2016-10-29",
		"enddate": "2016-12-02",
		"starttime": "12:00",
		"endtime": "2:00",
		"color": "#CC99CC",
		"url": ""
		},
		{
		"id": 3,
		"name": "Test single day",
		"startdate": "2016-11-04",
		"enddate": "",
		"starttime": "",
		"endtime": "",
		"color": "#666699",
		"url": "https://www.google.com/"
		},
		{
		"id": 8,
		"name": "Test single day",
		"startdate": "2016-11-05",
		"enddate": "",
		"starttime": "",
		"endtime": "",
		"color": "#666699",
		"url": "https://www.google.com/"
		},
		{
		"id": 4,
		"name": "Test single day with time",
		"startdate": "2016-11-07",
		"enddate": "",
		"starttime": "12:00",
		"endtime": "02:00",
		"color": "#996666",
		"url": ""
		},
		{
		"id": 5,
		"name": "Test splits month",
		"startdate": "2016-11-25",
		"enddate": "2016-12-04",
		"starttime": "",
		"endtime": "",
		"color": "#999999",
		"url": ""
		},
		{
		"id": 6,
		"name": "Test events on same day",
		"startdate": "2016-11-25",
		"enddate": "",
		"starttime": "",
		"endtime": "",
		"color": "#99CC99",
		"url": ""
		},
		{
		"id": 7,
		"name": "Test events on same day",
		"startdate": "2016-11-25",
		"enddate": "",
		"starttime": "",
		"endtime": "",
		"color": "#669966",
		"url": ""
		},
		{
		"id": 9,
		"name": "Test events on same day",
		"startdate": "2016-11-25",
		"enddate": "",
		"starttime": "",
		"endtime": "",
		"color": "#999966",
		"url": ""
		}
	]
	};

	$(window).load( function() {
		$('#mycalendar').monthly({
			mode: 'event',
			dataType: 'json',
			events: sampleEvents
		});
	});
	 $(document).ready(function(){
 $("a.collapsed").click(function(){
      $(this).toggleClass("collapsed");
  });
 });
 
 
 
 
 
 //graph-js
 
 var chart = null;
var dataPoints = [];

window.onload = function() {

chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "Daily Sales Data"
	},
	axisY: {
		title: "Units",
		titleFontSize: 24
	},
	data: [{
		type: "column",
		yValueFormatString: "#,### Units",
		dataPoints: dataPoints
	}]
});


$.getJSON("https://canvasjs.com/data/gallery/javascript/daily-sales.json?callback=?", callback);	

}

function callback(data) {	
	for (var i = 0; i < data.dps.length; i++) {
		dataPoints.push({
			x: new Date(data.dps[i].date),
			y: data.dps[i].units
		});
	}
	chart.render(); 
}
 
 