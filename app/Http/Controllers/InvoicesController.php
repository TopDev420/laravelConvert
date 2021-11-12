<?php

/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use DB;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Role;
use App\User;
// use Session;
use Illuminate\Support\Facades\Session;
// use Mail;
use Illuminate\Support\Facades\Mail;
use App\Models\BusinessContact;
use Illuminate\Support\Facades\Input;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class InvoicesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     **/
    public function __construct()
    {
    }
    public function index()
    {
        $userid = Session::get('user_id');
        $username = Session::get('user_name');
        if (!$userid) {
            return redirect("/home");
        }

        $userinfo = DB::table('users')->select('*')->where('id', $userid)->first();
        $allcontacts = DB::select('select count(id) as total_ids from businesscontacts where active = 1')[0]->total_ids;

        $customer = DB::table('users')->whereNull('deleted_at')->where('id', $userid)->first()->customerID;
        if ($customer) {
            require_once('stripe-php/init.php');
            $stripe = array(
                "secret_key"      => "sk_test_51Hu5GQJNBNbUpyz6O5F1SYNI7Sx2qPUbKstYNM12BO8yvH46FoAAzEld0zI0iuUIlRFvCOTukWCdAOleAv9ry10200hnOGoQGj",
                "publishable_key" => "pk_test_51Hu5GQJNBNbUpyz6WRtMzlTL6btHhdwRQYkibSQtFkokjIPPmZm0yTXSI8tvc3EK68CQvOTxzVFIBneE9GBy0JnT007rhlSmhp"
            );
            $stripe = new \Stripe\StripeClient(
                'sk_test_51Hu5GQJNBNbUpyz6O5F1SYNI7Sx2qPUbKstYNM12BO8yvH46FoAAzEld0zI0iuUIlRFvCOTukWCdAOleAv9ry10200hnOGoQGj'
            );
            $invoices = $stripe->invoices->all(['customer' => $customer, 'limit' => 21])->data;
            $invoices_count = count($invoices);
            $after = $invoices_count > 20 ? true : false;
            if ($invoices_count > 20) {
                unset($invoices[20]);
                $invoices_count--;
            }
        } else {
            $invoices = [];
            $invoices_count = 0;
            $after = false;
        }

        return View('template.invoices', [
            'invoices' => $invoices,
            'count' => $invoices_count,
            'userinfo' => $userinfo,
            'username' => isset($username) ? $username : '',
            'allcontacts' => $allcontacts,
            'isafter' => $after,
            'isbefore' => false
        ]);
    }
    public function getNextInvoices(Request $request)
    {
        $after = $request->after;
        $userid = Session::get('user_id');
        $username = Session::get('user_name');
        if (!$userid) {
            return redirect("/home");
        }
        require_once('stripe-php/init.php');
        $stripe = array(
            "secret_key"      => "sk_test_5RHVe0SMHECoNMe5H2K76oxh",
            "publishable_key" => "pk_test_uPHbA4uj1n1d4UJB4xDTMSJ9"
        );
        $stripe = new \Stripe\StripeClient(
            'sk_test_5RHVe0SMHECoNMe5H2K76oxh'
        );
        $userinfo = DB::table('users')->select('*')->where('id', $userid)->first();
        $customer = $userinfo->customerID;
        if ($after) {
            $invoices = $stripe->invoices->all(['customer' => $customer, 'limit' => 20, 'starting_after' => $after])->data;
        } else {
            $invoices = $stripe->invoices->all(['customer' => $customer, 'limit' => 20])->data;
        }
        $after = count($stripe->invoices->all(['customer' => $customer, 'limit' => 2, 'starting_after' => $invoices[count($invoices) - 1]->id])->data) > 0 ? true : false;
        return response()->json(array('result' => true, 'invoices' => $invoices, 'isbefore' => true, 'isafter' => $after));
        die();
    }
    public function getPreviousInvoices(Request $request)
    {
        $before = $request->before;
        $userid = Session::get('user_id');
        $username = Session::get('user_name');
        if (!$userid) {
            return redirect("/home");
        }
        require_once('stripe-php/init.php');
        $stripe = array(
            "secret_key"      => "sk_test_5RHVe0SMHECoNMe5H2K76oxh",
            "publishable_key" => "pk_test_uPHbA4uj1n1d4UJB4xDTMSJ9"
        );
        $stripe = new \Stripe\StripeClient(
            'sk_test_5RHVe0SMHECoNMe5H2K76oxh'
        );
        $userinfo = DB::table('users')->select('*')->where('id', $userid)->first();
        $customer = $userinfo->customerID;
        if ($before) {
            $invoices = $stripe->invoices->all(['customer' => $customer, 'limit' => 20, 'ending_before' => $before])->data;
        } else {
            $invoices = $stripe->invoices->all(['customer' => $customer, 'limit' => 20])->data;
        }
        $before = count($stripe->invoices->all(['customer' => $customer, 'limit' => 2, 'ending_before' => $invoices[0]->id])->data) > 0 ? true : false;
        return response()->json(array('result' => true, 'invoices' => $invoices, 'isbefore' => $before, 'isafter' => true));
        die();
    }
}
