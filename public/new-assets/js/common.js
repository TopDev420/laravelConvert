function loder() {
     $('#loading-root').html('<div class="build-tool-loading"><img src="'+baseurl+'/public/new-assets/images/new/download.gif"></div>');
}
function hidelodare(){
         $('#loading-root').html('');

}
/*$(document).on('click','.get-data',function(){
        $.ajax({
             headers: {
                            'X-CSRF-TOKEN': csrftoken
                        },
            type:'POST',
            url:baseurl+'/getdata',
            data: {
               'data':$(this).attr('data-id')
            },
            success: function(response){
                        $("#getCodeModal").modal("toggle");
                        // $("#getCode").html(msg);
                        console.log(response);
                        var html='';
                        details = response.details;
                        console.log(details['first_name']);
                        html +='<div class="contact-card__line"><span class="block gap-bottom font-regular text-rolling-stone text-semibold" style="margin-bottom: 24px;font-size: 16px;">Sample of Direct Contact</span><h3 class="contact-card__title">'+details['first_name']+'   '+details['last_name']+' </h3><span class="contact-card__subtitle">'+details['country']+', '+details['city']+'</span></div>'
                        console.log(html);
                        html +='<div class="contact-card__line"  ><table class="table table-popup table--secondary table--fixed"><tbody class ="noBorder"><tr><td><strong>Direct Email Contact</strong> </td><td>'+details['email_address']+'</td> </tr><tr><td><strong>Phone Number</strong></td> <td>'+details['phone_number']+'</td></tr></tbody></table></div>';
                        $('.react-modal').append(html);
            }
        });
 });*/




function companydetails(data){
    var url_detail = window.location.pathname;
    var url_detail = url_detail.split("/");
    var urlconcat = url_detail[1]+'/'+url_detail[2];
    hidelodare();
    if( $('.before-result-search').is(':visible') ) {
        $('.before-result-search').hide();
    }
    
    if($('.section-flex-tool-no-result').is(':visible') ) {//
        console.log('46');
        $('.section-flex-tool-no-result').hide();
    }
    if($('.welocmebuildlist').is(':visible') ) {//welocmebuildlist-buildlist
        console.log('46');
        $('.welocmebuildlist').hide();
    }
    $('.welocmebuildlist').hide();
    // valuget(data);
    $('#rundiv-app').hide();
    $('#result-div').show();
    $('#result-div').show();
    $('.range-of-contact').show();

    $(".search-result").show();
    $('.remove-spans').show();
    $('div.remove-all div.remove-text strong').html('Include');
    // if($('.removeBox').length<1){
    //     $('.tags').append('<button type="button" class="button button-octonary button-xsmall tags-remove-all-btn removeBox" style="display: inline-block;">Clear All Filters</button>');
    // }
    $('.table').show();

    var contact_count = data.count + '  CONTACTS';
    if(data.count>0){
        var range_of_contact=[];
        $('.samplelist-download').attr('href',baseurl+'/sampleexportfile/'+data.save_result);
        $('.filter-result-shows').hide();
        $('.search-result').show();
        $('.range-of-contact').show();
        $('.range-slider').val(data.count);
        $('#range-contact').val(data.count);

        $('.contact_count').val(data.count);
        $('.contact_count').text(contact_count);
        // $('.buycontact').val(data.count);
        // $('.buyprice').val(data.price);
        $('.savesearchid').val(data.lastid);
        var prices = '$'+data.price;
        $('.buyprice').val(data.prices);
        $('.buycontact').val(data.counts);

        contact_silder=data.count;
        $('.price-filter').text(prices)

        $('.search-result-exist').show();
        $('.contact-budget-container range-of-contact').show();  

        $( "#slider" ).slider({
            max:data.count,
            min: 0,
            classes: {
                "ui-slider": "highlight"
            },
            slide: function( event, ui ) {
                $( ".form-adjust input.form-control-adjust" ).val( ui.value );   

            },
            change: function( event, ui ) {
                var url_detail = window.location.pathname;
                var rangeofstyle = $('.ui-slider-handle').attr("style");
                // console.log(range0fstyle);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': csrftoken
                    },
                    type:'POST',
                    url:baseurl+'/rangesofcontact',
                    data: {
                        'range_of_contact':$( "input.form-control-adjust" ).val(),
                        'url_details':url_detail,
                        'ranfgeofstyle':rangeofstyle,
                    },
                    beforeSend: function() {
                        if( $('.search-result').is(':visible') ) {
                            $('.search-result').hide();
                        }
                        $('.filter-result-shows').show();
                        $('.filter-result-shows').html();
                        $('div.filter-result-shows  div.tool-top-bar-left span.default-msg-for-contacts').text('loading');
                        $('div.filter-result-shows  div.tool-top-bar-left span.tool-top-bar-notification').text('we are getting your result');
                    },
                    success: function(response){
                        $('.filter-result-shows').hide();
                        $('.search-result').show();
                        contact_range=response.count +' CONTACTS';
                        $('.contact_count').val(response.count);
                        $('.contact_count').text(contact_range);
                        $('.buycontact').val(response.count); 
                        $('.buyprice').val(response.prices);
                        $('.buycontact').val(response.counts);
                        var prices = '$'+response.price;

                        // contact_silder=response.count;
                        $('.price-filter').text(prices);
                        const state = '';
                        const title = ''
                        let url = urlconcat+'/'+response.save_result;
                        window.history.pushState(null, null, '/'+url);
                    }

                });  
            }
        });
        $('a.ui-slider-handle').removeAttr( 'style' );

    }else{
        $('.result-table').hide();
        $('.filter-result-shows').show();
        $('.search-result').hide();
        $('.range-of-contact').hide();
        $('.search-result-exist').hide();
        $('.contact-budget-container range-of-contact').hide();
        $('div.filter-result-shows  div.tool-top-bar-left span.default-msg-for-contacts').text('NO CONTACTS FOUND FOR YOUR CRITERIA');
        $('div.filter-result-shows  div.tool-top-bar-left span.tool-top-bar-notification').hide();
    }
    var html ='';
    $.each(data.result, function( index, value ) {

    // Display Email In Asterisk Pattern(*)
    var email = value["email_address"];
    var stremail = email.length;
    var str = '';
    for(var i=0; i < stremail; i++){
        if(i < 3 || i > 5 && i != (stremail-2)) {
            str += '*';
        } else {
            str += value["email_address"][i];
        }
    }
    value["email_address"] = str;

    // Display Lastname In Asterisk Pattern(*)
    var lastname = value["last_name"];
    var strlastnm = lastname.length;
    var str2 = '';
    for(var j=0; j < strlastnm; j++){
        if(j < 3 || j > 5 && j != (strlastnm-2)){
            str2 += '*';
        }else{
            str2 += value["last_name"][j];
        }
    }
    value["last_name"] = str2;

    // Display Company Name In Asterisk Pattern(*)
    var cmpyname = value["company_name"];
    var strcmpynm = cmpyname.length;
    var str3 = '';
    for(var k=0; k < strcmpynm; k++){
        if(k < 3 || k > 5 && k != (strcmpynm-2)){
            str3 += '*';
        }else{
            str3 += value["company_name"][k];
        }
    }
    value["company_name"] = str3;

    //  // Display Ph Number In Asterisk Pattern(*)
    // var phone_number = value["phone_number"];
    // var strcmpynm = phone_number.length;
    // var str3 = '';
    // for(var k=0; k < strcmpynm; k++){
    //     if(k < 3 || k > 5 && k != (strcmpynm-2)){
    //         str3 += '*';
    //     }else{
    //         str3 += value["phone_number"][k];
    //     }
    // }
    // value["phone_number"] = str3;

    html += '<tr class="get-data" data-id = "'+value["id"]+'">'+
    '<input type="hidden" class="serchdata" value="'+value["id"]+'">'+
    '<td>'+str+'</td>'+
    '<td>'+str2+'</td>'+
    '<td>'+value["phone_number"]+'</td>'+
    '<td>'+value["job_title"]+'</td>'+
    '<td>'+value["country"]+'<br>'+value["city"]+
    '</td></tr>';
    });
    if (html) {
        if($('.remove-spans-exist').length>0){
            $('.remove-spans-exist').remove();
        }
        if($('.result-table-exist').length>0){
            $('.result-table-exist').remove();
        }
        $('.result-search').show();
        $('.remove-spans').show();
        $('.result-table').show();
        

    $('.result-search').html(html);

    }else{ 
        if($('.remove-spans-exist').length>0){
            $('.remove-spans-exist').remove();
        }
        if($('.result-table-exist').length>0){
            $('.result-table-exist').remove();
        }
        $('.result-search').hide();
        $('.remove-spans').hide();
        $('.remove-spans').hide();
        $('#rundiv-app').show();
        $('#rundiv-app').html('<div class="shadow-primary section-flex section-flex-tool-no-result section-flex-tool-no-result-no-data-found  "> <div class="full-width section-flex-container"><div class="section-flex-inner"><div class="row"> <div class="col-sm-8 col-sm-offset-2"><div><h3 class="primary-title clear-gap-top gap-bottom-small">NO RESULTS FOUND</h3><p class="gap-bottom-medium">Please expand your selections by using filters on the left side.</p> </div></div></div> </div> </div></div>');
    
    }
    const state = '';
    const title = ''
    let url = urlconcat+'/'+data.save_result;
    window.history.pushState(null, null, '/'+url);
}


function removealltypeattr(val){
    var opendivname = $('#'+val).attr('data-box');
    $('div #' +opendivname  +' button[data-id="include"').removeClass('is-include-check');
    $('div #' +opendivname  +' button[data-id="Exclude"').removeClass('is-include-check');
    checkdatatype= $('div #' +opendivname  +' input[type=checkbox]').attr('data-type');
    $('div #' +opendivname  +' input[type=checkbox]').removeAttr('data-type','Exculde');
    $('div #' +opendivname  +' input[type=checkbox]').removeAttr('data-type','include');
    $('div #' +opendivname  +' button[data-id="include"').addClass('include');
    $('div #' +opendivname  +' button[data-id="Exclude"').addClass('exclude');
}


$(document).on('click','.hide-show-divs',function() {
       // $('#'+$('#showdivid').val()).hide();
       $('#'+$('#showdivid').val()).css("display", "none"); 
       $('#'+$('#showdivid').val()).addClass('divshows');
      
});

$(document).find(".citysearch").on("keyup",function(){ 
    var baseurl = window.location.origin;
    var city = $(this).val();
    
    if(city != undefined){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:baseurl+'/citysearch',
            data: {
               'city': city,
            },
            success: function(response){
                var html = '';
                if(response.cities.length > 0){
                    $.each(response.cities,function(k,v){
                        html += '<li class="c-choice-tree-item"><div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox"><input class="custom-checkbox-inp filter_result" value="'+v.name+'" type="checkbox" id="'+v.name+'" name="city" data-id="city" new-data="'+v.name+'" data-type="include"><label for="'+v.name+'" class="custom-checkbox-mask"></label></div><label for="'+v.name+'" class="c-choice-tree-label">'+v.name+'</label></li>';
                    });
                } else {
                    html += 'There is no result for this keyword';
                }
                $(document).find(".citylist").html('');
                $(document).find(".citylist").html(html);
            }
        });
    }
});

$(document).find(".inductrysearch").on("keyup",function(){ 
    var baseurl = window.location.origin;
    var industry = $(this).val();

    if(industry != undefined){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:baseurl+'/industrysearch',
            data: {
               'industry': industry,
            },
            success: function(response){
                var html = '';
                if(response.industries.length > 0){
                	$.each(response.industries,function(k,v){
                		html += '<li class="c-choice-tree-item"><div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox"><input class="custom-checkbox-inp filter_result" value="'+v.name+'" type="checkbox" id="'+v.name+'" name="industry" data-id="industry" new-data="'+v.name+'" data-type="include"><label for="'+v.name+'" class="custom-checkbox-mask"></label></div><label for="'+v.name+'" class="c-choice-tree-label">'+v.name+'</label></li>';
                	});
                } else {
                    html += 'There is no result for this keyword';
                }
                $(document).find(".industrylist").html('');
                $(document).find(".industrylist").html(html);
            }
        });
    }
});

$(document).find(".joblevelsearch").on("keyup",function(){ 
    var baseurl = window.location.origin;
    var joblevel = $(this).val();
    //alert(joblevel);
    if(joblevel != undefined){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:baseurl+'/joblevelsearch',
            data: {
               'joblevel': joblevel,
            },
            success: function(response){
                console.log(response)
                var html = '';
                if(response.joblevels.length > 0){
                	$.each(response.joblevels,function(k,v){
                        console.log(v);
                        var customCls = '';
                        var btnHtml = '';
                        if(v.parent.length > 0){
                            console.log(v.child.length);
                            if(v.child.length > 0 && joblevel != ''){
                                customCls = "is-expanded";
                                btnHtml = '<button class="c-choice-tree-toggle-btn '+customCls+'" type="button"></button>';
                            } else if(v.child.length > 0 && joblevel == '') {
                                btnHtml = '<button class="c-choice-tree-toggle-btn" type="button"></button>';
                            }
                           // alert(customCls);
                            html += '<li class="c-choice-tree-item"><div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox"><input class="custom-checkbox-inp filter_result checkval" value="'+v.parent+'" type="checkbox" id="'+v.parent+'" name="joblevels" new-data="'+v.parent+'" data-id="joblevels" is-parent="parent"><label for="'+v.parent+'" class="custom-checkbox-mask"></label></div>'+btnHtml+'<label for="'+v.parent+'" class="c-choice-tree-label">'+v.parent+'</label>';
                            if(v.child.length > 0){
                                html += '<ul class="c-choice-tree c-choice-tree-sub '+customCls+'">';
                                $.each(v.child,function(i,j){
                                    html += '<li class="c-choice-tree-item"><div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox"><input class="custom-checkbox-inp filter_result checkval" value="'+j+'" type="checkbox" id="'+j+'" name="joblevels" data-id="joblevels" data-id-parent="'+v.parent+'" new-data="'+v.parent+'/'+j+'" is-parent="child"><label for="'+j+'" class="custom-checkbox-mask"></label></div><label for="'+j+'" class="c-choice-tree-label">'+j+'</label></li>';
                                });
                                html += '</ul>';
                            }

                            html += '</li>';
                         }
                	});
                } else {
                    html += 'There is no result for this keyword';
                }

                $(document).find(".jovlevellist").html('');
                $(document).find(".jovlevellist").html(html);
            }
        });
    }
});

$(document).find(".jobfunctionsearch").on("keyup",function(){ 
    var baseurl = window.location.origin;
    var jobfunction = $(this).val();
    var level =  $('input[type=checkbox][data-id=joblevels]:checked').val();
    //alert(jobfunction);
    if(jobfunction != undefined){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:baseurl+'/jobfunctionsearch',
            data: {
               'jobfunction': jobfunction,
               'level': level,
            },
            success: function(response){
            	console.log(response)
                var html = '';
                if(response.jobfunctions.length > 0){
                    $.each(response.jobfunctions,function(k,v){
                        console.log(v);
                        var customCls = '';
                        var btnHtml = '';
                        if(v.parent.length > 0){
                            console.log(v.child.length);
                            if(v.child.length > 0 && jobfunction != ''){
                                customCls = "is-expanded";
                                btnHtml = '<button class="c-choice-tree-toggle-btn '+customCls+'" type="button"></button>';
                            } else if(v.child.length > 0 && jobfunction == '') {
                                btnHtml = '<button class="c-choice-tree-toggle-btn" type="button"></button>';
                            }
                           // alert(customCls);
                            html += '<li class="c-choice-tree-item list-titles"  list-level="'+v.level+'"><div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox"><input class="custom-checkbox-inp filter_result checkval" value="'+v.parent+'" type="checkbox" id="'+v.parent+'" name="Jobfunctions" new-data="'+v.parent+'" data-id="Jobfunctions" is-parent="parent"><label for="'+v.parent+'" class="custom-checkbox-mask"></label></div>'+btnHtml+'<label for="'+v.parent+'" class="c-choice-tree-label">'+v.parent+'</label>';
                            if(v.child.length > 0){
                                html += '<ul class="c-choice-tree c-choice-tree-sub '+customCls+'">';
                                $.each(v.child,function(i,j){
                                    html += '<li class="c-choice-tree-item"><div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox"><input class="custom-checkbox-inp filter_result checkval" value="'+j+'" type="checkbox" id="'+j+'" name="Jobfunctions" data-id="Jobfunctions" data-id-parent="'+v.parent+'" new-data="'+v.parent+'/'+j+'" is-parent="child"><label for="'+j+'" class="custom-checkbox-mask"></label></div><label for="'+j+'" class="c-choice-tree-label">'+j+'</label></li>';
                                });
                                html += '</ul>';
                            }

                            html += '</li>';
                         }
                    });
                } else {
                    html += 'There is no result for this keyword';
                }

                $(document).find(".jobfunctionlist").html('');
                $(document).find(".jobfunctionlist").html(html);
            }
        });
    }
});
//Start Search for Company Business Ownership
$(document).find(".ownershipsearch").on("keyup",function(){ 
    var baseurl = window.location.origin;
    var ownership = $(this).val();
    if(ownership != undefined){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:baseurl+'/ownershipsearch',
            data: {
               'ownership': ownership,
            },
            success: function(response){
                var html = '';
                if(response.ownerships.length > 0){
                	$.each(response.ownerships,function(k,v){
                		html += '<li class="c-choice-tree-item"><div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox"><input class="custom-checkbox-inp filter_result" value="'+v.name+'" type="checkbox" id="'+v.name+'" name="ownership" data-id="ownership" new-data="'+v.name+'" data-type="include"><label for="'+v.name+'" class="custom-checkbox-mask"></label></div><label for="'+v.name+'" class="c-choice-tree-label">'+v.name+'</label></li>';
                	});
                } else {
                    html += 'There is no result for this keyword';
                }
                $(document).find(".ownershiplist").html('');
                $(document).find(".ownershiplist").html(html);
            }
        });
    }
});
//End Search for Company Business Ownership
//Start Search for State
$(document).find(".stateSearch").on("keyup",function(){
    var baseurl = window.location.origin;
    var state = $(this).val();
    if(state != undefined){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:baseurl+'/statesearch',
            data: {
               'state': state,
            },
            success: function(response){
                var html = '';
                if(response.state.length > 0){
                	$.each(response.state,function(k,v){
                		html += '<li class="c-choice-tree-item"><div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox"><input class="custom-checkbox-inp filter_result" value="'+v.code+'" type="checkbox" id="'+v.name+'" name="state" data-id="state"><label for="'+v.name+'" class="custom-checkbox-mask"></label></div><label for="'+v.name+'" class="c-choice-tree-label">'+v.name+' - '+v.code+'</label></li>';
                	});
                } else {
                    html += 'There is no result for this keyword';
                }
                $(document).find(".statelist").html('');
                $(document).find(".statelist").html(html);
            }
        });
    }
});
//End Search for State
//Start Search for Company Business Model
$(document).find(".businesssearch").on("keyup",function(){ 
    var baseurl = window.location.origin;
    var business = $(this).val();
    if(business != undefined){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:baseurl+'/businesssearch',
            data: {
               'business': business,
            },
            success: function(response){
                var html = '';
                if(response.businesses.length > 0){
                	$.each(response.businesses,function(k,v){
                		html += '<li class="c-choice-tree-item"><div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox"><input class="custom-checkbox-inp filter_result" value="'+v.name+'" type="checkbox" id="'+v.name+'" name="business" data-id="business" new-data="'+v.name+'" data-type="include"><label for="'+v.name+'" class="custom-checkbox-mask"></label></div><label for="'+v.name+'" class="c-choice-tree-label">'+v.name+'</label></li>';
                	});
                } else {
                    html += 'There is no result for this keyword';
                }
                $(document).find(".businesslist").html('');
                $(document).find(".businesslist").html(html);
            }
        });
    }
});
//End Search for Company Business Model
//Start Search for Company YearFounded
$(document).find(".yearfoundedsearch").on("keyup",function(){ 
    var baseurl = window.location.origin;
    var yearfounded = $(this).val();
    if(yearfounded != undefined){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:baseurl+'/yearfoundedsearch',
            data: {
               'yearfounded': yearfounded,
            },
            success: function(response){
                var html = '';
                if(response.yearfoundeds.length > 0){
                	$.each(response.yearfoundeds,function(k,v){
                		html += '<li class="c-choice-tree-item"><div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox"><input class="custom-checkbox-inp filter_result" value="'+v.name+'" type="checkbox" id="'+v.name+'" name="yearfounded" data-id="yearfounded" new-data="'+v.name+'" data-type="include"><label for="'+v.name+'" class="custom-checkbox-mask"></label></div><label for="'+v.name+'" class="c-choice-tree-label">'+v.name+'</label></li>';
                	});
                } else {
                    html += 'There is no result for this keyword';
                }
                $(document).find(".yearfoundedlist").html('');
                $(document).find(".yearfoundedlist").html(html);
            }
        });
    }
});
//End Search for Company YearFounded
