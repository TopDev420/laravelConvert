<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use DB;
use Illuminate\Support\Facades\DB;
// use Session;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Role;
use App\User;
// use Mail;
use Illuminate\Support\Facades\Mail;
use App\Models\BusinessContact;
use Illuminate\Support\Facades\Input;

class FeaturesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     **/
    public function __construct()
    {
    }
    public function index()
    {
        $userid = Session::get('user_id');
        $username = Session::get('user_name');
        if (!$userid) {
            //   return redirect("/frontlogin");
        }

        return View('template.feature', [
            'userid' => $userid,
            'username' => isset($username) ? $username : '',
        ]);
    }
}
