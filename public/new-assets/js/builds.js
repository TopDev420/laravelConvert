$(document).ready(function(){
	if($('.all_selected_value_exclude li').length>0){
	    	$('.exclude-div').show();
	}
	var range_slider = $('#range-contact').val();
	var nodatafound=$('.nodata-found').length;
	if(typeof range_slider === "undefined"){
	}else {
		checksvalue();
	}

	if(nodatafound>0){
		checksvalue();
	}
		




});





function checksvalue(){
	var job_fun =[];
    var joblevelarray = [];
	var  industry=state=city=joblevels=Jobfunctions=countrval=comp=typeofchekedindus='';
		var industry_count =state_count =city_count=joblevels_count=Jobfunctions_count=coun_contry=0;
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
			if(category!='Jobfunctions' || category!='joblevels'){

				$('input[type=checkbox][value="'+current+'"]').prop('checked', true);
			}
			if(category=='Jobfunctions'){

				var jobfuncurrval = current.split("/");
				
				if(jobfuncurrval.length==2){
					 // $('input[type=checkbox][value="'+jobfuncurrval[0]+'"]').addClass("is-child-check");;
					 $('input[type=checkbox][is-parent="parent"][value="'+jobfuncurrval[0]+'"]').addClass("is-child-check");
					$('input[type=checkbox][value="'+jobfuncurrval[1]+'"]').prop('checked', true);

				}else{
					 $('input[type=checkbox][data-id-parent="'+current+'"]').prop('checked', true);
					$('input[type=checkbox][value="'+jobfuncurrval[0]+'"]').prop('checked', true);
				}
			}
			if(category=='joblevels'){
				var joblevel = current.split("/");
				if(joblevel.length==2){
					//$('input[type=checkbox][value="'+$('input[type=checkbox][is-parent="parent"][value="'+$(this).attr('data-id-parent')+'"]').addClass("is-child-check");+'"]').addClass("is-child-check");
					$('input[type=checkbox][is-parent="parent"][value="'+joblevel[0]+'"]').addClass("is-child-check");
					$('input[type=checkbox][value="'+joblevel[1]+'"]').prop('checked', true);
					localStorage.setItem('checkedkey',joblevel[1]); 
					
				}else{
					$('input[type=checkbox][value="'+joblevel[0]+'"]').prop('checked', true);
					$('input[type=checkbox][data-id-parent="'+current+'"]').prop('checked', true);
				}

			}
			// if(category=='Employee'){
			// 	var split_emprange = current.split("-");
			// 	var emp_max_ranage = $.trim(split_emprange[1]);
			// 	var emp_min_range = $.trim(split_emprange[0]);
			// 	if(emp_min_range!='0'){
			// 		$('#first_range').val(emp_min_range);
			// 	}
				
			// 	$('#second_range').val(emp_max_ranage);

			// }
			// if(category=='Revenue'){
			// 	var split_emprange = current.split("-");
			// 	var emp_max_ranage = $.trim(split_emprange[1]);
			// 	var emp_min_range = $.trim(split_emprange[0]);
			// 	if(emp_min_range!='0'){
			// 		$('#first_revenue').val(emp_min_range);
			// 	}
				
			// 	$('#second_revenue').val(emp_max_ranage);

			// }
			if(category == 'company'){
				companies.push({value : current,type:'include'});
			}
			if(category=='zipcode'){
				$('.Zip-codes').val(current);
				$('#zipcode-check').val('set');
			}
			if(category=='siccode'){
				$('.Sic-codes').val(current);
				$('#siccode-check').val('set');
			}
			if(category=='naicscode'){
				$('.Naics-codes').val(current);
				$('#naicscode-check').val('set');
			}

		});
		$('.all_selected_value_exclude li').each(function(){
			var current = $(this).attr('new-data');
			var category = $(this).attr('data-id');
		    var opendivname = $('#'+category).attr('data-box');
			$('div #' +opendivname  +' button[data-id="include"').addClass('is-include-check');
        // console.log($('div #' +opendivname  +' input[type=checkbox]').attr('data-type'));
        	checkdatatype= $('div #' +opendivname  +' input[type=checkbox]').attr('data-type');
	        if(checkdatatype==null){
	            $('div #' +opendivname  +' input[type=checkbox]').attr('data-type','Exculde');
	        }
        
        	$('div #' +opendivname  +' button[data-id="include"').removeClass('include');
        	 // $('input[type=checkbox][value="'+current+'"]').prop('checked', true);
        	if(category!='Jobfunctions' || category!='joblevels'){

				$('input[type=checkbox][value="'+current+'"]').prop('checked', true);
			}
			if(category=='Jobfunctions'){

				var jobfuncurrval = current.split("/");
				
				if(jobfuncurrval.length==2){
					 // $('input[type=checkbox][value="'+jobfuncurrval[0]+'"]').addClass("is-child-check");;
					 $('input[type=checkbox][is-parent="parent"][value="'+jobfuncurrval[0]+'"]').addClass("is-child-check");
					$('input[type=checkbox][value="'+jobfuncurrval[1]+'"]').prop('checked', true);
					

				}else{
					 $('input[type=checkbox][data-id-parent="'+current+'"]').prop('checked', true);
					$('input[type=checkbox][value="'+jobfuncurrval[0]+'"]').prop('checked', true);
				}
			}
			if(category=='joblevels'){
				var joblevel = current.split("/");
				if(joblevel.length==2){
					//$('input[type=checkbox][value="'+$('input[type=checkbox][is-parent="parent"][value="'+$(this).attr('data-id-parent')+'"]').addClass("is-child-check");+'"]').addClass("is-child-check");
					$('input[type=checkbox][is-parent="parent"][value="'+joblevel[0]+'"]').addClass("is-child-check");
					$('input[type=checkbox][value="'+joblevel[1]+'"]').prop('checked', true);
					localStorage.setItem('checkedkey',joblevel[1]);
				}else{
					$('input[type=checkbox][value="'+joblevel[0]+'"]').prop('checked', true);
					$('input[type=checkbox][data-id-parent="'+current+'"]').prop('checked', true);
				}

			}
			if(category == 'company'){
				if($('span#company_number span.c-badge-success').length>0){
                    $('#company_number').removeClass('c-badge-success');
                }
                if($('span#company_number span.c-badge-exclude').length==0){
                    $('span#company_number').addClass('c-badge-exclude');
                }
				companies.push({value : current,type:'exclude'});
			}
			if(category == 'ownership'){
				if($('span#ownership_number span.c-badge-success').length>0){
                    $('#ownership_number').removeClass('c-badge-success');
                }
                if($('span#ownership_number span.c-badge-exclude').length==0){
                    $('span#ownership_number').addClass('c-badge-exclude');
                }
				ownerships.push({value : current,type:'exclude'});
			}
			if(category == 'business'){
				if($('span#business_number span.c-badge-success').length>0){
                    $('#business_number').removeClass('c-badge-success');
                }
                if($('span#business_number span.c-badge-exclude').length==0){
                    $('span#business_number').addClass('c-badge-exclude');
                }
				businesses.push({value : current,type:'exclude'});
			}
			if(category == 'yearfounded'){
				if($('span#yearfounded_number span.c-badge-success').length>0){
                    $('#yearfounded_number').removeClass('c-badge-success');
                }
                if($('span#yearfounded_number span.c-badge-exclude').length==0){
                    $('span#yearfounded_number').addClass('c-badge-exclude');
                }
				yearfoundeds.push({value : current,type:'exclude'});
			}

		});

		$('.filter_result:checked').each(function(){
			var incld_value = $(this).val();
			var secrhtype =$(this).attr('data-type');
			typee = $(this).attr('data-id');
			var typedyna = 'exclude';
			if ($(this).val() && typee == 'industry' && secrhtype=='Exculde' ) {
				var opendivname = $('#'+typee).attr('data-box');
	        	if($('div#'+typee+' span.c-badge-success').length>0){
	        		$('#'+typee+'_number').removeClass('c-badge-success');
	        	}
	        	if($('div#'+typee+' span.c-badge-exclude').length==0){
	        		$('#'+typee+'_number').addClass('c-badge-exclude');
	        	}
				$('#industry_number').addClass('c-badge-exclude');
				industry = industry+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry"><span class="text-exclude">'+typedyna+'</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
				industry_count++;
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
			if (/*type =='city' &&*/ $(this).val() && typee == 'joblevels' && secrhtype=='Exculde' ) {
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
                parentvalue : $(this).attr('data-id-parent'),
                type:'exclude'
            });
        }   
        if (/*type =='city' &&*/ $(this).val() && typee == 'Jobfunctions' && secrhtype=='Exculde' ) {
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
                parentvalue : $(this).attr('data-id-parent'),
                type:'exclude'
            });
            var datas = '';
        }
		});
        console.log($('.filter_result:checked'));
		$('.filter_result:checked').each(function(){
			var incld_value = $(this).val();
			var secrhtype =$(this).attr('data-type');
            typee = $(this).attr('data-id');
			var typedyna = 'include';
			if ($(this).val() && typee == 'industry' && secrhtype=='include' ) {
				var typeofchekedindus = 'include';
				industry = industry+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry"><span class="text-success">'+typedyna+'</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
				industry_count++;
			}
			if ( $(this).val() && typee == 'state' && secrhtype=='include' ) {
				var typeofchekedstate = 'include';
				state_count++;
				state = state+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state"><span class="text-success">'+typedyna+'</span>   '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
			
			}
			if ($(this).val() && typee == 'city' && secrhtype=='include' ) {
				var typeofchekedcity = 'include';
				var datas = '';
				city_count++;
				city = city+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city"><span class="text-success">'+typedyna+'</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
			}	
			if (/*type =='city' &&*/ $(this).val() && typee == 'joblevels' && secrhtype=='include' ) {
			var 	typejoblevels='include';
            joblevelarray.push({
                link :  $(this).attr('is-parent'), 
                value:  $(this).val(),
                parentvalue : $(this).attr('data-id-parent'),
                type:'include'
            });
        }   
        if (/*type =='city' &&*/ $(this).val() && typee == 'Jobfunctions' && secrhtype=='include' ) {

       
            isparent = parseInt($(this).attr('is-parent'));
            job_fun.push({
                link :  $(this).attr('is-parent'), 
                value:  $(this).val(),
                parentvalue : $(this).attr('data-id-parent'),
                 type:'include'
            });
            var datas = '';
        }
		});
		$('.tag').each(function() {
	        var category = $(this).attr('data-id');
	        var country = $(this).attr('new-data');
	        coun_contry++;
	        $('input[type=checkbox][value="'+country+'"]').prop('checked', true);
	        countrval = countrval+'<li class="filter-save-data" new-data="'+country+'" data-id="country"><span class="text-success">include</span>  '+country+'<button type="button" class="removefiles fa fa-times "></button></li>';

	        
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


		if(coun_contry>0){
			$('#remove-country').show();
		 	$('.selected_value .'+ 'country').html('');
		 	$('.selected_value .'+ 'country').append(countrval); 
		 	$('.industry_count').html("There is "+ coun_contry +" Selected item"); 
			$('#remove-country').html(coun_contry); 
		}


		var parent_joblevel=[];
	    var child_jooblevel=[];
	    jQuery.each(joblevelarray, function(index, value) {
	        if(value.link==='parent'){
	                parent_joblevel.push({
	                value:value.value,
	                type:value.type
	            });
	        }else{
	            child_jooblevel.push({
	                value:value.value,
	                parentvalue:value.parentvalue,
	                type:value.type
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
	    if(parent_joblevel.length>0){
	    	
	        jQuery.each(parent_joblevel, function(index, value) {
	        	joblevels_count++;
	        	if(value.type=='include'){
        			dynacls = 'text-success';
	        	}else{
	        		dynacls='text-exclude';
	        	}
	            joblevels  = joblevels+'<li class="filter-save-data" new-data="'+value.value+'" data-id="joblevels"><span class="'+dynacls+'">'+value.type+'</span> '+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	                        //filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value.parentvalue+'/'+value.value+'" data-id="joblevels"><span class="text-success">include</span>  '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';

	        });
	    }
	    if(child_jooblevel.length>0 ){
	        jQuery.each(child_jooblevel, function(index, value) {
	            if(value== null){

	            } else { 
	            	joblevels_count++;
	            	if(value.type=='include'){
	        		dynacls = 'text-success';
		        	}else{
		        		dynacls='text-exclude';
		        	}
	                joblevels  = joblevels+'<li class="filter-save-data" new-data="'+value.parentvalue+'/'+value.value+'" data-id="joblevels"><span class="'+dynacls+'">'+value.type+'</span> '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	            } 

	        });
	    }
	    var parent_job = [];
	    var child_job  =[];
	    jQuery.each(job_fun, function(index, value) {
	        if(value.link==='parent'){
	            parent_job.push({
	                value:value.value,
	                type:value.type
	            });
	        }else{
	            child_job.push({
	                value:value.value,
	                parentvalue:value.parentvalue,
	                type:value.type
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
	    if(parent_job.length>0 ){
	        jQuery.each(parent_job, function(index, value) {
	        	Jobfunctions_count++;
	        	if(value.type=='include'){
	        		dynacls = 'text-success';
	        	}else{
	        		dynacls='text-exclude';
	        	}
	            Jobfunctions  = Jobfunctions+'<li class="filter-save-data" new-data="'+value.value+'" data-id="Jobfunctions"><span class="'+dynacls+'">'+value.type+'</span>'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	        });
	    } 
	    if(child_job.length>0 ){
	        jQuery.each(child_job, function(index, value) {
	            if(value== null){

	            } else { 
	            	Jobfunctions_count++;
	            	if(value.type=='include'){
	        		dynacls = 'text-success';
		        	}else{
		        		dynacls='text-exclude';
		        	}
	                Jobfunctions  = Jobfunctions+'<li class="filter-save-data" new-data="'+value.parentvalue+'/'+value.value+'" data-id="Jobfunctions"><span class="'+dynacls+'">'+value.type+'</span> '+value.parentvalue+'/'+value.value+'<button type="button" class="removefiles fa fa-times "></button></li>';
	            } 

	        });
	    }


	    
		if(industry != ''){
			$('#industry_number').show();
		 	$('.selected_value .'+ 'industry').html('');
		 	$('.selected_value .'+ 'industry').append(industry); 
		 	$('.industry_count').html("There is "+ industry_count +" Selected item"); 
			$('#industry_number').html(industry_count); 
		}
		// if(state != ''){
		//  	$('.selected_value .'+ 'state').html('');
		//  	$('.selected_value .'+ 'state').append(state); 
		// }
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
    var siccodes=[];
    var naicscodes=[];
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
    var ownershipexclude      =[];
    var businessexclude = [];
    var yearfoundedexclude = [];
    var zipcodeexclude      =[];
    var siccodeexclude      =[];
    var naicscodeexclude      =[];
    var joblevelsexclude      =[];
    var job_funtionexclude      =[];
    var emp_range=[];
    var rev_range = [];
    var range={};
    var zipcode = [];
    var siccode = [];
    var naicscode = [];
    var ownership = [];
    var business = [];
    var yearfounded = [];
    var filter = '';
    var filter1='';
    var filter_commy1='';
    var count ='';
    var state_count = '';
    var city_count = '';
    var joblevels_counts = '';
    var job_funtion_count = '';
    var company_count = '';
    var zipcode_count = '';
    var filter2=company_filter=filter_company='';
    var filter3=countryhtml='';
    var flag = 1;
    var url_details = window.location.pathname;
    var companycount = 0;
    var ownershipcount = 0;
    var businesscount = 0;
    var yearfoundedcount = 0;
    var type = $('#type_filter').val();
    $('#'+type+'_number').css("z-index", "99999"); 
    var opendivname = $('#showdivid').val();
    if($('input[type=checkbox][data-id=country]:checked').attr("new-data") != 'United States') {
        console.log('Country is not United States');
        $('input[type=checkbox][data-id=state]').prop('checked',false);
        $('input[type=checkbox][data-id=city]').prop('checked',false);
        $('.zipcod').val('');
    }
    if(types ==='employee'|| types ==='revenue' || types === 'zipcodes' || types === 'siccodes' || types === 'naicscodes') {
    	 $('.all_selected_value li').each(function() {
            // if($(this).attr('data-id')=='Employee') {
            //     filter += '<li class="filter-save-data loca-tion" new-data="'+$(this).attr('new-data')+'" data-id="Employee" >'+$(this).html()+'</li>';
            //     flag_range=0;
            // }
            // if($(this).attr('data-id')=='Revenue') {
            //     filter += '<li class="filter-save-data loca-tion" new-data="'+$(this).attr('new-data')+'" data-id="Revenue" >'+$(this).html()+'</li>';
            //     flag_range=0;
            // }
        });
    }else {
    	var emp = 0;
    	var ren = 0;
    	$('.all_selected_value li').each(function(){    	 	    	 	
	 		if($(this).attr('data-id')=='Employee'){    
        		emp = 1;  console.log('538');        
        	}    
            if($(this).attr('data-id')=='Revenue'){  
            	ren = 1;            
            } 
        });
        if(emp == 0){//console.log('540');
        		$('#first_range').val('');
        		$('#second_range').val('');
        } 
        if(ren == 0){
            	$('#first_revenue').val('');
            	$('#second_revenue').val('');
            }
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
        console.log(incld_value,typee,secrhtype);
        if (/*type =='industry' && */ $(this).val() && typee == 'industry' && secrhtype=='include') {
            filter = filter+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry">'+'industry: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }

        if (type =='industry' &&  $(this).val() && typee == 'industry'  && secrhtype=='include') {
            filter1 = filter1+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }


        if (type =='country' &&  $(this).val() && typee == 'country'  && secrhtype=='include') {
        //data['country'] = $(this).val();
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="country"><span class="text-success">include</span>   '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }
        if (/*type =='country' &&*/  $(this).val() && typee == 'country' && secrhtype=='include') {
        //data['country'] = $(this).val();
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="country"><span class="text-success">include</span>   '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
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
        //Start Checked Elements For type == 'ownership'
        if (/*type =='ownership' &&*/ $(this).val() && typee == 'ownership' && secrhtype=='include') {
            var datas = '';
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="ownership">'+'BusinessType: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }   
        if (type =='ownership' && $(this).val() && typee == 'ownership'  && secrhtype=='include') {
            var datas = '';
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="ownership"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }
        //End Checked Elements For type == 'ownership'
        //Start Checked Elements For type == 'business'
        if (/*type =='business' &&*/ $(this).val() && typee == 'business' && secrhtype=='include') {
            var datas = '';
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="business">'+'BusinessModel: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }   
        if (type =='business' && $(this).val() && typee == 'business'  && secrhtype=='include') {
            var datas = '';
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="business"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }
        //End Checked Elements For type == 'business'
        //Start Checked Elements For type == 'yearfounded'
        if (/*type =='yearfounded' &&*/ $(this).val() && typee == 'yearfounded' && secrhtype=='include') {
            var datas = '';
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="yearfounded">'+'FoundYear: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }   
        if (type =='yearfounded' && $(this).val() && typee == 'yearfounded'  && secrhtype=='include') {
            var datas = '';
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="yearfounded"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }
        //End Checked Elements For type == 'yearfounded'
        if (/*type =='city' &&*/ $(this).val() && typee == 'joblevels' && secrhtype=='include') {
            if($('div#'+typee+' span.c-badge-exclude').length==0){
                $('#'+typee+'_number').removeClass('c-badge-exclude');
            }
            if($('div#'+typee+' span.c-badge-success').length>0){
                $('#'+typee+'_number').addClass('c-badge-success');
            }
            if($('div#'+'Jobfunctions'+' span.c-badge-exclude').length==0){
                $('#'+'Jobfunctions'+'_number').removeClass('c-badge-exclude');
            }
            if($('div#'+'Jobfunctions'+' span.c-badge-success').length>0){
                $('#'+'Jobfunctions'+'_number').addClass('c-badge-success');
            }            
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="joblevels"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            if(type == 'joblevels') {
                $('input[data-id="Jobfunctions"]').prop('checked',false);
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="joblevels"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            }
            $('.gap-job-title').css('display','block');
            $('#Jobfunctions_number').css("display","none");
            $('.list-titles').css('display','none');      
            $('li[list-level="'+$(this).val()).css('display','block');
        }   
        if (type !='joblevels' && $(this).val() && typee == 'Jobfunctions' && secrhtype=='include') {
            if($('div#'+typee+' span.c-badge-exclude').length==0){
                $('#'+typee+'_number').removeClass('c-badge-exclude');
            }
            if($('div#'+typee+' span.c-badge-success').length>0){
                $('#'+typee+'_number').addClass('c-badge-success');
            }
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="Jobfunctions"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            if(type == 'Jobfunctions')
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="Jobfunctions"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }   
    });
    /*
    var coun_contry = 0;
    if(type=='country'){
        $('#div_country   ul.c-choice-tree li  input[type=checkbox]:checked').each(function(){
            type12 = $(this).attr('data-id');
            cont_value = $(this).attr('new-data');
            coun_contry++;
            $('.tag').remove();
            filter =filter+'<span class="tag-first tag" new-data="'+cont_value+'" data-id="country">Country: '+cont_value+'<button type="button" class="tag-remove removefiles"></button> </span>';
            //countryhtml=countryhtml+'<li class="c-filter-selected-list-item" new-data='+cont_value+' data-id='+type12+'>  <span  class="gap-right-small text-success">include</span><span class="gap-right"  >'+cont_value+'</span><button class="button button-only-icon u-gap-left-auto link-quaternary"  type="button"><i class="icon icon-clear font-regular block removefiles"  aria-hidden="true"></i><span  class="visually-hidden">Remove</span></button></li>';
        	countryhtml=	countryhtml + '<li class="filter-save-data" new-data="'+cont_value+'" data-id="country"><span class="text-success">include</span>  '+cont_value+'<button type="button" class="removefiles fa fa-times "></button></li>';

        });
        if(countryhtml!=''){
            $('.selected_value .'+ type12).html('');
            $('.selected_value .'+ type12).html(countryhtml);
        }

    }
    */
    var zipcod = $('.zipcod').val();
    if(zipcod !=''){
        zipcodes.push(zipcod);
    }
    //$('.zipcod').val("");
    var siccod = $('.siccod').val();
    if(siccod !=''){
        siccodes.push(siccod);
    }
    var naicscod = $('.naicscod').val();
    if(naicscod !=''){
        naicscodes.push(naicscod);
    }
    //Start type == 'zipcode'
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
    //End type == 'zipcode'
    //Start type == 'siccode'
    if(siccodes.length > 0 && type=='siccode') {
        $.each(siccodes,function(index,value){
            if(value== null){
            }else{
                filter = filter+'<li class="filter-save-datav loca-tion" new-data="'+value+'" data-id="siccode" > SICcode: '+value+' <button type="button" class="removefiles fa fa-times " ></button></li>';
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="siccode" > SICcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });

    }else{

        $.each(siccodes,function(index,value){
            if(value== null){
            }else{
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="siccode" > SICcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });
    }
    //End type == 'siccode'
    //Start type == 'naicscode'
    if(naicscodes.length > 0 && type=='naicscode') {
        $.each(naicscodes,function(index,value){
            if(value== null){
            }else{
                filter = filter+'<li class="filter-save-datav loca-tion" new-data="'+value+'" data-id="naicscode" > NAICScode: '+value+' <button type="button" class="removefiles fa fa-times " ></button></li>';
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="naicscode" > NAICScode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });

    }else{

        $.each(naicscodes,function(index,value){
            if(value== null){
            }else{
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="naicscode" > NAICScode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });
    }
    //End type == 'naicscode'
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
    var ranges  =[];
    $('.range').each(function(){
        var typeran = $(this).attr('id');
        if (typeran =='first_range' && $(this).val()) {
            range['first_range'] = parseInt($(this).val());
            if(range['first_range']>999 && range['first_range']<=999999){
                ranges['first_range'] = parseFloat(range['first_range']/1000).toFixed(1);
                var res = ranges['first_range'].split(".");
                if(res[1]==='0'){
                	ranges['first_range'] = res[0];
                }
                ranges['first_range']=ranges['first_range']+'k';
            }else if( range['first_range']>999999 && range['first_range']<999999999){
                ranges['first_range'] = parseFloat(range['first_range']/1000000).toFixed(1);
                var res = ranges['first_range'].split(".");
                if(res[1]==='0'){
                	ranges['first_range'] = res[0];
                }
                ranges['first_range']=ranges['first_range']+'M';
            }else if( range['first_range']>999999 && range['first_range']<999999999){
                ranges['first_range'] = parseFloat(range['first_range']/10000000).toFixed(1);
                var res = ranges['first_range'].split(".");
                if(res[1]==='0'){
                	ranges['first_range'] = res[0];
                }
                ranges['first_range']=1+'B';//1000,000,000
            }
            else{
                ranges['first_range']=range['first_range'];
            }
        }

        if (typeran =='second_range' && $(this).val()) {
            range['second_range'] = parseInt($(this).val());
            if(range['second_range']>999 && range['second_range']<=999999){
                ranges['second_range'] = parseFloat(range['second_range']/1000).toFixed(1);
                var res = ranges['second_range'].split(".");
                if(res[1]==='0'){
                	ranges['second_range'] = res[0];
                }
                ranges['second_range']=ranges['second_range']+'k';
            }else if( range['second_range']>999999 && range['second_range']<=999999999){
                ranges['second_range'] = parseFloat(range['second_range']/1000000).toFixed(1);
                var res = ranges['second_range'].split(".");
                if(res[1]==='0'){
                	ranges['second_range'] = res[0];
                }
                ranges['second_range']=ranges['second_range']+'M';
            }else if(range['second_range']>999999999){
            	$('#second_range').val('');
            	ranges['second_range']=1+'b';
            }
            else{
                ranges['second_range']=range['second_range'];
            }
        }

        if (typeran =='first_revenue' && $(this).val()) {
            range['first_revenue'] = parseInt($(this).val());
            if(range['first_revenue']>999 && range['first_revenue']<999999){
                ranges['first_revenue'] = parseFloat(range['first_revenue']/1000).toFixed(1);
                var res = ranges['first_revenue'].split(".");
                if(res[1]==='0'){
                	ranges['first_revenue'] = res[0];
                }
                ranges['first_revenue']=ranges['first_revenue']+'k';
            }else if( range['first_revenue']>999999 && range['first_revenue']<999999999){
                ranges['first_revenue'] = parseFloat(range['first_revenue']/1000000).toFixed(1);
                var res = ranges['first_revenue'].split(".");
                if(res[1]==='0'){
                	ranges['first_revenue'] = res[0];
                }
                ranges['first_revenue']=ranges['first_revenue']+'M';
            }else if( range['first_revenue']>999999 && range['first_revenue']<99999999){
                ranges['first_revenue'] = parseFloat(range['first_revenue']/10000000).toFixed(1);
                var res = ranges['first_revenue'].split(".");
                if(res[1]==='0'){
                	ranges['first_revenue'] = res[0];
                }
                ranges['first_revenue']=1+'B';
            }
            else{
                ranges['first_revenue']=range['first_revenue'];
            }
        }
        if (typeran =='second_revenue' && $(this).val()) {
            range['second_revenue'] = parseInt($(this).val());
            if(range['second_revenue']>999 && range['second_revenue']<=999999){
                ranges['second_revenue'] = parseFloat(range['second_revenue']/1000).toFixed(1);
                var res = ranges['second_revenue'].split(".");
                if(res[1]==='0'){
                	ranges['second_revenue'] = res[0];
                }
                
                ranges['second_revenue']=ranges['second_revenue']+'k';
            }else if( range['second_revenue']>999999 && range['second_revenue']<999999999 ){
                ranges['second_revenue'] = parseFloat(range['second_revenue']/1000000).toFixed(1);
                var res = ranges['second_revenue'].split(".");
                if(res[1]==='0'){
                	ranges['second_revenue'] = res[0];
                }
                ranges['second_revenue']=ranges['second_revenue']+'M';
            }else if( range['second_revenue']> 99999999  && range['second_revenue']<9999999999){//99,945,999,999
                ranges['second_revenue'] = parseFloat(range['second_revenue']/1000000).toFixed(1);
                var res = ranges['second_revenue'].split(".");
                if(res[1]==='0'){
                	ranges['second_revenue'] = res[0];
                }
                ranges['second_revenue']=ranges['second_revenue']+'1B';
            }
            else{
                ranges['second_revenue']=range['second_revenue'];
            }
        }
    });
    if(types=='employee' || types==='revenue'  || range['first_range'] != '' || range['second_range'] != '' || range['first_revenue'] != '' || range['second_revenue'] != '' ){
         var flag_range=1;
         var flag_emprange=1;
    }
    if(range['first_range']>range['second_range']  ||  range['first_revenue']>range['second_revenue']){
        
        
        $('.all_selected_value li').each(function() {
            // if($(this).attr('data-id')=='Employee') {
            //     filter += '<li class="filter-save-data loca-tion" new-data="'+$(this).attr('new-data')+'" data-id="Employee" >'+$(this).html()+'</li>';
            //     flag_range=0;
            // }
            // if($(this).attr('data-id')=='Revenue') {
            //     filter += '<li class="filter-save-data loca-tion" new-data="'+$(this).attr('new-data')+'" data-id="Revenue" >'+$(this).html()+'</li>';
            //     flag_range=0;
            // }
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
    if(range['first_range'] != null && range['second_range'] !=null && flag_range==1   ){
        filter = filter+'<li class="filter-save-data loca-tion" new-data="'+ranges['first_range']+'-'+ranges['second_range']+'" data-id="Employee" > Employee: '+ranges['first_range']+'-'+ranges['second_range']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    	textsvalue = ranges['first_range']+'-'+ranges['second_range'];
    	$('.Employee-text').html(textsvalue);
    }else if(ranges['first_range'] != null && ranges['second_range']==null && flag_range==1 ){
        filter = filter+'<li class="filter-save-data loca-tion" new-data="'+ranges['first_range']+'-'+'1B'+'" data-id="Employee" > Employee: '+ranges.first_range+'-'+'1B'+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    	textsvalue = ranges['first_range']+'- 1B';
    	$('.Employee-text').html(textsvalue);
    }else if(range['first_range'] == null && range['second_range'] !=null && flag_range==1){
        filter = filter+'<li class="filter-save-data loca-tion"  new-data="0 -'+ranges['second_range']+'" data-id="Employee" > Employee: '+'0'+'-'+ranges['second_range']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
   		textsvalue = '0 -'+ranges['second_range'];
    	$('.Employee-text').html(textsvalue);
    }

    


    if(range['first_revenue'] != null && range['second_revenue'] !=null  && flag_range==1)    {
        filter = filter+'<li class="filter-save-data loca-tion" new-data="'+ranges['first_revenue']+'-'+ranges['second_revenue']+'" data-id="Revenue" > Revenue: '+ranges['first_revenue']+'-'+ranges['second_revenue']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    //revenue-text
    	textsvalue = ranges['first_revenue']+'-'+ranges['second_revenue'];
    	$('.revenue-text').html(textsvalue);

    }else if(range['first_revenue'] != null && range['second_revenue']==null  && flag_range==1) {
        filter = filter+'<li class="filter-save-data loca-tion" new-data="'+range['first_revenue']+'-'+'1B'+'" data-id="Revenue" > Revenue: '+ranges['first_revenue']+'-'+'1B'+' <button type="button" class="removefiles fa fa-times" ></button></li>';
   		textsvalue = ranges['first_revenue']+'- 1T';
    	$('.revenue-text').html(textsvalue);
   }else if(range['first_revenue'] == null && range['second_revenue'] !=null  && flag_range==1)  {
        filter = filter+'<li class="filter-save-data loca-tion"  data-id="Revenue" > Revenue: '+'0'+'-'+ranges['second_revenue']+' <button type="button" class="removefiles fa fa-times" ></button></li>';
    	textsvalue = '0 -'+ranges['second_revenue'];
    	$('.revenue-text').html(textsvalue);
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
        }else if(category=='ownership'){
            ownership.push($(this).attr('new-data'));
        }else if(category=='business'){
            business.push($(this).attr('new-data'));
        }else if(category=='yearfounded'){
            yearfounded.push($(this).attr('new-data'));
        }else if(category=='zipcode'){
            zipcode.push($(this).attr('new-data'));
        }else if(category=='siccode'){
            siccode.push($(this).attr('new-data'));
        }else if(category=='naicscode'){
            naicscode.push($(this).attr('new-data'));
        }else if(category=='joblevels'){
            joblevels.push($(this).attr('new-data'));
        }else if(category=='Jobfunctions'){
            job_funtion.push($(this).attr('new-data'));
        }else if(category=='Employee'){
        	emp_range.push($(this).attr('new-data'));        	
        }else if(category=='Revenue'){
        	rev_range.push($(this).attr('new-data')); 
        }else if(category=='country'){
            countries.push($(this).attr('new-data'));
            $("#remove-country").html(countries.length);
            console.log('country length:' + countries.length );
            if(countries.length > 0) {
                $("#remove-country").css("display","block");
            }else {
                $("#remove-country").css("display","none");
            }
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
        }else if(category=='ownership'){
            ownershipexclude.push($(this).attr('new-data'));
        }else if(category=='business'){
            businessexclude.push($(this).attr('new-data'));
        }else if(category=='yearfounded'){
            yearfoundedexclude.push($(this).attr('new-data'));
        }else if(category=='zipcode'){
            zipcodeexclude.push($(this).attr('new-data'));
        }else if(category=='siccode'){
            siccodeexclude.push($(this).attr('new-data'));
        }else if(category=='naicscode'){
            naicscodeexclude.push($(this).attr('new-data'));
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
    if(ownershipexclude !=''){
        data['ownership_exclude'] = ownershipexclude;
    }
    if(businessexclude !=''){
        data['business_exclude'] = businessexclude;
    }
    if(yearfoundedexclude !=''){
        data['yearfounded_exclude'] = yearfoundedexclude;
    }
    if(cityexclude!=''){
        data['city_exclude'] = city;
    }
    if(zipcodeexclude!=''){
        data['zipcode_exclude'] = zipcodeexclude;
    }
    if(siccodeexclude!=''){
        data['siccode_exclude'] = siccodeexclude;
    }
    if(naicscodeexclude!=''){
        data['naicscode_exclude'] = naicscodeexclude;
    }
    if(joblevelsexclude != ''){
        data['job_level_exclude']=joblevelsexclude;
    }
    if(job_funtionexclude != ''){
        data['job_function_exclude']=job_funtionexclude;
    }
    if(emp_range!=''){
    	data['Employe_range'] = emp_range;
    }
    if(rev_range!=''){
    	data['Revenue_range'] = rev_range;
    }
    if(SerachType !=''){
    	data['types']=SerachType;
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
    // company_count=companies.length;
    if(companycount>0){
    // company_count
        $('.company_count').html("There is "+ companycount +" Selected item"); 
        $('#company_number').show();
        $('#company_number').html(companycount);
    }
    //ownership_count
    ownershipcount = ownership.length;
    if(ownershipcount>0){
        $('.ownership_count').html("There is "+ ownershipcount +" Selected item");
        $('#ownership_number').css("display","block");
        $('#ownership_number').html(ownershipcount);
    }
    //business_count
    businesscount = business.length;
    if(businesscount>0){
        $('.business_count').html("There is "+ businesscount +" Selected item");
        $('#business_number').css("display","block");
        $('#business_number').html(businesscount);
    }
    //yearfounded_count
    yearfoundedcount = yearfounded.length;
    if(yearfoundedcount>0){
        $('.yearfounded_count').html("There is "+ yearfoundedcount +" Selected item");
        $('#yearfounded_number').css("display","block");
        $('#yearfounded_number').html(yearfoundedcount);
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
    if(ownership != '') {
        data['ownership'] = ownership;
    }
    if(business != '') {
        data['business'] = business;
    }
    if(yearfounded != '') {
        data['yearfounded'] = yearfounded;
    }
    if(city!=''){
        data['city'] = city;
    }
    if(zipcode!=''){
        data['zipcode'] = zipcode;
    }
    if(siccode!=''){
        data['siccode'] = siccode;
    }
    if(naicscode!=''){
        data['naicscode'] = naicscode;
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
    if(flag ==1 ){
    	console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/demofilter',
            data: {
            'data': data,
            'range':range,
            'ranges':ranges,
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
                console.log(data.job_level_filtered,data.job_title_filtered);
                hidelodare();
                if(data.job_level_filtered == false) {
                    $('.default-msg-for-contacts').text('');
                    $('.tool-top-bar-notification').text('Now please select Job Level before making the search quarries');
                    $('.tool-top-bar-notification').css("color","red"); 
                    $("#show_more_filters").css('display','none');
                }
                if(data.job_level_filtered == true && data.job_title_filtered == false) { 
                    $('.default-msg-for-contacts').text('');   
                    $('.tool-top-bar-notification').text('Now please select Job Title before making the search quarries');
                    $('.tool-top-bar-notification').css("color","red"); 
                    $("#show_more_filters").css('display','none');
                }
                if(data.job_title_filtered == true) {
                    $('.require-level-title').removeClass('require-level-title');
                    if(data.job_format == '1') {                     
                        $("#show_more_filters").css('display','block');
                    } else if(data.job_format == '2'){ 
                        $("#show_more_filters").css('display','none');
                    }else { console.log('unknown job level format response - job_format : ' + data.job_format)}
                    companydetails(data);
                }
                
            }
        });
    }
}

function validationexclude(types){
    var zipcodes=[];
    var siccodes = [];
    var naicscodes = [];
    var data = {};
    var dataexclude={};
    var state = [];
    var industries = [];
    var city = [];
    var company = [];
    var ownership = [];
    var business = [];
    var yearfounded = [];
    var joblevels= [];
    var job_funtion = [];
    var countries =[];
    var job_fun =[];
    var joblevelarray = [];
    var industriesexclude      =[];
    var stateexclude      =[];
    var cityexclude      =[];
    var companyexclude      =[];
    var ownershipexclude = [];
    var businessexclude = [];
    var yearfoundedexclude = [];
    var zipcodeexclude      =[];
    var siccodeexclude      =[];
    var naicscodeexclude      =[];
    var joblevelsexclude      =[];
    var job_funtionexclude      =[];

    var range={};
    var zipcode = [];
    var siccode = [];
    var naicscode = [];
    var filter = '';
    var filter1='';
    var filter_commy1='';
    var count ='';
    var state_count = '';
    var city_count = '';
    var joblevels_counts = '';
    var job_funtion_count = '';
    var zipcode_count = '';
    var company_count = 0;
    var ownership_count = 0;
    var business_count = 0;
    var yearfounded_count = 0;
    var zipcode_count = '';
    var filter2=company_filter=filter_company='';
    var filter3=countryhtml='';
    var flag = 1;
    var url_details = window.location.pathname;
    var type = $('#type_filter').val();
    // console.log(type);
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
        var secrhtype =$(this).attr('data-type');
        if (/*type =='industry' && */ $(this).val() && typee == 'industry' && secrhtype=='Exculde' ) {
            //$(this).attr('data-type', 'Exculde');
            filter = filter+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry">'+'industry: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }

        if (type =='industry' &&  $(this).val() && typee == 'industry'&& secrhtype=='Exculde') {
            // console.log('970indus');
            var opendivname = $('#'+typee).attr('data-box');
                if($('div#'+typee+' span.c-badge-success').length>0){
                    $('#'+typee+'_number').removeClass('c-badge-success');
                }
                if($('div#'+typee+' span.c-badge-exclude').length==0){
                    $('#'+typee+'_number').addClass('c-badge-exclude');
                }
            filter1 = filter1+'<li class="filter-save-data" new-data="'+incld_value+'" data-id="industry"><span class="text-exclude">exclude</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
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
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="state"><span class="text-exclude">exclude</span>   '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
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
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="city"><span class="text-exclude">exclude</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }
        //Start checked elements for type == 'ownership' Exclude
        if (/*type =='ownership' &&*/ $(this).val() && typee == 'ownership'&& secrhtype=='Exculde') {
            var datas = '';
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="ownership">'+'BusinessType: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }   
        if (type =='ownership' && $(this).val() && typee == 'ownership'&& secrhtype=='Exculde') {
            var datas = '';
            var opendivname = $('#'+typee).attr('data-box');
                if($('div#'+typee+' span.c-badge-success').length>0){
                    $('#'+typee+'_number').removeClass('c-badge-success');
                }
                if($('div#'+typee+' span.c-badge-exclude').length==0){
                    $('#'+typee+'_number').addClass('c-badge-exclude');
                }
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="ownership"><span class="text-exclude">exclude</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }
        //End checked elements for type == 'ownership' Exclude
        //Start checked elements for type == 'business' Exclude
        if (/*type =='business' &&*/ $(this).val() && typee == 'business'&& secrhtype=='Exculde') {
            var datas = '';
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="business">'+'BusinessModel: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }   
        if (type =='business' && $(this).val() && typee == 'business'&& secrhtype=='Exculde') {
            var datas = '';
            var opendivname = $('#'+typee).attr('data-box');
                if($('div#'+typee+' span.c-badge-success').length>0){
                    $('#'+typee+'_number').removeClass('c-badge-success');
                }
                if($('div#'+typee+' span.c-badge-exclude').length==0){
                    $('#'+typee+'_number').addClass('c-badge-exclude');
                }
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="business"><span class="text-exclude">exclude</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }
        //End checked elements for type == 'business' Exclude
        //Start checked elements for type == 'yearfounded' Exclude
        if (/*type =='yearfounded' &&*/ $(this).val() && typee == 'yearfounded'&& secrhtype=='Exculde') {
            var datas = '';
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="yearfounded">'+'FoundedYear: '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }   
        if (type =='yearfounded' && $(this).val() && typee == 'yearfounded'&& secrhtype=='Exculde') {
            var datas = '';
            var opendivname = $('#'+typee).attr('data-box');
                if($('div#'+typee+' span.c-badge-success').length>0){
                    $('#'+typee+'_number').removeClass('c-badge-success');
                }
                if($('div#'+typee+' span.c-badge-exclude').length==0){
                    $('#'+typee+'_number').addClass('c-badge-exclude');
                }
            filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="yearfounded"><span class="text-exclude">exclude</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
        }
        //End checked elements for type == 'yearfounded' Exclude
        if (/*type =='city' &&*/ $(this).val() && typee == 'joblevels'&& secrhtype=='Exculde') {
            var opendivname = $('#'+typee).attr('data-box');
            if($('div#'+typee+' span.c-badge-success').length>0){
                $('#'+typee+'_number').removeClass('c-badge-success');
            }
            if($('div#'+typee+' span.c-badge-exclude').length==0){
                $('#'+typee+'_number').addClass('c-badge-exclude');
            }
            if($('div#'+'Jobfunctions'+' span.c-badge-success').length>0){
                $('#'+'Jobfunctions'+'_number').removeClass('c-badge-success');
            }
            if($('div#'+'Jobfunctions'+' span.c-badge-exclude').length==0){
                $('#'+'Jobfunctions'+'_number').addClass('c-badge-exclude');
            } 
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="joblevels"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            if(type == 'joblevels') {
                $('input[data-id="Jobfunctions"]').prop('checked',false);
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="joblevels"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            }
            $('.gap-job-title').css('display','block');
            $('#Jobfunctions_number').css("display","none");
            $('.list-titles').css('display','none');      
            $('li[list-level="'+$(this).val()).css('display','block');
        }
        if (type !='joblevels' && $(this).val() && typee == 'Jobfunctions'&& secrhtype=='Exculde') {
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="Jobfunctions"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            if(type == 'joblevels')
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+incld_value+'" data-id="Jobfunctions"><span class="text-success">include</span>  '+incld_value+'<button type="button" class="removefiles fa fa-times "></button></li>';
            var opendivname = $('#'+typee).attr('data-box');
            if($('div#'+typee+' span.c-badge-success').length>0){
                $('#'+typee+'_number').removeClass('c-badge-success');
            }
            if($('div#'+typee+' span.c-badge-exclude').length==0){
                $('#'+typee+'_number').addClass('c-badge-exclude');
            }
        }   

    });
    /*
    var coun_contry = 0;
    if(type=='country'){
        $('#div_country   ul.c-choice-tree li  input[type=checkbox]:checked').each(function(){
            type12 = $(this).attr('data-id');
            cont_value = $(this).attr('new-data');
            coun_contry++;
            $('.tag').remove();
            filter =filter+'<span class="tag-first tag" new-data="'+cont_value+'" data-id="country">Country: '+cont_value+'<button type="button" class="tag-remove removefiles"></button> </span>';
            countryhtml=countryhtml+'<li class="filter-save-data" new-data="'+cont_value+'" data-id="country">  <span  class="gap-right-small text-success">include</span><span class="gap-right"  >'+cont_value+'</span><button class="button button-only-icon u-gap-left-auto link-quaternary"  type="button"><i class="icon icon-clear font-regular block removefiles"  aria-hidden="true"></i><span  class="visually-hidden">Remove</span></button></li>';
        	//<li class="filter-save-data" new-data="United States" data-id="country"><span class="text-success">include</span>  United States<button type="button" class="removefiles fa fa-times "></button></li>
        });
        if(countryhtml!=''){
            $('.selected_value .'+ type12).html('');
            $('.selected_value .'+ type12).html(countryhtml);
        }

    }
    */
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
    //Start type == 'siccode'
    var siccod = $('.siccod').val();
    if(siccod !=''){
        siccodes.push(siccod);
    }
    if(siccodes.length > 0 && type=='siccode') {
        $.each(siccodes,function(index,value){
            if(value== null){
            }else{
                filter = filter+'<li class="filter-save-datav loca-tion" new-data="'+value+'" data-id="siccode" > SICcode: '+value+' <button type="button" class="removefiles fa fa-times " ></button></li>';
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="siccode" > SICcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });

    }else{

        $.each(siccodes,function(index,value){
            if(value== null){
            }else{
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="siccode" > SICcode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });
    }
    //End type == 'siccode

    //Start type == 'naicscode'
    var naicscod = $('.naicscod').val();
    if(naicscod !=''){
        naicscodes.push(naicscod);
    }
    if(naicscodes.length > 0 && type=='naicscode') {
        $.each(naicscodes,function(index,value){
            if(value== null){
            }else{
                filter = filter+'<li class="filter-save-datav loca-tion" new-data="'+value+'" data-id="naicscode" > NAICScode: '+value+' <button type="button" class="removefiles fa fa-times " ></button></li>';
                filter1 = filter1+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="naicscode" > NAICScode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });

    }else{

        $.each(naicscodes,function(index,value){
            if(value== null){
            }else{
            filter = filter+'<li class="filter-save-data loca-tion" new-data="'+value+'" data-id="naicscode" > NAICScode: '+value+' <button type="button" class="removefiles fa fa-times" ></button></li>';
            }
        });
    }
    //End type == 'naicscode

    // var company_name = $('.comny').val();
    // if(company_name !=''  && type=='company' && types=='Exculde') {
    // companies.push({value:company_name,type:'exclude'});
    // $('.comny').val("");

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
    //console.log(companies.length);
    var ranges  =[];
    $('.range').each(function(){
        var typeran = $(this).attr('id');
        if (typeran =='first_range' && $(this).val()) {
            range['first_range'] = parseInt($(this).val());
            if(range['first_range']>999 && range['first_range']<999999){console.log('517');
                ranges['first_range'] = parseFloat(range['first_range']/1000).toFixed(2);
                ranges['first_range']=ranges['first_range']+'k';
            }else if( range['first_range']>99999999 && range['first_range']<999999999){
                ranges['first_range'] = parseFloat(range['first_range']/1000000).toFixed(2);
                ranges['first_range']=ranges['first_range']+'M';
            }else if( range['first_range']>999999 && range['first_range']<999999999){
                ranges['first_range'] = parseFloat(range['first_range']/10000000).toFixed(2);
                ranges['first_range']=1+'B';//1000,000,000
            }
            else{
                ranges['first_range']=range['first_range'];
            }
        }
       	if (typeran =='second_range' && $(this).val()) {
            range['second_range'] = parseInt($(this).val());
            if(range['second_range']>999 && range['second_range']<999999){console.log('517');
                ranges['second_range'] = parseFloat(range['second_range']/1000).toFixed(2);
                ranges['second_range']=ranges['second_range']+'k';
            }else if( range['second_range']>9999999 && range['second_range']<999999999){
                ranges['second_range'] = parseFloat(range['second_range']/1000000).toFixed(2);
                ranges['second_range']=ranges['second_range']+'M';
            }else if(range['second_range']>999999999){
            	$('#second_range').val('');
            	ranges['second_range']=1+'b';
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
        }else if(category=='ownership'){
            ownership.push($(this).attr('new-data'));
        }else if(category=='business'){
            business.push($(this).attr('new-data'));
        }else if(category=='yearfounded'){
            yearfounded.push($(this).attr('new-data'));
        }else if(category=='zipcode'){
            zipcode.push($(this).attr('new-data'));
        }else if(category=='siccode'){
            siccode.push($(this).attr('new-data'));
        }else if(category=='naicscode'){
            naicscode.push($(this).attr('new-data'));
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
        }else if(category=='ownership'){
            ownershipexclude.push($(this).attr('new-data'));
        }else if(category=='business'){
            businessexclude.push($(this).attr('new-data'));
        }else if(category=='yearfounded'){
            yearfoundedexclude.push($(this).attr('new-data'));
        }else if(category=='zipcode'){
            zipcodeexclude.push($(this).attr('new-data'));
        }else if(category=='siccode'){
            siccodeexclude.push($(this).attr('new-data'));
        }else if(category=='naicscode'){
            naicseexclude.push($(this).attr('new-data'));
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
    if(ownershipexclude !=''){

        data['ownership_exclude'] = ownershipexclude;
        $('.ownership_count').html("There is "+ ownershipexclude.length +" Selected item"); 
        $('#ownership_number').show();
        $('#ownership_number').html(ownershipexclude.length);
    }
    if(businessexclude !=''){

        data['business_name_exclude'] = businessexclude;
        $('.business_count').html("There is "+ businessexclude.length +" Selected item"); 
        $('#business_number').show();
        $('#business_number').html(businessexclude.length);
    }
    if(yearfoundedexclude !=''){

        data['yearfounded_exclude'] = yearfoundedexclude;
        $('.yearfounded_count').html("There is "+ yearfoundedexclude.length +" Selected item"); 
        $('#yearfounded_number').show();
        $('#yearfounded_number').html(yearfoundedexclude.length);
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
    if(siccodeexclude!=''){
        data['siccode_exclude'] = siccodeexclude;
    }
    if(naicscodeexclude!=''){
        data['naicscode_exclude'] = naicscodeexclude;
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
    //company_count=companies.length;
    if(company_count>0){
    // company_count
        $('.company_count').html("There is "+ company_count +" Selected item"); 
        $('#company_number').show();
        $('#company_number').html(company_count);
    }
    //Set Ownership Exclude count
    ownership_count = ownership.length;
    if(ownership_count>0){
        $('.ownership_count').html("There is "+ ownership_count +" Selected item"); 
        $('#ownership_number').show();
        $('#ownership_number').html(ownership_count);
    }
    //Set Business Model Exclude count
    business_count = business.length;
    if(business_count>0){
        $('.business_count').html("There is "+ business_count +" Selected item"); 
        $('#business_number').show();
        $('#business_number').html(business_count);
    }
    //Set FoundedYear Exclude count
    yearfounded_count = yearfounded.length;
    if(yearfounded_count>0){
        $('.yearfounded_count').html("There is "+ yearfounded_count +" Selected item"); 
        $('#yearfounded_number').show();
        $('#yearfounded_number').html(yearfounded_count);
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
    if(ownership != '') {
        data['ownership'] = ownership;
    }
    if(business != '') {
        data['business'] = business;
    }
    if(yearfounded != '') {
        data['yearfounded'] = yearfounded;
    }
    if(city!=''){
        data['city'] = city;
    }
    if(zipcode!=''){
        data['zipcode'] = zipcode;
    }
    if(siccode!=''){
        data['siccode'] = siccode;
    }
    if(naicscode!=''){
        data['naicscode'] = naicscode;
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
    if(SerachType !=''){
    	data['types']=SerachType;
    }
    if(flag ==1 ){
        console.log(data);
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
