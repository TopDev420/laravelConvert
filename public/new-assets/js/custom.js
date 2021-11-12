    $('#mobileMenuOpenBtn').on('click', function(e) {
	    e.preventDefault();
	    e.stopPropagation();

	    $('#main-nav').toggleClass('is-open');

	    $(document).one('click', function closeMenu (e){
	        if($('#main-nav').has(e.target).length === 0){
	            $('#main-nav').removeClass('is-open');
	        } else {
	            $(document).one('click', closeMenu);
	        }
	    });
	});  

	// $('#main-nav li > a').each(function(){
 //        if(urlRegExp.test($(this).attr('href'))){
 //            $(this).addClass('active');
 //        }
 //    });   


       $(window).scroll(function() {    
       	var scroll = $(window).scrollTop();

       	if (scroll >= 300) {
       		$(".navbar").addClass("darkHeader");
       		$(".nav").addClass("change-color");
       	} else {
       		$(".navbar").removeClass("darkHeader");
       		$(".nav").removeClass("change-color");
       	}
       });

       $('.carousel').carousel();	


       (function( $ ) {

    //Function to animate slider captions 
    function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
			$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	
	//Variables on page load 
	var $myCarousel = $('#sg-carousel'),
	$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

	//Initialize carousel 
	$myCarousel.carousel();
	
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);
	
	//Pause carousel  
	$myCarousel.carousel('pause');
	
	
	//Other slides to be animated on carousel slide event 
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	});  

	
})(jQuery);

$(document).on('click','#checknotlogin',function(){

	$('.addmessage').html('You Must be Login.');

	$('.aleart-login').addClass('active');
    setTimeout(function()
    {
        $( ".aleart-login" ).removeClass('active');

    }, 2000); 

   //$('.aleart-login').toggleClass('active');
	

});

$(document).on('click','.discount-code-link',function(){

	$(this).hide();
	$('.hide').attr('style','display: block !important');
	$('.hs-error-msg').html('');
	$('.coupon').val('');

});



$(document).on('click','.samplelist-not-download',function(){

	$('.addmessage').html('YOU MUST LOGIN TO DOWNLOAD A SAMPLE DATA.');

	$('.aleart-login').addClass('active');
    setTimeout(function()
    {
        $( ".aleart-login" ).removeClass('active');

    }, 2000); 

   //$('.aleart-login').toggleClass('active');
	

});

$('.tab-nav a').on('click', function(){
	$('.tab-nav a.is-active').removeClass('is-active');
	$(this).addClass('is-active');
});


// $(".c-choice-tree-toggle-btn").click(function(){
// 	$(this).toggleClass("is-expanded");
// 	$(".c-choice-tree-sub").toggleClass("is-expanded");
// });

$(document).find(".c-choice-tree-toggle-btn").click(function(){
	$(this).toggleClass("is-expanded");
	//$(this).find( "ul.c-choice-tree-sub" ).toggleClass("is-expanded");

	$(this).parent().find(".c-choice-tree-sub").toggleClass("is-expanded");
});










$("#getCodeModal").modal({
show:false,
backdrop:'static'
});


$('.buylist').click(function() {

	var price = $('.buyprice').val();
	var contacts = $('.buycontact').val();
	var loginid = $('#getsessionid').val();
	var savesearchid = $('.savesearchid').val();
    $('#loading-root').html('<div class="build-tool-loading"><img src="https://globleads.com/public/new-assets/images/new/download.gif"></div>');
	    
	    $.ajax({

	        headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
	        type:'POST',
	                url:"/addtocart",
	                data: {
	                    'price':price,
	                    'contacts':contacts,
	                    'loginid' : loginid,
	                    'savesearchid' : savesearchid,
	                }, 
	        success:function(data){ 

	        	if(data.status=='success'){

					$('#loading-root').html('');
		        	$(".abc").html(data.html);
		        	$("#getCodeModal").modal('show');
		        	$('.totalcarcount').html(data.totalcarcount);

	        	}else{

	        		$('#loading-root').html('');

	        		$('.addmessage').html('YOU HAVE ALREADY AN ITEM IN YOUR CARD WITH SAME THE CRITERIAS.');

	        		$('.aleart-login').addClass('active');
				    setTimeout(function()
				    {
				        $( ".aleart-login" ).removeClass('active');

				    }, 2000);

	        	}

	        }               
	    }); 

});

$('body').on('click', '.removeitemcart', function () {

	var type = $(this).data("type");
	var id = $(this).data("id");
	var ctotalval = $('.ctotalval').html();
	var dicval = $('.dicval').html();

	var removeKey = $(this).parent().parent().find('.arraykey').val();
	$('#loading-root').html('<div class="build-tool-loading"><img src="https://globleads.com/public/new-assets/images/new/download.gif"></div>');
	var that = this;

	if(type=='cookie'){

	

		$.ajax({

	        headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
	        type:'POST',
	                url:"https://globleads.com/removefromcartitem",
	                data: {
	                    'removeKey':removeKey,
	                    'id':id,
	                    'type':type,
	                    
	                }, 
	        success:function(data){ 
                   

                    $('#loading-root').html('');
                    $('.totalcarcount').html(data.totalcarcount);
                    $('.totalammount').html(data.totalsum);

                    

                    if(dicval !=''){

	                    if(data.totalsum < dicval){

	                    	location.reload();


	                    }else if(data.totalsum ==''){

	                    	window.location.replace("/tool/business");


	                    }else{
	                          
	                        var price = data.totalsum-dicval;
	                        $('.ctotalval').html(price.toFixed(2));

	                    }	
                    }
                    
		        	$(that).parent().parent().remove();
		        	

	        }               
	    });
	}

	if(type=='db'){

	

		$.ajax({

	        headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
	        type:'POST',
	                url:"https://globleads.com/removefromcartitem",
	                data: {
	                    'removeKey':removeKey,
	                    'id':id,
	                    'type':type,
	                    
	                }, 
	        success:function(data){ 
                   

                    $('#loading-root').html('');
                    $('.totalcarcount').html(data.totalcarcount);
                    $('.totalammount').html(data.totalsum);

                    if(dicval !=''){

	                    if(data.totalsum < dicval){

	                    	location.reload();


	                    }else if(data.totalsum ==''){

	                    	window.location.replace("/tool/business");


	                    }else{
	                          
	                        var price = data.totalsum-dicval;
	                        $('.ctotalval').html(price.toFixed(2));

	                    }	
                    }
                    
		        	$(that).parent().parent().remove();
		        	

	        }               
	    });
	}







});




//$('.removeitem').click(function() {
$('body').on('click', '.removeitem', function () {

	var type = $(this).data("type");
	var id = $(this).data("id");


	var removeKey = $(this).parent().parent().find('.arraykey').val();
	$('#loading-root').html('<div class="build-tool-loading"><img src="https://globleads.com/public/new-assets/images/new/download.gif"></div>');
	var that = this;


	if(type=='cookie'){

	

		$.ajax({

	        headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
	        type:'POST',
	                url:"https://globleads.com/removefromcart",
	                data: {
	                    'removeKey':removeKey,
	                    'id':id,
	                    'type':type,
	                    
	                }, 
	        success:function(data){ 

	        	

                    $('#loading-root').html('');
                    $('.totalcarcount').html(data.totalcarcount);
		        	$(that).parent().parent().remove();
		        	

	        }               
	    });
	}
	if(type=='db'){



		$.ajax({

	        headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
	        type:'POST',
	                url:"https://globleads.com/removefromcart",
	                data: {
	                    'removeKey':removeKey,
	                    'id':id,
	                    'type':type,
	                    
	                }, 
	        success:function(data){ 

	        	

                    $('#loading-root').html('');
                    $('.totalcarcount').html(data.totalcarcount);
		        	$(that).parent().parent().remove();
		        	

	        }               
	    });
	}



});

$(document).on('click','.applycoupon',function(){

	$code = $('.coupon').val();
	$total = $('.totalammount').html();

	if($code ==''){
   
       $('.hs-error-msg').html('Please complete this required field.');

	}else{

		$('.applycoupon').text('loding');

		$.ajax({
             headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
            type:'POST',
            url:'https://globleads.com/couponcode',
            data: {
               'code': $code,
               'total':$total

            },


            success: function(data){

            	console.log(data);

            	if(data.success=='success'){
                 
                    //$('.hs-error-msg').html(data.message);
                    $('.applycoupon').text('apply');

                    $('.addsuccess').html(data.message);

                    $('.addcoupon').html('<td width="140" align="left"><span class="shopping-card-item-title font-xsmall">Discount Coupon</span><span class="font-xsmall block text-primary">'+data.name+'</span></td><td align="right"><span class="shopping-card-item-price shopping-card-item-price-total">- $ <span class="dicval"> '+data.value+'</span></span></td>');
                    $('.totalwithcoupon').html('<td><span class="shopping-card-item-title shopping-card-item-title-total">Total</span></td><td><span class="shopping-card-item-price shopping-card-item-price-total ">$ <span class="totalammount ctotalval">'+data.newtotal+'</span></span></td></tr>');

 


				    $('.aleart-success').addClass('active');
				    setTimeout(function()
				    {
				        $( ".aleart-success" ).removeClass('active');
				        $('.discount-code-link').show();
	                    $('.hide').attr('style','display: none !important');

				    }, 3000); 

            	}else{

            		$('.applycoupon').text('apply');


            		$('.addmessage').html(data.message);

	        		$('.aleart-login').addClass('active');
				    setTimeout(function()
				    {
				        $( ".aleart-login" ).removeClass('active');

				        $('.discount-code-link').show();
	                    $('.hide').attr('style','display: none !important');

				    }, 3000);
            	}

            	    
            }




        });





	}


});

$(document).on('click','.newsletter',function(){

	$newsletteremail = $('.newsletteremail').val();

	if($newsletteremail !=''){

		$.ajax({
             headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
            type:'POST',
            url:'https://globleads.com/newsletter',
            data: {
               'email': $newsletteremail
            },
            success: function(response){

            	    $('.hs-error-msg').html(response.message);
            }
        });
	}else{

		$('.hs-error-msg').html('Please complete this required field.'); 
	}
});

$(document).on('click','.querysubmit',function(){

	$email = $('.email').val();
	$subject = $('.subject').val();
	$message = $('.message').val();
	
	if($email =='' || $subject =='' || $message =='' )
	{
		if($email =='')
	    $('.emailerror').html('Input your email');

	    if($subject =='')
	    $('.subjecterror').html('Input your subject');

	    if($message =='')
	    $('.messageerror').html('Input your message');			

	}else{

		$('#loading-root').html('<div class="build-tool-loading"><img src="https://globleads.com/public/new-assets/images/new/download.gif"></div>');


		$.ajax({
             headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
            type:'POST',
            url:'https://globleads.com/userquery',
            data: {
               'email': $email,
               'subject': $subject,
               'message': $message
            },
            success: function(response){
            	    $('#loading-root').html('');
            	    $('.message').val('');
            	    $('.subject').val('');
            	    $('.email').val('');
            	    $('.emailerror').html('');
            	    $('.subjecterror').html('');
            	    $('.messageerror').html(''); 
                    $('.successsupport').css('display','block');
            	    $('.successsupport').html(response.message);
            }
        });




	}


})

$(document).on('click','.contactsubmit',function(){

	$email = $('.email').val();
	$subject = $('.subject').val();
	$message = $('.message').val();
	
	if($email =='' || $subject =='' || $message =='' )
	{
		if($email =='')
	    $('.emailerror').html('Input your email');

	    if($subject =='')
	    $('.subjecterror').html('Input your subject');

	    if($message =='')
	    $('.messageerror').html('Input your message');			

	}else{

		$('#loading-root').html('<div class="build-tool-loading"><img src="https://globleads.com/public/new-assets/images/new/download.gif"></div>');


		$.ajax({
             headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
            type:'POST',
            url:'https://globleads.com/contactUs',
            data: {
               'email': $email,
               'subject': $subject,
               'message': $message
            },
            success: function(response){
            	    $('#loading-root').html('');
            	    $('.message').val('');
            	    $('.subject').val('');
            	    $('.email').val(''); 
            	    $('.emailerror').html('');
            	    $('.subjecterror').html('');
            	    $('.messageerror').html('');	
                    $('.successsupport').css('display','block');
            	    $('.successsupport').html(response.message);
            }
        });




	}


})

$(document).on('click','.get-data',function(){
    
    $getId = $(this).attr('data-id');

		$.ajax({
             headers: {
                            'X-CSRF-TOKEN': csrftoken
                        },
            type:'POST',
            url:baseurl+'/getdata',
            data: {
               'data': $getId
            },
            success: function(response){

            	    $('.contactdetails').html(response.html); 

            	    $("#previewlist").modal('show');

                       
            }
        });
});

$(document).on('click','.savedelete',function(){
    
    $getId = $(this).attr('data-id');
    var that = this;

    if (confirm('Are you sure you want to delete this?')) {


    	$('#loading-root').html('<div class="build-tool-loading"><img src="https://globleads.com/public/new-assets/images/new/download.gif"></div>');
	

		$.ajax({
            headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            type:'POST',
            url:'https://globleads.com/removesearchdata',
            data: {
               'data': $getId
            },
            success: function(response){

            	$('#loading-root').html('');
            	$(that).parent().parent().remove();
            	$('.addsuccess').html('Your search reasult successfuly remove from your list .');

				$('.aleart-success').addClass('active');
			    setTimeout(function()
			    {
			        $( ".aleart-success" ).removeClass('active');

			    }, 3000);                        
            }
        });
	};
}); 


$(document).on('click','.save_my_list_data',function(){

	      $('.errormsgsave').html('');
	
            var result = [];
            var filter = [];
            var industries = [];
            var state = [];
            var city = [];
            var zipcode=[];
            var joblevels=[];
            var job_funtion=[];
            var specialty=[];
            var company=[];
            var countries=[];
            var userid = $('#currnt_usr').val();
            var listname = $('.list_name').val();
            //var listamnt = $('input.price-filter').val();
            //var totlcontact = $('#range-contact').val();
            var totlcontact = $('.buycontact').val();
			var totalprice = $('.buyprice').val();
			var type = $('.type').val();


            $('.table tr input[type="hidden"]').each(function(){
                result.push($(this).val());
            });
            var url_details = window.location.pathname;

               console.log(url_details);
            $('.tag').each(function() {
                var category = $(this).attr('data-id');
                var country = $(this).attr('new-data');
                if(category=='country'){
                    countries.push($(this).attr('new-data'));
                }
            });
            $('.all_selected_value li').each(function(){
                var category = $(this).attr('data-id');
                if(category=='industry'){
                    //console.log($(this).html());
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
                }else if(category=='Specialty'){
                    specialty.push($(this).attr('new-data'));
                }
                
            });
            if(listname!=''){//alert('2461');
            var rangeofstyle = $('.ui-slider-handle').attr("style");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url:baseurl+'/demosavesearch',
                data: {
                    'type':type,'userid': userid, 'listname': listname, 'listamnt': totalprice, 'totlcontact': totlcontact, 'result': result, 'industry': industries, 'company': company, 'state': state, 'city': city,'zipcode':zipcode,'joblevels':joblevels,'specialty':specialty,'Jobfunctions':job_funtion,'ranfgeofstyle':rangeofstyle,'country':countries,'range_of_contact':$( "input.form-control-adjust" ).val(),'url':url_details,

                },
                success:function(data){

                            if(data.success='success'){
	                	        $("#saved").modal('hide');
	                            $('.addsuccess').html('Your search reasult saved now .');

								$('.aleart-success').addClass('active');
							    setTimeout(function()
							    {
							        $( ".aleart-success" ).removeClass('active');

							    }, 2000); 
							}else{ 


							}    
                            

                        }
                    });
        }else{

        	$('.errormsgsave').html('Enter you save list name first .');
            //alert('PLEASE ENTER YOUR NAME LIST');
        }
    }); 

 
