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
use Cookie;
use Illuminate\Http\Response;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class PaymentController extends Controller
{
    public $frontpages = array();
    public $user_id = array();
    /**
     * Create a new controller instance.
     *
     * @return void
     **/
    public function __construct()
    {
        $userid = Session::get('user_id');
        $username = Session::get('user_name');
        $this->frontpages = DB::table('frontpages')->whereNull('deleted_at')->get();
        // if (!isset($userid)) {
        //     return redirect("/home");
        // }
        $this->user_id = $userid;
        $this->user_name = $username;
        //echo '<pre>'; print_r($this->frontpages); echo '</pre>';
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     **/

    public function addToCartByDetails(Request $request)
    {

        $cookiename = "products";
        $ifExist = array();
        if (!empty($_COOKIE[$cookiename])) {
            $ifExist = json_decode($_COOKIE[$cookiename], true);
        }

        if (array_search($request->savesearchid, array_column($ifExist, 'storeid')) !== false) {

            //echo 'value is in multidim array';

            $response['status'] = 'error';
            $response['totalcarcount'] = '';
            $response['html'] = '';

            return $response;
        } else {

            $priceencrypt = $request->price;
            $totalcontac = $request->contacts;

            $countencrypt      =  substr($totalcontac, 10);
            $countencrypt      =  base64_decode($countencrypt);
            $contacts          =  substr($countencrypt, 0, -10);

            $priceencrypt      =  substr($priceencrypt, 8);
            $priceencrypt      =  base64_decode($priceencrypt);
            $price             =  substr($priceencrypt, 0, -8);

            $user_id = (Session::get('user_id') != '') ? Session::get('user_id') : '';

            //$savesearchid = $request->savesearchid;
            $storeid = $request->savesearchid;
            $loginid = $request->loginid;

            $data  = DB::table('ready_made_store')->where('id', $storeid)->first();
            $listname = $data->listname;
            $id = DB::table('save_result')->insertGetId(array(
                'allsavedata' => $data->allsavedata,
                'filters' => $data->filters,
                'savetime' => $data->savetime,
                'totalamt' => $data->totalamt,
                'totlacontact' => $data->totlacontact,
                'types' => $data->types,
                'rangeofcontact' => $data->rangeofcontact,
                'countryfilters' => $data->countryfilters,
            ));

            $savesearchid = $id;

            $carts = array();
            $totalcartvalue = array();
            $response = array();
            $carts['id'] = '';
            $carts['price'] = $price;
            $carts['contacts'] = $contacts;
            $dataid = $this->base64_url_encode($savesearchid . '_' . date("s") . 'xy');
            $carts['savesearchid'] = $dataid;
            $carts['original_save_id'] = $savesearchid;
            $carts['storeid'] = $storeid;
            $carts['single_set_name'] = $listname;
            $html = '';

            if ($user_id == '') {
                $cart = array();

                if (!empty($_COOKIE[$cookiename])) {
                    $cart = json_decode($_COOKIE[$cookiename], true);
                }


                array_push($cart, $carts);

                $totalcarcount =  count($cart);

                setcookie($cookiename, json_encode($cart), time() + 86400, "/");
                $_COOKIE[$cookiename] = json_encode($cart);

                $data = json_decode($_COOKIE[$cookiename], true);

                $response['status'] = 'success';
                $response['totalcarcount'] = $totalcarcount;
            } else {

                $values = array('user_id' => $user_id, 'savesearchid' => $dataid, 'original_save_id' => $savesearchid, 'contacts' => $contacts, 'price' => $price);
                DB::table('cart')->insert($values);
                $data  = DB::table('cart')->where('user_id', $user_id)->get();
                $usercartdetails = collect($data)->map(function ($x) {
                    return (array) $x;
                })->toArray();
                $totalcarcount =  count($usercartdetails);

                $response['status'] = 'success';
                $response['totalcarcount'] = $totalcarcount;
            }
            //$response['html']=$html;

            DB::table('save_result')->where('id', $savesearchid)->update(['buy_status' => 1]);

            return $response;
        }
    }



    public function index()
    {
    }
    public function checkout($type, $billing)
    {
        $userid = Session::get('user_id');
        if (!isset($userid) || ($billing != 'monthly' && $billing != 'yearly')) {
            return redirect("/tool/upgrade-plan");
        }
        $userinfo = DB::table('users')->where('id', $userid)->whereNull('deleted_at')->first();
        if ($type == "free") {
            $paymethod = "Free";
            $amount = 0;
            $credits = 10;
        } else if ($type == "essentials") {
            $paymethod = "Essentials";
            $amount = 49;
            $credits = 200;
        } else if ($type == "pro") {
            $paymethod = "Pro";
            $amount = 99;
            $credits = 500;
        } else if ($type == "ultimate") {
            $paymethod = "Ultimate";
            $amount = 249;
            $credits = 2500;
        }
        return View('template.checkout', [
            'userid' => $userid,
            'paymethod' => $paymethod,
            'billing' => $billing,
            'amount' => $amount,
            'credits' => $credits,
            'firstname' => $userinfo->fname,
            'lastname' => $userinfo->lname,
            'email' => $userinfo->email,
            'plan' => $userinfo->plan,
            'customer' => $userinfo->customerID,
        ]);
    }


    public function destroyCookie()
    {


        $cookie = Cookie::forget('coupon');
        $response = new Response($cookie);
        $response->withCookie(cookie('coupon', '', -1));

        return $response;
    }

    public function checkoutstep2($type)
    {
        $cart = array();
        $totalsum = 0;
        if (!isset($type)) {
            die('Pay method not selected');
        }

        $user_id = (Session::get('user_id') != '') ? Session::get('user_id') : '';
        $data  = DB::table('cart')->where('user_id', $user_id)->get();

        $usercartdetails = collect($data)->map(function ($x) {
            return (array) $x;
        })->toArray();


        if (isset($_COOKIE['products']) && !empty($_COOKIE['products'])) {
            $cart = json_decode($_COOKIE['products'], true);
            $type = 'cookie';
        } else if (!empty($usercartdetails)) {

            $cart = $usercartdetails;
            $type = 'db';
        }

        if (!empty($cart)) {

            foreach ($cart as $carts) {

                $totalsum += $carts['price'];
            }
        }


        if ($user_id == '') {

            return View('template.checkout_step2', [

                'currentid' => $this->user_id,
                'page' => 'Checkout-Step2',
                'cart' => $cart,
                'types' => $type,
                'totalsum' => $totalsum,

            ]);
        } else {

            return redirect("/checkout/step3");
        }
    }

    public function checkoutstep3()
    {
        $cart = array();
        $totalsum = 0;
        $type = '';
        $user_id = (Session::get('user_id') != '') ? Session::get('user_id') : '';
        $data  = DB::table('cart')->where('user_id', $user_id)->get();

        $usercartdetails = collect($data)->map(function ($x) {
            return (array) $x;
        })->toArray();


        if (isset($_COOKIE['products']) && !empty($_COOKIE['products'])) {
            $cart = json_decode($_COOKIE['products'], true);
            $type = 'cookie';
        } else if (!empty($usercartdetails)) {

            $cart = $usercartdetails;
            $type = 'db';
        }

        if (!empty($cart)) {

            foreach ($cart as $carts) {

                $totalsum += $carts['price'];
            }
        }



        return View('template.checkout_step3', [

            'currentid' => $this->user_id,
            'page' => 'Checkout-Step3',
            'cart' => $cart,
            'types' => $type,
            'totalsum' => $totalsum,

        ]);
    }



    function random_strings($length_of_string)
    {
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shufle the $str_result and returns substring
        // of specified length
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }


    public function addtocart(Request $request)
    {


        $priceencrypt = $request->price;
        $totalcontac = $request->contacts;

        $countencrypt      =  substr($totalcontac, 10);
        $countencrypt      =  base64_decode($countencrypt);
        $contacts          =  substr($countencrypt, 0, -10);

        $priceencrypt      =  substr($priceencrypt, 8);
        $priceencrypt      =  base64_decode($priceencrypt);
        $price             =  substr($priceencrypt, 0, -8);

        $savesearchid = $request->savesearchid;
        $loginid = $request->loginid;

        $carts = array();
        $totalcartvalue = array();
        $response = array();
        $carts['id'] = '';
        $carts['price'] = $price;
        $carts['contacts'] = $contacts;
        $dataid = $this->base64_url_encode($savesearchid . '_' . date("s") . 'xy');
        $carts['savesearchid'] = $dataid;
        $carts['original_save_id'] = $savesearchid;
        $carts['single_set_name'] = '';
        $html = '';

        $savesearchdetails  = DB::table('save_result')->where('id', $savesearchid)->first();

        $buy_status = isset($savesearchdetails->buy_status) ? $savesearchdetails->buy_status : '';



        if ($buy_status == 0) {
            if ($loginid == '') {




                $cookiename = "products";
                $cart = array();

                if (!empty($_COOKIE[$cookiename])) {
                    $cart = json_decode($_COOKIE[$cookiename], true);
                }


                array_push($cart, $carts);

                $totalcarcount =  count($cart);

                setcookie($cookiename, json_encode($cart), time() + 86400, "/");
                $_COOKIE[$cookiename] = json_encode($cart);

                $data = json_decode($_COOKIE[$cookiename], true);


                //$html = "<table border='0' width='100%'>";

                foreach ($data as $key => $dataval) {

                    $html .= '<tr><Input type="hidden" name="arraykey" class="arraykey" value="' . $key . '">';
                    $html .= '<td>';
                    $html .= '<h5 class="">#' . $dataval['savesearchid'] . '</h5>';
                    $html .= '</td>';
                    $html .= '<td><span class="text-semibold">' . $dataval['contacts'] . '</span> Contacts</td>';
                    $html .=  '<td><span class="text-semibold">$' . $dataval['price'] . '</span>';
                    $html .= '<div type="button"class="close-btn close-btn-small pull-right removeitem" data-id="' . $dataval['original_save_id'] . '"  data-type="cookie"></div></td>';
                    $html .= '</tr>';
                }

                $response['status'] = 'success';
                $response['totalcarcount'] = $totalcarcount;
                $response['html'] = $html;

                DB::table('save_result')->where('id', $savesearchid)->update(['buy_status' => 1]);

                return $response;
            } else {

                $user_id = (Session::get('user_id') != '') ? Session::get('user_id') : '';

                $values = array('user_id' => $user_id, 'savesearchid' => $dataid, 'original_save_id' => $savesearchid, 'contacts' => $contacts, 'price' => $price);
                DB::table('cart')->insert($values);

                $data  = DB::table('cart')->where('user_id', $user_id)->get();
                $usercartdetails = collect($data)->map(function ($x) {
                    return (array) $x;
                })->toArray();
                $totalcarcount =  count($usercartdetails);

                foreach ($usercartdetails as $key => $dataval) {

                    $html .= '<tr><Input type="hidden" name="arraykey" class="arraykey" value="' . $key . '">';
                    $html .= '<td>';
                    $html .= '<h5 class="">#' . $dataval['savesearchid'] . '</h5>';
                    $html .= '</td>';
                    $html .= '<td><span class="text-semibold">' . $dataval['contacts'] . '</span> Contacts</td>';
                    $html .=  '<td><span class="text-semibold">$' . $dataval['price'] . '</span>';
                    $html .= '<div type="button"class="close-btn close-btn-small pull-right removeitem" data-id="' . $dataval['id'] . '"  data-type="db"></div></td>';
                    $html .= '</tr>';
                }

                $response['status'] = 'success';
                $response['totalcarcount'] = $totalcarcount;
                $response['html'] = $html;

                DB::table('save_result')->where('id', $savesearchid)->update(['buy_status' => 1]);

                return $response;
            }
        } else {

            $response['status'] = 'error';
            $response['totalcarcount'] = '';
            $response['html'] = '';

            return $response;
        }
    }



    public function removefromcartitem(Request $request)
    {


        $response = array();

        $removeKey = $request->removeKey;
        $id = $request->id;
        $type = $request->type;
        $totalsum = '';
        $coupval = '';

        if (isset($_COOKIE['coupon']) && !empty($_COOKIE['coupon'])) {

            $couponval = json_decode($_COOKIE['coupon'], true);

            $coupval = $couponval[0]['value'];
        }


        if ($type == 'cookie') {


            DB::table('save_result')->where('id', $id)->update(['buy_status' => 0]);
            $data = json_decode($_COOKIE["products"], true);
            unset($data[$removeKey]);

            $newdata = $data;
            setcookie('products', json_encode($newdata), time() + 86400, "/");
            $_COOKIE['products'] = json_encode($newdata);

            $totalcarcount =  count($data);



            $cart1 = json_decode($_COOKIE['products'], true);




            if (!empty($data)) {

                foreach ($data as $carts) {

                    $totalsum += $carts['price'];
                }
            }

            if ($totalsum < $coupval) {

                Cookie::queue(
                    Cookie::forget('coupon')
                );
            }
        } else if ($type == 'db') {

            //$getid = DB::table('cart')->where('id', $id)->first();
            //$savedelid = isset($getid->original_save_id)?$getid->original_save_id:'';

            DB::table('save_result')->where('id', $id)->update(['buy_status' => 0]);

            $user_id = (Session::get('user_id') != '') ? Session::get('user_id') : '';
            DB::table('cart')->where('original_save_id', $id)->where('user_id', $user_id)->delete();


            //$usercartdetails  = DB::table('cart')->where('user_id', $user_id)->get();

            $data  = DB::table('cart')->where('user_id', $user_id)->get();

            $usercartdetails = collect($data)->map(function ($x) {
                return (array) $x;
            })->toArray();

            //print_r($usercartdetails);
            $totalcarcount =  count($usercartdetails);

            if (!empty($usercartdetails)) {

                foreach ($usercartdetails as $carts) {

                    $totalsum += $carts['price'];
                }
            }

            if ($totalsum < $coupval) {

                Cookie::queue(
                    Cookie::forget('coupon')
                );
            }
        }

        $response['success'] = 'success';
        $response['totalcarcount'] = $totalcarcount;
        $response['removeKey'] = $removeKey;
        $response['totalsum'] = $totalsum;

        return $response;
    }
    public function removefromcart(Request $request)
    {
        $response = array();

        $removeKey = $request->removeKey;
        $id = $request->id;
        $type = $request->type;


        if ($type == 'cookie') {

            DB::table('save_result')->where('id', $id)->update(['buy_status' => 0]);
            $data = json_decode($_COOKIE["products"], true);
            unset($data[$removeKey]);
            setcookie("products", json_encode($data), time() + 86400, "/");
            $totalcarcount =  count($data);
        } else if ($type == 'db') {

            //$getid = DB::table('cart')->where('id', $id)->first();
            //$savedelid = isset($getid->original_save_id)?$getid->original_save_id:'';

            DB::table('save_result')->where('id', $id)->update(['buy_status' => 0]);

            $user_id = (Session::get('user_id') != '') ? Session::get('user_id') : '';
            DB::table('cart')->where('original_save_id', $id)->where('user_id', $user_id)->delete();


            $usercartdetails  = DB::table('cart')->where('user_id', $user_id)->get();
            $totalcarcount =  count($usercartdetails);
        }

        $response['success'] = 'success';
        $response['totalcarcount'] = $totalcarcount;
        $response['removeKey'] = $removeKey;

        return $response;
    }



    function base64_url_encode($input)
    {
        //return strtr(base64_encode($input), '+/=', '-_,');
        return strtoupper(rtrim(strtr(base64_encode($input), '+/', '-_'), '='));
    }
    function String2Stars($string = '', $first = 0, $last = 0, $rep = '*')
    {
        $begin  = substr($string, 0, $first);
        $middle = str_repeat($rep, strlen(substr($string, $first, $last)));
        $end    = substr($string, $last);
        $stars  = $begin . $middle . $end;
        return $stars;
    }

    public function details(Request $request)
    {


        $response = array();
        $html = '';

        if ($request->data != '') {

            $html = '';
            $data = DB::table('businesscontacts')->select(DB::raw('*'))->where('id', $request->data)->first();
            //print_r($data);die('669');




            if (!empty($data)) {

                $phone_number = $data->phone_number;
                $phone_number = substr_replace($phone_number, "***", 2, 3);
                $phone_number = substr_replace($phone_number, "***", 10, 4);
                $html .= '<div class="contact-card">
                        <div class="contact-card-line"><span
                                class="block gap-bottom font-regular text-rolling-stone text-semibold">Sample of Direct
                                Contact</span><button
                                type="button" class="modal-close-btn close-btn" data-dismiss="modal"
                                aria-label="Close"></button>
                            <h3 class="contact-card-title">' . $this->StringtoStarsAnother($data->first_name) . ' ' . $this->StringtoStarsAnother($data->last_name) . '  </h3><span class="contact-card-subtitle">' . $data->country . ', ' . $data->city . '</span>
                        </div>
                        <div class="contact-card-line">
                            <table class="table table-secondary table-fixed">
                                <tbody>
                                    <tr>
                                        <td><strong>Direct Email Contact</strong></td>
                                        <td>' . $this->String2Stars($data->email_address, 5, -5) . '</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone Number</strong></td>
                                        <td>' . $phone_number . '</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="contact-card-line">
                            <table class="table table-secondary table-fixed">
                                <tbody>
                                    <tr>
                                        <td><strong>Contact Name</strong></td>
                                        <td>' . $this->StringtoStarsAnother($data->first_name) . ' ' . $this->StringtoStarsAnother($data->last_name) . '</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Company Name</strong></td>
                                        <td>' . $data->company_name . '</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Job Function</strong></td>
                                        <td>' . $data->job_function . '</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Job Level</strong></td>
                                        <td>' . $data->job_level . '</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Job Tittle</strong></td>
                                        <td>' . $data->job_title . '</td>
                                    </tr>


                                    <tr>
                                        <td><strong>Industry</strong></td>
                                        <td>' . $data->industries . '</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Employee</strong></td>
                                        <td>' . $data->emp_min . ' - ' . $data->emp_max . '</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Revenue</strong></td>
                                        <td>' . $data->rev_min . ' - ' . $data->rev_max . '</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Country</strong></td>
                                        <td>' . $data->country . '</td>
                                    </tr>

                                    <tr>
                                        <td><strong>State</strong></td>
                                        <td>' . $data->state . '</td>
                                    </tr>

                                    <tr>
                                        <td><strong>City</strong></td>
                                        <td>' . $data->city . '</td>
                                    </tr>

                                     <tr>
                                        <td><strong>Zip Code</strong></td>
                                        <td>' . $data->zipcode . '</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>';


                $response['status'] = 'success';
                $response['html'] = $html;
            } else {

                $response['status'] = 'error';
                $response['html'] = '';
            }
            return $response;
        }
    }
    function StringtoStarsAnother($name)
    {

        $len = strlen($name);
        $str2 = '';
        for ($i = 0; $i < $len; $i++) {
            if ($i < 3 || $i > 5 && $i != ($len - 2)) {
                $str2 .= '*';
            } else {
                $str2 .= $name[$i];
            }
        }
        return $str2;
    }

    public function couponcode(Request $request)
    {

        $code = $request->code;
        $total = $request->total;

        $codeexist = DB::table('coupons')->whereNull('deleted_at')->where('name', $code)->first();

        if ($codeexist == '') {

            $response['success'] = 'error';
            $response['message'] = 'Invalide discount code';
        } else {


            $couponValue = $codeexist->value;

            $getcoupon = array();
            $getcoupon['name'] = $codeexist->name;
            $getcoupon['value'] = $codeexist->value;


            $cookiename = "coupon";
            $codecoupon = array();
            $ifExist = array();

            if (!empty($_COOKIE[$cookiename])) {
                $codecoupon = json_decode($_COOKIE[$cookiename], true);
            }

            if (!empty($_COOKIE[$cookiename])) {
                $ifExist = json_decode($_COOKIE[$cookiename], true);
            }

            if (array_search($codeexist->name, array_column($ifExist, 'name')) !== false) {


                $response['success'] = 'error';
                $response['message'] = 'THIS COUPON ALREADY APPLIED';
            } else {


                $totalcarcount =  count($codecoupon);

                if ($totalcarcount == 0) {

                    if ($total > $codeexist->value) {

                        $newtotal = ($total - $codeexist->value);

                        array_push($codecoupon, $getcoupon);

                        setcookie($cookiename, json_encode($codecoupon), time() + 86400, "/");
                        $_COOKIE[$cookiename] = json_encode($codecoupon);
                        $data = json_decode($_COOKIE[$cookiename], true);

                        $response['success'] = 'success';
                        $response['name'] = $codeexist->name;
                        $response['value'] = $codeexist->value;
                        $response['newtotal'] = $newtotal;

                        $response['message'] = 'COUPON APPLIED SUCCESSFULLY';
                    } else {

                        $response['success'] = 'error';
                        $response['message'] = 'TOTAL AMMOUNT LESS THAN COUPON VALUE';
                    }
                } else {

                    $response['success'] = 'error';
                    $response['message'] = 'ONE COUPON ALREADY APPLIED';
                }
            }
        }

        return $response;
    }

    public function checkoutsignup(Request $request)
    {

        $fname = $request->fname;
        $lstname = $request->lname;
        $cpmyname = $request->cname;
        $phone = $request->phone;
        $email = $request->email;
        $cntry = $request->cntry;
        $newpassword = sha1($request->password);

        $this->validate($request, [

            'fname' => 'required|min:2|max:50',
            'lname' => 'required|min:2|max:50',
            'email' => 'required',
            'phone' => 'required',
            'cntry' => 'required',
            'password' => 'required|min:6',
            'cpassword' => 'required|min:6|max:20|same:password',



        ], [

            'fname.required' => 'First name is required',
            'lname.required' => 'Last name is required',
            'email.required' => 'Email is required',
            'cntry.required' => 'Country is required',
            'phone.required' => 'Phone number is required',
            'password.required' => 'Password must be 6 character',
            'cpassword.required' => 'Password not match',
        ]);

        if (preg_match("/\b(hotmail|gmail|yahoo|aol|abc|xyz|rediffmail|live|outlook|me|msn|ymail)\b/i", $request->email)) {

            return redirect()->back()->with('mail_error', 'Please enter your "business email", sorry we don`t accept free email providers like hotmail, yahoo, gmail or etc.')->withInput(Input::all());
        } else if (!preg_match('/[\@]/', $request->email)) {

            return redirect()->back()->with('mail_error', 'Please Enter a valid Email')->withInput();
        } else {


            $user = User::create([
                'name' => $request->fname,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'cname' => $request->cname,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => sha1($request->password),
                'type' => "User",
                'verify' => "1"
            ]);
            $role = Role::where('name', 'USERS')->first();
            DB::table('users')->where('id', $user->id)->update(['cntry' => $cntry]);

            $userid = Session::forget('user_id');
            $email = $request->email;
            $return_url = isset($request->return_url) ? $request->return_url : '';
            $password = sha1($request->password);
            $cart = array();
            $orderno = $this->random_strings(10);
            $users = DB::table('users')->where('email', $email)->where('password', $password)->where('verify', 1)->get();


            if (!empty($_COOKIE['products'])) {
                $cart = json_decode($_COOKIE['products'], true);
            }

            Session::put('user_id', $users[0]->id);
            Session::put('user_name', $users[0]->name);

            if (!empty($_COOKIE['orderno'])) {
                Session::put('orderno', $_COOKIE['orderno']);
            }

            if (!empty($cart)) {

                foreach ($cart as $cartval) {

                    $save_number = $cartval['original_save_id'];
                    $single_set_name = isset($cartval['single_set_name']) ? $cartval['single_set_name'] : '';

                    $values = array('user_id' => $users[0]->id, 'single_set_name' => $single_set_name, 'savesearchid' => $cartval['savesearchid'], 'original_save_id' => $cartval['original_save_id'], 'contacts' => $cartval['contacts'], 'price' => $cartval['price']);
                    DB::table('cart')->insert($values);
                }
            }

            $cookie = Cookie::forget('products');


            return redirect("/checkout/step3")->withCookie(cookie('products', '', -1));
        }
    }
}
