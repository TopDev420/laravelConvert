$(document).ready(function(){
	if($('.all_selected_value_exclude li').length>0){
	    $('.exclude-div').show();
	}
	var range_slider = $('#range-contact').val();
	var nodatafound=$('.default-msg-for-filter').length;
	if(typeof range_slider === "undefined"){
	}
	else{
		checksvalue();
	}
	if(nodatafound>0){
		checksvalue();
	}
});


function checksvalue(){
		var  industry=state=city=joblevels=Jobfunctions=comp=countrval=Contactexclude='';
		var Contactexclude_count =state_count =city_count=joblevels_count=Jobfunctions_count=coun_contry=0;
		$('.all_selected_value li').each(function(){
			var current = $(this).attr('new-data');
			var category = $(this).attr('data-id');
		    var opendivname = $('#'+category).attr('data-box');
		    $('div #' +opendivname  +' button[data-id="Exclude"').addClass('is-include-check');
            $('div #' +opendivname  +' button[data-id="Exclude"').removeClass('exclude');
        	// console.log($('div #' +opendivname  +' input[type=checkbox]').attr('data-type'));
        	checkdatatype= $('div #' +opendivname  +' input[type=checkbox]').attr('data-type');
        	if(checkdatatype==null){
            	$('div #' +opendivname  +' input[type=checkbox]').attr('data-type','include');
        	}
				$('input[type=checkbox][value="'+current+'"]').prop('checked', true);
			if(category == 'company'){
				companies.push({value : current,type:'include'});
			}
			if(category=='zipcode'){
				$('#zipcode-check').val('set');
				$('.Zip-codes').val(current);
			}
		});
		$('.all_selected_value_exclude li').each(function(){
			var current = $(this).attr('new-data');
			var category = $(this).attr('data-id');
		    var opendivname = $('#'+category).attr('data-box');
			$('div #' +opendivname  +' button[data-id="include"').addClass('is-include-check');
        	checkdatatype= $('div #' +opendivname  +' input[type=checkbox]').attr('data-type');
	        if(checkdatatype==null){
	            $('div #' +opendivname  +' input[type=checkbox]').attr('data-type','Exculde');
	        }
        
        	$('div #' +opendivname  +' button[data-id="include"').removeClass('include');
        	if(category == 'company'){
				if($('span#company_number span.c-badge-success').length>0){
	                $('#company_number').removeClass('c-badge-success');
	            }
	            if($('span#company_number span.c-badge-exclude').length==0){
	                $('span#company_number').addClass('c-badge-exclude');
	            }
				companies.push({value : current,type:'exclude'});
			}else{
				$('input[type=checkbox][value="'+current+'"]').prop('checked', true);
			}

		});

		$('.tag').each(function() {
	        var category = $(this).attr('data-id');
	        var country = $(this).attr('new-data');
	        coun_contry++;
	        $('input[type=checkbox][value="'+country+'"]').prop('checked', true);
	        countrval = countrval+'<li class="filter-save-data" new-data="'+country+'" data-id="country"><span class="text-success">include</span>  '+country+'<button type="button" class="removefiles fa fa-times "></button></li>';

	        
    	});
    	$('.filter_result:checked').each(function(){
			var incld_value = $(this).val();
			var secrhtype =$(this).attr('data-type');
			typee = $(this).attr('data-id');
			var typedyna = 'exclude';
			if ($(this).val() && typee == 'Contact' && secrhtype=='Exculde' ) {
				var opendivname = $('#'+typee).attr('data-box');
	        	if($('div#'+typee+' span.c-badge-success').length>0){
	        		$('#'+typee+'_number').removeClass('c-badge-success');
	        	}
	        	if($('div#'+typee+' span.c-badge-exclude').length==0){
	        		$('#'+typee+'_number').addClass('c-badge-exclude');
	        	}
				$('#Contact_number').addClass('c-badge-exclude');
				Contactexclude = Contactexclude+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="Contact"><span class="text-exclude">'+typedyna+'</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
				Contactexclude_count++;
			}
			if ( $(this).val() && typee == 'state' && secrhtype=='Exculde' ) {
				var opendivname = $('#'+typee).attr('data-box');
	        	if($('div#'+typee+' span.c-badge-success').length>0){
	        		$('#'+typee+'_number').removeClass('c-badge-success');
	        	}
	        	if($('div#'+typee+' span.c-badge-exclude').length==0){
	        		$('#'+typee+'_number').addClass('c-badge-exclude');
	        	}
				state_count++;
				state = state+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state"><span class="text-exclude">'+typedyna+'</span>   '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
			
			}
			if ($(this).val() && typee == 'city' && secrhtype=='Exculde' ) {
				var typeofchekedcity = 'exclude';
				var opendivname = $('#'+typee).attr('data-box');
	        	if($('div#'+typee+' span.c-badge-success').length>0){
	        		$('#'+typee+'_number').removeClass('c-badge-success');
	        	}
	        	if($('div#'+typee+' span.c-badge-exclude').length==0){
	        		$('#'+typee+'_number').addClass('c-badge-exclude');
	        	}
				var datas = '';
				city_count++;
				city = city+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city"><span class="text-exclude">'+typedyna+'</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
			}	
			   
	        
		});

		$('.filter_result:checked').each(function(){
			var incld_value = $(this).val();
			var secrhtype =$(this).attr('data-type');
			typee = $(this).attr('data-id');
			var typedyna = 'include';
			if ($(this).val() && typee == 'Contact' && secrhtype=='include' ) {
				Contactexclude = Contactexclude+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="Contact"><span class="text-success">'+typedyna+'</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
				Contactexclude_count++;
			}
			if ( $(this).val() && typee == 'state' && secrhtype=='include' ) {
				state_count++;
				state = state+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state"><span class="text-success">'+typedyna+'</span>   '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
			
			}
			if ($(this).val() && typee == 'city' && secrhtype=='include' ) {
				var datas = '';
				city_count++;
				city = city+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city"><span class="text-success">'+typedyna+'</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
			}	
			   
	        
		});
		
		if(companies.length > 0 ) {

	        $.each(companies,function(index,value){
	            if(value== null){
	            }else{
	            	if(value.type=='include'){
	        		dynacls = 'text-success';
		        	}else{
		        		dynacls='text-exclude';
		        	}
	                comp = comp+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="company" ><span class="'+dynacls+'"> '+value.type+'</span> '+value.value+' <button type="button" class="removefiles fa fa-times loca-tion" ></button></li>';
	                //filter1 = filter1+'<li class="filter-save-data" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	            }   
	        });

    	}
	    if(companies.length>0){
	    	 $('.company_count').html("There is "+ companies.length +" Selected item"); 
	        $('#company_number').show();
	        $('#company_number').html(companies.length); //company
	        $('.selected_value .'+ 'company').append(comp); 
	    }
		if(Contactexclude != ''){
			$('#Contact_number').show();
		 	$('.selected_value .'+ 'Contact').html('');
		 	$('.selected_value .'+ 'Contact').append(Contactexclude); 
		 	$('.Contact_count').html("There is "+ Contactexclude_count +" Selected item"); 
			$('#Contact_number').html(Contactexclude_count); 
		}
		if(coun_contry>0){
			$('#remove-country').show();
		 	$('.selected_value .'+ 'country').html('');
		 	$('.selected_value .'+ 'country').append(countrval); 
		 	$('.industry_count').html("There is "+ coun_contry +" Selected item"); 
			$('#remove-country').html(coun_contry); 
		}
		if(state != ''){
			$('#state_number').show();
			$('.selected_value .'+ 'state').html('');
		 	$('.selected_value .'+ 'state').append(state); 
		 	$('.state_count').html("There is "+ state_count +" Selected item"); 
			$('#state_number').html(state_count);  
		}
		if(city != ''){
			$('.city_count').html("There is "+ city_count +" Selected item"); 
			$('#city_number').show(); 
			$('#city_number').html(city_count); 
		 	$('.selected_value .'+ 'city').html('');
		 	$('.selected_value .'+ 'city').append(city); 
		}
		if(joblevels != ''){
			$('#joblevels_number').show();
		 	$('.selected_value .'+ 'joblevels').html('');
		 	$('.selected_value .'+ 'joblevels').append(joblevels); 
		 	$('.joblevels_count').html("There is "+ joblevels_count +" Selected item"); 
			$('#joblevels_number').html(joblevels_count);
		}
		if(Jobfunctions != ''){
			$('#Jobfunctions_number').show();
			$('.Jobfunctions_count').html("There is "+ Jobfunctions_count +" Selected item"); 
			$('#Jobfunctions_number').html(Jobfunctions_count);
		 	$('.selected_value .'+ 'Jobfunctions').html('');
		 	$('.selected_value .'+ 'Jobfunctions').append(Jobfunctions); 
		}
}


function validation(types){
		var zipcodes=[];
		var data = {};
		var state = [];
		var industries = [];
		var city = [];
		var company = [];
		var contact= [];
		var job_funtion = [];
		var countries =[];
		var job_fun =[];

		var range={};
		var zipcode = [];
		var filter = '';
		var filter1='';
		var filter_commy1='';
		var count ='';
		var state_count = '';
		var city_count = '';
		var Contact_counts = '';
		var job_funtion_count = '';
		var zipcode_count = '';
		var company_count = 0;
		var companycount=0;
		var zipcode_count = '';
		var filter2=company_filter=filter_company='';
		var filter3=countryhtml='';
		var url_details = window.location.pathname;
		var type = $('#type_filter').val();
		$('#'+type+'_number').css("z-index", "99999"); 
     	var opendivname = $('#showdivid').val();    	
        if(types ==='zipcodes'){
	        
        }else{
        	$('div #' +opendivname  +' button[data-id="Exclude"').addClass('is-include-check');
        	$('div #' +opendivname  +' button[data-id="Exclude"').removeClass('include');
        	checkdatatype= $('div #' +opendivname  +' input[type=checkbox]').attr('data-type');
        	if(checkdatatype==null){
	            $('div #' +opendivname  +' input[type=checkbox]').attr('data-type','include');
	        }
	        $('div #' +opendivname  +' button[data-id="Exclude"').removeClass('exclude');	
        }
        
	    $('.filter_result:checked').each(function(){
	        var incld_value = $(this).val();
	        typee = $(this).attr('data-id');
	        secrhtype = $(this).attr('data-type') ;
	        if (type =='country' &&  $(this).val() && typee == 'country' && secrhtype=='include') {
	            $('.loca-tion').show();
	        }
	        if (/*type =='country' &&*/  $(this).val() && typee == 'country' && secrhtype=='include') {
	            //data['country'] = $(this).val();
	            filter =filter+'<span class="tag-first tag" new-data="'+incld_value+'" data-id="country">Country: '+incld_value+'<button type="button" class="tag-remove removefiles"></button> </span>';
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

	        if (type =='city' && $(this).val() && typee == 'city' && secrhtype=='include') {
	            var datas = '';
	            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	        }
	        if (/*type =='city' &&*/ $(this).val() && typee == 'Contact' && secrhtype=='include') {
	            // console.log('1302');
	            var datas = '';
	            filter = filter+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="Contact">'+'Contact: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	        }   

	        if (type =='Contact' && $(this).val() && typee == 'Contact' && secrhtype=='include') {
	            var datas = '';
	            filter1 = filter1+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="Contact"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="tag-remove removefiles"></li>';
	        }  
	    });
	    if(type=='country'){
	        $('#div_country   ul.c-choice-tree li  input[type=checkbox]:checked').each(function(){
	            type12 = $(this).attr('data-id');
	            cont_value = $(this).attr('new-data');
	            $('.tag').remove();
	            country_count++;
	            countryhtml = countryhtml+'<li class="filter-save-data" new-data="'+cont_value+'" data-id="country"><span class="text-success">include</span>  '+cont_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	        });
	        if(countryhtml!=''){
	            $('.selected_value .'+ type12).html('');
	            $('.selected_value .'+ type12).html(countryhtml);
	        }
	    }

	    // var company_name = $('.comny').val();
	    // if(company_name!='') {
	    //     companies.push(company_name);
	    //     $('.comny').val("");
	    // }
	    // if(companies.length > 0 && type=='company'  ) {
	    //     $.each(companies,function(index,value){
	    //         if(value== null){
	    //         }else{
	    //             company_count++;
	    //             filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times loca-tion" ></button></li>';
	    //             filter1 = filter1+'<li class="filter-save-data" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	    //         } 
	    //     });
	    // }else{
	    //     $.each(companies,function(index,value){
	    //         if(value== null){
	    //         }else{
	    //             company_count++;
	    //             filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="company" > Company: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	    //         }
	    //     });
	    // }
	     	var company_name = $('.comny').val();
		    if(company_name!='' && type=='company' && types=='include' ) {
		    	companies.push({value:company_name,type:'include'});
		    	$('.comny').val("");

		    }
		    if(companies.length > 0  && type=='company'  && types=='include' ) {
		        $.each(companies,function(index,value){
		            if(value== null){
		            }else if(value.type=='include' ){
		            	companycount++;
		                filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="company" > Company: '+value.value+' <button type="button" class="removefiles fa fa-times loca-tion" ></button></li>';
		                filter1 = filter1+'<li class="filter-save-data" new-data="'+value.value+'" data-id="company" > <span class="text-success"> include </span> '+value.value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
		            }   
		        });

		    } else {
		        $.each(companies,function(index,value){
		            if(value== null){
		            }else if(value.type=='include'){
		            	companycount++;
		                filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="company" > Company: '+value.value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
		            }
		        });
		    }
		    var zipcod = $('.zipcod').val();
	    if(zipcod !=''){
	        zipcodes.push(zipcod);
	    //$('.zipcod').val("");

	    }
	    console.log(zipcodes); 
	        $.each(zipcodes,function(index,value){
	            if(value== null){
	            }else{
	            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="zipcode" > Zipcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	            }
	        });
	   	if(filter != '') {
	       $('.all_selected_value').html('');
	       $('.all_selected_value').html(filter);

	 	}
	   	if(filter1 !=''){
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
			}else if(category=='Contact'){
				contact.push($(this).attr('new-data'));
			}else if(category=='Jobfunctions'){
				job_funtion.push($(this).attr('new-data'));
			}
		});
		var stateexclude=[];
		var cityexclude=[];
		var companyexclude=[];
		var contactexclude=[];
		$('.all_selected_value_exclude li').each(function(){
			var category = $(this).attr('data-id');
			if(category=='state'){
				stateexclude.push($(this).attr('new-data'));
			}else if(category=='city'){
				cityexclude.push($(this).attr('new-data'));
			}else if(category=='company'){
				companyexclude.push($(this).attr('new-data'));
			}else if(category=='Contact'){
				contactexclude.push($(this).attr('new-data'));
			}
		});
		$('.tag').each(function() {
			var category = $(this).attr('data-id');
			var country = $(this).attr('new-data');
			if(category=='country'){
			    countries.push($(this).attr('new-data'));
			}
		});
 		if(countries != ''){
        data['country'] = countries;
    	}
		if(state!=''){
	        data['state'] = state;
	    }
	    if(stateexclude!=''){
	        data['state_exclude'] = stateexclude;
	    }

	    if(company !=''){
	        data['company_name'] = company;
	    }
	    if(companyexclude !=''){
	        data['company_name_exclude'] = companyexclude;
	    }
	    if(zipcode!=''){
        	data['zipcode'] = zipcode;
    	}


	    if(city!=''){
	        data['city'] = city;
	    }	
	    if(cityexclude!=''){
	        data['city_exclude'] = cityexclude;
	    }	

	    if(contact != ''){
	        data['Contact']=contact;
	    }
	    if(contactexclude != ''){
	        data['Contact_exclude']=contactexclude;
	    }
	    if(SerachType !=''){
	    	data['types']=SerachType;
	    }
		var country_count=countries.length;
		if(country_count>0){
		$('.location').show();
		$('#remove-country').show(); 
		$('.industry_count').html("There is "+ country_count +" Selected item");
		$('#remove-country').html(country_count);
		}
		Contact_counts = contact.length;
		if(Contact_counts>0){
		$('.Contact_count').html("There is "+ Contact_counts +" Selected item"); 
		$('#Contact_number').show();
		$('#Contact_number').html(Contact_counts);
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
		if(companycount>0){
		$('.company_count').html("There is "+ companycount +" Selected item"); 
		$('#company_number').show();
		$('#company_number').html(companycount);
		}
		zipcode_count =zipcode.length;
			  console.log(data);  


  	$.ajax({
	   	headers: {'X-CSRF-TOKEN': csrftoken },
	   	type:'POST',
	   	url:baseurl+'/demofilter',
	   	data: {
	       'data': data,
	       'range':range,
	   	},
	   	beforeSend: function() {
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
function validationexclude(types){
		var zipcodes=[];
		var data = {};
		var state = [];
		var city = [];
		var company = [];
		var contact= [];
		var countries =[];
		var stateexclude =[];
		var cityexclude=[];
		var companyexclude=[];
		var contactexclude = [];

		var range={};
		var zipcode = [];
		var filter = '';
		var filter1='';
		var filter_commy1='';
		var count ='';
		var state_count = '';
		var city_count = '';
		var Contact_counts = '';
		var job_funtion_count = '';
		var zipcode_count = '';
		var company_count = 0;
		var zipcode_count = '';
		var filter2=company_filter=filter_company='';
		var filter3=countryhtml='';
		var url_details = window.location.pathname;
		var type = $('#type_filter').val();
		$('#'+type+'_number').css("z-index", "99999"); 
     	var opendivname = $('#showdivid').val();
    	$('div #' +opendivname  +' button[data-id="include"').addClass('is-include-check');
        checkdatatype= $('div #' +opendivname  +' input[type=checkbox]').attr('data-type');
        if(checkdatatype==null){
            $('div #' +opendivname  +' input[type=checkbox]').attr('data-type','Exculde');
        }
        $('div #' +opendivname  +' button[data-id="include"').removeClass('include');
	    $('.filter_result:checked').each(function(){
	        var incld_value = $(this).val();
	        typee = $(this).attr('data-id');
	        secrhtype = $(this).attr('data-type') ;
	        if (type =='country' &&  $(this).val() && typee == 'country' && secrhtype=='Exculde') {
	            $('.loca-tion').show();
	        }
	        if (/*type =='country' &&*/  $(this).val() && typee == 'country' && secrhtype=='Exculde') {
	            //data['country'] = $(this).val();
	            //filter =filter+'<span class="tag-first tag" new-data="'+incld_value+'" data-id="country">Country: '+incld_value+'<button type="button" class="tag-remove removefiles"></button> </span>';
	            $('.loca-tion').show();
	        }

	        if (/*type =='state' &&*/ $(this).val() && typee == 'state' && secrhtype=='Exculde') {

	            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state">'+'State: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	        }  
	        if (type =='state' && $(this).val() && typee == 'state' && secrhtype=='Exculde') {
	        	var opendivname = $('#'+typee).attr('data-box');
                if($('div#'+typee+' span.c-badge-success').length>0){
                    $('#'+typee+'_number').removeClass('c-badge-success');
                }
                if($('div#'+typee+' span.c-badge-exclude').length==0){
                    $('#'+typee+'_number').addClass('c-badge-exclude');
                }
	            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state"><span class="text-exclude">exculde</span>   '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	        }
	        if (/*type =='city' &&*/ $(this).val() && typee == 'city' && secrhtype=='Exculde') {
	            var datas = '';
	            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city">'+'City: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	        }   

	        if (type =='city' && $(this).val() && typee == 'city' && secrhtype=='Exculde') {
	        	var opendivname = $('#'+typee).attr('data-box');
                if($('div#'+typee+' span.c-badge-success').length>0){
                    $('#'+typee+'_number').removeClass('c-badge-success');
                }
                if($('div#'+typee+' span.c-badge-exclude').length==0){
                    $('#'+typee+'_number').addClass('c-badge-exclude');
                }
	            var datas = '';
	            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city"><span class="text-exclude">Exculde</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	        }
	        if (/*type =='city' &&*/ $(this).val() && typee == 'Contact' && secrhtype=='Exculde') {
	            // console.log('1302');
	            var datas = '';
	            filter = filter+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="Contact">'+'Contact: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	        }   

	        if (type =='Contact' && $(this).val() && typee == 'Contact' && secrhtype=='Exculde') {
	        	var opendivname = $('#'+typee).attr('data-box');
                if($('div#'+typee+' span.c-badge-success').length>0){
                    $('#'+typee+'_number').removeClass('c-badge-success');
                }
                if($('div#'+typee+' span.c-badge-exclude').length==0){
                    $('#'+typee+'_number').addClass('c-badge-exclude');
                }
	            var datas = '';
	            filter1 = filter1+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="Contact"><span class="text-exclude">Exculde</span>  '+incld_value+'<button type="button" class="tag-remove removefiles"></li>';
	        }  
	    });
	    if(type=='country'){
	        $('#div_country   ul.c-choice-tree li  input[type=checkbox]:checked').each(function(){
	            type12 = $(this).attr('data-id');
	            cont_value = $(this).attr('new-data');
	            $('.tag').remove();
	            country_count++;
	            countryhtml = countryhtml+'<li class="filter-save-data" new-data="'+cont_value+'" data-id="country"><span class="text-success">include</span>  '+cont_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	        });
	        if(countryhtml!=''){
	            $('.selected_value .'+ type12).html('');
	            $('.selected_value .'+ type12).html(countryhtml);
	        }
	    }

	    // var company_name = $('.comny').val();
	    // if(company_name!=''  && types== 'Exculde') {
	    //     companies.push({value:company_name,type:'exclude'});
	    //     $('.comny').val("");
	    // }
	    // if(companies.length > 0 && type=='company' && types== 'Exculde') {
	    //     $.each(companies,function(index,value){
	    //         if(value== null){
	    //         }else{
	    //             company_count++;
	    //             filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="company" > '+value.type+': '+value.value+' <button type="button" class="removefiles fa fa-times loca-tion" ></button></li>';
	    //             filter1 = filter1+'<li class="filter-save-data" new-data="'+value.value+'" data-id="company" > '+value.type+': '+value.value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	    //         } 
	    //     });
	    // }else{
	    //     $.each(companies,function(index,value){
	    //         if(value== null){
	    //         }else{
	    //             company_count++;
	    //             filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="company" > '+value.type+': '+value.value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
	    //         }
	    //     });
	    // }
	    var company_name = $('.comny').val();
    if(company_name!='' && type=='company' && types=='Exclude' ) {
    	if($('span#company_number span.c-badge-success').length>0){
                    $('#company_number').removeClass('c-badge-success');
                }
                if($('span#company_number span.c-badge-exclude').length==0){
                    $('span#company_number').addClass('c-badge-exclude');
                }
    	companies.push({value:company_name,type:'exculde'});
    	$('.comny').val("");

    }
    if(companies.length > 0 && type=='company' && types=='Exclude') {
        $.each(companies,function(index,value){
            if(value== null){
            }else if(value.type=='exculde'){
            	company_count++;
                filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="company" > Company: '+value.value+' <button type="button" class="removefiles fa fa-times loca-tion" ></button></li>';
                filter1 = filter1+'<li class="filter-save-data" new-data="'+value.value+'" data-id="company" > <span class="text-exclude">exclude</span> '+value.value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }   
        });

    }else{
        $.each(companies,function(index,value){
            if(value== null){
            }else if(value.type=='exculde'){
            	company_count++;
                filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value.value+'" data-id="company" > Company: '+value.value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });
    }
	    if($('.job-level-value-exist span.all_selected_value').length>0){
        $('.job-level-value-exist span.all_selected_value').remove();
    }
	   	if(filter != '') {
	   		$('.exclude-div').show();
	       	$('.all_selected_value_exclude').html('');
	       	$('.all_selected_value_exclude').html(filter);

	 	}
	   	if(filter1 !=''){
	     	$('.selected_value .'+ type).html(''); 
	     	$('.selected_value .'+ type).append(filter1); 
	 	}

	 	$('.all_selected_value li').each(function(){
			var category = $(this).attr('data-id');
			if(category=='state'){
				state.push($(this).attr('new-data'));
			}else if(category=='city'){
				city.push($(this).attr('new-data'));
			}else if(category=='company'){
				company.push($(this).attr('new-data'));
			}else if(category=='Contact'){
				contact.push($(this).attr('new-data'));
			}
		});

		$('.all_selected_value_exclude li').each(function(){
			var category = $(this).attr('data-id');
			if(category=='state'){
				stateexclude.push($(this).attr('new-data'));
			}else if(category=='city'){
				cityexclude.push($(this).attr('new-data'));
			}else if(category=='company'){
				companyexclude.push($(this).attr('new-data'));
			}else if(category=='Contact'){
				contactexclude.push($(this).attr('new-data'));
			}
		});
		$('.tag').each(function() {
			var category = $(this).attr('data-id');
			var country = $(this).attr('new-data');
			if(category=='country'){
			    countries.push($(this).attr('new-data'));
			}
		});
 		
	    if(state!=''){
	        data['state'] = state;
	    }
	    if(stateexclude!=''){
	        data['state_exclude'] = stateexclude;
	    }

	    if(company !=''){
	        data['company_name'] = company;
	    }
	    if(companyexclude !=''){
	        data['company_name_exclude'] = companyexclude;
	    }


	    if(city!=''){
	        data['city'] = city;
	    }	
	    if(cityexclude!=''){
	        data['city_exclude'] = cityexclude;
	    }	

	    if(contact != ''){
	        data['Contact']=contact;
	    }
	    if(contactexclude != ''){
	        data['Contact_exclude']=contactexclude;
	    }


	    if(countries != ''){
	        data['country'] = countries;
	    }
	    if(url_details !=''){
	      	data['url_details']=url_details;
	  	}
	  	if(SerachType !=''){
	    	data['types']=SerachType;
	    }

	  	var country_count=countries.length;
		if(country_count>0){
			$('.location').show();
			$('#remove-country').show(); 
			$('.industry_count').html("There is "+ country_count +" Selected item");
			$('#remove-country').html(country_count);
		}
		Contact_counts = contact.length;
		if(Contact_counts>0){
			$('.Contact_count').html("There is "+ Contact_counts +" Selected item"); 
			$('#Contact_number').show();
			$('#Contact_number').html(Contact_counts);
		}
		if(contactexclude.length>0){
			$('.Contact_count').html("There is "+ contactexclude.length +" Selected item"); 
			$('#Contact_number').show();
			$('#Contact_number').html(contactexclude.length);
		}
		state_count=state.length;
		if(state_count>0 ){
			$('.state_count').html("There is "+ state_count +" Selected item"); 
			$('#state_number').show();
			$('#state_number').html(state_count); 
		}
		if( stateexclude.length>0){
			$('.state_count').html("There is "+ stateexclude.length +" Selected item"); 
			$('#state_number').show();
			$('#state_number').html(stateexclude.length); 
		}
		city_count = city.length;
		if(city_count>0 ){
			$('.city_count').html("There is "+ city_count +" Selected item"); 
			$('#city_number').show(); 
			$('#city_number').html(city_count); 
		}
		if(cityexclude.length>0){
			$('.city_count').html("There is "+ cityexclude.length +" Selected item"); 
			$('#city_number').show(); 
			$('#city_number').html(cityexclude.length); 
		}
		if(company_count>0 ){
			$('.company_count').html("There is "+ company_count +" Selected item"); 
			$('#company_number').show();
			$('#company_number').html(company_count);
		}
		if( companyexclude.length>0){
			$('.company_count').html("There is "+ companyexclude.length +" Selected item"); 
			$('#company_number').show();
			$('#company_number').html(companyexclude.length);
		}
	  	$.ajax({
		   	headers: {'X-CSRF-TOKEN': csrftoken},
		   	type:'POST',
		   	url:baseurl+'/demofilter',
		   	data: {
		       'data': data,
		       'range':range,
		   	},
		   	beforeSend: function() {
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