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
// use Session;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Role;
use App\User;
// use Mail;
use Illuminate\Support\Facades\Mail;
use App\Models\BusinessContact;
use Illuminate\Support\Facades\Input;
use Excel;



/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class BuildlistController extends Controller
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
        //print_r($userid);die;
        $username = Session::get('user_name');
        $this->frontpages = DB::table('frontpages')->whereNull('deleted_at')->get();
        // $if_exist =1;
        if (!isset($userid)) {
            //return redirect("/home");
        } else {
            $this->user_id = $userid;
            $this->user_name = $username;
        }

        //echo '<pre>'; print_r($this->frontpages); echo '</pre>';
    }
    /***BUILDLIST PAGE AND ALSO PAGE FUNCTIONALITY***/
    public function index($name = NULL, $searchkey = NULL)
    { //die('52');

        $filtertypee = '';
        $url_save_exist_id = 'United States';
        $searchid = '';
        $where = 'active = 1 and';
        $sql_key = '';
        $total_contacts = '';
        $save_filter_exp = '';
        $url_save_exist_values = '';
        $userid = Session::get('user_id');
        $pageName = '';
        $healthprofessional = '';
        $savesearchid = '';
        $healthprofessionals = array();
        $jobfunctionparentid = '';
        $p_name = '';
        $contacts = '';
        $State_Search__real_Data = array();
        $EmpMintrange = '';
        $Emptextspan = '';
        $RevrMinrange = '';
        $RevrMaxrange = '';
        $readymadelisids = '';

        if ($searchkey != NULL) {
            $serchvalue = $searchkey;
            $searchkey             =  substr($searchkey, 10);
            $encryptedata      =  base64_decode($searchkey);
            $url_save_exist_values =  substr($encryptedata, 0, -8);
            $url_save_exist_values = explode("=", $url_save_exist_values);
            $filtertypee  = $url_save_exist_values[0];
            $url_save_exist_id = $url_save_exist_values[1];
            // echo $filtertypee;die('78');
            if (!base64_decode($url_save_exist_id, true)) { //die('78');
                // is valid
            } else { //die('80');
                // not valid
            }
        }
        //print_r($url_save_exist_values);die;
        /****SAVED SEARCH DATA****/
        if (isset($_GET['searchid'])) {
            $searchid = $_GET['searchid'];
        }
        if (isset($filtertypee) && $filtertypee != 'id') {
            $searchByJob = $url_save_exist_id;
            if ($filtertypee == 'inter') {
                $contacts =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', $searchByJob)->where('active', 1)->get();
                if (!empty($contacts)) {
                    $total_contacts = count($contacts);
                    $totlacontact = count($contacts);
                    $range_of_contact = $total_contacts;
                    $totalencryptdata = $this->getPrice($total_contacts);
                    // print_r($totalencryptdata);die('124');
                    $price = $totalencryptdata['price'];
                } else {
                    $nodatafound = 'nodatafound';
                }

                $dataId = 'Country';
            }
            if ($filtertypee == 'state') {
                $StateSeacrhData   = explode("&", $searchByJob);
                $SeacrhstateCountryName = $StateSeacrhData[1];
                $SeacrhstateStateName   = $StateSeacrhData[0];
                $State_Search__real_Data = array('country' => $SeacrhstateCountryName, 'state' => $SeacrhstateStateName);
                $SeachByjoblevel  = DB::table('ready_made_store')->select(DB::raw('*'))->where('listname', $SeacrhstateStateName)->first();
                if (!empty($SeachByjoblevel->allsavedata)) {
                    $contacts = DB::table('businesscontacts')->select(DB::raw('*'))->where('active', 1)->where('country', 'United States')->whereNull('deleted_at')->whereIn('id', json_decode($SeachByjoblevel->allsavedata))->get();
                    if (!empty($contacts)) {
                        $total_contacts = $SeachByjoblevel->totlacontact;
                        $totlacontact = $SeachByjoblevel->totlacontact;
                        $range_of_contact = $total_contacts;
                        $totalencryptdata = $this->getPrice($total_contacts);
                        $price = $totalencryptdata['price'];
                    }
                } else {
                    $nodatafound = 'nodatafound';
                }
            }
            if ($filtertypee == 'job_level') { //die('144');
                //die('87');
                $dataId = 'joblevels';
                $SeachByjoblevel  = DB::table('ready_made_store')->select(DB::raw('*'))->where('listname', $searchByJob)->first();
                //print_r($SeachByjoblevel);die('148');
                if (!empty($SeachByjoblevel->allsavedata)) {
                    $contacts = DB::table('businesscontacts')->select(DB::raw('*'))->where('active', 1)->where('country', 'United States')->whereNull('deleted_at')->whereIn('id', json_decode($SeachByjoblevel->allsavedata))->get();
                    if (!empty($contacts)) {
                        $total_contacts = $SeachByjoblevel->totlacontact;
                        $totlacontact = $SeachByjoblevel->totlacontact;
                        $range_of_contact = $total_contacts;
                        if ($total_contacts != '') {
                            $totalencryptdata = $this->getPrice($total_contacts);
                            $price = $totalencryptdata['price'];
                        }
                    }
                } else {
                    $nodatafound = 'nodatafound';
                }
            }
            if ($filtertypee == 'job_function') {
                $keyword = explode(" ", $searchByJob);
                if (count($keyword) == 2) {
                    $p_name =  DB::table('jobtitles')->where('name', $keyword[0])->where('name', $keyword[1])->first();
                    if (isset($p_name) && !empty($p_name)) {
                        $jobfunctionparentid = $p_name->name;
                        // strtoupper($input_str);
                    }
                    $dataId = 'Jobfunctions'; // ''
                } else {
                    die('Incorrect Job title seleted');
                }
            }
            if ($filtertypee == 'industries') { //die('184');
                // echo $searchByJob;die('183');
                $SeachByjoblevel  = DB::table('ready_made_store')->select(DB::raw('*'))->where('listname', $searchByJob)->first();
                if (!empty($SeachByjoblevel->allsavedata)) {
                    $contacts = DB::table('businesscontacts')->select(DB::raw('*'))->where('active', 1)->where('country', 'United States')->whereNull('deleted_at')->whereIn('id', json_decode($SeachByjoblevel->allsavedata))->get();
                    if (!empty($contacts)) {
                        $total_contacts = $SeachByjoblevel->totlacontact;
                        $totlacontact = $SeachByjoblevel->totlacontact;
                        $range_of_contact = $total_contacts;
                        if ($total_contacts != '') {
                            $totalencryptdata = $this->getPrice($total_contacts);
                            $price = $totalencryptdata['price'];
                        }
                    }
                } else {
                    $nodatafound = 'nodatafound';
                }
                $dataId = 'industry'; //
            }
            if ($filtertypee == 'speciality') { //die('194');
                $SeachByjoblevel  = DB::table('ready_made_store')->select(DB::raw('*'))->where('listname', $searchByJob)->first();
                // print_r($SeachByjoblevel);die('197');
                if (!empty($SeachByjoblevel->allsavedata)) {
                    $contacts = DB::table('businesscontacts')->select(DB::raw('*'))->where('active', 1)->where('country', 'United States')->whereNull('deleted_at')->whereIn('id', json_decode($SeachByjoblevel->allsavedata))->get();
                    if (!empty($contacts)) {
                        $total_contacts = $SeachByjoblevel->totlacontact;
                        $totlacontact = $SeachByjoblevel->totlacontact;
                        $range_of_contact = $total_contacts;
                        if ($total_contacts != '') {
                            $totalencryptdata = $this->getPrice($total_contacts);
                            $price = $totalencryptdata['price'];
                        }
                    }
                } else {
                    $nodatafound = 'nodatafound';
                }

                $dataId = 'Speciality'; // ''
            }
            if ($filtertypee == 'real_state') {
                // echo $searchByJob;die('217');
                $SeachByjoblevel  = DB::table('ready_made_store')->select(DB::raw('*'))->where('listname', $searchByJob)->first();
                if ($searchByJob == 'real-estate') {
                    $real_estateCountryName = 'United States';
                    $State_Search__real_Data = array('country' => 'United States', 'Contact' => array('Real Estate Agent', 'Real Estate Broker'));
                } elseif ($searchByJob == 'real-estate-1') {
                    $State_Search__real_Data = array('country' => 'Canada', 'Contact' => array('Real Estate Agent', 'Real Estate Broker'));
                } else {
                    // $getDetailsRealState  =  DB::table('states')->whereNull('deleted_at')->where('name', $searchByJob)->first();
                    //here putcountry name
                    //$SeachByjoblevel  = DB::table('ready_made_store')->select(DB::raw('*'))->where('listname',$searchByJob)->first();
                    $State_Search__real_Data = array('country' => 'Canada', 'state' => $searchByJob);
                }
                if (!empty($SeachByjoblevel->allsavedata)) {
                    $contacts = DB::table('businesscontacts')->select(DB::raw('*'))->where('active', 1)->where('country', 'United States')->whereNull('deleted_at')->whereIn('id', json_decode($SeachByjoblevel->allsavedata))->get();
                    // print_r($contacts);die('236');
                    if (!empty($contacts)) {
                        $total_contacts = $SeachByjoblevel->totlacontact;
                        $totlacontact = $SeachByjoblevel->totlacontact;
                        $range_of_contact = $total_contacts;
                        if ($total_contacts != '') {
                            $totalencryptdata = $this->getPrice($total_contacts);
                            $price = $totalencryptdata['price'];
                        }
                    }
                } else {
                    $nodatafound = 'nodatafound';
                }
            }
            $sql_key = $filtertypee;
        }
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
            $contacts =  DB::table('businesscontacts')->where('active', 1)->whereIn('id', $save_id_exp)->get();
        } else {
            if ($filtertypee != '') {
                if ($filtertypee == 'id') { //die('113');
                    $savesearchid = $url_save_exist_id;
                    $serchinfo = DB::table('save_result')->where('id', $url_save_exist_id)->first();
                    // print_r($serchinfo);die('115');
                    if (!empty($serchinfo)) {
                        $save_id = json_decode($serchinfo->allsavedata);
                        $save_id_Counts = $save_id ? count($save_id) : 0; //echo $save_id_Counts;die('347');
                        if ($save_id_Counts > 20) {
                            $save_id = array_slice($save_id, 0, 20);
                        } //print_r($save_id);die('350');
                        $save_filter = $serchinfo->filters; //filtersexclude
                        $save_countryfilter = $serchinfo->countryfilters;
                        $save_filter_exp = json_decode($save_filter, true);
                        if ($save_countryfilter == "") {
                            $save_countryfilter = '{"country":["United States"]}';
                        }
                        $save_filter_exp = array_merge($save_filter_exp, json_decode($save_countryfilter, true));
                        if (!empty($save_filter_exp['Employee_ranges']) && !empty($save_filter_exp['Employee'])) {
                            $Employeerang =  $save_filter_exp['Employee'][0];
                            $Emprnage = explode("-", $Employeerang);
                            $EmpMintrange = $Emprnage[0];
                            if ($Emprnage[1] < 1000000000) {
                                $EmpMaxtrange = $Emprnage[1];
                            }
                            unset($save_filter_exp['Employee']);
                            $save_filter_exp['Employee'] = $save_filter_exp['Employee_ranges'];
                            $Emptextspan = $save_filter_exp['Employee_ranges'][0];
                            // print_r($Emptextspan);die();
                            unset($save_filter_exp['Employee_ranges']);
                        }
                        if (!empty($save_filter_exp['Revenue_range']) && !empty($save_filter_exp['Revenue'])) {
                            $Revenuerang =  $save_filter_exp['Revenue'][0];
                            $Revrnage = explode("-", $Revenuerang);
                            $RevrMinrange = $Revrnage[0];
                            if ($Revrnage[1] < 1000000000) {
                                $RevrMaxrange = $Revrnage[1];
                            }
                            unset($save_filter_exp['Revenue']);
                            $save_filter_exp['Revenue'] = $save_filter_exp['Revenue_range'];
                            $Rangetextspan = $save_filter_exp['Revenue_range'][0];
                            unset($save_filter_exp['Revenue_range']);
                        }
                        if (!empty($save_filter_exp['types'])) {
                            unset($save_filter_exp['types']);
                        }
                        // print_r($save_filter_exp);die('354');
                        $filtersecxclude = json_decode($save_filter, true);
                        $price = $serchinfo->totalamt;
                        $totlacontact = $serchinfo->totlacontact;
                        $range_of_contact = $serchinfo->rangeofcontact;
                        $total_contacts = $serchinfo->rangeofcontact;
                        $rangeofstyle = $serchinfo->rangeofstyle;
                        $countryfilters = $serchinfo->countryfilters;
                        if (!empty($countryfilters)) {
                            $countryfilters = json_decode($countryfilters, true);
                        }
                        $excludefilters = $serchinfo->filtersexclude;
                        if (!empty($excludefilters)) {
                            $excludefilters = json_decode($excludefilters, true);
                        }
                        // print_r($excludefilters);die('265');

                    }
                    $contacts =  DB::table('businesscontacts')->where('active', 1)->whereIn('id', $save_id)->get();
                    // print_r($contacts);die('398');

                    if (!empty($contacts)) {
                        $total_contacts = count($contacts);
                        //$totlacontact=count($contacts);
                        $totlacontact = $serchinfo->totlacontact;
                    } else {
                        $nodatafound = 'nodatafound';
                    }
                    $totalcontactforbuy =   !empty($serchinfo->rangeofcontact) ? $serchinfo->rangeofcontact : '';
                    $totalencryptdata = $this->getPrice($totalcontactforbuy);
                    // print_r($totalencryptdata);die('161');
                    //$countencrypt =  !empty($serchinfo->rangeofcontact)?$serchinfo->rangeofcontact:'';
                    $price  = !empty($totalencryptdata['price']) ? $totalencryptdata['price'] : '';
                } else {
                    if (!empty($SeachByjoblevel)) {
                        $readymadelisids = $SeachByjoblevel->id;
                    }

                    if ($filtertypee == 'job_function') {
                        $contacts = DB::table('businesscontacts')->select(DB::raw('*'))->where('active', 1)->where('country', 'United States')->where($sql_key, 'like', '%' . $searchByJob . '%')->get();
                        if (!empty($contacts)) {
                            $total_contacts = count($contacts);
                            $totlacontact = count($contacts);
                            $range_of_contact = $total_contacts;
                        } else {
                            $nodatafound = 'nodatafound';
                        }
                        // print_r($total_contacts);die;
                        if ($total_contacts > 0) {
                            $totalencryptdata = $this->getPrice($total_contacts);
                            $price = $totalencryptdata['price'];
                        }
                    }
                }
            } else {
                if ($name == 'my-leads') {
                    $types = 'myleads';
                    $userid = Session::get('user_id');
                    if (!isset($userid)) {
                        return View('template.login', [
                            'page' => 'login',
                            'currentid' => '',
                            'signup' => '',
                            'status' => ''
                        ]);
                    }
                } elseif ($name == 'business') {
                    $userid = Session::get('user_id');
                    if (!isset($userid)) {
                        return View('template.login', [
                            'page' => 'login',
                            'currentid' => '',
                            'signup' => '',
                            'status' => ''
                        ]);
                    }
                    $types = 'businesscontact';
                } else if ($name == 'real_estate') {
                    $types = 'realestate';
                } elseif ($name == 'advanced-search') {
                    $userid = Session::get('user_id');
                    if (!isset($userid)) {

                        return View('template.login', [
                            'page' => 'login',
                            'currentid' => '',
                            'signup' => '',
                            'status' => ''
                        ]);
                    }
                    $types = 'businesscontact';
                } elseif ($name == 'dashboard') {
                    $userid = Session::get('user_id');
                    if (!isset($userid)) {
                        return View('template.login', [
                            'page' => 'login',
                            'currentid' => '',
                            'signup' => '',
                            'status' => ''
                        ]);
                    }
                    $types = 'businesscontact';
                } elseif ($name == 'upgrade-plan') {
                    $userid = Session::get('user_id');
                    if (!isset($userid)) {
                        return View('template.login', [
                            'page' => 'login',
                            'currentid' => '',
                            'signup' => '',
                            'status' => ''
                        ]);
                    }
                    $types = 'businesscontact';
                } elseif ($name == 'account') {
                    $userid = Session::get('user_id');
                    if (!isset($userid)) {
                        return View('template.login', [
                            'page' => 'login',
                            'currentid' => '',
                            'signup' => '',
                            'status' => ''
                        ]);
                    }
                    $types = 'businesscontact';
                } elseif ($name == 'account-billing') {
                    $userid = Session::get('user_id');
                    if (!isset($userid)) {
                        return View('template.login', [
                            'page' => 'login',
                            'currentid' => '',
                            'signup' => '',
                            'status' => ''
                        ]);
                    }
                    $types = 'businesscontact';
                } elseif ($name == 'checkout') {
                    $userid = Session::get('user_id');
                    if (!isset($userid)) {
                        return View('template.login', [
                            'page' => 'login',
                            'currentid' => '',
                            'signup' => '',
                            'status' => ''
                        ]);
                    }
                } elseif ($name == 'company-search') {
                    $userid = Session::get('user_id');
                    if (!isset($userid)) {
                        return View('template.login', [
                            'page' => 'login',
                            'currentid' => '',
                            'signup' => '',
                            'status' => ''
                        ]);
                    }
                } elseif ($name == 'email-search') {
                    $userid = Session::get('user_id');
                    if (!isset($userid)) {
                        return View('template.login', [
                            'page' => 'login',
                            'currentid' => '',
                            'signup' => '',
                            'status' => ''
                        ]);
                    }
                } elseif ($name == 'phone-search') {
                    $userid = Session::get('user_id');
                    if (!isset($userid)) {
                        return View('template.login', [
                            'page' => 'login',
                            'currentid' => '',
                            'signup' => '',
                            'status' => ''
                        ]);
                    }
                }

                $where = 'country ="United States" and active = 1  ORDER BY (job_title LIKE ' . "'%Chief%'" . ') DESC limit 0,20';
                // $contacts =  DB::table('businesscontacts')->where('country', 'United States')->take(20)->get();
                $contacts = DB::select('select * from businesscontacts where ' . $where);
                //
            }
        }


        if (isset($contacts) && !empty($contacts)) {
            $count_contacts = count($contacts);
            $contacts = array_slice($contacts, 0, 20);
            foreach ($contacts as $key => $contact) {
                // Replace string in Email
                $email = $contact->email_address;
                $len = strlen($email);
                $str1 = '';
                for ($i = 0; $i < $len; $i++) {
                    if ($email[$i] == '@') {
                        break;
                    }
                    if ($i < 3 || $i > 10 && $i != ($len - 2)) {
                        $str1 .= '*';
                    } else {
                        $str1 .= $email[$i];
                    }
                }
                for ($j = $i; $j < $len; $j++) {
                    $str1 .= $email[$j];
                }
                $contacts[$key]->email_address = $str1;

                // Replace string in Company Name
                $phone_number = $contact->phone_number;
                $phone_number = substr_replace($phone_number, "***", 2, 3);
                $phone_number = substr_replace($phone_number, "***", 10, 4);
                $contacts[$key]->phone_number = $phone_number;

                $direct_phone = $contact->direct_phone;
                $direct_phone = substr_replace($direct_phone, "***", 2, 3);
                $direct_phone = substr_replace($direct_phone, "***", 10, 4);
                $contacts[$key]->direct_phone = $direct_phone;
            }
        }  //print_r($contacts);die('449');
        $newarr = array();

        $query =  DB::table('industries')->whereNull('deleted_at')->get();
        $indus = array();
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                array_push($indus, $value->name);
            }
        }


        $job_le = array();
        $job_levs = DB::table('joblevels')->where('parent_id', 0)->whereNull('deleted_at')->get();

        $joblevel_array = array();
        if (isset($job_levs) && !empty($job_levs)) {
            foreach ($job_levs as $job) {
                $p_name = DB::table('joblevels')->where('parent_id', $job->id)->whereNull('deleted_at')->get();
                $joblevel_array[$job->name][] = $job->name;
                if (!empty($p_name)) {
                    foreach ($p_name as $p_names) {
                        if (!empty($p_names->name)) {
                            $joblevel_array[$job->name][] =  $p_names->name;
                        }
                    }
                }
            }
        }

        //print_r($joblevel_array);die('302');
        $job_fun = array();
        $job_funs = DB::table('jobtitles')->whereNull('deleted_at')->orderBy('level_id', 'ASC')->get();
        $function_array = array();
        foreach ($job_funs as $job) {

            $level = DB::table('joblevels')->where('id', $job->level_id)->whereNull('deleted_at')->get();
            $function_array[$level[0]->name][] = $job->name;
            /*
            if(!empty($p_name)){

                foreach ($p_name as $p_names) {

                    $function_array[$job->name][] =  $p_names->name;

                }

            }
            */
        }

        //print_r($function_array);die('273');


        // print_r($job_functions);die;
        $country = DB::table('internationals')->select('name')->whereNull('deleted_at')->get();
        $countries = array();
        foreach ($country as $key => $value) {
            $cnt = $value->name;
            if (!in_array($cnt, $countries)) {
                array_push($countries, $cnt);
            }
        }

        //Get Business Ownerships
        $ownership = DB::table('ownerships')->select('name')->whereNull('deleted_at')->get();
        $ownership_array = array();
        foreach ($ownership as $key => $value) {
            $cnt = $value->name;
            if (!in_array($cnt, $ownership_array)) {
                array_push($ownership_array, $cnt);
            }
        }
        //Get Business Model
        $business = DB::table('businesses')->select('name')->whereNull('deleted_at')->get();
        $business_array = array();
        foreach ($business as $key => $value) {
            $cnt = $value->name;
            if (!in_array($cnt, $business_array)) {
                array_push($business_array, $cnt);
            }
        }
        //Get YearFounded
        $yearfounded = DB::table('yearfoundeds')->select('name')->whereNull('deleted_at')->orderBy('id', 'desc')->get();
        $yearfounded_array = array();
        foreach ($yearfounded as $key => $value) {
            $cnt = $value->name;
            if (!in_array($cnt, $yearfounded_array)) {
                array_push($yearfounded_array, $cnt);
            }
        }
        // internationals
        // $country = DB::table('internationals')->select('name')->whereNull('deleted_at')->get();
        //print_r($country);die('528');



        // $state = DB::table('businesscontacts')->select('state')->whereNull('deleted_at')->get();
        $state = DB::table('states')->whereNull('deleted_at')->get();
        $stat = array();
        if (!empty($state)) {
            $i = 0;
            foreach ($state as $key => $value) {
                $states = $value->name;
                $statescode = $value->code;


                if (!in_array($states, $stat)) {
                    // array_push($stat, $states);
                    $stat[$i]['statename'] = $states;
                    $stat[$i]['stateswithcode'] = $states . ' - ' . $statescode;
                    $stat[$i]['code'] = $statescode;
                    $i++;
                }
            }
        }
        //print_r($stat);die('596');



        $city = DB::table('cities')->select('name')->whereNull('deleted_at')->get();
        // print_r($city);die('587');
        //$city = DB::table('cities')->select('name')->get();
        $cities = array();
        foreach ($city as $key => $value) {
            $citys = $value->name;
            if (!empty($citys)) {
                if (!in_array($citys, $cities)) {
                    array_push($cities, $citys);
                }
            }
        }
        //$employee_range = DB::table('businesscontacts')->select('employees')->whereNull('deleted_at')->get();


        if ($name == 'healthcare') {

            // if($filtertypee==''){
            //     $contacts='';
            // }
            $healthprofessional = DB::table('healthprofessionals')->select('name')->whereNull('deleted_at')->get();
            $pageName = 'template.healthcarelist';

            if (isset($healthprofessional)  && !empty($healthprofessional)) {
                foreach ($healthprofessional as $key => $value) {
                    $health = $value->name;
                    if (!in_array($health, $healthprofessionals)) {
                        array_push($healthprofessionals, $health);
                    }
                }
            }
        } else if ($name == 'business' || $name == 'advanced-search') {

            $pageName = 'template.buildlist';
        } else if ($name == 'real_estate') {

            $pageName = 'template.real_estate';
        } else if ($name == 'my-leads') {
            $pageName = 'template.myleads';
        } else if ($name == 'upgrade-plan') {
            $pageName = 'template.upgradeplan';
        } else if ($name == 'account') {
            $pageName = 'template.account';
        } else if ($name == 'account-billing') {
            $pageName = 'template.accountbilling';
        } else if ($name == 'account-billing') {
            $pageName = 'template.checkout';
        } else if ($name == 'company-search') {
            $pageName = 'template.companysearch';
        } else if ($name == 'email-search') {
            $pageName = 'template.emailsearch';
        } else if ($name == 'phone-search') {
            $pageName = 'template.phonesearch';
        }

        $savedfilters = DB::table('savefilters')->select('filtername')->whereNull('deleted_at')->where('userid', $userid)->get('filtername');
        $allcontacts = DB::select('select count(id) as total_ids from businesscontacts where active = 1')[0]->total_ids;
        $myleads = DB::table('savecontacts')->select('contacts')->whereNull('deleted_at')->where('userid', $userid)->orderBy('id', 'DESC')->get('contacts');
        for ($i = 0; $i < count($myleads); $i++) {
            $contactid = $myleads[$i]->contacts;
            $contactinfo = DB::table('businesscontacts')->select('*')->where('active', 1)->whereNull('deleted_at')->where('id', $contactid)->get();
            $myleads[$i]->contactinfo = $contactinfo;
        }
        $userinfo = DB::table('users')->select('*')->where('id', $userid)->first();

        $user_subscription = DB::table('users')->select('*')->whereNull('deleted_at')->where('id', $userid)->first()->subscription_id;

        if ($userinfo->plan == 0) {
            $userinfo->plan = 'free';
            $userinfo->billing = 'monthly';
            $userinfo->planid = '';
            $userinfo->productname = 'Free';
            $userinfo->producttype = 'service';
            $userinfo->getcredit = 10;
            $userinfo->planstart = '';
            $userinfo->planend = '';
            $now = date_create(date('Y-m-d'));
            //$end=date_create($userinfo->planend);
            //$interval = date_diff($now, $end);
            $userinfo->leftdays = 31;
        } else {
            $planinfo = DB::table('plan')->select('*')->where('id', $userinfo->plan)->first();
            $userinfo->plan = $planinfo->slug;
            $userinfo->billing = $planinfo->billing;
            $userinfo->planid = $planinfo->plan_id;
            $userinfo->productname = $planinfo->product_name;
            $userinfo->producttype = 'service';
            $userinfo->getcredit = $planinfo->credit;
            $userinfo->planstart = DB::table('user_subscriptions')->where('id', $user_subscription)->first()->plan_period_start;
            $userinfo->planend = DB::table('user_subscriptions')->where('id', $user_subscription)->first()->plan_period_end;
            $now = date_create(date('Y-m-d'));
            $end = date_create($userinfo->planend);
            $interval = date_diff($now, $end);
            $userinfo->leftdays = $interval->format('%a');
        }
        if ($userinfo->down_plan == 0) {
            $userinfo->down_plan_name = 'Free';
        }
        if ($userinfo->down_plan > 0) {
            $userinfo->down_plan_name = DB::table('plan')->select('*')->where('id', $userinfo->down_plan)->first()->productname;
        }
        $myleadscount = count($myleads);
        $credit = DB::table('users')->select('*')->whereNull('deleted_at')->where('id', $userid)->first()->credit;
        // echo $readymadelisids;die('605');
        // print_r($contacts);die('664');


        // dd($pageName);
        return View($pageName, [
            'userinfo' => $userinfo,
            'frontpages' => $this->frontpages,
            'buildlist' => $buildlist,
            'currentid' => isset($this->user_id) ? $this->user_id : '',
            'username' => isset($this->user_name) ? $this->user_name : '',
            'page' => 'buildlist',
            'allcontacts' => $allcontacts,
            'business_contacts' => $contacts,
            'filter_indus' => $indus,
            'filter_contry' => $countries,
            'filter_state' => $stat,
            'filter_city' => $cities,
            'filter_data' => $save_filter_exp,
            'savedfilters' => $savedfilters,
            //'filter_jobs'=>$job_levels,
            //'filter_jobfuns'=>$job_functions,
            'filter_healthprofessionals' => $healthprofessionals,
            'function_array' => $function_array,
            'joblevel_array' => $joblevel_array,
            'ownership_array' => $ownership_array,
            'business_array' => $business_array,
            'yearfounded_array' => $yearfounded_array,
            'total_contacts' => isset($total_contacts) ? $total_contacts : '',
            'range_of_contact' => isset($range_of_contact) ? $range_of_contact : '',
            /** RANGE OF STELCTED IN SLIDER **/
            'range_of_contact_count' => isset($totlacontact) ? $totlacontact : '',
            /**RANGE OF TOTAL FILTER DATA**/
            'price' => isset($price) ? $price : '',
            'rangeofstyle' => isset($rangeofstyle) ? $rangeofstyle : '',
            'countryfilters' => isset($countryfilters) ? $countryfilters : '',
            'searchByJob' => isset($searchByJob) ? $searchByJob : 'United States',
            'savesearchid' => isset($savesearchid) ? $savesearchid : '',
            'dataId' => isset($dataId) ? $dataId : 'country',
            'jobfunctionparentid' => $jobfunctionparentid,
            'nodatafound' => isset($nodatafound) ? $nodatafound : '',
            'priceencrypt' => !empty($totalencryptdata['priceencrypt']) ? $totalencryptdata['priceencrypt'] : '',
            'countencrypt' => !empty($totalencryptdata['countencrypt']) ? $totalencryptdata['countencrypt'] : '',
            'excludefilters' => !empty($excludefilters) ? $excludefilters : '',
            'savesearchValues' => !empty($serchvalue) ? $serchvalue : '',
            'real_state_readymadelistdata' => !empty($realestate_searchData) ? $realestate_searchData : '',
            'State_Search__real_Data' => $State_Search__real_Data,
            'EmpMintrange' => !empty($EmpMintrange) ? $EmpMintrange : '',
            'EmpMaxtrange' => !empty($EmpMaxtrange) ? $EmpMaxtrange : '',
            'Emptextspan' => !empty($Emptextspan) ? $Emptextspan : '',
            'RevrMinrange' => !empty($RevrMinrange) ? $RevrMinrange : '',
            'RevrMaxrange' => !empty($RevrMaxrange) ? $RevrMaxrange : '',
            'Rangetextspan' => !empty($Rangetextspan) ? $Rangetextspan : '',
            'readymadelisids' => $readymadelisids,
            'myleads' => $myleads,
            'myleads_count' => $myleadscount,
            'contracts' => [],
            'credit' => $credit
        ]);
    }
    /*
        Save Contact
    */
    /*
        Download MyLeads
    */
    public function downloadleads(Request $request)
    {
        $items = json_decode($request->item);
        $result = array();
        $contactlistDetails = array();
        foreach ($items as $item) {
            $firstname = explode(' ', $item)[0];
            $lastname = explode(' ', $item)[1];
            $contactinfo = DB::table('businesscontacts')->select('*')->where('active', 1)->whereNull('deleted_at')->where('first_name', $firstname)->where('last_name', $lastname)->where('active', 1)->first();
            $result[] = $contactinfo;
        }
        foreach ($result as $key => $value) {
            if (!isset($format)) {
                $format = '1';
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
    /*
        Download SelContacts
    */
    public function downloadSelContacts(Request $request)
    {
        $items = json_decode($request->item);
        $result = array();
        $contactlistDetails = array();
        foreach ($items as $item) {
            $contactinfo = DB::table('businesscontacts')->select('*')->whereNull('deleted_at')->where('id', $item)->where('active', 1)->first();
            $result[] = $contactinfo;
        }

        $userid = Session::get('user_id');
        $user_credit = DB::table('users')->whereNull('deleted_at')->where('id', $userid)->first()->credit;
        $contactscount = count($items);

        if ($user_credit < $contactscount) {
            die('Credit ERROR');
        }
        DB::table('users')->whereNull('deleted_at')->where('id', $userid)->update(array('credit' => $user_credit - $contactscount));

        foreach ($result as $key => $value) {
            if (!isset($format)) {
                $format = '1';
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
    public function downloadcontacts(Request $request)
    {
        $fields = $request->data;
        $where = 'active = 1 and';
        $nodatafound = 0;
        $contactscount = $request->count;
        if (isset($fields) && !empty($fields)) {
            if (isset($fields['url_details']) && !empty($fields['url_details'])) {
                $url_save_result = $fields['url_details'];
                unset($fields['url_details']);
            }
            if (isset($fields['sample']) && !empty($fields['sample'])) {/*Run Example for secrh*/
                $sample = $fields['sample'];
                unset($fields['sample']);
            }
            if (isset($fields['types']) && !empty($fields['types'])) {
                $types = $fields['types'];
                unset($fields['types']);
            }
            if (isset($fields['Contact']) && !empty($fields['Contact'])) {
                unset($fields['Contact']);
            }
            if (isset($fields['Specialty']) && !empty($fields['Specialty'])) {
                unset($fields['Specialty']);
            }
            if (isset($fields['Specialty']) && !empty($fields['Specialty'])) {
                unset($fields['Specialty']);
            }
        }
        if (!isset($fields) || empty($fields)) {
            $where = 'active = 1';
        }
        /*Validation check for employee industries and  add to filter query*/
        if (isset($fields['job_level']) && !empty($fields['job_level'])) {
            $job_level = $fields['job_level'];
            unset($fields['job_level']);

            if (isset($job_level) && !empty($job_level)) {
                $total = count($job_level);
                $total = $total - 1;
                foreach ($job_level as $key => $value) {
                    $levelid = DB::table('joblevels')->select('id')->whereNull('deleted_at')->where('name', $value)->first()->id;
                    $titles_inlevel = DB::table('jobtitles')->select('name')->whereNull('deleted_at')->where('level_id', $levelid)->get('name');
                    for ($i = 0; $i < count($titles_inlevel); $i++) {
                        if (isset($fields['job_function']) && !empty($fields['job_function'])) {
                        } else {
                            $fields['job_function'] = array();
                        }
                        array_push($fields['job_function'], $titles_inlevel[$i]->name);
                    }
                }
            }
            $flag = 1;
        }
        /* Validation check for employee job_function and add to filter query*/
        if (isset($fields['job_function']) && !empty($fields['job_function'])) {
            $job_functions = $fields['job_function'];
            $job_function = $fields['job_function'];
            unset($fields['job_function']);
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
                }
            }
            $flag = 1;
        }

        /*Validation check for employee industries and  add to filter query*/
        if (isset($fields['industries']) && !empty($fields['industries'])) {
            $industries = $fields['industries'];
            unset($fields['industries']);

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
            }
            $flag = 1;
        }
        /*Validation check for employee company_name and  add to filter query*/
        if (!empty($fields['company_name']) && !empty($fields['company_name'])) {
            $company_name = $fields['company_name'];
            unset($fields['company_name']);

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
        /*Validation check for employee employee_count and  add to filter query*/
        if (!empty($fields['employee_count']) && !empty($fields['employee_count'])) {
            $employee_count = $fields['employee_count'];
            unset($fields['employee_count']);
            if (isset($employee_count) && !empty($employee_count)) {
                $total = count($employee_count);
                $total = $total - 1;
                $where .= ' (';
                foreach ($employee_count as $key => $value) {
                    $minValue = (int)explode(' - ', $value)[0];
                    $maxValue = (int)explode(' - ', $value)[1];
                    if ($total > $key) {
                        $where  .=  ' employees LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or (CAST(employees as INT) > ' . $minValue . ' and CAST(employees as INT) < ' . $maxValue . ') or';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' employees LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or (CAST(employees as INT) > ' . $minValue . ' and CAST(employees as INT) < ' . $maxValue . ' )) and ';
                    } elseif ($total == $key) {
                        $where  .= ' employees LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or (CAST(employees as INT) > ' . $minValue . ' and CAST(employees as INT) < ' . $maxValue . ' )) ';
                    }
                }
            }
            $flag = 1;
        }
        /*Validation check for employee employee_count and  add to filter query*/
        if (!empty($fields['revenue']) && !empty($fields['revenue'])) {
            $revenue = $fields['revenue'];
            unset($fields['revenue']);
            if (isset($revenue) && !empty($revenue)) {
                $total = count($revenue);
                $total = $total - 1;
                $where .= ' (';
                foreach ($revenue as $key => $value) {
                    $value = str_replace('M', '000000', $value);
                    $value = str_replace('B', '000000000', $value);
                    $minValue = (int)explode(' - ', $value)[0];
                    $maxValue = (int)explode(' - ', $value)[1];
                    if ($total > $key) {
                        $where  .=  ' revenue LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or (CAST(revenue as INT) > ' . $minValue . ' and CAST(revenue as INT) < ' . $maxValue . ') or';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' revenue LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or (CAST(revenue as INT) > ' . $minValue . ' and CAST(revenue as INT) < ' . $maxValue . ' )) and ';
                    } elseif ($total == $key) {
                        $where  .= ' revenue LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or (CAST(revenue as INT) > ' . $minValue . ' and CAST(revenue as INT) < ' . $maxValue . ' )) ';
                    }
                }
            }
            $flag = 1;
        }

        /* Validation check for country fields */
        if (isset($fields['country']) && !empty($fields['country'])) {
            $contry_json_data['country'] = $fields['country'];
            $contry_json_data = json_encode($contry_json_data);
            $country = $fields['country'];
            unset($fields['country']);
            if (isset($country) && !empty($country)) {
                $total = count($country);
                $total = $total - 1;
                $where .= ' (';
                foreach ($country as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' country LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' country LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' country LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }
        /*Start field['state] */
        if (!empty($fields['state']) && !empty($fields['state'])) {
            $state = $fields['state'];
            unset($fields['state']);

            if (isset($state) && !empty($state)) {
                $total = count($state);
                $total = $total - 1;
                $where .= ' (';
                foreach ($state as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' state LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' state LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' state LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }

        /*End filed['state] */
        /*Start field['city] */
        if (!empty($fields['city']) && !empty($fields['city'])) {
            $city = $fields['city'];
            unset($fields['city']);

            if (isset($city) && !empty($city)) {
                $total = count($city);
                $total = $total - 1;
                $where .= ' (';
                foreach ($city as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' city LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' city LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' city LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }

        /*End filed['city] */
        if (!empty($fields['zipcode']) && !empty($fields['zipcode'])) {
            $zipcode = $fields['zipcode'];
            unset($fields['zipcode']);
            if (isset($zipcode) && !empty($zipcode)) {
                $total = count($zipcode);
                $total = $total - 1;
                $where .= ' (';
                foreach ($zipcode as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' zipcode LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' zipcode LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' zipcode LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }
        /*Start field['ownership] */
        if (!empty($fields['ownership']) && !empty($fields['ownership'])) {
            $ownership = $fields['ownership'];
            unset($fields['ownership']);

            if (isset($ownership) && !empty($ownership)) {
                $total = count($ownership);
                $total = $total - 1;
                $where .= ' (';
                foreach ($ownership as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' ownership LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' ownership LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' ownership LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }

        /*End filed['ownership] */
        /*Start field['business] */
        if (!empty($fields['business']) && !empty($fields['business'])) {
            $business = $fields['business'];
            unset($fields['business']);

            if (isset($business) && !empty($business)) {
                $total = count($business);
                $total = $total - 1;
                $where .= ' (';
                foreach ($business as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' business_model LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' business_model LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' business_model LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }

        /*End filed['business] */

        /*Start field['yearfounded] */
        if (!empty($fields['yearfounded']) && !empty($fields['yearfounded'])) {
            $yearfounded = $fields['yearfounded'];
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

        if (!empty($fields['siccode']) && !empty($fields['siccode'])) {
            $siccode = $fields['siccode'];
            unset($fields['siccode']);
            if (isset($siccode) && !empty($siccode)) {
                $total = count($siccode);
                $total = $total - 1;
                $where .= ' (';
                foreach ($siccode as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' csic_code LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' csic_code LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' csic_code LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }

        if (!empty($fields['naicscode']) && !empty($fields['naicscode'])) {
            $naicscode = $fields['naicscode'];
            unset($fields['naicscode']);
            if (isset($naicscode) && !empty($naicscode)) {
                $total = count($naicscode);
                $total = $total - 1;
                $where .= ' (';
                foreach ($naicscode as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' cnai_code LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' cnai_code LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' cnai_code LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }
        /* validation check for Other fileds here  */
        if (isset($fields) && !empty($fields)) {
            die('There are other fields which are not be checked!!!!');
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
        if (!empty($types)) {
            $fields['types'] = $types;
        }
        if (!empty($job_level)) {
            $fields['joblevel'] = $job_level;
        }
        if (!empty($job_functions)) {
            $fields['jobtitles'] = $job_functions;
        }
        if (!empty($industries)) {
            $fields['industry'] = $industries;
        }
        if (!empty($company_name)) {
            $fields['company'] = $company_name;
        }
        if (!empty($employee_count)) {
            $fields['employee_count'] = $employee_count;
        }
        if (!empty($revenue)) {
            $fields['revenue'] = $revenue;
        }
        if (!empty($country)) {
            $fields['country'] = $country;
        }
        if (!empty($state)) {
            $fields['state'] = $state;
        }
        if (!empty($city)) {
            $fields['city'] = $city;
        }
        if (!empty($zipcode)) {
            $fields['zipcode'] = $zipcode;
        }
        if (!empty($ownership)) {
            $fields['ownership'] = $ownership;
        }
        if (!empty($business)) {
            $fields['business'] = $business;
        }
        if (!empty($siccode)) {
            $fields['siccode'] = $siccode;
        }
        if (!empty($naicscode)) {
            $fields['naicscode'] = $naicscode;
        }
        if (!empty($yearfounded)) {
            $fields['yearfounded'] = $yearfounded;
        }
        if (isset($Specialty) && !empty($Specialty)) {
            $fields['Specialty'] = $Specialty;
        }
        if (isset($Contact) && !empty($Contact)) {
            $fields['Contact'] = $Contact;
        }
        /**HERE INSERT ALL SEARCH FILEDS**/
        if (isset($fields) && !empty($fields)) {
            $filter_jsondata = json_encode($fields);
        }
        if (isset($where) && !empty($where)) { //echo $where;die('1329');
            $final_result = DB::select('select * from businesscontacts where ' . $where . '  ORDER BY (job_title LIKE ' . "'%Chief%'" . ') DESC LIMIT ' . $contactscount);
            $id_result = DB::select('select count(id) as total_ids from businesscontacts where ' . $where);
        } else {
            $final_result = array();
        }
        $counts = 0;
        if (isset($final_result) && !empty($final_result)) {
            $flag = 1;
            $counts = $id_result[0]->total_ids; //echo $counts;die('1338');
            $filer_ids = array();
            foreach ($final_result as $key => $value) {
                $filer_ids[] = $value->id;
            }
            $filer_ids = json_encode($filer_ids);
        }

        if (isset($counts) && $counts > 0) {
            $totalprice = $this->getPrice($counts);
            $price = $totalprice['price'];
        }
        $price =  !empty($price) ? $price : '';
        $contry_json_data =  !empty($contry_json_data) ? $contry_json_data : '';
        /**HERE CREATE RANDAM STRING FOR ENCRYPTION**/
        if ($flag == 1) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomStringfirst = '';
            $randomStringlast = '';
            for ($i = 0; $i < 8; $i++) {
                $randomStringlast .= $characters[rand(0, $charactersLength - 1)];
            }
            for ($i = 0; $i < 10; $i++) {
                $randomStringfirst .= $characters[rand(0, $charactersLength - 1)];
            }
        }
        /*Validation check for url slug and after filtering save data in save_result table*/
        if (isset($url_save_result) && !empty($url_save_result)) {
            $url_save_result = explode("/", $url_save_result);
        }
        $seacrhtype = !empty($url_save_result[2]) ? $url_save_result[2] : '';
        $concatvalue =  !empty($concatvalue) ? $concatvalue : '';
        $price_incr =  !empty($price_incr) ? $price_incr : '';
        $price_incr =  !empty($price_incr) ? $price_incr : '';
        $filter_jsondata =  !empty($filter_jsondata) ? $filter_jsondata : '';
        $filer_ids = !empty($filer_ids) ? $filer_ids : '';
        $fieldsexcludejsondata = !empty($fieldsexcludejsondata) ? $fieldsexcludejsondata : '';

        if ($flag == 1 && empty($sample)) {
            /** HERE GET INSERT ID **/
            $getinsertid = $this->getlastinsertid();
            $lastid = $getinsertid;
            $lastidinsert = 'id=' . $lastid . $randomStringlast;
            $concatvalue = $lastidinsert;
        }
        if (isset($url_save_result[3]) && !empty($url_save_result[3])) { //die('238');
            $url_save_exist = $url_save_result[3];
            $value             =  substr($url_save_exist, 10);
            $encryptedata      =  base64_decode($value);
            $url_save_exist_id =  substr($encryptedata, 0, -8);
            $url_save_exist_id =  explode("=", $url_save_exist_id);
            $filtertypee = $url_save_exist_id[0];
            if ($filtertypee == 'id') {
                $url_save_exist_id =  $url_save_exist_id[1];
                $lastid = $url_save_exist_id;
                $concatvalue =  'id=' . $url_save_exist_id . $randomStringlast;
                $save_id_checked = DB::table('save_result')
                    ->select(DB::raw('*'))
                    ->where('id', $url_save_exist_id)
                    ->where('buy_status', '!=', 1)
                    ->first();
                if (isset($save_id_checked) && !empty($save_id_checked)  && $flag == 1) {
                    DB::table('save_result')
                        ->where('id', $save_id_checked->id)
                        ->update(array('allsavedata' => $filer_ids, 'filtersexclude' => $fieldsexcludejsondata, 'filters' => $filter_jsondata, 'totalamt' => $price_incr, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'rangeofstyle' => ''));
                } else {
                    $getinsertid = $this->getlastinsertid();
                    $lastid = $getinsertid;
                    $lastidinsert = 'id=' . $lastid . $randomStringlast;
                    $concatvalue = $lastidinsert;
                    $savedata = DB::table('save_result')->insert(array('allsavedata' => $filer_ids, 'filters' => $filter_jsondata, 'filtersexclude' => $fieldsexcludejsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'types' => $types));
                }
            } else {
                $savedata = DB::table('save_result')->insert(array('allsavedata' => $filer_ids, 'filtersexclude' => $fieldsexcludejsondata, 'filters' => $filter_jsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'types' => $seacrhtype));
            }
        } else if (/*$flag==0 &&  */isset($sample) && $sample == 1) {
            /*Sample for Run example if url encode value not exist*/
            $counts = 0;
            $price = false;
            $priceen = false;
            $counten = 0;
            $pagetype = !empty($pagetype) ? $pagetype : '';
            $final_result = DB::table('businesscontacts')
                ->select(DB::raw('*'))->where('active', 1)
                ->limit($contactscount)
                ->get();
        } else if ($flag == 1 && empty($sample) && !empty($filer_ids)) {
            $savedata = DB::table('save_result')->insert(array('allsavedata' => $filer_ids, 'filtersexclude' => $fieldsexcludejsondata, 'filters' => $filter_jsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'types' => $seacrhtype)); //,'types'=>
        } else if ($flag == 1 && empty($sample) && empty($filer_ids)) {
            $savedata = DB::table('save_result')->insert(array('allsavedata' => '', 'filtersexclude' => $fieldsexcludejsondata, 'filters' => $filter_jsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'types' => $seacrhtype));
        }


        if (!empty($concatvalue) && empty($sample)) {
            /** Here data encrypte Save id in save result table **/
            $concatvalue = $randomStringfirst . base64_encode($concatvalue);
        } else {
            /** RUN TO SAMPLE BUTTON CLICK **/
            $concatvalue = '';
        }
        $concatvalue =  !empty($concatvalue) ? $concatvalue : '';
        $newfinalresult = array();
        $final_result =  !empty($final_result) ? $final_result : '';
        $priceen = !empty($totalprice['priceencrypt']) ? $totalprice['priceencrypt'] : '';
        $counten = !empty($totalprice['countencrypt']) ? $totalprice['countencrypt'] : '';
        if (isset($final_result) && !empty($final_result)) {
            $count_final_result = count($final_result);
            if ($count_final_result > 21) {
                $final_result = array_slice($final_result, 0, $contactscount);
            }

            //print_r($final_result);die('1487');
            foreach ($final_result as $key => $contact) {
                $final_result[$key]->email_address =  $contact->email_address;

                // Replace string in Company Name
                $phone_number = $contact->phone_number;
                $final_result[$key]->phone_number = $phone_number;


                $direct_phone = $contact->direct_phone;
                $final_result[$key]->direct_phone = $direct_phone;
            }
        }
        if (!isset($job_format)) {
            $job_format = 0;
        }
        $userid = Session::get('user_id');
        $user_credit = DB::table('users')->whereNull('deleted_at')->where('id', $userid)->first()->credit;
        if ($contactscount > count($final_result)) {
            $contactscount = count($final_result);
        }
        if ($user_credit < $contactscount) {
            die('Credit ERROR');
        }
        DB::table('users')->whereNull('deleted_at')->where('id', $userid)->update(array('credit' => $user_credit - $contactscount));
        foreach ($final_result as $key => $value) {
            if (!isset($format)) {
                $format = '1';
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
    public function viewcontact(Request $request)
    {
        $userid = Session::get('user_id');
        $contactid = $request->id;
        $contact = DB::table('businesscontacts')->select('*')->where('active', 1)->whereNull('deleted_at')->where('id', $contactid)->first();
        $credit = DB::table('users')->select('*')->whereNull('deleted_at')->where('id', $userid)->first()->credit;
        if ($credit < 1) {
            return response()->json(array('nocredit' => true, 'credit' => 0));
        }
        $credit = $credit - 1;
        DB::table('users')->whereNull('deleted_at')->where('id', $userid)->update(array('credit' => $credit));
        return response()->json(array('contact' => $contact, 'nocredit' => false, 'credit' => $credit));
        die();
    }
    public function checkcontact(Request $request)
    {
        $userid = Session::get('user_id');
        $contactid = $request->id;
        $contact = DB::table('businesscontacts')->select('*')->where('active', 1)->whereNull('deleted_at')->where('id', $contactid)->first();
        $saveid = DB::table('savecontacts')->select('id')->whereNull('deleted_at')->where('userid', $userid)->where('contacts', $contactid)->first();
        if ($saveid) {
            $result = true;
        } else {
            $result = false;
        }
        $viewid = DB::table('viewcontacts')->select('id')->whereNull('deleted_at')->where('userid', $userid)->where('contacts', $contactid)->first();
        $credit = DB::table('users')->select('*')->whereNull('deleted_at')->where('id', $userid)->first()->credit;
        if (!$viewid) {
            $credit = DB::table('users')->select('*')->whereNull('deleted_at')->where('id', $userid)->first()->credit;
            if ($credit < 1) {
                return response()->json(array('saved' => $result, 'contact' => $contact, 'nocredit' => true, 'credit' => 0));
            }
            $credit = $credit - 1;
            DB::table('users')->whereNull('deleted_at')->where('id', $userid)->update(array('credit' => $credit));
            $resultView = DB::table('viewcontacts')->insert(array('userid' => $userid, 'contacts' => $contactid));
            if (!$resultView) {
                die('View Contact Failed');
            }
        }
        if (!$result) {
            $result = DB::table('savecontacts')->insert(array('userid' => $userid, 'contacts' => $contactid));
        }
        return response()->json(array('saved' => true, 'contact' => $contact, 'nocredit' => false, 'credit' => $credit));
        die();
    }
    public function savecontact(Request $request)
    {
        $userid = Session::get('user_id');
        $name = $request->name;
        $contactid = $request->id;
        $result = DB::table('savecontacts')->insert(array('userid' => $userid, 'contacts' => $contactid));
        if (!$result) {
            die('Save Contact Failed');
        }
        return response()->json(array('saved' => true));
        die();
    }
    /*
        Save Filter Function
     */
    public function savefilter(Request $request)
    {
        $fields = $request->data;
        if (isset($fields) && !empty($fields)) {
            if (isset($fields['url_details']) && !empty($fields['url_details'])) {
                $url_save_result = $fields['url_details'];
                unset($fields['url_details']);
            }
            if (isset($fields['sample']) && !empty($fields['sample'])) {/*Run Example for secrh*/
                $sample = $fields['sample'];
                unset($fields['sample']);
            }
            if (isset($fields['types']) && !empty($fields['types'])) {
                $types = $fields['types'];
                unset($fields['types']);
            }
            if (isset($fields['Contact']) && !empty($fields['Contact'])) {
                unset($fields['Contact']);
            }
            if (isset($fields['Specialty']) && !empty($fields['Specialty'])) {
                unset($fields['Specialty']);
            }
            if (isset($fields['filtername']) && !empty($fields['filtername'])) {
                $filtername = $fields['filtername'];
                unset($fields['filtername']);
            }
        }
        if (!isset($filtername) || empty($filtername)) {
            die('No filtername for saving filters');
        }
        $json_filter = json_encode($fields);
        $userid = Session::get('user_id');
        $savedata = DB::table('savefilters')->insert(array('userid' => $userid, 'filters' => $json_filter, 'filtername' => $filtername));
        $savedfilters = DB::table('savefilters')->select('filtername')->whereNull('deleted_at')->where('userid', $userid)->get('filtername');
        return response()->json(array('savedfilters' => $savedfilters));
        die();
    }
    public function openfilter(Request $request)
    {
        $filtername = $request->filtername;
        $userid = Session::get('user_id');
        $filter = DB::table('savefilters')->select('filters')->whereNull('deleted_at')->where('userid', $userid)->where('filtername', $filtername)->first();

        return response()->json(array('filters' => $filter));
        die();
    }
    public function myleadspage(Request $request)
    {
        $count = $request->count;
        $start = $request->start;
        $userid = Session::get('user_id');
        $myleads = DB::table('savecontacts')->select('contacts')->whereNull('deleted_at')->where('userid', $userid)->orderBy('id', 'DESC')->limit($count)->offset($start)->get('contacts');
        for ($i = 0; $i < count($myleads); $i++) {
            $contactid = $myleads[$i]->contacts;
            $contactinfo = DB::table('businesscontacts')->select('*')->where('active', 1)->whereNull('deleted_at')->where('id', $contactid)->get();
            $myleads[$i]->contactinfo = $contactinfo;
        }
        return response()->json(array('result' => $myleads));
        die();
    }
    /**
        @@ BUILDLIST FILTERS FUNCTIONALITY @@
     **/
    public function filter(Request $request)
    {
        $fields = $request->data;
        $where = 'active = 1 and';
        $nodatafound = 0;
        $from = $request->from;
        if (isset($fields) && !empty($fields)) {
            if (isset($fields['url_details']) && !empty($fields['url_details'])) {
                $url_save_result = $fields['url_details'];
                unset($fields['url_details']);
            }
            if (isset($fields['sample']) && !empty($fields['sample'])) {/*Run Example for secrh*/
                $sample = $fields['sample'];
                unset($fields['sample']);
            }
            if (isset($fields['types']) && !empty($fields['types'])) {
                $types = $fields['types'];
                unset($fields['types']);
            }
            if (isset($fields['Contact']) && !empty($fields['Contact'])) {
                unset($fields['Contact']);
            }
            if (isset($fields['Specialty']) && !empty($fields['Specialty'])) {
                unset($fields['Specialty']);
            }
            if (isset($fields['Specialty']) && !empty($fields['Specialty'])) {
                unset($fields['Specialty']);
            }
        }
        if (!isset($fields) || empty($fields)) {
            $where = 'active = 1';
        }
        /*Validation check for employee industries and  add to filter query*/
        if (isset($fields['job_level']) && !empty($fields['job_level'])) {
            $job_level = $fields['job_level'];
            unset($fields['job_level']);

            if (isset($job_level) && !empty($job_level)) {
                $total = count($job_level);
                $total = $total - 1;
                foreach ($job_level as $key => $value) {
                    $levelid = DB::table('joblevels')->select('id')->whereNull('deleted_at')->where('name', $value)->first()->id;
                    $titles_inlevel = DB::table('jobtitles')->select('name')->whereNull('deleted_at')->where('level_id', $levelid)->get('name');
                    for ($i = 0; $i < count($titles_inlevel); $i++) {
                        if (isset($fields['job_function']) && !empty($fields['job_function'])) {
                        } else {
                            $fields['job_function'] = array();
                        }
                        array_push($fields['job_function'], $titles_inlevel[$i]->name);
                    }
                }
            }
            $flag = 1;
        }
        /* Validation check for employee job_function and add to filter query*/
        if (isset($fields['job_function']) && !empty($fields['job_function'])) {
            $job_functions = $fields['job_function'];
            $job_function = $fields['job_function'];
            unset($fields['job_function']);
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
                }
            }
            $flag = 1;
        }

        /*Validation check for employee industries and  add to filter query*/
        if (isset($fields['industries']) && !empty($fields['industries'])) {
            $industries = $fields['industries'];
            unset($fields['industries']);

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
            }
            $flag = 1;
        }
        /*Validation check for employee company_name and  add to filter query*/
        if (!empty($fields['company_name']) && !empty($fields['company_name'])) {
            $company_name = $fields['company_name'];
            unset($fields['company_name']);

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
        /*Validation check for employee employee_count and  add to filter query*/
        if (!empty($fields['employee_count']) && !empty($fields['employee_count'])) {
            $employee_count = $fields['employee_count'];
            unset($fields['employee_count']);
            if (isset($employee_count) && !empty($employee_count)) {
                $total = count($employee_count);
                $total = $total - 1;
                $where .= ' (';
                foreach ($employee_count as $key => $value) {
                    $minValue = (int)explode(' - ', $value)[0];
                    $maxValue = (int)explode(' - ', $value)[1];
                    if ($total > $key) {
                        $where  .=  ' employees LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or (CAST(employees as INT) > ' . $minValue . ' and CAST(employees as INT) < ' . $maxValue . ') or';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' employees LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or (CAST(employees as INT) > ' . $minValue . ' and CAST(employees as INT) < ' . $maxValue . ' )) and ';
                    } elseif ($total == $key) {
                        $where  .= ' employees LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or (CAST(employees as INT) > ' . $minValue . ' and CAST(employees as INT) < ' . $maxValue . ' )) ';
                    }
                }
            }
            $flag = 1;
        }
        /*Validation check for employee employee_count and  add to filter query*/
        if (!empty($fields['revenue']) && !empty($fields['revenue'])) {
            $revenue = $fields['revenue'];
            unset($fields['revenue']);
            if (isset($revenue) && !empty($revenue)) {
                $total = count($revenue);
                $total = $total - 1;
                $where .= ' (';
                foreach ($revenue as $key => $value) {
                    $value = str_replace('M', '000000', $value);
                    $value = str_replace('B', '000000000', $value);
                    $minValue = (int)explode(' - ', $value)[0];
                    $maxValue = (int)explode(' - ', $value)[1];
                    if ($total > $key) {
                        $where  .=  ' revenue LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or (CAST(revenue as INT) > ' . $minValue . ' and CAST(revenue as INT) < ' . $maxValue . ') or';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' revenue LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or (CAST(revenue as INT) > ' . $minValue . ' and CAST(revenue as INT) < ' . $maxValue . ' )) and ';
                    } elseif ($total == $key) {
                        $where  .= ' revenue LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or (CAST(revenue as INT) > ' . $minValue . ' and CAST(revenue as INT) < ' . $maxValue . ' )) ';
                    }
                }
            }
            $flag = 1;
        }

        /* Validation check for country fields */
        if (isset($fields['country']) && !empty($fields['country'])) {
            $contry_json_data['country'] = $fields['country'];
            $contry_json_data = json_encode($contry_json_data);
            $country = $fields['country'];
            unset($fields['country']);
            if (isset($country) && !empty($country)) {
                $total = count($country);
                $total = $total - 1;
                $where .= ' (';
                foreach ($country as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' country LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' country LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' country LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }
        /*Start field['state] */
        if (!empty($fields['state']) && !empty($fields['state'])) {
            $state = $fields['state'];
            unset($fields['state']);

            if (isset($state) && !empty($state)) {
                $total = count($state);
                $total = $total - 1;
                $where .= ' (';
                foreach ($state as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' state LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' state LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' state LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }

        /*End filed['state] */
        /*Start field['city] */
        if (!empty($fields['city']) && !empty($fields['city'])) {
            $city = $fields['city'];
            unset($fields['city']);

            if (isset($city) && !empty($city)) {
                $total = count($city);
                $total = $total - 1;
                $where .= ' (';
                foreach ($city as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' city LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' city LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' city LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }

        /*End filed['city] */
        if (!empty($fields['zipcode']) && !empty($fields['zipcode'])) {
            $zipcode = $fields['zipcode'];
            unset($fields['zipcode']);
            if (isset($zipcode) && !empty($zipcode)) {
                $total = count($zipcode);
                $total = $total - 1;
                $where .= ' (';
                foreach ($zipcode as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' zipcode LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' zipcode LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' zipcode LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }
        /*Start field['ownership] */
        if (!empty($fields['ownership']) && !empty($fields['ownership'])) {
            $ownership = $fields['ownership'];
            unset($fields['ownership']);

            if (isset($ownership) && !empty($ownership)) {
                $total = count($ownership);
                $total = $total - 1;
                $where .= ' (';
                foreach ($ownership as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' ownership LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' ownership LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' ownership LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }

        /*End filed['ownership] */
        /*Start field['business] */
        if (!empty($fields['business']) && !empty($fields['business'])) {
            $business = $fields['business'];
            unset($fields['business']);

            if (isset($business) && !empty($business)) {
                $total = count($business);
                $total = $total - 1;
                $where .= ' (';
                foreach ($business as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' business_model LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' business_model LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' business_model LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }

        /*End filed['business] */

        /*Start field['yearfounded] */
        if (!empty($fields['yearfounded']) && !empty($fields['yearfounded'])) {
            $yearfounded = $fields['yearfounded'];
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

        if (!empty($fields['siccode']) && !empty($fields['siccode'])) {
            $siccode = $fields['siccode'];
            unset($fields['siccode']);
            if (isset($siccode) && !empty($siccode)) {
                $total = count($siccode);
                $total = $total - 1;
                $where .= ' (';
                foreach ($siccode as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' csic_code LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' csic_code LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' csic_code LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }

        if (!empty($fields['naicscode']) && !empty($fields['naicscode'])) {
            $naicscode = $fields['naicscode'];
            unset($fields['naicscode']);
            if (isset($naicscode) && !empty($naicscode)) {
                $total = count($naicscode);
                $total = $total - 1;
                $where .= ' (';
                foreach ($naicscode as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' cnai_code LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' cnai_code LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' cnai_code LIKE  ' . "'" . '%' . $value . '%' . "' ) ";
                    }
                }
            }
            $flag = 1;
        }
        /* validation check for Other fileds here  */
        if (isset($fields) && !empty($fields)) {
            die('There are other fields which are not be checked!!!!');
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
        if (!empty($types)) {
            $fields['types'] = $types;
        }
        if (!empty($job_level)) {
            $fields['joblevel'] = $job_level;
        }
        if (!empty($job_functions)) {
            $fields['jobtitles'] = $job_functions;
        }
        if (!empty($industries)) {
            $fields['industry'] = $industries;
        }
        if (!empty($company_name)) {
            $fields['company'] = $company_name;
        }
        if (!empty($employee_count)) {
            $fields['employee_count'] = $employee_count;
        }
        if (!empty($revenue)) {
            $fields['revenue'] = $revenue;
        }
        if (!empty($country)) {
            $fields['country'] = $country;
        }
        if (!empty($state)) {
            $fields['state'] = $state;
        }
        if (!empty($city)) {
            $fields['city'] = $city;
        }
        if (!empty($zipcode)) {
            $fields['zipcode'] = $zipcode;
        }
        if (!empty($ownership)) {
            $fields['ownership'] = $ownership;
        }
        if (!empty($business)) {
            $fields['business'] = $business;
        }
        if (!empty($siccode)) {
            $fields['siccode'] = $siccode;
        }
        if (!empty($naicscode)) {
            $fields['naicscode'] = $naicscode;
        }
        if (!empty($yearfounded)) {
            $fields['yearfounded'] = $yearfounded;
        }
        if (isset($Specialty) && !empty($Specialty)) {
            $fields['Specialty'] = $Specialty;
        }
        if (isset($Contact) && !empty($Contact)) {
            $fields['Contact'] = $Contact;
        }
        /**HERE INSERT ALL SEARCH FILEDS**/
        if (isset($fields) && !empty($fields)) {
            $filter_jsondata = json_encode($fields);
        }
        if (isset($where) && !empty($where)) { //echo $where;die('1329');
            $final_result = DB::select('select * from businesscontacts where ' . $where . '  ORDER BY (job_title LIKE ' . "'%Chief%'" . ') DESC LIMIT 20 OFFSET ' . $from);
            $id_result = DB::select('select count(id) as total_ids from businesscontacts where ' . $where);
        } else {
            $final_result = array();
        }
        $counts = 0;
        if (isset($final_result) && !empty($final_result)) {
            $flag = 1;
            $counts = $id_result[0]->total_ids; //echo $counts;die('1338');
            $filer_ids = array();
            foreach ($final_result as $key => $value) {
                $filer_ids[] = $value->id;
            }
            $filer_ids = json_encode($filer_ids);
        }

        if (isset($counts) && $counts > 0) {
            $totalprice = $this->getPrice($counts);
            $price = $totalprice['price'];
        }
        $price =  !empty($price) ? $price : '';
        $contry_json_data =  !empty($contry_json_data) ? $contry_json_data : '';
        /**HERE CREATE RANDAM STRING FOR ENCRYPTION**/
        if ($flag == 1) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomStringfirst = '';
            $randomStringlast = '';
            for ($i = 0; $i < 8; $i++) {
                $randomStringlast .= $characters[rand(0, $charactersLength - 1)];
            }
            for ($i = 0; $i < 10; $i++) {
                $randomStringfirst .= $characters[rand(0, $charactersLength - 1)];
            }
        }
        /*Validation check for url slug and after filtering save data in save_result table*/
        if (isset($url_save_result) && !empty($url_save_result)) {
            $url_save_result = explode("/", $url_save_result);
        }
        $seacrhtype = !empty($url_save_result[2]) ? $url_save_result[2] : '';
        $concatvalue =  !empty($concatvalue) ? $concatvalue : '';
        $price_incr =  !empty($price_incr) ? $price_incr : '';
        $price_incr =  !empty($price_incr) ? $price_incr : '';
        $filter_jsondata =  !empty($filter_jsondata) ? $filter_jsondata : '';
        $filer_ids = !empty($filer_ids) ? $filer_ids : '';
        $fieldsexcludejsondata = !empty($fieldsexcludejsondata) ? $fieldsexcludejsondata : '';

        if ($flag == 1 && empty($sample)) {
            /** HERE GET INSERT ID **/
            $getinsertid = $this->getlastinsertid();
            $lastid = $getinsertid;
            $lastidinsert = 'id=' . $lastid . $randomStringlast;
            $concatvalue = $lastidinsert;
        }
        if (isset($url_save_result[3]) && !empty($url_save_result[3])) { //die('238');
            $url_save_exist = $url_save_result[3];
            $value             =  substr($url_save_exist, 10);
            $encryptedata      =  base64_decode($value);
            $url_save_exist_id =  substr($encryptedata, 0, -8);
            $url_save_exist_id =  explode("=", $url_save_exist_id);
            $filtertypee = $url_save_exist_id[0];
            if ($filtertypee == 'id') {
                $url_save_exist_id =  $url_save_exist_id[1];
                $lastid = $url_save_exist_id;
                $concatvalue =  'id=' . $url_save_exist_id . $randomStringlast;
                $save_id_checked = DB::table('save_result')
                    ->select(DB::raw('*'))
                    ->where('id', $url_save_exist_id)
                    ->where('buy_status', '!=', 1)
                    ->first();
                if (isset($save_id_checked) && !empty($save_id_checked)  && $flag == 1) {
                    DB::table('save_result')
                        ->where('id', $save_id_checked->id)
                        ->update(array('allsavedata' => $filer_ids, 'filtersexclude' => $fieldsexcludejsondata, 'filters' => $filter_jsondata, 'totalamt' => $price_incr, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'rangeofstyle' => ''));
                } else {
                    $getinsertid = $this->getlastinsertid();
                    $lastid = $getinsertid;
                    $lastidinsert = 'id=' . $lastid . $randomStringlast;
                    $concatvalue = $lastidinsert;
                    $savedata = DB::table('save_result')->insert(array('allsavedata' => $filer_ids, 'filters' => $filter_jsondata, 'filtersexclude' => $fieldsexcludejsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'types' => $types));
                }
            } else {
                $savedata = DB::table('save_result')->insert(array('allsavedata' => $filer_ids, 'filtersexclude' => $fieldsexcludejsondata, 'filters' => $filter_jsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'types' => $seacrhtype));
            }
        } else if (/*$flag==0 &&  */isset($sample) && $sample == 1) {
            /*Sample for Run example if url encode value not exist*/
            $counts = 0;
            $price = false;
            $priceen = false;
            $counten = 0;
            $pagetype = !empty($pagetype) ? $pagetype : '';
            $final_result = DB::table('businesscontacts')
                ->select(DB::raw('*'))->where('active', 1)
                ->limit(20)
                ->get();
        } else if ($flag == 1 && empty($sample) && !empty($filer_ids)) {
            $savedata = DB::table('save_result')->insert(array('allsavedata' => $filer_ids, 'filtersexclude' => $fieldsexcludejsondata, 'filters' => $filter_jsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'types' => $seacrhtype)); //,'types'=>
        } else if ($flag == 1 && empty($sample) && empty($filer_ids)) {
            $savedata = DB::table('save_result')->insert(array('allsavedata' => '', 'filtersexclude' => $fieldsexcludejsondata, 'filters' => $filter_jsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'types' => $seacrhtype));
        }


        if (!empty($concatvalue) && empty($sample)) {
            /** Here data encrypte Save id in save result table **/
            $concatvalue = $randomStringfirst . base64_encode($concatvalue);
        } else {
            /** RUN TO SAMPLE BUTTON CLICK **/
            $concatvalue = '';
        }
        $concatvalue =  !empty($concatvalue) ? $concatvalue : '';
        $newfinalresult = array();
        $final_result =  !empty($final_result) ? $final_result : '';
        $priceen = !empty($totalprice['priceencrypt']) ? $totalprice['priceencrypt'] : '';
        $counten = !empty($totalprice['countencrypt']) ? $totalprice['countencrypt'] : '';
        if (isset($final_result) && !empty($final_result)) {
            $count_final_result = count($final_result);
            if ($count_final_result > 21) {
                $final_result = array_slice($final_result, 0, 20);
            }

            //print_r($final_result);die('1487');
            foreach ($final_result as $key => $contact) {
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
                } //echo $final_result[$key]->email_address;die('1494');
                $final_result[$key]->email_address = $str1;

                // Replace string in Company Name
                $phone_number = $contact->phone_number;
                $phone_number = substr_replace($phone_number, "***", 2, 3);
                $phone_number = substr_replace($phone_number, "***", 10, 4);
                $final_result[$key]->phone_number = $phone_number;


                $direct_phone = $contact->direct_phone;
                $direct_phone = substr_replace($direct_phone, "***", 2, 3);
                $direct_phone = substr_replace($direct_phone, "***", 10, 4);
                $final_result[$key]->direct_phone = $direct_phone;
            }
        }
        if (!isset($job_format)) {
            $job_format = 0;
        }
        return response()->json(array('job_format' => $job_format, 'result' => $final_result, 'count' => $counts, 'counts' => $counten, 'price' => $price, 'prices' => $priceen, 'save_result' => $concatvalue, 'lastid' => $lastid));
        die();
    }

    /**
        @@ THIS SECTION SET FOR RANGE OF TOTAL CONTACT AFTER FILTER DATA @@
     **/
    public function ranges_of_contact(Request $request)
    {
        if ($request->ajax()) {
            $totlacontact = $request->range_of_contact;
            $url_details = $request->url_details;
            $ranfgeofstyle = $request->ranfgeofstyle;
            $randomStringlast = $randomStringfirst = $where = $filer_ids = $counts = '';
            //  echo $ranfgeofstyle;die;

            if ($totlacontact > 0) {
                $totalprice = $this->getPrice($totlacontact);
                $price = $totalprice['price'];
            }
            $priceen = !empty($totalprice['priceencrypt']) ? $totalprice['priceencrypt'] : '';
            $counten = !empty($totalprice['countencrypt']) ? $totalprice['countencrypt'] : '';
            if (isset($url_details) && !empty($url_details)) {
                $url_details = explode("/", $url_details);
            }
            // print_r($url_details);
            $seacrhtype = !empty($url_details[2]) ? $url_details[2] : '';
            if (isset($url_details[3]) && !empty($url_details[3])) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomStringfirst = '';
                for ($i = 0; $i < 8; $i++) {
                    $randomStringlast .= $characters[rand(0, $charactersLength - 1)];
                }
                for ($i = 0; $i < 10; $i++) {
                    $randomStringfirst .= $characters[rand(0, $charactersLength - 1)];
                }
                //echo $randomStringlast.'+++++'.$randomStringfirst.'======';

                $value             =  substr($url_details[3], 10);
                $encryptedata      =  base64_decode($value);
                $url_save_exist_id =  substr($encryptedata, 0, -8);
                $url_save_exist_id =  explode("=", $url_save_exist_id);
                $filtertype  = $url_save_exist_id[0];
                $filtervalue = $url_save_exist_id[1];
                if ($filtertype == 'id') {
                    $save_id_checked = DB::table('save_result')
                        ->select(DB::raw('*'))
                        ->where('id', $filtervalue)
                        ->first();
                    if (isset($save_id_checked) && !empty($save_id_checked)  && !empty($ranfgeofstyle)) { //die('dd');
                        DB::table('save_result')
                            ->where('id', $save_id_checked->id)
                            ->update(array('totalamt' => $price, 'rangeofcontact' => $totlacontact, 'rangeofstyle' => $ranfgeofstyle));
                    } else {
                        DB::table('save_result')
                            ->where('id', $save_id_checked->id)
                            ->update(array('totalamt' => $price, 'rangeofcontact' => $totlacontact));
                    }
                    $concatvalue = 'id=' . $filtervalue . $randomStringlast;
                    $concatvalue = $randomStringfirst . base64_encode($concatvalue);
                }
                if ($filtertype != 'id') {
                    $contacts = DB::table('ready_made_store')
                        ->select(DB::raw('*'))
                        ->where('listname', '=', $filtervalue)
                        ->first();
                    if (isset($contacts) && !empty($contacts)) {
                        $filer_ids = $contacts->allsavedata;
                        $counts = $contacts->totlacontact;
                    }

                    $filtes['joblevels'][] = $filtervalue;
                    $filter_jsondata = json_encode($filtes);
                    $country['country'][] = 'United States';
                    $contry_json_data = json_encode($country);
                    $getinsertid = $this->getlastinsertid();
                    $lastid = $getinsertid;
                    $lastidinsert = 'id=' . $lastid . $randomStringlast;
                    $concatvalue = $lastidinsert;



                    // $concatvalue ='id='.$count_save_result.$randomStringlast;
                    $concatvalue = $randomStringfirst . base64_encode($concatvalue);
                    $savedata = DB::table('save_result')->insert(array('allsavedata' => $filer_ids, 'filters' => $filter_jsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $totlacontact, 'countryfilters' => $contry_json_data, 'rangeofstyle' => $ranfgeofstyle, 'types' => $seacrhtype));
                }
            } //echo $filtertype.'==========='.$filtervalue;die;
            return response()->json(array('count' => $totlacontact, 'price' => $price, 'save_result' => $concatvalue, 'prices' => $priceen, 'counts' => $counten));
            die();
        } else {
            return response()->json('Anauthorized aceess');
            die();
        }
    }
    /**
      @@ Here set Total Price
     **/
    function getPrice($counts = NULL)
    {
        $eccryptedata = array();
        $price = 0;
        if (isset($counts) && $counts > 0) { //die('1553');
            $string = $this->randamnumbercreate();
            $eccryptedata['countencrypt'] = $string['firststring'] . base64_encode($counts . $string['firststring']);

            switch ($counts) {
                case $counts > 0       && $counts <= 549:
                    $price = 99;
                    break;
                case $counts > 549     &&  $counts <= 999:
                    $price = 0.19 * $counts;
                    break;
                case $counts >= 1000   &&  $counts <= 5000:
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
                case $counts >= 500001:
                    $price = 0.05 * $counts;
                    break;
            }
            $eccryptedata['priceencrypt'] = $string['stringlast'] . base64_encode($price . $string['stringlast']);
            $eccryptedata['price'] = number_format($price, 2);; //round($price, 2)//$price;//round($number, 2)

        }
        // $data = 'viMjAuNzlaTzhmeWVxTg==';
        // echo base64_decode($data);
        // print_r($eccryptedata);die('938');

        return $eccryptedata =  !empty($eccryptedata) ? $eccryptedata : '';
    }

    public function details(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->data)) {
                $data = DB::table('businesscontacts')->select(DB::raw('*'))->where('active', 1)->where('id', $request->data)->first();
                if (!empty($data)) {
                    $details = get_object_vars($data);

                    $email = $details['email_address'];
                    $len = strlen($email);
                    $str1 = '';
                    for ($i = 0; $i < $len; $i++) {
                        if ($i < 3 || $i > 10 && $i != ($len - 2)) {
                            $str1 .= '*';
                        } else {
                            $str1 .= $email[$i];
                        }
                    }
                    $details['email_address'] = $str1;

                    $first_name = $details['first_name'];
                    $len = strlen($first_name);
                    $str2 = '';
                    for ($i = 0; $i < $len; $i++) {
                        if ($i < 3 || $i > 5 && $i != ($len - 2)) {
                            $str2 .= '*';
                        } else {
                            $str2 .= $first_name[$i];
                        }
                    }
                    $details['first_name'] = $str2;

                    $last_name = $details['last_name'];
                    $len = strlen($last_name);
                    $str2 = '';
                    for ($i = 0; $i < $len; $i++) {
                        if ($i < 3 || $i > 5 && $i != ($len - 2)) {
                            $str2 .= '*';
                        } else {
                            $str2 .= $last_name[$i];
                        }
                    }
                    $details['last_name'] = $str2;

                    $phone_number = $details['phone_number'];
                    $len = strlen($phone_number);
                    $str4 = '';
                    for ($i = 0; $i < $len; $i++) {
                        if ($i != ($len - 1)) {
                            $str4 .= '*';
                        } else {
                            $str4 .= $phone_number[$i];
                        }
                    }
                    $details['phone_number'] = $str4;

                    $direct_phone = $details['direct_phone'];
                    $len = strlen($direct_phone);
                    $str4 = '';
                    for ($i = 0; $i < $len; $i++) {
                        if ($i != ($len - 1)) {
                            $str4 .= '*';
                        } else {
                            $str4 .= $direct_phone[$i];
                        }
                    }
                    $details['direct_phone'] = $str4;
                    // print_r($details);die('934');

                    if (!empty($details)) {

                        return response()->json(array('details' => $details));
                        die();
                    }
                }
            }
        } else { //die('1128');
            return response()->json('Anauthorized aceess');
            die();
        }
    }

    /**
    @@ Here data encrypt @@
     **/
    function randamnumbercreate()
    {
        //die('1004');
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $characters
        $charactersLength = strlen($characters);
        $randomStringfirst = '';
        $randomStringlast = '';
        $stringarray = array();

        for ($i = 0; $i < 10; $i++) {
            $randomStringfirst .= $characters[rand(0, $charactersLength - 1)];
        }
        for ($i = 0; $i < 8; $i++) {
            $randomStringlast .= $characters[rand(0, $charactersLength - 1)];
        }

        $stringarray['firststring'] = !empty($randomStringfirst) ? $randomStringfirst : '';
        $stringarray['stringlast'] = !empty($randomStringlast) ? $randomStringlast : '';
        return $stringarray;
    }
    /**
    @@ Here get last insert id of save search result @@
     **/
    function getlastinsertid()
    {
        $getlastid = DB::table('save_result')->latest('id')->first();
        if (empty($getlastid)) {
            $insertid = 1;
        } else {
            $insertid =  $getlastid->id + 1;
        }
        return $insertid > 0 ? $insertid : '';
    }
    function mail_check($name = NULL, $type = null)
    { //die('dd');
        $msg = "First line of text\nSecond line of text";
        $msg = wordwrap($msg, 70);
        mail("matainja048@gmail.com", "My subject", $msg);
    }

    /**
    @@ Here Downlad same search data@@
     **/
    public function sampleexportfile($id = null)
    {
        $userid = Session::get('user_id');
        if ($userid != '') {
            if (!empty($id)) {
                $url_save_exist = $id;
                $value             =  substr($url_save_exist, 10);
                $encryptedata      =  base64_decode($value);
                $url_save_exist_id =  substr($encryptedata, 0, -8);
                $url_save_exist_id =  explode("=", $url_save_exist_id);
                $filtertypee = $url_save_exist_id[0];
                $save_result = $url_save_exist_id[1];
            } else {
                echo "Unathorized Aceess";
            }
            if ($filtertypee === 'id') {
                $SamplesearchData  = DB::table('save_result')->select(DB::raw('*'))->where('id', $save_result)->first();
            } else {
                $SamplesearchData  = DB::table('ready_made_store')->select(DB::raw('*'))->where('listname', $save_result)->get();
            }


            if (!empty($SamplesearchData)) {
                //print_r($SamplesearchData);die('1815');
                $businesscontactsIds = json_decode($SamplesearchData->allsavedata);
                //
                if (count($businesscontactsIds) > 51) {
                    $businesscontactsIds = array_slice($businesscontactsIds, 0, 50);
                }
                $contactlist = DB::table('businesscontacts')->select(DB::raw('*'))->where('active', 1)->whereIn('id', $businesscontactsIds)->orderByRaw("RAND()")->get();
                //print_r($contactlist);die('1782');

            }

            $lineData = array();
            if (!empty($contactlist)) {
                $contactlistDetails = array();
                $array = json_decode(json_encode($contactlist), true);
                if (!empty($array)) {
                    foreach ($array as $key => $value) {
                        $employee = $value['emp_min'] . ' - ' . $value['emp_max'];
                        $Revenue = $value['rev_min'] . ' - ' . $value['rev_max'];
                        $phone_number = $value['phone_number'];
                        $phone_number = substr_replace($phone_number, "***", 2, 3);
                        $phone_number = substr_replace($phone_number, "***", 10, 4);
                        $contactlistDetails[] = array(
                            'Employee First Name' => !empty($value['first_name']) ? $this->StringtoStarsAnother($value['first_name']) : '',
                            'Employee Last Name' => !empty($value['last_name']) ? $this->StringtoStarsAnother($value['last_name']) : '',
                            'Job Title' => !empty($value['job_title']) ? $value['job_title'] : '',
                            'Employee Work Email' => !empty($value['email_address']) ? $this->String2Stars($value['email_address'], 5, -5) : '',
                            'Employee Direct Phone' => substr_replace($phone_number, "*****", 0, 5),
                            'Company Name' => !empty($value['company_name']) ? $value['company_name'] : '',
                            //'Job Level'=>!empty($value['job_level'])?$value['job_level']:'',
                            // 'Job Function'=>!empty($value['job_function'])?$value['job_function']:'',
                            'Company Website' => !empty($value['company_website']) ? $value['company_website'] : '', //
                            'Company HQ Phone' => $phone_number,
                            'Company LinkedIn URL' => !empty($value['clink']) ? $value['clink'] : '', //
                            'HQ Address1' => !empty($value['address1']) ? $value['address1'] : '',
                            'HQ Address2' => !empty($value['address2']) ? $value['address2'] : '',
                            'HQ City' => !empty($value['city']) ? $value['city'] : '',
                            'HQ State' => !empty($value['state']) ? $value['state'] : '',
                            'HQ Postal Code' => !empty($value['zipcode']) ? $value['zipcode'] : '',
                            'HQ Country' => !empty($value['country']) ? $value['country'] : '',
                            'Company Primary Industry' => !empty($value['industries']) ? $value['industries'] : '',
                            'Number of Employees' => $value['employees'],
                            'Company Revenue' => $value['revenue'],
                            'Company Ownership' => !empty($value['ownership']) ? $value['ownership'] : '',
                            'Company Business Model' => !empty($value['business_model']) ? $value['business_model'] : ''
                        );
                    }
                }
                $filename = "data_" . date('Y-m-d H:i:s') . '.csv';
                return Excel::create($filename, function ($excel) use ($contactlistDetails) {
                    $excel->sheet('mySheet', function ($sheet) use ($contactlistDetails) {
                        $sheet->fromArray($contactlistDetails);
                    });
                })->download('csv');
            }
        } else {
            echo "Unathorized Access";
        }
    }
    function String2Stars($string = '', $first = 0, $last = 0, $rep = '*')
    {
        $begin  = substr($string, 0, $first);
        $middle = str_repeat($rep, strlen(substr($string, $first, $last)));
        $end    = substr($string, $last);
        $stars  = $begin . $middle . $end;
        return $stars;
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


    public function industrysearch(Request $request)
    {
        if ($request->ajax()) {
            $industry = $request->industry;
            if ($industry != '') {
                $industries = DB::table('industries')->where('name', 'LIKE', "%{$industry}%")->get();
            } else {
                $industries = DB::table('industries')->get();
            }
            //echo "<pre>"; print_r($industries); die("===");
            return response()->json(array('industries' => $industries));
        } else {
            return response()->json('Unauthorized aceess');
            die();
        }
    }

    public function joblevelsearch(Request $request)
    {
        $parent_arr = [];
        $child_arr = [];
        $newarr = [];
        $finalArr = [];
        $parentIds = [];
        if ($request->ajax()) {
            $joblevel = $request->joblevel;
            if ($joblevel != '') {
                $joblevels = DB::table('joblevels')->where('name', 'LIKE', "%{$joblevel}%")->whereNull('deleted_at')->get();
            } else {
                $joblevels = DB::table('joblevels')->whereNull('deleted_at')->get();
            }

            //echo "<pre>"; print_r($joblevels); die("+++");

            if (count($joblevels) > 0) {
                foreach ($joblevels as $joblevel) {
                    if ($joblevel->parent_id == 0) {
                        $parent_arr[$joblevel->id] = $joblevel->name;
                    } else {
                        $parentJobLvl = DB::table('joblevels')->where('id', '=', $joblevel->parent_id)->first();
                        if (isset($parentJobLvl) && !empty($parentJobLvl)) {
                            $parent_arr[$parentJobLvl->id] = $parentJobLvl->name;
                        }
                        $child_arr[$joblevel->parent_id][] = $joblevel->name;
                    }
                }

                if (isset($parent_arr) && !empty($parent_arr)) {
                    ksort($parent_arr);
                    foreach ($parent_arr as $pkey => $pvalue) {
                        $newarr['parent'] = $pvalue;
                        $newarr['name'] = $pvalue;
                        $newarr['child'] = (isset($child_arr[$pkey]) && !empty($child_arr[$pkey])) ? $child_arr[$pkey] : [];
                        $finalArr[] = $newarr;
                    }
                }
            }
            return response()->json(array('joblevels' => $finalArr));
        } else {
            return response()->json('Unauthorized aceess');
            die();
        }
    }
    public function employeesearch(Request $request)
    {
        if ($request->ajax()) {
            $employee = $request->employee;
            if ($employee != '') {
                $employees = DB::table('employees')->where('name', 'LIKE', "%{$employee}%")->get();
            } else {
                $employees = DB::table('employees')->get();
            }
            //echo "<pre>"; print_r($cities); die("===");
            return response()->json(array('employees' => $employees));
        } else {
            return response()->json('Unauthorized aceess');
            die();
        }
    }
    public function revenuesearch(Request $request)
    {
        if ($request->ajax()) {
            $revenue = $request->revenue;
            if ($revenue != '') {
                $revenues = DB::table('revenues')->where('name', 'LIKE', "%{$revenue}%")->get();
            } else {
                $revenues = DB::table('revenues')->get();
            }
            //echo "<pre>"; print_r($cities); die("===");
            return response()->json(array('revenues' => $revenues));
        } else {
            return response()->json('Unauthorized aceess');
            die();
        }
    }
    public function countrysearch(Request $request)
    {
        if ($request->ajax()) {
            $country = $request->country;
            if ($country != '') {
                $countries = DB::table('internationals')->where('name', 'LIKE', "%{$country}%")->get();
            } else {
                $countries = DB::table('internationals')->get();
            }
            //echo "<pre>"; print_r($cities); die("===");
            return response()->json(array('countries' => $countries));
        } else {
            return response()->json('Unauthorized aceess');
            die();
        }
    }
    public function citysearch(Request $request)
    {
        if ($request->ajax()) {
            $city = $request->city;
            if ($city != '') {
                $cities = DB::table('cities')->where('name', 'LIKE', "%{$city}%")->get();
            } else {
                $cities = DB::table('cities')->get();
            }
            //echo "<pre>"; print_r($cities); die("===");
            return response()->json(array('cities' => $cities));
        } else {
            return response()->json('Unauthorized aceess');
            die();
        }
    }
    //Start function ownershipsearch
    public function ownershipsearch(Request $request)
    {
        if ($request->ajax()) {
            $ownership = $request->ownership;
            if ($ownership != '') {
                $ownerships = DB::table('ownerships')->where('name', 'LIKE', "%{$ownership}%")->get();
            } else {
                $ownerships = DB::table('ownerships')->get();
            }
            //echo "<pre>"; print_r($cities); die("===");
            return response()->json(array('ownerships' => $ownerships));
        } else {
            return response()->json('Unauthorized aceess');
            die();
        }
    }
    //End function ownershipsearch
    //Start function statesearch
    public function statesearch(Request $request)
    {
        if ($request->ajax()) {
            $state = $request->state;
            if ($state != '') {
                $states = DB::table('states')->where('name', 'LIKE', "%{$state}%")->get();
            } else {
                $states = DB::table('states')->get();
            }
            //echo "<pre>"; print_r($cities); die("===");
            return response()->json(array('state' => $states));
        } else {
            return response()->json('Unauthorized aceess');
            die();
        }
    }
    //End function statesearch
    //Start function businesssearch
    public function businesssearch(Request $request)
    {
        if ($request->ajax()) {
            $business = $request->business;
            if ($business != '') {
                $businesses = DB::table('businesses')->where('name', 'LIKE', "%{$business}%")->get();
            } else {
                $businesses = DB::table('businesses')->get();
            }
            //echo "<pre>"; print_r($cities); die("===");
            return response()->json(array('businesses' => $businesses));
        } else {
            return response()->json('Unauthorized aceess');
            die();
        }
    }
    //End function businesssearch
    //Start function yearfoundedsearch
    public function yearfoundedsearch(Request $request)
    {
        if ($request->ajax()) {
            $yearfounded = $request->yearfounded;
            if ($yearfounded != '') {
                $yearfoundeds = DB::table('yearfoundeds')->where('name', 'LIKE', "%{$yearfounded}%")->get();
            } else {
                $yearfoundeds = DB::table('yearfoundeds')->get();
            }
            //echo "<pre>"; print_r($cities); die("===");
            return response()->json(array('yearfoundeds' => $yearfoundeds));
        } else {
            return response()->json('Unauthorized aceess');
            die();
        }
    }
    //End function yearfoundedsearch
    public function jobfunctionsearch(Request $request)
    {
        $parent_arr = [];
        $child_arr = [];
        $newarr = [];
        $finalArr = [];
        $parentIds = [];
        if ($request->ajax()) {
            $jobfunction = $request->jobfunction;
            $level = $request->level;
            if ($jobfunction != '') {
                $jobfunctions = DB::table('jobtitles')->where('name', 'LIKE', "%{$jobfunction}%")->whereNull('deleted_at')->get();
            } else {
                $jobfunctions = DB::table('jobtitles')->whereNull('deleted_at')->get();
            }

            //echo "<pre>"; print_r($jobfunctions); die("+++");

            if (count($jobfunctions) > 0) {
                foreach ($jobfunctions as $jobfunction) {
                    $parent_arr[$jobfunction->id] = $jobfunction->name;
                }

                if (isset($parent_arr) && !empty($parent_arr)) {
                    ksort($parent_arr);
                    foreach ($parent_arr as $pkey => $pvalue) {
                        $newarr['parent'] = $pvalue;
                        $newarr['name'] = $pvalue;
                        $newarr['child'] = (isset($child_arr[$pkey]) && !empty($child_arr[$pkey])) ? $child_arr[$pkey] : [];
                        $newarr['level'] = $request->level;
                        $finalArr[] = $newarr;
                    }
                }
            }
            return response()->json(array('jobfunctions' => $finalArr));
        } else {
            return response()->json('Unauthorized aceess');
            die();
        }
    }
}
