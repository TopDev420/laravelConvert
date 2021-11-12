<?php

/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
// use Datatables
use Yajra\Datatables\Datatables;;

use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use App\Http\Controllers\SendEmailsController as SendEmails;
// use Validator;
use Illuminate\Support\Facades\Validator;
// use DB;
use Illuminate\Support\Facades\DB;

use App\Models\Organization;

class OrganizationsController extends Controller
{
    public $show_action = true;
    public $view_col = 'name';
    public $listing_cols = ['id', 'name', 'email', 'phone', 'website', 'connect_since', 'address', 'city', 'description', 'profile_image', 'profile'];

    public function __construct()
    {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Organizations', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Organizations', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the Organizations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::get('Organizations');
        if (Module::hasAccess($module->id)) {
            return View('la.organizations.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for creating a new organization.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function checkCode($code)
    {
        print_r("hello");
        exit;
        return response()->json($code);
        die();
    }

    /**
     * Store a newly created organization in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SendEmails $sendemails)
    {
        if (Module::hasAccess("Organizations", "create")) {

            $rules = Module::validateRules("Organizations", $request);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            //echo '<pre>';print_r($request->all());exit;
            $insert_id = Module::insert("Organizations", $request);
            $key = md5(microtime() . rand());
            $pur_code = uniqid() . $key;
            DB::table('organizations')->where('id', $insert_id)->update(['school_key' => $key, 'purchase_code' => $pur_code]);
            $sent = $sendemails->notifySchoolOwner($insert_id);
            //         $sent === true ? @$success .= 'Email sent to property owner/administrator.<br/>' : @$error .= 'No email sent to property owner/administrator.<br/>';
            return redirect()->route(config('laraadmin.adminRoute') . '.organizations.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified organization.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Module::hasAccess("Organizations", "view")) {

            $organization = Organization::find($id);
            if (isset($organization->id)) {
                $module = Module::get('Organizations');
                $module->row = $organization;

                return view('la.organizations.show', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('organization', $organization);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("organization"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified organization.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Module::hasAccess("Organizations", "edit")) {
            $organization = Organization::find($id);
            if (isset($organization->id)) {
                $module = Module::get('Organizations');

                $module->row = $organization;

                return view('la.organizations.edit', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                ])->with('organization', $organization);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("organization"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified organization in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Module::hasAccess("Organizations", "edit")) {

            $rules = Module::validateRules("Organizations", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }

            $insert_id = Module::updateRow("Organizations", $request, $id);

            return redirect()->route(config('laraadmin.adminRoute') . '.organizations.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified organization from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Module::hasAccess("Organizations", "delete")) {
            Organization::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.organizations.index');
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
        $values = DB::table('organizations')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Organizations');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];

                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/organizations/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("Organizations", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/organizations/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }
                $school_key = "'" . DB::table('organizations')->select('school_key')->where('id', $data->data[$i][0])->get()[0]->school_key . "'";
                if (Module::hasAccess("Organizations", "delete")) {
                    $admin_id = '';
                    $key = DB::table('admin')->select('authentication_key', 'email', 'password')->where('admin_id', $data->data[$i][0])->get();
                    $auth_key = $key[0]->authentication_key;
                    $email = $key[0]->email;
                    $password = $key[0]->password;
                    if (!empty($auth_key)) {
                        $blckclass = "btn-danger";
                        $btntext = 'Block';
                    } else {
                        $blckclass = "btn-success";
                        $btntext = 'Unblock';
                    }
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.organizations.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= ' <button class="btn btn-success btn-xs show_key" type="button" onClick="showKey(' . $school_key . ')" >View Key</button>';
                    $output .= ' <a href="http://162.144.215.8/~site4brandz/cphp/61/school/index.php?login/viewdashboard/' . $data->data[$i][0] . '" target="_blank" class="btn btn-success btn-xs" type="button">View Dasboard</a>';
                    $output .= ' <button class="btn ' . $blckclass . ' btn-xs" id="block_btn_' . $data->data[$i][0] . '" onClick="blockSchool(' . $data->data[$i][0] . ',' . $school_key . ')" type="button">' . $btntext . '</button>';
                    $output .= Form::close();
                }
                $data->data[$i][] = (string)$output;
            }
        }
        $out->setData($data);
        return $out;
    }

    /*Block School*/
    public function blockSchool(Request $request)
    {
        $action = $request->input('action');
        $id = $request->input('id');
        $key = $request->input('key');
        if ($action == 'block') {
            DB::table('admin')->where('admin_id', $id)->update(['authentication_key' => NULL]);
            return response()->json('blocked');
            die();
        } else {
            DB::table('admin')->where('admin_id', $id)->update(['authentication_key' => $key]);
            return response()->json('unblocked');
            die();
        }
        return response()->json('failed');
        die();
    }
}
