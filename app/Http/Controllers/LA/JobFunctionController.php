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
// use Datatables
use Yajra\Datatables\Datatables;;

use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
// use Validator;
use Illuminate\Support\Facades\Validator;
// use DB;
use Illuminate\Support\Facades\DB;

use App\Models\JobFunction;

class JobFunctionController extends Controller
{
    public $show_action = true;
    public $view_col = 'name';
    public $listing_cols = ['id', 'name', 'description'];

    public function __construct()
    {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('JobFunctions', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('JobFunctions', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the jobfunction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::get('JobFunctions');
        $parentName = DB::table('jobfunctions')->where('parent_id', '0')->whereNull('deleted_at')->get();

        if (Module::hasAccess($module->id)) {
            return View('la.jobfunctions.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'parentName' => $parentName,
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
        $bannerdescription = $request->bannerdescription;
        $name = strtolower($request->name);
        $pname = $request->pname;
        $moredescription = $request->moredescription;
        $listtext = $request->listtext;

        if (Module::hasAccess("JobFunctions", "create")) {

            $rules = Module::validateRules("JobFunctions", $request);

            $validator = Validator::make($request->all(), $rules);
            //echo '<pre>';print_r($request->all()['name']);exit;
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // $name = $request->all()['price_range'];
            $insert_id = Module::insert("JobFunctions", $request);
            $slug = strtolower(str_replace(' ', '-', $name));
            // $slug = strtolower(str_replace(' ', '_', $name));
            // DB::table('joblevels')->where('id', $insert_id)->update(['slug' => $slug]);
            DB::table('jobfunctions')->where('id', $insert_id)->update(['slug' => $slug, 'parent_id' => $pname, 'banner_desc' => $bannerdescription, 'more_desc' => $moredescription, 'list_text' => $listtext]);
            return redirect()->route(config('laraadmin.adminRoute') . '.jobfunctions.index');
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


        if (Module::hasAccess("JobFunctions", "view")) {

            $JobFunctions = JobFunction::find($id);
            if (isset($JobFunctions->id)) {
                $module = Module::get('JobFunctions');
                $module->row = $JobFunctions;

                return view('la.jobfunctions.show', [
                    'module' => $module,
                    'view_col' => $this->view_col,

                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('jobfunctions', $JobFunctions);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("jobfunctions"),
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
        $parentName = DB::table('jobfunctions')->where('parent_id', '0')->whereNull('deleted_at')->get();
        $grtPaentId = DB::table('jobfunctions')->select('parent_id')->where('id', $id)->first();

        $p_id = $grtPaentId->parent_id;

        if ($p_id != 0) {

            $getPaentName = DB::table('jobfunctions')->select('name')->where('id', $p_id)->first();
            $p_name = $getPaentName->name;
        } else {

            $p_name = '';
        }



        if (Module::hasAccess("JobFunctions", "edit")) {
            $JobFunctions = JobFunction::find($id);
            if (isset($JobFunctions->id)) {
                $JobFunctions = JobFunction::find($id);

                $module = Module::get('JobFunctions');

                $module->row = $JobFunctions;

                return view('la.jobfunctions.edit', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                    'parentName' => $parentName,
                    'p_name' => $p_name,
                ])->with('jobfunctions', $JobFunctions);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("jobfunctions"),
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
        $bannerdescription = $request->bannerdescription;
        $name = strtolower($request->name);
        $pname = $request->pname;
        $moredescription = $request->moredescription;
        $listtext = $request->listtext;


        if (Module::hasAccess("JobFunctions", "edit")) {

            $rules = Module::validateRules("JobFunctions", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }

            $insert_id = Module::updateRow("JobFunctions", $request, $id);

            $slug = strtolower(str_replace(' ', '-', $name));

            DB::table('jobfunctions')->where('id', $insert_id)->update(['slug' => $slug, 'parent_id' => $pname, 'banner_desc' => $bannerdescription, 'more_desc' => $moredescription, 'list_text' => $listtext]);


            return redirect()->route(config('laraadmin.adminRoute') . '.jobfunctions.index');
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
        if (Module::hasAccess("JobFunctions", "delete")) {
            JobFunction::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.jobfunctions.index');
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
        $values = DB::table('jobfunctions')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('JobFunctions');
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
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/jobfunctions/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("JobFunctions", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/jobfunctions/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("JobFunctions", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.jobfunctions.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
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
