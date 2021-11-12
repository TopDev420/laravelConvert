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
class JobController extends Controller
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

    public function joblevels_count()
    {

        $joblevel = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'joblevel') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }
        $imgid = $joblevel->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $joblevel->image = url('/') . '/storage/uploads/' . $bnr_img;
        $query =  DB::table('joblevels')->where('parent_id', '0')->whereNull('deleted_at')->get();
        //print_r($query);die('63');
        if (!empty($query)) {
            foreach ($query as $key => $value) {

                $parent_id = isset($value->id) ? $value->id : '';
                $checkifchield = DB::table('joblevels')->whereNull('deleted_at')->where('parent_id', $parent_id)->get();
                $countchild = count($checkifchield);
                //   print_r($checkifchield);

                if ($countchild > 0) {
                    $total = count($checkifchield);
                    $total = $total - 1;
                    $where = '';
                    $where .= ' (';
                    foreach ($checkifchield as $keys => $values) {
                        if ($total > $keys) {
                            $where  .=  ' job_level LIKE  ' . "'" . '%' . $values->name . '%' . "'" . ' or ';
                        } elseif ($total == $keys) {
                            $where  .= ' job_level LIKE  ' . "'" . '%' . $values->name . '%' . "' ) ";
                        }
                    }
                    // DB::enableQueryLog();
                    if (!empty($where)) {
                        $where .= ' AND deleted_at IS  NULL';
                    } else {
                        $where .= ' deleted_at IS  NULL';
                    }
                    $getcount = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="United States"  And types ="businesscontact" AND deleted_at IS  NULL AND  ' . $where);
                    $getcount = $getcount[0]->totalsecrhdata;
                } else { //die('97');
                    $getcount = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="United States" AND   types ="businesscontact" AND ( job_level LIKE "%' . $value->name . '%") AND deleted_at IS  NULL ');
                    $getcount = $getcount[0]->totalsecrhdata;
                }
                $total = $getcount;
                $newarr[] = $value;
                $newarr[$key]->count = $total;

                //$price = $this->getPrice($total);

                //$newarr[$key]->price = $price;
                //print_r($value);
                DB::table('joblevels')->where('id', $value->id)->update(array('total_count' => $getcount));
            } //die('106');
        }





        return View('template.joblevels', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'joblevel',
            'currentid' => $this->user_id,
            'query' => $query,
        ]);
    }


    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE LIST jOBLEVELS @@
     **/
    public function joblevels()
    {

        $joblevel = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'joblevel') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }
        $imgid = $joblevel->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $joblevel->image = url('/') . '/storage/uploads/' . $bnr_img;

        $query =  DB::table('joblevels')->where('parent_id', '0')->whereNull('deleted_at')->get();
        //print_r($query);die('63');
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                //print_r($value);
                //    $parent_id = isset($value->id) ? $value->id : '';
                //    $checkifchield = DB::table('joblevels')->whereNull('deleted_at')->where('parent_id',$parent_id)->get();
                //    $countchild = count($checkifchield);
                // //   print_r($checkifchield);

                //    if($countchild>0)
                //    {
                //        $total = count($checkifchield);
                //        $total=$total-1;
                //         $where ='';
                //        $where .=' (';
                //        foreach ($checkifchield as $keys => $values) {
                //            if ($total>$keys) {
                //                $where  .=  ' job_level LIKE  '."'".'%'.$values->name.'%' ."'".' or ';
                //            }  elseif($total==$keys) {
                //                $where  .= ' job_level LIKE  ' ."'".'%'.$values->name.'%'."' ) " ;
                //            }
                //        }
                //       // DB::enableQueryLog();
                //        if(!empty($where)){
                //            $where .= ' AND deleted_at IS  NULL';
                //        }else{
                //            $where .= ' deleted_at IS  NULL';
                //        }
                //        $getcount = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="United States"  And types ="businesscontact" AND deleted_at IS  NULL AND  '.$where );
                //        $getcount = $getcount[0]->totalsecrhdata;

                //    }else{//die('97');
                //        $getcount = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="United States" AND   types ="businesscontact" AND ( job_level LIKE "%'.$value->name.'%") AND deleted_at IS  NULL ' );
                //        $getcount = $getcount[0]->totalsecrhdata;

                //    }



                $total = $value->total_count;
                $newarr[] = $value;
                $newarr[$key]->count = $total;

                $price = $this->getPrice($total);
                $newarr[$key]->price = $price;
            } //die('106');
        }





        return View('template.joblevels', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'joblevel',
            'currentid' => $this->user_id,
            'query' => $query,
        ]);
    }
    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE LIST jOBFUNCTION @@
     **/
    public function jobfunctions()
    {
        $joblevel = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'joblevel') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }

        $newarr = array();

        $query =  DB::table('jobfunctions')->whereNull('deleted_at')->get();

        // print_r($query);
        if (!empty($query)) {
            foreach ($query as $key => $value) {

                $getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', 'United States')->where('job_function', 'like', '%' . $value->name . '%')->get();


                $total = count($getcount);
                $newarr[] = $value;
                $newarr[$key]->count = $total;

                $price = $this->getPrice($total);

                $newarr[$key]->price = $price;
            }
        }

        return View('template.jobfunction', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'jobfunction',
            'currentid' => $this->user_id,
            'query' => $newarr,
        ]);
    }


    public function industries_count()
    {

        $query =  DB::table('industries')->where('display_list_page', 'yes')->whereNull('deleted_at')->get();

        if (!empty($query)) {
            foreach ($query as $key => $value) {
                $where = '';

                $where = ' industries like "%' . $value->name . '%"';
                $getcount = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="United States"  And types ="businesscontact" AND deleted_at IS  NULL AND  ' . $where);

                $getcount = $getcount[0]->totalsecrhdata;

                DB::table('industries')->where('id', $value->id)->update(array('total_count' => $getcount));
            }

            return 'update complete';
        }
    }

    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE LIST INDUSTRY @@
     **/
    public function industries()
    {
        $joblevel = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'industries') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }

        $newarr = array();

        $query =  DB::table('industries')->where('display_list_page', 'yes')->whereNull('deleted_at')->get();

        // print_r($query);
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                $where = '';

                //  $getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', 'United States')->where('industries','like', '%'.$value->name.'%')->limit(20)->get();
                //print_r($getcount);die('180');
                // $where = ' industries like "%'.$value->name.'%"';
                // $getcount = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="United States"  And types ="businesscontact" AND deleted_at IS  NULL AND  '.$where );
                //     $getcount = $getcount[0]->totalsecrhdata;
                // echo $getcount;die('185');


                $total = $value->total_count;
                $newarr[] = $value;
                $newarr[$key]->count = $total;

                $price = $this->getPrice($total);

                $newarr[$key]->price = $price;
            }
        }



        //  $endtime= date("Y-m-d h:i:s");

        //         $to_time = strtotime($endtime);
        // $from_time = strtotime($starttime);
        // echo round(abs($to_time - $from_time) ). " timediff";
        // echo '+++++++'.$starttime.'+++'.$endtime;


        // die('209');

        return View('template.industries', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'industries',
            'currentid' => $this->user_id,
            'query' => $newarr,
        ]);
    }




    /**
        @@ Here set corn job of heltcare All data @@
     **/
    public function healthcare_count()
    {
        // die('332');
        $query =  DB::table('healthprofessionals')->whereNull('deleted_at')->get();
        //print_r($query);die('336');
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                $where = '';
                $where = ' job_level like "%' . $value->name . '%"';
                $getcount = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="United States"  And types ="businesshealthcare" AND deleted_at IS  NULL AND  ' . $where);

                $getcount = $getcount[0]->totalsecrhdata;

                DB::table('healthprofessionals')->where('id', $value->id)->update(array('total_count' => $getcount));
            }
        }
    }
    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE LIST HEALTHCARE @@
     **/
    public function healthcare_professionals()
    {
        $joblevel = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'industries') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }

        $newarr = array();

        $query =  DB::table('healthprofessionals')->whereNull('deleted_at')->get();

        // print_r($query);
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                $where = '';
                //$getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', 'United States')->where('industries','like', '%'.$value->name.'%')->limit(20)->get();
                //print_r($getcount);die('180');
                // $where .= ' job_level like "%'.$value->name.'%"';
                // $getcount = DB::select('select count(*) as totalsecrhdata from businesscontacts WHERE Country="United States"  And types ="businesshealthcare" AND deleted_at IS  NULL AND  '.$where );
                // $getcount = $getcount[0]->totalsecrhdata;
                $total = $value->total_count;
                $newarr[] = $value;
                $newarr[$key]->count = $total;
                $price = $this->getPrice($total);
                $newarr[$key]->price = $price;
            } //die('257');
        }
        return View('template.healthcare', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'healthcare',
            'currentid' => $this->user_id,
            'query' => $newarr,
        ]);
    }

    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE LIST INTERNATINAL @@
     **/
    public function internationals_count()
    {


        $query =  DB::table('internationals')->where('display_list_page', 'yes')->whereNull('deleted_at')->get();
        if (!empty($query)) {
            foreach ($query as $key => $value) {

                $getcount = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="' . $value->name . '" And types ="businesscontact" AND deleted_at IS  NULL');


                $getcount = $getcount[0]->totalsecrhdata;


                DB::table('internationals')->where('id', $value->id)->update(array('total_count' => $getcount));
            }
        }
    }

    public function internationals()
    {

        $joblevel = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'joblevel') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }
        $imgid = $joblevel->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $joblevel->image = url('/') . '/storage/uploads/' . $bnr_img;
        $query =  DB::table('internationals')->where('display_list_page', 'yes')->whereNull('deleted_at')->get();
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                // $getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', $value->name)->get();
                // $total = count($getcount);
                $total = $value->total_count;
                // $price = $this->getPrice($total);

                // $value->price = $price;
                $firstStringCharacter = [];
                if (!empty($value->name)) {
                    if ($value->name === 'United States') {
                        $value->slug = 'us';
                        $value->newName = 'US';
                    } else if ($value->name == 'United Kingdom') {
                        $value->slug = 'uk';
                        $value->newName = 'UK';
                    } else if ($value->name == trim($value->name) && strpos($value->name, ' ') !== false) {
                        $val = strtolower($value->name);
                        $value->slug = str_replace(" ", "-", $val);
                        $value->newName = $value->name;
                    } else {
                        $value->slug = strtolower($value->name);
                        $value->newName = $value->name;
                    }
                }

                $newarr[] = $value;
                $newarr[$key]->count = $total;

                $price = $this->getPrice($total);

                $newarr[$key]->price = $price;
            }
        }
        // print_r($newarr);
        // die('290');
        return View('template.internationals', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'joblevel',
            'currentid' => $this->user_id,
            'query' => $newarr,
        ]);
    }

    public function state_count()
    {
        $state = DB::table('states')->where('display_list_page', 'yes')->whereNull('deleted_at')->get();
        if (!empty($state)) {
            foreach ($state as $key => $value) {
                $getcount = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE state="' . $value->name . '" And types ="businesscontact" AND deleted_at IS  NULL');
                $getcount = $getcount[0]->totalsecrhdata;
                DB::table('states')->where('id', $value->id)->update(array('total_count' => $getcount));
            }
        }
    }

    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE LIST STATES @@
     **/
    public function states()
    {
        $joblevel = array();
        $where = '';
        $newarr = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'joblevel') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }
        $imgid = $joblevel->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $joblevel->image = url('/') . '/storage/uploads/' . $bnr_img;
        $state = DB::table('states')->where('display_list_page', 'yes')->whereNull('deleted_at')->get();
        // print_r($state);die('500');

        if (!empty($state)) {
            foreach ($state as $key => $value) {
                //$getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('state', $value->name)->get();
                $total = $value->total_count;
                $value->count = $total;
                $price = $this->getPrice($total);
                $value->price = $price;
                $firstStringCharacter = [];
                $newarr[] = $value;
            }
        }

        // print_r($newarr);die('346');
        return View('template.states', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'joblevel',
            'currentid' => $this->user_id,
            'query' => $newarr,
        ]);
    }

    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE LIST REAL STATE @@
     **/
    public function realestate_count()
    {

        $realestateagentdatas = DB::table('realestateagentdatas')->where('display_list_page', 'yes')->whereNull('deleted_at')->get();
        //print_r($realestateagentdatas);die('519');
        if (!empty($realestateagentdatas)) {
            foreach ($realestateagentdatas as $key => $value) {
                if ($value->name == 'Real Estate in Us') {
                    //$typesofrealstate = array('Real Estate Agent','Real Estate Broker');

                    $getcount = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="United States" And types ="realestate" AND deleted_at IS  NULL AND job_level IN ("Real Estate Agent", "Real Estate Broker")');

                    $getcount = $getcount[0]->totalsecrhdata;


                    // $getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', 'United States')->whereIn('job_level',$typesofrealstate)->get();


                    $value->slug = 'real-estate';
                } elseif ($value->name == 'Real Estate in Canada') {
                    //$typesofrealstate = array('Real Estate Agent','Real Estate Broker');

                    // $getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', 'Canada')->whereIn('job_level',$typesofrealstate)->get();

                    $getcount = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="Canada" And types ="realestate" AND deleted_at IS  NULL And job_level IN ("Real Estate Agent", "Real Estate Broker")');


                    $getcount = $getcount[0]->totalsecrhdata;
                    $value->slug = 'real-estate-1';
                } else {
                    $Name      = str_replace(',', '', $value->name);
                    $Name      = str_replace(' ', '-', $Name);
                    $stateName = explode('-Realtors-', $Name);
                    if ($stateName[0]) {
                        $getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', 'Canada')->where('state', $stateName[0])->get();
                        $getcount = count($getcount);;
                    }
                    $Name  = strtolower($Name);
                    $value->slug = $Name;
                }
                DB::table('realestateagentdatas')->where('id', $value->id)->update(array('total_count' => $getcount));
            }
        }
    }

    public function realestate()
    {
        $joblevel = array();
        $where = '';
        $newarr = array();
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'joblevel') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }
        $imgid = $joblevel->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $joblevel->image = url('/') . '/storage/uploads/' . $bnr_img;
        $realestateagentdatas = DB::table('realestateagentdatas')->where('display_list_page', 'yes')->whereNull('deleted_at')->get();
        if (!empty($realestateagentdatas)) {
            foreach ($realestateagentdatas as $key => $value) {
                //  print_r($value)  ;
                if ($value->name == 'Real Estate in Us') {
                    $value->slug = 'real-estate';
                } elseif ($value->name == 'Real Estate in Canada') {
                    $value->slug = 'real-estate-1';
                } else {
                    $Name      = str_replace(',', '', $value->name);
                    $Name      = str_replace(' ', '-', $Name);
                    $stateName = explode('-Realtors-', $Name);
                    // if($stateName[0]){
                    //     $getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', 'Canada')->where('state',$stateName[0])->get();
                    // }
                    $Name  = strtolower($Name);
                    $value->slug = $Name;
                }
                $total = $value->total_count;
                $value->count = $total;
                $value->list_text = 'list text';
                $price = $this->getPrice($total);
                $value->price = $price;
            } //die('602');

        }
        // print_r($realestateagentdatas);die('392');
        return View('template.real_estate_list', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'joblevel',
            'currentid' => $this->user_id,
            'query' => $realestateagentdatas,
        ]);
    }

    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE  DEATAILS JOBLEVEL INDIVIDUAL @@
     **/
    public function clevels($name = NULL)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomStringfirst = '';
        $randomStringlast = '';
        $getcount = array();
        $readymadelistdata = array();
        $hiddenfileds = array();
        $where = '';
        for ($i = 0; $i < 8; $i++) {
            $randomStringlast .= $characters[rand(0, $charactersLength - 1)];
        }
        for ($i = 0; $i < 10; $i++) {
            $randomStringfirst .= $characters[rand(0, $charactersLength - 1)];
        }




        $getfunctionDetails = DB::table('joblevels')->whereNull('deleted_at')->where('slug', $name)->first();
        // echo $name;
        // print_r($getfunctionDetails);die('426');


        $count_save_result = base64_encode('job_level=' . $getfunctionDetails->name . $randomStringlast);
        $count_save_result = $randomStringfirst . $count_save_result;

        $parent_id = isset($getfunctionDetails->id) ? $getfunctionDetails->id : '';

        $checkifchield = DB::table('joblevels')->whereNull('deleted_at')->where('parent_id', $parent_id)->get();
        $countchild = count($checkifchield);

        if ($countchild > 0) {
            $total = count($checkifchield);
            $total = $total - 1;
            $where .= ' (';
            foreach ($checkifchield as $key => $value) {
                if ($total > $key) {
                    $where  .=  ' job_level LIKE  ' . "'" . '%' . $value->name . '%' . "'" . ' or ';
                } elseif ($total == $key && !empty($fields)) {
                    $where  .= ' job_level LIKE  ' . "'" . '%' . $value->name . '%' . "' ) and ";
                } elseif ($total == $key) {
                    $where  .= ' job_level LIKE  ' . "'" . '%' . $value->name . '%' . "' ) ";
                }
            }
            if (!empty($where)) {
                $where .= ' AND deleted_at IS  NULL';
            } else {
                $where .= ' deleted_at IS  NULL';
            }

            $getcount = DB::select('select * from businesscontacts WHERE Country="United States" And types ="businesscontact" AND  ' . $where . ' limit 20');
            //  DB::enableQueryLog();
            $totalsecrhdata = DB::select('select count(*) as totalsecrhdata from businesscontacts WHERE Country="United States"  And types ="businesscontact" AND ' . $where);
            //$query = DB::getQueryLog();
            //  dd($query);
            $totalsecrhdata = $totalsecrhdata[0]->totalsecrhdata;
        } else {
            $getcount = DB::select('select * from businesscontacts WHERE Country="United States" AND( job_level LIKE "%' . $getfunctionDetails->name . '%") And types ="businesscontact"  AND deleted_at IS  NULL limit 20 ');
            $totalsecrhdata = DB::select('select count(*) as totalsecrhdata from businesscontacts WHERE Country="United States"  And types ="businesscontact" AND  ( job_level LIKE "%' . $getfunctionDetails->name . '%") ');
            $totalsecrhdata = $totalsecrhdata[0]->totalsecrhdata;
        }
        $total = $totalsecrhdata;
        $price = $this->getPrice($totalsecrhdata);
        $getfunctionDetails->total = $total;
        $getfunctionDetails->price = $price;
        /** HERE INSERT THE DATA IN READYMADESTORE TABLE  **/
        $readymadelistdata = $this->redaymadeliststore($getcount, 'business', $getfunctionDetails->name, 'joblevels', $price, $total);
        if (!empty($getcount)) {
            $hiddenfileds = $this->randamnumbercreate($total, $price);
            if (!empty($readymadelistdata)) {
                $hiddenfileds['types'] = $readymadelistdata->types;
                $hiddenfileds['saveid'] = $readymadelistdata->id;
            }
        }
        return View('template.clevels', [

            'page' => 'Job Level',
            'link' => $count_save_result,
            'currentid' => $this->user_id,
            'functionDetails' => $getfunctionDetails,
            'f_name' => $name,
            'readymadelistdata' => $hiddenfileds

        ]);
    }

    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE  DEATAILS JOBFUNTCION INDIVIDUAL @@
     **/
    public function jobFunctionDetails($name = NULL)
    { //die('352');
        $hiddenfileds = array();
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




        $getfunctionDetails = DB::table('jobfunctions')->whereNull('deleted_at')->where('slug', $name)->first();

        $getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', 'United States')->where('job_function', 'like', '%' . $name . '%')->get();

        $count_save_result = base64_encode('job_function=' . $getfunctionDetails->name . $randomStringlast);
        $count_save_result = $randomStringfirst . $count_save_result;
        $total = count($getcount);
        $price = $this->getPrice($total);

        $getfunctionDetails->total = $total;
        $getfunctionDetails->price = $price;
        /** HERE INSERT THE DATA IN READYMADESTORE TABLE  **/
        $readymadelistdata  =  $this->redaymadeliststore($getcount, 'business', $name, 'Jobfunctions', $price, $total);
        /****/
        if (!empty($getcount)) {
            $hiddenfileds = $this->randamnumbercreate($total, $price);
            if (!empty($readymadelistdata)) {
                $hiddenfileds['types'] = $readymadelistdata->types;
                $hiddenfileds['saveid'] = $readymadelistdata->id;
            }
        }
        return View('template.jobfunction_details', [

            'page' => 'Job Function',
            'link' => $count_save_result,
            'currentid' => $this->user_id,
            'functionDetails' => $getfunctionDetails,
            'f_name' => $name,
            'readymadelistdata' => $hiddenfileds
        ]);
    }

    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE  DEATAILS INDUSRTY INDIVIDUAL @@
     **/
    public function industriesDetails($name = NULL)
    { //die('566');


        $hiddenfileds = array();
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




        $getfunctionDetails = DB::table('industries')->whereNull('deleted_at')->where('slug', $name)->first();

        $getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', 'United States')->where('industries', 'like', '%' . $getfunctionDetails->name . '%')->limit(20)->get();
        // print_r($getcount);die('587');
        //$getcount = DB::select('select * from businesscontacts WHERE Country="United States" And types ="businesscontact" AND  '.$where.' limit 20' );
        //  DB::enableQueryLog();
        $totalsecrhdata = DB::select('select count(*) as totalsecrhdata from businesscontacts WHERE Country="United States"  And types ="businesscontact" AND industries like "%' . $getfunctionDetails->name . '%"  ');
        //print_r($totalsecrhdata);die();
        //$query = DB::getQueryLog();
        //  dd($query);
        $totalsecrhdata = $totalsecrhdata[0]->totalsecrhdata;
        $count_save_result = base64_encode('industries=' . $getfunctionDetails->name . $randomStringlast);
        $count_save_result = $randomStringfirst . $count_save_result;

        $total = $totalsecrhdata;
        $price = $this->getPrice($total);

        $getfunctionDetails->total = $total;
        $getfunctionDetails->price = $price;

        /** HERE INSERT THE DATA IN READYMADESTORE TABLE  **/
        $readymadelistdata  =  $this->redaymadeliststore($getcount, 'business', $getfunctionDetails->name, 'industry', $price, $total);
        /****/
        if (!empty($getcount)) {
            $hiddenfileds = $this->randamnumbercreate($total, $price);
            if (!empty($readymadelistdata)) {
                $hiddenfileds['types'] = $readymadelistdata->types;
                $hiddenfileds['saveid'] = $readymadelistdata->id;
            }
        }
        // print_r()

        return View('template.industries_details', [

            'page' => 'Industries',
            'link' => $count_save_result,
            'currentid' => $this->user_id,
            'functionDetails' => $getfunctionDetails,
            'f_name' => $name,
            'readymadelistdata' => $hiddenfileds

        ]);
    }

    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE  DEATAILS HEALTHACRE INDIVIDUAL @@
     **/
    public function healthcareDetails($name = NULL)
    { //die('456');
        $hiddenfileds = array();
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




        $getfunctionDetails = DB::table('healthprofessionals')->whereNull('deleted_at')->where('slug', $name)->first();

        $count_save_result = base64_encode('speciality=' . $getfunctionDetails->name . $randomStringlast);
        $count_save_result = $randomStringfirst . $count_save_result;

        // $getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', 'United States')->where('job_level','like', '%'.$name.'%')->get();
        // $getcount =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', 'United States')->where('job_level','like', '%'.$getfunctionDetails->name.'%')->limit(20)->get();
        $getcount = DB::select('select * from businesscontacts WHERE Country="United States" And types ="businesshealthcare" AND   job_level like "%' . $getfunctionDetails->name . '%"  limit 20');
        $totalsecrhdata = DB::select('select count(*) as totalsecrhdata from businesscontacts WHERE Country="United States"  And types ="businesshealthcare" AND job_level like "%' . $getfunctionDetails->name . '%"  ');
        $totalsecrhdata = $totalsecrhdata[0]->totalsecrhdata;
        $total = $totalsecrhdata;
        $price = $this->getPrice($total);

        $getfunctionDetails->total = $total;
        $getfunctionDetails->price = $price;

        /** HERE INSERT THE DATA IN READYMADESTORE TABLE  **/
        $readymadelistdata = $this->redaymadeliststore($getcount, 'healthcare', $name, 'Specialty', $price, $total);
        /****/
        if (!empty($getcount)) {
            $hiddenfileds = $this->randamnumbercreate($total, $price);
            if (!empty($readymadelistdata)) {
                $hiddenfileds['types'] = $readymadelistdata->types;
                $hiddenfileds['saveid'] = $readymadelistdata->id;
            }
        }
        return View('template.healthcare_details', [

            'page' => 'Healthcare',
            'link' => $count_save_result,
            'currentid' => $this->user_id,
            'functionDetails' => $getfunctionDetails,
            'f_name' => $name,
            'readymadelistdata' => $hiddenfileds

        ]);
    }


    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE  DEATAILS COUNTRY INDIVIDUAL @@
     **/
    public function internationalsDetails($name = null)
    {

        $hiddenfileds = array();
        $getResultCountry = array();
        if ($name != '') {
            $hiddenfileds = array();
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

            if ($name === 'us') {
                $getDetailsCountry =  DB::table('internationals')->whereNull('deleted_at')->where('name', 'United States')->first();
            } else if ($name === 'uk') {
                $getDetailsCountry =  DB::table('internationals')->whereNull('deleted_at')->where('name', 'United Kingdom')->first();
            } else {
                $name = str_replace("-", " ", $name);
                $getDetailsCountry =  DB::table('internationals')->whereNull('deleted_at')->where('name', $name)->first();
            }
            $countryname =   !empty($getDetailsCountry) ? $getDetailsCountry->name : '';
            $count_save_result = base64_encode('inter=' . $countryname . $randomStringlast);
            $count_save_result = $randomStringfirst . $count_save_result;
        }


        if (!empty($getDetailsCountry)) {
            $getResultCountry =  DB::table('businesscontacts')->whereNull('deleted_at')->where('country', $getDetailsCountry->name)->get();
            // print_r($getResultCountry);die('605');
            $total = count($getResultCountry);
            $price = $this->getPrice($total);

            $getDetailsCountry->total = $total;
            $getDetailsCountry->price = $price;
            // $getDetailsCountry->banner_desc = 'test for banner desc';
            // $getDetailsCountry->more_desc = 'test for more desc';
            // $getDetailsCountry->description = 'test for description';
            /** HERE INSERT THE DATA IN READYMADESTORE TABLE  **/
            $readymadelistdata  =  $this->redaymadeliststore($getResultCountry, 'business', $name, 'country', $price, $total);
            /****/
            if (!empty($getResultCountry)) {
                $hiddenfileds = $this->randamnumbercreate($total, $price);
                if (!empty($readymadelistdata)) {
                    $hiddenfileds['types'] = $readymadelistdata->types;
                    $hiddenfileds['saveid'] = $readymadelistdata->id;
                }
            }
        }

        // print_r($getDetailsCountry);die('644');
        return View('template.internationals_details', [

            'page' => 'Industries',
            'link' => $count_save_result,
            'currentid' => $this->user_id,
            'functionDetails' => $getDetailsCountry,
            'f_name' => $name,
            'readymadelistdata' => $hiddenfileds

        ]);
    }


    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE  DEATAILS STATE INDIVIDUAL @@
     **/
    public function statesDetails($name = null)
    {
        $hiddenfileds = array();
        $getDetailsState = array();
        if ($name != '') {
            $hiddenfileds = array();
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
            $name = str_replace("-", " ", $name);
            $getDetailsState =  DB::table('states')->whereNull('deleted_at')->where('name', $name)->first();
            // print_r($getDetailsState);die('776');
        }
        if (!empty($getDetailsState)) {
            $stateName =   !empty($getDetailsState) ? $getDetailsState->name : '';
            // $countryName = !empty($getDetailsState)?$getDetailsState->county_name:'';
            $countryName = 'United States';
            $count_save_result = base64_encode('state=' . $stateName . '&' . $countryName . $randomStringlast);
            $count_save_result = $randomStringfirst . $count_save_result;
            //$getResultState =  DB::table('businesscontacts')->whereNull('deleted_at')->where('state', $getDetailsState->name)->where('country',$countryName)->get();

            $getcount = DB::select('select * from businesscontacts WHERE  types ="businesscontact" And   state ="' . $getDetailsState->name . '"  limit 20');
            $totalsecrhdata = DB::select('select count(*) as totalsecrhdata from businesscontacts WHERE   types ="businesscontact" AND state ="' . $getDetailsState->name . '"  ');
            $totalsecrhdata = $totalsecrhdata[0]->totalsecrhdata;


            $total = $totalsecrhdata;
            $price = $this->getPrice($total);

            $getDetailsState->total = $total;
            $getDetailsState->price = $price;
            /** HERE INSERT THE DATA IN READYMADESTORE TABLE  **/
            $readymadelistdata  =  $this->redaymadeliststore($getcount, 'business', $name, 'state', $price, $total);
            /****/
            if (!empty($getDetailsState)) {
                $hiddenfileds = $this->randamnumbercreate($total, $price);
                if (!empty($readymadelistdata)) {
                    $hiddenfileds['types'] = $readymadelistdata->types;
                    $hiddenfileds['saveid'] = $readymadelistdata->id;
                }
            }
            // print_r($getDetailsState);die('743');

        }
        return View('template.states_details', [

            'page' => 'Industries',
            'link' => $count_save_result,
            'currentid' => $this->user_id,
            'functionDetails' => $getDetailsState,
            'f_name' => $name,
            'readymadelistdata' => $hiddenfileds

        ]);
    }

    /**
        @@ HERE SHOW COUNTRY LIST OF READY MADE  DEATAILS STATE INDIVIDUAL @@
     **/
    public function realestateDetails($name = null)
    {
        $hiddenfileds = array();
        $getDetailsRealState = array();
        $getcount = array();
        if ($name != '') {

            $hiddenfileds = array();
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

            if ($name == 'real-estate') {
                $typesofrealstate = array('Real Estate Agent', 'Real Estate Broke');
                $getcount = DB::select('select * from businesscontacts WHERE Country="United States" And types ="realestate" AND deleted_at IS  NULL And job_level IN ("Real Estate Agent", "Real Estate Broker")  limit 20');
                $totalsecrhdata = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="United States" And types ="realestate" AND deleted_at IS  NULL AND job_level IN ("Real Estate Agent", "Real Estate Broker")');
                $totalsecrhdata = $totalsecrhdata[0]->totalsecrhdata;

                $getDetailsRealState  =  DB::table('realestateagentdatas')->whereNull('deleted_at')->where('name', 'Real Estate in Us')->first();
            } elseif ($name == 'real-estate-1') {
                $typesofrealstate = array('Real Estate Agent', 'Real Estate Broke');
                $getcount = DB::select('select * from businesscontacts WHERE Country="Canada" And types ="realestate" AND deleted_at IS  NULL And job_level IN ("Real Estate Agent", "Real Estate Broker")  limit 20');
                $totalsecrhdata = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="Canada" And types ="realestate" AND deleted_at IS  NULL AND job_level IN ("Real Estate Agent", "Real Estate Broker")');
                $totalsecrhdata = $totalsecrhdata[0]->totalsecrhdata;
                $getDetailsRealState  =  DB::table('realestateagentdatas')->whereNull('deleted_at')->where('name', 'Real Estate in Canada')->first();
            } else {
                $stateName = explode('-realtors-', $name);
                // print_r($stateName);die('1057');
                $name = $stateName[0];
                // echo $name;die('848');
                if ($stateName[0] != '') {
                    $getcount = DB::select('select * from businesscontacts WHERE Country="Canada" And types ="realestate" AND deleted_at IS  NULL And state="' . $name . '"  limit 20');
                    $totalsecrhdata = DB::select('select count(id) as totalsecrhdata from businesscontacts WHERE Country="Canada" And types ="realestate" AND deleted_at IS  NULL And state="' . $name . '"');
                    $totalsecrhdata = $totalsecrhdata[0]->totalsecrhdata;
                    $getDetailsRealState  =  DB::table('realestateagentdatas')->whereNull('deleted_at')->where('name', 'LIKE', '%' . $name . '%')->first();
                }
            }
            // print_r($getDetailsRealState);die('852');

            $count_save_result = base64_encode('real_state=' . $name . $randomStringlast);
            $count_save_result = $randomStringfirst . $count_save_result;

            $total = $totalsecrhdata;
            $price = $this->getPrice($total);


            $getDetailsRealState->total = $total;
            $getDetailsRealState->price = $price;
            /** HERE INSERT THE DATA IN READYMADESTORE TABLE  **/
            $readymadelistdata  =  $this->redaymadeliststore($getcount, 'realestate', $name, 'state', $price, $total);
            if (!empty($getDetailsRealState)) {
                $hiddenfileds = $this->randamnumbercreate($total, $price);
                if (!empty($readymadelistdata)) {
                    $hiddenfileds['types'] = $readymadelistdata->types;
                    $hiddenfileds['saveid'] = $readymadelistdata->id;
                }
            }
            //print_r($getDetailsRealState);die('871');
            return View('template.real_estate_details', [

                'page' => 'Industries',
                'link' => $count_save_result,
                'currentid' => $this->user_id,
                'functionDetails' => $getDetailsRealState,
                'f_name' => $name,
                'readymadelistdata' => $hiddenfileds

            ]);
        }
    }


    function getPrice($counts = NULL)
    {
        if (isset($counts) && $counts > 0) {
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
        }
        return $price =  !empty($price) ? $price : 0;
    }
    /**
        @@ HERE INSERT THE DATA FOR REDAY MADE LIST @@
     **/
    function redaymadeliststore($filterdata, $type, $listname, $jsonkey, $price, $totaldata)
    {
        //print_r($filterdata);die('');
        // echo $price ;die('905');
        $filer_ids = '';
        $checkredadylist = array();
        $total = !empty($totaldata) ? $totaldata : '';
        $checkredadylist = DB::table('ready_made_store')->select(DB::raw('*'))->where('listname', '=', $listname)->first();
        if (!empty($filterdata)) {
            $filer_ids = array();
            foreach ($filterdata as $key => $value) {
                $filer_ids[] = $value->id;
            }
            $filer_ids = json_encode($filer_ids);
        }
        if (empty($checkredadylist)) {
            if ($jsonkey == 'Jobfunctions') { //die('544');
                $job_funs = DB::table('jobfunctions')->where('parent_id', 0)->where('name', $listname)->whereNull('deleted_at')->get();
                if (!empty($job_funs)) {
                    $fields[$jsonkey][] = $listname;
                    $fiter_jsondata = json_encode($fields);
                } else {
                    $job_funchild = DB::table('jobfunctions')->where('slug', $listname)->whereNull('deleted_at')->first();
                    if (!empty($job_funchild)) {
                        $job_function = DB::table('jobfunctions')->where('id', $job_funchild->parent_id)->whereNull('deleted_at')->first();
                        $fields[$jsonkey][] = $job_function->slug . '/' . $listname;
                        $fiter_jsondata = json_encode($fields);
                    }
                }
            } else {
                $fields[$jsonkey][] = $listname;

                $fiter_jsondata = json_encode($fields);
            }

            $country['country'][] = 'United States';
            $contry_json_data = json_encode($country);
            DB::table('ready_made_store')->insert(array('listname' => $listname, 'allsavedata' => $filer_ids, 'filters' => $fiter_jsondata, 'totalamt' => $price, 'totlacontact' => $total, 'rangeofcontact' => $total, 'countryfilters' => $contry_json_data, 'types' => $type));
        } else { //echo $price;die('940');
            // print_r($checkredadylist);die('537');
            DB::table('ready_made_store')->where('id', $checkredadylist->id)->update(array('allsavedata' => $filer_ids, 'totlacontact' => $total, 'rangeofcontact' => $total));
        }
        $checkredadylist = DB::table('ready_made_store')
            ->select(DB::raw('*'))
            ->where('listname', '=', $listname)
            ->first();
        return $checkredadylist;
    }
    function  randamnumbercreate($totolnumberoffilterdata, $price)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
        $eccryptedata['countencrypt'] = $randomStringfirst . base64_encode($totolnumberoffilterdata . $randomStringfirst);
        $eccryptedata['priceencrypt'] = $randomStringlast . base64_encode($price . $randomStringlast);
        return $eccryptedata;
    }
}
