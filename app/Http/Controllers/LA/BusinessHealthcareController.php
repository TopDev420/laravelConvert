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

use App\Models\BusinessHealthcare;

class BusinessHealthcareController extends Controller
{
    public $show_action = true;
    public $view_col = 'contact_name';
    public $listing_cols = ['id', 'Direct_email', 'contact_name', 'job_level', 'Job_function', 'country_city', 'contact_number'];

    public function __construct()
    {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('BusinessHealthcares', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('BusinessHealthcares', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the BusinessHealthcares.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::get('BusinessHealthcares');

        if (Module::hasAccess($module->id)) {
            return View('la.businesshealthcares.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for creating a new businesshealthcares.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created businesshealthcares in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Module::hasAccess("BusinessHealthcares", "create")) {

            $rules = Module::validateRules("BusinessHealthcares", $request);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("BusinessHealthcares", $request);

            return redirect()->route(config('laraadmin.adminRoute') . '.businesshealthcares.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified businesshealthcares.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Module::hasAccess("BusinessHealthcares", "view")) {

            $businesshealthcares = BusinessHealthcare::find($id);
            if (isset($businesshealthcares->id)) {
                $module = Module::get('BusinessHealthcares');
                $module->row = $businesshealthcares;

                return view('la.businesshealthcares.show', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('businesshealthcares', $businesshealthcares);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("businesshealthcares"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified businesshealthcares.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Module::hasAccess("BusinessHealthcares", "edit")) {
            $businesshealthcares = BusinessHealthcare::find($id);
            if (isset($businesshealthcares->id)) {
                $module = Module::get('BusinessHealthcares');

                $module->row = $businesshealthcares;

                return view('la.businesshealthcares.edit', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                ])->with('businesshealthcares', $businesshealthcares);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("businesshealthcares"),
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
        if (Module::hasAccess("BusinessHealthcares", "edit")) {

            $rules = Module::validateRules("BusinessHealthcares", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }

            $insert_id = Module::updateRow("BusinessHealthcares", $request, $id);

            return redirect()->route(config('laraadmin.adminRoute') . '.businesshealthcares.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified businesshealthcares from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Module::hasAccess("BusinessHealthcares", "delete")) {
            BusinessHealthcare::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.businesshealthcares.index');
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
        $values = DB::table('businesshealthcares')->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('BusinessHealthcares');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/businesshealthcares/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("BusinessHealthcares", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/businesshealthcares/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("BusinessHealthcares", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.businesshealthcares.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
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
                $contact_array['Direct_email'] = $value['Email'];
                $contact_array['contact_name'] = $value['Contact Name'];
                $contact_array['job_level'] = $value['Company & Job Level'];
                $contact_array['Job_function'] = $value['Function'];
                $contact_array['country_city'] = $value['Country Or City'];
                $contact_array['contact_number'] = $value['Contact Number'];
                $lastId = DB::table('businesshealthcares')->insertGetId($contact_array);
            }
        }
        return redirect()->route(config('laraadmin.adminRoute') . '.businesshealthcares.index');
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
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
}
