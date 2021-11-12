<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use DB;
use Illuminate\Support\Facades\DB;
// use Session;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Role;
use App\User;
// use Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use App\Models\BusinessContact;
use Illuminate\Support\Facades\Input;
use Redirect;
// use Twilio\Http\Client;

use Illuminate\Support\Str;

class HomeController extends Controller
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
        if (!isset($userid)) {
            return redirect("/home");
        }
        $this->user_id = $userid;
        $this->user_name = $username;
        //echo '<pre>'; print_r($this->frontpages); echo '</pre>';
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     **/
    public function index()
    {
        return View('template.home', [
            'currentid' => $this->user_id,
            'username' => isset($this->user_name) ? $this->user_name : '',
            'page' => 'home',
        ]);
    }

    /***ABOUT PAGE***/
    public function about()
    {
        $aboutdata = array();
        $img = array('image', 'fet_img_one', 'fet_img_two');
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'about') {
                $aboutdata = $this->frontpages[$pagekey];
                foreach ($img as $key => $imgkey) {
                    //$dashimage = DB::table('uploads')->where('id',$this->frontpages[$pagekey]->$imgkey)->get()[0]->name;
                    //$aboutdata->$imgkey = str_replace("public","",url('/')).'storage/uploads/'.$dashimage;
                }
            }
        }
        $imgid = $aboutdata->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $aboutdata->image = url('/') . '/storage/uploads/' . $bnr_img;
        return View('template.about', [
            'frontpages' => $this->frontpages,
            'aboutdata' => $aboutdata,
            'currentid' => $this->user_id,
            'page' => 'about'
        ]);
    }

    /***ABOUT PAGE***/
    public function ourguarantees()
    {

        return View('template.ourguarantees', [

            'currentid' => $this->user_id,
            'page' => 'Our-guarantees'
        ]);
    }


    /***ABOUT PAGE***/
    public function pressroom()
    {

        return View('template.pressroom', [

            'currentid' => $this->user_id,
            'page' => 'press-room'
        ]);
    }

    public function pressroom_bookyourdata()
    {

        return View('template.pressroom_bookyourdata', [

            'currentid' => $this->user_id,
            'page' => 'press-room'
        ]);
    }
    public function pressroom_bookyourdata_live()
    {

        return View('template.pressroom_bookyourdata_live', [

            'currentid' => $this->user_id,
            'page' => 'press-room'
        ]);
    }
    public function community_relations()
    {

        return View('template.community_relations', [

            'currentid' => $this->user_id,
            'page' => 'community-relations'
        ]);
    }

    public function career()
    {

        return View('template.career', [

            'currentid' => $this->user_id,
            'page' => 'career'
        ]);
    }


    /***CONTACT PAGE***/
    public function contact($status = '')
    {
        $contactdata = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'contact') {
                $contactdata = $this->frontpages[$pagekey];
            }
        }
        return View('new.contact', [
            'frontpages' => $this->frontpages,
            'contactdata' => $contactdata,
            'page' => 'contact',
            'currentid' => $this->user_id,
            'status'  => $status
        ]);
    }

    /***PRICING PAGE***/
    public function pricing()
    {
        $pricing = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'pricing') {
                $pricing = $this->frontpages[$pagekey];
            }
        }
        $imgid = $pricing->image;
        $dashimage = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $pricing->image = url('/') . '/storage/uploads/' . $dashimage;
        $slakes =  DB::table('priceslakes')->get();
        return View('template.pricing', [
            'frontpages' => $this->frontpages,
            'pricing' => $pricing,
            'page' => 'pricing',
            'currentid' => $this->user_id,
            'price_slakes' => $slakes,
        ]);
    }

    /***BUILDLIST PAGE AND ALSO PAGE FUNCTIONALITY***/
    public function buildlist()
    {
        $searchid = '';
        $userid = Session::get('user_id');
        /****SAVED SEARCH DATA****/
        if (isset($_GET['searchid'])) {
            $searchid = $_GET['searchid'];
        }
        $serchinfo = DB::table('savesearch')->where('id', $searchid)->first();
        //print_r($serchinfo);die('156');
        if (!empty($serchinfo)) {
            $save_id = $serchinfo->allsavedataid;
            $save_filter = $serchinfo->filters;
            $save_id_exp = (explode(",", $save_id));
            // echo '<pre>'; print_r($save_id_exp);
            $save_filter_exp = (explode(",", $save_filter));
            //echo '<pre>'; print_r($save_filter_exp);
            $totalamt = $serchinfo->totalamt;

            $totlacontact = $serchinfo->totlacontact;
        }
        $save_filter_exp =  !empty($save_filter_exp) ? $save_filter_exp : '';
        //print_r($save_filter_exp);die('ddd');
        //echo '<pre>'; print_r($serchinfo); exit;

        $buildlist = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'buildlist') {
                $buildlist = $this->frontpages[$pagekey];
            }
        }
        $imgid = $buildlist->image;
        $banner_image = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $buildlist->image = url('/') . '/storage/uploads/' . $banner_image;

        if ($searchid) {

            $contacts =  DB::table('businesscontacts')->whereIn('id', $save_id_exp)->get();
        } else {

            $contacts =  DB::table('businesscontacts')->take(10)->get();
        }

        foreach ($contacts as $key => $contact) {
            // Replace string in Email
            $email = $contact->email_address;
            $len = strlen($email);
            $str1 = '';
            for ($i = 0; $i < $len; $i++) {
                if ($i < 3 || $i > 10 && $i != ($len - 2)) {
                    $str1 .= '*';
                } else {
                    $str1 .= $email[$i];
                }
            }
            $contacts[$key]->email_address = $str1;

            // Replace string in Last Name
            $last_name = $contact->last_name;
            $len = strlen($last_name);
            $str2 = '';
            for ($i = 0; $i < $len; $i++) {
                if ($i < 3 || $i > 5 && $i != ($len - 2)) {
                    $str2 .= '*';
                } else {
                    $str2 .= $last_name[$i];
                }
            }
            $contacts[$key]->last_name = $str2;

            // Replace string in Company Name
            $company_name = $contact->company_name;
            $len = strlen($company_name);
            $str3 = '';
            for ($i = 0; $i < $len; $i++) {
                if ($i < 3 || $i > 5 && $i != ($len - 2)) {
                    $str3 .= '*';
                } else {
                    $str3 .= $company_name[$i];
                }
            }
            $contacts[$key]->company_name = $str3;

            // Replace string in Company Name
            $phone_number = $contact->phone_number;
            $len = strlen($phone_number);
            $str4 = '';
            for ($i = 0; $i < $len; $i++) {
                if ($i != ($len - 1)) {
                    $str4 .= '*';
                } else {
                    $str4 .= $phone_number[$i];
                }
            }
            $contacts[$key]->phone_number = $str4;
        }

        $industries = DB::table('businesscontacts')->select('industries')->whereNull('deleted_at')->get();
        $indus = array();
        foreach ($industries as $key => $value) {
            $string = substr($value->industries, 0, strpos($value->industries, ','));
            if (!in_array($string, $indus)) {
                array_push($indus, $string);
            }
        }

        $country = DB::table('businesscontacts')->select('country')->whereNull('deleted_at')->get();
        $countries = array();
        foreach ($country as $key => $value) {
            $cnt = $value->country;
            if (!in_array($cnt, $countries)) {
                array_push($countries, $cnt);
            }
        }

        $state = DB::table('businesscontacts')->select('state')->whereNull('deleted_at')->get();
        $stat = array();
        foreach ($state as $key => $value) {
            $states = $value->state;
            if (!in_array($states, $stat)) {
                array_push($stat, $states);
            }
        }

        $city = DB::table('businesscontacts')->select('city')->whereNull('deleted_at')->get();
        $cities = array();
        foreach ($city as $key => $value) {
            $citys = $value->city;
            if (!in_array($citys, $cities)) {
                array_push($cities, $citys);
            }
        }

        // $state = DB::table('san_states')->where('country_id', 231)->get();

        $employee_range = DB::table('businesscontacts')->select('employees')->whereNull('deleted_at')->get();

        // foreach($employee_range as $key => $value){
        //    $empy = $value->employees;
        //    $empy_string = explode("-", $value->employees);
        //    echo '<pre>'; print_r($empy_string); echo '</pre>';
        // }
        // exit;

        return View('new.buildlist', [
            'frontpages' => $this->frontpages,
            'buildlist' => $buildlist,
            'currentid' => $this->user_id ? $this->user_id : '',
            'page' => 'buildlist',
            'business_contacts' => $contacts,
            'filter_indus' => $indus,
            'filter_contry' => $countries,
            'filter_state' => $stat,
            'filter_city' => $cities,
            'filter_data' => $save_filter_exp,
        ]);
    }

    /***BUILDLIST FILTERS FUNCTIONALITY***/
    public function filter(Request $request)
    {
        $fields = $request->data;
        $ranges = $request->range;
        $data = BusinessContact::where(function ($query) use ($fields) {
            foreach ($fields as $field => $value) {
                // print_r($field);
                //  print_r($value);
                if (is_array($value) && $field != 'industries') {
                    $query->whereIn($field, $value);
                    // foreach ($value as $valuee)
                    // {
                    //     // print_r($valuee);
                    //     // $query->where($field, 'like', '%' . $valuee . '%');
                    // }
                } elseif (is_array($value)) {
                    $query->where($field, 'like', '%' . $value[0] . '%');
                } else {

                    $query->where($field, 'like', '%' . $value . '%');
                }

                // $query->whereIn($field, $value);
            }
            // $query->where($field, 'like', '%' . $value . '%');

        })->get();
        $final_result = $data->toArray();
        //echo "<pre>";
        //print_r($final_result); exit();
        foreach ($fields as $field => $value) {
            if (is_array($value) && $field == 'industries') {
                array_shift($value);
                // print_r($value);
                $result =  array_values($value);
            }
        }
        if (isset($result) && !empty($result)) {
            foreach ($final_result as $key => $value) {
                foreach ($result as $ind) {
                    // echo '<pre>'; print_r($value['industries']);
                    // echo '<pre>'; print_r($ind);
                    if (strpos($value['industries'], $ind) !== false) {
                    } else {
                        unset($final_result[$key]);
                    }
                }
            }
        }

        if (!empty($ranges)) {
            foreach ($final_result as $key => $value) {
                // $empy = $value->employees;
                if (strpos($value['employees'], '>') !== false) {

                    $value['employees'] =  trim(str_replace(">", "", $value['employees']));
                }
                $empy_string = explode("-", $value['employees']);
                // print_r($empy_string);
                $count_number = array('1K' => '1000', '1M' => '1000000', '1B' => '1000000000');

                if (isset($empy_string[0]) && isset($empy_string[1]) && $ranges['first_range'] < $empy_string[0] && $ranges['first_range'] > $empy_string[1] && $ranges['second_range'] < $empy_string[0] && $ranges['second_range'] > $empy_string[1]) {
                    unset($final_result[$key]);
                }
                if ($ranges['first_range'] < $value['employees'] && $ranges['second_range'] < $value['employees']) {
                    unset($final_result[$key]);
                }
            }
            // print_r($final_result); exit;
        }
        $counts = count($final_result);
        $priceslack = DB::table('priceslakes')->get();
        foreach ($priceslack as $key => $priceslk) {
            $range = $priceslk->record_range;
            $exp_range = explode("-", $range);
            $price = $priceslk->price_range;
            $exp_price = explode("-", $price);

            if ($counts <= '250' && $key == '0') {
                $price_incr = $exp_price[0];
            } elseif ($counts >= $exp_range[0] && $counts <= $exp_range[1]) {
                $price_incr = $exp_price[1];
            }
        }
        // echo '<pre>'; print_r($counts); exit;
        // $finasls = array_merge($final_result,$counts);
        //echo "<pre>";
        // print_r($final_result); exit;
        return response()->json(array('result' => $final_result, 'count' => $counts, 'price' => $price_incr));
        die();
    }

    /***PAYMENT PAGE***/
    public function payment(Request $request)
    {

        print_r($request->all());
        die();
        $userid = Session::get('user_id');
        return View('new.payment', [
            'page' => 'payment',
            'currentid' => $this->user_id ? $this->user_id : '',
        ]);
    }


    /**** SUCCESS STRIPE PAYMENT ****/
    public function paymentsucess()
    {
        // print_r($_POST);
        $path = public_path();
        require $path . '/stripe/stripe/Stripe.php';

        $params = array(
            "testmode"   => "on",
            "private_live_key" => "sk_live_xxxxxxxxxxxxxxxxxxxxx",
            "public_live_key"  => "pk_live_xxxxxxxxxxxxxxxxxxxxx",
            "private_test_key" => "sk_test_vmutujB2TawIm6e4XbGEAmYA",
            "public_test_key"  => "pk_test_EWw2MqN4CzMSmQkEkXJsvjFX"
        );

        if ($params['testmode'] == "on") {
            \Stripe::setApiKey($params['private_test_key']);
            $pubkey = $params['public_test_key'];
        } else {
            \Stripe::setApiKey($params['private_live_key']);
            $pubkey = $params['public_live_key'];
        }

        if (isset($_POST['stripeToken'])) {
            $user_id = $_POST["userid"];
            $resultss = $_POST["results"];
            $serch_id = $_POST["sercid"];
            $amount = $_POST["amount"] * 100;
            $totalcontact = $_POST["totalcontact"];
            $amount_cents = str_replace(".", "", $amount);  // Chargeble amount
            $invoiceid = "14526321";                      // Invoice ID
            $description = "Invoice #" . $invoiceid . " - " . $invoiceid;


            try {

                $charge = \Stripe_Charge::create(
                    array(
                        "amount" => $amount_cents,
                        "currency" => "usd",
                        "source" => $_POST['stripeToken'],
                        "description" => $description,
                        "metadata" => array('userid' => $user_id, 'serchdataid' => $resultss, 'serchid' => $serch_id, 'totlcontact' => $totalcontact)
                    )
                );

                // if ($charge->card->address_zip_check == "fail") {
                //     throw new Exception("zip_check_invalid");
                // } else if ($charge->card->address_line1_check == "fail") {
                //     throw new Exception("address_check_invalid");
                // } else if ($charge->card->cvc_check == "fail") {
                //     throw new Exception("cvc_check_invalid");
                // }
                // Payment has succeeded, no exceptions were thrown or otherwise caught

                $result = "success";
            } catch (\Stripe_CardError $e) {

                $error = $e->getMessage();
                $result = "declined";
                // print_r($error);
            } catch (\Stripe_InvalidRequestError $e) {
                // print_r($e->getMessage());
                $result = "declined";
            } catch (\Stripe_AuthenticationError $e) {
                $result = "declined";
            } catch (\Stripe_ApiConnectionError $e) {
                $result = "declined";
            } catch (\Stripe_Error $e) {
                $result = "declined";
            } catch (Exception $e) {

                if ($e->getMessage() == "zip_check_invalid") {
                    $result = "declined";
                } else if ($e->getMessage() == "address_check_invalid") {
                    $result = "declined";
                } else if ($e->getMessage() == "cvc_check_invalid") {
                    $result = "declined";
                } else {
                    $result = "declined";
                }
            }

            echo "<BR>Stripe Payment Status : " . $result;

            if ($result == "success") {
                // echo '</pre>'; print_r($charge);
                $amount = $charge->amount / 100;
                $transaction_id = $charge->id;
                $userid = $charge['metadata']->userid;
                $serchdataid = $charge['metadata']->serchdataid;
                $totlcontact = $charge['metadata']->totlcontact;
                $serchid = $charge['metadata']->serchid;

                $insertdata = DB::table('payment')->insert(array('user_id' => $userid, 'transaction_id' => $transaction_id, 'data_ids' => $serchdataid, 'amount' => $amount, 'totalcontact' => $totlcontact, 'status' => 1));
                if ($insertdata == 1) {
                    echo  '<script>swal("Successfully Payment paid. Now go to your dashboard and downlaod list..")</script>';
                    return redirect("/downloadfile");
                }
            }
        }
    }

    /******DOWNLOAD SEARCH DATA********/
    // public function download_info(Request $request){

    //     $user_id = $request->userid;
    //     $searchdata = $request->result;
    //     $srch_id = $request->sercid?$request->sercid:'';
    //     if(empty($srch_id)){
    //         foreach ($searchdata as $key => $value) {
    //             $values[] = $value;
    //         }
    //         $results = implode(',', $values);
    //     }

    //     if($srch_id){
    //         $savedata = DB::table('savesearch')->where('id', $srch_id)->first();
    //         $userid = $savedata->userid;
    //         $data_id = $savedata->allsavedataid;
    //         $savedownload = DB::table('payment')->where('user_id', $userid)->update(array('data_ids' => $data_id));
    //         // echo '<pre>'; print_r($savedownload); exit;
    //     }else{
    //         $sdata = DB::table('payment')->get();

    //         foreach($sdata as $dat){

    //             $transaction_id = $dat->transaction_id;
    //             if(empty($transaction_id)) {
    //                 $savedownload = DB::table('payment')->where('user_id', $user_id)->update(array('data_ids' => $results));
    //             } else {
    //                 $savedownload = DB::table('payment')->insert(array('user_id' => $user_id, 'data_ids' => $results));
    //             }
    //         }

    //     }

    //     // echo '<pre>'; print_r($savedownload); exit;
    // }

    /****DASHBOARD SAVESEARCH PAGE***/
    public function savesearch(Request $request)
    {
        $userid = $_POST['userid'];
        $listname = $_POST['listname'];
        $listamnt = $_POST['listamnt'];
        $totlcontact = $_POST['totlcontact'];
        $filterrs = array();

        /**IMPLODE INFO IDS**/
        if (isset($_POST['result']) && !empty($_POST['result'])) {

            foreach ($_POST['result'] as $key => $value) {
                $values[] = $value;
            }
            $results = implode(',', $values);
        } else {
            $results = '';
        }
        // print_r($results);die('dd');
        if (isset($_POST['industries']) && !empty($_POST['industries'])) {
            $industries = $_POST['industries'];
        } else {
            $industries = array();
        }
        if (isset($company) && !empty($company)) {
            $company = $_POST['company'];
        } else {
            $company = array();
        }
        if (isset($_POST['state']) && !empty($_POST['state'])) {
            $state = $_POST['state'];
        } else {
            $state = array();
        }
        if (isset($_POST['city']) && !empty($_POST['city'])) {
            $city = $_POST['city'];
        } else {
            $city = array();
        }



        /**IMPLODE INDUSTRY FILTER**/
        if (!empty($industries)) {
            foreach ($industries as $key => $indus) {
                $valus[] = $indus;
            }
            array_push($filterrs, implode(',', $valus));
        }
        /**IMPLODE STATE FILTER**/
        if (!empty($state)) {
            foreach ($state as $key => $states) {
                $statee[] = $states;
            }
            array_push($filterrs, implode(',', $statee));
        }
        /**IMPLODE CITY FILTER**/
        if (!empty($city)) {
            foreach ($city as $key => $cty) {
                $cityre[] = $cty;
            }
            array_push($filterrs, implode(',', $cityre));
        }

        /**CONCATENATE ALL VARIABLE IN ONE**/
        // $filterrs = array($industriess, $company, $statesa, $cityy);
        foreach ($filterrs as $key => $values) {
            $ftt[] = $values;
        }
        $filt = implode(',', $ftt);
        $savedata = DB::table('savesearch')->insert(array('userid' => $userid, 'listname' => $listname, 'allsavedataid' => $results, 'filters' => $filt, 'totalamt' => $listamnt, 'totlacontact' => $totlcontact));
        //echo '<pre>'; print_r($savedata); exit;
        if ($savedata) {
            echo $userid;
            echo $listname;
            echo $results;
            echo $listamnt;
            echo $totlcontact;
        } else {
            echo 0;
        }
        die();
    }

    /**DASHBOARD SAVESEARCH PAGE RENAME FUNCTIONALITY**/
    public function renamelist(Request $request)
    {
        $rowid = $request->rowid;
        $renamelist = $request->renmlist;
        // $updatelist = $request->all();
        $updatelist = DB::table('save_result')->where('id', $rowid)->update(['listname' => $renamelist]);
        return redirect("/savedsearches");
    }

    /**DASHBOARD SAVESEARCH PAGE DELETE FUNCTIONALITY**/
    public function deletesearch($id)
    {

        $deletsearch = DB::table('savesearch')->delete($id);
        return redirect("/savedsearches");
    }

    public function get_cities(Request $request)
    {
        $stateid = $request->stateid;
        $data = DB::table('cities')->where('state_id', $request->stateid)->get();
        return response()->json($data);
        die();
    }

    /***READYMADE PAGE***/
    public function readymade()
    {
        $readymade = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'readymade') {
                $readymade = $this->frontpages[$pagekey];
            }
        }
        $imgid = $readymade->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $readymade->image = url('/') . '/storage/uploads/' . $bnr_img;
        $slake =  DB::table('priceslakes')->get();
        return View('template.readymade', [
            'frontpages' => $this->frontpages,
            'currentid' => $this->user_id,
            'readymade' => $readymade,
            'page' => 'readymade',
            'price_slakes' => $slake,
        ]);
    }

    /*HEALTHCARE PAGE*/
    public function healthprofessional()
    {
        $healthprofessional = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'healthprofessional') {
                $healthprofessional = $this->frontpages[$pagekey];
            }
        }
        $imgid = $healthprofessional->image;
        $banner_image = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $healthprofessional->image = url('/') . '/storage/uploads/' . $banner_image;
        $query = DB::table('healthprofessionals')->get();
        return View('new.healthcareprof', [
            'frontpages' => $this->frontpages,
            'healthprofessional' => $healthprofessional,
            'page' => 'healthprofessional',
            'currentid' => $this->user_id,
            'query' => $query,
        ]);
    }

    /*REALESTATE PAGE*/
    public function realestateagentdata()
    {
        $realestateagentdata = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'realestateagentdata') {
                $realestateagentdata = $this->frontpages[$pagekey];
            }
        }
        $imgid = $realestateagentdata->image;
        $banner_image = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $realestateagentdata->image = url('/') . '/storage/uploads/' . $banner_image;
        $estate_query = DB::table('realestateagentdatas')->get();
        return View('new.estatedata', [
            'frontpages' => $this->frontpages,
            'realestateagentdata' => $realestateagentdata,
            'page' => 'realestateagentdata',
            'currentid' => $this->user_id,
            'estate' => $estate_query
        ]);
    }

    /*LOGIN PAGE*/
    public function frontlogin($status = '')
    {
        Session::put('url.intended', URL::previous());

        if (isset($_GET['signup'])) {
            $signup = $_GET['signup'];
        } else {
            $signup = '';
        }
        return View('template.login', [
            'frontpages' => $this->frontpages,
            'page' => 'login',
            'currentid' => $this->user_id,
            'signup' => $signup ? $signup : '',
            'status' => $status
        ]);
    }

    public function userquery(Request $request)
    {
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        $data = array('email' => $email, 'subject' => $subject, 'messagetext' => $message);

        Mail::send(['html' => 'usersupport'], $data, function ($message) {
            $message->to('debashis.matainja@gmail.com', 'Tutorials Point')->subject('Support Mail');
            $message->from('debashis.matainja@gmail.com', 'debashis midya');
        });

        $response['success'] = 'success';
        $response['message'] = 'Thank you for contacting us we will get back to you soon';

        return $response;
    }


    public function contactUs(Request $request)
    {
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        $data = array('email' => $email, 'subject' => $subject, 'messagetext' => $message);

        Mail::send(['html' => 'usersupport'], $data, function ($message) {
            $message->to('debashis.matainja@gmail.com', 'Tutorials Point')->subject('Contact us');
            $message->from('debashis.matainja@gmail.com', 'debashis midya');
        });

        $response['success'] = 'success';
        $response['message'] = 'Thank you for contacting us we will get back to you soon';

        return $response;
    }

    public function newsletter(Request $request)
    {
        $email = $request->email;

        $emailexist = DB::table('newsletters')->where('email', $email)->first();

        if ($emailexist == '') {

            $membershipdata = DB::table('newsletters')->insert(array('email' => $email, 'created_at' => date('Y-m-d H:00:00'), 'updated_at' => date('Y-m-d H:00:00')));

            $response['success'] = 'success';
            $response['message'] = 'This email successfully added in our database';
        } else {

            $response['success'] = 'success';
            $response['message'] = 'This email already in our database';
        }


        return $response;
    }

    public function newsltremail(Request $request)
    {
        $email = $request->email;

        $emailexist = DB::table('subscribers')->where('email', $email)->first();

        if ($emailexist) {
            echo $email;
            return false;
        } else {
            echo 0;
        }
        die();
    }

    /*SIGNUP PAGE*/
    public function signup()
    {
        // $data = array('name'=>"debashis midya");

        //   Mail::send(['text'=>'mail'], $data, function($message) {
        //      $message->to('debashis.matainjha@gmail.com', 'Tutorials Point')->subject
        //         ('Laravel Basic Testing Mail');
        //      $message->from('debashis.matainjha@gmail.com','debashis midya');
        //   });
        //   echo "Basic Email Sent. Check your inbox.";



        $user_id = (Session::get('user_id') != '') ? Session::get('user_id') : '';
        if ($user_id == '') {
            include public_path('new-assets/code.php');
            $characters = json_decode($country);
            return View('template.registration', [
                'page' => 'signup',
                'currentid' => $this->user_id,
                'country_code' => $characters
            ]);
        } else {

            return redirect("/");
        }
    }

    /*SIGNUP FUNATIONALITY*/
    public function signupp(Request $request)
    {


        $cntry = $request->cntry;
        $email = $request->email;
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
                'verify' => "1",
                'credit' => "10"
            ]);
            $role = Role::where('name', 'USERS')->first();
            DB::table('users')->where('id', $user->id)->update(['cntry' => $cntry]);
            Mail::send('emails.send_login_cred', ['user' => $user], function ($m) use ($user) {
                $m->from('clientservices@zoomdata.io', 'Admin');
                $m->to('clientservices@zoomdata.io', $user->name)->subject('Global Leads - Verify Your email');
            });
            return redirect("/frontlogin?signup=1");
        }
    }
    public function registeruser(Request $request)
    {
        $email = $request->email;
        $name = $request->name;

        // Verify OTP code temprary comment

        // $emailexist = DB::table('users')->where('email', $email)->where('verify_otp',1)->where('verify',1)->first();
        // if($emailexist){
        //     return View('template.login', [
        //         'page' => 'login',
        //         'currentid' => '',
        //         'signup' => '',
        //         'status' =>'',
        //         'error_email_exist' => true,
        //     ]);
        // }
        if (preg_match("/\b(hotmail|gmail|yopmail|yahoo|aol|abc|xyz|rediffmail|live|outlook|me|msn|ymail)\b/i", $request->email)) {
            return View('template.login', [
                'page' => 'login',
                'currentid' => '',
                'signup' => '',
                'status' => '',
                'error_email_business' => true,
            ]);
        } else if (!preg_match('/[\@]/', $request->email)) {
            return View('template.login', [
                'page' => 'login',
                'currentid' => '',
                'signup' => '',
                'status' => '',
                'error_email_valid' => true,
            ]);
            //return redirect()->back()->with('mail_error','Please Enter a valid Email')->withInput();
        } else if (count(explode(' ', $name)) < 2) {
            return View('template.login', [
                'page' => 'login',
                'currentid' => '',
                'signup' => '',
                'status' => '',
                'error_fullname_both' => true,
            ]);
            //return redirect()->back()->with('fullname_error','Please Enter a fullname (firstname + lastname)')->withInput();
        } else if (strlen($request->password) < 8) {
            return View('template.login', [
                'page' => 'login',
                'currentid' => '',
                'signup' => '',
                'status' => '',
                'error_password_minimum' => true,
            ]);
        }
        // else if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $request->phone)) {
        //     return View('template.login', [
        //         'page' => 'login',
        //         'currentid' => '',
        //         'signup' => '',
        //         'status' =>'',
        //         'error_phone_number_valid' => true,
        //     ]);

        // }
        else {

            $firstname = explode(' ', $name)[0];
            $lastname = explode(' ', $name)[1];

            $userObj = new User();

            $user = $userObj->where('email', $request->email)->first();
            if (!$user) {
                $user = $userObj;
            }

            $user->name         = str_replace(' ', '', $request->name);
            $user->fname        = $firstname;
            $user->lname        = $lastname;
            $user->email        = $request->email;
            $user->phone        = $request->full_number;
            $user->password     = sha1($request->password);
            $user->type         = "User";
            $user->verify       = "0";
            $user->save();


            // $user = User::create([
            //     'name' => str_replace(' ', '', $request->name),
            //     'fname' => $firstname,
            //     'lname' => $lastname,
            //     'email' => $request->email,
            //     'phone' => $request->full_number,
            //     'password' => sha1($request->password),
            //     'type' => "User",
            //     'verify'=> "0"
            // ]);
            Session::put('register_user_id', $user->id);
            $role = Role::where('name', 'USERS')->first();
            // otp code
            $code = rand(100000, 999999);
            DB::table('users')->where('phone', $user->phone)->update(['verify_otp' => 0, 'otp' => $code]);
            Mail::send('emails.send_login_cred', ['user' => $user], function ($m) use ($user) {
                $m->from('clientservices@zoomdata.io', 'Admin');
                $m->to($user->email, $user->name)->subject('Global Leads - Verify Your email');
            });
            //  $this->sendMessage('User registration verification code - '.$code, $user->phone);
            // return redirect("/user_verify");
            return redirect("/frontlogin")->with('success', 'User registration successfully.');

            // return View('template.login', [
            //     'data' =>$user,
            // ]);
        }
    }
    public function verify_otp(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = DB::table('users')->where('email', $request->email)->first();
            if ($user->otp == $request->verify_otp) {
                $verifyed = DB::table('users')->where('id', $user->id)->update(['verify_otp' => 1, 'otp' => '']);
                return redirect('/frontlogin')->with('success', 'Your phone number verification successfully.');
            } else {
                return redirect('/frontlogin')->with('error', 'Invalid OTP, Please try again');
            }
        }
    }

    public function resend_otp(Request $request)
    {
        if ($request->isMethod('post')) {
            $code = rand(100000, 999999); //generate random code
            $user = DB::table('users')->where('phone', $request->mobile_number)->first();
            if ($user) {
                // return redirect()->back()->with('success', 'OTP send your phone number for verification.');
                $otp =  $this->sendMessage('User registration verification code - ' . $code, $request->mobile_number);
                $data = DB::table('users')->where('phone', $user->phone)->update(['verify_otp' => 0, 'otp' => $code]);
                // dd($otp->getStatusCode());
                if ($otp->getStatusCode() == 400) {
                    $otp_data = false;
                } else {

                    $otp_data = true;
                }
                return json_decode($otp_data);
            } else {
                return redirect('/frontlogin')->with('error', 'Invalid phone number, Please try again');
            }
            // $this->sendMessage($message, $request->phone_number);
        }
    }

    private function sendMessage($message, $recipients)
    {
        $account_sid = "ACa9c676e914bada3ce121d5f2de11df48";
        $auth_token = "31bb3fef67e32aa27e6c50212472f396";
        $twilio_number = "+16146655438";
        $client = new \Twilio\Rest\Client($account_sid, $auth_token);

        try {
            $client->messages->create($recipients, [
                'from' => $twilio_number,
                'body' => $message
            ]);
            return redirect('/frontlogin')->with('success', 'OTP send your phone number for verification.');
            // return $result;
        } catch (\Exception $e) {
            // dd($e);
            $error_msg = str_replace("[HTTP 400] ", "", $e->getMessage());
            // will return user to previous screen with twilio error
            // return redirect('/frontlogin')->with('error', $error_msg);
            // dd($error_msg);
            return $e;
        }
    }
    public function resend_email(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = DB::table('users')->where('email', $request->email)->first();
            $data = Mail::send('emails.send_login_cred', ['user' => $user], function ($m) use ($user) {
                $m->from('clientservices@zoomdata.io', 'Admin');
                $m->to($user->email, $user->name)->subject('Global Leads - Verify Your email');
            });
            return json_decode($data);
        } else {
            return redirect()->back()->with('email_error', 'Something went wrong, Please try again');
        }
    }

    public function user_verify(Request $request)
    {
        $userid = Session::get('register_user_id');
        $data = DB::table('users')->where('id', $userid)->first();
        return view('template.user_verify', compact('data'));
    }

    /*EMAIL VERIFICATION MAIL*/
    public function verify($id)
    {

        $verifyed = DB::table('users')->where('id', $id)->update(['verify' => 1]);
        $user = DB::table('users')->where('id', $id)->first();
        if ($verifyed == 1) {
            Mail::send('emails.welcome_msg', ['user' => $user], function ($m) use ($user) {
                $m->from('clientservices@zoomdata.io', 'Glob Leads');
                $m->to($user->email)->subject('Global Leads - Welcome to zoomdata.io');
            });
        }

        return redirect("/frontlogin?verify=" . $verifyed)->with('success', 'Your email verifed successfully.');
    }

    public function emailcheck(Request $request)
    {
        $email = $request->email;

        $emailexist = DB::table('users')->where('email', $email)->first();

        if ($emailexist) {
            echo $email;
        } else {
            echo 0;
        }
        die();
    }

    public function emailchecks(Request $request)
    {
        $email = $request->email;

        $emailexists = DB::table('users')->where('email', $email)->first();

        if ($emailexists) {
            echo $email;
        } else {
            echo 0;
        }
        die();
    }

    /*LOGIN FUNCTIONALITY*/
    public function dologin(Request $request)
    {
        // $userid = Session::get('register_user_id');
        // $data = DB::table('users')->where('id', $userid)->first();
        // return view('template.user_verify',compact('data'));

        $userid = Session::forget('user_id');
        $email = $request->email;
        $return_url = isset($request->return_url) ? $request->return_url : '';
        $password = sha1($request->password);
        $cart = array();
        $orderno = $this->random_strings(10);
        $users = DB::table('users')->where('email', $email)->where('password', $password)->where('verify', 1)->where('verified', 1)->where('active', 1)->first();
        $usersPassword = DB::table('users')->where('password', $password)->first();
        if (empty($usersPassword)) {
            return View('template.login', [
                'page' => 'login',
                'currentid' => '',
                'signup' => '',
                'status' => '',
                'error_password_incorrect' => true,
            ]);
        }
        $verifyEmail = DB::table('users')->where('email', $request->email)->where('verify', 1)->first();
        if (empty($verifyEmail)) {
            return View('template.login', [
                'page' => 'login',
                'currentid' => '',
                'signup' => '',
                'status' => '',
                'error_email_verify' => true,
            ]);
        }

        // verify otp code comment temporary

        // $verifyOTP = DB::table('users')->where('email',$request->email)->where('verify_otp', 1)->first();
        // if(empty($verifyOTP)){
        //     $data = DB::table('users')->where('email',$request->email)->first();
        //     // return view('template.login',compact('data'));
        //     return View('template.login', [
        //         'data' =>$data,
        //     ]);
        // }

        $usersEmail = DB::table('users')->where('email', $email)->first();
        if (empty($usersEmail)) {
            return View('template.login', [
                'page' => 'login',
                'currentid' => '',
                'signup' => '',
                'status' => '',
                'error_no_user' => true,
            ]);
        }
        if (empty($users)) {
            $users = DB::table('users')->where('email', $email)->where('password', $password)->where('active', 1)->first();
            // dd('d');
            if (empty($users)) {
                return View('template.login', [
                    'page' => 'login',
                    'currentid' => '',
                    'signup' => '',
                    'status' => '',
                    'error_email_verify' => true,
                ]);
            }
        }
        if (!empty($_COOKIE['products'])) {
            $cart = json_decode($_COOKIE['products'], true);
        }

        // print_r($users); exit;
        if (isset($users->id)) {
            Session::put('user_id', $users->id);
            Session::put('user_name', $users->name);

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

            $cookie = \Cookie::forget('products');
            // unset($_COOKIE['products']);
            return redirect("/tool/advanced-search");
        } else {

            return redirect("/tool/advanced-search");
            /*
        return View('template.login', [
            'page' => 'login',
            'currentid' => '',
            'signup' => '',
            'status' =>'',
            'error_password_incorrect' => true,
        ]);
        */
        }
    }
    public function updatenamephone(Request $request)
    {
        $userid = Session::get('user_id');
        $fname = $request->fname;
        $lstname = $request->lname;
        $phone = $request->phone;
        DB::table('users')->where('id', $userid)->update(['fname' => $fname, 'lname' => $lstname, 'phone' => $phone]);
        //return redirect("/profile?$userid");
        return back()->with('success', 'User update successfully.');
    }
    public function passwordupdate(Request $request)
    {
        $userid = Session::forget('user_id');
        $password = sha1($request->currentpass);
        $newpass = $request->newpass;
        $currentpass = $request->currentpass;
        $cart = array();
        $orderno = $this->random_strings(10);
        $users = DB::table('users')->where('id', $userid)->where('password', $password)->where('verify', 1)->get();
        if (empty($users)) {
            return response()->json(['string' => 'Password Incorrect']);
        }
        if ($newpass != $currentpass) {
            return response()->json(['string' => 'New password and Confirm password do not match']);
        }
        $passwordUpdate = DB::table('users')->where('id', $userid)->update(['password' => sha1($newpass)]);
        if ($passwordUpdate) {
            return response()->json(['string' => 'Password successfully updated']);
        } else {
            return response()->json(['string' => 'Error occured while updating the password']);
        }
    }

    function random_strings($length_of_string)
    {
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shufle the $str_result and returns substring
        // of specified length
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }


    function base64url_decode($data)
    {
        return base64_decode(strtr($data, '-_', '+/') . str_repeat('=', 3 - (3 + strlen($data)) % 4));
    }

    /*Logout*/
    public function logout(Request $request)
    {
        Session::forget('user_id');
        Session::flush();
        return redirect("/");
    }

    public function resetpassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $v = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);
            if ($v->fails()) {
                return redirect()->back()->withErrors($v->errors())->withinput();
            } else {
                $userDetails = DB::table('users')->where('email', '=', $request->email)->first();
                if (!empty($userDetails)) {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomStringfirst = '';
                    for ($i = 0; $i < 8; $i++) {
                        $randomStringfirst .= $characters[rand(0, $charactersLength - 1)];
                    }

                    $token = Str::random(60);
                    $passwordUpdate = DB::table('users')->where('email', '=', $request->email)->update(['reset_password_token' => $token]);
                    if ($passwordUpdate) {
                        $html = array('name' => $token);
                        // print_r($_POST) ;die('1107');
                        $mail = Mail::send('forgetpassordmail', $html, function ($message) {
                            $message->to($_POST['email'])->subject('Forget Password [beta globleads]');
                            $message->from('clientservices@zoomdata.io', 'beta globleads ');
                        });
                        if ($mail) {
                            Session::put('forgot_email', $_POST['email']);
                            return redirect('/resend_link');
                        }
                        // return redirect()->back()->with('success_msg','New Password Send your Email Please Check');
                    }
                } else {
                    return redirect()->back()->with('message', 'Email not found')->withinput();
                }
            }
        } else if ($request->isMethod('get')) {
            return response()->json(['404' => 'Accessed Denied']);
        }

        // $admin_email = $this->GetAdminEmail();
        //echo '<pre>'; print_r($admin_email); exit();
    }


    public function updtpassword()
    {
        return View('new.updatepassword', [
            'page' => 'updtpassword',
            'currentid' => $this->user_id,
        ]);
    }

    public function resend_link()
    {
        $email = Session::get('forgot_email');
        // dd($email);
        return View('template.resendmail', [
            'email' => $email,
        ]);
    }

    public function updatepassword(Request $request, $token)
    {
        if ($request->isMethod('post')) {
            $v = Validator::make($request->all(), [
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:new_password',
            ]);
            if ($v->fails()) {
                return redirect()->back()->withErrors($v->errors())->withinput();
            }
            $user = DB::table('users')->where('reset_password_token', $token)->first();
            if ($user) {
                $passwordUpdate = DB::table('users')->where('id', $user->id)->update(['password' => sha1($request->new_password)]);
                return redirect('/frontlogin')->with('success', 'New Password updated successfully.');
            } else {
                return redirect("/frontlogin")->with('error', 'Your token is expired, please try again');
            }
        }
        // dd($user);
        return View('new.setpassword', [
            'page' => 'updtpassword',
            'currentid' => $this->user_id,
            'token' => $token,
        ]);
    }

    public function domain()
    {
        if (isset($_POST['domain'])) {
            $domain = $_POST['domain'];
        } else {
            $domain = '';
        }
        $userid = Session::get('user_id');
        if (!isset($userid)) {
            return redirect('/home');
        }
        $userinfo = DB::table('users')->where('id', $userid)->first();
        $username = $userinfo->name;
        $contracts = DB::table('businesscontacts')->where('company_website', 'like', '%' . $domain . '%')->skip(0)->take(9)->get();
        foreach ($contracts as $key => $contact) {
            // Replace string in Email
            $email = $contact->email_address;
            $len = strlen($email);
            $str1 = '';
            for ($i = 0; $i < $len; $i++) {
                if ($i < 3 || $i > 10 && $i != ($len - 2)) {
                    $str1 .= '*';
                } else {
                    $str1 .= $email[$i];
                }
            }
            $contracts[$key]->email_address = $str1;

            $phone_number = $contact->phone_number;
            $len = strlen($phone_number);
            $str4 = '';
            for ($i = 0; $i < $len; $i++) {
                if ($i != ($len - 1)) {
                    $str4 .= '*';
                } else {
                    $str4 .= $phone_number[$i];
                }
            }
            $contracts[$key]->phone_number = $str4;


            $direct_phone = $contact->direct_phone;
            $len = strlen($direct_phone);
            $str4 = '';
            for ($i = 0; $i < $len; $i++) {
                if ($i != ($len - 1)) {
                    $str4 .= '*';
                } else {
                    $str4 .= $direct_phone[$i];
                }
            }
            $contracts[$key]->direct_phone = $str4;
        }
        return View('template.companysearch', [
            'contracts' => $contracts,
            'userinfo' => $userinfo,
            'username' => $username
        ]);
    }

    public function email()
    {
        if (isset($_POST['fullname']) && isset($_POST['domain'])) {
            $email = '@' . $_POST['domain'];
        } else {
            $email = '';
        }
        $name_array = explode(' ', $_POST['fullname']);
        $fname = $name_array[0];
        if (count($name_array) > 1) {
            $lname = $name_array[1];
        }
        $userid = Session::get('user_id');
        if (!isset($userid)) {
            return redirect('/home');
        }
        $userinfo = DB::table('users')->where('id', $userid)->first();
        $username = $userinfo->name;

        $contract = DB::table('businesscontacts')->where('first_name', $fname)->where('last_name', $lname)->where('email_address', 'like', '%' . $email . '%')->first();
        $credit = DB::table('users')->select('*')->whereNull('deleted_at')->where('id', $userid)->first()->credit;
        if ($credit === 0) {
            return View('template.emailsearch', [
                'credit' => 0,
                'userinfo' => $userinfo,
                'username' => $username

            ]);
        } else {
            DB::table('users')->whereNull('deleted_at')->where('id', $userid)->update(array('credit' => $credit - 1));
            return View('template.emailsearch', [
                'credit' => $credit -  1,
                'contract' => $contract,
                'userinfo' => $userinfo,
                'username' => $username
            ]);
        }
    }

    public function phone()
    {
        if (isset($_POST['fullname']) && isset($_POST['domain'])) {
            $email = '@' . $_POST['domain'];
        } else {
            $email = '';
        }
        $name_array = explode(' ', $_POST['fullname']);
        $fname = $name_array[0];
        if (count($name_array) > 1) {
            $lname = $name_array[1];
        }
        $userid = Session::get('user_id');
        if (!isset($userid)) {
            return redirect('/home');
        }
        $userinfo = DB::table('users')->where('id', $userid)->first();
        $username = $userinfo->name;

        $contract = DB::table('businesscontacts')->where('first_name', $fname)->where('last_name', $lname)->where('email_address', 'like', '%' . $email . '%')->first();
        $credit = DB::table('users')->select('*')->whereNull('deleted_at')->where('id', $userid)->first()->credit;
        if ($credit === 0) {
            return View('template.phonesearch', [
                'credit' => 0,
                'userinfo' => $userinfo,
                'username' => $username

            ]);
        } else {
            DB::table('users')->whereNull('deleted_at')->where('id', $userid)->update(array('credit' => $credit - 1));
            return View('template.phonesearch', [
                'credit' => $credit -  1,
                'contract' => $contract,
                'userinfo' => $userinfo,
                'username' => $username
            ]);
        }
    }

    public function dashboard()
    {
        if (isset($_GET['updateinfo'])) {
            $updateinfo = $_GET['updateinfo'];
        } else {
            $updateinfo = '';
        }
        $userid = Session::get('user_id');
        $dashborddb = DB::table('users')->where('id', $userid)->get();
        if (!isset($userid)) {
            return redirect("/home");
        }
        return View('dashboard', [
            'page' => 'dashboard',
            'update' => $updateinfo ? $updateinfo : '',
            'currentid' => $this->user_id,
            'dashbrd' => $dashborddb,
        ]);
    }
    public function dashboardpage()
    {
        if (isset($_GET['updateinfo'])) {
            $updateinfo = $_GET['updateinfo'];
        } else {
            $updateinfo = '';
        }
        $userid = Session::get('user_id');
        $dashborddb = DB::table('users')->where('id', $userid)->get();
        if (!isset($userid)) {
            return redirect("/home");
        }
        return View('template.dashboard', [
            'page' => 'dashboard',
            'update' => $updateinfo ? $updateinfo : '',
            'currentid' => $this->user_id,
            'username' => isset($this->user_name) ? $this->user_name : '',
            'dashbrd' => $dashborddb,
        ]);
    }
    public function profile()
    {
        if (isset($_GET['updateinfo'])) {
            $updateinfo = $_GET['updateinfo'];
        } else {
            $updateinfo = '';
        }
        $userid = Session::get('user_id');
        $dashborddb = DB::table('users')->where('id', $userid)->get();
        if (!isset($userid)) {
            return redirect("/home");
        }
        return View('template.profile', [
            'page' => 'profile',
            'update' => $updateinfo ? $updateinfo : '',
            'currentid' => $this->user_id,
            'username' => isset($this->user_name) ? $this->user_name : '',
            'dashbrd' => $dashborddb,
        ]);
    }
    /*** User Info Update From dashboard****/
    function updateinfo(Request $request)
    {

        $userid = Session::get('user_id');
        $fname = $request->fname;
        $lstname = $request->lname;
        $cpmyname = $request->cname;
        $phone = $request->phone;
        $email = $request->email;
        $cntry = $request->cntry;
        $newpassword = sha1($request->password);


        if ($request->password == '') {
            $this->validate($request, [

                'fname' => 'required|min:2|max:50',
                'lname' => 'required|min:2|max:50',
                'email' => 'required',
                'phone' => 'required',


            ], [

                'fname.required' => 'First name is required',
                'lname.required' => 'Last name is required',
                'email.required' => 'Email is required',
                'phone.required' => 'Phone number is required',
            ]);
        } else {

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
        }


        if ($request->password == '') {

            DB::table('users')->where('id', $userid)->update(['fname' => $fname, 'lname' => $lstname, 'cname' => $cpmyname, 'phone' => $phone, 'cntry' => $cntry, 'email' => $email]);
        } else {

            DB::table('users')->where('id', $userid)->update(['fname' => $fname, 'lname' => $lstname, 'cname' => $cpmyname, 'phone' => $phone, 'cntry' => $cntry, 'email' => $email, 'password' => $newpassword]);
        }




        //return redirect("/profile?$userid");
        return back()->with('success', 'User update successfully.');
    }

    public function savedsearches()
    {
        if (isset($_GET['updateinfo'])) {
            $updateinfo = $_GET['updateinfo'];
        } else {
            $updateinfo = '';
        }
        $userid = Session::get('user_id');
        $savesearch = DB::table('save_result')->where('userid', $userid)->get();
        if (!isset($userid)) {
            return redirect("/home");
        }

        if (!empty($savesearch)) {

            $search = $savesearch;
        } else {

            $search = '';
        }


        //dashboard.savedsearches
        return View('template.savedsearches', [
            'page' => 'savedsearches',
            'update' => $updateinfo ? $updateinfo : '',
            'currentid' => $this->user_id,
            'saved' => $search,
        ]);
    }
    public function downloads()
    {
        $contactlist = '';
        $userid = Session::get('user_id');
        $downloadseach = DB::table('paypal_payment_details')->where('user_id', $userid)->orderBy('id', 'DESC')->get();
        // print_r($downloadseach);die();
        $finalarr = array();
        if (!empty($downloadseach)) {
            $i = 0;
            foreach ($downloadseach as $key => $value) {
                // $data =['1998'];
                $saveids = json_decode($value->original_save_id);
                // print_r(json_decode($data));die('123');
                if (!empty($saveids)) {
                    foreach ($saveids as $k => $v) {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomStringfirst = '';
                        $randomStringlast = '';
                        for ($j = 0; $j < 8; $j++) {
                            $randomStringlast .= $characters[rand(0, $charactersLength - 1)];
                        }
                        for ($j = 0; $j < 4; $j++) {
                            $randomStringfirst .= $characters[rand(0, $charactersLength - 1)];
                        }
                        $totalcontactlist = DB::table('save_result')->where('id', $v)->first();
                        if (!empty($totalcontactlist)) {
                            // print_r($totalcontactlist->rangeofcontact);
                            $totaldata = $totalcontactlist->rangeofcontact;
                        }
                        //$save_id = $totalcontactlist->allsavedata;
                        //$save_id_exp = (explode(",",$save_id));
                        // $totaldata = count($save_id_exp);
                        // $totaldata = $totalcontactlist->rangeofcontact;
                        //$download_link =  url("downloadsfiles/".$randomStringfirst.base64_encode($value->original_save_id.$randomStringlast));
                        $finalarr[$i]['original_save_id'] = $v;
                        $finalarr[$i]['totalsavedata'] = $totaldata;
                        $finalarr[$i]['downloadlinkids'] = $randomStringfirst . base64_encode($v . $randomStringlast);
                        $finalarr[$i]['values'] = $value;
                        $i++;
                    }
                }
                // echo '<pre>'; print_r($dataids); echo '</pre>';
                //$contactlist = DB::table('businesscontacts')->whereIn('id', $dataids)->get();
                //echo '<pre>'; print_r($contactlist); echo '</pre>';

            } //die('1336');
        } //print_r($finalarr);
        // die('1274');


        if (!isset($userid)) {
            return redirect("/home");
        }
        return View('template.downloadfile', [
            'page' => 'downloadfile',
            // 'update' => $updateinfo ? $updateinfo : '',
            'currentid' => $this->user_id,
            'download' => $downloadseach,
            'contactlist' => $contactlist,
            'downloadseach' => $finalarr
        ]);
    }
    public function billing()
    {
        $contactlist = '';
        $userid = Session::get('user_id');
        $downloadseach = DB::table('paypal_payment_details')->where('user_id', $userid)->orderBy('id', 'DESC')->get();
        // print_r($downloadseach);die();
        // foreach ($downloadseach as $value) {
        //     $dataid = $value->data_ids;
        //     $dataids=explode(",",$dataid);
        //         // echo '<pre>'; print_r($dataids); echo '</pre>';
        //     $contactlist = DB::table('businesscontacts')->whereIn('id', $dataids)->get();
        //         //echo '<pre>'; print_r($contactlist); echo '</pre>';

        // }

        if (!isset($userid)) {
            return redirect("/home");
        }
        return View('template.biling', [
            'page' => 'downloadfile',
            // 'update' => $updateinfo ? $updateinfo : '',
            'currentid' => $this->user_id,
            'download' => $downloadseach,
            'contactlist' => $contactlist,
            'downloadseach' => $downloadseach
        ]);
    }

    public function support()
    {
        $userid = Session::get('user_id');
        if (!isset($userid)) {
            return redirect("/home");
        }
        return View('template.support', [
            'page' => 'support',
            'currentid' => $this->user_id,

        ]);
    }
    public function downloadfile()
    {
        $contactlist = '';
        $userid = Session::get('user_id');
        $downloadseach = DB::table('payment')->where('user_id', $userid)->orderBy('id', 'DESC')->get();
        foreach ($downloadseach as $value) {
            $dataid = $value->data_ids;
            $dataids = explode(",", $dataid);
            // echo '<pre>'; print_r($dataids); echo '</pre>';
            $contactlist = DB::table('businesscontacts')->whereIn('id', $dataids)->get();
            //echo '<pre>'; print_r($contactlist); echo '</pre>';

        }
        if (!isset($userid)) {
            return redirect("/home");
        }
        return View('dashboard.downloadfile', [
            'page' => 'downloadfile',
            // 'update' => $updateinfo ? $updateinfo : '',
            'currentid' => $this->user_id,
            'download' => $downloadseach,
            'contactlist' => $contactlist
        ]);
    }

    public function exportfile(Request $request)
    { //die('1226');
        $userid = Session::get('user_id');
        $ids = $_GET["id"];
        $dataid = explode(",", $ids);
        $contactlist = DB::table('businesscontacts')->whereIn('id', $dataid)->get();
        //echo '<pre>'; print_r($contactlist); exit;
        if ($contactlist > 0) {
            $delimiter = ",";
            $filename = "data_" . date('Y-m-d H:i:s') . ".csv";

            //create a file pointer
            $f = fopen('php://memory', 'w');

            //set column headers
            $fields = array('First name', 'Last name', 'Title', 'Email', 'Company Name', 'Website', 'Phone', 'City', 'State', 'Country', 'ZipCode', 'Industries', 'Employees', 'Revenue');
            //echo '<pre>'; print_r($fields); echo '</pre>';
            fputcsv($f, $fields, $delimiter);

            //output each row of the data, format line as csv and write to file pointer
            foreach ($contactlist as $row) {
                //$status = ($row['status'] == '1')?'Active':'Inactive';
                $lineData = array($row->first_name, $row->last_name, $row->job_title, $row->email_address, $row->company_name, $row->company_website, $row->phone_number, $row->city, $row->state, $row->country, $row->zipcode, $row->industries, $row->employees, $row->revenue);
                // echo '<pre>'; print_r($lineData); echo '</pre>';
                fputcsv($f, $lineData, $delimiter);
            }
            // exit;
            //move back to beginning of file
            fseek($f, 0);

            //set headers to download file rather than displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');

            //output all remaining data on a file pointer
            fpassthru($f);
        }
    }


    public function reset()
    {
        return View('template.resetpassword', [
            'page' => 'reset',
            'currentid' => $this->user_id,
        ]);
    }


    public function external()
    {
        $external = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'external') {
                $external = $this->frontpages[$pagekey];
            }
        }
        $imgid = $external->image;
        $banner_image = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $external->image = url('/') . '/storage/uploads/' . $banner_image;
        return View('new.external', [
            'frontpages' => $this->frontpages,
            'external' => $external,
            'currentid' => $this->user_id,
            'page' => 'external'
        ]);
    }

    public function leadership()
    {
        $leadership = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'leadership') {
                $leadership = $this->frontpages[$pagekey];
            }
        }
        $imgid = $leadership->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $leadership->image = url('/') . '/storage/uploads/' . $bnr_img;
        return View('new.newleadership', [
            'frontpages' => $this->frontpages,
            'leadership' => $leadership,
            'currentid' => $this->user_id,
            'page' => 'leadership'
        ]);
    }

    public function press()
    {
        $press = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'press') {
                $press = $this->frontpages[$pagekey];
            }
        }
        $imgid = $press->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $press->image = url('/') . '/storage/uploads/' . $bnr_img;
        return View('new.pressroom', [
            'frontpages' => $this->frontpages,
            'press' => $press,
            'currentid' => $this->user_id,
            'page' => 'press'
        ]);
    }

    public function gdrp()
    {
        $gdrp = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'gdrp') {
                $gdrp = $this->frontpages[$pagekey];
            }
        }
        $imgid = $gdrp->image;
        $banner_image = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $gdrp->image = url('/') . '/storage/uploads/' . $banner_image;
        return View('new.gdrpready', [
            'frontpages' => $this->frontpages,
            'gdrp' => $gdrp,
            'currentid' => $this->user_id,
            'page' => 'gdrp'
        ]);
    }

    public function guarantees()
    {
        // die();
        $guarantees = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'guarantees') {
                $guarantees = $this->frontpages[$pagekey];
            }
        }
        $imgid = $guarantees->image;
        $banner_image = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $guarantees->image = url('/') . '/storage/uploads/' . $banner_image;
        return View('new.guarantees', [
            'frontpages' => $this->frontpages,
            'guarantees' => $guarantees,
            'currentid' => $this->user_id,
            'page' => 'guarantees'
        ]);
    }

    public function monthlyplan()
    {
        $monthlyplan = array();

        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'monthlyplan') {
                $monthlyplan = $this->frontpages[$pagekey];
            }
        }

        $imgid = $monthlyplan->image;

        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;

        $monthlyplan->image = url('/') . '/storage/uploads/' . $bnr_img;

        $monthpln_table = DB::table('membershipplans')->get();

        return View('new.monthyplan', [
            'frontpages' => $this->frontpages,
            'monthlyplan' => $monthlyplan,
            'currentid' => $this->user_id ? $this->user_id : '',
            'page' => 'monthlyplan',
            'monthlyplandata' => $monthpln_table
        ]);
    }

    public function memberpayment(Request $request)
    {
        $memr_plan = $request->all();
        // echo '<pre>'; print_r($_POST); exit;
        $userid = Session::get('user_id');
        return View('new.membershipayment', [
            'page' => 'membershipayment',
            'currentid' => $this->user_id ? $this->user_id : '',
            'memberdetail' => $memr_plan
        ]);
    }

    public function membpaymsuccess(Request $request)
    {
        $path = public_path();
        require $path . '/stripe/stripe/Stripe.php';

        $params = array(
            "testmode"   => "on",
            "private_live_key" => "sk_live_xxxxxxxxxxxxxxxxxxxxx",
            "public_live_key"  => "pk_live_xxxxxxxxxxxxxxxxxxxxx",
            "private_test_key" => "sk_test_vmutujB2TawIm6e4XbGEAmYA",
            "public_test_key"  => "pk_test_EWw2MqN4CzMSmQkEkXJsvjFX"
        );

        if ($params['testmode'] == "on") {
            \Stripe::setApiKey($params['private_test_key']);
            $pubkey = $params['public_test_key'];
        } else {
            \Stripe::setApiKey($params['private_live_key']);
            $pubkey = $params['public_live_key'];
        }

        if (isset($_POST['stripeToken'])) {
            $user_id = $_POST["userid"];
            $plan_name = $_POST["planname"];
            $plan_points = $_POST["points"];
            $date = $_POST["date"];
            $amount = $_POST["amount"] * 100;
            $amount_cents = str_replace(".", "", $amount);  // Chargeble amount
            $invoiceid = "14526321";                      // Invoice ID
            $description = "Invoice #" . $invoiceid . " - " . $invoiceid;


            try {

                $charge = \Stripe_Charge::create(
                    array(
                        "amount" => $amount_cents,
                        "currency" => "usd",
                        "source" => $_POST['stripeToken'],
                        "description" => $description,
                        "metadata" => array('user_id' => $user_id, 'plan_name' => $plan_name, 'points' => $plan_points, 'plansubscribedate' => $date)
                    )
                );

                // if ($charge->card->address_zip_check == "fail") {
                //     throw new Exception("zip_check_invalid");
                // } else if ($charge->card->address_line1_check == "fail") {
                //     throw new Exception("address_check_invalid");
                // } else if ($charge->card->cvc_check == "fail") {
                //     throw new Exception("cvc_check_invalid");
                // }
                // Payment has succeeded, no exceptions were thrown or otherwise caught

                $result = "success";
            } catch (\Stripe_CardError $e) {

                $error = $e->getMessage();
                $result = "declined";
                // print_r($error);
            } catch (\Stripe_InvalidRequestError $e) {
                // print_r($e->getMessage());
                $result = "declined";
            } catch (\Stripe_AuthenticationError $e) {
                $result = "declined";
            } catch (\Stripe_ApiConnectionError $e) {
                $result = "declined";
            } catch (\Stripe_Error $e) {
                $result = "declined";
            } catch (Exception $e) {

                if ($e->getMessage() == "zip_check_invalid") {
                    $result = "declined";
                } else if ($e->getMessage() == "address_check_invalid") {
                    $result = "declined";
                } else if ($e->getMessage() == "cvc_check_invalid") {
                    $result = "declined";
                } else {
                    $result = "declined";
                }
            }

            echo "<BR>Stripe Payment Status : " . $result;
            // echo '<pre>'; print_r($charge); exit;
            if ($result == "success") {
                // echo '</pre>'; print_r($charge);
                $amount = $charge->amount / 100;
                $transaction_id = $charge->id;
                $userid = $charge['metadata']->user_id;
                $plan_name = $charge['metadata']->plan_name;
                $points = $charge['metadata']->points;
                $plansubscribedate = $charge['metadata']->plansubscribedate;

                $membershipdata = DB::table('membership_payment')->insert(array('user_id' => $userid, 'transaction_id' => $transaction_id, 'plan_name' => $plan_name, 'amount' => $amount, 'points' => $points, 'status' => '1', 'plansubscribedate' => $plansubscribedate));
                if ($membershipdata == 1) {
                    echo  '<script>alert("Successfully Payment paid")</script>';
                    // swal("Good job!", "You clicked the button!", "success");
                    // return redirect("/downloadfile");

                }
            }
        }
    }

    public function joblevel()
    {
        $joblevel = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'joblevel') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }
        $imgid = $joblevel->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $joblevel->image = url('/') . '/storage/uploads/' . $bnr_img;
        $query =  DB::table('joblevels')->get();
        return View('new.joblevels', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'joblevel',
            'currentid' => $this->user_id,
            'query' => $query,
        ]);
    }

    public function jobtitle()
    {
        $jobtitle = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'jobtitle') {
                $jobtitle = $this->frontpages[$pagekey];
            }
        }
        $imgid = $jobtitle->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $jobtitle->image = url('/') . '/storage/uploads/' . $bnr_img;
        $query = DB::table('jobtitles')->get();
        return View('template.jobtitle', [
            'frontpages' => $this->frontpages,
            'jobtitle' => $jobtitle,
            'page' => 'jobtitle',
            'currentid' => $this->user_id,
            'query' => $query,
        ]);
    }

    public function industrie()
    {
        $industrie = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'industrie') {
                $industrie = $this->frontpages[$pagekey];
            }
        }
        $imgid = $industrie->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $industrie->image = url('/') . '/storage/uploads/' . $bnr_img;
        $industry = DB::table('industries')->get();
        return View('new.industries', [
            'frontpages' => $this->frontpages,
            'industrie' => $industrie,
            'currentid' => $this->user_id,
            'page' => 'industrie',
            'industry' => $industry,
        ]);
    }


    public function country()
    {
        $country = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'country') {
                $country = $this->frontpages[$pagekey];
            }
        }
        $imgid = $country->image;
        $banner_image = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $country->image = url('/') . '/storage/uploads/' . $banner_image;
        return View('new.country', [
            'frontpages' => $this->frontpages,
            'country' => $country,
            'currentid' => $this->user_id,
            'page' => 'country',
        ]);
    }

    public function termsofuse()
    {
        $termsofuse = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'termsofuse') {
                $termsofuse = $this->frontpages[$pagekey];
            }
        }
        $imgid = $termsofuse->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $termsofuse->image = url('/') . '/storage/uploads/' . $bnr_img;
        return View('template.termsofuse', [
            'frontpages' => $this->frontpages,
            'termsofuse' => $termsofuse,
            'currentid' => $this->user_id,
            'page' => 'termsofuse'
        ]);
    }

    public function privacypolicy()
    {
        $privacypolicy = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'privacypolicy') {
                $privacypolicy = $this->frontpages[$pagekey];
            }
        }
        $imgid = $privacypolicy->image;
        $banner_image = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $privacypolicy->image = url('/') . '/storage/uploads/' . $banner_image;
        return View('template.privacypolicy', [
            'frontpages' => $this->frontpages,
            'privacypolicy' => $privacypolicy,
            'currentid' => $this->user_id,
            'page' => 'privacypolicy'
        ]);
    }

    public function legalnotice()
    {
        $legalnotice = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'legalnotice') {
                $legalnotice = $this->frontpages[$pagekey];
            }
        }
        $imgid = $legalnotice->image;
        $banr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $legalnotice->image = url('/') . '/storage/uploads' . $banr_img;
        return View('new.legalnotice', [
            'frontpages' => $this->frontpages,
            'legalnotice' => $legalnotice,
            'currentid' => $this->user_id,
            'page' => 'legalnotice'
        ]);
    }

    public function onlinelistbuild()
    {
        $onlinelistbuild = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'onlinelistbuild') {
                $onlinelistbuild = $this->frontpages[$pagekey];
            }
        }
        $imgaeid = $onlinelistbuild->image;
        $dashimage = DB::table('uploads')->where('id', $imgaeid)->get()[0]->name;
        $onlinelistbuild->image = url('/') . '/storage/uploads/' . $dashimage;
        return View('new.onlinelistbuild', [
            'frontpages' => $this->frontpages,
            'onlinelistbuild' => $onlinelistbuild,
            'currentid' => $this->user_id,
            'page' => 'onlinelistbuild'
        ]);
    }
    public function request_sample()
    {
        $onlinelistbuild = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'request__a_sample') {
                $onlinelistbuild = $this->frontpages[$pagekey];
            }
        }
        // print_r($onlinelistbuild);die('1871');
        $imgaeid = $onlinelistbuild->image;
        $dashimage = DB::table('uploads')->where('id', $imgaeid)->get()[0]->name;
        $onlinelistbuild->image = url('/') . '/storage/uploads/' . $dashimage;
        return View('template.requsetsample', [
            'frontpages' => $this->frontpages,
            'onlinelistbuild' => $onlinelistbuild,
            'currentid' => $this->user_id,
            'page' => 'onlinelistbuild'
        ]);
    }
    public function faq()
    {
        return View('template.faq', [
            'currentid' => $this->user_id,
            'page' => 'faq'
        ]);
    }
    public function downloadebook()
    {
        $download_ebook = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'download_ebook') {
                $download_ebook = $this->frontpages[$pagekey];
            }
        }
        // print_r($onlinelistbuild);die('1871');
        $imgaeid = $download_ebook->image;
        $dashimage = DB::table('uploads')->where('id', $imgaeid)->get()[0]->name;
        $download_ebook->image = url('/') . '/storage/uploads/' . $dashimage;
        return View('template.downloadebbok', [
            'frontpages' => $this->frontpages,
            'onlinelistbuild' => $download_ebook,
            'currentid' => $this->user_id,
            'page' => 'onlinelistbuild'
        ]);
    }
    public function sitemap()
    {
        return View('template.sitemaps', [
            'currentid' => $this->user_id,
            'page' => 'sitemap'
        ]);
    }
    public function howtobuildanlist()
    {
        return View('template.howtobulidlist', [
            'currentid' => $this->user_id,
            'page' => 'How-to-bulid-a-list'
        ]);
    }
}
