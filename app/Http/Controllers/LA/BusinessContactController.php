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
use Excel;
// use Validator;
use Illuminate\Support\Facades\Validator;
// use DB;
use Illuminate\Support\Facades\DB;

use App\Models\BusinessContact;

class BusinessContactController extends Controller
{
    public $show_action = true;
    public $view_col = 'email_address';
    public $link_col = ['elink', 'clink', 'company_website'];
    public $listing_cols1 = ['active', 'id', 'first_name', 'last_name', 'job_title', 'email_address', 'direct_phone', 'elink', 'company_name', 'company_website', 'phone_number', 'industries', 'revenue', 'employees', 'business_model', 'ownership', 'year_founded', 'clink', 'csic_code', 'cnai_code', 'address1', 'address2', 'city', 'state', 'zipcode', 'country'];
    public $listing_cols2 = ['active', 'id', 'first_name', 'last_name', 'job_title', 'email_address', 'company_name', 'company_website', 'phone_number', 'industries', 'revenue', 'employees', 'address1', 'address2', 'city', 'state', 'zipcode', 'country'];
    public $exclude_cols = ['types', 'employees'];

    public function __construct()
    {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {

            $this->middleware(function ($request, $next) {
                $this->listing_cols1 = ModuleFields::listingColumnAccessScan('BusinessContacts', $this->listing_cols1);
                $this->listing_cols2 = ModuleFields::listingColumnAccessScan('BusinessContacts', $this->listing_cols2);
                return $next($request);
            });
        } else {

            $this->listing_cols1 = ModuleFields::listingColumnAccessScan('BusinessContacts', $this->listing_cols1);
            $this->listing_cols2 = ModuleFields::listingColumnAccessScan('BusinessContacts', $this->listing_cols2);
        }
    }

    /**
     * Display a listing of the Priceslakes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::get('BusinessContacts');
        // print_r($module);
        // die();

        $getalllevels = DB::table('joblevels')->whereNull('deleted_at')->get();
        $getallfunctions = DB::table('jobfunctions')->whereNull('deleted_at')->get();
        $getallindustry = DB::table('industries')->whereNull('deleted_at')->get();
        $gethealthprofessionals = DB::table('healthprofessionals')->whereNull('deleted_at')->get();
        $getstates = DB::table('states')->whereNull('deleted_at')->get();
        $getcountry = DB::table('internationals')->whereNull('deleted_at')->get();


        if (Module::hasAccess($module->id)) {
            return View('la.businesscontacts.index', [
                'show_actions' => $this->show_action,
                'listing_cols1' => $this->listing_cols1,
                'listing_cols2' => $this->listing_cols2,
                'levels' => $getalllevels,
                'jobfunctions' => $getallfunctions,
                'getallindustry' => $getallindustry,
                'gethealthprofessionals' => $gethealthprofessionals,
                'states' => $getstates,
                'country' => $getcountry,
                'module' => $module,
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
        if (Module::hasAccess("BusinessContacts", "create")) {
            $types = $request->types;
            $job_level1 = $request->job_level;
            $job_level = implode(',', $job_level1);

            $job_functions = $request->job_function;
            $job_function = implode(',', $job_functions);

            $job_industry = $request->industry;
            $industry = implode(',', $job_industry);


            $emp_min = $request->emp_min;
            $emp_max = $request->emp_max;
            $rev_min = $request->rev_min;
            $rev_max = $request->rev_max;
            // echo $rev_min;die('106');
            if ($this->exclude_cols) {
                foreach ($this->exclude_cols as $key => $value) {
                    $request->request->remove($value);
                }
            }
            $rules = Module::validateRules("BusinessContacts", $request);

            $validator = Validator::make($request->all(), $rules);
            //echo '<pre>';print_r($request->all()['name']);exit;
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // $name = $request->all()['price_range'];
            $insert_id = Module::insert("BusinessContacts", $request);
            // $slug = strtolower(str_replace(' ', '_', $name));
            // DB::table('businesscontacts')->where('id', $insert_id)->update(['slug' => $slug]);
            DB::table('businesscontacts')->where('id', $insert_id)->update(['types' => $types, 'job_level' => $job_level, 'job_function' => $job_function, 'industries' => $industry, 'emp_min' => $emp_min, 'emp_max' => $emp_max, 'rev_min' => $rev_min, 'rev_max' => $rev_max]);
            return redirect()->route(config('laraadmin.adminRoute') . '.businesscontacts.index');
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
        if (Module::hasAccess("BusinessContacts", "view")) {

            $BusinessContacts = BusinessContact::find($id);
            if (isset($BusinessContacts->id)) {
                $module = Module::get('BusinessContacts');
                $module->row = $BusinessContacts;

                return view('la.businesscontacts.show', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('businesscontacts', $BusinessContacts);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("businesscontacts"),
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
        if (Module::hasAccess("BusinessContacts", "edit")) {
            $BusinessContacts = BusinessContact::find($id);
            if (isset($BusinessContacts->id)) {
                $BusinessContacts = BusinessContact::find($id);
                return $BusinessContacts;
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("businesscontacts"),
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
    public function update(Request $request)
    {
        if (Module::hasAccess("BusinessContacts", "edit")) {

            $id = $request->id;
            $first_name = $request->first_name;
            $last_name = $request->last_name;

            $types = $request->types;
            $job_level1 = $request->job_level;
            $job_level = implode(',', $job_level1);


            $job_functions = $request->job_function;
            $job_function = implode(',', $job_functions);

            $job_industry = $request->industry;
            $industry = implode(',', $job_industry);

            $emp_min = $request->emp_min;
            $emp_max = $request->emp_max;
            if ($this->exclude_cols) {
                foreach ($this->exclude_cols as $key => $value) {
                    $request->request->remove($value);
                }
            }
            $rules = Module::validateRules("BusinessContacts", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }

            $insert_id = (int)$id;
            DB::table('businesscontacts')->where('id', $insert_id)->update(['first_name' => $first_name, 'last_name' => $last_name, 'types' => $types, 'job_level' => $job_level, 'job_function' => $job_function, 'industries' => $industry, 'emp_min' => $emp_min, 'emp_max' => $emp_max]);
            return redirect()->route(config('laraadmin.adminRoute') . '.businesscontacts.index');
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
        if (Module::hasAccess("BusinessContacts", "delete")) {
            BusinessContact::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.businesscontacts.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Datatable Ajax fetch
     *
     * @return
     */
    public function dtajax1()
    {
        if ($this->show_action) {
            $select_col = array('created_at', 'deleted_at');
        } else {
            $select_col = array();
        }
        $select_col = array_merge($select_col, $this->listing_cols1);
        $values = DB::table('businesscontacts')->select($select_col)->whereNull('deleted_at')->where('types', 'businesscontact1');
        $out = Datatables::of($values)->make();
        $data = $out->getData();
        $fields_popup = ModuleFields::getModuleFields('BusinessContacts');

        $san_url = url('/') . '/storage/uploads/';
        for ($i = 0; $i < count($data->data); $i++) {
            $start_col_idx = 0;
            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("BusinessContacts", "edit")) {
                    $output .= '<button data-toggle="modal" data-target="#EditModal" class="btn btn-warning btn-xs btn-edig-dlg" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></button>';
                }

                if (Module::hasAccess("BusinessContacts", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.businesscontacts.destroy', $data->data[$i][3]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][0] = (string)$output;
                if ($data->data[$i][2] == 1) {
                    $data->data[$i][1] = '<div class="onoffswitch">
						<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox-checked" id="myonoffswitch1_' . $i . '" tabindex="0" checked>
						<label class="onoffswitch-label" for="myonoffswitch1_' . $i . '">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>';
                } else {
                    $data->data[$i][1] = '<div class="onoffswitch" >
						<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch1_' . $i . '" tabindex="0" checked>
						<label class="onoffswitch-label" for="myonoffswitch1_' . $i . '">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>';
                }
                $start_col_idx = 2;
            }
            for ($j = $start_col_idx; $j < count($this->listing_cols1) + $start_col_idx; $j++) {
                $col = $this->listing_cols1[$j - $start_col_idx];
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
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/businesscontacts/' . $data->data[$i][2]) . '">' . $data->data[$i][$j] . '</a>';
                }
                if (in_array($col, $this->link_col)) {
                    if (stristr('a' . $data->data[$i][$j], "https://")) {
                        $data->data[$i][$j] = '<a href="' . $data->data[$i][$j] . '" target="_blank">' . $data->data[$i][$j] . '</a>';
                    } else {
                        $data->data[$i][$j] = '<a href="https://' . $data->data[$i][$j] . '" target="_blank">' . $data->data[$i][$j] . '</a>';
                    }
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }

            }
        }


        $out->setData($data);
        return $out;
    }
    public function dtajax2()
    {
        if ($this->show_action) {
            $select_col = array('created_at', 'deleted_at');
        } else {
            $select_col = array();
        }
        $select_col = array_merge($select_col, $this->listing_cols2);
        $values = DB::table('businesscontacts')->select($select_col)->whereNull('deleted_at')->where('types', 'businesscontact2');
        $out = Datatables::of($values)->make();
        $data = $out->getData();
        $fields_popup = ModuleFields::getModuleFields('BusinessContacts');

        $san_url = url('/') . '/storage/uploads/';
        for ($i = 0; $i < count($data->data); $i++) {
            $start_col_idx = 0;
            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("BusinessContacts", "edit")) {
                    $output .= '<button data-toggle="modal" data-target="#EditModal" class="btn btn-warning btn-xs btn-edig-dlg" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></button>';
                }

                if (Module::hasAccess("BusinessContacts", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.businesscontacts.destroy', $data->data[$i][3]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][0] = (string)$output;
                if ($data->data[$i][2] == 1) {
                    $data->data[$i][1] = '<div class="onoffswitch">
						<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox-checked" id="myonoffswitch2_' . $i . '" tabindex="0" checked>
						<label class="onoffswitch-label" for="myonoffswitch2_' . $i . '">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>';
                } else {
                    $data->data[$i][1] = '<div class="onoffswitch" >
						<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch2_' . $i . '" tabindex="0" checked>
						<label class="onoffswitch-label" for="myonoffswitch2_' . $i . '">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>';
                }
                $start_col_idx = 2;
            }
            for ($j = $start_col_idx; $j < count($this->listing_cols2) + $start_col_idx; $j++) {
                $col = $this->listing_cols2[$j - $start_col_idx];
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
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/businesscontacts/' . $data->data[$i][2]) . '">' . $data->data[$i][$j] . '</a>';
                }
                if (in_array($col, $this->link_col)) {
                    if (stristr('a' . $data->data[$i][$j], "https://")) {
                        $data->data[$i][$j] = '<a href="' . $data->data[$i][$j] . '" target="_blank">' . $data->data[$i][$j] . '</a>';
                    } else {
                        $data->data[$i][$j] = '<a href="https://' . $data->data[$i][$j] . '" target="_blank">' . $data->data[$i][$j] . '</a>';
                    }
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }

            }
        }
        $out->setData($data);
        return $out;
    }
    public function importc(Request $request)
    {
        $types = $request->types;
        if (Input::hasFile('file')) {
            $file = Input::file('file');
            $name = time() . '-' . $file->getClientOriginalName();

            $path = storage_path('documents');

            $file->move($path, $name);
            $res = $this->importCsv($name);
            $min_emp = 0;
            $max_emp = 0;
            $rev_min = 0;
            $rev_max = 0;
            $contact_array = array();
            foreach ($res as $key => $value) {
                if (!isset($value['Employee First Name'])) {
                    break;
                }
                $employe = isset($value['Number of Employees']) ? explode('-', $value['Number of Employees']) : '';
                if (!empty($employe)) {

                    $min_emp = isset($employe[0]) ? $employe[0] : '';
                    $max_emp = isset($employe[1]) ? $employe[1] : '';
                }

                $revenue = isset($value['Company Revenue']) ? explode('-', $value['Company Revenue']) : '';
                if (!empty($revenue)) {

                    $rev_min = isset($revenue[0]) ? $revenue[0] : '';
                    $rev_max = isset($revenue[1]) ? $revenue[1] : '';
                }

                $contact_array['first_name'] = isset($value['Employee First Name']) ? $value['Employee First Name'] : '';
                $contact_array['last_name'] = isset($value['Employee Last Name']) ? $value['Employee Last Name'] : '';
                $contact_array['job_title'] = isset($value['Employee Title']) ? $value['Employee Title'] : '';
                $contact_array['job_function'] = isset($value['Job Function']) ? $value['Job Function'] : '';
                $contact_array['job_level'] = isset($value['Job Level']) ? $value['Job Level'] : '';
                $contact_array['email_address'] = isset($value['Employee Work Email']) ? $value['Employee Work Email'] : '';
                $contact_array['direct_phone'] = isset($value['Employee Direct Phone']) ? $value['Employee Direct Phone'] : '';
                $contact_array['elink'] = isset($value['Employee LinkedIn URL']) ? $value['Employee LinkedIn URL'] : '';
                $contact_array['company_name'] = isset($value['Company Name']) ? $value['Company Name'] : '';
                $contact_array['company_website'] = isset($value['Company Website']) ? $value['Company Website'] : '';
                $contact_array['phone_number'] = isset($value['Company HQ Phone']) ? $value['Company HQ Phone'] : '';
                $contact_array['industries'] = isset($value['Company Primary Industry']) ? $value['Company Primary Industry'] : '';
                $contact_array['revenue'] = isset($value['Company Revenue']) ? str_replace("B", "000000000", str_replace("M", "000000", str_replace("K", "000", $value['Company Revenue']))) : '';
                $contact_array['employees'] = isset($value['Number of Employees']) ? str_replace("B", "000000000", str_replace("M", "000000", str_replace("K", "000", $value['Number of Employees']))) : '';
                $contact_array['clink'] = isset($value['Company LinkedIn URL']) ? $value['Company LinkedIn URL'] : '';
                $contact_array['address1'] = isset($value['HQ Address1']) ? $value['HQ Address1'] : (isset($value['HQ Address']) ? $value['HQ Address'] : '');
                $contact_array['address2'] = isset($value['HQ Address2']) ? $value['HQ Address2'] : '';
                $contact_array['city'] = isset($value['HQ City']) ? $value['HQ City'] : '';
                $contact_array['state'] = isset($value['HQ State']) ? $value['HQ State']  : '';
                $contact_array['zipcode'] = isset($value['HQ Postal Code']) ? $value['HQ Postal Code'] : '';
                $contact_array['country'] = isset($value['HQ Country']) ? $value['HQ Country'] : '';
                $contact_array['business_model'] = isset($value['Company Business Model']) ? $value['Company Business Model'] : '';
                $contact_array['ownership'] = isset($value['Company Ownership']) ? $value['Company Ownership'] : '';
                $contact_array['emp_min'] = isset($min_emp) ? $min_emp : '';
                $contact_array['emp_max'] = isset($max_emp) ? $max_emp : '';
                $contact_array['rev_min'] = isset($rev_min) ? $rev_min : '';
                $contact_array['rev_max'] = isset($rev_max) ? $rev_max : '';
                $contact_array['types'] = isset($types) ? $types : '';
                $contact_array['year_founded'] = isset($value['Year Founded']) ? $value['Year Founded'] : '';
                $contact_array['csic_code'] = isset($value['Company SIC Codes']) ? $value['Company SIC Codes'] : '';
                $contact_array['cnai_code'] = isset($value['Company NAICS Codes']) ? $value['Company NAICS Codes'] : '';
                $contact_array['created_at'] = date('Y-m-d H:00:00');
                $contact_array['updated_at'] = date('Y-m-d H:00:00');


                $lastId = DB::table('businesscontacts')->insertGetId($contact_array);
            }
        }
        return redirect()->route(config('laraadmin.adminRoute') . '.businesscontacts.index');
    }
    public function importx(Request $request)
    {
        $types = $request->types;
        if ($request->hasFile('file')) {
            Excel::load($request->file('file')->getRealPath(), function ($reader) {
                foreach ($reader->toArray() as $fields) {
                    $contact_array['first_name'] = $fields[0];
                    $contact_array['last_name'] = $fields[1];
                    $contact_array['job_title'] = $fields[2];
                    $contact_array['job_function'] = $fields[3];
                    $contact_array['job_level'] = $fields[4];
                    $contact_array['email_address'] = $fields[5];
                    $contact_array['company_name'] = $fields[6];
                    $contact_array['company_website'] = $fields[7];
                    $contact_array['phone_number'] = $fields[8];
                    $contact_array['city'] = $fields[9];
                    $contact_array['state'] = $fields[10];
                    $contact_array['zipcode'] = $fields[11];
                    $contact_array['country'] = $fields[12];
                    $contact_array['industries'] = $fields[13];
                    $contact_array['emp_min'] = isset($min_emp) ? $min_emp : '';
                    $contact_array['emp_max'] = isset($max_emp) ? $max_emp : '';
                    $contact_array['rev_min'] = isset($rev_min) ? $rev_min : '';
                    $contact_array['rev_max'] = isset($rev_max) ? $rev_max : '';
                    $contact_array['types'] = isset($types) ? $types : '';
                    $contact_array['created_at'] = date('Y-m-d H:00:00');
                    $contact_array['updated_at'] = date('Y-m-d H:00:00');

                    $lastId = DB::table('businesscontacts')->insertGetId($contact_array);
                }
            });
        }
        return redirect()->route(config('laraadmin.adminRoute') . '.businesscontacts.index');
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
                else {
                    while (count($header) > count($row)) {
                        $row[] = '';
                    }
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
        return $data;
    }
    function active($id)
    {
        $insert_id = $id;
        return DB::table('businesscontacts')->where('id', $insert_id)->update(['active' => 1]);
    }
    function inactive($id)
    {
        $insert_id = $id;
        return DB::table('businesscontacts')->where('id', $insert_id)->update(['active' => 0]);
    }
}
