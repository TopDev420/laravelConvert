$(document).ready(function(){
	var url   = window.location.origin; 
	var range_slider = $('#range-contact').val();
	var rangeser = $('input.contact_count ').val();
	if(typeof range_slider === "undefined"){
	}else {
		$( "#slider" ).slider({
            max:range_slider,
            slide: function( event, ui ) {
              $( ".form-adjust input.form-control-adjust" ).val( ui.value);   

            },
            change: function( event, ui ) {
                var url_detail = window.location.pathname;
                var url_detail = url_detail.split("/");
                var urlconcat = url_detail[1]+'/'+url_detail[2];
                var rangeofstyle = $('.ui-slider-handle').attr("style");
                var url_detail = window.location.pathname;
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
                        // 'range':range,
                        },
                        beforeSend: function() {
                        	if( $('.search-result-exist').is(':visible') ) {
	                          $('.search-result-exist').remove();
	                        }
                            if( $('.search-result').is(':visible') ) {
                              $('.search-result').hide();
                            }
                            $('.filter-result-shows').show();
                            $('.filter-result-shows').html();
                            $('div.filter-result-shows  div.tool-top-bar-left span.default-msg-for-contacts').text('loading');
                            $('div.filter-result-shows  div.tool-top-bar-left span.tool-top-bar-notification').text('we are getting your result');
                            loder();
                        },
                        success: function(response){
                            hidelodare();
                            $('.filter-result-shows').hide();
                            $('.search-result').show();
                            contact_range=response.count +' CONTACTS';
                            $('.contact_count').val(response.count);
                            $('.contact_count').text(contact_range); 
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


        if($('#rangeofstyle').length>0){
            $('.ui-slider-handle').attr('style',$('#rangeofstyle').val() );
        }else {
            $('a.ui-slider-handle').removeAttr( 'style' );
        }
	}
   
});


$(document).on('click','.range-set',function(){
    var maxrange = parseInt($('#range-contact').val());
    var setrange  =  parseInt($('.range-slider').val());
    var flag=1;
    if(setrange>maxrange){
        flag = 0;
        setrange=$('.range-slider').val(maxrange);
        
    }

    if(setrange!=0  && flag==1){
        $( "#slider" ).slider({
            value:setrange,
            max:maxrange,
            slide: function( event, ui ) {
              $( ".form-adjust input.form-control-adjust" ).val( ui.value);   

            },
            change: function( event, ui ) {
                var url_detail = window.location.pathname;
                var url_detail = url_detail.split("/");
                console.log(url_detail);
                var urlconcat = url_detail[1]+'/'+url_detail[2];
                console.log(urlconcat);
                var rangeofstyle = $('.ui-slider-handle').attr("style");
                var url_detail = window.location.pathname;
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': csrftoken
                        },
                        type:'POST',
                        url:url+'/rangesofcontact',
                        data: {
                            'range_of_contact':$( "input.form-control-adjust" ).val(),
                            'url_details':url_detail,
                            'ranfgeofstyle':rangeofstyle,
                        // 'range':range,
                        },
                        beforeSend: function() {
                            if( $('.search-result-exist').is(':visible') ) {
                              $('.search-result-exist').remove();
                            }
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
                            var prices = '$'+response.price;
                            
                            // contact_silder=response.count;
                            $('.price-filter').text(prices);
                            const state = '';
                            const title = ''
                            let url = 'demobuildlist'+'/'+response.save_result;
                            window.history.pushState(null, null, '/'+url);
                        }

                });  
            }
        });
    }
        
});
		
         
      