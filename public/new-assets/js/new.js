
   $('.buylistsingle').click(function() {

	var price = $('.buyprice').val();
	var contacts = $('.buycontact').val();
	var loginid = $('#getsessionid').val();
	var savesearchid = $('.savesearchid').val();
    $('#loading-root').html('<div class="build-tool-loading"><img src="/public/new-assets/images/new/download.gif"></div>');
	    
	    $.ajax({

	        headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
	        type:'POST',
	                url:"/addtocartbydetails",
	                data: {
	                    'price':price,
	                    'contacts':contacts,
	                    'loginid' : loginid,
	                    'savesearchid' : savesearchid,
	                }, 
	        success:function(data){ 

	        	if(data.status=='success'){

					$('#loading-root').html('');
		        	$('.totalcarcount').html(data.totalcarcount);
		        	window.location.href = "/checkout/step1";

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
