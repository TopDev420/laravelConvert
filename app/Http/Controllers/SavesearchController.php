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
class SavesecrhController extends Controller
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
        // $this->frontpages = DB::table('frontpages')->whereNull('deleted_at')->get();
        $username = Session::get('user_name');
        if (!isset($userid)) {
            return redirect("/home");
        }
        $this->user_id = $userid;
        $this->user_name = $username;

        //echo '<pre>'; print_r($this->frontpages); echo '</pre>';
    }

    /** SAVE FILTER DATA **/
    public function savesearch(Request $request)
    {
        //print_r($_POST);die;
        // $userid = $_POST['userid'];
        $listname = $_POST['listname'];
        $price = $_POST['listamnt'];
        $type = $_POST['type'];
        //$totlcontact = $_POST['totlcontact'];

        $contact = $_POST['totlcontact'];
        if (isset($_POST['url']) && !empty($_POST['url'])) {
            $urldata = $_POST['url'];
            $url = explode("/", $urldata);
            if (!empty($url)) {
                $urlSearchkey = $url[3];
                //print_r($urlSearchkey);die();
                $searchkey             =  substr($urlSearchkey, 10);
                $encrypteurldata      =  base64_decode($searchkey);
                $urlSearchtypestring  =  substr($encrypteurldata, 0, -8);
                $urlserchtypecheck = explode("=", $urlSearchtypestring);
                $filtertypee  = $urlserchtypecheck[0];
                $filtertypevalue = $urlserchtypecheck[1];
            }
        }
        $countencrypt      =  substr($contact, 10);
        $countencrypt      =  base64_decode($countencrypt);
        $totlcontact          =  substr($countencrypt, 0, -10);


        $priceencrypt      =  substr($price, 8);
        $priceencrypt      =  base64_decode($priceencrypt);
        $totalprice        =  substr($priceencrypt, 0, -8);
        $userid = isset($this->user_id) ? $this->user_id : '';
        // echo $filtertypee;die('82');
        $filterrs = array();
        $contry_json_data = array();
        $now = date('Y-m-d H:i:s');
        $response = array();
        if ($filtertypee != 'id') {
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
            if (isset($_POST['industry']) && !empty($_POST['industry'])) {
                $industries = $_POST['industry'];
            } else {
                $industries = array();
            }
            if (isset($_POST['company']) && !empty($_POST['company'])) {
                $company = $_POST['company'];
                // $filterrs['company']=$company;
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
            if (isset($_POST['joblevels']) && !empty($_POST['joblevels'])) {
                $joblevels = $_POST['joblevels'];
            } else {
                $joblevels = array();
            }
            if (isset($_POST['specialty']) && !empty($_POST['specialty'])) {
                $specialty = $_POST['specialty'];
            } else {
                $specialty = array();
            }


            if (isset($_POST['Jobfunctions']) && !empty($_POST['Jobfunctions'])) {
                $Jobfunctions = $_POST['Jobfunctions'];
            } else {
                $Jobfunctions = array();
            }
            if (isset($_POST['country']) && !empty($_POST['country'])) {
                $contry_json_data['country'] = $_POST['country'];

                $contry_json_data = json_encode($contry_json_data); //  print_r($contry_json_data);die;
            } else {
                $contry_json_data = '';
            }


            // echo $userid;die('108');
            /**IMPLODE INDUSTRY FILTER**/
            if (!empty($industries)) {
                foreach ($industries as $key => $indus) {
                    $valus[] = $indus;
                }
                $filterrs['industry'] = $valus;
                // array_push($filterrs,implode(',', $valus));
            }

            /**IMPLODE STATE FILTER**/
            if (!empty($state)) {
                foreach ($state as $key => $states) {
                    $statee[] = $states;
                }
                $filterrs['states'] = $statee;
                // array_push($filterrs,implode(',', $statee));
            }

            /**IMPLODE CITY FILTER**/
            if (!empty($city)) {
                foreach ($city as $key => $cty) {
                    $cityre[] = $cty;
                }
                $filterrs['city'] = $cityre;
                // array_push($filterrs,implode(',', $cityre));
            }
            /**IMPLODE joblevels FILTER**/
            if (!empty($joblevels)) {
                foreach ($joblevels as $key => $cty) {
                    $joblevelsr[] = $cty;
                }
                $filterrs['joblevels'] = $joblevelsr;
                // array_push($filterrs,implode(',', $cityre));
            }


            /**IMPLODE joblevels FILTER**/
            if (!empty($specialty)) {
                foreach ($specialty as $key => $cty) {
                    $specialtys[] = $cty;
                }
                $filterrs['Specialty'] = $specialtys;
                // array_push($filterrs,implode(',', $cityre));
            }

            /**IMPLODE JOB FUNCTIONS FILTER**/
            if (!empty($Jobfunctions)) {
                foreach ($Jobfunctions as $key => $cty) {
                    $Jobfunctionsr[] = $cty;
                }
                $filterrs['Jobfunctions'] = $Jobfunctionsr;
                // array_push($filterrs,implode(',', $cityre));
            }

            /**IMPLODE COMPANY NAME**/
            if (!empty($company)) {
                foreach ($company as $key => $cty) {
                    $companyr[] = $cty;
                }
                $filterrs['company'] = $companyr;
                // array_push($filterrs,implode(',', $cityre));
            }
            $range_of_contact =  !empty($_POST['range_of_contact']) ? $_POST['range_of_contact'] : '';
            $ranfgeofstyle = !empty($_POST['ranfgeofstyle']) ? $_POST['ranfgeofstyle'] : '';
            $filt = json_encode($filterrs);

            $totlcontact =  !empty($totlcontact) ? $totlcontact : '';
            $savedata = DB::table('save_result')->insert(array('userid' => $userid, 'listname' => $listname, 'allsavedata' => $results, 'filters' => $filt, 'totalamt' => $totalprice, 'totlacontact' => $totlcontact, 'rangeofcontact' => $range_of_contact, 'countryfilters' => $contry_json_data, 'savetime' => $now, 'types' => $type));
            //echo '<pre>'; print_r($savedata); exit;
            if ($savedata) {
                $response['success'] = 'seccess';
            } else {
                $response['success'] = 'error';
            }
        } else {
            $updatedata =  DB::table('save_result')
                ->where('id', $filtertypevalue)
                ->update(array('savetime' => $now, 'userid' => $userid, 'listname' => $listname, 'types' => $type));
            if ($updatedata) {
                $response['success'] = 'seccess';
            } else {
                $response['success'] = 'error';
            }
        }

        return $response;
    }

    public function removesearchdata(Request $request)
    {

        $response = array();
        $id = $request->data;

        DB::table('save_result')
            ->where('id', $id)
            ->update(['userid' => '']);

        $response['success'] = 'success';

        return $response;
    }
}
