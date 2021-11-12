<?php

/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
// use Datatables
use Yajra\Datatables\Datatables;;

use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
// use Validator;
use Illuminate\Support\Facades\Validator;
// use DB;
use Illuminate\Support\Facades\DB;
// use Mail;
use Illuminate\Support\Facades\Mail;

use App\User;

class UsersController extends Controller
{
    public $show_action = false;
    public $view_col = 'name';
    public $listing_cols = ['id', 'name', 'fname', 'lname', 'cname', 'email', 'plan', 'active'];

    public function __construct()
    {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Users', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Users', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::get('Users');

        if (Module::hasAccess($module->id)) {
            return View('la.users.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Module::hasAccess("Users", "view")) {
            $user = User::findOrFail($id);
            if (isset($user->id)) {
                $allusers = DB::table('users')->select('*')->whereNull('deleted_at')->get();
                $userinfo = DB::table('users')->select('*')->whereNull('deleted_at')->where('id', $user->id)->first();
                if (!$userinfo) {
                    return view('errors.404', [
                        'record_id' => $id,
                        'record_name' => ucfirst("user"),
                    ]);
                }
                $customerID = $userinfo->customerID;
                if ($customerID == NULL) {
                    $userinfo->paid_count = 0;
                    $userinfo->paid_amount = 0;
                    $userinfo->draft_count = 0;
                    $userinfo->draft_amount = 0;
                    $userinfo->unpaid_count = 0;
                    $userinfo->unpaid_amount = 0;
                    $userinfo->cancelled_count = 0;
                    $userinfo->cancelled_amount = 0;
                    $userinfo->refunded_count = 0;
                    $userinfo->refunded_amount = 0;
                } else {
                    $userinfo->paid_count = 0;
                    $userinfo->paid_amount = 0;
                    $userinfo->draft_count = 0;
                    $userinfo->draft_amount = 0;
                    $userinfo->unpaid_count = 0;
                    $userinfo->unpaid_amount = 0;
                    $userinfo->cancelled_count = 0;
                    $userinfo->cancelled_amount = 0;
                    $userinfo->refunded_count = 0;
                    $userinfo->refunded_amount = 0;
                    require_once('stripe-php/init.php');
                    $stripe = array(
                        "secret_key"      => "sk_test_5RHVe0SMHECoNMe5H2K76oxh",
                        "publishable_key" => "pk_test_uPHbA4uj1n1d4UJB4xDTMSJ9"
                    );
                    $stripe = new \Stripe\StripeClient(
                        'sk_test_5RHVe0SMHECoNMe5H2K76oxh'
                    );
                    $paid = $stripe->invoices->all(['status' => 'paid'])->data;
                    $userinfo->paid_count = count($paid);
                    for ($i = 0; $i < count($paid); $i++) {
                        $userinfo->paid_amount += $paid[$i]->lines->data[0]->amount / 100;
                    }

                    $draft = $stripe->invoices->all(['status' => 'draft'])->data;
                    $userinfo->draft_count = count($draft);
                    for ($i = 0; $i < count($draft); $i++) {
                        $userinfo->draft_amount += $draft[$i]->lines->data[1]->amount / 100;
                    }

                    $cancelled = $stripe->invoices->all(['status' => 'void'])->data;
                    $userinfo->cancelled_count = count($cancelled);
                    for ($i = 0; $i < count($draft); $i++) {
                        $userinfo->cancelled_amount += $cancelled[$i]->lines->data[1]->amount / 100;
                    }

                    $userinfo->refunded_count = $userinfo->cancelled_count;
                    $userinfo->refunded_amount = $userinfo->cancelled_amount;
                }
                if ($userinfo->plan == 0) {
                    $userinfo->plan_name = 'Free';
                    $userinfo->billing_amount = '-';
                    $userinfo->billing_method = '-';
                    $userinfo->billing_getcredit = 20;
                } else {
                    $planinfo = DB::table('plan')->select('*')->where('id', $userinfo->plan)->first();
                    $userinfo->plan_name = $planinfo->product_name;
                    $userinfo->billing_amount = $planinfo->price;
                    $userinfo->billing_method = $planinfo->billing;
                    $userinfo->billing_getcredit = $planinfo->credit;
                }
                $recentActions = DB::table('user_log')->select('*')->where('userid', $userinfo->id)->orderBy('created_at', 'desc')->get();

                return View('la.users.useritem', [
                    'allusers' => $allusers,
                    'userinfo' => $userinfo,
                    'recentActions' => $recentActions
                ]);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("user"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Datatable Ajax fetch
     *
     * @return
     */
    public function dtajax()
    {
        $values = DB::table('users')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Users');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/users/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                if ($col == 'plan') {
                    $planid = $data->data[$i][$j];
                    $data->data[$i][$j] = 'Free';
                    $planinfo = DB::table('plan')->select('product_name')->where('id', $planid)->first();
                    if ($planinfo) {
                        $data->data[$i][$j] = $planinfo->product_name;
                    }
                }
                if ($col == 'active') {
                    if ($data->data[$i][$j]) {
                        $data->data[$i][$j] = "<span style='color:white;background:green;border-radius:3px;padding:1px 3px;' >ACTIVE </span>";
                    } else {
                        $data->data[$i][$j] = "<span style='color:white;background:red;border-radius:3px;padding:1px 3px' >INACTIVE </span>";
                    }
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("Users", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/users/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("Users", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.users.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][] = (string)$output;
            }
            array_unshift($data->data[$i], '<div style="text-align:center"><input type="checkbox"></div>');
        }
        $out->setData($data);
        return $out;
    }
    public function update_user(Request $request)
    {
        $id = $request->id;
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $cntry = $request->cntry;
        $phone = $request->phone;
        $cname = $request->cname;
        $result = DB::table('users')->where('id', $id)->update(array('fname' => $fname, 'lname' => $lname, 'email' => $email, 'cntry' => $cntry, 'phone' => $phone));
        if ($result) {
            return redirect("/admin/users/" . $id);
        } else {
            die('Error occured while updating userinfo');
        }
    }
    public function delete_user(Request $request)
    {
        $id = $request->id;
        $result = DB::table('users')->where('id', $id)->delete();
        return $result;
    }
    public function change_password(Request $request)
    {
        $id = $request->id;
        $password = $request->password;
        $result = DB::table('users')->where('id', $id)->update(array('password' => sha1($password)));
        if ($result) {
            return redirect("/admin/users/" . $id);
        } else {
            die('Error occured while changing password');
        }
    }
    public function change_plan(Request $request)
    {
        require_once('stripe-php/init.php');
        $stripe = array(
            "secret_key"      => "sk_test_5RHVe0SMHECoNMe5H2K76oxh",
            "publishable_key" => "pk_test_uPHbA4uj1n1d4UJB4xDTMSJ9"
        );
        $api_error = "";
        \Stripe\Stripe::setApiKey($stripe['secret_key']);

        $id = $request->id;
        $planName = $request->plan_type;
        $type = explode('-', $planName)[1];
        $billing = explode('-', $planName)[2] . 'ly';

        $current_planid = DB::table('users')->select('plan')->where('id', $id)->first()->plan;
        $customerID = DB::table('users')->select('customerID')->where('id', $id)->first()->customerID;
        $email = DB::table('users')->select('email')->where('id', $id)->first()->email;
        if ($type == 'free') {
            $planid = 0;
        } else {
            $planid = DB::table('plan')->select('id')->where('slug', $type)->where('billing', $billing)->first()->id;
            if (!$planid) {
                $planid = 0;
            }
        }
        if ($planid != 0) {
            $productID = DB::table('plan')->select('plan_id')->where('id', $planid)->first()->plan_id;
            if (!$productID) {
                die('No product ID');
            }
        }
        if ($current_planid == $planid) {
            return redirect("/admin/users/" . $id);
        }
        if ($customerID == '') {
            die('Add customer first');
            try {
                $customer = \Stripe\Customer::create(array(
                    'email' => $email
                ));
                $customerID = $customer->id;
                DB::table('users')->where('id', $id)->update(array('customerID' => $customer->id));
            } catch (Exception $e) {
                $api_error = $e->getMessage();
                die('Add customer on stripe error');
            }
        }
        if ($planid > $current_planid) {
            if ($current_planid == 0) {
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
                    die('Create subscription on stripe failed');
                }
                $flag = 'create';
            } else {
                $subscriptionID = DB::table('users')->select('subscription_id')->where('id', $id)->first()->subscription_id;
                $currentScriptionID = DB::table('user_subscriptions')->select('*')->where('status', 'active')->where('stripe_customer_id', $customerID)->where('id', $subscriptionID)->first()->stripe_subscription_id;
                if (!$currentScriptionID) {
                    die('No previous subscription on stripe for upgrade');
                }
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
                    die('Upgrade on stripe failed');
                }
                $flag = 'upgrade';
            }
        } else if ($planid < $current_planid) {
            if ($planid == 0) {
                $subscriptionID = DB::table('users')->select('subscription_id')->where('id', $id)->first()->subscription_id;
                $currentScriptionID = DB::table('user_subscriptions')->select('*')->where('status', 'active')->where('stripe_customer_id', $customerID)->where('id', $subscriptionID)->first()->stripe_subscription_id;
                if (!$currentScriptionID) {
                    die('No previous subscription on stripe for upgrade');
                }
                try {
                    $stripe = new \Stripe\StripeClient(
                        'sk_test_5RHVe0SMHECoNMe5H2K76oxh'
                    );
                    $subscription = $stripe->subscriptions->cancel(
                        $currentScriptionID,
                        []
                    );
                } catch (Exception $e) {
                    $api_error = $e->getMessage();
                    die($api_error);
                }
                $flag = 'cancel';
            } else {
                $subscriptionID = DB::table('users')->select('subscription_id')->where('id', $id)->first()->subscription_id;
                $currentScriptionID = DB::table('user_subscriptions')->select('*')->where('status', 'active')->where('stripe_customer_id', $customerID)->where('id', $subscriptionID)->first()->stripe_subscription_id;
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
                    die($api_error);
                }
                $flag = 'downgrade';
            }
        }
        if ($subscription && empty($api_error) && $flag != 'cancel') {
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
                    'user_id' => $id,
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
                if ($subscription_id && !empty($id)) {
                    $credit = DB::table('users')->where('id', $id)->first()->credit;
                    if ($flag == 'create') {
                        DB::table('users')->where('id', $id)->update(array('credit' => 0, 'last_upgrade' => $date, 'subscription_id' => $subscription_id, 'plan' => $planid));
                        $data = array('name' => "beta globleads  Payment Information", 'email' => $email, 'type' => $type, 'billing' => $billing);
                        Mail::send(['text' => 'mail'], $data, function ($message) use ($email, $type, $billing) {
                            $message->to($email, 'Payment')->subject('You created subscription.Now you have ' . $type . '/' . $billing . '  subscription.');
                            $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
                        });
                        Mail::send(['text' => 'mail'], $data, function ($message) use ($email, $type, $billing) {
                            $message->to('debashis.matainja@gmail.com', 'Payment')->subject('You created subscription.Now you have ' . $type . '/' . $billing . '  subscription.');
                            $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
                        });
                    }
                    if ($flag == 'upgrade') {
                        DB::table('users')->where('id', $id)->update(array('last_upgrade' => $date, 'subscription_id' => $subscription_id, 'plan' => $planid));
                        $data = array('name' => "beta globleads  Payment Information", 'email' => $email, 'type' => $type, 'billing' => $billing);
                        Mail::send(['text' => 'mail'], $data, function ($message) use ($email, $type, $billing) {
                            $message->to($email, 'Payment')->subject('You upgraded subscription.Now you have ' . $type . '/' . $billing . '  subscription.');
                            $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
                        });
                        Mail::send(['text' => 'mail'], $data, function ($message) use ($email, $type, $billing) {
                            $message->to('debashis.matainja@gmail.com', 'Payment')->subject('You upgraded subscription.Now you have ' . $type . '/' . $billing . '  subscription.');
                            $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
                        });
                    }
                    if ($flag == 'downgrade') {
                        DB::table('user_subscriptions')->where('id', $subscriptionID)->update(array('status' => 'inactive'));
                        DB::table('users')->where('id', $id)->update(array('last_downgrade' => $date, 'plan' => $planid));
                        $data = array('name' => "beta globleads  Payment Information", 'email' => $email, 'type' => $type, 'billing' => $billing);
                        Mail::send(['text' => 'mail'], $data, function ($message) use ($email, $type, $billing) {
                            $message->to($email, 'Payment')->subject('You downgraded subscription.Now you have ' . $type . '/' . $billing . '  subscription.');
                            $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
                        });
                        Mail::send(['text' => 'mail'], $data, function ($message) use ($email, $type, $billing) {
                            $message->to('debashis.matainja@gmail.com', 'Payment')->subject('You downgraded subscription.Now you have ' . $type . '/' . $billing . '  subscription.');
                            $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
                        });
                    }
                }
            }
        } else if ($flag == 'cancel') {
            $date = date("Y-m-d H:i:s");
            DB::table('users')->where('id', $id)->update(array('last_downgrade' => $date, 'plan' => 0, 'subscription_id' => 0));
            $data = array('name' => "beta globleads  Payment Information", 'email' => $email);
            Mail::send(['text' => 'mail'], $data, function ($message) use ($email) {
                $message->to($email, 'Payment')->subject('You cancelled subscription.Now you have free subscription.');
                $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
            });
            Mail::send(['text' => 'mail'], $data, function ($message) use ($email) {
                $message->to('debashis.matainja@gmail.com', 'Payment')->subject('You cancelled subscription.Now you have free subscription.');
                $message->from('debashis.matainja@gmail.com', 'beta globleads  Payment Information');
            });
        } else {

            $statusMsg = "Transaction has been failed";
            die($statusMsg);
        }
        return redirect('/admin/users/' . $id);
    }
    public function change_restriction(Request $request)
    {
        $id = $request->id;
        $status = $request->restriction_status ? 1 : 0;
        $verified = $request->restriction_verified ? 1 : 0;
        $view_contact = $request->restriction_view_contact ? 1 : 0;
        $upgrade_plan = $request->restriction_upgrade_plan ? 1 : 0;
        $downgrade_plan = $request->restriction_downgrade_plan ? 1 : 0;
        $cancel_plan = $request->restriction_cancel_plan ? 1 : 0;
        $download_contact = $request->restriction_download_contact ? 1 : 0;
        $result = DB::table('users')->where('id', $id)->update(array("active" => $status, "verified" => $verified, "view_contact" => $view_contact, "upgrade_plan" => $upgrade_plan, "downgrade_plan" => $downgrade_plan, "cancel_plan" => $cancel_plan, "download_contact" => $download_contact));
        if ($result) {
            return redirect("/admin/users/" . $id);
        } else {
            die('Error occured while changing plan');
        }
    }
    public function send_message(Request $request)
    {
        $email = $request->email;
        $msg = $request->msg;

        $data = array('name' => "beta globleads  From site admin", 'email' => $email, 'msg' => $msg);

        Mail::send(['text' => 'mail'], $data, function ($message) use ($email, $msg) {
            $message->to($email, 'FromAdmin')->subject($msg);
            $message->from('debashis.matainja@gmail.com', 'beta globleads  From site admin');
        });
        return redirect("/admin/users");
    }
    public function send_message_multi(Request $request)
    {
        $ids = $request->ids;
        $msg = $request->msg;
        $id = json_decode($ids);
        for ($i = 0; $i < count($id); $i++) {
            $email = DB::table('users')->select('email')->where('id', $id[$i])->first()->email;
            $data = array('name' => "beta globleads  From site admin", 'email' => $email, 'msg' => $msg);

            Mail::send(['text' => 'mail'], $data, function ($message) use ($email, $msg) {
                $message->to($email, 'FromAdmin')->subject($msg);
                $message->from('debashis.matainja@gmail.com', 'beta globleads  From site admin');
            });
        }
        return redirect("/admin/users");
    }
}
