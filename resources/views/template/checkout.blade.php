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
    body{
        background: linear-gradient(286.71deg,#00A7F7 13.39%,#0071FF 89.11%);
    }
    body {
        color: #4F4F4F;
        font-family: "Avenir","rr-venir",-apple-system,BlinkMacSystemFont,"Helvetica Neue",Arial,Helvetica,sans-serif;
    }
    .rr-content {
        display: flex;
        flex-direction: column;
    }
    .back-upgrade-plan {    
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
    .back-upgrade-plan:hover {   
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
    .rr-panel.rr-panel--rounded {
        border: 1px solid #fafafa;
        border-radius: 20px;
    }
    .rr-panel {
        background: white;
        margin: auto;
        max-width: 970px;
    }
    .rr-panel .rr-panel-top {
        padding: 25px;
        text-align: center;
        background: none;
        border-bottom: 1px solid #CCCCCC;
        margin-bottom: 20px;
    }
    .rr-panel .rr-panel-top h3 {
        font-size: 25px;
    }
    .rr-panel .rr-panel__title {
        text-align: center;
        margin: 0;
    }
    .rr-panel__title__medallion {
        top: -12px;
        left: 0;
        position: absolute;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-line-pack: center;
        align-content: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .rr-checkout-header .rr-panel__title__medallion img {
        width: 100%;
        max-width: 50px;
    }

    .rr-checkout-header .rr-panel__title__medallion .plan-name {
        display: inline-block;
        font-size: 20px;
        text-indent: 10px;
        max-width: 150px;
    }
    .rr-checkout-header .rr-panel__title__text {
        padding: 0;
    }
    .rr-checkout-header h3 {
        position: relative;
        font-size: 26px;
    }
    .rr-panel .rr-panel-top + .rr-panel-content {
        padding-top: 0;
    }
    .rr-panel .rr-panel-content {
        padding: 40px;
    }
    .row [class*="col-"], .row [class*="col-"] {
        position: inherit;
    }
    .col-sm-8 {
        width: 66.66666667%;
    }
    .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
        float: left;
    }
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }
    .rr-braintree-directive.v2 .payment-info ul.payment-info-selector li.toggle.active {
        border-radius: 0;
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
        background: #1EAAF1;
        border-color: #1EAAF1;
        color: white;
    }
    .rr-braintree-directive.v2 .payment-info ul.payment-info-selector li.toggle {
        font-size: 20px;
    }
    .rr-braintree-directive.v2 .payment-info ul.payment-info-selector li.toggle {
        border-radius: 6px;
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
        border: 1px solid #CCCCCC;
        background: #F9F9F9;
        padding: 0 20px;
        display: block;
        width: 100%;
        margin-top: 10px;
        font-size: 16px;
        -webkit-transition: all 0.1s ease-in-out;
        transition: all 0.1s ease-in-out;
        height: 50px;
        line-height: 50px;
    }
    .rr-braintree-directive.v2 .payment-info ul.payment-info-selector {
        margin: 0;
        padding: 0;
        list-style: none;
        width: 100%;
    }
    .rr-braintree-directive.v2 .payment-info ul.payment-info-selector li.toggle.active .payment-info-name {
        opacity: 1.0;
    }
    .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .fa-credit-card:before {
        content: "\f09d";
    }
    .rr-braintree-directive.v2 .payment-info .payment-info-panel {
        border: 1px solid #1EAAF1;
        border-bottom-left-radius: 6px;
        border-bottom-right-radius: 6px;
        width: 100%;
        min-height: 100px;
        padding: 10px;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset {
        width: 100%;
    }
    fieldset {
        min-width: 0;
        padding: 0;
        margin: 0;
        border: 0;
    }
    .rr-braintree-directive.v2 .payment-info .payment-info-panel h4 {
        margin: 10px 10px 0px;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .cardholder-info-input-wrapper {
        grid-template-areas:
            "first first first first last last last last"
            "email email email email email email email email";
        grid-template-columns: repeat(8,1fr);
        display: grid;
        grid-column-gap: 0px;
        grid-row-gap: 10px;
    }
    .rr-braintree-directive.v2 form.input-wrapper, .rr-braintree-directive.v2 form .input-wrapper {
        padding: 10px 10px;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .cardholder-info-input-wrapper label[for='email'] {
        grid-area: email;
    }
    .rr-braintree-directive.v2 form.input-wrapper label, .rr-braintree-directive.v2 form .input-wrapper label {
        font-weight: 500;
    }
    .rr-braintree-directive.v2 form label {
        margin: 0;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .cardholder-info-input-wrapper label[for='first-name'] {
        grid-area: first;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .cardholder-info-input-wrapper label[for='last-name'] {
        grid-area: last;
    }
    
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .card-info-input-wrapper {
        grid-template-areas:
            "card-number card-number card-number card-number card-number card-number card-number card-number"
            "card-date card-date card-date card-date card-type card-type card-type card-type";
        grid-template-columns: repeat(6,1fr);
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .card-info-input-wrapper {
        display: grid;
        grid-column-gap: 0px;
        grid-row-gap: 10px;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .card-info-input-wrapper label[for='card-number'] {
        grid-area: card-number;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .card-info-input-wrapper label[for='card-date'] {
        grid-area: card-date;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .card-info-input-wrapper label[for='card-type'] {
        grid-area: card-type;
    }

    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .billing-section-input-wrapper {
        grid-template-areas:
            "first first first first last last last last"
            "street street street street street street street street"
            "city city city city state state state state"
            "country country country country country country zip zip";
        grid-template-columns: repeat(6,1fr);
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .billing-section-input-wrapper {
        display: grid;
        grid-column-gap: 0px;
        grid-row-gap: 10px;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .billing-section-input-wrapper label[for='street-address'] {
        grid-area: street;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .billing-section-input-wrapper label[for='city'] {
        grid-area: city;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .billing-section-input-wrapper label[for='state'] {
        grid-area: state;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .billing-section-input-wrapper label[for='country'] {
        grid-area: country;
    }
    .rr-braintree-directive.v2 form[name='forms.billingAddressForm'] fieldset .billing-section-input-wrapper label[for='zipcode'] {
        grid-area: zip;
    }
    .rr-braintree-directive.v2 form label span.label-text {
        display: none;
    }
    .rr-braintree-directive.v2 form input[type=text], .rr-braintree-directive.v2 form input[type=password], .rr-braintree-directive.v2 form input[type=email], .rr-braintree-directive.v2 form input, .rr-braintree-directive.v2 form select {
        width: 100%;
        text-indent: 8px;
        background: #FFF;
        font-size: 14px;
        height: 36px;
        line-height: 36px;
    }
    .rr-braintree-directive.v2 form input.left-half, .rr-braintree-directive.v2 form select.left-half, .rr-braintree-directive.v2 form .bt-hosted-field-input.left-half {
        border-radius: 6px 0 0 6px;
        border-right: 0;
    }
    .rr-braintree-directive.v2 form input, .rr-braintree-directive.v2 form select, .rr-braintree-directive.v2 form .bt-hosted-field-input {
        border-radius: 6px;
        border: 1px solid #CCCCCC;
    }
    button, input, optgroup, select, textarea {
        margin: 0;
        font: inherit;
        color: inherit;
        font-family: inherit;
    }
    .rr-braintree-directive.v2 form input.right-half, .rr-braintree-directive.v2 form select.right-half, .rr-braintree-directive.v2 form .bt-hosted-field-input.right-half {
        border-radius: 0 6px 6px 0;
    }
    .rr-braintree-directive.v2 form input.full, .rr-braintree-directive.v2 form select.full, .rr-braintree-directive.v2 form .bt-hosted-field-input.full {
        border-radius: 6px;
    }
    .row {
        margin-right: -15px;
        margin-left: -15px;
    }
    .btn-group-vertical>.btn-group:after, .btn-group-vertical>.btn-group:before, .btn-toolbar:after, .btn-toolbar:before, .clearfix:after, .clearfix:before, .container-fluid:after, .container-fluid:before, .container:after, .container:before, .dl-horizontal dd:after, .dl-horizontal dd:before, .form-horizontal .form-group:after, .form-horizontal .form-group:before, .modal-footer:after, .modal-footer:before, .modal-header:after, .modal-header:before, .nav:after, .nav:before, .navbar-collapse:after, .navbar-collapse:before, .navbar-header:after, .navbar-header:before, .navbar:after, .navbar:before, .pager:after, .pager:before, .panel-body:after, .panel-body:before, .row:after, .row:before {
        display: table;
        content: " ";
    }
    .btn-group-vertical>.btn-group:after, .btn-toolbar:after, .clearfix:after, .container-fluid:after, .container:after, .dl-horizontal dd:after, .form-horizontal .form-group:after, .modal-footer:after, .modal-header:after, .nav:after, .navbar-collapse:after, .navbar-header:after, .navbar:after, .pager:after, .panel-body:after, .row:after {
        clear: both;
    }
    .btn-group-vertical>.btn-group:after, .btn-group-vertical>.btn-group:before, .btn-toolbar:after, .btn-toolbar:before, .clearfix:after, .clearfix:before, .container-fluid:after, .container-fluid:before, .container:after, .container:before, .dl-horizontal dd:after, .dl-horizontal dd:before, .form-horizontal .form-group:after, .form-horizontal .form-group:before, .modal-footer:after, .modal-footer:before, .modal-header:after, .modal-header:before, .nav:after, .nav:before, .navbar-collapse:after, .navbar-collapse:before, .navbar-header:after, .navbar-header:before, .navbar:after, .navbar:before, .pager:after, .pager:before, .panel-body:after, .panel-body:before, .row:after, .row:before {
        display: table;
        content: " ";
    }
    .rr-braintree-directive.v2 .payment-info form#cc-form {
        padding-top: 21px;
    }
    .rr-braintree-directive.v2 form[name='btPaymentForm'] .cardinfo-card-number, .rr-braintree-directive.v2 form[name='btPaymentForm'] .cardinfo-cvv {
        position: relative;
    }
    .rr-braintree-directive.v2 form[name='btPaymentForm'] label {
        width: 100%;
    }
    .rr-braintree-directive.v2 form[name='btPaymentForm'] #card-image {
        position: absolute;
        top: 3px;
        right: 20px;
        width: 44px;
        height: 28px;
        background-image: url(/static/images/payment-icons/card_sprite.png);
        background-size: 86px 458px;
        border-radius: 6px;
        background-position: -100px 0;
        background-repeat: no-repeat;
        margin-bottom: 1em;
    }
    .rr-braintree-directive.v2 form.input-wrapper, .rr-braintree-directive.v2 form .input-wrapper {
        padding: 10px 10px;
    }

    .rr-braintree-directive.v2 form label span.label-text {
        display: none;
    }
    .rr-braintree-directive.v2 form.input-wrapper label, .rr-braintree-directive.v2 form .input-wrapper label {
        font-weight: 500;
    }
    .rr-braintree-directive.v2 form label {
        margin: 0;
    }
    .rr-braintree-directive.v2 form[name='btPaymentForm'] .bt-hosted-field-input {
        height: 36px;
        line-height: 36px;
        padding-left: 10px;
        margin-bottom: 5px;
    }
    .rr-braintree-directive.v2 form input.full, .rr-braintree-directive.v2 form select.full, .rr-braintree-directive.v2 form .bt-hosted-field-input.full {
        border-radius: 6px;
    }
    .rr-braintree-directive.v2 form[name='btPaymentForm'] .cardinfo-exp-date, .rr-braintree-directive.v2 form[name='btPaymentForm'] .cardinfo-cvv {
        display: inline-block;
        width: 50%;
    }
    .rr-braintree-directive.v2 form[name='btPaymentForm'] #cvv-image {
        position: absolute;
        top: 5px;
        right: 20px;
        width: 34px;
        height: 22px;
        background-image: url(/static/images/payment-icons/cvc.all.png);
        background-size: 34px 22px;
        background-position: -34px;
        background-repeat: no-repeat;
        margin-bottom: 10px;
    }
    .fa-paypal:before {
        content: "\f1ed";
    }
    .paypal-wrapper {
        padding: 50px 30%;
        text-align: center;
        border: 1px solid #1EAAF1;
    }
    .paypal-button {
        width: 80%;
        height: 40px;
        border-radius: 30px;
        background: #1eaaf1;
        border: none;
        color: white;
        font-weight: bold;
        font-style: italic;
        cursor: pointer;
    }
    .card-list {
        padding-top: 20px;
        display: flex;
        list-style: none;
    }
    .card-list li {
        width: 25%;
    }
    .rr-complete-order .order-info__checkout-wrapper {
        padding: 20px 0 0 0;
    }
    .rr-complete-order .order-info__checkout-wrapper .checkout-wrapper__actions {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }
    .rr-complete-order .order-info__checkout-wrapper .checkout-wrapper__actions .checkout-wrapper__back {
        display: inline-block;
        text-align: left;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }
    .rr-complete-order .order-info__checkout-wrapper .checkout-wrapper__actions .checkout-wrapper__back a.btn {
        height: 40px;
        line-height: 40px;
        font-size: 18px;
        padding: 0 10px 0 0;
        opacity: 0.7;
    }
    .rr-complete-order .order-info__checkout-wrapper .checkout-wrapper__actions .checkout-wrapper__back a.btn:hover {
        color: #712fcb;
    }
    .btn.btn-link {
        padding: 0;
        cursor: pointer;
    }
    a {
        color: #08c;
        text-decoration: none;
        cursor: pointer;
    }
    .btn-link, .btn-link:active, .btn-link:focus, .btn-link:hover {
        border-color: transparent;
    }
    .btn-link, .btn-link.active, .btn-link:active, .btn-link[disabled], fieldset[disabled] .btn-link {
        background-color: transparent;
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    .btn-link {
        font-weight: 400;
        color: #337ab7;
        border-radius: 0;
    }
    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .fa-chevron-left:before {
        content: "\f053";
    }
    #creditCardPoup {
        transition : all 1s;
        cursor: pointer;
    }
    #paypalPopup {
        transition : all 1s;
        cursor: pointer;
    }
    .rr-complete-order .order-info__checkout-wrapper .checkout-wrapper__actions .checkout-wrapper__continue {
        display: inline-block;
        text-align: right;
    }
    .rr-complete-order .order-info__checkout-wrapper .checkout-wrapper__actions .checkout-wrapper__continue .primary-payment-action {
        text-align: center;
    }
    .rr-complete-order .order-info__checkout-wrapper .checkout-wrapper__actions .checkout-wrapper__continue button {
        font-size: 20px;
        height: 40px;
        color: white;
        border: none;
    }
    .rr-complete-order .order-info__checkout-wrapper .checkout-wrapper__actions .checkout-wrapper__continue button:hover {
        background : #712fcb;
    }
    .btn.btn-primary-ng {
        background-color: #03A9F4;
        border-color: #03A9F4;
        color: #ffffff;
        -webkit-transition: all 0.25s ease-in-out;
        transition: all 0.25s ease-in-out;
        font-family: "Avenir","rr-venir",-apple-system,BlinkMacSystemFont,"Helvetica Neue",Arial,Helvetica,sans-serif;
        font-weight: 500;
    }
    .btn:not(.btn-link) {
        font-family: "Avenir","rr-venir",-apple-system,BlinkMacSystemFont,"Helvetica Neue",Arial,Helvetica,sans-serif;
        padding: 5px 10px;
        border-color: #212121;
        color: #212121;
    }
    label, button {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .fa-chevron-right:before {
        content: "\f054";
    }
    .rr-complete-order .order-summary-sec {
        font-size: 14px;
        color: #4f4f4f;
    }
    .col-sm-4 {
        width: 33.33333333%;
    }
    .rr-complete-order .order-summary-sec .order-summary-box {
        border: 1px solid #ccc;
    }
    .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section.order-summary-box__section--interval, .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section.order-summary-box__section--total {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }
    .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section:first-child {
        border-top: 0;
    }
    .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section {
        border-top: 1px solid #ccc;
        font-size: 12px;
        padding: 10px;
    }
    .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section.order-summary-box__section--interval .order-summary-box__section--interval__left {
        max-width: 30%;
    }
    .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section.order-summary-box__section--interval>*:first-child, .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section.order-summary-box__section--total>*:first-child {
        text-align: left;
    }
    .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section.order-summary-box__section--total {
        font-size: 14px;
        font-weight: 400;
    }
    .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section.order-summary-box__section--interval>*:last-child, .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section.order-summary-box__section--total>*:last-child {
        text-align: right;
    }
    .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section.order-summary-box__section--details {
        background-color: #f9f9f9;
    }
    .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section {
        border-top: 1px solid #ccc;
        font-size: 12px;
        padding: 10px;
    }
    .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section p {
        font-size: 12px;
    }
    .rr-complete-order .order-summary-sec .rr-sec-trust-secure {
        padding: 0;
    }
    .btn-group-vertical>.btn-group:after, .btn-group-vertical>.btn-group:before, .btn-toolbar:after, .btn-toolbar:before, .clearfix:after, .clearfix:before, .container-fluid:after, .container-fluid:before, .container:after, .container:before, .dl-horizontal dd:after, .dl-horizontal dd:before, .form-horizontal .form-group:after, .form-horizontal .form-group:before, .modal-footer:after, .modal-footer:before, .modal-header:after, .modal-header:before, .nav:after, .nav:before, .navbar-collapse:after, .navbar-collapse:before, .navbar-header:after, .navbar-header:before, .navbar:after, .navbar:before, .pager:after, .pager:before, .panel-body:after, .panel-body:before, .row:after, .row:before {
        display: table;
        content: " ";
    }
    .row.no-gutters, .row.no-gutters {
        margin-left: 0px;
        margin-right: 0px;
    }
    .rr-complete-order .order-summary-sec .rr-sec-trust-secure h3 {
        display: none;
    }
    .btn-group-vertical>.btn-group:after, .btn-toolbar:after, .clearfix:after, .container-fluid:after, .container:after, .dl-horizontal dd:after, .form-horizontal .form-group:after, .modal-footer:after, .modal-header:after, .nav:after, .navbar-collapse:after, .navbar-header:after, .navbar:after, .pager:after, .panel-body:after, .row:after {
        clear: both;
    }
    .btn-group-vertical>.btn-group:after, .btn-group-vertical>.btn-group:before, .btn-toolbar:after, .btn-toolbar:before, .clearfix:after, .clearfix:before, .container-fluid:after, .container-fluid:before, .container:after, .container:before, .dl-horizontal dd:after, .dl-horizontal dd:before, .form-horizontal .form-group:after, .form-horizontal .form-group:before, .modal-footer:after, .modal-footer:before, .modal-header:after, .modal-header:before, .nav:after, .nav:before, .navbar-collapse:after, .navbar-collapse:before, .navbar-header:after, .navbar-header:before, .navbar:after, .navbar:before, .pager:after, .pager:before, .panel-body:after, .panel-body:before, .row:after, .row:before {
        display: table;
        content: " ";
    }
    .rr-complete-order .order-summary-sec .rr-sec-trust-secure #logos {
        padding: 0;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }
    .rr-complete-order .order-summary-sec .rr-sec-trust-secure #logos span {
        width: 31%;
        padding: 2.5px;
    }
    .text-center {
        text-align: center;
    }
    .rr-complete-order .order-summary-sec .rr-sec-trust-secure #logos span img {
        width: 100%;
    }
    .rr-sec-trust-secure #logos img {
        width: auto;
        height: 40px;
    }
    .rr-complete-order .order-summary-sec .terms {
        text-align: right;
    }
    .rr-complete-order .order-summary-sec .terms {
        padding-top: 20px;
        text-align: center;
    }
    .rr-complete-order .order-summary-sec .terms .terms__secure {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        opacity: 0.7;
    }
    .rr-complete-order .order-summary-sec .terms .terms__secure .payment-provider-logo {
        padding: 12px;
        font-size: 24px;
        margin: auto;
    }
    .fa-lock:before {
        content: "\f023";
    }
    .rr-complete-order .order-summary-sec .terms .terms__secure .payment-provider-content .payment-provider-content__text {
        text-align: justify;
    }
    .rr-complete-order .order-summary-sec .terms p {
        font-size: 12px;
        opacity: 0.7;
    }
    .rr-complete-order .order-summary-sec .order-summary-box>.order-summary-box__section.order-summary-box__section--interval .order-summary-box__section--interval__left .order-summary-box__section--interval__left__value {
        display: inline-block;
    }
    .submitted-empty-form {
        border: 1px solid #f00 !important;
    }
    .checkout-error {
        color: red;
        font-size: 14px;
        padding-left: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
</style>
</head>
<body>
    <div id="blur-container" class="blur-container">
        <div class="rr-content">
            <div class="upgrade-plan-header">
                <div>
                    <a target="_self" href="/tool/upgrade-plan" class="back-upgrade-plan">Back to Upgrade Plan</a>
                </div>
            </div>
            <div style="padding-top : 100px">
                <div class="rr-panel rr-panel--rounded">
                    <div class="rr-panel-top rr-checkout-header">
                        <h3 class="rr-panel__title">
                            <span class="rr-panel__title__medallion">
                                <img src="//static.rocketreach.co/images/pricing/v2/coin-silver.svg">
                                <span class="plan-name">{{$paymethod}} Plan</span>
                            </span>
                            <span class="rr-panel__title__text">Secure Checkout</span>
                        </h3>
                    </div>
                    
                    <div class="rr-panel-content">
                        <div class="row rr-complete-order">
                            <div class="order-info__open col-xs-12 col-sm-8">
                                <div class="order-type--new">
                                    <div class="rr-braintree-directive v2">
                                        <div class="payment-info">
                                            <ul class="payment-info-selector">
                                                <li class="toggle active" id="creditCardSel">
                                                    <span class="payment-info-name">
                                                        <i class="fa fa-credit-card"></i> Credit Card
                                                    </span>
                                                </li>
                                                <li id="creditCardPopup">
                                                    <div class="payment-info-panel">
                                                        <div class="payment-info-panel__cc ng-scope">
                                                            <div class="billing-address-info billing-address-info--editable">
                                                                <!-- Billing Address Collection Form -->
                                                                <form method="post" action="/cardpay" id="billingForm" name="forms.billingAddressForm" novalidate="" class="billing-address-form">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <input name="paymethod" id="paymethod" type="hidden" value={{$paymethod}}>
                                                                    <input name="billing" id="billing" type="hidden" value={{$billing}}>
                                                                    <input name="plan" id="plan" type="hidden" value={{$plan}}>
                                                                    <?php if($customer == NULL) {?>
                                                                    <input name="customer" id="customer" type="hidden" value="">
                                                                    <?php }else {?>
                                                                    <input name="customer" id="customer" type="hidden" value={{$customer}}>
                                                                    <?php }?>
                                                                    <fieldset>
                                                                        <h4>Cardholder Info</h4>
                                                                        <!-- <p class="disclaimer">For best results, please use your company’s contact information here.</p> -->
                                                                        <div class="input-wrapper cardholder-info-input-wrapper">
                                                                            <label for="email"><span class="label-text">Email</span>
                                                                                <input id="email" name="email" type="text" maxlength="255" placeholder="Cardholder Email" required="required" style="" value={{$email}}>
                                                                            </label>
                                                                            <label for="first-name"><span class="label-text">First Name</span>
                                                                            <input id="first-name" name="first_name" type="text" maxlength="255" placeholder="Cardholder First Name" class="left-half" required="required" style="" value={{$firstname}}>
                                                                            </label>
                                                                            <label for="last-name"><span class="label-text">Last Name</span>
                                                                                <input id="last-name" name="last_name" type="text" maxlength="255" placeholder="Cardholder Last Name" class="right-half" required="required" style="" value={{$lastname}}>
                                                                            </label>
                                                                        </div>
                                                                        <h4>Billing Address</h4>
                                                                        <div class="input-wrapper billing-section-input-wrapper">
                                                                            <!-- ngIf: options.version !=2 -->
                                                                            <label for="street-address"><span class="label-text">Address</span>
                                                                                <input id="street-address" name="street_address" type="text" maxlength="255" placeholder="Street" class="full" required="required" autofocus="autofocus">
                                                                            </label>
                                                                            <label for="city"><span class="label-text">City</span>
                                                                                <input id="city" type="text" name="locality" maxlength="255" placeholder="City" class="left-half" required="required">
                                                                            </label>
                                                                            <label for="state"><span class="label-text">State</span>
                                                                                <input id="state" name="region" type="text" max-length="255" class="right-half" placeholder="State" required="required">
                                                                            </label>
                                                                            <label for="country"><span class="label-text">Country</span>
                                                                                <div class="select-input-container">
                                                                                    <select class="input-bottom left-half" id="country" name="country_code_alpha2" required="required"><option value="string:AF" label="Afghanistan">Afghanistan</option><option value="string:AX" label="Åland">Åland</option><option value="string:AL" label="Albania">Albania</option><option value="string:DZ" label="Algeria">Algeria</option><option value="string:AS" label="American Samoa">American Samoa</option><option value="string:AD" label="Andorra">Andorra</option><option value="string:AO" label="Angola">Angola</option><option value="string:AI" label="Anguilla">Anguilla</option><option value="string:AQ" label="Antarctica">Antarctica</option><option value="string:AG" label="Antigua and Barbuda">Antigua and Barbuda</option><option value="string:AR" label="Argentina">Argentina</option><option value="string:AM" label="Armenia">Armenia</option><option value="string:AW" label="Aruba">Aruba</option><option value="string:AU" label="Australia">Australia</option><option value="string:AT" label="Austria">Austria</option><option value="string:AZ" label="Azerbaijan">Azerbaijan</option><option value="string:BS" label="Bahamas">Bahamas</option><option value="string:BH" label="Bahrain">Bahrain</option><option value="string:BD" label="Bangladesh" selected="selected">Bangladesh</option><option value="string:BB" label="Barbados">Barbados</option><option value="string:BY" label="Belarus">Belarus</option><option value="string:BE" label="Belgium">Belgium</option><option value="string:BZ" label="Belize">Belize</option><option value="string:BJ" label="Benin">Benin</option><option value="string:BM" label="Bermuda">Bermuda</option><option value="string:BT" label="Bhutan">Bhutan</option><option value="string:BO" label="Bolivia">Bolivia</option><option value="string:BQ" label="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option><option value="string:BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="string:BW" label="Botswana">Botswana</option><option value="string:BV" label="Bouvet Island">Bouvet Island</option><option value="string:BR" label="Brazil">Brazil</option><option value="string:IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="string:BN" label="Brunei Darussalam">Brunei Darussalam</option><option value="string:BG" label="Bulgaria">Bulgaria</option><option value="string:BF" label="Burkina Faso">Burkina Faso</option><option value="string:BI" label="Burundi">Burundi</option><option value="string:KH" label="Cambodia">Cambodia</option><option value="string:CM" label="Cameroon">Cameroon</option><option value="string:CA" label="Canada">Canada</option><option value="string:CV" label="Cape Verde">Cape Verde</option><option value="string:KY" label="Cayman Islands">Cayman Islands</option><option value="string:CF" label="Central African Republic">Central African Republic</option><option value="string:TD" label="Chad">Chad</option><option value="string:CL" label="Chile">Chile</option><option value="string:CN" label="China">China</option><option value="string:CX" label="Christmas Island">Christmas Island</option><option value="string:CC" label="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="string:CO" label="Colombia">Colombia</option><option value="string:KM" label="Comoros">Comoros</option><option value="string:CG" label="Congo (Brazzaville)">Congo (Brazzaville)</option><option value="string:CD" label="Congo (Kinshasa)">Congo (Kinshasa)</option><option value="string:CK" label="Cook Islands">Cook Islands</option><option value="string:CR" label="Costa Rica">Costa Rica</option><option value="string:CI" label="Côte d'Ivoire">Côte d'Ivoire</option><option value="string:HR" label="Croatia">Croatia</option><option value="string:CU" label="Cuba">Cuba</option><option value="string:CW" label="Curaçao">Curaçao</option><option value="string:CY" label="Cyprus">Cyprus</option><option value="string:CZ" label="Czech Republic">Czech Republic</option><option value="string:DK" label="Denmark">Denmark</option><option value="string:DJ" label="Djibouti">Djibouti</option><option value="string:DM" label="Dominica">Dominica</option><option value="string:DO" label="Dominican Republic">Dominican Republic</option><option value="string:EC" label="Ecuador">Ecuador</option><option value="string:EG" label="Egypt">Egypt</option><option value="string:SV" label="El Salvador">El Salvador</option><option value="string:GQ" label="Equatorial Guinea">Equatorial Guinea</option><option value="string:ER" label="Eritrea">Eritrea</option><option value="string:EE" label="Estonia">Estonia</option><option value="string:ET" label="Ethiopia">Ethiopia</option><option value="string:FK" label="Falkland Islands">Falkland Islands</option><option value="string:FO" label="Faroe Islands">Faroe Islands</option><option value="string:FJ" label="Fiji">Fiji</option><option value="string:FI" label="Finland">Finland</option><option value="string:FR" label="France">France</option><option value="string:GF" label="French Guiana">French Guiana</option><option value="string:PF" label="French Polynesia">French Polynesia</option><option value="string:TF" label="French Southern Lands">French Southern Lands</option><option value="string:GA" label="Gabon">Gabon</option><option value="string:GM" label="Gambia">Gambia</option><option value="string:GE" label="Georgia">Georgia</option><option value="string:DE" label="Germany">Germany</option><option value="string:GH" label="Ghana">Ghana</option><option value="string:GI" label="Gibraltar">Gibraltar</option><option value="string:GR" label="Greece">Greece</option><option value="string:GL" label="Greenland">Greenland</option><option value="string:GD" label="Grenada">Grenada</option><option value="string:GP" label="Guadeloupe">Guadeloupe</option><option value="string:GU" label="Guam">Guam</option><option value="string:GT" label="Guatemala">Guatemala</option><option value="string:GG" label="Guernsey">Guernsey</option><option value="string:GN" label="Guinea">Guinea</option><option value="string:GW" label="Guinea-Bissau">Guinea-Bissau</option><option value="string:GY" label="Guyana">Guyana</option><option value="string:HT" label="Haiti">Haiti</option><option value="string:HM" label="Heard and McDonald Islands">Heard and McDonald Islands</option><option value="string:HN" label="Honduras">Honduras</option><option value="string:HK" label="Hong Kong">Hong Kong</option><option value="string:HU" label="Hungary">Hungary</option><option value="string:IS" label="Iceland">Iceland</option><option value="string:IN" label="India">India</option><option value="string:ID" label="Indonesia">Indonesia</option><option value="string:IR" label="Iran">Iran</option><option value="string:IQ" label="Iraq">Iraq</option><option value="string:IE" label="Ireland">Ireland</option><option value="string:IM" label="Isle of Man">Isle of Man</option><option value="string:IL" label="Israel">Israel</option><option value="string:IT" label="Italy">Italy</option><option value="string:JM" label="Jamaica">Jamaica</option><option value="string:JP" label="Japan">Japan</option><option value="string:JE" label="Jersey">Jersey</option><option value="string:JO" label="Jordan">Jordan</option><option value="string:KZ" label="Kazakhstan">Kazakhstan</option><option value="string:KE" label="Kenya">Kenya</option><option value="string:KI" label="Kiribati">Kiribati</option><option value="string:KP" label="Korea, North">Korea, North</option><option value="string:KR" label="Korea, South">Korea, South</option><option value="string:KW" label="Kuwait">Kuwait</option><option value="string:KG" label="Kyrgyzstan">Kyrgyzstan</option><option value="string:LA" label="Laos">Laos</option><option value="string:LV" label="Latvia">Latvia</option><option value="string:LB" label="Lebanon">Lebanon</option><option value="string:LS" label="Lesotho">Lesotho</option><option value="string:LR" label="Liberia">Liberia</option><option value="string:LY" label="Libya">Libya</option><option value="string:LI" label="Liechtenstein">Liechtenstein</option><option value="string:LT" label="Lithuania">Lithuania</option><option value="string:LU" label="Luxembourg">Luxembourg</option><option value="string:MO" label="Macau">Macau</option><option value="string:MK" label="Macedonia">Macedonia</option><option value="string:MG" label="Madagascar">Madagascar</option><option value="string:MW" label="Malawi">Malawi</option><option value="string:MY" label="Malaysia">Malaysia</option><option value="string:MV" label="Maldives">Maldives</option><option value="string:ML" label="Mali">Mali</option><option value="string:MT" label="Malta">Malta</option><option value="string:MH" label="Marshall Islands">Marshall Islands</option><option value="string:MQ" label="Martinique">Martinique</option><option value="string:MR" label="Mauritania">Mauritania</option><option value="string:MU" label="Mauritius">Mauritius</option><option value="string:YT" label="Mayotte">Mayotte</option><option value="string:MX" label="Mexico">Mexico</option><option value="string:FM" label="Micronesia">Micronesia</option><option value="string:MD" label="Moldova">Moldova</option><option value="string:MC" label="Monaco">Monaco</option><option value="string:MN" label="Mongolia">Mongolia</option><option value="string:ME" label="Montenegro">Montenegro</option><option value="string:MS" label="Montserrat">Montserrat</option><option value="string:MA" label="Morocco">Morocco</option><option value="string:MZ" label="Mozambique">Mozambique</option><option value="string:MM" label="Myanmar">Myanmar</option><option value="string:NA" label="Namibia">Namibia</option><option value="string:NR" label="Nauru">Nauru</option><option value="string:NP" label="Nepal">Nepal</option><option value="string:NL" label="Netherlands">Netherlands</option><option value="string:AN" label="Netherlands Antilles">Netherlands Antilles</option><option value="string:NC" label="New Caledonia">New Caledonia</option><option value="string:NZ" label="New Zealand">New Zealand</option><option value="string:NI" label="Nicaragua">Nicaragua</option><option value="string:NE" label="Niger">Niger</option><option value="string:NG" label="Nigeria">Nigeria</option><option value="string:NU" label="Niue">Niue</option><option value="string:NF" label="Norfolk Island">Norfolk Island</option><option value="string:MP" label="Northern Mariana Islands">Northern Mariana Islands</option><option value="string:NO" label="Norway">Norway</option><option value="string:OM" label="Oman">Oman</option><option value="string:PK" label="Pakistan">Pakistan</option><option value="string:PW" label="Palau">Palau</option><option value="string:PS" label="Palestine">Palestine</option><option value="string:PA" label="Panama">Panama</option><option value="string:PG" label="Papua New Guinea">Papua New Guinea</option><option value="string:PY" label="Paraguay">Paraguay</option><option value="string:PE" label="Peru">Peru</option><option value="string:PH" label="Philippines">Philippines</option><option value="string:PN" label="Pitcairn">Pitcairn</option><option value="string:PL" label="Poland">Poland</option><option value="string:PT" label="Portugal">Portugal</option><option value="string:PR" label="Puerto Rico">Puerto Rico</option><option value="string:QA" label="Qatar">Qatar</option><option value="string:RE" label="Reunion">Reunion</option><option value="string:RO" label="Romania">Romania</option><option value="string:RU" label="Russian Federation">Russian Federation</option><option value="string:RW" label="Rwanda">Rwanda</option><option value="string:BL" label="Saint Barthélemy">Saint Barthélemy</option><option value="string:SH" label="Saint Helena">Saint Helena</option><option value="string:KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="string:LC" label="Saint Lucia">Saint Lucia</option><option value="string:MF" label="Saint Martin (French part)">Saint Martin (French part)</option><option value="string:PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="string:VC" label="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="string:WS" label="Samoa">Samoa</option><option value="string:SM" label="San Marino">San Marino</option><option value="string:ST" label="Sao Tome and Principe">Sao Tome and Principe</option><option value="string:SA" label="Saudi Arabia">Saudi Arabia</option><option value="string:SN" label="Senegal">Senegal</option><option value="string:RS" label="Serbia">Serbia</option><option value="string:SC" label="Seychelles">Seychelles</option><option value="string:SL" label="Sierra Leone">Sierra Leone</option><option value="string:SG" label="Singapore">Singapore</option><option value="string:SX" label="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option><option value="string:SK" label="Slovakia">Slovakia</option><option value="string:SI" label="Slovenia">Slovenia</option><option value="string:SB" label="Solomon Islands">Solomon Islands</option><option value="string:SO" label="Somalia">Somalia</option><option value="string:ZA" label="South Africa">South Africa</option><option value="string:GS" label="South Georgia and South Sandwich Islands">South Georgia and South Sandwich Islands</option><option value="string:SS" label="South Sudan">South Sudan</option><option value="string:ES" label="Spain">Spain</option><option value="string:LK" label="Sri Lanka">Sri Lanka</option><option value="string:SD" label="Sudan">Sudan</option><option value="string:SR" label="Suriname">Suriname</option><option value="string:SJ" label="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option><option value="string:SZ" label="Swaziland">Swaziland</option><option value="string:SE" label="Sweden">Sweden</option><option value="string:CH" label="Switzerland">Switzerland</option><option value="string:SY" label="Syria">Syria</option><option value="string:TW" label="Taiwan">Taiwan</option><option value="string:TJ" label="Tajikistan">Tajikistan</option><option value="string:TZ" label="Tanzania">Tanzania</option><option value="string:TH" label="Thailand">Thailand</option><option value="string:TL" label="Timor-Leste">Timor-Leste</option><option value="string:TG" label="Togo">Togo</option><option value="string:TK" label="Tokelau">Tokelau</option><option value="string:TO" label="Tonga">Tonga</option><option value="string:TT" label="Trinidad and Tobago">Trinidad and Tobago</option><option value="string:TN" label="Tunisia">Tunisia</option><option value="string:TR" label="Turkey">Turkey</option><option value="string:TM" label="Turkmenistan">Turkmenistan</option><option value="string:TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="string:TV" label="Tuvalu">Tuvalu</option><option value="string:UG" label="Uganda">Uganda</option><option value="string:UA" label="Ukraine">Ukraine</option><option value="string:AE" label="United Arab Emirates">United Arab Emirates</option><option value="string:GB" label="United Kingdom">United Kingdom</option><option value="string:UM" label="United States Minor Outlying Islands">United States Minor Outlying Islands</option><option value="string:US" label="United States of America">United States of America</option><option value="string:UY" label="Uruguay">Uruguay</option><option value="string:UZ" label="Uzbekistan">Uzbekistan</option><option value="string:VU" label="Vanuatu">Vanuatu</option><option value="string:VA" label="Vatican City">Vatican City</option><option value="string:VE" label="Venezuela">Venezuela</option><option value="string:VN" label="Vietnam">Vietnam</option><option value="string:VG" label="Virgin Islands, British">Virgin Islands, British</option><option value="string:VI" label="Virgin Islands, U.S.">Virgin Islands, U.S.</option><option value="string:WF" label="Wallis and Futuna Islands">Wallis and Futuna Islands</option><option value="string:EH" label="Western Sahara">Western Sahara</option><option value="string:YE" label="Yemen">Yemen</option><option value="string:ZM" label="Zambia">Zambia</option><option value="string:ZW" label="Zimbabwe">Zimbabwe</option></select>
                                                                                </div>
                                                                            </label>
                                                                            <label for="zipcode"><span class="label-text">Zip Code</span>
                                                                                <input class="input-bottom right-half" id="zipcode" name="postal_code" type="text" maxlength="255" placeholder="Zip" required="required">
                                                                            </label>
                                                                        </div>
                                                                        <h4>Credit Card Information</h4>
                                                                        <div id="checkoutError" class="checkout-error" style="display:none"></div>
                                                                        <div class="input-wrapper card-info-input-wrapper">
                                                                            <!-- ngIf: options.version !=2 -->
                                                                            <label for="card-number"><span class="label-text">Card Number</span>
                                                                                <input id="card-number" name="card_number" type="text" maxlength="255" placeholder="1111 1111 1111 1111" class="full" required="required" autofocus="autofocus">
                                                                            </label>
                                                                            <label for="card-date"><span class="label-text">Card Date</span>
                                                                                <input id="card-date" type="text" name="card_date" maxlength="255" placeholder="07/17" class="left-half" required="required">
                                                                            </label>
                                                                            <label for="card-type"><span class="label-text">Card Type</span>
                                                                                <input id="card-type" name="card_type" type="text" max-length="255" class="right-half" placeholder="CVV" required="required">
                                                                            </label>
                                                                        </div>
                                                                    </fieldset>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="toggle" id="paypalSel">
                                                    <span class="payment-info-name">
                                                        <i class="fa fa-paypal"></i> PayPal
                                                    </span>
                                                </li>
                                                <li id="paypalPopup" style="display:none">
                                                    <div class="paypal-wrapper">
                                                        <div>
                                                            <a href="/payment/{{$paymethod}}"><input type="button" class="paypal-button" value="Paypal"></a>
                                                        </div>
                                                        <div style="padding-top : 10px;"><span style="font-size:12px">The safer, the easier way to pay</span></div>
                                                        <div>
                                                            <ul class="card-list">
                                                                <li><img src="{{ asset('new-assets/images/new/payment-icons/pp-visa.svg') }}"></li>
                                                                <li><img src="{{ asset('new-assets/images/new/payment-icons/pp-mc.svg') }}"></li>
                                                                <li><img src="{{ asset('new-assets/images/new/payment-icons/pp-amex.svg') }}"></li>
                                                                <li><img src="{{ asset('new-assets/images/new/payment-icons/pp-discover.svg') }}"></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-info__checkout-wrapper">
                                    <div class="checkout-wrapper__actions ng-scope">
                                        <div class="checkout-wrapper__back">
                                            <a class="btn btn-link" href="/tool/upgrade-plan"><i class="fa fa-chevron-left"></i> Back</a>
                                        </div>
                                        <div class="checkout-wrapper__continue">
                                            <div class="primary-payment-action">
                                               <button type="submit" class="btn btn-primary-ng" id="checkoutContinue">
                                                    <span>
                                                        Checkout
                                                    </span>
                                                    <i class="fa fa-chevron-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout-wrapper__why">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-4 order-summary-sec">
                                <h4>Your Order Summary</h4>
                                <div class="order-summary-box">
                                    <div class="order-summary-box__section order-summary-box__section--interval">
                                        <div class="order-summary-box__section--interval__left">
                                            Total <span class="order-summary-box__section--interval__left__value">${{$amount}}
                                            <?php if($billing == 'yearly') {?>
                                                <span>x 12 months</span>
                                            <?php }else if($billing == 'monthly'){?>
                                                <span>x 1 month</span>
                                            <?php }?>
                                            </span>
                                        </div>
                                        <div class="order-summary-box__section--interval__right">
                                            <b>
                                            <?php if($billing == 'yearly') {?>
                                                <span>${{$amount * 12}}</span>
                                            <?php }else if($billing == 'monthly'){?>
                                                <span>${{$amount}}</span>
                                            <?php }?>
                                                
                                            </b>
                                        </div>
                                    </div>
                                    <div class="order-summary-box__section order-summary-box__section--total">
                                        <div class="order-summary-box__section--total__left">
                                            Today's total:
                                        </div>
                                        <div class="order-summary-box__section--total__right">
                                            <?php if($billing == 'yearly') {?>
                                                <span>${{$amount * 12}}</span>
                                            <?php }else if($billing == 'monthly'){?>
                                                <span>${{$amount}}</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="order-summary-box__section order-summary-box__section--details ng-scope">
                                        <?php if($billing == 'yearly') {?>
                                            <p>Your {{$paymethod}} subscription begins today and will renew on <b>{{date("Y-m-d", strtotime("+1 year", time()))}}</b>.</p>
                                        <?php }else if($billing == 'monthly'){?>
                                            <p>Your {{$paymethod}} subscription begins today and will renew on <b>{{date("Y-m-d", strtotime("+1 month", time()))}}</b>.</p>
                                        <?php }?>
                                        <p> Once your credit card payment has gone through you'll have access to <b>{{$credits}}</b> lookups per month<span>, where credits are allocated all upfront</span>.</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="container-fluid rr-sec-trust-secure">
                                    <div class="row no-gutters">
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center"><h3>Trusted &amp; Secure</h3></div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center" id="logos">
                                            <span>
                                            
                                                <img async="" src="//static.rocketreach.co/images/checkout/secured_with_ssl.svg" alt="Multi Domain SSL" border="0">
                                            </span>
                                            <span >
                                                <a href="https://www.braintreegateway.com/merchants/mspb8dyh8p5ydtxj/verified" target="_blank"><!--
                                                --><img async="" src="//static.rocketreach.co/images/checkout/braintree-blue2.svg" border="0"><!--
                                            --></a>
                                            </span>
                                            <span>
                                                <a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><!--
                                                --><img src="//static.rocketreach.co/images/checkout/paypal-blue.svg" border="0" alt="Secured by PayPal"><!--
                                            --></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="terms">
                                    <div class="terms__secure">
                                        <div class="payment-provider-logo">
                                            <span class="payment-provider-logo__wrapper"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <div class="payment-provider-content">
                                            <p class="payment-provider-content__text">For your security Dayasyder does not access or store credit card information. Your card payment is secured by Stripe and Braintree. For more information, please click
                                                <a href="https://www.braintreegateway.com/merchants/mspb8dyh8p5ydtxj/verified" target="_blank">here.</a>
                                                <a href="https://stripe.com/about" target="_blank" g-if="paymentProvider === 'stripe'">here.</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
//set your publishable key
Stripe.setPublishableKey('pk_test_51Hu5GQJNBNbUpyz6WRtMzlTL6btHhdwRQYkibSQtFkokjIPPmZm0yTXSI8tvc3EK68CQvOTxzVFIBneE9GBy0JnT007rhlSmhp');
//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        console.log(response.error);
        $("#checkoutError").html(response.error.message);
        $("#checkoutError").css('display','block');
        $("#checkoutContinue").css('display','none');
    } else {
        var form$ = $("#billingForm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}

$(document).ready(function() {
    //on form submit
    $("#billingForm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#checkoutContinue').attr("disabled", "disabled");
        var date = $('#card-date').val();
        var date_array = date.split("/");
        //create single-use token to charge the user
        var result = Stripe.createToken({
            number: $('#card-number').val(),
            cvc: $('#card-type').val(),
            exp_month: date_array[0],
            exp_year: date_array[1]
        }, stripeResponseHandler);
        //submit from callback
        return false;
    });
});
$("#creditCardSel").click(function(e) {
    $(this).removeClass('active');
    $(this).addClass('active');
    $("#paypalSel").removeClass('active');
    $("#creditCardPopup").css('display','block');
    $("#paypalPopup").css('display','none');
    $("#checkoutContinue").css('display','block');

})
$("#paypalSel").click(function(e) {
    $(this).removeClass('active');
    $(this).addClass('active');
    $("#creditCardSel").removeClass('active');
    $("#paypalPopup").css('display','block');
    $("#creditCardPopup").css('display','none');
    $("#checkoutContinue").css('display','none');
})
$("#checkoutContinue").click(function(e) {
    var emptyTextBoxes = $('input:text').filter(function() { return this.value == ""; });
    var count = emptyTextBoxes.length;
    $('input').removeClass('submitted-empty-form');
    if(count > 0) {
        emptyTextBoxes.addClass('submitted-empty-form');
    } else {
        $("#billingForm").submit();
    }
    console.log(emptyTextBoxes.length);
})
</script>

</html>