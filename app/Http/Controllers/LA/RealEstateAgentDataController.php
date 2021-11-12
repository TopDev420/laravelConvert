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
use Input;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
// use Validator;
use Illuminate\Support\Facades\Validator;
// use DB;
use Illuminate\Support\Facades\DB;

use App\Models\RealEstateAgentdata;

class RealEstateAgentDataController extends Controller
{
    public $show_action = true;
    public $view_col = 'name';
    public $listing_cols = ['id', 'name', 'description', 'price'];

    public function __construct()
    {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('RealEstateAgentdatas', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('RealEstateAgentdatas', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the jobfunction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::get('RealEstateAgentdatas');
        $countryDetails =  DB::table('internationals')->select('name')->whereNull('deleted_at')->get();
        // print_r($countryDetails);die('51');

        if (Module::hasAccess($module->id)) {
            return View('la.realestateagentdatas.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'countryDetails' => $countryDetails,
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

    /**
     * Store a newly created organization in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //	print_r($_POST);die('84');
        $moredescription   = $request->more_desc;
        $banner_desc       = $request->banner_desc;
        $display_list_page = $request->display_list_page;
        $county_name       = $request->county_name;
        if (Module::hasAccess("RealEstateAgentdatas", "create")) {

            $rules = Module::validateRules("RealEstateAgentdatas", $request);

            $validator = Validator::make($request->all(), $rules);
            //echo '<pre>';print_r($request->all()['name']);exit;
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // $name = $request->all()['price_range'];
            $insert_id = Module::insert("RealEstateAgentdatas", $request);
            DB::table('realestateagentdatas')->where('id', $insert_id)->update(['banner_desc' => $banner_desc, 'more_desc' => $moredescription, 'display_list_page' => $display_list_page, 'county_name' => $county_name]);
            // $slug = strtolower(str_replace(' ', '_', $name));
            // DB::table('joblevels')->where('id', $insert_id)->update(['slug' => $slug]);
            return redirect()->route(config('laraadmin.adminRoute') . '.realestateagentdatas.index');
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
        // echo $id;die('117');
        if (Module::hasAccess("RealEstateAgentdatas", "view")) {

            $RealEstateAgentdatas = RealEstateAgentdata::find($id);
            if (isset($RealEstateAgentdatas->id)) {
                $module = Module::get('RealEstateAgentdatas');
                $module->row = $RealEstateAgentdatas;

                return view('la.realestateagentdatas.show', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('realestateagentdatas', $RealEstateAgentdatas);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("realestateagentdatas"),
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


        if (Module::hasAccess("RealEstateAgentdatas", "edit")) {
            $RealEstateAgentdatas = RealEstateAgentdata::find($id);
            if (isset($RealEstateAgentdatas->id)) {
                $RealEstateAgentdatas = RealEstateAgentdata::find($id);
                $countryDetails =  DB::table('internationals')->select('name')->whereNull('deleted_at')->get();
                //print_r($RealEstateAgentdatas);die('157');
                $module = Module::get('RealEstateAgentdatas');

                $module->row = $RealEstateAgentdatas;

                return view('la.realestateagentdatas.edit', [
                    'module' => $module,
                    'RealEstateAgentdatas' => $RealEstateAgentdatas,
                    'view_col' => $this->view_col,
                    'countryDetails' => $countryDetails,
                ])->with('realestateagentdatas', $RealEstateAgentdatas);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("realestateagentdatas"),
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
        // echo $id;die('189');
        $moredescription   = $request->more_desc;
        $banner_desc       = $request->banner_desc;
        $display_list_page = $request->display_list_page;
        $county_name       = $request->county_name;
        if (Module::hasAccess("RealEstateAgentdatas", "edit")) {

            $rules = Module::validateRules("RealEstateAgentdatas", $request, true);
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }

            $insert_id = Module::updateRow("RealEstateAgentdatas", $request, $id);

            DB::table('realestateagentdatas')->where('id', $insert_id)->update(['banner_desc' => $banner_desc, 'more_desc' => $moredescription, 'display_list_page' => $display_list_page, 'county_name' => $county_name]);

            return redirect()->route(config('laraadmin.adminRoute') . '.realestateagentdatas.index');
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
        if (Module::hasAccess("RealEstateAgentdatas", "delete")) {
            RealEstateAgentdata::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.realestateagentdatas.index');
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
        $values = DB::table('realestateagentdatas')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('RealEstateAgentdatas');
        $san_url = url('/') . '/storage/uploads/';
        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && $fields_popup[$col]->field_type_str == "Image") {
                    if ($data->data[$i][$j] != 0) {
                        $img = \App\Models\Upload::find($data->data[$i][$j]);
                        if (isset($img->name)) {
                            $data->data[$i][$j] = '<img height= "69" src="' . $san_url . $img->name . '?s=50">';
                        } else {
                            $data->data[$i][$j] = "";
                        }
                    } else {
                        $data->data[$i][$j] = "";
                    }
                }
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                // print_r('<a href="'.url(config('laraadmin.adminRoute') . '/priceslakes/'.$data->data[$i][0]).'">');exit;
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/realestateagentdatas/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("RealEstateAgentdatas", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/realestateagentdatas/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("RealEstateAgentdatas", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.realestateagentdatas.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][] = (string)$output;
            }
        }
        $out->setData($data);
        return $out;
    }
}
