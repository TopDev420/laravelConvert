<?php

/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use DB;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Role;
use App\User;
// use Session;
use Illuminate\Support\Facades\Session;
// use Mail;
use Illuminate\Support\Facades\Mail;
use App\Models\BusinessContact;
use Illuminate\Support\Facades\Input;

class AboutController extends Controller
{
    public $frontpages = array();
    public $user_id = array();
    /**
     * Create a new controller instance.
     *
     * @return void
     **/
    public function __construct()
    {
        $userid = Session::get('user_id');
        $username = Session::get('user_name');
        $this->frontpages = DB::table('frontpages')->whereNull('deleted_at')->get();
        if (!isset($userid)) {
            return redirect("/home");
        }
        $this->user_id = $userid;
        $this->user_name = $username;
        //echo '<pre>'; print_r($this->frontpages); echo '</pre>';
    }
    public function index()
    {
        $joblevel = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'about') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }
        $imgid = $joblevel->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $joblevel->image = url('/') . '/storage/uploads/' . $bnr_img;

        return View('about', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'About Us',
            'currentid' => $this->user_id,
        ]);
    }

    public function contact()
    {
        $contact = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'contact') {
                $contact = $this->frontpages[$pagekey];
            }
        }
        $imgid = $contact->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $contact->image = url('/') . '/storage/uploads/' . $bnr_img;
        // print_r($contact);die('72');

        return View('contact', [
            'frontpages' => $this->frontpages,
            'contact' => $contact,
            'page' => 'Contact Us',
            'currentid' => $this->user_id,
        ]);
    }
    public function gdpr_ready()
    {
        $gdpr_ready = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'gdpr-ready') {
                $gdpr_ready = $this->frontpages[$pagekey];
            }
        }
        // print_r($gdpr_ready);die('88');
        $imgid = $gdpr_ready->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $gdpr_ready->image = url('/') . '/storage/uploads/' . $bnr_img;
        // print_r($gdpr_ready);die('72');

        return View('new.newgdrpready', [
            'frontpages' => $this->frontpages,
            'gdpr_ready' => $gdpr_ready,
            'page' => 'Contact Us',
            'currentid' => $this->user_id,
        ]);
    }
    public function events()
    {
        // die('101');
        $events = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'events') {
                $events = $this->frontpages[$pagekey];
            }
        }
        // print_r($events);die('88');
        $imgid = $events->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $events->image = url('/') . '/storage/uploads/' . $bnr_img;
        // print_r($events);die('72');

        return View('new.events', [
            'frontpages' => $this->frontpages,
            'events' => $events,
            'page' => 'Contact Us',
            'currentid' => $this->user_id,
        ]);
    }
    public function resource()
    {
        //die('122');
        $events = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'resource') {
                $events = $this->frontpages[$pagekey];
            }
        }
        // print_r($events);die('88');
        $imgid = $events->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $events->image = url('/') . '/storage/uploads/' . $bnr_img;
        // print_r($events);die('72');

        return View('new.resource', [
            'frontpages' => $this->frontpages,
            'events' => $events,
            'page' => 'Contact Us',
            'currentid' => $this->user_id,
        ]);
    }
    public function blog()
    {
        $events = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'blog') {
                $events = $this->frontpages[$pagekey];
            }
        }
        // print_r($events);die('88');
        $imgid = $events->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $events->image = url('/') . '/storage/uploads/' . $bnr_img;
        // print_r($events);die('72');

        return View('new.blog', [
            'frontpages' => $this->frontpages,
            'events' => $events,
            'page' => 'Contact Us',
            'currentid' => $this->user_id,
        ]);
    }
    public function web_developer()
    {
        $events = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'web_developer') {
                $events = $this->frontpages[$pagekey];
            }
        }
        $imgid = $events->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $events->image = url('/') . '/storage/uploads/' . $bnr_img;
        return View('new.webdevloper', [
            'frontpages' => $this->frontpages,
            'events' => $events,
            'page' => 'Contact Us',
            'currentid' => $this->user_id,
        ]);
    }
    public function key_account_manager()
    {
        $joblevel = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'keyaccountmanager') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }
        $imgid = $joblevel->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $joblevel->image = url('/') . '/storage/uploads/' . $bnr_img;
        // print_r($joblevel);die('46');
        return View('career.key_account_manager', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'About Us',
            'currentid' => $this->user_id,
        ]);
    }
    public function database_administrator()
    {
        // die('199');
        $joblevel = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'database-administrator') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }
        $imgid = $joblevel->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $joblevel->image = url('/') . '/storage/uploads/' . $bnr_img;
        // print_r($joblevel);die('210');administrator.blade.php
        return View('career.administrator', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'About Us',
            'currentid' => $this->user_id,
        ]);
    }
    public function customer_support()
    {
        // die('218');
        $joblevel = array();
        $where = '';
        foreach ($this->frontpages as $pagekey => $pagedata) {
            if ($pagedata->slug == 'customersupportspecialist') {
                $joblevel = $this->frontpages[$pagekey];
            }
        }
        $imgid = $joblevel->image;
        $bnr_img = DB::table('uploads')->where('id', $imgid)->get()[0]->name;
        $joblevel->image = url('/') . '/storage/uploads/' . $bnr_img;
        // print_r($joblevel);die('210');support.blade.php
        return View('career.support', [
            'frontpages' => $this->frontpages,
            'joblevel' => $joblevel,
            'page' => 'About Us',
            'currentid' => $this->user_id,
        ]);
    }
}
