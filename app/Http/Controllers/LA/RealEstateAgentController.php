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

use Illuminate\Support\Facades\Storage;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
// use Validator;
use Illuminate\Support\Facades\Validator;
// use DB;
use Illuminate\Support\Facades\DB;

use App\Models\RealEstateAgent;

class RealEstateAgentController extends Controller
{
    public $show_action = true;
    public $view_col = 'contact_name';
    public $listing_cols = ['id', 'direct_email', 'contact_name', 'company_job_level', 'Job_function', 'country_city', 'contact_number'];

    public function __construct()
    {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('RealEstateAgents', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('RealEstateAgents', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the RealEstateAgents.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::get('RealEstateAgents');

        if (Module::hasAccess($module->id)) {
            return View('la.realestateagents.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for creating a new realestateagents.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created realestateagents in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Module::hasAccess("RealEstateAgents", "create")) {

            $rules = Module::validateRules("RealEstateAgents", $request);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("RealEstateAgents", $request);

            return redirect()->route(config('laraadmin.adminRoute') . '.realestateagents.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified realestateagents.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Module::hasAccess("RealEstateAgents", "view")) {

            $realestateagents = RealEstateAgent::find($id);
            if (isset($realestateagents->id)) {
                $module = Module::get('RealEstateAgents');
                $module->row = $realestateagents;

                return view('la.realestateagents.show', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('realestateagents', $realestateagents);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("realestateagents"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified realestateagents.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Module::hasAccess("RealEstateAgents", "edit")) {
            $realestateagents = RealEstateAgent::find($id);
            if (isset($realestateagents->id)) {
                $module = Module::get('RealEstateAgents');

                $module->row = $realestateagents;

                return view('la.realestateagents.edit', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                ])->with('realestateagents', $realestateagents);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("realestateagents"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified businesshealthcares in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Module::hasAccess("RealEstateAgents", "edit")) {

            $rules = Module::validateRules("RealEstateAgents", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }

            $insert_id = Module::updateRow("RealEstateAgents", $request, $id);

            return redirect()->route(config('laraadmin.adminRoute') . '.realestateagents.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified realestateagents from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Module::hasAccess("RealEstateAgents", "delete")) {
            RealEstateAgent::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.realestateagents.index');
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
        $values = DB::table('realestateagents')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('RealEstateAgents');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/realestateagents/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("RealEstateAgents", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/realestateagents/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("RealEstateAgents", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.realestateagents.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][] = (string)$output;
            }
        }
        $out->setData($data);
        return $out;
    }

    public function import(Request $request)
    {
        if (Input::hasFile('file')) {
            $file = Input::file('file');
            $name = time() . '-' . $file->getClientOriginalName();

            $path = storage_path('documents');

            $file->move($path, $name);
            $res = $this->importCsv($name);
            $contact_array = array();
            foreach ($res as $key => $value) {
                $contact_array['direct_email'] = $value['Email'];
                $contact_array['contact_name'] = $value['Contact Name'];
                $contact_array['company_job_level'] = $value['Company & Job Level'];
                $contact_array['Job_function'] = $value['Function'];
                $contact_array['country_city'] = $value['Country Or City'];
                $contact_array['contact_number'] = $value['Contact Number'];
                $lastId = DB::table('realestateagents')->insertGetId($contact_array);
            }
        }
        return redirect()->route(config('laraadmin.adminRoute') . '.realestateagents.index');
    }
    public function importCsv($name = '')
    {
        $file = storage_path('documents/' . $name);
        $customerArr = $this->csvToArray($file);
        return $customerArr;
    }
    function csvToArray($filename = '', $delimiter = ',')
    {
        // if (strpos($filename, 'public') !== false) {
        //     $filename = str_replace('public', 'storage',$filename);
        // }

        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle)) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }
}
