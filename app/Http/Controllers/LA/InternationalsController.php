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
// use Datatables
use Yajra\Datatables\Datatables;;

use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
// use Validator;
use Illuminate\Support\Facades\Validator;
// use DB;
use Illuminate\Support\Facades\DB;

use App\Models\International;

class InternationalsController extends Controller
{
    public $show_action = true;
    public $view_col = 'name';
    public $listing_cols = ['id', 'name', 'list_text'];

    public function __construct()
    {
        // Field Access of Listing Columns
        if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Internationals', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Internationals', $this->listing_cols);
        }
    }

    /**
     * Display a listing of the Internationals.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::get('Internationals');

        if (Module::hasAccess($module->id)) {
            return View('la.internationals.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for creating a new international.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created international in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bannerdescription = $request->bannerdescription;
        $name = strtolower($request->name);
        $moredescription = $request->moredescription;
        $listtext = $request->listtext;
        $option = $request->option;
        $description = $request->description;
        if (Module::hasAccess("Internationals", "create")) {

            $rules = Module::validateRules("Internationals", $request);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $insert_id = Module::insert("internationals", $request);
            DB::table('internationals')->where('id', $insert_id)->update(['description' => $description, 'banner_desc' => $bannerdescription, 'more_desc' => $moredescription, 'list_text' => $listtext, 'display_list_page' => $option]);







            return redirect()->route(config('laraadmin.adminRoute') . '.internationals.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Display the specified international.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Module::hasAccess("Internationals", "view")) {

            $international = International::find($id);
            if (isset($international->id)) {
                $module = Module::get('Internationals');
                $module->row = $international;

                return view('la.internationals.show', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('international', $international);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("international"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Show the form for editing the specified international.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Module::hasAccess("Internationals", "edit")) {
            $international = International::find($id);
            if (isset($international->id)) {
                $module = Module::get('Internationals');

                $module->row = $international;

                return view('la.internationals.edit', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                ])->with('international', $international);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("international"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Update the specified international in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $bannerdescription = $request->bannerdescription;
        $name = strtolower($request->name);
        $moredescription = $request->moredescription;
        $listtext = $request->listtext;
        $option = $request->option;
        $description = $request->description;

        if (Module::hasAccess("Internationals", "edit")) {

            $rules = Module::validateRules("Internationals", $request, true);

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }

            $insert_id = Module::updateRow("Internationals", $request, $id);
            DB::table('internationals')->where('id', $insert_id)->update(['description' => $description, 'banner_desc' => $bannerdescription, 'more_desc' => $moredescription, 'list_text' => $listtext, 'display_list_page' => $option]);

            return redirect()->route(config('laraadmin.adminRoute') . '.internationals.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }

    /**
     * Remove the specified international from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Module::hasAccess("Internationals", "delete")) {
            International::find($id)->delete();

            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.internationals.index');
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
        $values = DB::table('internationals')->select('id', 'name', 'display_list_page')->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Internationals');

        for ($i = 0; $i < count($data->data); $i++) {
            for ($j = 0; $j < count($this->listing_cols); $j++) {
                $col = $this->listing_cols[$j];
                if ($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if ($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/internationals/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }

            if ($this->show_action) {
                $output = '';
                if (Module::hasAccess("Internationals", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/internationals/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }

                if (Module::hasAccess("Internationals", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.internationals.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
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
