@include('new_header')

<div class="jmbtrn jmbtrn-regular jmbtrn-regular-bg">
        <div class="container jmbtrn-container">
            <div class="jmbtrn-inner">
                <div class="row">
                    <div class="col-md-5">
                        <h1 class="jmbtrn-title">{{ $pricing->title }}</h1>
                        <div class="breadbrumb">
                            <a href="/" class="breadbrumb-item">Home</a>
                            <span class="breadbrumb-item">Pricing</span>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <p>{{ $pricing->monthly_desp_one }}<br>
                           {{ $pricing->monthly_dep_two }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="pad-bottom">
        <div class="container regular-page-content regular-page-content-pull-top">
            <div class="tab tab-primary tab-btn-md-3 tab-responsive-sm">
                <div class="tab-nav js-tabs">
                    <a class="is-active" href="#content1" data-toggle="tab" role="tab">Business Contacts</a>
                    <a class="" href="#content2" data-toggle="tab" role="tab" >Healthcare Professionals</a>
                    <a class="" href="#content3" data-toggle="tab" role="tab">Real Estate Agents</a>
                    <button id="tab-toggle-btn" class="tab-toggle-btn" type="button"></button>
                </div>
            </div>
            <div id="content1" class="tab-content fade pad-top-small active in">
                <div class="box box-info gap-bottom">
                    <div class="row">
                        <div class="col-lg-4 gap-bottom-small-tlnd">
                            <h2 class="secondary-title clear-gap-vertical font-medium">Business Contacts</h2>
                            <span>Select your desired category.</span>
                        </div>
                        <div class="col-lg-8 text-right-dnu">
                            <a class="button button-septenary button-small text-uppercase gap-bottom-small-tld full-width-pld"
                                href="{{ url('/ready-made-lists/job-levels') }}">By Job Level</a>
                            <a class="button button-septenary button-small text-uppercase gap-bottom-small-tld full-width-pld"
                                href="{{ url('/jobtitle') }}">By Job Title</a>
                            <a class="button button-septenary button-small text-uppercase gap-bottom-small-tld full-width-pld"
                                href="{{url('/ready-made-lists/job-functions')}}">By Job Function</a>
                            <a class="button button-septenary button-small text-uppercase gap-bottom-small-tld full-width-pld"
                                href="{{ url('ready-made-lists/industries') }}">By Industry</a>
                            <a class="button button-septenary button-small text-uppercase gap-bottom-small-tld full-width-pld"
                                href="{{url('ready-made-lists/internationals')}}">By Country</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-tertiary table-fixed table-highlight gap-bottom-large">
                        <thead>
                            <tr>
                                <th># Of Records</th>
                                <th>Prices</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($price_slakes as $queries){
                                $deleted = $queries->deleted_at;
                                $types = $queries->types;
                                if(empty($deleted)){
                                    if($types == 'b_contact'){
                                        $record = $queries->record_range;
                                       $price = explode('-', $queries->price_range);
                                      
                            ?>
                                <tr>
                                    <td class="text-semibold"><?php echo $record ?></td>
                                    <td>$ <?php echo $price[0] ?> - $<?php echo $price[1] ?></td>
                                </tr>
                            <?php } } } ?> 
  
                        </tbody>
                    </table>
                </div>
                <h5>Best Price Guarantee</h5>
                <p>If you find any lower price with same 95% deliverability guarantee for same premium full direct
                    email contact list, we beat it directly!</p>
                <p>Our transparent, affordable pricing provides small businesses and start-ups with the tools they need
                    to succeed at a price entrepreneurs can afford. The pricing is simple; there are no extra fees for
                    using our contacts, and we don't charge more depending on the size of your company. Our email lists
                    also often have a great ROI; the targeted blocks provided could block to thousands in sales to an
                    enterprising company!</p>
            </div>
            <div id="content2" class="tab-content fade pad-top-small">
                <div class="box box-info gap-bottom">
                    <div class="row">
                        <div class="col-lg-5 gap-bottom-small-tlnd">
                            <h2 class="secondary-title clear-gap-vertical font-medium">Healthcare Professionals</h2>
                            <span>You can select your desired category from right options.</span>
                        </div>
                        <div class="col-lg-7 text-right-dnu">
                            <a class="button button-septenary button-small text-uppercase gap-bottom-small-tld full-width-pld"
                                href="{{url('tool/healthcare')}}">View Healthcare Professionals</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-tertiary table-fixed table-highlight gap-bottom-large">
                        <thead>
                            <tr>
                                <th># Of Records</th>
                                <th>Prices</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($price_slakes as $queries){
                                $deleted = $queries->deleted_at;
                                $types = $queries->types;
                                if(empty($deleted)){
                                    if($types == 'h_contact'){
                                        $record = $queries->record_range;
                                        $price = explode('-', $queries->price_range);
                            ?>  
                                <tr>
                                   <td class="text-semibold"><?php echo $record ?></td>
                                   <td>$ <?php echo $price[0] ?> - $<?php echo $price[1] ?></td>
                                </tr>
                            <?php } } } ?>

                            
                        </tbody>
                    </table>
                </div>
                <h5>Best Price Guarantee</h5>
                <p>If you find any lower price with same 95% deliverability guarantee for same premium full direct
                    email contact list, we beat it directly!</p>
                <p>Our transparent, affordable pricing provides small businesses and start-ups with the tools they need
                    to succeed at a price entrepreneurs can afford. The pricing is simple; there are no extra fees for
                    using our contacts, and we don't charge more depending on the size of your company. Our email lists
                    also often have a great ROI; the targeted blocks provided could block to thousands in sales to an
                    enterprising company!</p>
            </div>
            <div id="content3" class="tab-content fade pad-top-small ">
                <div class="box box-info gap-bottom">
                    <div class="row">
                        <div class="col-lg-5 gap-bottom-small-tlnd">
                            <h2 class="secondary-title clear-gap-vertical font-medium">Real Estate Agents</h2>
                            <span>You can select your desired category from right options.</span>
                        </div>
                        <div class="col-lg-7 text-right-dnu">
                            <a class="button button-septenary button-small text-uppercase gap-bottom-small-tld full-width-pld"
                                href="{{url('tool/real_estate')}}">View Real Estate Agents</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-tertiary table-fixed table-highlight gap-bottom-large">
                        <thead>
                            <tr>
                                <th># Of Records</th>
                                <th>Prices</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach($price_slakes as $queries){
                                $deleted = $queries->deleted_at;
                                $types = $queries->types;
                                if(empty($deleted)){
                                    if($types == 'r_contact'){
                                        $record = $queries->record_range;
                                        $price = explode('-', $queries->price_range);
                            ?>
                            <tr>
                               <td class="text-semibold"><?php echo $record ?></td>
                               <td>$ <?php echo $price[0] ?> - $<?php echo $price[1] ?></td>
                            </tr>
                            <?php } } } ?>

                        </tbody>
                    </table>
                </div>
                <h5>Best Price Guarantee</h5>
                <p>If you find any lower price with same 95% deliverability guarantee for same premium full direct
                    email contact list, we beat it directly!</p>
                <p>Our transparent, affordable pricing provides small businesses and start-ups with the tools they need
                    to succeed at a price entrepreneurs can afford. The pricing is simple; there are no extra fees for
                    using our contacts, and we don't charge more depending on the size of your company. Our email lists
                    also often have a great ROI; the targeted blocks provided could block to thousands in sales to an
                    enterprising company!</p>
            </div>
        </div>
    </main>
    

	  
 @include('new_footer')