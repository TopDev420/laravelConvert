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
class HealthcareController extends Controller
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
    public function index()
    {
        $country = DB::table('businesscontacts')->select('country')->whereNull('deleted_at')->get();
        //
        $countries = array();
        if (isset($country)  &&  !empty($country)) {
            foreach ($country as $key => $value) {
                $cnt = $value->country;
                if (!in_array($cnt, $countries)) {
                    array_push($countries, $cnt);
                }
            }
        }
        $healthprofessional = DB::table('healthprofessionals')->select('name')->whereNull('deleted_at')->get();

        $healthprofessionals = array();
        if (isset($healthprofessional)  && !empty($healthprofessional)) {
            foreach ($healthprofessional as $key => $value) {
                $health = $value->name;
                if (!in_array($health, $healthprofessionals)) {
                    array_push($healthprofessionals, $health);
                }
            }
        }
        return View('template.healthcare', [
            'currentid' => isset($this->user_id) ? $this->user_id : '',
            'page' => 'healthcare',
            'filter_contry' => $countries,
            'filter_specialty' => $healthprofessionals,
        ]);
    }
}
