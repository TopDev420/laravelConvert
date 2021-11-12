@include('new_header')
 <div class="jmbtrn jmbtrn-list-detail jmbtrn-regular-bg">
        <div class="container jmbtrn-list-detail-container table-layout-fixed">
            <div class="jmbtrn-list-detail-col-half jmbtrn-list-detail-col-left">
                <img class="img-responsive" src="{{ asset('new-assets/images/new/contact-list2.jpg') }}" alt="">
                <div class="box-contact-count">
                    <div class="vertical-center">
                        <span>Direct</span>
                        <span class="box-contact-count-title">
                            {{$functionDetails->total}}
                        </span>
                        <span>Email Contacts</span>
                    </div>
                </div>
            </div>
            <div class="jmbtrn-list-detail-col-half jmbtrn-list-detail-col-right">
                <div class="breadbrumb">
                    <a href="#" class="breadbrumb-item">Home</a>
                    <a href="#" class="breadbrumb-item">Ready-Made List by Industries</a>
                    <span class="breadbrumb-item">{{ucfirst($functionDetails->name)}}</span>


                </div>
                <div class="gap-bottom-small">
                    <h1 class="jmbtrn-title">{{$functionDetails->name}} EMAIL LIST</h1>
                    <strong class="jmbtrn-list-detail-subtitle"></strong>
                </div>
                <div class="gap-bottom">
                    <span class="jmbtrn-list-detail-price">
                        $ {{$functionDetails->price}}
                    </span>
                </div>
                <p class="text-loblolly">{{$functionDetails->banner_desc}}</p>
                <div class="gap-bottom-medium hidden-tlnd">
                    @if(!empty($readymadelistdata))
                    <button type="submit" class="button button-primary gap-right-plnu full-width-pld gap-bottom-small-pld buylistsingle">Buy Now</button>
                    @endif
                    <a href="<?Php echo url("/tool/business/{$link}") ?>" class="button button-secondary full-width-pld">Customize This
                        List</a>
                        @if(!empty($readymadelistdata['types']))
                       <input type="hidden" class="price-filter type" value="{{$readymadelistdata['types']}}">
                    @endif   
                     @if(!empty($readymadelistdata['saveid']))
                       <input type="hidden" class="price-filter savesearchid" value="{{$readymadelistdata['saveid']}}">
                    @endif  
                     @if(!empty($readymadelistdata['priceencrypt']))
                       <input type="hidden" class="price-filter buyprice" value="{{$readymadelistdata['priceencrypt']}}">
                    @endif  
                    @if(!empty($readymadelistdata['countencrypt']))
                       <input type="hidden" class="price-filter buycontact" value="{{$readymadelistdata['countencrypt']}}">
                    @endif 
                </div>
                <ul class="list row">
                    <li class="col-lg-4 col-md-5 col-sm-6 gap-bottom-small-tpd">
                        <span class="">
                            <img src="{{ asset('new-assets/images/new/checked.png') }}" alt="">
                        </span>
                        <span class="font-small align-middle gap-left-small">Best Price Guarantee</span>
                    </li>
                    <li class="col-lg-8 col-md-7 col-sm-6 gap-bottom-small-tpd">
                        <span class=""> <img src="{{ asset('new-assets/images/new/checked.png') }}" alt=""></span>
                        <span class="font-small align-middle gap-left-small">Last Update 05/07/2020</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <hr class="hr-line">
    <div class="pad-vertical-small">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 gap-bottom-small-tpd">
                    <div class="iconic-block">
                        <span class="">
                            <img src="{{ asset('new-assets/images/new/red-checked.png') }}" alt="">
                        </span>
                        <span class="iconic-block-text">95% Deliverability <br class="hidden-tpd">Guarantee</span>
                    </div>
                </div>
                <div class="col-sm-3 gap-bottom-small-tpd">
                    <div class="iconic-block">
                        <span class="">
                            <img src="{{ asset('new-assets/images/new/red-checked.png') }}" alt="">
                        </span>
                        <span class="iconic-block-text">Best Price <br class="hidden-tpd">Guarantee</span>
                    </div>
                </div>
                <div class="col-sm-3 gap-bottom-small-tpd">
                    <div class="iconic-block">
                        <span class="">
                            <img src="{{ asset('new-assets/images/new/csv.png') }}" alt="">
                        </span>
                        <span class="iconic-block-text">Instant <br class="hidden-tpd">Download (.csv)</span>
                    </div>
                </div>
                <div class="col-sm-3 gap-bottom-small-tpd">
                    <div class="iconic-block">
                        <span class="">
                            <img src="{{ asset('new-assets/images/new/v-week.png') }}" alt="">
                        </span>
                        <span class="iconic-block-text">Verified <br class="hidden-tpd">Weekly</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-line">
    <div class="pad-top-small">
        <div class="container">
            <div class="row gap-bottom-large">
                <div class="col-md-5">
                    <p><strong>DATA STRUCTURE OF FULL CONTACT DATA</strong></p>
                    <img src="{{ asset('new-assets/images/new/c-level.jpg') }}"
                        alt="" class="shadow-primary gap-bottom img-responsive">
                    <a href=""
                        class="button button-primary full-width gap-bottom-tld js-sampledata-download">Download A
                        Sample List</a>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <h2 class="primary-title h3">{{$functionDetails->name}}</h2>
                    <p><br></p>
                </div>
            </div>
            <a href="our-guarantees.html" class="block block-secondary block-link">
                <h5 class="block-text">We Guarantee Over 95% Email Deliverability With Complete Vcard Information</h5>
            </a>
            <div class="row pad-vertical">
                <div class="col-md-3 col-sm-6 gap-bottom-tld">
                    <span>
                        <img src="{{ asset('new-assets/images/new/red-big-checked.png') }}" alt="">
                    </span>
                    <h4>95% Deliverability Guarantee</h4>
                    <p class="clear-gap-bottom">Our data is verified by automated processes and human eyes. We're so
                        confident about our contact lists that we provide a 95% accuracy guarantee. If more than 5%
                        of your emails bounce, you'll get credits to make up the difference.</p>
                </div>
                <div class="col-md-3 col-sm-6 gap-bottom-tld">
                    <span>
                        <img src="{{ asset('new-assets/images/new/download-i.png') }}" alt="">
                    </span>
                    <h4>Instant Download</h4>
                    <p class="clear-gap-bottom">Get an email list in minutes and download it instantly as a
                        .csv file! Both file types can be integrated into your CRM application quickly
                        and easily. So you can get started with making new connections right away.</p>
                </div>
                <div class="col-md-3 col-sm-6 gap-bottom-tld">
                    <span>
                        <img src="{{ asset('new-assets/images/new/e-mail.png') }}" alt="">
                    </span>
                    <h4>Email, Phone, Company Information, &amp; More</h4>
                    <p class="clear-gap-bottom">We provide direct, detailed, specific information to help you make
                        more valuable connections with your future business contacts: emails, names, phone numbers,
                        postal addresses, business titles, company/industry information, department information,
                        fax numbers, revenue, and even employee information.</p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <span>
                        <img src="{{ asset('new-assets/images/new/copy.png') }}" alt="">
                    </span>
                    <h4>Unlimited Usage Rights</h4>
                    <p class="clear-gap-bottom">Once you order the list, you own it! Our pricing is transparent; we
                        don't charge extra fees for using the contacts we give you. There are no hidden fees or
                        contracts. We charge the same low price regardless of if you're a small start-up or a large
                        enterprise!</p>
                </div>
            </div>
            <div class="block block-secondary">
                <h5 class="block-text gap-bottom-small-tlnd">Best Price Guarantee</h5>
                <p class="text-white clear-gap-bottom">For sure there's no another supplier that can provide better
                    pricing with the same 95% email deliverability guarantee. Even if you find, we beat it directly!
                </p>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
        <h3 class="primary-title">Q&amp;A</h3>
        <div class="row">
        <div class="col-md-6">
        <h4>When were your data lists last updated?</h4>
        <p></p><p>Our data is verified weekly. We have developed a complex algorithm for this purpose. With this algorithm, we check the accuracy levels of our data against millions of sources and apply necessary updates.</p><p></p>
        </div>
        <div class="col-md-6">
        <h4>How long does it take to get my email list after I order online?</h4>
        <p></p><p>You can instantly download your database after your order is confirmed.</p><p></p>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <h4>I want to place an order, but I have doubts about the accuracy of the data. Why should I trust you?</h4>
        <p></p><p>All of the records we sell have a 95% accuracy guarantee. If you encounter a lower accuracy rate, you can contact our customer relations staff and we will provide you new data for free to make up the difference. We call it our Bounce-Back Guarantee.</p><p></p>
        </div>
        <div class="col-md-6">
        <h4>Do customers download files as Excel files?</h4>
        <p></p><p>We offer Excel files, .cvs files or .txt files.</p><p></p>
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
                        <li><a href="">European Mailing List</a></li>
                        <li><a href="">Physicians Mailing List</a></li>
                        <li><a href="">Architect Mailing List</a></li>
                        <li><a href="">Cpa Mailing List</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-uppercase">blocks by Job Function</h5>
                    <ul class="list text-capitalize">
                        <li><a href="">It Managers Contact List</a></li>
                        <li><a href="">Purchasing Mailing List</a></li>
                        <li><a href="">Human Resources Email List</a></li>
                        <li><a href="">Insurance Agents Mailing List</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-uppercase">Industry Contact Emails</h5>
                    <ul class="list text-capitalize">
                        <li><a href="">Pharmaceutical Mailing List</a></li>
                        <li><a href="">Hotels Mailing List</a></li>
                        <li><a href="">Oil Gas Mailing List</a></li>
                        <li><a href="">Wholesale Mailing List</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-uppercase">Healthcare Contact Lists</h5>
                    <ul class="list text-capitalize">
                        <li><a href="">Nurses Email Database</a></li>
                        <li><a href="">Chiropractors Email List</a></li>
                        <li><a href="">Dentist Mailing List</a></li>
                        <li><a href="">Veterinary Mailing List</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@include('new_footer')