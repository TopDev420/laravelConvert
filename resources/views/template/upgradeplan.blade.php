<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('new-assets/js/filterpage/jquery.min.js')}}"></script>
<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }
    *, *::before, *::after {
        box-sizing: border-box;
    }
    .container-1200 {
        margin: 0 auto;
        max-width: 1100px;
        width: 100%;
        position: relative;
    }
    .pricing-table-holder {
        width: 100%;
        display: inline-block;
        margin-bottom: 20px;
    }
    .notify-downgrade {
        font-size: 25px !important;
        background: coral !important;
        color: white !important;
        margin-bottom: 5px;
        padding-bottom: 5px;
        margin-top: 5px;
    }
    .pricing-table-version .plan-list-wrapper {
        padding-top: 45px;
    }
    .plan-list-wrapper {
        float: left;
        width: 100%;
        padding-bottom: 20px;
    }
    .plan-list-wrapper .plan-list-holder {
        display: flex;
        justify-content: center;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box {
        margin: 0;
    }
    .plan-list-wrapper .plan-list-holder .list-box {
        display: flex;
        flex-direction: column;
        width: 30%;
        margin: 0 0.9rem;
        text-align: center;
        max-width: 310px;
    }
    .tab-plan-holder {
        padding: 12px 0 0px 0;
        display: inline-block;
    }
    .tab-plan-holder .toggler.toggler--is-active {
        color: #2176b7;
    }
    .tab-plan-holder .toggler {
        color: #ddd;
        transition: 0.2s;
        font-weight: bold;
        cursor: pointer;
    }
    .tab-plan-holder .toggle, .tab-plan-holder .toggler {
        display: inline-block;
        vertical-align: middle;
        margin: 5px;
    }
    .tab-plan-holder .toggle {
        position: relative;
        width: 55px;
        height: 25px;
        border-radius: 100px;
        background-color: #2176b7;
        overflow: hidden;
        box-shadow: inset 0 0 2px 1px rgba(0, 0, 0, 0.05);
    }
    .tab-plan-holder .toggle, .tab-plan-holder .toggler {
        display: inline-block;
        vertical-align: middle;
        margin: 5px;
    }
    .tab-plan-holder .check {
        position: absolute;
        display: block;
        cursor: pointer;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        z-index: 6;
    }
    .tab-plan-holder .switch {
        position: absolute;
        top: 2px;
        bottom: 2px;
        background-color: #fff;
        border-radius: 36px;
        z-index: 1;
        transition-delay: 0s, 0.08s;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        left: 2px;
        right: 57.5%;
        transition: 0.25s cubic-bezier(0.785, 0.135, 0.15, 0.86);
        transition-property: left, right;
    }
    .tab-plan-holder .b {
        display: block;
    }
    .tab-plan-holder .offers-disp .offer-txt {
        padding-top: 5px;
        line-height: normal;
        font-size: 0.9rem;
        color: #898989;
    }
    .tab-plan-holder .offers-disp .offer-txt .new-offer {
        font-weight: 600;
        color: #333;
        font-size: 1.2rem;
    }
    .plan-list-wrapper .plan-list-holder .list-box .cta-holder {
        display: flex;
        justify-content: center;
        margin: 20px 0px 0px 0px;
        font-size: 1rem;
        flex-direction: column;
    }
    .plan-list-wrapper .plan-list-holder .list-box .cta-holder span {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .features-highlight-list {
        width: 100%;
        padding: 0;
        margin: 0;
    }
    .desktop-only {
        display: inline-block !important;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .features-highlight-list ul {
        padding: 0;
        width: 100%;
    }
    .plan-list-wrapper .plan-list-holder .list-box ul {
        text-align: left;
        padding-top: 20px;
        margin-top: 15px;
        border-top: 1px solid #ddd;
    }
    ul, li {
        list-style: none;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .f-terms ul li {
        text-align: left;
        display: flex;
        align-items: center;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .features-highlight-list ul li {
        padding: 13px 10px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }
    .plan-list-wrapper .plan-list-holder .list-box ul li {
        line-height: 20px;
        padding: 10px 0px;
        color: #787878;
    }
    .plan-list-wrapper .plan-list-holder .list-box ul li p.avail {
        opacity: 1;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .tooltip-ico {
        position: relative;
        display: inline-block;
        padding-left: 6px;
        color: #2176b7;
        cursor: pointer;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .tooltip-ico i {
        font-size: 0.95rem !important;
    }
    .plan-list-wrapper .plan-list-holder .list-box ul li i {
        font-size: 0.8rem;
        padding-right: 5px;
    }
    .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .tooltip-box {
        position: absolute;
        margin-left: 30px;
        margin-top: -52px;
        width: 250px;
        z-index: 1;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .tooltip-arrow-box {
        display: block;
        background: #f9f9f9;
        border: 1px solid #ddd;
        text-align: left;
        padding: 13px;
        position: relative;
        z-index: 1;
        font-size: 0.85rem;
        line-height: 19px;
    }
    .plan-list-wrapper .plan-list-holder .list-box .cta-holder.two-optionbut {
        min-height: 96px;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .box-bordered-content {
        -webkit-border-radius: 0px !important;
        -moz-border-radius: 0px !important;
        -ms-border-radius: 0px !important;
        border-radius: 0px !important;
        box-shadow: unset;
        border: 1px solid #ddd;
        padding: 0;
        width: 100%;
    }
    .plan-list-wrapper .plan-list-holder .list-box .box-bordered-content {
        background: #fff;
        -webkit-border-radius: 6px !important;
        -moz-border-radius: 6px !important;
        -ms-border-radius: 6px !important;
        border-radius: 6px !important;
        width: 92%;
        padding: 25px 4%;
        display: inline-block;
        margin-bottom: 1rem;
        box-shadow: 0px 3px 9px #aaa;
        position: relative;
    }
    .plan-list-wrapper .plan-list-holder .most-popular {
        position: absolute;
        top: -26px;
        width: 100%;
        left: 0;
        background: #00c147;
        padding: 4px 0px;
        border-radius: 5px 5px 0 0;
    }
    .plan-list-wrapper .plan-list-holder .most-popular span {
        color: #fff;
        font-size: 0.9rem;
        font-weight: 600;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .plan-name {
        padding: 10px 0px 2px;
    }
    .plan-list-wrapper .plan-list-holder .list-box .plan-name {
        line-height: normal;
        color: #2176b7;
        font-size: 1.5rem;
        padding: 10px 0px 10px;
    }
    .plan-list-wrapper .plan-list-holder .list-box .plan-price {
        font-size: 1.35rem;
        color: #686868;
        line-height: normal;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .plan-price span {
        padding: 0;
    }
    .plan-list-wrapper .plan-list-holder .list-box .plan-price span {
        color: inherit;
        font-size: 1.2rem;
    }
    .plan-list-wrapper .plan-list-holder .list-box .plan-price .pay-int-txt {
        font-size: 1rem;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .plan-price {
        display: inline-block;
    }
    .plan-list-wrapper .plan-list-holder .list-box .cta-holder .opt-but-area {
        flex-direction: column;
        margin: 0 15% 10px;
        width: 70%;
    }
    .plan-list-wrapper .plan-list-holder .list-box .cta-holder .trynow {
        border: none;
        -webkit-border-radius: 4px !important;
        -moz-border-radius: 4px !important;
        -ms-border-radius: 4px !important;
        border-radius: 4px !important;
        color: #fff;
        cursor: pointer;
        font-size: 0.95rem;
        line-height: normal;
        display: inline-block;
        padding: 8px 10px;
        background: #ffa500;
        margin-bottom: 10px;
    }
    .plan-list-wrapper .plan-list-holder .list-box .cta-holder .buynow.full-br {
        -webkit-border-radius: 4px !important;
        -moz-border-radius: 4px !important;
        -ms-border-radius: 4px !important;
        border-radius: 4px !important;
        text-decoration : none !important;
    }
    .plan-list-wrapper .plan-list-holder .list-box .cta-holder .buynow {
        padding: 7px 20px;
        background: #2176b7;
        color: #fff;
        border: 1px solid #2176b7;
        border-radius: 0 4px 4px 0;
        cursor: pointer;
    }
    .plan-list-wrapper .plan-list-holder .list-box .cta-holder .tiral-exp-holder {
        flex-direction: column;
        background: lavenderblush;
        border-radius: 30px;
    }
    .txt-green {
        color: #03c12c;
    }
    .txt-green, .txt-red {
        font-size: 13px;
        width: 100%;
        text-align: center;
        display: inline-block;
    }
    .txt-red {
        color: red;
    }
    .plan-list-wrapper .plan-list-holder .list-box ul li p.avail {
        opacity: 1;
    }
    .plan-list-wrapper .plan-list-holder .list-box ul li p {
        color: #787878;
        font-size: inherit;
        line-height: normal;
        opacity: 0.5;
        font-size: 0.87rem;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .features-highlight-list ul li p span {
        padding: 0;
        margin: 0;
        width: 100%;
    }
    .desktop-none {
        display: none !important;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .features-highlight-list ul li i {
        font-size: 1.1rem;
    }
    .plan-list-wrapper .plan-list-holder .list-box ul li i.fa.fa-check-circle {
        color: #00c147;
    }
    .plan-list-wrapper .plan-list-holder .list-box ul li i {
        font-size: 0.8rem;
        padding-right: 5px;
    }
    .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box .features-highlight-list ul li i.fa.fa-times-circle {
        color: #ea7979;
    }
    .pricing-table-version {
        float: left;
        width: 99.8%;
    }
    .pricing-content-wrapper {    
        min-height: calc(100% - 100px);
        width: 60%;
        background: #f9f9f9;
        transform: translateX(+30%);
        border-radius: 15px;
        margin-top: 30px;
    }
    .pricing-table-version .main-cta-text {
        color: #3190c1;
        font-size: 28px;
        line-height: normal;
        font-weight: 400;
        margin: 8px 0px 4px;
        padding: 10px 0px 0px;
    }
    .pricing-table-version .pricing-pop-brandtxt {
        font-size: 1.2rem;
        color: #686868;
    }
    .pricing-content-wrapper .pricing {
        float: left;
        width: 100%;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box {
        margin: 0;
        max-width: 290px;
    }
    .pricing-table-version .plan-list-wrapper .plan-list-holder .list-box.key-item-forplans {
        width: 40%;
        max-width: 320px;
    }
    .rr-panel .rr-panel-content {
        padding: 4rem;
    }
    #Features .trial-info-features .feature-list {
        list-style: none;
        display: grid;
        grid-template-columns: repeat(2,1fr);
        margin: 0;
        padding: 0 0 1rem 0;
        grid-row-gap: 1.5rem;
    }
    #Features .trial-info-features .feature-list .feature-list-item {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }
    #Features .trial-info-features .feature-list .feature-list-item .feature-list-item__icon {
        vertical-align: top;
        color: #03A9F4;
        font-size: 3rem;
        padding: 2rem;
    }
    #Features .trial-info-features .feature-list .feature-list-item .feature-list-item__icon img {
        width: 100%;
        max-width: 5rem;
    }
    #Features .trial-info-features .feature-list .feature-list-item .feature-list-item__info {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }
    #Features .trial-info-features .feature-list .feature-list-item .feature-list-item__info strong {
        font-size: 1.6rem;
    }
    body{
        background: linear-gradient(286.71deg,#00A7F7 13.39%,#0071FF 89.11%);
    }
    .rr-content {
        display: flex;
        flex-direction: column;
    }
    #Features {   
         background: #f9f9f9;
        width: 60%;
        transform: translateX(+30%);
        border-radius: 15px;
        margin-top: 60px;
    }
    #Faq {
        background: #f9f9f9;
        width: 60%;
        transform: translateX(+30%);
        border-radius: 15px;
        margin-top: 60px;    
        margin-bottom: 60px;
    }
    .rr-panel .rr-panel-content {
        padding: 4rem;
    }
    .rr-faq .question-group:first-child {
        padding-top: 20px;
    }
    .rr-faq .question-group {
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #ddd;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: pointer;
    }
    .rr-faq .question-group .question {
        font-weight: 500;
        margin: 0;
        display: block;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .rr-faq .question-group .question .question-text {
        color: #03A9F4;
        cursor: pointer;
        padding-right: 2rem;
    }
    .rr-faq .question-group .question .question-caret {
        color: #aaa;
        display: block;
        float: right;
    }
    .rr-faq .question-group .answer {
        color: #727272;
        padding-top: 0rem;
        margin: 0;
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        -webkit-transition: all .25s ease-in-out;
        transition: all .25s ease-in-out;
    }
    .rr-faq .question-group .answer.visible {
        padding-top: 2rem;
        opacity: 1;
        max-height: 30rem;
    }
    .tab-plan-holder .check:checked ~ .switch {
        right: 2px;
        left: 57.5%;
        transition: 0.25s cubic-bezier(0.785, 0.135, 0.15, 0.86);
        transition-property: right, left;
        transition-delay: 0s, 0.08s;
    }
    .back-advanced-search {    
        float: left;
        margin-top: 20px;
        margin-left: 30px;
        text-decoration-line: blink;
        color: white;
        background: #0172ff;
        border: 1px solid white;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 3px;
        padding-bottom: 3px;
    }
    .back-advanced-search:hover {   
         float: left;
        margin-top: 20px;
        margin-left: 30px;
        text-decoration-line: blink;
        color: white;
        background: #008efb;
        border: 1px solid white;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 3px;
        padding-bottom: 3px;
        text-decoration-line: underline;
    }
    .current-plan-txt {
        color: #f49c14;
        padding: 8px 0px;
    }
    .plan-list-wrapper .plan-list-holder .list-box .cta-holder .tiral-exp-holder span {
        flex-direction: unset;
        display: inline-block;
        width: 100%;
        font-weight: 800;
    }
    .plan-list-wrapper .plan-list-holder .list-box .cta-holder span {
        justify-content: center;
    }
    .button-disabled {
        background : #ccc !important;
        border: #ccc !important;
        color: #686868 !important;
        cursor: no-drop !important;
    }
</style>
</head>
<body>
    <input type="hidden" id="billing" name="billing" value="{{$userinfo->billing}}">                                                                
    <div id="blur-container" class="blur-container">
        <div class="rr-content">
            <div class="upgrade-plan-header">
                <div>
                    <a target="_self" href="/tool/advanced-search" class="back-advanced-search">Back to User Panel</a>
                </div>
            </div>
            
            <div class="pricing-content-wrapper">
                <section class="pricing-table-version">
                <div style="padding: 10px 0 10px 0px; float: left; width: 100%; text-align: center;"> 
                    @if($userinfo->down_plan != -1) 
                    <div class="pricing-pop-brandtxt notify-downgrade">You will get <b style="color : #0071ff">{{$userinfo->down_plan_name}}</b> plan from {{$userinfo->down_date}}</div>
                    @endif
                    <h1 class="main-cta-text">
                        Get instant access to <b style="">46M</b> business contacts
                    </h1>
                    <div class="pricing-pop-brandtxt">Unlimited searches. No contracts. No obligations. Cancel anytime.</div>
                   
                    <div id="disableDowngrade" class="pricing-pop-brandtxt" style="color:#f00;display:none">You have already downgraded plan at {{date("Y-m-d",strtotime($userinfo->last_downgrade))}}</br>Please wait until next month to downgrade plan</div>
                   
                </div>
                <div class="pricing">
                    <div class="table-container">
                        <div class="container1200">
                            <section class="pricing-table-holder mobile-none">
                                <div class="plan-list-wrapper">
                                    <div class="plan-list-holder ind-plan">
                                        <div class="list-box key-item-forplans">
                                            <div class="plan-features-list">
                                                <div class="box-bordered-content">
                                                    <div class="content-holder">
                                                        <p class="plan-name">&nbsp;</p>
                                                        <div>
                                                            <div class="tab-plan-holder" style="padding-top: 12px;">
                                                                <label for="switcher" id="filt-monthly" class="toggler toggler--is-active">Monthly</label>
                                                                <div class="toggle">
                                                                    <input type="checkbox" id="switcher" class="check" tabindex="0">
                                                                    <b class="b switch"></b>
                                                                </div>
                                                                <label for="switcher" id="filt-hourly" class="toggler">Yearly</label>

                                                                <div class="offers-disp" style="visibility:none">
                                                                    <p class="offer-txt">
                                                                        <span class="new-offer">&nbsp;</span>
                                                                        <br>
                                                                        <br></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="cta-holder" style="min-height: 42px; margin-top: 5px;">
                                                            <span style="padding: 8px 0 7px 0px">&nbsp;</span>
                                                        </div>
                                                    </div>
                                                    <div class="features-highlight-list f-terms desktop-only">
                                                        <ul>
                                                            <li>
                                                                <p class="avail">Credits</p>
                                                                <div class="tooltip-ico" id="creditsTooltip">
                                                                    <i class="fa fa-info-circle"></i>
                                                                    <div class="tooltip-box" style="margin-top: -50px;">
                                                                        <span class="tooltip-arrow-box" style="display:none">A credit is used when a contact is purchased from the Lead Builder, Prospector or Seeker.</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><p class="avail">Users</p></li>
                                                            <li>
                                                                <p class="avail">Lead Builder</p>
                                                                <div class="tooltip-ico" id="leadBuilderooltip">
                                                                    <i class="fa fa-info-circle"></i>
                                                                    <div class="tooltip-box" style="margin-top: -40px;">
                                                                        <span class="tooltip-arrow-box" style="display:none">Build targeted lists for your sales and marketing teams.</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <p class="avail">Chrome Extension</p>
                                                                <div class="tooltip-ico" id="chromeExtensionTooltip">
                                                                    <i class="fa fa-info-circle"></i>
                                                                    <div class="tooltip-box" style="margin-top: -50px;">
                                                                        <span class="tooltip-arrow-box" style="display:none">Find contact information across websites and social profiles with Adapt Prospector.</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li><p class="avail">Email Addresses</p></li>
                                                            <li><p class="avail">Direct Phone Numbers</p></li>
                                                            <li><p class="avail">Export contacts</p></li>
                                                            <li><p class="avail">Team Management</p></li>
                                                            <li><p class="avail">Team Credits Management</p></li>
                                                            <li>
                                                                <p class="avail">CRM Integrations</p>
                                                                <div class="tooltip-ico" id="crmListTooltip">
                                                                    <i class="fa fa-info-circle"></i>
                                                                    <div class="tooltip-box" style="margin-top: -32px;">
                                                                    <span class="tooltip-arrow-box" style="display:none">
                                                                        Salesforce, Zoho, Pipedrive, HubSpot.
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <p class="avail">Save Contacts to CRM</p>
                                                            </li>
                                                            <li><p class="avail">API Integrations</p></li>
                                                        </ul>
                                                    </div>
                                                    <div class="desktop-only" style="min-height: 55px;">
                                                        <div class="cta-holder two-optionbut"><span>&nbsp;</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Table Information -->
                                        <div class="list-box">
                                            <div class="box-bordered-content">
                                                <div class="content-holder">
                                                    <!--  Plan name -->
                                                    <p class="plan-name">Free</p>
                                                    <p class="plan-price">
                                                        <span>Forever</span>
                                                    </p>
                                                    <!-- Option button -->
                                                    <div>
                                                        <div class="cta-holder two-optionbut">
                                                            <span class="opt-but-area">
                                                                <?php if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                    <a href="/cancelSubscription" class="buynow full-br" tabindex="0"><span>Down Upgraded</span></a>
                                                                <?php }  else if( time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) {?>
                                                                    <a class="buynow full-br button-disabled" tabindex="0"><span>Down Upgraded</span></a>
                                                                <?php }?>
                                                                <?php if($userinfo->plan == 'free') { ?>
                                                                <span class="tiral-exp-holder">
                                                                    <span>
                                                                        <span class="current-plan-txt">Current Plan</span>
                                                                    </span>
                                                                </span>
                                                                <?php }?>
                                                            </span>    
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Highlights -->
                                                <div class="features-highlight-list">
                                                    <ul>
                                                        <li>
                                                            <p class="avail month-feature">
                                                                <span style="font-weight: 600 !important;">10</span>
                                                                <span class="desktop-none">&nbsp;credits&nbsp;</span>
                                                                per month
                                                            </p>
                                                            <p class="avail year-feature" style="display:none">
                                                                <span style="font-weight: 600 !important;">120</span>
                                                                <span class="desktop-none">&nbsp;credits&nbsp;</span>
                                                                per year
                                                            </p>
                                                            <p class="avail" style="display:none">
                                                                Custom
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                1
                                                                <span class="desktop-none">&nbsp; Users</span>
                                                                <span class="desktop-none">&nbsp; User</span>
                                                            </p>
                                                            <p class="avail" style="display:none">
                                                                Custom
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Email Addresses</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Phone Numbers</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Lead Builder</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">Chrome Extension</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">Engage</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">Email Tracker</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">CSV Export</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">CRM Integrations</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">Seeker(Web &amp; Sheets)</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">Seeker(Web &amp; Sheets)</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <!-- Option button -->
                                                <div style="min-height: 55px;">
                                                    <div class="cta-holder two-optionbut">
                                                        <span class="opt-but-area">
                                                            <?php if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                <a href="/cancelSubscription" class="buynow full-br" tabindex="0"><span>Down Upgraded</span></a>
                                                            <?php }  else if( time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) {?>
                                                                <a class="buynow full-br button-disabled" tabindex="0"><span>Down Upgraded</span></a>
                                                            <?php }?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <!-- Table Information -->
                                        <div class="list-box">
                                            <div class="box-bordered-content">
                                                <div class="most-popular" style="display:none">
                                                    <span>Most Popular</span>
                                                </div>
                                                <div class="content-holder">
                                                    <!--  Plan name -->
                                                    <p class="plan-name ng-binding">Essentials</p>
                                                    <!-- Pricing details -->
                                                    <p class="plan-price month-feature">
                                                        <span>
                                                            $49<span class="pay-int-txt">/month</span>
                                                        </span>
                                                    </p>
                                                    <p class="plan-price year-feature" style="display:none">
                                                        <span>
                                                            $588<span class="pay-int-txt">/year</span>
                                                        </span>
                                                    </p>
                                                    <!-- Option button -->
                                                    <div>
                                                        <div class="cta-holder two-optionbut">
                                                            <span class="opt-but-area">
                                                                <a class="trynow ng-binding" tabindex="0" style="display:none">14-Day FREE Trial</a>
                                                                
                                                                <?php if($userinfo->plan != 'essentials' && $userinfo->plan != 'free') { ?>
                                                                    <?php if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                        <a href="/checkout/essentials/monthly" class="buynow full-br month-feature" tabindex="0"><span>Down Upgraded</span></a>
                                                                    <?php } else if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                        <a class="buynow full-br month-feature button-disabled" tabindex="0"><span>Down Upgraded</span></a>
                                                                    <?php }?>
                                                                <?php } else if($userinfo->plan != 'essentials' && $userinfo->upgrade_plan == 1){?>
                                                                    <a href="/checkout/essentials/monthly" class="buynow full-br month-feature" tabindex="0"><span>Upgraded Now</span></a>
                                                                <?php } else if($userinfo->billing != 'monthly' && $userinfo->upgrade_plan == 1) {?>
                                                                    <a href="/checkout/essentials/monthly" class="buynow full-br month-feature" tabindex="0"><span>Upgraded Now</span></a>
                                                                <?php }?>

                                                                <?php if($userinfo->plan != 'essentials' && $userinfo->plan != 'free') { ?>
                                                                    <?php if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                        <a href="/checkout/essentials/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0"><span>Down Upgraded</span></a>
                                                                    <?php } else if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                        <a class="buynow full-br year-feature button-disabled" style="display:none" tabindex="0"><span>Down Upgraded</span></a>
                                                                    <?php }?>
                                                                <?php } else if($userinfo->plan != 'essentials' && $userinfo->upgrade_plan == 1){?>
                                                                    <a href="/checkout/essentials/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0"><span>Upgraded Now</span></a>
                                                                <?php } else if($userinfo->billing != 'yearly' && $userinfo->upgrade_plan == 1) {?>
                                                                    <a href="/checkout/essentials/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0"><span>Upgraded Now</span></a>
                                                                <?php }?>

                                                                <?php if($userinfo->plan == 'essentials' && $userinfo->billing == 'monthly') { ?>
                                                                    <?php if(time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->cancel_plan == 1) { ?>
                                                                        <a href="/cancelSubscription" class="buynow full-br month-feature" tabindex="0"><span>Cancel Plan</span></a>
                                                                    <?php }  else if( time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->cancel_plan == 1) {?>
                                                                        <a class="buynow full-br button-disabled" tabindex="0"><span>Cancel Plan</span></a>
                                                                    <?php }?>
                                                                    <span class="tiral-exp-holder month-feature">
                                                                        <span>
                                                                            <span class="current-plan-txt">Current Plan</span>
                                                                            
                                                                        </span>
                                                                    </span>
                                                                <?php }?>
                                                                <?php if($userinfo->plan == 'essentials' && $userinfo->billing == 'yearly') { ?><?php if(time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->cancel_plan == 1) { ?>
                                                                        <a href="/cancelSubscription" class="buynow full-br year-feature" tabindex="0"><span>Cancel Plan</span></a>
                                                                    <?php }  else if( time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->cancel_plan == 1) {?>
                                                                        <a class="buynow full-br button-disabled" tabindex="0"><span>Cancel Plan</span></a>
                                                                    <?php }?>
                                                                <span class="tiral-exp-holder year-feature" style="display:none">
                                                                    <span>
                                                                        <span class="current-plan-txt">Current Plan</span>
                                                                    </span>
                                                                </span>
                                                                <?php }?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Highlights -->
                                                <div class="features-highlight-list">
                                                    <ul>
                                                        <li>
                                                            <p class="avail month-feature">
                                                                <span style="font-weight: 600 !important;">200</span>
                                                                <span class="desktop-none">&nbsp;credits&nbsp;</span>
                                                                per month
                                                            </p>
                                                            <p class="avail year-feature" style="display:none">
                                                                <span style="font-weight: 600 !important;">2400</span>
                                                                <span class="desktop-none">&nbsp;credits&nbsp;</span>
                                                                per year
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                1
                                                                <span class="desktop-none">&nbsp; Users</span>
                                                                <span class="desktop-none">&nbsp; User</span>
                                                            </p>
                                                            <p class="avail" style="display:none">
                                                                Custom
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Email Addresses</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Phone Numbers</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Lead Builder</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Chrome Extension</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Engage</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">Email Tracker</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">CSV Export</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">CRM Integrations</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">Seeker(Web &amp; Sheets)</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">Seeker(Web &amp; Sheets)</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <!-- Option button -->
                                                <div style="min-height: 55px;">
                                                    <div class="cta-holder two-optionbut">
                                                        <span class="opt-but-area">
                                                            <a class="trynow ng-binding" tabindex="0" style="display:none">14-Day FREE Trial</a>
                                                            
                                                            <?php if($userinfo->plan != 'essentials' && $userinfo->plan != 'free') { ?>
                                                                <?php if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                    <a href="/checkout/essentials/monthly" class="buynow full-br month-feature" tabindex="0"><span>Down Upgraded</span></a>
                                                                <?php } else if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                    <a class="buynow full-br month-feature button-disabled" tabindex="0"><span>Down Upgraded</span></a>
                                                                <?php }?>
                                                            <?php } else if($userinfo->plan != 'essentials' && $userinfo->upgrade_plan == 1){?>
                                                                <a href="/checkout/essentials/monthly" class="buynow full-br month-feature" tabindex="0"><span>Upgraded Now</span></a>
                                                            <?php } else if($userinfo->billing != 'monthly' && $userinfo->upgrade_plan == 1) {?>
                                                                <a href="/checkout/essentials/monthly" class="buynow full-br month-feature" tabindex="0"><span>Upgraded Now</span></a>
                                                            <?php }?>

                                                            <?php if($userinfo->plan != 'essentials' && $userinfo->plan != 'free') { ?>
                                                                <?php if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                    <a href="/checkout/essentials/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0"><span>Down Upgraded</span></a>
                                                                <?php } else if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                    <a class="buynow full-br year-feature button-disabled" style="display:none" tabindex="0"><span>Down Upgraded</span></a>
                                                                <?php }?>
                                                            <?php } else if($userinfo->plan != 'essentials' && $userinfo->upgrade_plan == 1){?>
                                                                <a href="/checkout/essentials/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0"><span>Upgraded Now</span></a>
                                                            <?php } else if($userinfo->billing != 'yearly' && $userinfo->upgrade_plan == 1) {?>
                                                                <a href="/checkout/essentials/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0"><span>Upgraded Now</span></a>
                                                            <?php }?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <!-- Table Information -->
                                        <div class="list-box">
                                            <div class="box-bordered-content">
                                                <div class="most-popular">
                                                    <span>Most Popular</span>
                                                </div>
                                                <div class="content-holder">
                                                    <!--  Plan name -->
                                                    <p class="plan-name ng-binding">Pro</p>
                                                    <!-- Pricing details -->
                                                    <p class="plan-price month-feature">
                                                        <span>
                                                            $99<span class="pay-int-txt">/month</span>
                                                        </span>
                                                    </p>
                                                    <p class="plan-price year-feature" style="display:none">
                                                        <span>
                                                            $1188<span class="pay-int-txt">/year</span>
                                                        </span>
                                                    </p>
                                                    <!-- Option button -->
                                                    <div>
                                                        <div class="cta-holder two-optionbut">
                                                            <span class="opt-but-area">
                                                                <a class="trynow ng-binding" tabindex="0" style="display:none">14-Day FREE Trial</a>

                                                                <?php if($userinfo->plan == 'ultimate') { ?>
                                                                    <?php if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                        <a href="/checkout/pro/monthly" class="buynow full-br month-feature" tabindex="0"><span>Down Upgraded</span></a>
                                                                    <?php } else if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                        <a class="buynow full-br month-feature button-disabled" tabindex="0"><span>Down Upgraded</span></a>
                                                                    <?php } ?>
                                                                <?php } else if($userinfo->plan != 'ultimate' && $userinfo->plan != 'pro' && $userinfo->upgrade_plan == 1){?>
                                                                    <a href="/checkout/pro/monthly" class="buynow full-br month-feature" tabindex="0"><span>Upgraded Now</span></a>
                                                                <?php } else if($userinfo->plan == 'pro' && $userinfo->billing == 'yearly' && $userinfo->upgrade_plan == 1) { ?>
                                                                    <a href="/checkout/pro/monthly" class="buynow full-br month-feature" tabindex="0"><span>Upgraded Now</span></a>
                                                                <?php } ?>

                                                                <?php if($userinfo->plan == 'ultimate') { ?>
                                                                    <?php if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                        <a href="/checkout/pro/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0"><span>Down Upgraded</span></a>
                                                                    <?php } else if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                        <a class="buynow full-br year-feature button-disabled" style="display:none" tabindex="0"><span>Down Upgraded</span></a>
                                                                    <?php }?>
                                                                <?php } else if($userinfo->plan != 'ultimate' && $userinfo->plan != 'pro' && $userinfo->upgrade_plan == 1){?>
                                                                    <a href="/checkout/pro/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0"><span>Upgraded Now</span></a>
                                                                <?php } else if($userinfo->plan == 'pro' && $userinfo->billing == 'monthly' && $userinfo->upgrade_plan == 1) { ?>
                                                                    <a href="/checkout/pro/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0"><span>Upgraded Now</span></a>
                                                                <?php } ?>

                                                                <?php if($userinfo->plan == 'pro' && $userinfo->billing == 'monthly') { ?><?php if(time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->cancel_plan == 1) { ?>
                                                                        <a href="/cancelSubscription" class="buynow full-br month-feature" tabindex="0"><span>Cancel Plan</span></a>
                                                                    <?php }  else if( time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->cancel_plan == 1) {?>
                                                                        <a class="buynow full-br button-disabled" tabindex="0"><span>Cancel Plan</span></a>
                                                                    <?php }?>
                                                                <span class="tiral-exp-holder month-feature">
                                                                    <span>
                                                                        <span class="current-plan-txt">Current Plan</span>
                                                                    </span>
                                                                </span>
                                                                <?php }?>
                                                                <?php if($userinfo->plan == 'pro' && $userinfo->billing == 'yearly') { ?><?php if(time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->cancel_plan == 1) { ?>
                                                                        <a href="/cancelSubscription" class="buynow full-br year-feature" tabindex="0"><span>Cancel Plan</span></a>
                                                                    <?php }  else if( time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->cancel_plan == 1) {?>
                                                                        <a class="buynow full-br button-disabled" tabindex="0"><span>Cancel Plan</span></a>
                                                                    <?php }?>
                                                                <span class="tiral-exp-holder year-feature">
                                                                    <span>
                                                                        <span class="current-plan-txt">Current Plan</span>
                                                                    </span>
                                                                </span>
                                                                <?php }?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Highlights -->
                                                <div class="features-highlight-list">
                                                    <ul>
                                                        <li>
                                                            <p class="avail month-feature">
                                                                <span style="font-weight: 600 !important;">500</span>
                                                                <span class="desktop-none">&nbsp;credits&nbsp;</span>
                                                                per month
                                                            </p>
                                                            <p class="avail year-feature" style="display:none">
                                                                <span style="font-weight: 600 !important;">6000</span>
                                                                <span class="desktop-none">&nbsp;credits&nbsp;</span>
                                                                per year
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                1
                                                                <span class="desktop-none">&nbsp; Users</span>
                                                                <span class="desktop-none">&nbsp; User</span>
                                                            </p>
                                                            <p class="avail" style="display:none">
                                                                Custom
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Email Addresses</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Phone Numbers</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Lead Builder</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Chrome Extension</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Engage</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Email Tracker</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">CSV Export</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">CRM Integrations</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">Seeker(Web &amp; Sheets)</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-times-circle"></i>
                                                                    <span class="desktop-none">Seeker(Web &amp; Sheets)</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <!-- Option button -->
                                                <div style="min-height: 55px;">
                                                    <div class="cta-holder two-optionbut">
                                                        <span class="opt-but-area">
                                                            <a class="trynow ng-binding" tabindex="0" style="display:none">14-Day FREE Trial</a>
                                                            
                                                            <?php if($userinfo->plan == 'ultimate') { ?>
                                                                <?php if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                    <a href="/checkout/pro/monthly" class="buynow full-br month-feature" tabindex="0"><span>Down Upgraded</span></a>
                                                                <?php } else if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                    <a class="buynow full-br month-feature button-disabled" tabindex="0"><span>Down Upgraded</span></a>
                                                                <?php } ?>
                                                            <?php } else if($userinfo->plan != 'ultimate' && $userinfo->plan != 'pro' && $userinfo->upgrade_plan == 1){?>
                                                                <a href="/checkout/pro/monthly" class="buynow full-br month-feature" tabindex="0"><span>Upgraded Now</span></a>
                                                            <?php } else if($userinfo->plan == 'pro' && $userinfo->billing == 'yearly' && $userinfo->upgrade_plan == 1) { ?>
                                                                <a href="/checkout/pro/monthly" class="buynow full-br month-feature" tabindex="0"><span>Upgraded Now</span></a>
                                                            <?php } ?>

                                                            <?php if($userinfo->plan == 'ultimate') { ?>
                                                                <?php if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                    <a href="/checkout/pro/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0"><span>Down Upgraded</span></a>
                                                                <?php } else if($userinfo->plan != 'free' && time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->downgrade_plan == 1) { ?>
                                                                    <a class="buynow full-br year-feature button-disabled" style="display:none" tabindex="0"><span>Down Upgraded</span></a>
                                                                <?php }?>
                                                            <?php } else if($userinfo->plan != 'ultimate' && $userinfo->plan != 'pro' && $userinfo->upgrade_plan == 1){?>
                                                                <a href="/checkout/pro/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0"><span>Upgraded Now</span></a>
                                                            <?php } else if($userinfo->plan == 'pro' && $userinfo->billing == 'monthly' && $userinfo->upgrade_plan == 1) { ?>
                                                                <a href="/checkout/pro/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0"><span>Upgraded Now</span></a>
                                                            <?php } ?>
                                                            
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <!-- Table Information -->
                                        <div class="list-box">
                                            <div class="box-bordered-content">
                                                <div class="most-popular" style="display:none">
                                                    <span>Most Popular</span>
                                                </div>
                                                <div class="content-holder">
                                                    <!--  Plan name -->
                                                    <p class="plan-name ng-binding">Ultimate</p>
                                                    <!-- Pricing details -->
                                                    <p class="plan-price month-feature">
                                                        <span>
                                                            $249<span class="pay-int-txt">/month</span>
                                                        </span>
                                                    </p>
                                                    <p class="plan-price year-feature" style="display:none">
                                                        <span>
                                                            $2988<span class="pay-int-txt">/year</span>
                                                        </span>
                                                    </p>
                                                    <!-- Option button -->
                                                    <div>
                                                        <div class="cta-holder two-optionbut">
                                                            <span class="opt-but-area">
                                                                <a class="trynow ng-binding" tabindex="0" style="display:none">14-Day FREE Trial</a>
                                                                <a href="/checkout/ultimate/monthly" class="buynow full-br month-feature" tabindex="0">
                                                                    <?php if($userinfo->plan != 'ultimate' && $userinfo->upgrade_plan == 1){?>
                                                                        <span>Upgraded Now</span>
                                                                    <?php } else if($userinfo->billing == 'yearly' && $userinfo->upgrade_plan == 1) {?>
                                                                        <span>Upgraded Now</span>
                                                                    <?php }?>
                                                                </a>
                                                                <a href="/checkout/ultimate/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0">
                                                                    <?php if($userinfo->plan != 'ultimate' && $userinfo->upgrade_plan == 1){?>
                                                                        <span>Upgraded Now</span>
                                                                    <?php } else if($userinfo->billing == 'monthly' && $userinfo->upgrade_plan == 1) {?>
                                                                        <span>Upgraded Now</span>
                                                                    <?php }?>
                                                                </a>
                                                                <?php if($userinfo->plan == 'ultimate' && $userinfo->billing == 'monthly') { ?>
                                                                <?php if(time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->cancel_plan == 1) { ?>
                                                                        <a href="/cancelSubscription" class="buynow full-br month-feature" tabindex="0"><span>Cancel Plan</span></a>
                                                                    <?php }  else if( time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->cancel_plan == 1) {?>
                                                                        <a class="buynow full-br button-disabled" tabindex="0"><span>Cancel Plan</span></a>
                                                                    <?php }?>
                                                                <span class="tiral-exp-holder month-feature">
                                                                    <span>
                                                                        <span class="current-plan-txt">Current Plan</span>
                                                                    </span>
                                                                </span>
                                                                <?php }?>
                                                                <?php if($userinfo->plan == 'ultimate' && $userinfo->billing == 'yearly') { ?>
                                                                 <?php if(time() - strtotime($userinfo->last_downgrade) >= 3600 * 24 * 30 && $userinfo->cancel_plan == 1) { ?>
                                                                        <a href="/cancelSubscription" class="buynow full-br year-feature" tabindex="0"><span>Cancel Plan</span></a>
                                                                    <?php }  else if( time() - strtotime($userinfo->last_downgrade) < 3600 * 24 * 30 && $userinfo->cancel_plan == 1) {?>
                                                                        <a class="buynow full-br button-disabled" tabindex="0"><span>Cancel Plan</span></a>
                                                                    <?php }?>
                                                                <span class="tiral-exp-holder year-feature">
                                                                    <span>
                                                                        <span class="current-plan-txt">Current Plan</span>
                                                                    </span>
                                                                </span>
                                                                <?php }?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Highlights -->
                                                <div class="features-highlight-list">
                                                    <ul>
                                                        <li>
                                                            <p class="avail month-feature">
                                                                <span style="font-weight: 600 !important;">2500</span>
                                                                <span class="desktop-none">&nbsp;credits&nbsp;</span>
                                                                per month
                                                            </p>
                                                            <p class="avail year-feature" style="display:none">
                                                                <span style="font-weight: 600 !important;">30000</span>
                                                                <span class="desktop-none">&nbsp;credits&nbsp;</span>
                                                                per year
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                1
                                                                <span class="desktop-none">&nbsp; Users</span>
                                                                <span class="desktop-none">&nbsp; User</span>
                                                            </p>
                                                            <p class="avail" style="display:none">
                                                                Custom
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Email Addresses</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Phone Numbers</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Lead Builder</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Chrome Extension</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Engage</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Email Tracker</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">CSV Export</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">CRM Integrations</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Seeker(Web &amp; Sheets)</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="avail">
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    <span class="desktop-none">Seeker(Web &amp; Sheets)</span>
                                                                </span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <!-- Option button -->
                                                <div style="min-height: 55px;">
                                                    <div class="cta-holder two-optionbut">
                                                        <span class="opt-but-area">
                                                            <a class="trynow ng-binding" tabindex="0" style="display:none">14-Day FREE Trial</a>
                                                            <a href="/checkout/ultimate/monthly" class="buynow full-br month-feature" tabindex="0">
                                                                <?php if($userinfo->plan != 'ultimate' && $userinfo->upgrade_plan == 1){?>
                                                                    <span>Upgraded Now</span>
                                                                <?php } else if($userinfo->billing == 'yearly' && $userinfo->upgrade_plan == 1) {?>
                                                                    <span>Upgraded Now</span>
                                                                <?php }?>
                                                            </a>
                                                            <a href="/checkout/ultimate/yearly" class="buynow full-br year-feature" style="display:none" tabindex="0">
                                                                <?php if($userinfo->plan != 'ultimate' && $userinfo->upgrade_plan == 1){?>
                                                                    <span>Upgraded Now</span>
                                                                <?php } else if($userinfo->billing == 'monthly' && $userinfo->upgrade_plan == 1) {?>
                                                                    <span>Upgraded Now</span>
                                                                <?php }?>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                </section>
            </div>
            
            <!-- Feature Section -->
            <div id="Features" class="rr-panel rr-panel--rounded"style="">
                <div class="rr-panel-content">
                    <div class="trial-info-features">
                        <ul class="feature-list">
                            <li class="feature-list-item">
                                <div class="feature-list-item__icon">
                                    <img src="//static.rocketreach.co/images/trial/trial-feature-eyeglass.svg">
                                </div><div class="feature-list-item__info">
                                    <strong>Find Professional Contacts</strong>
                                    <br class="mobile-break">
                                    Get work &amp; personal emails and mobile phone.
                                </div>
                            </li>
                            <li class="feature-list-item">
                                <div class="feature-list-item__icon">
                                    <img src="//static.rocketreach.co/images/trial/trial-feature-contacts.svg">
                                </div><div class="feature-list-item__info">
                                    <strong>Comprehensive Professional Data</strong>
                                    <br class="mobile-break">
                                    Search from
                                        430 million
                                    professionals &amp;
                                        20 million
                                    companies.
                                </div>
                            </li>
                            <li class="feature-list-item">
                                <div class="feature-list-item__icon">
                                    <img src="//static.rocketreach.co/images/trial/trial-feature-accuracy.svg">
                                </div><div class="feature-list-item__info">
                                <strong>Always up to date</strong>
                                <br class="mobile-break">
                                Verified on demand and in real time. 98% Accuracy.
                            </div>
                            </li>
                            <li class="feature-list-item">
                                <div class="feature-list-item__icon">
                                    <img src="//static.rocketreach.co/images/trial/trial-feature-eyeglass-plus.svg">
                                </div><div class="feature-list-item__info">
                                    <strong>Advance Search Filters</strong>
                                    <br class="mobile-break">
                                100+ filters including work, industry &amp; location.
                                </div>
                            </li>
                            <li class="feature-list-item">
                                <div class="feature-list-item__icon">
                                    <img src="//static.rocketreach.co/images/trial/trial-feature-outreach.svg">
                                </div><div class="feature-list-item__info">
                                <strong>Workflow integrations</strong>
                                <br class="mobile-break">
                                Easily connect to Salesforce, OutReach, CRMs &amp; ATSs.
                            </div>
                            </li>
                            <li class="feature-list-item">
                                <div class="feature-list-item__icon">
                                    <img src="//static.rocketreach.co/images/trial/trial-feature-support.svg">
                                </div><div class="feature-list-item__info">
                                    <strong>Support</strong>
                                    <br class="mobile-break">
                                    We're here to help you, just drop a line.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--Start FAQ Section -->
            <div id="Faq" class="rr-panel rr-panel--rounded  ">
                <div class="rr-panel-content">
                    <!-- ngIf: faqModel --><div class="rr-faq">
                    <!-- ngRepeat: faq in faqModel.faqPairs --><div class="question-group">
                    <p class="question">
                        <span class="question-text">What if I want to pay from my bank account?</span>
                        <span class="question-caret"><i class="fa fa-chevron-down" style=""></i></span>
                    </p>
                    <p class="answer" style="">Use PayPal to pay from your bank account. We accept most bank credit and debit cards.</p>
                </div><!-- end ngRepeat: faq in faqModel.faqPairs --><div class="question-group  "  >
                    <p class="question">
                        <span class="question-text">Do you have larger plans? How do I get datasyder for my team?</span>
                        <span class="question-caret"><i class="fa fa-chevron-down" style=""></i></span>
                    </p>
                    <p class="answer" style="">We can support plans and teams of any size. You can create a team from your account page. Please email us at support@datasyder.co if you have further questions</p>
                </div><!-- end ngRepeat: faq in faqModel.faqPairs --><div class="question-group  "  >
                    <p class="question">
                    <span class="question-text">Why is my credit card being declined?</span>
                        <span class="question-caret"><i class="fa fa-chevron-down" style=""></i></span>
                    </p>
                    <p class="answer" style="">The most common reason is your bank needs you to approve the transaction, so contact them. If declines persist, try the PayPal option. Please chat with us or email support@datasyder.co for further assistance.</p>
                </div><!-- end ngRepeat: faq in faqModel.faqPairs --><div class="question-group  "  >
                    <p class="question">
                        <span class="question-text">What happens if a lookup doesn't return verified email or phone?</span>
                        <span class="question-caret"><i class="fa fa-chevron-down" style=""></i></span>
                    </p>
                    <p class="answer" style="">A lookup is used if we find and verify email or phone, otherwise it is refunded.</p>
                </div><!-- end ngRepeat: faq in faqModel.faqPairs --><div class="question-group  "  >
                    <p class="question">
                        <span class="question-text">Can I cancel my subscription when I want? Will I keep my lookups if I cancel?</span>
                        <span class="question-caret"><i class="fa fa-chevron-down" style=""></i></span>
                    </p>
                    <p class="answer" style="">Yes, you can cancel anytime through your accounts page. Since you prepay for a year or month, cancellation takes effect the following term. You retain access to your plan features for the full 1 year or 1 month term.</p>
                </div><!-- end ngRepeat: faq in faqModel.faqPairs --><div class="question-group  "  >
                    <p class="question">
                        <span class="question-text">What happens if I run out of lookups?</span>
                        <span class="question-caret"><i class="fa fa-chevron-down" style=""></i></span>
                    </p>
                    <p class="answer" style="">You can exceed your plan allocated lookups if 'Additional Lookups' are enabled in your account settings.  Additional Lookups are billed to your account at the end of the month and depending on your your plan, range from <b>$0.30 to $0.45 / lookup</b>.  Please email us at support@datasyder.co for more information.</p>
                </div><!-- end ngRepeat: faq in faqModel.faqPairs --><div class="question-group  "  >
                    <p class="question">
                        <span class="question-text">What if I just want professional or personal emails?</span>
                        <span class="question-caret"><i class="fa fa-chevron-down" style=""></i></span>
                    </p>
                    <p class="answer" style="">You can select to lookup only personal or only professional emails by updating your email type preferences. Once you make that selection, you will never see emails of the filtered type.</p>
                </div><!-- end ngRepeat: faq in faqModel.faqPairs --></div><!-- end ngIf: faqModel -->
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(e){
        if($("#billing").val() == 'yearly') {
            $("#switcher").click();
        }
        $(".buynow:not(:has(>span))").remove();
    })
    $(".fa-info-circle").mouseleave(function(e) {
        $(this).parents('li').find('.tooltip-arrow-box').css("display","none");
    })
    $(".fa-info-circle").mouseover(function(e) {
        $(this).parents('li').find('.tooltip-arrow-box').css("display","block");
    })
    $(".question-group").click(function(e) {
        if($(this).find('.question-caret').find('i').attr('class').indexOf('fa-chevron-down') >= 0) {
            $(this).find('.question-caret').find('i').removeClass('fa-chevron-down');
            $(this).find('.question-caret').find('i').addClass('fa-close');
            $(this).find('.answer').addClass('visible');
        } else {
            $(this).find('.question-caret').find('i').removeClass('fa-close');
            $(this).find('.question-caret').find('i').addClass('fa-chevron-down');
            $(this).find('.answer').removeClass('visible');
        }
    })
    $("#switcher").click(function(e) {
        var className = $("#filt-monthly").attr('class');
        if(className.indexOf('toggler--is-active') >= 0) {
            $("#filt-monthly").removeClass('toggler--is-active');
            $("#filt-hourly").addClass('toggler--is-active');
            $(".month-feature").css('display','none');
            $(".year-feature").css('display','block');

        } else {
            $("#filt-monthly").addClass('toggler--is-active');
            $("#filt-hourly").removeClass('toggler--is-active');
            $(".month-feature").css('display','block');
            $(".year-feature").css('display','none');
        }
    })
    $(".button-disabled").click(function(e) {
        $("#disableDowngrade").css('display','block');
    })
</script>

</html>