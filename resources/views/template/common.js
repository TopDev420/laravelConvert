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
    if($('.removeBox').length<1){
        $('.tags').append('<button type="button" class="button button-octonary button-xsmall tags-remove-all-btn removeBox" style="display: inline-block;">Clear All Filters</button>');
    }
    $('.table').show();

    var contact_count = data.count + '  CONTACTS';
    if(data.count>0){
        var range_of_contact=[];
        $('.filter-result-shows').hide();
        $('.search-result').show();
        $('.range-of-contact').show();
        $('.range-slider').val(data.count);

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

    html += '<tr class="get-data" data-id = "'+value["id"]+'">'+
    '<input type="hidden" class="serchdata" value="'+value["id"]+'">'+
    '<td>'+str+'</td>'+
    '<td>'+str2+'</td>'+
    '<td>'+str3+'</td>'+
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

function validation(types){
     console.log(types);
    var zipcodes=[];
    var data = {};
    var state = [];
    var industries = [];
    var city = [];
    var company = [];
    var joblevels= [];
    var job_funtion = [];
    var countries =[];
    var job_fun =[];
    var joblevelarray = [];
    var industriesexclude      =[];
    var stateexclude      =[];
    var cityexclude      =[];
    var companyexclude      =[];
    var zipcodeexclude      =[];
    var joblevelsexclude      =[];
    var job_funtionexclude      =[];

    var range={};
    var zipcode = [];
    var filter = '';
    var filter1='';
    var filter_commy1='';
    var count ='';
    var state_count = '';
    var city_count = '';
    var joblevels_counts = '';
    var job_funtion_count = '';
    var zipcode_count = '';
    var company_count = '';
    var zipcode_count = '';
    var filter2=company_filter=filter_company='';
    var filter3=countryhtml='';
    var flag = 1;
    var url_details = window.location.pathname;

    // var url_details = window.location.pathname;
    var type = $('#type_filter').val();
    $('#'+type+'_number').css("z-index", "99999"); 
    //$('.selected_value .'+ type).html('');
    // console.log($(this).data('id'));
     var opendivname = $('#showdivid').val();
    $('div #' +opendivname  +' button[data-id="Exclude"').addClass('is-include-check');
            $('div #' +opendivname  +' button[data-id="Exclude"').removeClass('include');
        // console.log($('div #' +opendivname  +' input[type=checkbox]').attr('data-type'));
        checkdatatype= $('div #' +opendivname  +' input[type=checkbox]').attr('data-type');
        if(checkdatatype==null){
            $('div #' +opendivname  +' input[type=checkbox]').attr('data-type','include');
        }
        
        //$('div #' +opendivname  +' button[data-id="Exculde"').removeClass('Exculde');
    $('.filter_result:checked').each(function(){
        var incld_value = $(this).val();
        typee = $(this).attr('data-id');
        secrhtype = $(this).attr('data-type') ;

        if (/*type =='industry' && */ $(this).val() && typee == 'industry' && secrhtype=='include') {
            filter = filter+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry">'+'industry: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }

        if (type =='industry' &&  $(this).val() && typee == 'industry'  && secrhtype=='include') {
            filter1 = filter1+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }


        if (type =='country' &&  $(this).val() && typee == 'country'  && secrhtype=='include') {
        //data['country'] = $(this).val();
            $('.loca-tion').show();
        }
        if (/*type =='country' &&*/  $(this).val() && typee == 'country' && secrhtype=='include') {
        //data['country'] = $(this).val();
            $('.loca-tion').show();
        }
        if (/*type =='state' &&*/ $(this).val() && typee == 'state' && secrhtype=='include') {
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state">'+'State: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }  
        if (type =='state' && $(this).val() && typee == 'state' && secrhtype=='include') {
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state"><span class="text-success">include</span>   '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }

        if (/*type =='city' &&*/ $(this).val() && typee == 'city' && secrhtype=='include') {
            var datas = '';
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city">'+'City: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }   
        if (type =='city' && $(this).val() && typee == 'city'  && secrhtype=='include') {
            var datas = '';
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }

        if (/*type =='city' &&*/ $(this).val() && typee == 'joblevels' && secrhtype=='include') {
            joblevelarray.push({
                link :  $(this).attr('is-parent'), 
                value:  $(this).val(),
                parentvalue : $(this).attr('data-id-parent')
            });
        }   
        if (/*type =='city' &&*/ $(this).val() && typee == 'Jobfunctions' && secrhtype=='include') {
            isparent = parseInt($(this).attr('is-parent'));
            job_fun.push({
                link :  $(this).attr('is-parent'), 
                value:  $(this).val(),
                parentvalue : $(this).attr('data-id-parent')
            });
            var datas = '';
        }   

    });
    var parent_joblevel=[];
    var child_jooblevel=[];
    jQuery.each(joblevelarray, function(index, value) {
        if(value.link==='parent'){
                parent_joblevel.push({
                value:value.value
            });
        }else{
            child_jooblevel.push({
                value:value.value,
                parentvalue:value.parentvalue
            });  
        }
    });
    jQuery.each(parent_joblevel, function(index1, value1) {
        var parentval = value1.value;
        jQuery.each(child_jooblevel, function(index2, value2) {
            if(value2== null){

            } else { 
                var childval =  value2.parentvalue;
                if(value1.value===childval){
                    delete child_jooblevel[index2];
                } 
            }    
        });
    });
    if(parent_joblevel.length>0 && type == 'joblevels'){
        jQuery.each(parent_joblevel, function(index, value) {
            filter  = filter+'<li class="filter-save-data" new-data="'+value.value+'" data-id="joblevels">'+'joblevels: '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
           filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="joblevels"><span class="text-success">include</span>  '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        });
    }else{
        jQuery.each(parent_joblevel, function(index, value) {
            filter  = filter+'<li class="filter-save-data" new-data="'+value.value+'" data-id="joblevels">'+'joblevels: '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
           //filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="joblevels"><span class="text-success">include</span>  '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        });
    } 
    if(child_jooblevel.length>0 && type == 'joblevels' ){
        jQuery.each(child_jooblevel, function(index, value) {
            if(value== null){

            } else { 
                filter  = filter+'<li class="filter-save-data" new-data="'+value.parentvalue+'/'+value.value+'" data-id="joblevels">'+'joblevels: '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.parentvalue+'/'+value.value+'" data-id="joblevels"><span class="text-success">include</span>  '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            } 

        });
    }else{
        jQuery.each(child_jooblevel, function(index, value) {
            if(value== null){

            } else { 
                filter  = filter+'<li class="filter-save-data" new-data="'+value.parentvalue+'/'+value.value+'" data-id="joblevels">'+'joblevels: '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
                //filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.parentvalue+'/'+value.value+'" data-id="joblevels"><span class="text-success">include</span>  '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            } 

        });
    }
    var parent_job = [];
    var child_job  =[];
    jQuery.each(job_fun, function(index, value) {
        if(value.link==='parent'){
            parent_job.push({
                value:value.value
            });
        }else{
            child_job.push({
                value:value.value,
                parentvalue:value.parentvalue
            });  
        }
    });
    jQuery.each(parent_job, function(index1, value1) {
        var parentval = value1.value;
        jQuery.each(child_job, function(index2, value2) {
            if(value2== null){

            } else { 
                var childval =  value2.parentvalue;
                if(value1.value===childval){
                    delete child_job[index2];
                } 
            }    
        });
    });
    if(parent_job.length>0 && type=='Jobfunctions'){
        jQuery.each(parent_job, function(index, value) {
            filter  = filter+'<li class="filter-save-data" new-data="'+value.value+'" data-id="Jobfunctions">'+'Jobfunctions: '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="Jobfunctions"><span class="text-success">include</span>  '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        });
    } else{
        jQuery.each(parent_job, function(index, value) {
            filter  = filter+'<li class="filter-save-data" new-data="'+value.value+'" data-id="Jobfunctions">'+'Jobfunctions: '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            //filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="Jobfunctions"><span class="text-success">include</span>  '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        });
    }
    if(child_job.length>0 && type=='Jobfunctions'){
        jQuery.each(child_job, function(index, value) {
            if(value== null){

            } else { 
                filter  = filter+'<li class="filter-save-data" new-data="'+value.parentvalue+'/'+value.value+'" data-id="Jobfunctions">'+'Jobfunctions: '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.parentvalue+'/'+value.value+'" data-id="Jobfunctions"><span class="text-success">include</span>  '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            } 

        });
    }else{
             jQuery.each(child_job, function(index, value) {
            if(value== null){

            } else { 
                filter  = filter+'<li class="filter-save-data" new-data="'+value.parentvalue+'/'+value.value+'" data-id="Jobfunctions">'+'Jobfunctions: '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
                //filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.parentvalue+'/'+value.value+'" data-id="Jobfunctions"><span class="text-success">include</span>  '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            } 

        });
    }
    var coun_contry = 0;
    if(type=='country'){
        $('#div_country   ul.c-choice-tree li  input[type=checkbox]:checked').each(function(){
            type12 = $(this).attr('data-id');
            cont_value = $(this).attr('new-data');
            coun_contry++;
            $('.tag').remove();
            filter =filter+'<span class="tag-first tag" new-data="'+cont_value+'" data-id="country">Country: '+cont_value+'<button type="button" class="tag-remove removefiles"></button> </span>';
            countryhtml=countryhtml+'<li class="c-filter-selected-list-item">  <span  class="gap-right-small text-success">include</span><span class="gap-right"  new-data='+cont_value+' data-id='+type12+'>'+cont_value+'</span><button class="button button-only-icon u-gap-left-auto link-quaternary"  type="button"><i class="icon icon-clear font-regular block removefiles"  aria-hidden="true"></i><span  class="visually-hidden">Remove</span></button></li>';
        });
        if(countryhtml!=''){
            $('.selected_value .'+ type12).html('');
            $('.selected_value .'+ type12).html(countryhtml);
        }

    }

    var zipcod = $('.zipcod').val();
    if(zipcod !=''){
        zipcodes.push(zipcod);
    //$('.zipcod').val("");

    }
    if(zipcodes.length > 0 && type=='zipcode') {
        $.each(zipcodes,function(index,value){
            if(value== null){
            }else{
                filter = filter+'<li class="filter-save-datav loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times " ></button></li>';
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });

    }else{

        $.each(zipcodes,function(index,value){
            if(value== null){
            }else{
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });
    }

    var company_name = $('.comny').val();
    if(company_name!='') {
    companies.push(company_name);
    $('.comny').val("");

    }
    if(companies.length > 0 && type=='company'  ) {
        $.each(companies,function(index,value){
            if(value== null){
            }else{
                filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times loca-tion" ></button></li>';
                filter1 = filter1+'<li class="filter-save-data" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }   
        });

    }else{
        $.each(companies,function(index,value){
            if(value== null){
            }else{
                filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });
    }
    //console.log(companies.length);
    var ranges  =[];
    $('.range').each(function(){
        var typeran = $(this).attr('id');
        if (typeran =='first_range' && $(this).val()) {
            range['first_range'] = parseInt($(this).val());
            if(range['first_range']>999 && range['first_range']<99999){console.log('517');
                ranges['first_range'] = parseFloat(range['first_range']/1000).toFixed(2);
                ranges['first_range']=ranges['first_range']+'k';
            }else if( range['first_range']>99999 && range['first_range']<999999){
                ranges['first_range'] = parseFloat(range['first_range']/100000).toFixed(2);
                ranges['first_range']=ranges['first_range']+'M';
            }else if( range['first_range']>999999 && range['first_range']<99999999){
                ranges['first_range'] = parseFloat(range['first_range']/10000000).toFixed(2);
                ranges['first_range']=1+'M';
            }
            else{
                ranges['first_range']=range['first_range'];
            }
        }
        if (typeran =='second_range' && $(this).val()) {
            range['second_range'] = parseInt($(this).val());
            if(range['second_range']>999 && range['second_range']<99999){console.log('517');
                ranges['second_range'] = parseFloat(range['second_range']/1000).toFixed(2);
                ranges['second_range']=ranges['second_range']+'k';
            }else if( range['second_range']>99999 && range['second_range']<999999){
                ranges['second_range'] = parseFloat(range['second_range']/100000).toFixed(2);
                ranges['second_range']=ranges['second_range']+'M';
            }else if( range['second_range']>999999 && range['second_range']<99999999){
                ranges['second_range'] = parseFloat(range['second_range']/10000000).toFixed(2);
                ranges['second_range']=1+'M';
            }
            else{
                ranges['second_range']=range['second_range'];
            }
        }
        if (typeran =='first_revenue' && $(this).val()) {
            range['first_revenue'] = parseInt($(this).val());
            if(range['first_revenue']>999 && range['first_revenue']<99999){console.log('517');
                ranges['first_revenue'] = parseFloat(range['first_revenue']/1000).toFixed(2);
                ranges['first_revenue']=ranges['first_revenue']+'k';
            }else if( range['first_revenue']>99999 && range['first_revenue']<999999){
                ranges['first_revenue'] = parseFloat(range['first_revenue']/100000).toFixed(2);
                ranges['first_revenue']=ranges['first_revenue']+'M';
            }else if( range['first_revenue']>999999 && range['first_revenue']<99999999){
                ranges['first_revenue'] = parseFloat(range['first_revenue']/10000000).toFixed(2);
                ranges['first_revenue']=1+'B';
            }
            else{
                ranges['first_revenue']=range['first_revenue'];
            }
        }
        if (typeran =='second_revenue' && $(this).val()) {
            range['second_revenue'] = parseInt($(this).val());
            if(range['second_revenue']>999 && range['second_revenue']<99999){console.log('517');
                ranges['second_revenue'] = parseFloat(range['second_revenue']/1000).toFixed(2);
                ranges['second_revenue']=ranges['second_revenue']+'k';
            }else if( range['second_revenue']>99999 && range['second_revenue']<999999){
                ranges['second_revenue'] = parseFloat(range['second_revenue']/100000).toFixed(2);
                ranges['second_revenue']=ranges['second_revenue']+'M';
            }else if( range['second_revenue']>999999 && range['second_revenue']<99999999){
                ranges['second_revenue'] = parseFloat(range['second_revenue']/10000000).toFixed(2);
                ranges['second_revenue']=1+'1B';
            }
            else{
                ranges['second_revenue']=range['second_revenue'];
            }
        }
    });
    // ranges = range;
    console.log(ranges);
    console.log(range);


    if(types=='employee' || types==='revenue'  || range['first_range'] != '' || range['second_range'] != '' || range['first_revenue'] != '' || range['second_revenue'] != '' ){
         var flag_range=1;
         var flag_emprange=1;
    }
    if(range['first_range']>range['second_range']  ||  range['first_revenue']>range['second_revenue']){
        
        
        $('.all_selected_value li').each(function() {
            if($(this).attr('data-id')=='Employee') {
                filter += '<li class="filter-save-data loca-tion" new-data="'+$(this).attr('new-data')+'" data-id="Employee" >'+$(this).html()+'</li>';
                flag_range=0;
            }
            if($(this).attr('data-id')=='Revenue') {
                filter += '<li class="filter-save-data loca-tion" new-data="'+$(this).attr('new-data')+'" data-id="Revenue" >'+$(this).html()+'</li>';
                flag_range=0;
            }
        });

        if(types==='employee' ||  types==='revenue') {
            flag_range=0;
            flag=0;
            $('.addmessage').html('MINUMUM VALUE CANNOT BE GREATER THAN MAXIMUM VALUE');

            $('.aleart-login').addClass('active');
            setTimeout(function()
            {
            $( ".aleart-login" ).removeClass('active');

            }, 1000); 
        }       
    }
    // if(types==null){
    //     $('.all_selected_value li').each(function() {
    //         if($(this).attr('data-id')=='Employee' ) {
    //             console.log();
    //             existemprange = $(this).attr('new-data');
    //            // if(existemprange==''){
    //                 //var existemprange = existemprange.split("-");
    //                 //$('#first_range').val(existemprange[0]);
    //                 //$('#second_range').val(existemprange[1]);
    //            // }
    //            // flag_range=0;
    //         }
    //         if($(this).attr('data-id')=='Revenue') {
                
    //             existrevrange = $(this).attr('new-data');
             
    //         }
    //         if(existemprange!=''){
    //             console.log('636');
    //         }
    //     });

    // }

    // if( (range['first_range']>1000 &&  range['first_range']<1000000 ) || ( range['second_range']>1000 &&  range['second_range']<1000000 )) {
    //     if(range['first_range']!=''){
    //         range['first_range'] = parseFloat(range['first_range']/1000).toFixed(2);
    //         range['first_range']=range['first_range']+'k';

    //     }
    //     if(range['second_range']!=''){
    //         range['second_range'] = parseFloat(range['second_range']/1000).toFixed(2);
    //         range['second_range']=range['second_range']+'k';

    //     }
    //     //parseFloat("3.14");

    // }
    // console.log(flag_range);
    if(range['first_range'] != null && range['second_range'] !=null && flag_range==1   ){
        filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range['first_range']+'-'+range['second_range']+'" data-id="Employee" > Employee: '+range['first_range']+'-'+range['second_range']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    }else if(range['first_range'] != null && range['second_range']==null && flag_range==1 ){
        filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range['first_range']+'-'+'1B'+'" data-id="Employee" > Employee: '+range.first_range+'-'+'1B'+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    }else if(range['first_range'] == null && range['second_range'] !=null && flag_range==1){
        filter = filter+'<li class="filter-save-data loca-tion"  data-id="Employee" > Employee: '+'0'+'-'+range['second_range']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    }


    if(range['first_revenue'] != null && range['second_revenue'] !=null  && flag_range==1){
        filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range['first_revenue']+'-'+range['second_revenue']+'" data-id="Revenue" > Revenue: '+range['first_revenue']+'-'+range['second_revenue']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    }else if(range['first_revenue'] != null && range['second_revenue']==null  && flag_range==1){
        filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range['first_revenue']+'-'+'1B'+'" data-id="Revenue" > Revenue: '+range['first_revenue']+'-'+'1B'+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    }else if(range['first_revenue'] == null && range['second_revenue'] !=null  && flag_range==1) {
        filter = filter+'<li class="filter-save-data loca-tion"  data-id="Revenue" > Revenue: '+'0'+'-'+range['second_revenue']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    }

    if($('.job-level-value-exist span.all_selected_value').length>0){
        $('.job-level-value-exist span.all_selected_value').remove();
    }
    if(filter != '') {
        $('.all_selected_value').html('');
        $('.all_selected_value').html(filter);

    }
     
    if(filter1 !=''  && type!=''){
        $('.selected_value .'+ type).html(''); 
        $('.selected_value .'+ type).append(filter1); 
    }
   
    $('.all_selected_value li').each(function(){
        var category = $(this).attr('data-id');
        if(category=='industry'){
            industries.push($(this).attr('new-data'));
        }else if(category=='state'){
            state.push($(this).attr('new-data'));
        }else if(category=='city'){
            city.push($(this).attr('new-data'));
        }else if(category=='company'){
            company.push($(this).attr('new-data'));
        }else if(category=='zipcode'){
            zipcode.push($(this).attr('new-data'));
        }else if(category=='joblevels'){
            joblevels.push($(this).attr('new-data'));
        }else if(category=='Jobfunctions'){
            job_funtion.push($(this).attr('new-data'));
        }

    });
    $('.all_selected_value_exclude li').each(function(){
        var category = $(this).attr('data-id');
        if(category=='industry'){
            industriesexclude.push($(this).attr('new-data'));
        }else if(category=='state'){
            stateexclude.push($(this).attr('new-data'));
        }else if(category=='city'){
            cityexclude.push($(this).attr('new-data'));
        }else if(category=='company'){
            companyexclude.push($(this).attr('new-data'));
        }else if(category=='zipcode'){
            zipcodeexclude.push($(this).attr('new-data'));
        }else if(category=='joblevels'){
            joblevelsexclude.push($(this).attr('new-data'));
        }else if(category=='Jobfunctions'){
            job_funtionexclude.push($(this).attr('new-data'));
        }

    });
      if(industriesexclude!=''){
        data['industries_exclude']=industriesexclude;
    }
    
    if(stateexclude!=''){
        data['state_exclude'] = stateexclude;
    }
    if(companyexclude !=''){
        data['company_name_exclude'] = companyexclude;
    }
    if(cityexclude!=''){
        data['city_exclude'] = city;
    }
    if(zipcodeexclude!=''){
        data['zipcode_exclude'] = zipcodeexclude;
    }
    if(joblevelsexclude != ''){
        data['job_level_exclude']=joblevelsexclude;
    }
    if(job_funtionexclude != ''){
        data['job_function_exclude']=job_funtionexclude;
    }

    $('.tag').each(function() {
        var category = $(this).attr('data-id');
        var country = $(this).attr('new-data');
        if(category=='country'){
            countries.push($(this).attr('new-data'));
        }
    });
    Jobfunctions_count = job_funtion.length;
    if(Jobfunctions_count>0){
        $('.Jobfunctions_count').html("There is "+ Jobfunctions_count +" Selected item"); 
        $('#Jobfunctions_number').show();
        $('#Jobfunctions_number').html(Jobfunctions_count);
    }

    joblevels_counts = joblevels.length;
    if(joblevels_counts>0){
        $('.joblevels_count').html("There is "+ joblevels_counts +" Selected item"); 
        $('#joblevels_number').show();
        $('#joblevels_number').html(joblevels_counts);
    }
    count = industries.length;
    if(count>0){
        $('.industry_count').html("There is "+ count +" Selected item"); 
        $('#industry_number').show();
        $('#'+type+'_number').html(count); 
    }
    state_count=state.length;
    if(state_count>0){
        $('.state_count').html("There is "+ state_count +" Selected item"); 
        $('#state_number').show();
        $('#state_number').html(state_count); 
    }
    city_count = city.length;
    if(city_count>0){
        $('.city_count').html("There is "+ city_count +" Selected item"); 
        $('#city_number').show(); 
        $('#city_number').html(city_count); 
    }
    company_count=companies.length;
    if(company_count>0){
    // company_count
        $('.company_count').html("There is "+ company_count +" Selected item"); 
        $('#company_number').show();
        $('#company_number').html(company_count);
    }
    zipcode_count =zipcode.length;
    if(zipcode_count>0){
    // company_count
        $('.zipcode_count').html("There is "+ zipcode_count +" Selected item"); 
        $('#zipcode_number').html(zipcode_count);
    }
    if(coun_contry>0){
            $('#remove-country').show();
            $('.industry_count').html("There is "+ coun_contry +" Selected item"); 
            $('#remove-country').html(coun_contry); 
    }
    if(industries!=''){
        data['industries'] = industries;
    }
    if(state!=''){
        data['state'] = state;
    }
    if(company !=''){
        data['company_name'] = company;
    }
    if(city!=''){
        data['city'] = city;
    }
    if(zipcode!=''){
        data['zipcode'] = zipcode;
    }
    if(joblevels != ''){
        data['job_level']=joblevels;
    }
    if(job_funtion != ''){
        data['job_function']=job_funtion;
    }
    if(countries != ''){
        data['country'] = countries;
    }
    if(url_detail !=''){
        data['url_details']=url_details;
    }
    console.log(flag);
    console.log('1680');
    if(flag ==1 ){

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/demofilter',
            data: {
            'data': data,
            'range':range,
            },
            beforeSend: function() {
            // setting a timeout
            // $(placeholder).addClass('loading');
                if( $('.search-result').is(':visible') ) {
                    $('.search-result').hide();
                }
                if( $('.range-of-contact').is(':visible') ) {
                    $('.range-of-contact').hide();
                }
                if( $('.search-result-exist').is(':visible') ) {
                    $('.search-result-exist').remove();
                }
                if( $('.range-of-contact-exist').is(':visible') ) {
                    $('.range-of-contact-exist').remove();
                }
                if( $('.before-result-search').is(':visible') ) {
                    $('.before-result-search').remove();
                }
                $('.filter-result-shows').show();
                $('.filter-result-shows').html();

                $('div.filter-result-shows  div.tool-top-bar-left span.default-msg-for-contacts').text('loading');
                $('div.filter-result-shows  div.tool-top-bar-left span.tool-top-bar-notification').text('we are getting your result');

                loder();

            },
            success:function(data){

                companydetails(data);

            }
        });
    }
}

function validationexclude(types){
     console.log(types);
    var zipcodes=[];
    var data = {};
    var dataexclude={};
    var state = [];
    var industries = [];
    var city = [];
    var company = [];
    var joblevels= [];
    var job_funtion = [];
    var countries =[];
    var job_fun =[];
    var joblevelarray = [];
    var industriesexclude      =[];
    var stateexclude      =[];
    var cityexclude      =[];
    var companyexclude      =[];
    var zipcodeexclude      =[];
    var joblevelsexclude      =[];
    var job_funtionexclude      =[];

    var range={};
    var zipcode = [];
    var filter = '';
    var filter1='';
    var filter_commy1='';
    var count ='';
    var state_count = '';
    var city_count = '';
    var joblevels_counts = '';
    var job_funtion_count = '';
    var zipcode_count = '';
    var company_count = '';
    var zipcode_count = '';
    var filter2=company_filter=filter_company='';
    var filter3=countryhtml='';
    var flag = 1;
    var url_details = window.location.pathname;

    // var url_details = window.location.pathname;
    var type = $('#type_filter').val();
    $('#'+type+'_number').css("z-index", "99999"); 
    //$('.selected_value .'+ type).html('');
    // console.log($(this).data('id'));
    var opendivname = $('#showdivid').val();
     $('div #' +opendivname  +' button[data-id="include"').addClass('is-include-check');
        // console.log($('div #' +opendivname  +' input[type=checkbox]').attr('data-type'));
        checkdatatype= $('div #' +opendivname  +' input[type=checkbox]').attr('data-type');
        if(checkdatatype==null){
            $('div #' +opendivname  +' input[type=checkbox]').attr('data-type','Exculde');
        }
        
        $('div #' +opendivname  +' button[data-id="include"').removeClass('include');
    $('.filter_result:checked').each(function(){
        var incld_value = $(this).val();
        typee = $(this).attr('data-id');
        var secrhtype =$(this).attr('data-type');
        if (/*type =='industry' && */ $(this).val() && typee == 'industry' && secrhtype=='Exculde' ) {
            $(this).attr('data-type', 'Exculde');
            filter = filter+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry">'+'industry: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }

        if (type =='industry' &&  $(this).val() && typee == 'industry'&& secrhtype=='Exculde') {
            // console.log('970indus');
            var opendivname = $('#'+typee).attr('data-box');
            console.log(opendivname);
                if($('div#'+typee+' span.c-badge-success').length>0){
                    $('#'+typee+'_number').removeClass('c-badge-success');
                }
                if($('div#'+typee+' span.c-badge-exclude').length==0){
                    $('#'+typee+'_number').addClass('c-badge-exclude');
                }
            filter1 = filter1+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry"><span class="text-success">exclude</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }


        if (type =='country' &&  $(this).val() && typee == 'country'&& secrhtype=='Exculde') {
        //data['country'] = $(this).val();

            $('.loca-tion').show();
        }
        if (/*type =='country' &&*/  $(this).val() && typee == 'country'&& secrhtype=='Exculde') {
        //data['country'] = $(this).val();
            $('.loca-tion').show();
        }
        if (/*type =='state' &&*/ $(this).val() && typee == 'state'&& secrhtype=='Exculde') {
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state">'+'State: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }  
        if (type =='state' && $(this).val() && typee == 'state'&& secrhtype=='Exculde') {
            var opendivname = $('#'+typee).attr('data-box');
                if($('div#'+typee+' span.c-badge-success').length>0){
                    $('#'+typee+'_number').removeClass('c-badge-success');
                }
                if($('div#'+typee+' span.c-badge-exclude').length==0){
                    $('#'+typee+'_number').addClass('c-badge-exclude');
                }
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state"><span class="text-success">exclude</span>   '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }

        if (/*type =='city' &&*/ $(this).val() && typee == 'city'&& secrhtype=='Exculde') {
            var datas = '';
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city">'+'City: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }   
        if (type =='city' && $(this).val() && typee == 'city'&& secrhtype=='Exculde') {
            var datas = '';
            var opendivname = $('#'+typee).attr('data-box');
                if($('div#'+typee+' span.c-badge-success').length>0){
                    $('#'+typee+'_number').removeClass('c-badge-success');
                }
                if($('div#'+typee+' span.c-badge-exclude').length==0){
                    $('#'+typee+'_number').addClass('c-badge-exclude');
                }
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }

        if (/*type =='city' &&*/ $(this).val() && typee == 'joblevels'&& secrhtype=='Exculde') {
            var opendivname = $('#'+typee).attr('data-box');
                if($('div#'+typee+' span.c-badge-success').length>0){
                    $('#'+typee+'_number').removeClass('c-badge-success');
                }
                if($('div#'+typee+' span.c-badge-exclude').length==0){
                    $('#'+typee+'_number').addClass('c-badge-exclude');
                }
            joblevelarray.push({
                link :  $(this).attr('is-parent'), 
                value:  $(this).val(),
                parentvalue : $(this).attr('data-id-parent')
            });
        }   
        if (/*type =='city' &&*/ $(this).val() && typee == 'Jobfunctions'&& secrhtype=='Exculde') {
            var opendivname = $('#'+typee).attr('data-box');
                if($('div#'+typee+' span.c-badge-success').length>0){
                    $('#'+typee+'_number').removeClass('c-badge-success');
                }
                if($('div#'+typee+' span.c-badge-exclude').length==0){
                    $('#'+typee+'_number').addClass('c-badge-exclude');
                }
            isparent = parseInt($(this).attr('is-parent'));
            job_fun.push({
                link :  $(this).attr('is-parent'), 
                value:  $(this).val(),
                parentvalue : $(this).attr('data-id-parent')
            });
            var datas = '';
        }   

    });
    var parent_joblevel=[];
    var child_jooblevel=[];
    jQuery.each(joblevelarray, function(index, value) {
        if(value.link==='parent'){
                parent_joblevel.push({
                value:value.value
            });
        }else{
            child_jooblevel.push({
                value:value.value,
                parentvalue:value.parentvalue
            });  
        }
    });
    jQuery.each(parent_joblevel, function(index1, value1) {
        var parentval = value1.value;
        jQuery.each(child_jooblevel, function(index2, value2) {
            if(value2== null){

            } else { 
                var childval =  value2.parentvalue;
                if(value1.value===childval){
                    delete child_jooblevel[index2];
                } 
            }    
        });
    });
    if(parent_joblevel.length>0 && type == 'joblevels'){
        jQuery.each(parent_joblevel, function(index, value) {
            filter  = filter+'<li class="filter-save-data" new-data="'+value.value+'" data-id="joblevels">'+'joblevels: '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
           filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="joblevels"><span class="text-success">include</span>  '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        });
    }else{
        jQuery.each(parent_joblevel, function(index, value) {
            filter  = filter+'<li class="filter-save-data" new-data="'+value.value+'" data-id="joblevels">'+'joblevels: '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
           //filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="joblevels"><span class="text-success">include</span>  '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        });
    } 
    if(child_jooblevel.length>0 && type == 'joblevels' ){
        jQuery.each(child_jooblevel, function(index, value) {
            if(value== null){

            } else { 
                filter  = filter+'<li class="filter-save-data" new-data="'+value.parentvalue+'/'+value.value+'" data-id="joblevels">'+'joblevels: '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.parentvalue+'/'+value.value+'" data-id="joblevels"><span class="text-success">include</span>  '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            } 

        });
    }else{
        jQuery.each(child_jooblevel, function(index, value) {
            if(value== null){

            } else { 
                filter  = filter+'<li class="filter-save-data" new-data="'+value.parentvalue+'/'+value.value+'" data-id="joblevels">'+'joblevels: '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
                //filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.parentvalue+'/'+value.value+'" data-id="joblevels"><span class="text-success">include</span>  '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            } 

        });
    }
    var parent_job = [];
    var child_job  =[];
    jQuery.each(job_fun, function(index, value) {
        if(value.link==='parent'){
            parent_job.push({
                value:value.value
            });
        }else{
            child_job.push({
                value:value.value,
                parentvalue:value.parentvalue
            });  
        }
    });
    jQuery.each(parent_job, function(index1, value1) {
        var parentval = value1.value;
        jQuery.each(child_job, function(index2, value2) {
            if(value2== null){

            } else { 
                var childval =  value2.parentvalue;
                if(value1.value===childval){
                    delete child_job[index2];
                } 
            }    
        });
    });
    if(parent_job.length>0 && type=='Jobfunctions'){
        jQuery.each(parent_job, function(index, value) {
            filter  = filter+'<li class="filter-save-data" new-data="'+value.value+'" data-id="Jobfunctions">'+'Jobfunctions: '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="Jobfunctions"><span class="text-success">include</span>  '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        });
    } else{
        jQuery.each(parent_job, function(index, value) {
            filter  = filter+'<li class="filter-save-data" new-data="'+value.value+'" data-id="Jobfunctions">'+'Jobfunctions: '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            //filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="Jobfunctions"><span class="text-success">include</span>  '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        });
    }
    if(child_job.length>0 && type=='Jobfunctions'){
        jQuery.each(child_job, function(index, value) {
            if(value== null){

            } else { 
                filter  = filter+'<li class="filter-save-data" new-data="'+value.parentvalue+'/'+value.value+'" data-id="Jobfunctions">'+'Jobfunctions: '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.parentvalue+'/'+value.value+'" data-id="Jobfunctions"><span class="text-success">include</span>  '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            } 

        });
    }else{
             jQuery.each(child_job, function(index, value) {
            if(value== null){

            } else { 
                filter  = filter+'<li class="filter-save-data" new-data="'+value.parentvalue+'/'+value.value+'" data-id="Jobfunctions">'+'Jobfunctions: '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
                //filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.parentvalue+'/'+value.value+'" data-id="Jobfunctions"><span class="text-success">include</span>  '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            } 

        });
    }
    var coun_contry = 0;
    if(type=='country'){
        $('#div_country   ul.c-choice-tree li  input[type=checkbox]:checked').each(function(){
            type12 = $(this).attr('data-id');
            cont_value = $(this).attr('new-data');
            coun_contry++;
            $('.tag').remove();
            filter =filter+'<span class="tag-first tag" new-data="'+cont_value+'" data-id="country">Country: '+cont_value+'<button type="button" class="tag-remove removefiles"></button> </span>';
            countryhtml=countryhtml+'<li class="c-filter-selected-list-item">  <span  class="gap-right-small text-success">include</span><span class="gap-right"  new-data='+cont_value+' data-id='+type12+'>'+cont_value+'</span><button class="button button-only-icon u-gap-left-auto link-quaternary"  type="button"><i class="icon icon-clear font-regular block removefiles"  aria-hidden="true"></i><span  class="visually-hidden">Remove</span></button></li>';
        });
        if(countryhtml!=''){
            $('.selected_value .'+ type12).html('');
            $('.selected_value .'+ type12).html(countryhtml);
        }

    }

    var zipcod = $('.zipcod').val();
    if(zipcod !=''){
        zipcodes.push(zipcod);
    //$('.zipcod').val("");

    }
    if(zipcodes.length > 0 && type=='zipcode') {
        $.each(zipcodes,function(index,value){
            if(value== null){
            }else{
                filter = filter+'<li class="filter-save-datav loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times " ></button></li>';
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });

    }else{

        $.each(zipcodes,function(index,value){
            if(value== null){
            }else{
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });
    }

    var company_name = $('.comny').val();
    if(company_name!='') {
    companies.push(company_name);
    $('.comny').val("");

    }
    if(companies.length > 0 && type=='company'  ) {
        $.each(companies,function(index,value){
            if(value== null){
            }else{
                filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times loca-tion" ></button></li>';
                filter1 = filter1+'<li class="filter-save-data" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }   
        });

    }else{
        $.each(companies,function(index,value){
            if(value== null){
            }else{
                filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });
    }
    //console.log(companies.length);
    var ranges  =[];
    $('.range').each(function(){
        var typeran = $(this).attr('id');
        if (typeran =='first_range' && $(this).val()) {
            range['first_range'] = parseInt($(this).val());
            if(range['first_range']>999 && range['first_range']<99999){console.log('517');
                ranges['first_range'] = parseFloat(range['first_range']/1000).toFixed(2);
                ranges['first_range']=ranges['first_range']+'k';
            }else if( range['first_range']>99999 && range['first_range']<999999){
                ranges['first_range'] = parseFloat(range['first_range']/100000).toFixed(2);
                ranges['first_range']=ranges['first_range']+'M';
            }else if( range['first_range']>999999 && range['first_range']<99999999){
                ranges['first_range'] = parseFloat(range['first_range']/10000000).toFixed(2);
                ranges['first_range']=1+'M';
            }
            else{
                ranges['first_range']=range['first_range'];
            }
        }
        if (typeran =='second_range' && $(this).val()) {
            range['second_range'] = parseInt($(this).val());
            if(range['second_range']>999 && range['second_range']<99999){console.log('517');
                ranges['second_range'] = parseFloat(range['second_range']/1000).toFixed(2);
                ranges['second_range']=ranges['second_range']+'k';
            }else if( range['second_range']>99999 && range['second_range']<999999){
                ranges['second_range'] = parseFloat(range['second_range']/100000).toFixed(2);
                ranges['second_range']=ranges['second_range']+'M';
            }else if( range['second_range']>999999 && range['second_range']<99999999){
                ranges['second_range'] = parseFloat(range['second_range']/10000000).toFixed(2);
                ranges['second_range']=1+'M';
            }
            else{
                ranges['second_range']=range['second_range'];
            }
        }
        if (typeran =='first_revenue' && $(this).val()) {
            range['first_revenue'] = parseInt($(this).val());
            if(range['first_revenue']>999 && range['first_revenue']<99999){console.log('517');
                ranges['first_revenue'] = parseFloat(range['first_revenue']/1000).toFixed(2);
                ranges['first_revenue']=ranges['first_revenue']+'k';
            }else if( range['first_revenue']>99999 && range['first_revenue']<999999){
                ranges['first_revenue'] = parseFloat(range['first_revenue']/100000).toFixed(2);
                ranges['first_revenue']=ranges['first_revenue']+'M';
            }else if( range['first_revenue']>999999 && range['first_revenue']<99999999){
                ranges['first_revenue'] = parseFloat(range['first_revenue']/10000000).toFixed(2);
                ranges['first_revenue']=1+'B';
            }
            else{
                ranges['first_revenue']=range['first_revenue'];
            }
        }
        if (typeran =='second_revenue' && $(this).val()) {
            range['second_revenue'] = parseInt($(this).val());
            if(range['second_revenue']>999 && range['second_revenue']<99999){console.log('517');
                ranges['second_revenue'] = parseFloat(range['second_revenue']/1000).toFixed(2);
                ranges['second_revenue']=ranges['second_revenue']+'k';
            }else if( range['second_revenue']>99999 && range['second_revenue']<999999){
                ranges['second_revenue'] = parseFloat(range['second_revenue']/100000).toFixed(2);
                ranges['second_revenue']=ranges['second_revenue']+'M';
            }else if( range['second_revenue']>999999 && range['second_revenue']<99999999){
                ranges['second_revenue'] = parseFloat(range['second_revenue']/10000000).toFixed(2);
                ranges['second_revenue']=1+'1B';
            }
            else{
                ranges['second_revenue']=range['second_revenue'];
            }
        }
    });
    // ranges = range;
    console.log(ranges);
    console.log(range);


    if(types=='employee' || types==='revenue'  || range['first_range'] != '' || range['second_range'] != '' || range['first_revenue'] != '' || range['second_revenue'] != '' ){
         var flag_range=1;
         var flag_emprange=1;
    }
    if(range['first_range']>range['second_range']  ||  range['first_revenue']>range['second_revenue']){
        
        
        $('.all_selected_value li').each(function() {
            if($(this).attr('data-id')=='Employee') {
                filter += '<li class="filter-save-data loca-tion" new-data="'+$(this).attr('new-data')+'" data-id="Employee" >'+$(this).html()+'</li>';
                flag_range=0;
            }
            if($(this).attr('data-id')=='Revenue') {
                filter += '<li class="filter-save-data loca-tion" new-data="'+$(this).attr('new-data')+'" data-id="Revenue" >'+$(this).html()+'</li>';
                flag_range=0;
            }
        });

        if(types==='employee' ||  types==='revenue') {
            flag_range=0;
            flag=0;
            $('.addmessage').html('MINUMUM VALUE CANNOT BE GREATER THAN MAXIMUM VALUE');

            $('.aleart-login').addClass('active');
            setTimeout(function()
            {
            $( ".aleart-login" ).removeClass('active');

            }, 1000); 
        }       
    }
    // if(types==null){
    //     $('.all_selected_value li').each(function() {
    //         if($(this).attr('data-id')=='Employee' ) {
    //             console.log();
    //             existemprange = $(this).attr('new-data');
    //            // if(existemprange==''){
    //                 //var existemprange = existemprange.split("-");
    //                 //$('#first_range').val(existemprange[0]);
    //                 //$('#second_range').val(existemprange[1]);
    //            // }
    //            // flag_range=0;
    //         }
    //         if($(this).attr('data-id')=='Revenue') {
                
    //             existrevrange = $(this).attr('new-data');
             
    //         }
    //         if(existemprange!=''){
    //             console.log('636');
    //         }
    //     });

    // }

    // if( (range['first_range']>1000 &&  range['first_range']<1000000 ) || ( range['second_range']>1000 &&  range['second_range']<1000000 )) {
    //     if(range['first_range']!=''){
    //         range['first_range'] = parseFloat(range['first_range']/1000).toFixed(2);
    //         range['first_range']=range['first_range']+'k';

    //     }
    //     if(range['second_range']!=''){
    //         range['second_range'] = parseFloat(range['second_range']/1000).toFixed(2);
    //         range['second_range']=range['second_range']+'k';

    //     }
    //     //parseFloat("3.14");

    // }
    // console.log(flag_range);
    if(range['first_range'] != null && range['second_range'] !=null && flag_range==1   ){
        filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range['first_range']+'-'+range['second_range']+'" data-id="Employee" > Employee: '+range['first_range']+'-'+range['second_range']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    }else if(range['first_range'] != null && range['second_range']==null && flag_range==1 ){
        filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range['first_range']+'-'+'1B'+'" data-id="Employee" > Employee: '+range.first_range+'-'+'1B'+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    }else if(range['first_range'] == null && range['second_range'] !=null && flag_range==1){
        filter = filter+'<li class="filter-save-data loca-tion"  data-id="Employee" > Employee: '+'0'+'-'+range['second_range']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    }


    if(range['first_revenue'] != null && range['second_revenue'] !=null  && flag_range==1){
        filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range['first_revenue']+'-'+range['second_revenue']+'" data-id="Revenue" > Revenue: '+range['first_revenue']+'-'+range['second_revenue']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    }else if(range['first_revenue'] != null && range['second_revenue']==null  && flag_range==1){
        filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range['first_revenue']+'-'+'1B'+'" data-id="Revenue" > Revenue: '+range['first_revenue']+'-'+'1B'+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    }else if(range['first_revenue'] == null && range['second_revenue'] !=null  && flag_range==1) {
        filter = filter+'<li class="filter-save-data loca-tion"  data-id="Revenue" > Revenue: '+'0'+'-'+range['second_revenue']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    }

    if($('.job-level-value-exist span.all_selected_value').length>0){
        $('.job-level-value-exist span.all_selected_value').remove();
    }
    if(filter != '') {
        $('.exclude-div').show();
        $('.all_selected_value_exclude').html('');
        $('.all_selected_value_exclude').html(filter);

    }
     
    if(filter1 !=''  && type!=''){
        $('.selected_value .'+ type).html(''); 
        $('.selected_value .'+ type).append(filter1); 
    }
   
    $('.all_selected_value li').each(function(){
        var category = $(this).attr('data-id');
        if(category=='industry'){
            industries.push($(this).attr('new-data'));
        }else if(category=='state'){
            state.push($(this).attr('new-data'));
        }else if(category=='city'){
            city.push($(this).attr('new-data'));
        }else if(category=='company'){
            company.push($(this).attr('new-data'));
        }else if(category=='zipcode'){
            zipcode.push($(this).attr('new-data'));
        }else if(category=='joblevels'){
            joblevels.push($(this).attr('new-data'));
        }else if(category=='Jobfunctions'){
            job_funtion.push($(this).attr('new-data'));
        }

    });
    $('.all_selected_value_exclude li').each(function(){
        var category = $(this).attr('data-id');
        if(category=='industry'){
            industriesexclude.push($(this).attr('new-data'));
        }else if(category=='state'){
            stateexclude.push($(this).attr('new-data'));
        }else if(category=='city'){
            cityexclude.push($(this).attr('new-data'));
        }else if(category=='company'){
            companyexclude.push($(this).attr('new-data'));
        }else if(category=='zipcode'){
            zipcodeexclude.push($(this).attr('new-data'));
        }else if(category=='joblevels'){
            joblevelsexclude.push($(this).attr('new-data'));
        }else if(category=='Jobfunctions'){
            job_funtionexclude.push($(this).attr('new-data'));
        }

    });
    if(industriesexclude!=''){
        data['industries_exclude']=industriesexclude;
        $('.industry_count').html("There is "+ industriesexclude.length +" Selected item"); 
        $('#industry_number').show();
        $('#'+type+'_number').html(industriesexclude.length); 
    }

    
    if(stateexclude!=''){
        data['state_exclude'] = stateexclude;
         $('.state_count').html("There is "+ stateexclude.length +" Selected item"); 
        $('#state_number').show();
        $('#state_number').html(stateexclude.length); 

    }
    if(companyexclude !=''){

        data['company_name_exclude'] = companyexclude;
        $('.company_count').html("There is "+ companyexclude.length +" Selected item"); 
        $('#company_number').show();
        $('#company_number').html(companyexclude.length);
    }
    if(cityexclude!=''){
        data['city_exclude'] = cityexclude;
        $('.city_count').html("There is "+ cityexclude.length +" Selected item"); 
        $('#city_number').show(); 
        $('#city_number').html(cityexclude.length); 
    }
    if(zipcodeexclude!=''){
        data['zipcode_exclude'] = zipcodeexclude;


    }
    if(joblevelsexclude != ''){
        data['job_level_exclude']=joblevelsexclude;
        $('.joblevels_count').html("There is "+ joblevelsexclude.length +" Selected item"); 
        $('#joblevels_number').show();
        $('#joblevels_number').html(joblevelsexclude.length);
    }
    if(job_funtionexclude != ''){
        data['job_function_exclude']=job_funtionexclude;
         $('.Jobfunctions_count').html("There is "+ job_funtionexclude.length +" Selected item"); 
        $('#Jobfunctions_number').show();
        $('#Jobfunctions_number').html(job_funtionexclude.length);
    }
    
    $('.tag').each(function() {
        var category = $(this).attr('data-id');
        var country = $(this).attr('new-data');
        if(category=='country'){
            countries.push($(this).attr('new-data'));
        }
    });
    Jobfunctions_count = job_funtion.length;
    if(Jobfunctions_count>0){
        $('.Jobfunctions_count').html("There is "+ Jobfunctions_count +" Selected item"); 
        $('#Jobfunctions_number').show();
        $('#Jobfunctions_number').html(Jobfunctions_count);
    }

    joblevels_counts = joblevels.length;
    if(joblevels_counts>0){
        $('.joblevels_count').html("There is "+ joblevels_counts +" Selected item"); 
        $('#joblevels_number').show();
        $('#joblevels_number').html(joblevels_counts);
    }
    count = industries.length;
    if(count>0){
        $('.industry_count').html("There is "+ count +" Selected item"); 
        $('#industry_number').show();
        $('#'+type+'_number').html(count); 
    }
    state_count=state.length;
    if(state_count>0){
        $('.state_count').html("There is "+ state_count +" Selected item"); 
        $('#state_number').show();
        $('#state_number').html(state_count); 
    }
    city_count = city.length;
    if(city_count>0){
        $('.city_count').html("There is "+ city_count +" Selected item"); 
        $('#city_number').show(); 
        $('#city_number').html(city_count); 
    }
    company_count=companies.length;
    if(company_count>0){
    // company_count
        $('.company_count').html("There is "+ company_count +" Selected item"); 
        $('#company_number').show();
        $('#company_number').html(company_count);
    }
    zipcode_count =zipcode.length;
    if(zipcode_count>0){
    // company_count
        $('.zipcode_count').html("There is "+ zipcode_count +" Selected item"); 
        $('#zipcode_number').html(zipcode_count);
    }
    if(coun_contry>0){
            $('#remove-country').show();
            $('.industry_count').html("There is "+ coun_contry +" Selected item"); 
            $('#remove-country').html(coun_contry); 
    }
    if(industries!=''){
        data['industries'] = industries;
    }
    if(state!=''){
        data['state'] = state;
    }
    if(company !=''){
        data['company_name'] = company;
    }
    if(city!=''){
        data['city'] = city;
    }
    if(zipcode!=''){
        data['zipcode'] = zipcode;
    }
    if(joblevels != ''){
        data['job_level']=joblevels;
    }
    if(job_funtion != ''){
        data['job_function']=job_funtion;
    }
    if(countries != ''){
        data['country'] = countries;
    }
    if(url_detail !=''){
        data['url_details']=url_details;
    }
    console.log(flag);
    console.log('1680');
    if(flag ==1 ){

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/demofilter',
            data: {
            'data': data,
            'range':range,
            'dataexclude':dataexclude
            },
            beforeSend: function() {
            // setting a timeout
            // $(placeholder).addClass('loading');
                if( $('.search-result').is(':visible') ) {
                    $('.search-result').hide();
                }
                if( $('.range-of-contact').is(':visible') ) {
                    $('.range-of-contact').hide();
                }
                if( $('.search-result-exist').is(':visible') ) {
                    $('.search-result-exist').remove();
                }
                if( $('.range-of-contact-exist').is(':visible') ) {
                    $('.range-of-contact-exist').remove();
                }
                if( $('.before-result-search').is(':visible') ) {
                    $('.before-result-search').remove();
                }
                $('.filter-result-shows').show();
                $('.filter-result-shows').html();

                $('div.filter-result-shows  div.tool-top-bar-left span.default-msg-for-contacts').text('loading');
                $('div.filter-result-shows  div.tool-top-bar-left span.tool-top-bar-notification').text('we are getting your result');

                loder();

            },
            success:function(data){

                companydetails(data);

            }
        });
    }
}