@include('new_header')

    <div class="slider-block">
        <div class="owl-carousel owl-theme">

        	@for($i = 0; $i < count($sliders); $i++)
            <div class="item">
                <div class="jmbtrn jmbtrn-main" style="background-image: url({{$sliders[$i]->image_path}});">
                    <div class="container jmbtrn-container">
                        <div class="jmbtrn-inner">
                            <div class="row">
                                <div class="col-md-8 col-lg-6">
                                    <h1 class="jmbtrn-title jmbtrn-title-main">{{$sliders[$i]->title}}<br>{{$sliders[$i]->title2}}</h1>
                                    <ul class="list list-primary gap-bottom">
                                        <li class="list-item">Affordable</li>
                                        <li class="list-item">Accurate</li>
                                        <li class="list-item">Guaranteed</li>
                                    </ul>
                                    <p class="text-white">
                                        {{$sliders[$i]->content}}

                                        {{$sliders[$i]->description_second}}
                                    </p>
                                    
                                    <a class="button button-primary button-medium" href="{{url('/tool/business')}}">Build a
                                        list</a>
                                    <button class="button button-nonary gap-left-dnu full-width-pld"
                                        data-toggle="modal" data-target="#modal-preview"><span
                                            class="align-top gap-right">
                                        <img src="{{ asset('new-assets/images/new/video.png') }}"></span>1 Minute
                                        Overview
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             @endfor
            

        </div>
    </div>



    <div class="section">
        <div class="container">
            <h2 class="companies-title text-center">Trusted by the World's Best Sales &amp; Marketing Teams</h2>
            <div class="row pad-top-small">
                <div class="col-md-2 col-sm-3 col-xs-6 companies-item">
                    <img class="companies-logo" src="{{ asset('new-assets/images/new/companies/lukoil.png') }}" alt="">
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6 companies-item">
                    <img class="companies-logo" src="{{ asset('new-assets/images/new/companies/pepsi.png') }}"
                        alt="Pepsi Co. Trusts Our Mailing Lists">
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6 companies-item">
                    <img class="companies-logo" src="{{ asset('new-assets/images/new/companies/allianz.png') }}" alt="">
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6 companies-item">
                    <img class="companies-logo" src="{{ asset('new-assets/images/new/companies/randstad.png') }}"
                        alt="Randstad Uses Our Targeted Business Contacts">
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6 companies-item">
                    <img class="companies-logo" src="{{ asset('new-assets/images/new/companies/3m.png') }}" alt="">
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6 companies-item">
                    <img class="companies-logo" src="{{ asset('new-assets/images/new/companies/jbs.png') }}" alt="">
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6 companies-item">
                    <img class="companies-logo" src="{{ asset('new-assets/images/new/companies/bank-of-america.png') }}"
                        alt="Bank of America Trusts Our Email List">
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6 companies-item">
                    <img class="companies-logo" src="{{ asset('new-assets/images/new/companies/allstate.png') }}" alt="">
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6 companies-item">
                    <img class="companies-logo" src="{{ asset('new-assets/images/new/companies/nestle.png') }}" alt="Nestle Uses Our Email Database">
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6 companies-item">
                    <img class="companies-logo" src="{{ asset('new-assets/images/new/companies/manpower.png') }}" alt="">
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6 companies-item">
                    <img class="companies-logo" src="{{ asset('new-assets/images/new/companies/carlisle.png') }}"
                        alt="Carlisle Loves Our Business Email Lists">
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6 companies-item">
                    <img class="companies-logo" src="{{ asset('new-assets/images/new/companies/general-electric.png') }}"
                        alt="General Electric (GE) Loves Our Email Database">
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div class="section-flex pad-bottom pad-top bg-concrete relative">
        <div class="container">
            <div class="we-love-data gap-bottom text-center">
                <strong class="we-love-data-text">We</strong>
                <img src="{{ asset('new-assets/images/new/heart-icon.jpg') }}" alt="">
                <strong class="we-love-data-text">Data</strong>
            </div>
            <div class="section-flex-container u-color-black">
                <div class="section-flex-col-half section-flex-col-half-pad-right-medium align-top">
                    <p class="clear-gap-bottom">At Bookyourdata.com, we're all about bringing the right people together,
                        so whether
                        you need to pull a business, executive, or physician email list, we have the quality information
                        you need.
                        Buy sales blocks and potential contacts that are right for your business so that you can master
                        your next
                        direct marketing campaign. We provide our clients with premium data, including email addresses,
                        phone numbers,
                        postal addresses, and much more. Offering quality, human-verified contact lists to download
                        minutes after you buy
                        is our business. Clients benefit from our CRM-ready data product that's full of direct
                        information you need to start
                        emailing, calling, or mailing potential blocks. Contact lists for sale are available by job,
                        department,
                        and industry, allowing you to target the important decision-makers your business needs!</p>
                </div>
                <div class="section-flex-col-half section-flex-col-half-pad-left-medium align-top">
                    <p class="clear-gap-bottom">We guarantee accurate and up-to-date, premium contacts in our business
                        mailing lists.
                        We have developed the world's most innovative real-time online list-builder tool using our very
                        own data intelligence
                        algorithms and qualified data sources. Enjoy the safety and security of our proprietary tool.
                        With just a few easy steps, you'll have targeted email lists ready to be fed into your computer
                        systems
                        and CRM software. One product can serve multiple functions: You can use the file as a mailing
                        list,
                        an email database, and a simple directory of highly qualified business professionals in any
                        industry.
                        Buying direct marketing information from Bookyourdata.com is simple. You'll get an all-in-one,
                        premium
                        database full of targeted sales blocks that can be marketed to right away by phone or computer.
                        Get started now to connect with real businesses today!
                        <small class="u-color-black">
                            <strong>&nbsp;&nbsp;- CEO, </strong><a href="#">Gary Taylor</a>
                        </small>
                    </p>
                </div>
            </div>
            <div class="pad-top text-center">

                <span class="hs-cta-wrapper">
                    <span class="hs-cta-node ">
                        <a class="long-big-btn " href="{{url('/request-a-sample')}}" title="Request a Sample">Request a Sample</a>
                    </span>

                </span>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list">
                        <li class="iconic-content">
                            <div class="iconic-content-icon-area">
                                <img src="{{ asset('new-assets/images/new/offer/guarantee-icon.jpg') }}" alt="">
                            </div>
                            <div class="iconic-content-content">
                                <h3 class="iconic-content-title">95% Deliverability Guarantee</h3>
                                <p>If more than 5% of our emails bounce back, we'll provide credits for more data.</p>
                            </div>
                        </li>
                        <li class="iconic-content gap-bottom">
                            <div class="iconic-content-icon-area">
                                <img src="{{ asset('new-assets/images/new/offer/search-icon.jpg') }}" alt="">
                            </div>
                            <div class="iconic-content-content">
                                <h3 class="iconic-content-title">Search, Order, Download!</h3>
                                <p>Within minutes, you can download a database of contacts and start connecting with
                                    your audience.</p>
                            </div>
                        </li>
                        <li class="iconic-content">
                            <div class="iconic-content-icon-area">
                                <img src="{{ asset('new-assets/images/new/offer/mail-icon.jpg') }}" alt="">
                            </div>
                            <div class="iconic-content-content">
                                <h3 class="iconic-content-title">Unmatched Accuracy</h3>
                                <p>Both automated and manual processes ensure the accuracy of our human-verified lists.
                                </p>
                            </div>
                        </li>
                        <li class="iconic-content">
                            <div class="iconic-content-icon-area">
                                <img src="{{ asset('new-assets/images/new/offer/crm-icon.jpg') }}" alt="">
                            </div>
                            <div class="iconic-content-content">
                                <h3 class="iconic-content-title">CRM Ready Files</h3>
                                <p>Download your list as a .csv file, integrate it into your CRM, and start networking.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <ul class="list">
                        <li class="iconic-content gap-bottom">
                            <div class="iconic-content-icon-area">
                                <img src="{{ asset('new-assets/images/new/offer/premium.jpg') }}" alt="">
                            </div>
                            <div class="iconic-content-content">
                                <h3 class="iconic-content-title">Premium Full Contacts</h3>
                                <p>Contact from every angle by email, phone, postal address, and much more. Don’t miss
                                    your chance to
                                    make a connection.</p>
                            </div>
                        </li>
                        <li class="iconic-content gap-bottom">
                            <div class="iconic-content-icon-area">
                                <img src="{{ asset('new-assets/images/new/offer/International.jpg') }}" alt="">
                            </div>
                            <div class="iconic-content-content">
                                <h3 class="iconic-content-title">International Product Range</h3>
                                <p>Connect with high-level managers at companies in the US, UK, Canada, Europe, Asia,
                                    and more.</p>
                            </div>
                        </li>
                        <li class="iconic-content gap-bottom">
                            <div class="iconic-content-icon-area">
                                <img src="{{ asset('new-assets/images/new/offer/Affordable.jpg') }}" alt="">
                            </div>
                            <div class="iconic-content-content">
                                <h3 class="iconic-content-title">Affordable Pricing</h3>
                                <p>Quality email lists enable businesses to make B2B connections for an amazingly low
                                    price.</p>
                            </div>
                        </li>
                        <li class="iconic-content">
                            <div class="iconic-content-icon-area">
                                <img src="{{ asset('new-assets/images/new/offer/Direct.jpg') }}" alt="">
                            </div>
                            <div class="iconic-content-content">
                                <h3 class="iconic-content-title">Direct Contacts Only</h3>
                                <p>Don't bother contacting generics (such as contact@). With our lists, you can email
                                    real people.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section-flex pad-bottom-large pad-top-large bg-vapor">
        <div class="container">
            <div class="section-flex-container full-width">
                <div class="section-flex-col-half section-flex-col-half-pad-right-medium text-center align-middle">
                    <h4 class="secondary-title">Using Email for Sales Prospecting</h4>
                    <p>
                        Think like your audience, earn their trust, and convert them to customers
                    </p>
                    <p>

                        <span class="hs-cta-wrapper">
                            <span><a class="long-big-btn " href="{{url('download-e-book')}}" title="Download eBook"><span
                                        style="font-family: verdana, geneva;">Download
                                        eBook</span></a></span>

                        </span>

                    </p>
                </div>
                <div class="section-flex-col-half section-flex-col-half-pad-left-medium text-center">
                    <img src="{{ asset('new-assets/images/new/companies/ebook.png') }}" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="jmbtrn jmbtrn-build-list">
        <div class="container jmbtrn-container">
            <div class="jmbtrn-inner">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <h4 class="secondary-title text-white">Closing New Deals Is Tough, Right?</h4>
                        <p>
                            Bookyourdata.com gives you the information you need to reach decision-makers in your target
                            market,
                            so you can connect directly with the right people to close more deals.
                        </p>
                        <a class="button button-quaternary font-xxsmall-pld" href="{{url('/tool/business')}}">Build
                            Your Prospect List Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-flex section-flex-explore-lists ">
        <div class="container section-flex-container">
            <div class="section-flex-col-half section-flex-col-half-pad-right align-middle pad-top-vertical-tpd">
                <h3 class="primary-title clear-gap-top">Ready-made Lists</h3>
                <p>
                    Build your list with our list-builder tool, or buy one of our pre-built contact lists of managers
                    and stakeholders in several industries. Market to your target audience, whether it's doctors or
                    CFOs.
                    We have more than 100 lists to choose from!
                </p>
                <a class="button button-primary button-medium full-width-pld" href="{{url('/ready-made-lists')}}">
                    Explore Lists
                </a>
            </div>
            <div class="section-flex-col-half section-flex-col-half-pad-left align-middle">
                <ul id="ready-made-list" class="ready-made-list">
                    <li class="ready-made-list-item">
                        <a class="ready-made-list-item-link" href="{{url('/email-list-industries/hospitals')}}">
                            <span class="ready-made-list-item-link-text">Hospitals </span>
                            <span class="ready-made-list-item-link-subtext">
                                178,098 Contacts
                            </span>
                        </a>
                    </li>
                    <li class="ready-made-list-item">
                        <a class="ready-made-list-item-link" href="{{url('/email-list-database/ceo')}}">
                            <span class="ready-made-list-item-link-text">CEO </span>
                            <span class="ready-made-list-item-link-subtext">
                                52,560 Contacts
                            </span>
                        </a>
                    </li>
                    <li class="ready-made-list-item">
                        <a class="ready-made-list-item-link" href="{{url('/email-list-database/cfo')}}">
                            <span class="ready-made-list-item-link-text">CFO </span>
                            <span class="ready-made-list-item-link-subtext">
                                24,222 Contacts
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="jmbtrn jmbtrn-info">
        <div class="container jmbtrn-container">
            <div class="jmbtrn-inner text-center-tld pad-top-vertical-small-tpd">
                <div class="row">
                    <div class="col-md-3 col-sm-6 gap-bottom-tld">
                        <h4 class="jmbtrn-title jmbtrn-info-title">
                            <span class="js-counter" data-count-to="100" data-step="3"
                                data-trigger-tolerance="-400">100</span>M
                        </h4>
                        <span class="gap-left">Contacts</span>
                    </div>
                    <div class="col-md-3 col-sm-6 gap-bottom-tld">
                        <h4 class="jmbtrn-title jmbtrn-info-title">
                            <span class="js-counter" data-count-to="170" data-step="5"
                                data-trigger-tolerance="-400">170</span>
                        </h4>
                        <span class="gap-left">Countries</span>
                    </div>
                    <div class="col-md-3 col-sm-6 gap-bottom-tld">
                        <h4 class="jmbtrn-title jmbtrn-info-title">
                            <span class="js-counter" data-count-to="25521" data-step="552"
                                data-trigger-tolerance="-400">25,521</span>
                        </h4>
                        <span class="gap-left">Industries</span>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h4 class="jmbtrn-title jmbtrn-info-title">
                            <span class="js-counter" data-count-to="20" data-trigger-tolerance="-400">20</span>M
                        </h4>
                        <span class="gap-left">Companies</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="bg-concrete pad-vertical">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="text-uppercase">Email Lists</h5>
                    <ul class="list text-capitalize">
                        <li><a href="{{url('email-list-database/cfo')}}">Cfo Email List</a></li>
                        <li><a href="{{url('email-list-international/uk')}}">UK Email Database</a></li>
                        <li><a href="{{url('email-list-database/ceo')}}">Ceo Email Database</a></li>
                        <li><a href="{{url('email-list-database/cto')}}">Cto Email List</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-uppercase">blocks by Job Function</h5>
                    <ul class="list text-capitalize">
                        <li><a href="{{url('email-list-functions/sales-marketing')}}">Sales Marketing Email Database</a></li>
                        <li><a href="{{url('email-list-industries/construction')}}">Contractor Database</a></li>
                        <li><a href="{{url('email-list-functions/hr')}}">HR Email List</a></li>
                        <li><a href="{{url('email-list-functions/accountant')}}">Accountant Email Database</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-uppercase">Industry Contact Emails</h5>
                    <ul class="list text-capitalize">
                        <li><a href="{{url('email-list-functions/engineering')}}">Engineering Email List</a></li>
                        <li><a href="{{url('email-list-industries/pharmaceutical')}}">Pharmaceutical Database</a></li>
                        <li><a href="{{url('email-list-industries/biotechnology')}}">Biotechnology Email Database</a></li>
                        <li><a href="{{url('email-list-industries/hospitality')}}">Hotels Database</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-uppercase">Healthcare Contact Lists</h5>
                    <ul class="list text-capitalize">
                        <li><a href="{{url('email-list-healthcare/pharmacists')}}">Pharmacists Email List</a></li>
                        <li><a href="{{url('email-list-healthcare/chiropractors')}}">Chiropractors Email Database</a></li>
                        <li><a href="{{url('email-list-healthcare/dentists')}}">Dentist Email List</a></li>
                        <li><a href="{{url('email-list-healthcare/physicians')}}">Physician Database</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
      
@include('new_footer')

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