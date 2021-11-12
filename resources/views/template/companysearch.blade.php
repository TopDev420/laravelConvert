
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('new-assets/js/filterpage/jquery.min.js')}}"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            background-color: #fafbfb;
            padding-bottom: 100px;
        }
        .container {
            padding: 20px 10px;
            border: 1px solid grey;
            width: 700px;
            margin-bottom: 30px;
            text-align: left;
            box-shadow: 0 0 0 1px rgb(0 0 0 / 10%), 0 2px 3px rgb(0 0 0 / 15%);
            padding: 30px 28px 28px;
            color: '#333';
            border-color: #eee;
        }
        .wrapper {
            margin-top: 100;
            margin-left: 60;
            width: 80%;
        }
        .smallFont {
            font-size: 12px;
            color: #555;
        }
        .normalFont {
            font-size: 15px;
            color: #333;
        }
        .sepa {
            height: 20px;
        }
        .dashline {
            border: 1px solid grey;
            width: 100%;
            height: 0;
            margin-top: 20;
            margin-bottom: 20;
        }
        .searchButton {
            height: 100%;
            width: 46px;
            border: none;
            background-color: white;
            border-left: 1px solid #ccc;
        }
        .normalButton {
            background-color: white;
            border: 1px solid #3253c1;
            color: #3253c1;
            padding: 10px;
            cursor: pointer;
            transition: all 0.3s ease-out;
            border-radius: 5px;
        }
        .redButton {
            background-color: white;
            border: 1px solid #f78713;
            color: #f78713;
            padding: 10px;
            cursor: pointer;
            transition: all 0.3s ease-out;
            border-radius: 5px;
        }
        
        .greenButton {
            background-color: #37ca68;
            color: white;
            padding: 6px;
            cursor: pointer;
            transition: all 0.3s ease-out;
            border-radius: 5px;
            font-size: 12px;
        }
        
        .normalButton:hover {
            background-color: #3253c1;
            color: white;
        }
        .redButton:hover {
            background-color: #f78713;
            color: white;
        }
        .card {
            width: 28%;
            box-shadow: 0px 0px 1px 1px rgba(128, 128, 128, 0.2);
            padding: 10px;
            margin-top: 10px;
        }
        .card-name {
            color: #3253c1;
            font-size: 16px;
        }
        .card-job {
            margin-top: 5px;
            font-size: 13px;
            color: #555;
        }
        .card-email {
            margin-top: 7px;
            border-radius: 8px;
            padding: 4px;
            font-size: 12px;
            border: 1px solid #ccc;
        }
        .card-phone {
            border-radius: 8px;
            padding: 4px;
            font-size: 12px;
            border: 1px solid #ccc
        }
        .view-contact-row {       
            display: flex;
            line-height: 3;
            padding-left: 0px;
        }
        .view-contact-row-strong {  
            width: 30%;
        }
        .common-popup .popup-wrap {
            min-width : 570px !important;
        }
        .copy-to-clipboard {
            font-size: 5px;
            color: cornflowerblue;
            padding-left: 5px;
            cursor: pointer;
        }
        .copy-to-clipboard:hover {
            color: blue;
        }
        .heading {
            font-size: 20px;
            margin: 0 0 25px;
            font-weight: 600;
            line-height: 1.5em;
            font-family: inherit;
        }
        .input-wrapper {
            width: calc(100% + 8px);
            margin: 0 -4px;
            border: 1px solid #d2d2d2;
            box-shadow: 0 1px 3px rgb(0 0 0 / 6%);
            border-radius: 3px;
            transition: all 150ms ease;
            height: 52px;
            z-index: 1;
        }
        .search-input {
            background: #fefefe;
            padding: 15px 14px;
            font-size: 15px;
            height: 50px;
            border: 0!important;
            border-radius: 3px;
            transition: all 250ms ease;
            width: calc(100% - 50px);
        }
    </style>
</head>
@include('filterheader')
<body>
    <div class="wrapper">
        <div class="container">
            <h2 class="heading">Domain Search</h2>
            <form method="post" action="/find_domain" class="dashboard-search" id="dashboard-search">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-wrapper" data-original-title="" title="">
                
                    <input class="search-input" placeholder="company.com" required="required" type="text" name="domain">
                    <span>
                        <button class="searchButton fa fa-search" type="submit" ></button>
                    </span>    
                </div>
            </form>
        </div>
        @if (count($contracts) > 0)
        <div class="container">
            <div style="display: flex; justify-content: space-between">
                <div>
                    <div style="font-weight: bold; font-size: 20; margin-bottom: 3px;">{{ $contracts[0]-> company_name}}</div>
                    <a href="{{ $contracts[0]-> company_website}}"><div>{{ $contracts[0]-> company_website}}</div></a>
                    <div class="normalFont" style="background-color: #f78713; padding: 8px; color: white; margin-top: 5px;">{{ $contracts[0]-> phone_number}}</div>
                </div>
                <div>
                    <div class="smallFont">Revenue</div>
                    <div class="normalFont">{{ $contracts[0]-> revenue}}</div>
                    <div class="sepa"></div>
                    <div class="smallFont"> Industry </div>
                    <div class="normalFont">{{ $contracts[0]-> industries}}</div>
                </div>
                <div>
                    <div class="smallFont">Employees</div>
                    <div class="normalFont">{{ $contracts[0]-> employees}}</div>
                    <div class="sepa"></div>
                    <div class="smallFont"> Location </div>
                    <div class="normalFont">{{ $contracts[0]-> city}} {{ $contracts[0]-> state}} {{ $contracts[0]-> country}}</div>
                </div>
                <div>
                    <div class="smallFont">Business Model</div>
                    <div class="normalFont">{{ $contracts[0]-> business_model}}</div>
                    <div class="sepa"></div>
                    <div class="smallFont"> Founded Year </div>
                    <div class="normalFont">{{ $contracts[0]-> year_founded}} </div>
                </div>
            </div>
            <div class="dashline">
            </div>
            <div style="display: flex; justify-content: space-around">
                <div class="normalButton">Access all contacts</div>
                <div class="redButton">Access similar companies</div>
            </div>
        </div>
        @endif
        <div class="container">
            <h2 class="heading">Top Contracts</h2>
            <div style="display: flex; justify-content: space-between; flex-wrap: wrap">
            @foreach ($contracts as $item)
                <div class="card">
                    <div class="card-name">{{ $item-> first_name }} {{ $item-> last_name}}</div>
                    <div class="card-job">{{ $item-> job_title}}</div>
                    <div class="card-email">{{ $item-> email_address}}</div>
                    <div style="display: flex; justify-content: space-between; margin-top: 5px;">
                        <div class="card-phone">{{ $item-> direct_phone}}</div>
                        <div class="greenButton" onClick="viewContact({{$item-> id}})">View Contact</div>
                    </div>
                </div>
            @endforeach
            </div>
            <div style="display: flex; width: 100%; justify-content: center; align-items: center; margin-top: 30px;">
                <div class="normalButton" onClick="location.href = '/tool/advanced-search';">View more Contacts</div>
            </div>
        </div>
    </div>
    <!-- Start View Contact Popup -->
    <div class="create-viewContact-popup common-popup" style="display:none">
        <div class="popup-wrap">
            <div class="popup-close view-contact-cancel" title="Click here to close">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <title>Click here to close</title>
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                    <path d="M0 0h24v24H0z" fill="none"></path>
                </svg>
            </div>
            <div class="title">Contact Information</div>
            <div class="popup-content-wrap">
                    <div class="view-contact-row" data-row="name"><strong class="view-contact-row-strong">Name:</strong> <div style="display:flex;align-items:center;">
                    <div id="view-contact-id" style="display:none"></div>
                    <div id="view-contact-name">Anne World</div><span class="copy-to-clipboard"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" class=""></path></svg></span></div></div>
                <div class="view-contact-row" data-row="title"><strong class="view-contact-row-strong">Job Title:</strong> <div style="display:flex;align-items:center;"><div id="view-contact-title">Property Manager</div><span class="copy-to-clipboard"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" class=""></path></svg></span></div></div>
                <div class="view-contact-row" data-row="email"><strong class="view-contact-row-strong">Email:</strong> <div style="display:flex;align-items:center;"><div id="view-contact-email">***e@artiqueltd.com</div><span class="copy-to-clipboard"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" class=""></path></svg></span></div></div>
                <div class="view-contact-row" data-row="dphone"><strong class="view-contact-row-strong">Direct Phone:</strong><div style="display:flex;align-items:center;"><div id="view-contact-dphone">1.***.277.***</div> <span class="copy-to-clipboard"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" class=""></path></svg></span></div></div>
                <div class="view-contact-row" data-row="cname"><strong class="view-contact-row-strong">Company Name:</strong> <div style="display:flex;align-items:center;"><div id="view-contact-cname">Artique Limited</div><span class="copy-to-clipboard"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" class=""></path></svg></span></div></div>
                <div class="view-contact-row" data-row="phone"><strong class="view-contact-row-strong">Phone Number:</strong><div style="display:flex;align-items:center;"> <div id="view-contact-phone">1.***.277.***</div><span class="copy-to-clipboard"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" class=""></path></svg></span></div></div>
            </div>
            <div class="popup-action-wrap" style="display: none">
                <div class="popup-action-btn positive-btn popup-addtoleads" id="view-contact-button">Save Contact</div>
                <a href="/tool/upgrade-plan" style="text-decoration:none"><div  style="display:none" class="popup-action-btn positive-btn" id="gotoplan">Upgrade Plan</div></a>
                <div class="popup-saved-msg" id="view-contact-msg">This contact was already saved to your leads</div>
                <div style="display:none" class="popup-saved-msg" id="nocredit">You don't have enough credits to view contact.</br>Please upgrade your plan.</div>
            </div>
        </div>
    </div>
    <div class="common-popup-mask view-contact-mask" style="display:none"></div>
</body>
<script>
function viewContact(id)
{
    console.log("+++view+++",id);
    if({{$userinfo->credit}} === 0) {
        alert('You have no credit..Please upgrade the plan');
        return;
    }
    var csrftoken  ='{{ csrf_token() }}';
    var baseurl = '<?php echo url('/'); ?>';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': csrftoken
        },
        type:'POST',
        url:baseurl+'/viewcontact',
        data: {
        'id': id,
        },
        beforeSend: function() {
        },
        success:function(data){
            console.log(data);
            $(".leads-count").html('Unused Credits ' + data.credit);
            if(data.nocredit) {
                alert('You have no credit..Please upgrade the plan');
                return;
            }
            $("#view-contact-name").html(data.contact.first_name + ' ' + data.contact.last_name);
            $("#view-contact-email").html(data.contact.email);
            $("#view-contact-title").html(data.contact.job_title);
            $("#view-contact-dphone").html(data.contact.direct_phone);
            $("#view-contact-cname").html(data.contact.company_name);
            $("#view-contact-phone").html(data.contact.phone_number);
            $(".create-viewContact-popup").css("display","block");
            $(".view-contact-mask").css("display","block");
            console.log("+++show contat++",data.contact);
        }
    });
    $(".view-contact-cancel").click(function(e){
        $(".create-viewContact-popup").css("display","none");
        $(".view-contact-mask").css("display","none");
    });
    $(document).on('click','.copy-to-clipboard', function(e) {
        var id = $(this).parents('.view-contact-row').attr('data-row');
        result = copyToClipboard(id);
        console.log(result);
    });
}
</script>
</html>