<?php

/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
// use DB;
use Illuminate\Support\Facades\DB;
use App\Models\Organization;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */

    public function index()
    {

        $user = Auth::user();
        if ($user->roles->first()->name == 'ADVISOR') {
            $accountdata = '';
            $frontpages = DB::table('frontpages')->whereNull('deleted_at')->get();
            return View('san.account', [
                'frontpages' => $frontpages,
                'accountdata' => $accountdata,
                'page' => 'account'
            ]);
        }
        $orgss = Organization::count();
        return view('la.dashboard', ['school_count' => $orgss]);
    }
}
