    <?php
    // Set your secret key. Remember to switch to your live secret key in production!
    // See your keys here: https://dashboard.stripe.com/account/apikeys
    require_once('stripe-php/init.php');
    \Stripe\Stripe::setApiKey('sk_test_5RHVe0SMHECoNMe5H2K76oxh');

    // If you are testing your webhook locally with the Stripe CLI you
    // can find the endpoint's secret by running `stripe listen`
    // Otherwise, find your endpoint's secret in your webhook settings in the Developer Dashboard
    $endpoint_secret = 'whsec_TXDWRqfuy3JrJ49noK07Dd8hp3Tqs88Q';

    $payload = @file_get_contents('php://input');
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    $event = null;
    print_r($payload);
    print_r($sig_header);
    try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
    } catch(\UnexpectedValueException $e) {
        // Invalid payload
        http_response_code(400);
        exit();
    } catch(\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        print_r($e->getMessage());
        http_response_code(400);
        exit();
    }

    // Handle the event
    switch ($event->type) {
        case 'invoice.payment_succeeded':
            $paymentMethod = $event->data->object; // contains a StripePaymentMethod
            print_r('abc');
            $data_len = count($paymentMethod->lines->data);
            $amount = ($paymentMethod->lines->data[$data_len - 1]->plan->amount) / 100;
            DB::table('webhook_history')->insert(array('amount' => $amount));
            $planInfo = DB::table('plan')->select('*')->where('price',$amount)->first();
            if($planInfo) {
                $count = $planInfo->credit;
                $email = $paymentMethod->customer_email;
                $userid = DB::table('users')->select('*')->whereNull('deleted_at')->where('email',$email)->first()->id;
                $credit = DB::table('users')->select('*')->where('id',$userid)->first()->credit;
                DB::table('users')->where('id',$userid)->update(array('credit' => $credit + $count,'down_plan' => -1 , 'down_date' => NULL));
                print_r($credit + $count);
                http_response_code(200);
                exit;
            } else {
                http_response_code(400);
                exit();
            }
            break;
            /*
            return response()->json([
                'message' => 'Payment succeded'
            ], 200); 
            break;
            */
        case 'customer.subscription.deleted':
            $paymentMethod = $event->data->object; // contains a StripePaymentMethod
            $customer = $paymentMethod->customer;
            $userid = DB::table('users')->select('*')->whereNull('deleted_at')->where('customerID',$customer)->first()->id;
            print_r('abc');
            DB::table('users')->where('id',$userid)->update(array('subscription_id' => NULL, 'plan' => 0 ,'credit' => 10, 'down_play' => -1, 'down_date' => NULL));
            break;
        case 'payment_method.attached':
            $paymentMethod = $event->data->object; // contains a StripePaymentMethod
            handlePaymentMethodAttached($paymentMethod);
            break;
        // ... handle other event types
        default:
            echo 'Received unknown event type ' . $event->type;
    }

    http_response_code(200);
