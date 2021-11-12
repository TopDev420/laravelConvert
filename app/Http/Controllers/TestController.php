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
            return redirect("/home");
        }
        $this->user_id = $userid;
        $this->user_name = $username;

        //echo '<pre>'; print_r($this->frontpages); echo '</pre>';
    }
    /***BUILDLIST PAGE AND ALSO PAGE FUNCTIONALITY***/
    public function index($name = NULL, $searchkey = NULL)
    { //die('52');

        $filtertypee = '';
        $url_save_exist_id = '';
        $searchid = '';
        $dataId = '';
        $searchByJob = '';
        $where = '';
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

        if ($searchkey != '') {
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
                $contacts =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', $searchByJob)->get();
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
                    $contacts = DB::table('businesscontacts')->select(DB::raw('*'))->where('country', 'United States')->whereNull('deleted_at')->whereIn('id', json_decode($SeachByjoblevel->allsavedata))->get();
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
                    $contacts = DB::table('businesscontacts')->select(DB::raw('*'))->where('country', 'United States')->whereNull('deleted_at')->whereIn('id', json_decode($SeachByjoblevel->allsavedata))->get();
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
                $p_name =  DB::table('jobtitles')->where('name', $searchByJob)->first();
                if (isset($p_name) && !empty($p_name)) {
                    $jobfunctionparentid = $p_name->name;
                    // strtoupper($input_str);
                }
                $dataId = 'Jobfunctions'; // ''
            }
            if ($filtertypee == 'industries') { //die('184');
                // echo $searchByJob;die('183');
                $SeachByjoblevel  = DB::table('ready_made_store')->select(DB::raw('*'))->where('listname', $searchByJob)->first();
                if (!empty($SeachByjoblevel->allsavedata)) {
                    $contacts = DB::table('businesscontacts')->select(DB::raw('*'))->where('country', 'United States')->whereNull('deleted_at')->whereIn('id', json_decode($SeachByjoblevel->allsavedata))->get();
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
                    $contacts = DB::table('businesscontacts')->select(DB::raw('*'))->where('country', 'United States')->whereNull('deleted_at')->whereIn('id', json_decode($SeachByjoblevel->allsavedata))->get();
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
                    $contacts = DB::table('businesscontacts')->select(DB::raw('*'))->where('country', 'United States')->whereNull('deleted_at')->whereIn('id', json_decode($SeachByjoblevel->allsavedata))->get();
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

            $contacts =  DB::table('businesscontacts')->whereIn('id', $save_id_exp)->get();
        } else {

            if ($filtertypee != '') {
                if ($filtertypee == 'id') { //die('113');
                    $savesearchid = $url_save_exist_id;
                    $serchinfo = DB::table('save_result')->where('id', $url_save_exist_id)->first();
                    // print_r($serchinfo);die('115');
                    if (!empty($serchinfo)) {
                        $save_id = json_decode($serchinfo->allsavedata);
                        $save_id_Counts = count($save_id); //echo $save_id_Counts;die('347');
                        if ($save_id_Counts > 20) {
                            $save_id = array_slice($save_id, 0, 20);
                        } //print_r($save_id);die('350');
                        $save_filter = $serchinfo->filters; //filtersexclude
                        $save_filter_exp = json_decode($save_filter, true);
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
                    $contacts =  DB::table('businesscontacts')->whereIn('id', $save_id)->get();
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
                        $contacts = DB::table('businesscontacts')->select(DB::raw('*'))->where('country', 'United States')->where($sql_key, 'like', '%' . $searchByJob . '%')->get();
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
                if ($name == 'healthcare') {
                    $types = 'businesshealthcare';
                } elseif ($name == 'business') {
                    $types = 'businesscontact';
                } else if ($name == 'real_estate') {
                    $types = 'realestate';
                }

                $where = 'types ="' . $types . '"  and country ="United States" limit 0,20';
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
                    if ($i < 3 || $i > 10 && $i != ($len - 2)) {
                        $str1 .= '*';
                    } else {
                        $str1 .= $email[$i];
                    }
                }
                $contacts[$key]->email_address = $str1;

                // Replace string in Last Name
                $first_name = $contact->first_name;
                $len = strlen($first_name);
                $str2 = '';
                for ($i = 0; $i < $len; $i++) {
                    if ($i < 3 || $i > 5 && $i != ($len - 2)) {
                        $str2 .= '*';
                    } else {
                        $str2 .= $first_name[$i];
                    }
                }
                $contacts[$key]->first_name = $str2;
                // Replace string in Company Name
                $phone_number = $contact->phone_number;
                $phone_number = substr_replace($phone_number, "***", 2, 3);
                $phone_number = substr_replace($phone_number, "***", 10, 4);
                $contacts[$key]->phone_number = $phone_number;
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
        $job_funs = DB::table('jobtitles')->whereNull('deleted_at')->get();
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
        } else if ($name == 'business') {

            $pageName = 'template.buildlist';
        } else if ($name == 'real_estate') {

            $pageName = 'template.real_estate';
        }
        // echo $readymadelisids;die('605');
        // print_r($contacts);die('664');
        return View($pageName, [
            'frontpages' => $this->frontpages,
            'buildlist' => $buildlist,
            'currentid' => isset($this->user_id) ? $this->user_id : '',
            'username' => isset($this->user_name) ? $this->user_name : '',
            'page' => 'buildlist',
            'business_contacts' => $contacts,
            'filter_indus' => $indus,
            'filter_contry' => $countries,
            'filter_state' => $stat,
            'filter_city' => $cities,
            'filter_data' => $save_filter_exp,
            // 'filter_jobs'=>$job_levels,
            // 'filter_jobfuns'=>$job_functions,
            'filter_healthprofessionals' => $healthprofessionals,
            'function_array' => $function_array,
            'joblevel_array' => $joblevel_array,
            'total_contacts' => isset($total_contacts) ? $total_contacts : '',
            'range_of_contact' => isset($range_of_contact) ? $range_of_contact : '',
            /** RANGE OF STELCTED IN SLIDER **/
            'range_of_contact_count' => isset($totlacontact) ? $totlacontact : '',
            /**RANGE OF TOTAL FILTER DATA**/
            'price' => isset($price) ? $price : '',
            'rangeofstyle' => isset($rangeofstyle) ? $rangeofstyle : '',
            'countryfilters' => isset($countryfilters) ? $countryfilters : '',
            'searchByJob' => isset($searchByJob) ? $searchByJob : '',
            'savesearchid' => isset($savesearchid) ? $savesearchid : '',
            'dataId' => isset($dataId) ? $dataId : '',
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
        ]);
    }

    /**
        @@ BUILDLIST FILTERS FUNCTIONALITY @@
     **/
    public function filter(Request $request)
    {
        $fields = $request->data;
        $filedsexclude = $request->dataexclude;
        // print_r($filedsexclude);die('568');
        $ranges = $request->range;
        $final_indus = array();
        $fieldsexclude = array();
        $where_industries = '';
        $where_company = '';
        $where_fields = '';
        $where = '';
        $contry_json_data = array();
        $industries_count = 0;
        $if_exist = 1;
        $flag = 0;
        $randomStringfirst = '';
        $randomStringlast = '';
        $lastid = '';
        $Specialty = array();
        $nodatafound = 0;

        if (isset($fields) && !empty($fields)) {
            if (isset($fields['url_details']) && !empty($fields['url_details'])) {
                $url_save_result = $fields['url_details'];
                unset($fields['url_details']);
            }
            if (isset($fields['sample']) && !empty($fields['sample'])) {/*Run Example for secrh*/
                $sample = $fields['sample'];
                unset($fields['sample']);
            }
            if (isset($fields['Employe_range']) && !empty($fields['Employe_range'])) {
                $Employee_ranges = $fields['Employe_range'];
                unset($fields['Employe_range']);
            }
            if (isset($fields['Revenue_range']) && !empty($fields['Revenue_range'])) {
                $Revenue_range = $fields['Revenue_range'];
                unset($fields['Revenue_range']);
            }
        }

        /*Validation check for employee range and add to filter query*/
        if (isset($ranges) && !empty($ranges)) { //print_r($ranges);die;

            if (!empty($ranges['first_range']) && !empty($ranges['second_range']) && !empty($fields)) {
                $where .= 'emp_min>= ' . "" . (int)$ranges['first_range'] . "" . ' and emp_max<=' . "" . (int)$ranges['second_range'] . "" . ' and ';

                $Employee = '' . $ranges['first_range'] . '-' . $ranges['second_range'];
            } elseif (!empty($ranges['first_range']) && !empty($ranges['second_range']) && empty($fields)) {
                $where .= 'emp_min>= ' . "" . $ranges['first_range'] . "" . ' and emp_max<=' . "" . $ranges['second_range'] . "" . ' ';

                $Employee = ':' . $ranges['first_range'] . '-' . $ranges['second_range'];
            } elseif (!empty($ranges['first_range']) && empty($ranges['second_range']) && !empty($fields)) {
                $where .= 'emp_min>= ' . "" . $ranges['first_range'] . "" . ' and emp_max<=1000000000 and ';

                $Employee = '' . $ranges['first_range'] . '- 1000000000';
            } elseif (!empty($ranges['first_range']) && empty($ranges['second_range']) && empty($fields)) {
                $where .= 'emp_min>= ' . "'" . $ranges['first_range'] . "'" . ' and emp_max<=1000000000 ';

                $Employee = '' . $ranges['first_range'] . '- 1000000000';
            } elseif (empty($ranges['first_range']) && !empty($ranges['second_range']) && !empty($fields)) {
                $where .= 'emp_min>="0" and   emp_max<= ' . "" . $ranges['second_range'] . "" . ' and ';

                $Employee = '0-' . $ranges['second_range'];
            } elseif (empty($ranges['first_range']) && !empty($ranges['second_range']) && empty($fields)) {
                $where .= 'emp_min>="0"  and emp_max<= ' . "" . $ranges['second_range'] . "" . '  ';

                $Employee = ' 0-' . $ranges['second_range']; //$fields['Employee'][0]
            }
            /**FOR REVEENUR**/


            if (!empty($ranges['first_revenue']) && !empty($ranges['second_revenue']) && !empty($fields)) {
                $where .= 'rev_min>= ' . "" . $ranges['first_revenue'] . "" . ' and rev_max<=' . "" . $ranges['second_revenue'] . "" . ' and ';

                $Revenue = '' . $ranges['first_revenue'] . '-' . $ranges['second_revenue'];
            } elseif (!empty($ranges['first_revenue']) && !empty($ranges['second_revenue']) && empty($fields)) {
                $where .= 'rev_min>= ' . "'" . $ranges['first_revenue'] . "" . ' and rev_max<=' . "" . $ranges['second_revenue'] . "'" . ' ';

                $Revenue = ':' . $ranges['first_revenue'] . '-' . $ranges['second_revenue'];
            } elseif (!empty($ranges['first_revenue']) && empty($ranges['second_revenue']) && !empty($fields)) {
                $where .= 'rev_min>= ' . "'" . $ranges['first_revenue'] . "'" . ' and rev_max<="1000000000" and ';

                $Revenue = '' . $ranges['first_revenue'] . '- 1000000000';
            } elseif (!empty($ranges['first_revenue']) && empty($ranges['second_revenue']) && empty($fields)) {
                $where .= 'rev_min>= ' . "'" . $ranges['first_revenue'] . "'" . ' and rev_max<="1000000000" ';

                $Revenue = '' . $ranges['first_revenue'] . '- 1000000000';
            } elseif (empty($ranges['first_revenue']) && !empty($ranges['second_revenue']) && !empty($fields)) {
                $where .= 'rev_min>="0" and   rev_max<= ' . "'" . $ranges['second_revenue'] . "'" . ' and ';

                $Revenue = '0-' . $ranges['second_revenue'];
            } elseif (empty($ranges['first_revenue']) && !empty($ranges['second_revenue']) && empty($fields)) {
                $where .= 'rev_min>="0"  and rev_max<= ' . "'" . $ranges['second_revenue'] . "'" . '  ';

                $Revenue = ' 0-' . $ranges['second_revenue']; //$fields['Employee'][0]
            }
            $flag = 1;
        }

        /*Validation check for employee job_level for exclude and  add to filter query*/
        if (isset($fields['job_level_exclude']) && !empty($fields['job_level_exclude'])) {
            $job_level_exclude = $fields['job_level_exclude'];
            $fieldsexclude['joblevels'] = $job_level_exclude;
            unset($fields['job_level_exclude']);
            if (!empty($job_level_exclude)) {
                $total = count($job_level_exclude);
                $total = $total - 1;
                $where .= '( ';
                foreach ($job_level_exclude as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' job_level NOT LIKE  ' . "'" . '%' . $value . '%' . "'" . ' and ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' job_level NOT LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' job_level NOT LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                    }
                }
            }
            $flag = 1;
        }

        /*Validation check for employee industries for exclude and  add to filter query*/
        if (isset($fields['industries_exclude']) && !empty($fields['industries_exclude'])) {
            $industries_exclude = $fields['industries_exclude'];
            $fieldsexclude['industry'] = $industries_exclude;
            unset($fields['industries_exclude']);
            if (!empty($industries_exclude)) {
                $total = count($industries_exclude);
                $total = $total - 1;
                $where .= '( ';
                foreach ($industries_exclude as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' industries NOT LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' industries NOT LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' industries NOT LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                    }
                }
            }
            $flag = 1;
        }

        /*Validation check for employee state for exclude and  add to filter query*/
        if (isset($fields['state_exclude']) && !empty($fields['state_exclude'])) {
            $state_exclude = $fields['state_exclude'];
            $fieldsexclude['state'] = $state_exclude;
            unset($fields['state_exclude']);
            $value = implode("','", $state_exclude);
            $value = "'" . $value . "'";
            // $where .='(';
            if (!empty($fields)) {
                $where .= 'state  NOT IN (' . $value . ')   and ';
            } else {
                $where .= 'state  NOT IN (' . $value . ')  ';
            }
            $flag = 1;

            // echo $where;die('762');
        }

        /*Validation check for employee company_name for exclude and  add to filter query*/
        if (isset($fields['company_name_exclude']) && !empty($fields['company_name_exclude'])) {
            $company_name_exclude = $fields['company_name_exclude'];
            $fieldsexclude['company'] = $company_name_exclude;
            unset($fields['company_name_exclude']);
            if (!empty($company_name_exclude)) {
                $total = count($company_name_exclude);
                $total = $total - 1;
                $where .= '( ';
                foreach ($company_name_exclude as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' company_name NOT LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' company_name NOT LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' company_name NOT LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                    }
                }
            }
            $flag = 1;
        }

        /*Validation check for employee city for exclude and  add to filter query*/
        if (isset($fields['city_exclude']) && !empty($fields['city_exclude'])) {
            $city_exclude = $fields['city_exclude'];
            $fieldsexclude['city'] = $city_exclude;
            unset($fields['city_exclude']);
            $value = implode("','", $city_exclude);
            $value = "'" . $value . "'";
            // $where .='(';
            if (!empty($fields)) {
                $where .= 'city  NOT IN (' . $value . ')   and ';
            } else {
                $where .= 'city  NOT IN (' . $value . ')  ';
            }
            $flag = 1;
        }

        /*Validation check for employee Specialty for exclude and  add to filter query*/
        if (isset($fields['Specialty_exclude']) && !empty($fields['Specialty_exclude'])) {
            $Specialty_exclude = $fields['Specialty_exclude'];
            $fieldsexclude['Specialty'] = $Specialty_exclude;
            unset($fields['Specialty_exclude']);
            if (!empty($Specialty_exclude)) {
                $total = count($Specialty_exclude);
                $total = $total - 1;
                $where .= '( ';
                foreach ($Specialty_exclude as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' job_level  NOT  LIKE  ' . "'" . '%' . $value . '%' . "'" . ' and ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' job_level NOT  LIKE  ' . "'" . '%' . $value . '%' . "' ) and  ";
                    } elseif ($total == $key) {
                        $where  .= ' job_level NOT LIKE  ' . "'" . '%' . $value . '%' . "'  ) '";
                    }
                }
            }

            // $healthprofessional = DB::table('healthprofessionals')->select('name')->whereNull('deleted_at')->get();
            // if(!empty($healthprofessional)){
            //     $i=0;
            //     $array = json_decode(json_encode($healthprofessional), true);
            //     $specialityhelatharr = array();
            //     foreach ($array as $key => $value) {
            //             if (!in_array($value['name'], $Specialty_exclude)){
            //               $specialityhelatharr[$i]=$value['name'];
            //               $i++;
            //             }
            //     }
            //     // print_r($specialityhelatharr);die('818');
            // }
            // if( isset($specialityhelatharr) && !empty($specialityhelatharr) ) {
            //        $total = count($specialityhelatharr);
            //        $total=$total-1;
            //        $where .='( ';
            //         foreach ($specialityhelatharr as $key => $value) {
            //             if($total>$key ){
            //                 $where  .=  ' job_level LIKE  '."'".'%'.$value.'%' ."'".' or ';
            //             } elseif($total==$key && !empty($fields) ) {
            //                 $where  .= ' job_level LIKE  ' ."'".'%'.$value.'%'."' ) and" ;

            //             } elseif($total==$key ) {
            //                 $where  .= ' job_level LIKE  ' ."'".'%'.$value.'%'."'  )" ;

            //             }
            //         }

            //     }else{
            //        $nodatafound=1;
            //     }
            $flag = 1;
        }
        /*Validation check for employee Contact for exclude and  add to filter query*/
        if (isset($fields['Contact_exclude']) && !empty($fields['Contact_exclude'])) {
            $Contact_exclude = $fields['Contact_exclude'];
            $fieldsexclude['Contact'] = $Contact_exclude;
            unset($fields['Contact_exclude']);
            $value = implode("','", $Contact_exclude);
            $value = "'" . $value . "'";
            if (!empty($fields)) {
                $where .= 'job_level  NOT IN (' . $value . ')  and types="realestate" and ';
            } else {
                $where .= 'job_level  NOT IN (' . $value . ') and types="realestate"  ';
            }
            $flag = 1;
        }

        /*Validation check for employee zipcode for exclude and  add to filter query*/
        if (isset($fields['zipcode_exclude']) && !empty($fields['zipcode_exclude'])) {
            $zipcode_exclude = $fields['zipcode_exclude'];
            $fieldsexclude['zipcode'] = $zipcode_exclude;
            unset($fields['zipcode_exclude']);
            if (isset($zipcode_exclude) && !empty($zipcode_exclude)) {
                $total = count($zipcode_exclude);
                $total = $total - 1;
                $where .= '( ';
                foreach ($zipcode_exclude as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' zipcode !="' . $value . '" and ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' zipcode !="' . $value . '") and ';
                    } elseif ($total == $key) {
                        $where  .= ' zipcode !="' . $value . '" )';
                    }
                }
            }
        }


        /*Validation check for employee job_function for exclude and  add to filter query*/
        if (isset($fields['job_function_exclude']) && !empty($fields['job_function_exclude'])) {
            $job_function_excludes = $fields['job_function_exclude'];
            $job_function_exclude = $fields['job_function_exclude'];
            $fieldsexclude['Jobfunctions'] = $job_function_excludes;
            unset($fields['job_function_exclude']);
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
                        $where  .=  ' job_function NOT LIKE  ' . "'" . '%' . $value . '%' . "'" . ' and ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' job_function NOT LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' job_function NOT LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                    }
                }
            }
            $flag = 1;
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
        if (isset($fields['job_function']) && !empty($fields['job_function'])) {
            $job_functions = $fields['job_function'];
            $job_function = $fields['job_function'];

            // ** REMOVE PARENT JOB FUNCTION IN THIS SECTION **//
            foreach ($job_functions as $key => $value) {
                if (strpos($value, '/') !== false) {
                    $value = explode("/", $value);

                    $job_function[$key] = $value[1];
                }
            }
            //$flag=1;
            unset($fields['job_function']);
            if (isset($job_function) && !empty($job_function)) {
                $total = count($job_function);
                $total = $total - 1;
                $where .= '( ';
                foreach ($job_function as $key => $value) {
                    if ($total > $key) {
                        $where  .=  ' job_function LIKE  ' . "'" . '%' . $value . '%' . "'" . ' or ';
                    } elseif ($total == $key && !empty($fields)) {
                        $where  .= ' job_function LIKE  ' . "'" . '%' . $value . '%' . "' ) and ";
                    } elseif ($total == $key) {
                        $where  .= ' job_function LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                    }
                }
            }
            $flag = 1;
        }

        /*Validation check for employee job_level and add to filter query*/
        if (isset($fields['job_level']) && !empty($fields['job_level'])) { //die('1108');
            $job_levels = $fields['job_level'];
            $job_level = $fields['job_level'];
            unset($fields['job_level']);
            $where .= '(';
            /** REMOVE PARENT JOBLEVEL FOR CHILD  **/
            foreach ($job_level as $key => $value) {
                if (strpos($value, '/') !== false) {
                    $value = explode("/", $value);
                    $job_level[$key] = $value[1];
                }

                $parent_id = DB::table('joblevels')->select(DB::raw('*'))->whereNull('deleted_at')->where('parent_id', '=', 0)->where('name', $value)->first();

                if (!empty($parent_id)) {
                    $checkifchield =  DB::table('joblevels')->select(DB::raw('*'))->whereNull('deleted_at')->where('parent_id', $parent_id->id)->get();
                    if (!empty($checkifchield)) {
                        $total = count($checkifchield);
                        $total = $total - 1;
                        $where .= '( ';
                        foreach ($checkifchield as  $key1 => $value1) {
                            if ($total > $key1) {
                                $where  .=  ' job_level LIKE  ' . "'" . '%' . $value1->name . '%' . "'" . ' or ';
                            } elseif ($total == $key1) {
                                $where  .= ' job_level LIKE  ' . "'" . '%' . $value1->name . '%' . "' ) or ";
                            }
                            unset($checkifchield[$key1]);
                        }
                    }    //print_r($checkifchield);die('1081');
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
                    } elseif ($total == $count) {
                        $where  .= ' job_level LIKE  ' . "'" . '%' . $value . '%' . "'  )";
                    }
                    $count++;
                }
            }
            $where .= ')';
            if (!empty($fields)) {
                $where .= ' and ';
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
                unset($fields['industries']);
            }
            $flag = 1;
        }

        /*Here add Secrhtype*/
        if (isset($fields['types']) && !empty($fields['types'])) {
            $pagetype = $fields['types'];
            unset($fields['types']);
            // $where .= '(';
            if (!empty($pagetype) && !empty($fields)) {
                $where  .= ' types ="' . $pagetype . '"   and ';
            } else {
                $where  .= ' types ="' . $pagetype . '" ';
            }
        }

        /*Validation check for employee company_name and  add to filter query*/
        if (!empty($fields['company_name']) && !empty($fields['company_name'])) {
            $company_name = $fields['company_name'];
            // $fields['company'] = $fields['company_name'];

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
        if (!empty($fields['zipcode']) && !empty($fields['zipcode'])) {
            $zipcode = $fields['zipcode'];
            unset($fields['zipcode']);
            if (!empty($zipcode) && !empty($fields)) {
                $where  .= ' zipcode like "%' . $zipcode[0] . '%"   and ';
            } else {
                $where  .= ' zipcode like "%' . $zipcode[0] . '%" ';
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



        if (isset($fields['country']) && !empty($fields['country'])) {

            $contry_json_data['country'] = $fields['country'];
            $contry_json_data = json_encode($contry_json_data);
            unset($fields['country']);
        }
        if (!empty($zipcode)) {
            $fields['zipcode'] = $zipcode;
        }
        if (!empty($job_functions)) {
            $fields['Jobfunctions'] = $job_functions;
        }
        if (!empty($job_levels)) {
            $fields['joblevels'] = $job_levels;
        }
        if (!empty($industries)) {
            $fields['industry'] = $industries;
        }
        if (!empty($company_name)) {
            $fields['company'] = $company_name;
        }
        if (!empty($Employee)) {
            $fields['Employee'][0] = $Employee;
        }
        if (!empty($Employee_ranges)) {
            $fields['Employee_ranges'][0] = $Employee_ranges[0];
        }
        if (!empty($Revenue_range)) {
            $fields['Revenue_range'][0] = $Revenue_range[0];
        }
        if (isset($Specialty) && !empty($Specialty)) {
            $fields['Specialty'] = $Specialty;
        }
        if (isset($Revenue) && !empty($Revenue)) {
            $fields['Revenue'][0] = $Revenue;
        }
        if (isset($Contact) && !empty($Contact)) {
            $fields['Contact'] = $Contact;
        }
        /**HERE INSERT ALL SEARCH FILEDS**/
        if (isset($fields) && !empty($fields)) {
            $fiter_jsondata = json_encode($fields);
        }
        if (isset($fieldsexclude) && !empty($fieldsexclude)) {
            $fieldsexcludejsondata = json_encode($fieldsexclude);
        }
        if (isset($where) && !empty($where)) { //echo $where;die('1329');

            $final_result = DB::select('select * from businesscontacts where ' . $where . '  LIMIT  20');
            //DB::enableQueryLog();
            $id_result = DB::select('select count(id) as total_ids from businesscontacts where ' . $where);
            //print_r($id_result);die('1319');
            //  $query = DB::getQueryLog();
            // dd($query);
        } else {
            $final_result = array();
        }

        if (isset($fields) && !empty($fields)) {
            foreach ($fields as $field => $value) {
                if (is_array($value) && $field == 'industries') {
                    array_shift($value);
                    $result =  array_values($value);
                }
            }
        }

        $counts = 0;
        if (isset($final_result) && !empty($final_result)) {
            $flag = 1;
            $counts = $id_result[0]->total_ids; //echo $counts;die('1338');
            $filer_ids = array();
            foreach ($final_result as $key => $value) {
                $filer_ids[] = $value->id;
            }
            //$filer_ids =  implode(",",$filer_ids);
            $filer_ids = json_encode($filer_ids);
            // print_r(json_decode($filer_ids));die('1336');
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
            for ($i = 0; $i < 8; $i++) {
                $randomStringlast .= $characters[rand(0, $charactersLength - 1)];
            }
            for ($i = 0; $i < 10; $i++) {
                $randomStringfirst .= $characters[rand(0, $charactersLength - 1)];
            }
        }
        //echo $randomString;die;
        /*Validation check for url slug and after filtering save data in save_result table*/
        if (isset($url_save_result) && !empty($url_save_result)) {
            $url_save_result = explode("/", $url_save_result);
        }
        $seacrhtype = !empty($url_save_result[2]) ? $url_save_result[2] : '';
        $concatvalue =  !empty($concatvalue) ? $concatvalue : '';
        $price_incr =  !empty($price_incr) ? $price_incr : '';
        $price_incr =  !empty($price_incr) ? $price_incr : '';
        $fiter_jsondata =  !empty($fiter_jsondata) ? $fiter_jsondata : '';
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
                        ->update(array('allsavedata' => $filer_ids, 'filtersexclude' => $fieldsexcludejsondata, 'filters' => $fiter_jsondata, 'totalamt' => $price_incr, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'rangeofstyle' => ''));
                } else {
                    $getinsertid = $this->getlastinsertid();
                    $lastid = $getinsertid;
                    $lastidinsert = 'id=' . $lastid . $randomStringlast;
                    $concatvalue = $lastidinsert;
                    $savedata = DB::table('save_result')->insert(array('allsavedata' => $filer_ids, 'filters' => $fiter_jsondata, 'filtersexclude' => $fieldsexcludejsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'types' => $seacrhtype));
                }
            } else {
                $savedata = DB::table('save_result')->insert(array('allsavedata' => $filer_ids, 'filtersexclude' => $fieldsexcludejsondata, 'filters' => $fiter_jsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'types' => $seacrhtype));
            }
        } else if (/*$flag==0 &&  */isset($sample) && $sample == 1) {
            /*Sample for Run example if url encode value not exist*/
            $counts = 0;
            $price = false;
            $priceen = false;
            $counten = 0;
            $pagetype = !empty($pagetype) ? $pagetype : '';
            $final_result = DB::table('businesscontacts')
                ->select(DB::raw('*'))
                ->where('country', 'United States')
                ->where('types', $pagetype)
                ->limit(20)
                ->get();
        } else if ($flag == 1 && empty($sample) && !empty($filer_ids)) {
            $savedata = DB::table('save_result')->insert(array('allsavedata' => $filer_ids, 'filtersexclude' => $fieldsexcludejsondata, 'filters' => $fiter_jsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'types' => $seacrhtype)); //,'types'=>
        } else if ($flag == 1 && empty($sample) && empty($filer_ids)) {
            $savedata = DB::table('save_result')->insert(array('allsavedata' => '', 'filtersexclude' => $fieldsexcludejsondata, 'filters' => $fiter_jsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $counts, 'countryfilters' => $contry_json_data, 'types' => $seacrhtype));
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
                $final_result[$key]->last_name = $str2;
                // Replace string in Company Name
                $phone_number = $contact->phone_number;
                $phone_number = substr_replace($phone_number, "***", 2, 3);
                $phone_number = substr_replace($phone_number, "***", 10, 4);
                $final_result[$key]->phone_number = $phone_number;
            }
        }
        return response()->json(array('result' => $final_result, 'count' => $counts, 'counts' => $counten, 'price' => $price, 'prices' => $priceen, 'save_result' => $concatvalue, 'lastid' => $lastid));
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
                    $fiter_jsondata = json_encode($filtes);
                    $country['country'][] = 'United States';
                    $contry_json_data = json_encode($country);
                    $getinsertid = $this->getlastinsertid();
                    $lastid = $getinsertid;
                    $lastidinsert = 'id=' . $lastid . $randomStringlast;
                    $concatvalue = $lastidinsert;



                    // $concatvalue ='id='.$count_save_result.$randomStringlast;
                    $concatvalue = $randomStringfirst . base64_encode($concatvalue);
                    $savedata = DB::table('save_result')->insert(array('allsavedata' => $filer_ids, 'filters' => $fiter_jsondata, 'totalamt' => $price, 'totlacontact' => $counts, 'rangeofcontact' => $totlacontact, 'countryfilters' => $contry_json_data, 'rangeofstyle' => $ranfgeofstyle, 'types' => $seacrhtype));
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
                $data = DB::table('businesscontacts')->select(DB::raw('*'))->where('id', $request->data)->first();
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
                $contactlist = DB::table('businesscontacts')->select(DB::raw('*'))->whereIn('id', $businesscontactsIds)->orderByRaw("RAND()")->get();
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
                $joblevels = DB::table('joblevels')->where('name', 'LIKE', "%{$joblevel}%")->get();
            } else {
                $joblevels = DB::table('joblevels')->get();
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

    public function jobfunctionsearch(Request $request)
    {
        $parent_arr = [];
        $child_arr = [];
        $newarr = [];
        $finalArr = [];
        $parentIds = [];
        if ($request->ajax()) {
            $jobfunction = $request->jobfunction;
            if ($jobfunction != '') {
                $jobfunctions = DB::table('jobfunctions')->where('name', 'LIKE', "%{$jobfunction}%")->get();
            } else {
                $jobfunctions = DB::table('jobfunctions')->get();
            }

            //echo "<pre>"; print_r($jobfunctions); die("+++");

            if (count($jobfunctions) > 0) {
                foreach ($jobfunctions as $jobfunction) {
                    if ($jobfunction->parent_id == 0) {
                        $parent_arr[$jobfunction->id] = $jobfunction->name;
                    } else {
                        $parentJobFn = DB::table('jobfunctions')->where('id', '=', $jobfunction->parent_id)->first();
                        if (isset($parentJobFn) && !empty($parentJobFn)) {
                            $parent_arr[$parentJobFn->id] = $parentJobFn->name;
                        }
                        $child_arr[$jobfunction->parent_id][] = $jobfunction->name;
                    }
                }

                if (isset($parent_arr) && !empty($parent_arr)) {
                    ksort($parent_arr);
                    foreach ($parent_arr as $pkey => $pvalue) {
                        $newarr['parent'] = $pvalue;
                        $newarr['child'] = (isset($child_arr[$pkey]) && !empty($child_arr[$pkey])) ? $child_arr[$pkey] : [];
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
