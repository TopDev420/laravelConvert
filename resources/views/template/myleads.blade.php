@extends('filterheader')
@section('content')
<style>
    .contact-list .contact-header {
        grid-template-columns: 40px 15% 17% 15% 17% 17% 15% !important;
    }
    .contact-list .contact-item {
        grid-template-columns: 40px 15% 17% 15% 17% 17% 15% !important;
    }
    .adv-leads-action {
        margin-top : 0px !important;
    }
    .site-content {
        margin-left : 0px !important;
        height : 100% !important;
    }
    .left-container {
        height : 100%;
    }
    .leads-list-header {
        display: flex;
        padding: 15px 20px;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
        letter-spacing: .07px;
        color: #636666;
    }
    .leads-header {
        font-size: 18px;
        letter-spacing: .07px;
        color: #4c4c4c;
    }
    .leads-list {
        display: flex;
        flex-direction: column;
        padding: 0 20px 40px;
        max-height: calc(100% - 59px);
        overflow: auto;
    }
    .left-section .leads-list-item.selected {
        background-color: #e3f0fd;
        color: #2080ee;
        border-radius: 5px;
    }
    .left-section .leads-list-item {
        position: relative;
        padding: 6px 0;
        border-bottom: 1px solid #d0d0d0;
    }
    .left-section .leads-list-item-wrap {
        padding: 10px 0 10px 8px;
        color: #4c4c4c;
        font-size: 13px;
        position: relative;
        display: flex;
        cursor: pointer;
    }
    .leads-item-count {
        display: flex;
        width: 70%;
        justify-content: flex-end;
        padding-right: 10px;
    }
    .contact-action-btn.blocked-wrap {
        padding-right : 10px !important;
    }

    .contact-list .contact-item {
        user-select : text !important;
    }
</style>
<section class="site-content">
    <main>
        <div class="search-results">
            <div class="left-section" style="margin-left:5%;">
                <div class="left-container">
                    <div class="leads-list-header">
                        <div class="leads-header">My Leads</div>
                    </div>
                    <div class="leads-list">
                        <div class="leads-list-wrap">
                            <div class="leads-list-item selected">
                                <div class="leads-list-item-wrap">
                                    <div style="width:30%">All Leads</div>
                                    <div class="leads-item-count"><span>{{$myleads_count}}</span></div>
                                </div>
                            </div>
                            <div class="leads-list-item">
                                <div class="leads-list-item-wrap">
                                    <div class="leads-item-name show-elipsis" title="Plugin History">
                                        Plugin History
                                    </div>
                                    <div class="leads-item-count"><span>243</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Right section -->
            <div class="right-section">
                <div class="adv-leads-action">
                    <div class="adv-contact-action-btn-wrap">
                        <div class="contact-action-btn selection-wrap">
                            <div class="box-wrap">
                                <div class="contact-chechk-box-wrap">
                                    <div class="common-check-box "  id="selectAllContacts">
                                        <div class="common-check-box-content">
                                            <div class="empty-check-box"></div>
                                            <div class="common-check-box-svg-wrap"><svg width="16" height="14"
                                                    viewBox="0 0 16 14">
                                                    <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div><i class="fa fa-angle-down dropdown-icon" id="selectDropdownContact"></i>
                            </div>
                            <div class="drop-popup-box animatedFast animatedDropDown">
                                <div class="list-action-item" id="selectAll" style="display:none">All</div>
                                <div class="list-action-item" id="selectNull" style="display:none">None</div>
                                <div class="list-action-item" id="select100">1 - 100</div>
                                <div class="list-action-item" id="select250">1 - 250</div>
                                <div class="list-action-item" id="select500">1 - 500</div>
                                <div class="list-action-item" id="select1000">1 - 1000</div>
                                <div class="list-action-item" id="select5000">1 - 5000</div>
                                <div class="list-action-item range-selection">
                                    <div class="range-text">Select the top</div>
                                    <div class="range-selection-box"><input id="rangeInputBox" min="1" step="1"
                                            max="5000" type="number" placeholder="upto 5000" value=""><i
                                            class="fa fa-check" aria-hidden="true" id="selectByNum"></i></div>
                                </div>
                            </div>
                        </div>
                        <div id="getContactBulkLB" class="contact-action-btn get-leads-btn blocked-wrap">
                            <svg id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve" class="svg-icon" style="display:block"><g><g><path d="M512,241.7L273.643,3.343v156.152c-71.41,3.744-138.015,33.337-188.958,84.28C30.075,298.384,0,370.991,0,448.222v60.436 l29.069-52.985c45.354-82.671,132.173-134.027,226.573-134.027c5.986,0,12.004,0.212,18.001,0.632v157.779L512,241.7z  M255.642,290.666c-84.543,0-163.661,36.792-217.939,98.885c26.634-114.177,129.256-199.483,251.429-199.483h15.489V78.131 l163.568,163.568L304.621,405.267V294.531l-13.585-1.683C279.347,291.401,267.439,290.666,255.642,290.666z"></path></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            Export Selected Contacts
                        </div>
                        <div class="selected-count" style="display:none" id="contactSelectedCount">
                            <span>50</span>&nbsp;contacts&nbsp;selected.
                        </div>
                    </div>
                    <div class="pagination-parent-wrap">
                        <div class="pagination-wrap">
                            <div class="pagination-section"><span class="pagination-current-page">1</span>&nbsp;to&nbsp;<span class="pagination-current-end-page">
                                @if($myleads_count > 20)
                                    20
                                @else
                                    {{$myleads_count}}
                                @endif
                            </span>&nbsp;of&nbsp;<span class="pagination-last-page">{{$myleads_count}}</span><i
                                    class="fa fa-angle-left pagination-btn"></i><i
                                    class="fa fa-angle-right pagination-btn "></i></div>
                        </div>
                    </div>
                </div>
                <div class="contact-list">
                    <div class="contact-list-wrap">
                        <div class="drop-popup-box animatedFast animatedDropDown add-to-list-single-popup "
                            style="top: 0px; left: 0px;">
                            <div class="leads-list-popup">
                                <div class="leads-list">
                                    <div class="leads-list-item"><i class="fa fa-folder-o v-btm"></i><span
                                            class="lead-name show-elipsis">Plugin History</span><span
                                            class="lead-count"><span>240</span></span></div>
                                    <div class="leads-list-item"><i class="fa fa-folder-o v-btm"></i><span
                                            class="lead-name show-elipsis">hj</span><span
                                            class="lead-count"><span>2</span></span></div>
                                    <div class="leads-list-item"><i class="fa fa-folder-o v-btm"></i><span
                                            class="lead-name show-elipsis">ja</span><span
                                            class="lead-count"><span>0</span></span></div>
                                </div>
                                <div class="list-action-item create-new-list"><svg width="13" height="11"
                                        viewBox="0 0 13 11">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #2176b7;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path id="List" class="cls-1"
                                            d="M9,4h4V5H9V4ZM9,7h4V8H9V7ZM4,3H7V4H4V3ZM3,0H4V7H3V0ZM0,10H13v1H0V10ZM9,1h4V2H9V1ZM0,3H3V4H0V3Z">
                                        </path>
                                    </svg>Create New List</div>
                            </div>
                        </div>
                        <div class="single-action-mask "></div>
                        <div class="contact-header">
                            <div class="contact-header-item contact-check-box-wrap"></div>
                            <div class="contact-header-item contact-name">Name & Title</div>
                            <div class="contact-header-item email">Email & Phone</div>
                            <div class="contact-header-item company">Company & Website</div>
                            <div class="contact-header-item address">HQ Address</div>
                            <div class="contact-header-item industries">Industries</div>
                            <div class="contact-header-item employees">Employees & Revenue</div>
                        </div>
                        @foreach($myleads as $row)
                        <div class="contact-item">
                            <div class="contact-check-box-wrap">
                                <div class="common-check-box ">
                                    <div class="common-check-box-content">
                                        <div class="empty-check-box"></div>
                                        <div class="common-check-box-svg-wrap"><svg width="16" height="14"
                                                viewBox="0 0 16 14">
                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                            </svg></div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-name">
                                <div class="name item-name">{{ $row->contactinfo[0]->first_name}} {{ $row->contactinfo[0]->last_name}}</div>
                                <div class="title item-title">{{$row->contactinfo[0]->job_title}}</div>
                            </div>
                            <div class="email item-email">
                                <div>E: {{ $row->contactinfo[0]->email_address }}</div>
                                <div>D: {{ $row->contactinfo[0]->direct_phone }}</div>
                                <div>C: {{ $row->contactinfo[0]->phone_number }}</div>
                            </div>
                            <div class="company">
                                <div class="name item-cname">{{ $row->contactinfo[0]->company_name}}</div>
                                <div> {{$row->contactinfo[0]->company_website}}</div>
                            </div>
                            <div class="address">
                                <div class="address1 item-address">{{ $row->contactinfo[0]->address1}} {{ $row->contactinfo[0]->address2}}</div>
                                <div class="address2 item-address2">{{ $row->contactinfo[0]->city}} {{ $row->contactinfo[0]->state}} {{ $row->contactinfo[0]->zipcode}} {{ $row->contactinfo[0]->country}}</div>
                            </div>
                            <div class="industry item-industry">{{ $row->contactinfo[0]->industries }}</div>
                            <div>
                                <div class="employees item-employees">E: {{ $row->contactinfo[0]->employees }}</div>
                                <div class="revenue item-revenue">R: {{ $row->contactinfo[0]->revenue }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
<script>
    $(document).ready(function () {
        $(".search-header .leads-count").css("display","none");
    });
    $(document).on('click','.contact-item .common-check-box', function(e) {
        var className = $(this).attr('class');
        if(className.indexOf('selected') >= 0 ) {
            $(this).removeClass('selected');
            $("#selectAllContacts").removeClass('selected');
            $("#selectAllContacts").parents('.box-wrap').removeClass('selected');

        }else {
            $(this).removeClass('selected');
            $(this).addClass('selected');
        }
        var count = $(".contact-item .selected").length;
        if(count > 0) {
            $("#contactSelectedCount").css("display","block");
            $("#contactSelectedCount span").html(count);
        } else {
            $("#contactSelectedCount").css("display","none");
            $("#contactSelectedCount span").html('');
        }

    });

    $("#selectDropdownContact").click(function(e) {
        var className = $(this).parents('.contact-action-btn').attr('class');
        if(className.indexOf('clicked') >= 0 ) {
            $(this).parents('.contact-action-btn').removeClass('clicked');
            $(this).parents('.contact-action-btn').find('.bulk-action-mask').removeClass('show-mask');
        }else {
            $(this).parents('.contact-action-btn').removeClass('clicked');
            $(this).parents('.contact-action-btn').addClass('clicked');
            $(this).parents('.contact-action-btn').find('.bulk-action-mask').removeClass('show-mask');
            $(this).parents('.contact-action-btn').find('.bulk-action-mask').addClass('show-mask');
        }

    });
    $("#rangeInputBox").keyup(function(e) {
        var text = $("#rangeInputBox").val();
        if(text == "") {
            $(this).parents('.range-selection-box').find('.fa-check').removeClass('enabled');
        } else {
            $(this).parents('.range-selection-box').find('.fa-check').removeClass('enabled');
            $(this).parents('.range-selection-box').find('.fa-check').addClass('enabled');
        }
    });
    $("#selectByNum").click(function(e) {
        var className = $(this).attr('class');
        if(className.indexOf('enabled') >= 0 ) {
            var count = parseInt($("#rangeInputBox").val());
            selectTop(count);
            $("#selectDropdownContact").click();
        }
    });
    $("#selectAll").click(function(e) {
        $('#selectAllContacts').removeClass('selected');
        $('#selectAllContacts').addClass('selected');
        $('#selectAllContacts').parents('.box-wrap').removeClass('selected');
        $('#selectAllContacts').parents('.box-wrap').addClass('selected');
        $(".contact-item .common-check-box").removeClass('selected');
        $(".contact-item .common-check-box").addClass('selected');
        $('#selectDropdownContact').parents('.contact-action-btn').removeClass('clicked');
        $('#selectDropdownContact').parents('.contact-action-btn').find('.bulk-action-mask').removeClass('show-mask');
        $("#contactSelectedCount").css("display","block");
        $("#contactSelectedCount span").html('20');
        $("#selectDropdownContact").click();

    });
    $("#selectNull").click(function(e) {
        $('#selectAllContacts').removeClass('selected');
        $('#selectAllContacts').parents('.box-wrap').removeClass('selected');
        $(".contact-item .common-check-box").removeClass('selected');
        $('#selectDropdownContact').parents('.contact-action-btn').removeClass('clicked');
        $('#selectDropdownContact').parents('.contact-action-btn').find('.bulk-action-mask').removeClass('show-mask');
        $("#contactSelectedCount").css("display","none");
        $("#contactSelectedCount span").html('');
        $("#selectDropdownContact").click();

    });
    $("#selectAllContacts").click(function(e) {
        var className = $(this).attr('class');
        if(className.indexOf('selected') >= 0 ) {
            $(this).removeClass('selected');
            $(this).parents('.box-wrap').removeClass('selected');
            $(".contact-check-box-wrap .common-check-box").removeClass('selected');
            $("#contactSelectedCount").css("display","none");
            $("#contactSelectedCount span").html('');
        } else {
            $(this).removeClass('selected');
            $(this).addClass('selected');
            $(this).parents('.box-wrap').removeClass('selected');
            $(this).parents('.box-wrap').addClass('selected');
            $(".contact-check-box-wrap .common-check-box").removeClass('selected');
            $(".contact-check-box-wrap .common-check-box").addClass('selected');
            $("#contactSelectedCount").css("display","block");
            $("#contactSelectedCount span").html('20');
        }
    });
    $("#select100").click(function(e) {
        selectTop(100);
        $("#selectDropdownContact").click();
    })
    $("#select250").click(function(e) {
        selectTop(250);
        $("#selectDropdownContact").click();
    })
    $("#select500").click(function(e) {
        selectTop(500);
        $("#selectDropdownContact").click();
    })
    $("#select1000").click(function(e) {
        selectTop(1000);
        $("#selectDropdownContact").click();
    })
    $("#select5000").click(function(e) {
        selectTop(5000);
        $("#selectDropdownContact").click();
    })
    $("#getContactBulkLB").click(function(e) {
        if($('.contact-item .selected').length == 0)
        {
            return;
        }
        var items = [];
        $('.contact-item .selected').each(function(){
            var name = $(this).parents('.contact-item').find('.contact-name').find('.name').html();
            items.push(name);
        });
        var jsonItems = JSON.stringify(items);
        console.log(jsonItems);
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/downloadMyLeads',
            data: {
            'item': jsonItems,
            },
            success:function(data){
                console.log("---Download Successed!!!!---");
                console.log(data);
                const url = window.URL.createObjectURL(new Blob([data]));
                const link = document.createElement('a');
                link.href = url;
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                today = mm + '/' + dd + '/' + yyyy;
                link.setAttribute('download',  'data_' + today + '.csv');
                document.body.appendChild(link);
                link.click();
            }
        });
    })
    $(document).on('click','.leads-list-item', function(e) {
        $(".leads-list-item").removeClass('selected');
        $(this).addClass('selected');
    })
    $(document).on('click','.fa-angle-right', function(e) {
        var currentendPage = parseInt($(".pagination-current-end-page").html());
        var currentPage = parseInt($(".pagination-current-page").html());
        var lastPage = parseInt($(".pagination-last-page").html());
        if(currentendPage == lastPage) {
            return;
        }
        $(".pagination-current-page").html(currentPage + 20);
        $(".pagination-current-end-page").html(currentendPage + 20 > lastPage ? lastPage : currentendPage + 20);
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        $(".contact-list").addClass('contact-list-loading-placeholder');
        $(".contact-item").children().html('');
        $(".contact-item").children().addClass('linear-background');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/myleadspage',
            data: {
            'start': currentPage + 19,
            'count' : 20,
            },
            success:function(data){
                console.log("---Next Page My Leads!!!!---");
                console.log(data.result);
                $(".contact-list").removeClass('contact-list-loading-placeholder');
                $(".contact-item").remove();
                var i;
                for( i = 0; i<data.result.length;i++) {
                    var contactinfo = data.result[i].contactinfo[0];
                    $(".contact-list-wrap").append('<div class="contact-item"><div class="contact-check-box-wrap"> <div class="common-check-box "><div class="common-check-box-content"><div class="empty-check-box"></div><div class="common-check-box-svg-wrap"><svg width="16" height="14" viewBox="0 0 16 14"><path d="M2 8.5L6 12.5L14 1.5"></path></svg></div></div></div></div><div class="contact-name"><div class="name item-name">'+contactinfo.first_name+' '+contactinfo.last_name+'</div><div class="title item-title">'+contactinfo.job_title+'</div></div><div class="email item-email"><div>E: '+contactinfo.email_address+'</div><div>D: '+contactinfo.direct_phone+'</div><div>C: '+contactinfo.phone_number+'</div></div><div class="company"><div class="name item-cname">'+contactinfo.company_name+'</div><div>'+contactinfo.company_website+'</div></div><div class="address"><div class="address1 item-address1">'+contactinfo.address1+'</div><div class="address2 item-address2">'+contactinfo.address2+'</div></div><div class="industry item-industry">'+contactinfo.industries+'</div><div><div class="employees item-employees">E: '+contactinfo.employees+'</div><div class="revenue item-revenue">R: '+contactinfo.revenue+'</div></div></div>');
                }
            }
        });

    })
    $(document).on('click','.fa-angle-left', function(e) {
        var currentendPage = parseInt($(".pagination-current-end-page").html());
        var currentPage = parseInt($(".pagination-current-page").html());
        var lastPage = parseInt($(".pagination-last-page").html());
        if(currentPage == 1) {
            return;
        }
        if(currentPage < 20) {
            currentPage = 1;
            currentendPage = 20;
        } else {
            currentPage -= 20;
            currentendPage = currentPage + 19;
        }
        $(".pagination-current-page").html(currentPage);
        $(".pagination-current-end-page").html(currentendPage);
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';

        $(".contact-list").addClass('contact-list-loading-placeholder');
        $(".contact-item").children().html('');
        $(".contact-item").children().addClass('linear-background');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/myleadspage',
            data: {
            'start': currentPage - 1,
            'count' : 20,
            },
            success:function(data){
                console.log("---Next Page My Leads!!!!---");
                console.log(data.result);
                $(".contact-list").removeClass('contact-list-loading-placeholder');
                $(".contact-item").remove();
                var i;
                for( i = 0; i<data.result.length;i++) {
                    var contactinfo = data.result[i].contactinfo[0];
                    $(".contact-list-wrap").append('<div class="contact-item"><div class="contact-check-box-wrap"> <div class="common-check-box "><div class="common-check-box-content"><div class="empty-check-box"></div><div class="common-check-box-svg-wrap"><svg width="16" height="14" viewBox="0 0 16 14"><path d="M2 8.5L6 12.5L14 1.5"></path></svg></div></div></div></div><div class="contact-name"><div class="name item-name">'+contactinfo.first_name+' '+contactinfo.last_name+'</div><div class="title item-title">'+contactinfo.job_title+'</div></div><div class="email item-email"><div>E: '+contactinfo.email_address+'</div><div>D: '+contactinfo.direct_phone+'</div><div>C: '+contactinfo.phone_number+'</div></div><div class="company"><div class="name item-cname">'+contactinfo.company_name+'</div><div><a href="'+contactinfo.company_website+'" target="_blank">'+contactinfo.company_website+'</a></div></div><div class="address"><div class="address1 item-address1">'+contactinfo.address1+'</div><div class="address2 item-address2">'+contactinfo.address2+'</div></div><div class="industry item-industry">'+contactinfo.industries+'</div><div><div class="employees item-employees">E: '+contactinfo.employees+'</div><div class="revenue item-revenue">R: '+contactinfo.revenue+'</div></div></div>');
                }
            }
        });
    })

    function selectTop(count)
    {
        var i;
        $(".contact-item .common-check-box").removeClass('selected');
        for (i = 0 ;i < count ;i ++) {
            $(".contact-item .common-check-box:eq(" + i + ")").addClass('selected');
        }
        if(count > 0) {
            $("#contactSelectedCount").css("display","block");
            $("#contactSelectedCount span").html(count);
        } else {
            $("#contactSelectedCount").css("display","none");
            $("#contactSelectedCount span").html('');
        }
    }
</script>
@endsection
