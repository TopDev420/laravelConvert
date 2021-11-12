@include('header')
<?php
$path = public_path();
require $path.'/stripe/stripe/Stripe.php'; 

$params = array(
	"testmode"   => "on",
	"private_live_key" => "sk_live_xxxxxxxxxxxxxxxxxxxxx",
	"public_live_key"  => "pk_live_xxxxxxxxxxxxxxxxxxxxx",
	"private_test_key" => "sk_test_vmutujB2TawIm6e4XbGEAmYA",
	"public_test_key"  => "pk_test_EWw2MqN4CzMSmQkEkXJsvjFX"
);

if ($params['testmode'] == "on") {
	Stripe::setApiKey($params['private_test_key']);
	$pubkey = $params['public_test_key'];
} else {
	Stripe::setApiKey($params['private_live_key']);
	$pubkey = $params['public_live_key'];
}
?>
<div id="global-leade-banner" style="background:url({{ asset('new-assets/images/inner-bner.jpg') }}) no-repeat; height:351px;">
 	<div class="container">
	    <div class="col-md-12 text-center">
		   	<div class="dashboard-content">
		        <h1>PAYMENT</h1>
		   	</div>  
		</div>
 	</div>
</div>
<section class="dashboard-admin-details">
	<div class="container">
		<div class="col-md-12">
			<div class="dasboard-admin">
				<div class="tabbable-panel">
					<div class="tabbable-line">
						<div class="checkout-box">
							<h1 class="bt_title">Payment</h1>
							<div class="dropin-page">

							  	<form action="{{ url('/membpaymsuccess') }}" method="POST" id="payment-form">
							  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
								  	<span class="payment-errors"></span>

								  	<div class="single-check-field row">
							      		<label>Card Number</label>
								      	<input type="text" size="20" data-stripe="number">
								  	</div>
								  	
								  	<div class="single-check-field row">
							      		<div class="col-md-6">
							      			<div class="row">
								      			<label>Expiration (MM)</label>
								      			<input class="strp_month" type="text" size="2" data-stripe="exp_month">
							      			</div>
							      		</div>
							      		<div class="col-md-6">
							      			<div class="row">
								      			<label>Expiration (YY)</label>
									    		<input type="text" size="2" data-stripe="exp_year">
							      			</div>
								    	</div>
								  	</div>

								  	<div class="single-check-field row">
								  		<div class="col-md-6">
							      			<div class="row">
								      			<label>CVC</label>
								      			<input class="cvc" type="text" size="4" data-stripe="cvc">
							      			</div>
								    	</div>
								    	<div class="col-md-6">
							      			<div class="row">
								      			<label>Amount</label>
								      			<span class="pay_amount">$<?php echo $memberdetail['amount']; ?></span>
								      			<input type="hidden" name="amount" value="<?php echo $memberdetail['amount']; ?>"> 
							      			</div>
								    	</div>
							  		</div>
							  		<input type="hidden" name="userid" value="<?php echo $memberdetail['userid']; ?>"> 
							  		<input type="hidden" name="planname" value="<?php echo $memberdetail['planname']; ?>">
							  		<input type="hidden" name="points" value="<?php echo $memberdetail['points']; ?>"> 
							  		<input type="hidden" name="date" value="<?php echo date('d-m-Y h:i:s'); ?>">
								  	<input type="submit" class="submit submit_payment" value="Submit Payment">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@include('footer')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<!-- TO DO : Place below JS code in js file and include that JS file -->
<script type="text/javascript">
	Stripe.setPublishableKey('<?php echo $params['public_test_key']; ?>');
  
	$(function() {
	  var $form = $('#payment-form');
	  $form.submit(function(event) {
		// Disable the submit button to prevent repeated clicks:
		$form.find('.submit').prop('disabled', true);
	
		// Request a token from Stripe:
		Stripe.card.createToken($form, stripeResponseHandler);
	
		// Prevent the form from being submitted:
		return false;
	  });
	});

	function stripeResponseHandler(status, response) {
	  // Grab the form:
	  var $form = $('#payment-form');
	
	  if (response.error) { // Problem!
	
		// Show the errors on the form:
		$form.find('.payment-errors').text(response.error.message);
		$form.find('.submit').prop('disabled', false); // Re-enable submission
	
	  } else { // Token was created!
	
		// Get the token ID:
		var token = response.id;

		// Insert the token ID into the form so it gets submitted to the server:
		$form.append($('<input type="hidden" name="stripeToken">').val(token));
	
		// Submit the form:
		$form.get(0).submit();
	  }
	};
</script>