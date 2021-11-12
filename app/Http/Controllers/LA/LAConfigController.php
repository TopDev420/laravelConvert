<?php

/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dwij\Laraadmin\Models\LAConfigs;
// use DB;
use Illuminate\Support\Facades\DB;

class LAConfigController extends Controller
{
    var $skin_array = [
        'White Skin' => 'skin-white',
        'Blue Skin' => 'skin-blue',
        'Black Skin' => 'skin-black',
        'Purple Skin' => 'skin-purple',
        'Yellow Sking' => 'skin-yellow',
        'Red Skin' => 'skin-red',
        'Green Skin' => 'skin-green'
    ];

    var $layout_array = [
        'Fixed Layout' => 'fixed',
        'Boxed Layout' => 'layout-boxed',
        'Top Navigation Layout' => 'layout-top-nav',
        'Sidebar Collapse Layout' => 'sidebar-collapse',
        'Mini Sidebar Layout' => 'sidebar-mini'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs = LAConfigs::getAll();
        // $logo = DB::table('uploads')->where('id',$configs->logo)->get()[0]->name;
        // $configs->logo = str_replace("public","",url('/')).'storage/uploads/'.$logo;
        return View('la.la_configs.index', [
            'configs' => $configs,
            'skins' => $this->skin_array,
            'layouts' => $this->layout_array
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->all();
        foreach (['sidebar_search', 'show_messages', 'show_notifications', 'show_tasks', 'show_rightsidebar'] as $key) {
            if (!isset($all[$key])) {
                $all[$key] = 0;
            } else {
                $all[$key] = 1;
            }
        }
        foreach ($all as $key => $value) {
            if ($key == 'image') {
                $logo = DB::table('uploads')->where('id', $value)->get()[0]->name;
                $value = url('/') . '/storage/uploads/' . $logo;
                $key = 'logo';
            }
            LAConfigs::where('key', $key)->update(['value' => $value]);
        }

        return redirect(config('laraadmin.adminRoute') . "/la_configs");
    }
}
