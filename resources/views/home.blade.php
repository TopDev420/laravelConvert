@include('header')

<!-- ==========Slider Start==========-->
      <div id="global-leade-slider">
         <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carousel" data-slide-to="0" class="active"></li>
               <li data-target="#carousel" data-slide-to="1"></li>
               <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
            	@for($i = 0; $i < count($sliders); $i++)
               <div class="@if ($i == 0) active @endif item">
                  <img src="{{$sliders[$i]->image_path}}" alt="">
                  <div class="caursal-caption-global">
                     <h2>{{$sliders[$i]->title}}<br>
                     	 {{$sliders[$i]->title2}}</h2>
                     <p>{{$sliders[$i]->content}}<br>
                     	{{$sliders[$i]->description_second}}</p>
                  </div>
               </div>
               @endfor
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
         </div>
      </div>
	  <!--==========Slider end==========-->

<section id="what-wedo ">
 <div class="container">
    <div class="col-md-5 col-sm-6">
	   <div class="we-do">
	      <h2>{{ $homedata->title }}</h2>
		  <p>{{ $homedata->description }}</p>
	   </div>
    </div> 
	<div class="col-md-3 col-sm-3">
	    <div class="we-search">
	        <h2><i class="fa fa-search" aria-hidden="true"></i></h2>
			<h3>{{ $homedata->search }}</h3>
		  	<p>{{ $homedata->srchcontent }}</p>
	   </div>   
    </div> 
	 <div class="col-md-4 col-sm-3">
	  <div class="our-price">
	          <h2><i class="fa fa-usd" aria-hidden="true"></i></h2>
			  <h3>{{ $homedata->international }}</h3>
		  	  <p>{{ $homedata->intercontent }}</p>
	   </div>
    </div> 
	
	
	<div class="col-md-3 col-sm-3">
	    <div class="our-deleviry">
	        <h2><i class="fa fa-search" aria-hidden="true"></i></h2>
			<h3>{{ $homedata->deliverability }}<br></h3>
		    <p>{{ $homedata->deliverable_content }}
			</p>
	    </div>
    </div> 
	 <div class="col-md-3 col-sm-3">
	  <div class="our-contact">
	          <h2><i class="fa fa-bar-chart" aria-hidden="true"></i></h2>
			  <h3>{{ $homedata->premium_contact }}</h3>
		     <p>{{ $homedata->premium_content }}</p>
	   </div>
    </div> 
	 <div class="col-md-3 col-sm-3">
	  <div class="our-crm">
	          <h2><i class="fa fa-file-text" aria-hidden="true"></i></h2>
			  <h3>{{ $homedata->file_title }}</h3>
		  <p>{{ $homedata->file_content }}</p>
	   </div>
    </div> 
	 <div class="col-md-3 col-sm-3">
	  <div class="our-distrect">
	           <h2><i class="fa fa-users" aria-hidden="true"></i></h2>
			   <h3>{{ $homedata->direct_contacts }}</h3>
		  	   <p>{{ $homedata->direct_content }}</p>
	   </div>
    </div> 
    
 </div> 
</section>
  
<section id="regsiter">
    <div class="container">
	    <div class="col-md-12">
		   	<div class="Register-YourSelf">
		     	<div class="register-form">
				    <h1>Register YourSelf</h1>
				    <form action="{{ url('/dosignup') }}" method="post"  role="form">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="col-md-6">
						    <div class="form-group">
							 <input type="text" name="fname" placeholder="First Name" required />
						    </div>
						</div>
						<div class="col-md-6">
						    <div class="form-group">
							 <input type="text" name ="lname" placeholder="Last Name" required />
						    </div>
						</div>
						<div class="col-md-6">
						    <div class="form-group">
							 <input type="email" class="email-address" name="email" placeholder="Business Email" required />
						    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group ph-no">
							 <input type="text" class="mobile-no" name="phone" placeholder="Mobile Number (Only Enter Digit)" required />
							</div>
					    </div>
						<div class="col-md-6">
							<div class="form-group">
							 <input type="password"  minlength="8" pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{7,19}$" title="Must contain at least  number and  uppercase and lowercase letter, and at least 8 or more characters" name="password" placeholder="Password*" required />
							</div>
					    </div>
						<div class="col-md-6">
							<div class="form-group">
							 <input type="password" name="cpassword" placeholder="Confirm Password*" required />
							</div>
					    </div>
						<div class="col-md-12">
							<button class="submit">Submit</button>
						</div>
					</form>
			 	</div>
		   	</div>
		</div>
	</div>
</section>
 
<div class="curve" style="background:url({{ asset('new-assets/images/curve.png') }}) no-repeat; background-size:cover;">
  </div>
    <section id="our-list" style="background:url({{ asset('new-assets/images/curve-image.jpg') }}) no-repeat; 
	  background-size:cover; position:relative">
     <div class="container">
	    <div class="col-md-12">
		     <div class="Ready-listorder" >
		        <div class="ready-list">
			      <h1>Our readymade List</h1>
				</div>
				<div class="business-contact">
				    <div class="bus-head">
					  <span class="bsn-contact">
					    <h1>BUSINESS CONTACTS</h1>
                         <p>You can select a ready-made list from below.</p>
					  </span>
					    <span class="bsn-cont-right">
					      <a href="">Create your list</a>
					  </span>
					</div> 
					
				<div class="first-level-row">
				  <div class="col-md-2 col-sm-2">
				    <h4>C-Level</h4>
				  </div> 
				  <div class="col-md-2 col-sm-2">
				    <h4>Over 1M</h4>
					 <p>Contacts</p>
					
				  </div>
				  <div class="col-md-6 col-sm-6">
				    <p>Get into contact with the most important executives
                    in business : CEOs, COOs, CIO, CFOs, and more.</p>
				  </div>
				  <div class="col-md-2 col-sm-2">
				    <a href="" type="button" class="reviews">Review</a></p>
				  </div>
		        </div>
			  <div class="first-level-row second-row">
				  <div class="col-md-2 col-sm-2">
				    <h4>VP</h4>
				  </div> 
				  <div class="col-md-2 col-sm-2">
				    <h4>300,000</h4>
					 <p>Contacts</p>
					
				  </div>
				  <div class="col-md-6 col-sm-6">
				    <p>Get into contact with the most important executives
                    in business : CEOs, COOs, CIO, CFOs, and more.</p>
				  </div>
				  <div class="col-md-2 col-sm-2">
				    <a href="" type="button" class="reviews">$14,000</a></p>
				  </div>
		      </div>
			  	<div class="first-level-row third-row">
				  <div class="col-md-2 col-sm-2">
				    <h4>Director</h4>
				  </div> 
				  <div class="col-md-2 col-sm-2">
				    <h4>700,000</h4>
					 <p>Contacts</p>
					
				  </div>
				  <div class="col-md-6 col-sm-6">
				    <p>Get into contact with the most important executives
                    in business : CEOs, COOs, CIO, CFOs, and more.</p>
				  </div>
				  <div class="col-md-2 col-sm-2">
				    <a href="" type="button" class="reviews"> $27,000</a></p>
				  </div>
		        </div>
				  <div class="first-level-row second-row">
				  <div class="col-md-2 col-sm-2">
				    <h4>Manager</h4>
				  </div> 
				  <div class="col-md-2 col-sm-2">
				    <h4>300,000</h4>
					 <p>Contacts</p>
					
				  </div>
				  <div class="col-md-6 col-sm-6">
				    <p>Get into contact with the most important executives
                    in business : CEOs, COOs, CIO, CFOs, and more.</p>
				  </div>
				  <div class="col-md-2 col-sm-2">
				    <a href="" type="button" class="reviews">Review</a></p>
				  </div>
		      </div>
			  
			  	<div class="first-level-row third-row">
				  <div class="col-md-2 col-sm-2">
				    <h4>Non <br>Manager</h4>
				  </div> 
				  <div class="col-md-2 col-sm-2">
				    <h4>Over 1M</h4>
					 <p>Contacts</p>
					
				  </div>
				  <div class="col-md-6 col-sm-6">
				    <p>Get into contact with the most important executives
                    in business : CEOs, COOs, CIO, CFOs, and more.</p>
				  </div>
				  <div class="col-md-2 col-sm-2">
				    <a href="" type="button" class="reviews">Review</a></p>
				  </div>
		        </div>
		  </div>
	 </div>
	 </div>
	 </div>
  </section>
  
  
<section id="our-pricing">
 <div class="container">
    <div class="col-md-3">
	   <div class="pricing">
	     <h2>{{ $homedata->pricetitle }}</h2>
		 <p>{{ $homedata->pricecont }}</p>
	   </div>
    </div>
	<div class="col-md-9">
	<!--main-Tab-->
	<div class="web-tabs">
     <ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active">
		<a href="#business" aria-controls="home" role="tab" data-toggle="tab"><span class="bag"><img src="{{ asset('new-assets/images/bags.png') }}" alt=""></span><br><span class="busnes">Business Contacts</span></a></li>
		<li role="presentation"><a href="#Healthcare" aria-controls="profile" role="tab" data-toggle="tab"><span class="bag"><img src="{{ asset('new-assets/images/user.png') }}" alt=""></span><br><span class="busnes">BusinessHealthcare</span></a></li>
		<li role="presentation"><a href="#Real" aria-controls="messages" role="tab" data-toggle="tab"><span class="bag"><img src="{{ asset('new-assets/images/box.png') }}" alt=""></span><br><span class="busnes">Real Estate Agents</span></a></li>
	</ul>
 <!-- main-panes-->
	<div class="tab-content">
	    <!--sub-tabs-->	
		 <div role="tabpanel" class="tab-pane active" id="business">
		    <ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
				<a href="#Job" aria-controls="home" role="tab" data-toggle="tab">By Job Level</a></li>
				<li role="presentation"><a href="#Title" aria-controls="profile" role="tab" data-toggle="tab">By Job Title</a></li>
				<li role="presentation"><a href="#Function" aria-controls="messages" role="tab" data-toggle="tab">By Job Function</a></li>
				<li role="presentation"><a href="#Industry" aria-controls="profile" role="tab" data-toggle="tab">By Industry</a></li>
				<li role="presentation"><a href="#Country" aria-controls="messages" role="tab" data-toggle="tab">By Country</a></li>
	        </ul>
		 </div>
		<div role="tabpanel" class="tab-pane" id="Healthcare">2</div>
		<div role="tabpanel" class="tab-pane" id="Real">3</div>
		</div>
		<!--sub-tabs-content-->	
		<div class="tab-content">
		   <div role="tabpanel" class="tab-pane active" id="Job">
		      <div class="table-records">
			      <table>
					 <thead>
					  <tr>
					   <th colspan="">Records</th>
					   <th>PRICES</th>
					  </tr>
					</thead>
					 <tbody>
					   	
					  <tr>
					   <td>250 - 500</td>
					   <td>$79.00 - $129.00</td>
					 </tr>
					
					  <tr>
					   <td>500 - 1,000</td>
					   <td>$129.00 - $239.00</td>
					  </tr>
					   <tr>
					   <td>500 - 1,000</td>
					   <td>$129.00 - $239.00</td>
					  </tr> <tr>
					   <td>500 - 1,000</td>
					   <td>$129.00 - $239.00</td>
					  </tr> <tr>
					   <td>500 - 1,000</td>
					   <td>$129.00 - $239.00</td>
					  </tr>
					</tbody>
				</table>
             </div>
		     
		   </div>
			<div role="tabpanel" class="tab-pane" id="Title">2495</div>
			<div role="tabpanel" class="tab-pane" id="Function">2496</div>
			<div role="tabpanel" class="tab-pane" id="Industry">2497</div>
			<div role="tabpanel" class="tab-pane" id="Country">2498</div>
		</div>
	</div>
   </div>                      
      </div>                      
      </div>                      

    </div>
    </div>
</div>
</section>
	  
<section id="monthly-plan">
    <div class="container-fluid">
		<div class="col-md-3 col-sm-12">
		    <div class="mnthly-pln">
		        <h3>{{ $homedata->monthly_plan_title }}</h3>
				<p>{{ $homedata->monthly_content }}</p>
				<a href="" type="button" class="buynow">Buy Now</a>
			</div>								  
		</div>
		<div class="col-md-9 col-sm-12">
		    <div class="mnthly-start-list">
		        <div class="col-md-2 col-sm-3">
				    <div class="free-price">
					 	<span class="main-circle">
						  	<img src="{{ asset('new-assets/images/square-01.png') }}"alt="">
					  	</span>
					  	<div class="hdng-text">
					   		<h4> FREE
							100 leads/month</h4>
							<p>For $0</p>
					  	</div>
					</div>
			 	</div>
				<div class="col-md-2 col-sm-2">
				    <div class="free-price">
					 <span class="main-circle">
						  <img src="{{ asset('new-assets/images/square-02.png') }}"alt="">
					  </span>
					    <div class="hdng-text">
							<h4> FREE
							100 leads/month</h4>
							<p>For $0</p>
						</div>
					</div>
				</div>
			   <div class="col-md-2 col-sm-3">
			   <div class="free-price">
				 <span class="main-circle">
					  <img src="{{ asset('new-assets/images/square-03.png') }}"alt="">
				  </span>
				    <div class="hdng-text">
					   <h4> FREE
						100 leads/month</h4>
						<p>For $0</p>
				    </div>
				</div>
			   </div> 
			   <div class="col-md-2 col-sm-2">
			      <div class="free-price">
				 <span class="main-circle">
					  <img src="{{ asset('new-assets/images/circle.png') }}"alt="">
				  </span>
				   <div class="hdng-text">
					  <h4> FREE
						100 leads/month</h4>
						<p>For $0</p>
					</div>
				</div>
			   </div>
			    <div class="col-md-2 col-sm-2">
				    <div class="free-price">
				 <span class="main-circle">
					  <img src="{{ asset('new-assets/images/circle-01.png') }}"alt="">
				  </span>
				    <div class="hdng-text">
					   <h4> FREE
						100 leads/month</h4>
						<p>For $0</p>
					</div>
				</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-12">
			   <div class="need-more">
			     <h4><span class="fa fa-briefcase magn-rght" aria-hidden="true"></span>
                      {{ $homedata->monthly_desp_one }}<br> 
                      {{ $homedata->monthly_dep_two }}
					</h4>
			   </div>
			</div>
		</div>
    </div>
</section>
@include('footer')

<script>
$(document).ready(function(e){
	$('.email-address').on("blur", function(){
 		var email = $('.email-address').val();
 		var reg = /^([\w-\.]+@(?!gmail.com)(?!yahoo.com)(?!hotmail.com)(?!yahoo.co.in)(?!aol.com)(?!abc.com)(?!xyz.com)(?!pqr.com)(?!rediffmail.com)(?!live.com)(?!outlook.com)(?!me.com)(?!msn.com)(?!ymail.com)([\w-]+\.)+[\w-]{2,4})?$/;
  		if (reg.test(email)){
 			return 0;
 		}
			else{
 			alert('Please enter your "business email", sorry we don`t accept free email providers like hotmail, yahoo, gmail or etc.');
 			return false;
			}
 	});
	$('.email-address').on("blur", function(){
 		var email = $('.email-address').val();
 		$.ajax({
	        headers: {
	            'X-CSRF-TOKEN': '{{ csrf_token() }}'
	        },
	    	type:'POST',
	       	url:"{{ url('/emailchecks') }}",
	       	data: {
	          	'email': email,
	      	},
	       	success:function(data){
	       	    if(data != 0){
	       	    	$("#email").after( '<span class="validetta-inline validetta-inline--right" style="color:#E74C3C;">This email address you entered is already in use on another account!<br></span>' );
	       	    }else{
	       	    	$(".validetta-inline").remove();
	       	    }
	       	}
		});
 	});

});

jQuery('.mobile-no').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});
</script>