<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
// use Validator;
use Illuminate\Support\Facades\Validator;
use URL;
// use Session;
use Illuminate\Support\Facades\Session;
use Redirect;
use Input;
// use DB;
use Illuminate\Support\Facades\DB;
use Excel;
// use Mail;
use Illuminate\Support\Facades\Mail;

/** All Paypal Details class **/

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class AddMoneyController extends HomeController
{
    public $frontpages = array();
    public $user_id = array();
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct()
    {
        parent::__construct();
        // $userid = Session::get('user_id');
        //print_r($userid);die;
        // $username = Session::get('user_name');
        $this->frontpages = DB::table('frontpages')->whereNull('deleted_at')->get();
        // $if_exist =1;
        // if (!isset($userid)) {
        //     return redirect("/home");
        // }
        // $this->user_id = $userid;
        // $this->user_name = $username;

        /** setup PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelSubscription()
    {
        $userid = Session::get('user_id');
        $user_subscription = DB::table('users')->select('*')->whereNull('deleted_at')->where('id', $userid)->first()->subscription_id;
        $email = DB::table('users')->select('*')->whereNull('deleted_at')->where('id', $userid)->first()->email;
        $subscriptionID = DB::table('user_subscriptions')->where('id', $user_subscription)->first()->stripe_subscription_id;
        require_once('stripe-php/init.php');
        $stripe = array(
            "secret_key"      => "sk_test_5RHVe0SMHECoNMe5H2K76oxh",
            "publishable_key" => "pk_test_uPHbA4uj1n1d4UJB4xDTMSJ9"
        );
        $api_error = "";
        \Stripe\Stripe::setApiKey($stripe['secret_key']);
        try {
            $subscription = \Stripe\Subscription::update(
                $subscriptionID,
                [
                    'cancel_at_period_end' => true,
                ]
            );
        } catch (Exception $e) {
            $api_error = $e->getMessage();
            die($api_error);
        }
        if ($subscription != '' && empty($api_error)) {

            $date = date("Y-m-d H:i:s");
            DB::table('user_subscriptions')->where('id', $user_subscription)->update(array('status' => 'inactive'));

            DB::table('users')->where('id', $userid)->update(array('last_downgrade' => $date, 'down_plan' => 0, 'down_date' => date("Y-m-d H:i:s", $subscription->cancel_at)));

            $data = array('name' => "beta globleads  Payment Information", 'email' => $email);

            Mail::send(['text' => 'mail'], $data, function ($message) use ($email) {
                $message->to($email, 'Payment')->subject('You have cancelled subscription.');
                $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
            });
            Mail::send(['text' => 'mail'], $data, function ($message) use ($email) {
                $message->to('debashis.matainja@gmail.com', 'Payment')->subject('You have cancelled subscription.');
                $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
            });
            return View('template.transactionsuccess', [
                'type' => 'downgrade',
                'userid' => $userid,
                'paymethod' => 'Free',
            ]);
        }

        return redirect('tool/upgrade-plan');
    }
    public function cardpay(Request $request)
    {
        $api_error = '';
        $userid = Session::get('user_id');
        if (empty($userid)) {
            return redirect('tool/advanced-search');
        }
        if (!empty($request->stripeToken)) {
            $backurl = '';
            $price = 0;
            $type = $request->paymethod;
            $token  = $request->stripeToken;
            $email = $request->email;
            $count = 0;
            $billing = $request->billing;
            $customerID = $request->customer;
            $planInfo = DB::table('plan')->select('*')->where('product_name', $type)->where('billing', $billing)->first();
            $currentPlan = DB::table('users')->select('*')->whereNull('deleted_at')->where('id', $userid)->first();
            $flag = '';
            if (!$currentPlan) {
                return redirect('tool/upgrade-plan');
            }

            if ($currentPlan->plan == 0) {
                $currentPlanInfo = new \stdClass();
                $currentPlanInfo->product_name = 'Free';
                $currentPlanInfo->billing = 'monthly';
            } else {
                $currentPlanInfo = DB::table('plan')->select('*')->where('id', $currentPlan->plan)->first();
            }
            if ($planInfo) {
                $productID = $planInfo->plan_id;
                $planInfoID = $planInfo->id;
                $backurl = $planInfo->slug;
                $price = $planInfo->price;
                $count = $planInfo->credit;
            } else {
                return redirect('tool/upgrade-plan');
            }
            $backurl = $backurl . '/' . $billing;
            require_once('stripe-php/init.php');
            $stripe = array(
                "secret_key"      => "sk_test_51Hu5GQJNBNbUpyz6O5F1SYNI7Sx2qPUbKstYNM12BO8yvH46FoAAzEld0zI0iuUIlRFvCOTukWCdAOleAv9ry10200hnOGoQGj",
                "publishable_key" => "pk_test_51Hu5GQJNBNbUpyz6WRtMzlTL6btHhdwRQYkibSQtFkokjIPPmZm0yTXSI8tvc3EK68CQvOTxzVFIBneE9GBy0JnT007rhlSmhp"
            );
            \Stripe\Stripe::setApiKey($stripe['secret_key']);

            if ($customerID == '') {
                //add customer to stripe
                try {
                    $customer = \Stripe\Customer::create(array(
                        'email' => $email,
                        'source'  => $token
                    ));
                    $customerID = $customer->id;
                    DB::table('users')->where('id', $userid)->update(array('customerID' => $customer->id));
                } catch (Exception $e) {
                    $api_error = $e->getMessage();
                }
            }

            if ($customerID != '' && empty($api_error)) {
                //item information
                $itemName = "Dayasyder Payment";
                $itemNumber = "PS123456";
                $itemPrice = $price;
                $currency = "usd";
                $orderID = "SKA92712382139";
                if ($currentPlanInfo->product_name == 'Free') {

                    $flag = 'create';
                    try {
                        $subscription = \Stripe\Subscription::create(array(
                            "customer" => $customerID,
                            "items" => array(
                                array(
                                    "plan" => $productID,
                                ),
                            ),
                        ));
                    } catch (Exception $e) {
                        $api_error = $e->getMessage();
                    }
                } else if ($currentPlanInfo->id < $planInfo->id) {
                    $currentScriptionID = DB::table('user_subscriptions')->select('*')->where('status', 'active')->where('stripe_customer_id', $customerID)->orderBy('id', 'desc')->first()->stripe_subscription_id;
                    $flag = 'upgrade';
                    if (isset($currentScriptionID)) {
                        try {
                            $subscription = \Stripe\Subscription::retrieve($currentScriptionID);
                            \Stripe\Subscription::update($currentScriptionID, [
                                'cancel_at_period_end' => false,
                                'proration_behavior' => 'create_prorations',
                                'items' => [
                                    [
                                        'id' => $subscription->items->data[0]->id,
                                        "plan" => $productID,
                                    ],
                                ],
                            ]);
                        } catch (Exception $e) {
                            $api_error = $e->getMessage();
                        }
                    } else {
                        $flag = 'create';
                        try {
                            $subscription = \Stripe\Subscription::create(array(
                                "customer" => $customerID,
                                "items" => array(
                                    array(
                                        "plan" => $productID,
                                    ),
                                ),
                            ));
                        } catch (Exception $e) {
                            $api_error = $e->getMessage();
                        }
                    }
                } else {
                    $currentScriptionID = DB::table('user_subscriptions')->select('*')->where('status', 'active')->where('stripe_customer_id', $customerID)->orderBy('id', 'desc')->first()->stripe_subscription_id;
                    $flag = 'downgrade';
                    try {
                        $subscription = \Stripe\Subscription::retrieve($currentScriptionID);
                        \Stripe\Subscription::update($currentScriptionID, [
                            'cancel_at_period_end' => true,
                            'proration_behavior' => 'create_prorations',
                            'items' => [
                                [
                                    'id' => $subscription->items->data[0]->id,
                                    "plan" => $productID,
                                ],
                            ],
                        ]);
                    } catch (Exception $e) {
                        $api_error = $e->getMessage();
                    }
                }
                if ($subscription && empty($api_error)) {
                    // Retrieve subscription data
                    $subsData = $subscription->jsonSerialize();

                    // Check whether the subscription activation is successful
                    if ($subsData['status'] == 'active') {
                        // Subscription info
                        $subscrID = $subsData['id'];
                        $custID = $subsData['customer'];
                        $planID = $subsData['plan']['id'];
                        $planAmount = ($subsData['plan']['amount'] / 100);
                        $planCurrency = $subsData['plan']['currency'];
                        $planinterval = $subsData['plan']['interval'];
                        $planIntervalCount = $subsData['plan']['interval_count'];
                        $created = date("Y-m-d H:i:s", $subsData['created']);
                        $current_period_start = date("Y-m-d H:i:s", $subsData['current_period_start']);
                        $current_period_end = date("Y-m-d H:i:s", $subsData['current_period_end']);
                        $status = $subsData['status'];

                        $date = date("Y-m-d H:i:s");

                        // Insert transaction data into the database
                        $insertdata = array(
                            'user_id' => $userid,
                            'stripe_subscription_id' => $subscrID,
                            'stripe_customer_id' => $custID,
                            'stripe_plan_id' => $planID,
                            'plan_amount' => $planAmount,
                            'plan_amount_currency' => $planCurrency,
                            'plan_interval' => $planinterval,
                            'plan_interval_count' => $planIntervalCount,
                            'payer_email' => $email,
                            'created' => $date,
                            'plan_period_start' => $current_period_start,
                            'plan_period_end' => $current_period_end,
                            'status' => $status
                        );
                        $subscription_id = DB::table('user_subscriptions')->insertGetId($insertdata);
                        // Update subscription id in the users table
                        if ($subscription_id && !empty($userid)) {
                            if ($flag == 'create' || $flag == 'upgrade') {
                                $statusMsg = 'Your Subscription Payment has been Successful!';
                                $credit = DB::table('users')->where('id', $userid)->first()->credit;
                                if ($flag == 'upgrade') {
                                    DB::table('users')->where('id', $userid)->update(array('credit' => $credit + $count, 'last_upgrade' => $date, 'subscription_id' => $subscription_id, 'plan' => $planInfoID));
                                } else {
                                    $credit = 0;
                                    DB::table('users')->where('id', $userid)->update(array('credit' => $count, 'last_upgrade' => $date, 'subscription_id' => $subscription_id, 'plan' => $planInfoID));
                                }
                                $data = array('name' => "beta globleads  Payment Information", 'email' => $email, 'type' => $type);
                                Mail::send(['text' => 'mail'], $data, function ($message) use ($email, $type) {
                                    $message->to($email, 'Payment')->subject('You upgraded subscription.Now you have ' . $type . '  subscription.');
                                    $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
                                });
                                Mail::send(['text' => 'mail'], $data, function ($message) use ($email, $type) {
                                    $message->to('debashis.matainja@gmail.com', 'Payment')->subject('You upgraded subscription.Now you have ' . $type . '  subscription.');
                                    $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
                                });

                                return View('template.transactionsuccess', [
                                    'type' => 'upgrade',
                                    'userid' => $userid,
                                    'paymethod' => $type,
                                    'amount' => $planAmount,
                                    'current_credits' => $credit + $count,
                                    'get_credits' => $count,
                                ]);
                            } else if ($flag == 'downgrade') {
                                $statusMsg = 'You Subscription has been Downupgraded';
                                DB::table('users')->where('id', $userid)->update(array('credit' => $count, 'last_downgrade' => $date, 'down_plan' => $planID, 'down_date' => date("Y-m-d H:i:s", $subscription->cancel_at)));
                                $html = array('msg' => 'You downgraded subscription.Now you have ' . $type . '  subscription.');
                                $data = array('name' => "beta globleads  Payment Information", 'email' => $email, 'type' => $type);
                                Mail::send(['text' => 'mail'], $data, function ($message) use ($email, $type) {
                                    $message->to($email, 'Payment')->subject('You downgraded subscription to ' . $type . '  subscription.');
                                    $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
                                });
                                Mail::send(['text' => 'mail'], $data, function ($message) use ($email, $type) {
                                    $message->to('debashis.matainja@gmail.com', 'Payment')->subject('You downgraded subscription to ' . $type . '  subscription.');
                                    $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
                                });
                                return View('template.transactionsuccess', [
                                    'type' => 'downgrade',
                                    'userid' => $userid,
                                    'paymethod' => $type,
                                ]);
                            }
                        }
                    }
                } else {
                    $statusMsg = "Transaction has been failed";
                    die($statusMsg);
                }

                return View('template.transactionfailed', [
                    'userid' => $userid,
                    'paymethod' => $type,
                    'api_error' => $api_error,
                ]);

                die($statusMsg);
            }
        } else {
            $statusMsg = "Form submission error...";
            die($statusMsg);
        }
    }
    public function createcustomer(Request $request)
    {
        require_once('stripe-php/init.php');
        \Stripe\Stripe::setApiKey('sk_test_5RHVe0SMHECoNMe5H2K76oxh');
        $email = $request->email;
        $token = $request->token;
        //add customer to stripe
        $customer = \Stripe\Customer::create(array(
            'email' => $email,
            'source'  => $token
        ));
        DB::table('users')->where('id', $userid)->update(array('customerID' => $customer->id));
        return $response->withJson(['customer' => $customer]);
    }
    public function addpayment($type, $billing)
    {
        $userid = Session::get('user_id');
        $backurl = '';
        $price = 0;
        if (!empty($userid)) {

            $planInfo = DB::table('plan')->select('*')->where('product_name', $type)->where('billing', $billing)->first();
            if ($planInfo) {
                $backurl = $planInfo->slug;
                $price = $planInfo->price;
                $count = $planInfo->credit;
            } else {
                return redirect('tool/upgrade-plan');
            }
            Session::put('paidamount', $price);
            Session::put('backurl', $backurl);
            Session::get('credits', $count);
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
            $item_1 = new Item();
            $item_1->setName('Search-' . $userid . '-' . $price)
                /** item name **/
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($price);
            $item_list = new ItemList();
            $item_list->setItems(array($item_1));
            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal($price);
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Your transaction description');
            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(route('PaymentStatus'))
                /** Specify return URL **/
                ->setCancelUrl(route('PaymentStatus'));
            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
            try {

                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (Config::get('app.debug')) {
                    Session::put('error', 'Connection timeout');
                    return redirect('checkout/' . $backurl);
                    /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                    /** $err_data = json_decode($ex->getData(), true); **/
                    /** exit; **/
                } else {
                    Session::put('error', 'Some error occur, sorry for inconvenient');
                    return redirect('checkout/' . $backurl);
                    /** die('Some error occur, sorry for inconvenient'); **/
                }
            }
            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }
            /** add payment ID to session **/
            Session::put('paypal_payment_id', $payment->getId());
            if (isset($redirect_url)) {
                /** redirect to paypal **/
                return redirect()->away($redirect_url);
            }
            Session::put('error', 'Unknown error occurred');
            return redirect('checkout/' . $backurl);
        } else {
            return redirect("tool/upgrade-plan");
        }
    }
    public function PaymentStatus()
    {
        $userid = Session::get('user_id');
        $backurl = Session::get('backurl');
        Session::forget('backurl');
        $count = Session::get('credits');
        if (!empty($userid)) {
            $payment_id = Session::get('paypal_payment_id');
            /** clear the session payment ID **/
            Session::forget('paypal_payment_id');
            if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
                Session::put('error', 'Payment failed');
                return redirect('checkout/' . $backurl);
            }
            $userdetails  = DB::table('users')->select('email')->where('id', '=', $userid)->first();
            $_POST['email'] = $userdetails->email; //echo $_POST['email'];die('171');
            // email


            $payment = Payment::get($payment_id, $this->_api_context);
            //  print_r($payment);die('288');

            /** PaymentExecution object includes information necessary **/
            /** to execute a PayPal account payment. **/
            /** The payer_id is added to the request query parameters **/
            /** when the user is redirected from paypal back to your site **/
            $execution = new PaymentExecution();

            $execution->setPayerId(Input::get('PayerID'));
            //print_r($execution);die('295');
            /**Execute the payment **/
            $result = $payment->execute($execution, $this->_api_context);
            //print_r($result);die('300');
            $resultDetails = json_decode($result, true);

            /** dd($result);exit; /** DEBUG RESULT, remove it later **/
            if ($result->getState() == 'approved') {
                $paymentDetails = json_decode($payment, true);
                $payerID             = $paymentDetails['payer']['payer_info']['payer_id'];
                $payerEmail          = $paymentDetails['payer']['payer_info']['email'];
                $TransactionIdpaypal = $resultDetails['id'];
                $Paypalstate         = $resultDetails['state'];
                $paidPaypalPrice     = $resultDetails['transactions'][0]['amount']['total'];
                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomStringfirst = '';
                $randomStringlast = '';
                $html = array(
                    'paypaltransactionid' => $TransactionIdpaypal,
                    'status' => 'success',
                    'amoutn' => $paidPaypalPrice
                );
                Mail::send('maildown', $html, function ($message) {
                    $message->to($_POST['email'], 'Payment')->subject('Payment success');
                    $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
                });
                Mail::send('maildown', $html, function ($message) {
                    $message->to('debashis.matainja@gmail.com', 'Payment')->subject('Payment success');
                    $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
                });

                //DB::table('save_result')->latest('id')->first();
                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randamtrasaction = '';
                for ($i = 0; $i < 8; $i++) {
                    $randamtrasaction .= $characters[rand(0, $charactersLength - 1)];
                }

                // $saveResultID = json_encode($saveserchserchIdssecrhids);


                // $totalsecrhdata = DB::select('select count(*) as totalsecrhdata from paypal_payment_details   ' );
                // // print_r($totalsecrhdata);die('262');
                // if($totalsecrhdata[0]->totalsecrhdata===0){
                //     $inserttranactionid = 1;
                // }else{
                //     $tra_id = DB::table('paypal_payment_details')->latest('id')->first();
                //     $inserttranactionid = $tra_id->id+1;
                // }


                //echo $inserttranactionid;die();
                $dataPayemnt = array(
                    'user_id' => $userid,
                    // 'original_save_id' => $saveResultID,
                    'payerIdPaypal' => $payerID,
                    'payerEmailPaypal' => $payerEmail,
                    'paypalTransactionId' => $TransactionIdpaypal,
                    'statePaypal' => $Paypalstate,
                    'pricePaypal' => Session::get('paidamount'),
                    // 'totalcontact' => $totalContact,
                );
                $isinsert  = DB::table('paypal_payment_details')->insert($dataPayemnt);
                // echo $isinsert;die('286');
                if ($isinsert) {
                    $tra_id = DB::table('paypal_payment_details')->latest('id')->first();
                    $inserttranactionid = $tra_id->id;
                    DB::table('paypal_payment_details')->where('id', $inserttranactionid)->update(array('trasactionid' => $randamtrasaction . $inserttranactionid));
                }
                $credit = DB::table('users')->where('id', $userid)->first()->credit;
                DB::table('users')->where('id', $userid)->update(array('credit' => $credit + $count));
                /** it's all right **/
                /** Here Write your database logic like that insert record or value in database if you want **/
                Session::put('success', 'Payment success');
                return redirect('tool/advanced-search');
            }
            Session::put('error', 'Payment failed');
            return redirect('checkout/' . $backurl);
        }
    }
    public function downloadsfiles($id = null)
    {
        if ($id != '') {
            $value                 =  substr($id, 4);
            $encryptedata          =  base64_decode($value);
            $secrhid =  substr($encryptedata, 0, -8);
            $fields_exclude = array();
            $fields = array();
            // echo $secrhid;die;
            $where = 'active = 1 and';
            $SamplesearchData      = DB::table('save_result')->select(DB::raw('*'))->where('id', $secrhid)->first();
            //  print_r($SamplesearchData);die('298');
            /*Here add Secrhtype*/
            if (isset($SamplesearchData->types)) {
                $pagetype = $SamplesearchData->types;
                //echo $pagetype;die;
                if ($pagetype == 'business') {
                    $pagetype = 'businesscontact';
                } elseif ($pagetype == 'healthcare') {
                    $pagetype = 'businesshealthcare';
                }
            }
            //print_r($SamplesearchData);die();
            if (!empty($SamplesearchData->filters)) {
                $fields = json_decode($SamplesearchData->filters, true);
            }
            if (isset($fields['Employe_range']) && !empty($fields['Employe_range'])) {
                unset($fields['Employe_range']);
            }
            if (isset($fields['Revenue']) && !empty($fields['Revenue'])) {
                unset($fields['Revenue']);
            }
            if (isset($fields['Revenue_range']) && !empty($fields['Revenue_range'])) {
                unset($fields['Revenue_range']);
            }
            if (isset($fields['job_level']) && !empty($fields['job_level'])) {
                unset($fields['job_level']);
            }
            if (isset($fields['joblevels']) && !empty($fields['joblevels'])) {
                unset($fields['joblevels']);
            }
            if (isset($fields['types']) && !empty($fields['types'])) {
                unset($fields['types']);
            }
            if (!empty($SamplesearchData->filtersexclude)) {
                $fields_exclude = json_decode($SamplesearchData->filtersexclude, true);

                if (isset($fields_exclude['state']) && !empty($fields_exclude['state'])) {
                    $state_exclude = $fields_exclude['state'];
                    unset($fields_exclude['state']);
                    $value = implode("','", $state_exclude);
                    $value = "'" . $value . "'";
                    if (!empty($fields_exclude) || !empty($fields)) {
                        $where .= 'state  NOT IN (' . $value . ')   and ';
                    } else {
                        $where .= 'state  NOT IN (' . $value . ')  ';
                    } //
                }

                if (!empty($fields_exclude['city']) && !empty($fields_exclude['city'])) {
                    $city_exclude = $fields_exclude['city'];
                    unset($fields_exclude['city']);
                    $value = implode("','", $city_exclude);
                    $value = "'" . $value . "'";
                    if (!empty($fields_exclude) || !empty($fields)) {
                        $where .= 'city  NOT IN (' . $value . ')   and ';
                    } else {
                        $where .= 'city  NOT IN (' . $value . ')  ';
                    }
                }

                /*Validation check for employee job_level for exclude and  add to filter query*/
                if (isset($fields_exclude['joblevels']) && !empty($fields_exclude['joblevels'])) {
                    $job_level_exclude = $fields_exclude['joblevels'];
                    unset($fields_exclude['joblevels']);
                    if (!empty($job_level_exclude)) {
                        $total = count($job_level_exclude);
                        $total = $total - 1;
                        $where .= '( ';
                        foreach ($job_level_exclude as $key => $value) {
                            if ($total > $key) {
                                $where  .=  ' job_level NOT LIKE  ' . "'" . '%' . $value . '%' . "'" . ' and ';
                            } elseif ($total == $key && (!empty($fields)   || !empty($fields_exclude))) {
                                $where  .= ' job_level NOT LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                            } elseif ($total == $key) {
                                $where  .= ' job_level NOT LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                            }
                        }
                    }
                    $flag = 1;
                }
                /*Validation check for employee job_function for exclude and  add to filter query*/
                if (isset($fields_exclude['Jobfunctions']) && !empty($fields_exclude['Jobfunctions'])) {
                    $job_function_excludes = $fields_exclude['Jobfunctions'];
                    $job_function_exclude = $fields_exclude['Jobfunctions'];
                    unset($fields_exclude['Jobfunctions']);
                    // ** REMOVE PARENT JOB FUNCTION IN THIS SECTION **//
                    foreach ($job_function_exclude as $key => $value) {
                        if (strpos($value, '/') !== false) {
                            $value = explode("/", $value);

                            $job_function_exclude[$key] = $value[1];
                        }
                    }
                    if (isset($job_function_exclude) && !empty($job_function_exclude)) {
                        $total = count($job_function_exclude);
                        $total = $total - 1;
                        $where .= '( ';
                        foreach ($job_function_exclude as $key => $value) {
                            if ($total > $key) {
                                $where  .=  ' job_title NOT LIKE  ' . "'" . '%' . $value . '%' . "'" . ' and ';
                            } elseif ($total == $key && (!empty($fields) || !empty($fields_exclude))) {
                                $where  .= ' job_title NOT LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                            } elseif ($total == $key) {
                                $where  .= ' job_title NOT LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                            }
                        }
                    }
                    $flag = 1;
                }

                /*Validation check for employee industries for exclude and  add to filter query*/
                if (isset($fields_exclude['industry']) && !empty($fields_exclude['industry'])) {
                    $industries_exclude = $fields_exclude['industry'];
                    unset($fields_exclude['industry']);
                    if (!empty($industries_exclude)) {
                        $total = count($industries_exclude);
                        $total = $total - 1;
                        $where .= '( ';
                        foreach ($industries_exclude as $key => $value) {
                            if ($total > $key) {
                                $where  .=  ' industries NOT LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                            } elseif ($total == $key && (!empty($fields) || !empty($fields_exclude))) {
                                $where  .= ' industries NOT LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                            } elseif ($total == $key) {
                                $where  .= ' industries NOT LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                            }
                        }
                    }
                    $flag = 1;
                }

                /*Validation check for employee company_name for exclude and  add to filter query*/
                if (isset($fields_exclude['company']) && !empty($fields_exclude['company'])) {
                    $company_name_exclude = $fields_exclude['company'];
                    unset($fields_exclude['company']);
                    if (!empty($company_name_exclude)) {
                        $total = count($company_name_exclude);
                        $total = $total - 1;
                        $where .= '( ';
                        foreach ($company_name_exclude as $key => $value) {
                            if ($total > $key) {
                                $where  .=  ' company_name NOT LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                            } elseif ($total == $key && (!empty($fields) || !empty($fields_exclude))) {
                                $where  .= ' company_name NOT LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                            } elseif ($total == $key) {
                                $where  .= ' company_name NOT LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                            }
                        }
                    }
                    $flag = 1;
                }

                if (isset($fields_exclude['Specialty']) && !empty($fields_exclude['Specialty'])) { //die('429');
                    $Specialty = $fields_exclude['Specialty'];
                    unset($fields_exclude['Specialty']);

                    if (isset($Specialty) && !empty($Specialty)) { //die('433');
                        $total = count($Specialty);
                        $total = $total - 1;
                        $where .= '( ';
                        foreach ($Specialty as $key => $value) {
                            if ($total > $key) {
                                $where  .=  ' job_level LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                            } elseif ($total == $key && (!empty($fields) || !empty($filtersexclude))) {
                                $where  .= ' job_level LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                            } elseif ($total == $key) {
                                $where  .= ' job_level LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                            }
                        }
                    }
                    //echo $where;die('599');
                }
            }

            if (isset($fields['Contact']) && !empty($fields['Contact'])) {
                $Contact = $fields['Contact'];

                unset($fields['Contact']);
                if (isset($Contact) && !empty($Contact)) {
                    $total = count($Contact);
                    $total = $total - 1;
                    $where .= '( ';
                    foreach ($Contact as $key => $value) {
                        if ($total > $key) {
                            $where  .=  ' job_level LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                        } elseif ($total == $key && !empty($fields)) {
                            $where  .= ' job_level LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                        } elseif ($total == $key) {
                            $where  .= ' job_level LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                        }
                    }
                }
                $flag = 1;
            }

            if (isset($fields['Specialty']) && !empty($fields['Specialty'])) {
                $Specialty = $fields['Specialty'];
                $flag = 1;
                unset($fields['Specialty']);

                if (isset($Specialty) && !empty($Specialty)) {
                    $total = count($Specialty);
                    $total = $total - 1;
                    $where .= '( ';
                    foreach ($Specialty as $key => $value) {
                        if ($total > $key) {
                            $where  .=  ' job_level LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                        } elseif ($total == $key && !empty($fields)) {
                            $where  .= ' job_level LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                        } elseif ($total == $key) {
                            $where  .= ' job_level LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                        }
                    }
                }
                // echo $where;die('599');
            }

            /* Validation check for employee job_function and add to filter query*/
            if (isset($fields['jobtitles']) && !empty($fields['jobtitles'])) {
                $job_functions = $fields['jobtitles'];
                $job_function = $fields['jobtitles'];

                // ** REMOVE PARENT JOB FUNCTION IN THIS SECTION **//
                foreach ($job_functions as $key => $value) {
                    if (strpos($value, '/') !== false) {
                        $value = explode("/", $value);

                        $job_function[$key] = $value[1];
                    }
                }
                //$flag=1;
                unset($fields['jobtitles']);
                if (isset($job_function) && !empty($job_function)) {
                    $total = count($job_function);
                    $total = $total - 1;
                    $where .= ' (';
                    foreach ($job_function as $key => $value) {
                        $job_format = DB::table('jobtitles')->select('format')->whereNull('deleted_at')->where('name', $value)->first()->format;
                        $job_keyword = DB::table('jobtitles')->select('keyword')->whereNull('deleted_at')->where('name', $value)->first()->keyword;
                        $job_or_keywords = explode(',', $job_keyword);
                        for ($i = 0; $i < count($job_or_keywords); $i++) {
                            if (strchr('a' . $value, 'Chief')) {
                                $job_and_keywords[0] = $job_or_keywords[$i];
                            } else {
                                $job_and_keywords = explode(' ', $job_or_keywords[$i]);
                            }
                            for ($j = 0; $j < count($job_and_keywords); $j++) {
                                $keyword = $job_and_keywords[$j];
                                $st = 'job_title LIKE  ' . "'" . '%' . $keyword . '%' . "'";
                                if ($i == 0 && $j == 0) {
                                    $where .= '(';
                                }
                                if ($j == 0) {
                                    $where .= '(';
                                }
                                $where .= $st;
                                if ($j < count($job_and_keywords) - 1) {
                                    $where .= ' and ';
                                } else if ($i < count($job_or_keywords) - 1) {
                                    $where .= ') or ';
                                } else if ($key < $total) {
                                    $where .= ')) or';
                                } else if ($key == $total  && !empty($fields)) {
                                    $where .= '))) and ';
                                } else if ($total == $key) {
                                    $where .= ')))';
                                }
                            }
                        }
                        $format = DB::table('jobtitles')->select('format')->whereNull('deleted_at')->where('name', $value)->first()->format;
                    }
                }

                $flag = 1;
            }
            /* Validation check for employee job_function and add to filter query*/
            if (isset($fields['Jobfunctions']) && !empty($fields['Jobfunctions'])) {
                $job_functions = $fields['Jobfunctions'];
                $job_function = $fields['Jobfunctions'];

                // ** REMOVE PARENT JOB FUNCTION IN THIS SECTION **//
                foreach ($job_functions as $key => $value) {
                    if (strpos($value, '/') !== false) {
                        $value = explode("/", $value);

                        $job_function[$key] = $value[1];
                    }
                }
                //$flag=1;
                unset($fields['Jobfunctions']);
                if (isset($job_function) && !empty($job_function)) {
                    $total = count($job_function);
                    $total = $total - 1;
                    $where .= ' (';
                    foreach ($job_function as $key => $value) {
                        $job_format = DB::table('jobtitles')->select('format')->whereNull('deleted_at')->where('name', $value)->first()->format;
                        $job_keyword = DB::table('jobtitles')->select('keyword')->whereNull('deleted_at')->where('name', $value)->first()->keyword;
                        $job_or_keywords = explode(',', $job_keyword);
                        for ($i = 0; $i < count($job_or_keywords); $i++) {
                            if (strchr('a' . $value, 'Chief')) {
                                $job_and_keywords[0] = $job_or_keywords[$i];
                            } else {
                                $job_and_keywords = explode(' ', $job_or_keywords[$i]);
                            }
                            for ($j = 0; $j < count($job_and_keywords); $j++) {
                                $keyword = $job_and_keywords[$j];
                                $st = 'job_title LIKE  ' . "'" . '%' . $keyword . '%' . "'";
                                if ($i == 0 && $j == 0) {
                                    $where .= '(';
                                }
                                if ($j == 0) {
                                    $where .= '(';
                                }
                                $where .= $st;
                                if ($j < count($job_and_keywords) - 1) {
                                    $where .= ' and ';
                                } else if ($i < count($job_or_keywords) - 1) {
                                    $where .= ') or ';
                                } else if ($key < $total) {
                                    $where .= ')) or';
                                } else if ($key == $total  && !empty($fields)) {
                                    $where .= '))) and ';
                                } else if ($total == $key) {
                                    $where .= ')))';
                                }
                            }
                        }
                        $format = DB::table('jobtitles')->select('format')->whereNull('deleted_at')->where('name', $value)->first()->format;
                    }
                }

                $flag = 1;
            }
            /*Validation check for employee job_level and add to filter query*/
            if (isset($fields['joblevels']) && !empty($fields['joblevels'])) { //die('1108');
                $job_levels = $fields['joblevels'];
                $job_level = $fields['joblevels'];
                unset($fields['joblevels']);
                /** REMOVE PARENT JOBLEVEL FOR CHILD  **/
                foreach ($job_level as $key => $value) {
                    if (strpos($value, '/') !== false) {
                        $value = explode("/", $value);
                        $job_level[$key] = $value[1];
                    }

                    $parent_id = DB::table('joblevels')->select(DB::raw('*'))->where('parent_id', '=', 0)->where('name', $value)->first();

                    if (!empty($parent_id)) {
                        $checkifchield =  DB::table('joblevels')->select(DB::raw('*'))->where('parent_id', $parent_id->id)->get();
                        if (!empty($checkifchield)) {
                            $total = count($checkifchield);
                            $total = $total - 1;
                            $where .= '( ';
                            foreach ($checkifchield as  $key1 => $value1) {
                                if ($total > $key1) {
                                    $where  .=  ' job_level LIKE  ' . "'" . '%' . $value1->slug . '%' . "'" . ' or ';
                                } elseif ($total == $key1 && !empty($fields)) {
                                    $where  .= ' job_level LIKE  ' . "'" . '%' . $value1->slug . '%' . "' ) and ";
                                } elseif ($total == $key1) {
                                    $where  .= ' job_level LIKE  ' . "'" . '%' . $value1->slug . '%' . "'  )";
                                }
                            }
                            unset($job_level[$key]);
                        }
                    } //echo $where;die('1140');


                }
                // $flag=1;
                //  print_r($job_level);die('675');

                if (isset($job_level) && !empty($job_level)) {
                    $total = count($job_level);
                    $total = $total - 1;
                    $count = 0;
                    $where .= '( ';
                    foreach ($job_level as $key => $value) {
                        if ($total > $count) {
                            $where  .=  ' job_level LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                        } elseif ($total == $count && !empty($fields)) {
                            $where  .= ' job_level LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                        } elseif ($total == $count) {
                            $where  .= ' job_level LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                        }
                        $count++;
                    }
                }
                $flag = 1;
            }

            /*Validation check for employee industries and  add to filter query*/
            if (isset($fields['industry']) && !empty($fields['industry'])) {
                $industries = $fields['industry'];
                unset($fields['industry']);

                if (isset($industries) && !empty($industries)) {
                    $total = count($industries);
                    $total = $total - 1;
                    $where .= '( ';
                    foreach ($industries as $key => $value) {
                        if ($total > $key) {
                            $where  .=  ' industries LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                        } elseif ($total == $key && !empty($fields)) {
                            $where  .= ' industries LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                        } elseif ($total == $key) {
                            $where  .= ' industries LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                        }
                    }
                    unset($fields['industries']);
                }
                $flag = 1;
            }
            /*Validation check for company ownership and  add to filter query*/
            if (isset($fields['ownership']) && !empty($fields['ownership'])) {
                $ownerships = $fields['ownership'];
                unset($fields['ownership']);

                if (isset($ownerships) && !empty($ownerships)) {
                    $total = count($ownerships);
                    $total = $total - 1;
                    $where .= '( ';
                    foreach ($ownerships as $key => $value) {
                        if ($total > $key) {
                            $where  .=  ' ownership LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                        } elseif ($total == $key && !empty($fields)) {
                            $where  .= ' ownership LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                        } elseif ($total == $key) {
                            $where  .= ' ownership LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                        }
                    }
                    unset($fields['ownerships']);
                }
                $flag = 1;
            }
            /*Validation check for company business model and  add to filter query*/
            if (isset($fields['business']) && !empty($fields['business'])) {
                $businesses = $fields['business'];
                unset($fields['business']);

                if (isset($businesses) && !empty($businesses)) {
                    $total = count($businesses);
                    $total = $total - 1;
                    $where .= '( ';
                    foreach ($businesses as $key => $value) {
                        if ($total > $key) {
                            $where  .=  ' business_model LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                        } elseif ($total == $key && !empty($fields)) {
                            $where  .= ' business_model LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                        } elseif ($total == $key) {
                            $where  .= ' business_model LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                        }
                    }
                    unset($fields['businesses']);
                }
                $flag = 1;
            }
            /*Start field['yearfounded] */
            if (isset($fields['yearfounded']) && !empty($fields['yearfounded'])) {
                $yearfounded = $fields['yearfounded'][0];
                unset($fields['yearfounded']);

                if (isset($yearfounded) && !empty($yearfounded)) {
                    $total = count($yearfounded);
                    $total = $total - 1;
                    $where .= ' (';
                    foreach ($yearfounded as $key => $value) {
                        $year = explode("-", $value);
                        $start_year = $year[0];
                        $end_year = $year[1];
                        if ($total > $key) {
                            $where  .=  ' (year_founded >=  ' . "'" . $start_year . "'" . ' and year_founded <=  ' . "'" . $end_year . "'" . ') or ';
                        } elseif ($total == $key && !empty($fields)) {
                            $where  .= ' (year_founded >=  ' . "'" . $start_year . "'" . 'and year_founded <=  ' . "'" . $end_year . "'" . ')) and ';
                        } elseif ($total == $key) {
                            $where  .= '( year_founded >=  ' . "'" . $start_year . "'" . ' and year_founded >=  ' . "'" . $start_year . "'" . ' )) ';
                        }
                    }
                }
                $flag = 1;
            }
            /*End filed['year_founded] */
            /*Start field['Revenue] */
            if (isset($fields['Revenue']) && !empty($fields['Revenue'])) {
                unset($fields['Revenue']);
            }
            if (isset($fields['Revenue_range']) && !empty($fields['Revenue_range'])) {
                unset($fields['Revenue_range']);
                /*
            $Revenue_range = $fields['Revenue_range'];
            unset($fields['Revenue_range']);

            if(isset($Revenue_range) && !empty($Revenue_range)){
                $total = count($Revenue_range);
                $total=$total-1;
                $where .=' (';
                foreach ($Revenue_range as $key => $value) {
                    $revenue = explode("-",$value);
                    $start_revenue = (int)$revenue[0];
                    $end_revenue = (int)$revenue[1];
                    if ($total>$key) {
                        $where  .=  ' (TRY_CONVERT(INT,revenue) >=  '.$start_revenue.' and TRY_CONVERT(INT,revenue) <=  '.$end_revenue .') or ';
                    }  elseif($total==$key && !empty($fields) ) {
                        $where  .= ' (TRY_CONVERT(INT,revenue) >=  ' .$start_revenue.'and TRY_CONVERT(INT,revenue) <=  '.$end_revenue .')) and ' ;

                    } elseif($total==$key) {
                        $where  .= '( TRY_CONVERT(INT,revenue) >=  ' .$start_revenue.' and TRY_CONVERT(INT,revenue) >=  ' .$end_revenue.' )) ' ;

                    }
                }

            }
            $flag = 1;
            */
            }
            /*End filed['Revenue] */
            /*Validation check for employee company_name and  add to filter query*/
            if (!empty($fields['company']) && !empty($fields['company'])) {
                $company_name = $fields['company'];
                // $fields['company'] = $fields['company_name'];

                unset($fields['company']);

                if (isset($company_name) && !empty($company_name)) {
                    $total = count($company_name);
                    $total = $total - 1;
                    $where .= ' (';
                    foreach ($company_name as $key => $value) {
                        if ($total > $key) {
                            $where  .=  ' company_name LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                        } elseif ($total == $key && !empty($fields)) {
                            $where  .= ' company_name LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                        } elseif ($total == $key) {
                            $where  .= ' company_name LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                        }
                    }
                }
                $flag = 1;
            }
            if (!empty($fields['zipcode']) && !empty($fields['zipcode'])) {
                $zipcode = $fields['zipcode'];
                unset($fields['zipcode']);
                if (!empty($zipcode) && !empty($fields)) {
                    $where  .= ' zipcode like "%' . $zipcode[0] . '%"   and ';
                } else {
                    $where  .= ' zipcode like "%' . $zipcode[0] . '%" ';
                }
            }
            if (!empty($fields['siccode']) && !empty($fields['siccode'])) {
                $siccode = $fields['siccode'];
                unset($fields['siccode']);
                if (!empty($siccode) && !empty($fields)) {
                    $where  .= ' csic_code like "%' . $siccode[0] . '%"   and ';
                } else {
                    $where  .= ' csic_code like "%' . $zipcode[0] . '%" ';
                }
            }
            if (!empty($fields['naicscode']) && !empty($fields['naicscode'])) {
                $naicscode = $fields['naicscode'];
                unset($fields['naicscode']);
                if (!empty($naicscode) && !empty($fields)) {
                    $where  .= ' cnai_code like "%' . $naicscode[0] . '%"   and ';
                } else {
                    $where  .= ' cnai_code like "%' . $naicscode[0] . '%" ';
                }
            }

            /* validation check for Other fileds here  */
            if (isset($fields) && !empty($fields)) {

                $key_count = 1;
                foreach ($fields as $key => $value) {
                    // var_dump($value);
                    $total = count($fields);
                    $value = implode("','", $value);
                    $value = "'" . $value . "'";
                    if ($total > $key_count) {
                        $where  .= ' ' . $key . '  in (' . $value . ') and ';
                    } else if ($total == $key_count) {
                        $where  .= ' ' . $key . ' in (' . $value . ')';
                    }
                    $key_count++;
                }
                $flag = 1;
            }
            if (isset($where) && !empty($where)) { // echo 'select * from businesscontacts where '.$where.'  LIMIT  20';
                $RangeOfDwonloads  = (int) $SamplesearchData->rangeofcontact;
                /*
            	if($RangeOfDwonloads>50000){
            		$RangeOfDwonloads=50000;
                }
                */
                $final_result = DB::select('select * from businesscontacts where ' . $where . ' ORDER BY RAND() LIMIT ' . $RangeOfDwonloads . ' ');
            }
            // print_r($final_result);die('720');
            if (!empty($final_result)) {
                $lineData = array();
                $contactlistDetails = array();

                // $array = array_slice($final_result,0,$RangeOfDwonloads);
                foreach ($final_result as $key => $value) {
                    if (!isset($format)) {
                        die('Job title did not set correctly');
                    }
                    if ($format == '1') {
                        $contactlistDetails[] = array(
                            'Employee First Name' => $value->first_name,
                            'Employee Last Name' => $value->last_name,
                            'Job Title' => $value->job_title,
                            'Employee Work Email' => $value->email_address,
                            'Employee Direct Phone' => $value->direct_phone,
                            'Company Name' => $value->company_name,
                            'Company Website' => $value->company_website,
                            'Company HQ Phone' => $value->phone_number,
                            'Company LinkedIn URL' => $value->clink,
                            'HQ Address1' => $value->address1,
                            'HQ Address2' => $value->address2,
                            'HQ City' => $value->city,
                            'HQ State' => $value->state,
                            'HQ Postal Code' => $value->zipcode,
                            'HQ Country' => $value->country,
                            'Company Primary Industry' => $value->industries,
                            'Number of Employees' => $value->employees,
                            'Company Revenue' => $value->revenue,
                            'Company Ownership' => $value->ownership,
                            'Company Business Model' => $value->business_model,
                            'Founded Year' => $value->year_founded,
                            'Company SIC Code' => $value->csic_code,
                            'Company NAICS Code' => $value->cnai_code,
                        );
                    } else if ($format == '2') {
                        $contactlistDetails[] = array(
                            'Employee First Name' => $value->first_name,
                            'Employee Last Name' => $value->last_name,
                            'Job Title' => $value->job_title,
                            'Employee Work Email' => $value->email_address,
                            'Company Name' => $value->company_name,
                            'Company Website' => $value->company_website,
                            'Company HQ Phone' => $value->phone_number,
                            'HQ Address' => $value->address1,
                            'HQ City' => $value->city,
                            'HQ State' => $value->state,
                            'HQ Postal Code' => $value->zipcode,
                            'HQ Country' => $value->country,
                            'Company Primary Industry' => $value->industries,
                            'Number of Employees' => $value->employees,
                            'Company Revenue' => $value->revenue,
                        );
                    } else {
                        die('Job Title did not set corectly');
                    }
                }
                $filename = "data_" . date('Y-m-d H:i:s') . '.csv';
                return Excel::create($filename, function ($excel) use ($contactlistDetails) {
                    $excel->sheet('mySheet', function ($sheet) use ($contactlistDetails) {
                        $sheet->fromArray($contactlistDetails);
                    });
                })->download('csv');
            }
        }
    }
    function getPrice($counts = NULL)
    {
        if (isset($counts) && $counts > 0) {
            switch ($counts) {
                case $counts <= 549:
                    $price = 0.99 * $counts;
                    break;
                case $counts > 549     &&  $counts <= 1000:
                    $price = 0.19 * $counts;
                    break;
                case $counts > 1000    &&  $counts <= 5000:
                    $price = 0.17 * $counts;
                    break;
                case $counts >= 5001   &&  $counts <= 10000:
                    $price = 0.15 * $counts;
                    break;
                case $counts >= 10001  &&  $counts <= 25000:
                    $price = 0.13 * $counts;
                    break;
                case $counts >= 25001  &&  $counts <= 50000:
                    $price = 0.11 * $counts;
                    break;
                case $counts >= 50001  &&  $counts <= 100000:
                    $price = 0.09 * $counts;
                    break;
                case $counts >= 100001 &&  $counts <= 500000:
                    $price = 0.07 * $counts;
                    break;
                case $counts >= 500001 &&  $counts <= 1000000:
                    $price = 0.05 * $counts;
                    break;
            }
        }
        return  $price > 0 ? $price : '';
    }
}
