<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ================== Homepage + Admin Routes ================== */

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

use Illuminate\Support\Facades\DB;

$frontpages = DB::table('frontpages')->whereNull('deleted_at')->get();
foreach ($frontpages as $key => $value) {
    // if (method_exists('HomeController', $value->slug))
    // {
    if ($value->slug == 'home') {
        Route::get('/', 'HomeController@index');
    } else {
        Route::get('/' . $value->slug, 'HomeController@' . $value->slug);
    }
    //}
}
//echo "<pre>";print_r($_REQUEST);exit;
//echo bcrypt('global_lead');exit;


Route::get('/features', 'FeaturesController@index');
Route::get('/frontlogin', 'HomeController@frontlogin');
Route::post('/dologin', 'HomeController@dologin');
Route::get('/alogout', 'HomeController@logout');
Route::get('/signup', 'HomeController@signup');
Route::post('/registeruser', 'HomeController@registeruser'); /// not test
Route::get('/forgot-password', 'HomeController@reset');
Route::any('/resetpassword', 'HomeController@resetpassword'); ///redirect('/resend_link')?
// Route::post('/updatenamephone', 'HomeController@updatenamephone');
// Route::post('/passwordupdate', 'HomeController@passwordupdate');
// Route::get('/contact/{status}', 'HomeController@contact');
// Route::post('/signup', 'LA\UsersController@signupp');
// Route::post('/checkoutsignup', 'PaymentController@checkoutsignup');
// Route::get('/updtpassword', 'HomeController@updtpassword');
// Route::get('/verify/{id}', 'HomeController@verify');
// //Route::get('/dashboard', 'HomeController@dashboard');
// Route::get('/profile', 'HomeController@profile');
// Route::get('/savedsearches', 'HomeController@savedsearches');
// Route::get('/downloadfile', 'HomeController@downloadfile');
// Route::get('/exportfile', 'HomeController@exportfile');
// Route::get('/about', 'AboutController@index');
// Route::get('/contact', 'AboutController@contact');
// Route::get('/gdpr-ready', 'AboutController@gdpr_ready');
// Route::get('/events', 'AboutController@events');
// Route::get('/resource', 'AboutController@resource');
// Route::get('/blog', 'AboutController@blog');

// Route::get('/sampleexportfile/{id?}', 'BuildlistController@sampleexportfile');
// Route::get('/ready-made-lists', 'HomeController@readymade');
// Route::get('/ready-made-lists/job-titles', 'HomeController@jobtitle');
// Route::get('/terms-of-use', 'HomeController@termsofuse');
// Route::get('/privacy-policy', 'HomeController@privacypolicy');
// Route::get('/dashboard/home', 'HomeController@dashboardpage')->name('dashboard/home');
// Route::get('/dashboard/profile', 'HomeController@profile');
// Route::get('/dashboard/saved-searches', 'HomeController@savedsearches');
// Route::get('/dashboard/downloads', 'HomeController@downloads')->name('dashboard/downloads');
// Route::get('/dashboard/billing', 'HomeController@billing');
// Route::get('/dashboard/support', 'HomeController@support');

// Route::get('/ready-made-lists/job-levels', 'JobController@joblevels');
// Route::get('/ready-made-lists/job-levels-count', 'JobController@joblevels_count');
// Route::get('/ready-made-lists/job-functions', 'JobController@jobfunctions');
// Route::get('/ready-made-lists/industries', 'JobController@industries');
// Route::get('/ready-made-lists/industries-count', 'JobController@industries_count');
// Route::get('/ready-made-lists/healthcare-count', 'JobController@healthcare_count');
// Route::get('/ready-made-lists/healthcare-professionals', 'JobController@healthcare_professionals');
// Route::get('/ready-made-lists/internationals-count', 'JobController@internationals_count');
// Route::get('/ready-made-lists/internationals', 'JobController@internationals');
// Route::get('/ready-made-lists/realestate-count', 'JobController@realestate_count');
// Route::get('/ready-made-lists/real-estate', 'JobController@realestate');
// Route::get('/ready-made-lists/states-count', 'JobController@state_count');
// Route::get('/ready-made-lists/states', 'JobController@states');

// Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal', 'uses' => 'AddMoneyController@payWithPaypal',));
// Route::post('paypal', array('as' => 'addmoney.paypal', 'uses' => 'AddMoneyController@postPaymentWithpaypal',));
// Route::get('paypal', array('as' => 'payment.status', 'uses' => 'AddMoneyController@getPaymentStatus',));

// Route::get('/payment/{type}', 'AddMoneyController@addpayment')->name('payment');
// Route::get('/PaymentStatus', 'AddMoneyController@PaymentStatus')->name('PaymentStatus');
// Route::post('/cardpay', 'AddMoneyController@cardpay');
// Route::get('/cancelSubscription', 'AddMoneyController@cancelSubscription');
// Route::any('/webhook', function () {
//     ob_start();
//     require("Webhook.php");
//     return ob_get_clean();
// });
// Route::get('/subscriptions', 'SubscriptionsController@index');
// Route::get('/invoices', 'InvoicesController@index');
// Route::post('/getNextInvoices', 'InvoicesController@getNextInvoices');
// Route::post('/getPreviousInvoices', 'InvoicesController@getPreviousInvoices');
// Route::get('/billing-information', 'BillingInformationController@index');
// Route::get('/payment-method', 'PaymentMethodController@index');

// Route::post('/create-customer', 'AddMoneyController@createcustomer');

// Route::get('/downloadsfiles/{id?}', 'AddMoneyController@downloadsfiles');


// Route::get('/email-list-database/{name}', 'JobController@clevels');
// Route::get('/email-list-functions/{name}', 'JobController@jobFunctionDetails');
// Route::get('/email-list-industries/{name}', 'JobController@industriesDetails');
// Route::get('/email-list-healthcare/{name}', 'JobController@healthcareDetails');
// Route::get('/email-list-international/{name}', 'JobController@internationalsDetails');
// Route::get('/email-list-states/{name}', 'JobController@statesDetails');
// Route::get('/email-list-real-estate/{name}', 'JobController@realestateDetails');




// Route::get('/our-guarantees', 'HomeController@ourguarantees');
// Route::get('/press-room', 'HomeController@pressroom');
// Route::get('/press-room/bookyourdata-com-extends-its-database-with-health-care-category', 'HomeController@pressroom_bookyourdata');
// Route::get('/press-room/bookyourdata-com-is-live', 'HomeController@pressroom_bookyourdata_live');
// Route::get('/community-relations', 'HomeController@community_relations');
// Route::get('/career', 'HomeController@career');
// Route::get('/request-a-sample', 'HomeController@request_sample');
// Route::get('/download-e-book', 'HomeController@downloadebook');
// Route::get('/how-to-build-an-email-list', 'HomeController@howtobuildanlist');
// Route::get('/faq', 'HomeController@faq');
// Route::get('/sitemap', 'HomeController@sitemap');
// Route::post('/addtocart',     'PaymentController@addtocart');
// Route::post('/removefromcart', 'PaymentController@removefromcart');
// Route::match(array('GET', 'POST'), '/removefromcartitem', 'PaymentController@removefromcartitem');
// Route::get('/checkout/step1', 'PaymentController@checkout');
// Route::get('/checkout/step2', 'PaymentController@checkoutstep2');
// Route::get('/checkout/step3', 'PaymentController@checkoutstep3')->name('checkout/step3');
// Route::any('/getdata/{id?}', 'PaymentController@details');
// Route::any('/couponcode', 'PaymentController@couponcode');
// Route::any('/addtocartbydetails', 'PaymentController@addToCartByDetails');

// Route::get('/frontlogin/{status}', 'HomeController@frontlogin');
// Route::post('/finalstep', 'LA\AdvisorsController@dosignup');
// Route::post('/successpayment', 'HomeController@successpayment');
// Route::post('/dosignup', 'HomeController@signupp');
// Route::post('/paymentsucess', 'HomeController@paymentsucess');
// Route::post('/membpaymsuccess', 'HomeController@membpaymsuccess');
// Route::post('/memberpayment', 'HomeController@memberpayment');
// Route::get('/memberpayment', 'HomeController@memberpayment');
// Route::post('/newsletter', 'HomeController@newsletter');
// Route::post('/userquery', 'HomeController@userquery');
// Route::post('/contactUs', 'HomeController@contactUs');
// Route::post('/newsltremail', 'HomeController@newsltremail');


// Route::post('/sendemail', 'HomeController@sendemail');
// Route::post('/updateinfo', 'HomeController@updateinfo');
// Route::post('/get_states', 'LA\AdvisorsController@get_states');
// Route::post('/get_cities', 'LA\AdvisorsController@get_cities');
//============================================================//
Route::get('/tool/{name?}/{id?}', 'BuildlistController@index');
Route::any('/mail_check/{name?}', 'BuildlistController@mail_check');
//Route::get('demobuildlist/{id}', 'BuildlistController@secrhbyid');
//=========================================================//


// /*Filter*/
// Route::post('/find_domain', 'HomeController@domain');
// Route::post('/find_email', 'HomeController@email');
// Route::post('/find_phone', 'HomeController@phone');
// Route::post('/get_cities', 'HomeController@get_cities');
// Route::post('/filter', 'HomeController@filter');
// Route::post('/savesearch', 'HomeController@savesearch');
// Route::post('/download_info', 'HomeController@download_info');
// Route::post('/renamelist', 'HomeController@renamelist');
// Route::get('/deletesearch/{id}', 'HomeController@deletesearch');
// Route::post('/emailcheck', 'HomeController@emailcheck');
// Route::post('/emailchecks', 'HomeController@emailchecks');

// Route::get('/career/open-positions/web-developer', 'AboutController@web_developer');
// Route::get('/career/open-positions/key-account-manager', 'AboutController@key_account_manager');
// Route::get('/career/open-positions/database-administrator', 'AboutController@database_administrator');
// Route::get('career/open-positions/customer-support-specialist', 'AboutController@customer_support');

// //========================================================//

// Route::post('/checkcontact', 'BuildlistController@checkcontact');
// Route::post('/viewcontact', 'BuildlistController@viewcontact');
Route::post('/myleadspage', 'BuildlistController@myleadspage');
Route::post('/downloadMyLeads', 'BuildlistController@downloadleads');
// Route::post('/downloadSelContacts', 'BuildlistController@downloadSelContacts');
// Route::post('/downloadcontacts', 'BuildlistController@downloadcontacts');
// Route::post('/savecontact', 'BuildlistController@savecontact');
// Route::post('/savefilter', 'BuildlistController@savefilter');
// Route::post('/openfilter', 'BuildlistController@openfilter');
// Route::post('/demofilter', 'BuildlistController@filter');
// Route::post('/rangesofcontact', 'BuildlistController@ranges_of_contact');
// Route::get('/healthcare', 'HealthcareController@index');
// Route::post('/demosavesearch', 'SavesecrhController@savesearch');
// Route::post('/removesearchdata', 'SavesecrhController@removesearchdata');
// Route::post('/industrysearch', 'BuildlistController@industrysearch');
// Route::post('/joblevelsearch', 'BuildlistController@joblevelsearch');
// Route::post('/statesearch', 'BuildlistController@statesearch');
// Route::post('/ownershipsearch', 'BuildlistController@ownershipsearch');
// Route::post('/businesssearch', 'BuildlistController@businesssearch');
// Route::post('/yearfoundedsearch', 'BuildlistController@yearfoundedsearch');
// Route::post('/jobfunctionsearch', 'BuildlistController@jobfunctionsearch');
// Route::post('/citysearch', 'BuildlistController@citysearch');
// Route::post('/countrysearch', 'BuildlistController@countrysearch');
// Route::post('/employeesearch', 'BuildlistController@employeesearch');
// Route::post('/revenuesearch', 'BuildlistController@revenuesearch');

// Route::any('/downloadnew/{id?}', 'TestController@index');
// //========================================================//


// /* == Payment Control == */
// Route::get('/checkout/{type}/{billing}', 'PaymentController@checkout');

// /******/

// Route::auth();

// Route::group(array('prefix' => 'api'), function () {
//     Route::resource('ban', 'APIController@checkCode');
// });




// /*================ Access Uploaded Files ================*/
// Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

// /*
// |--------------------------------------------------------------------------
// | Admin Application Routes
// |--------------------------------------------------------------------------
// */

// $as = "";
// if (\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
//     $as = config('laraadmin.adminRoute') . '.';
//     // Routes for Laravel 5.3
//     Route::get('/logout', 'Auth\LoginController@logout');
// }

// Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {

//     /*================ Dashboard ================*/

//     Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
//     Route::get(config('laraadmin.adminRoute') . '/dashboard', 'LA\DashboardController@index');

//     /*================ Users ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
//     Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
//     Route::post(config('laraadmin.adminRoute') . '/update_user', 'LA\UsersController@update_user');
//     Route::post(config('laraadmin.adminRoute') . '/deleteuser', 'LA\UsersController@delete_user');
//     Route::post(config('laraadmin.adminRoute') . '/change_password', 'LA\UsersController@change_password');
//     Route::post(config('laraadmin.adminRoute') . '/change_plan', 'LA\UsersController@change_plan');
//     Route::post(config('laraadmin.adminRoute') . '/change_restriction', 'LA\UsersController@change_restriction');
//     Route::post(config('laraadmin.adminRoute') . '/send_message', 'LA\UsersController@send_message');
//     Route::post(config('laraadmin.adminRoute') . '/send_message_multi', 'LA\UsersController@send_message_multi');


//     /*================ Uploads ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
//     Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
//     Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
//     Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
//     Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
//     Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
//     Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');

//     /*================ Roles ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
//     Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
//     Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');

//     /*================ Permissions ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
//     Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
//     Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');

//     /*================ Departments ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
//     Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');

//     /*================ Front Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/frontpages', 'LA\FrontPageController');
//     Route::get(config('laraadmin.adminRoute') . '/frontpages_dt_ajax', 'LA\FrontPageController@dtajax');

//     /*================ Price slakes Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/priceslakes', 'LA\PriceSlakesController');
//     Route::get(config('laraadmin.adminRoute') . '/priceslakes_dt_ajax', 'LA\PriceSlakesController@dtajax');

//     /*================ Business Contacts Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/businesscontacts', 'LA\BusinessContactController');
//     Route::get(config('laraadmin.adminRoute') . '/businesscontacts_dt_ajax1', 'LA\BusinessContactController@dtajax1');
//     Route::get(config('laraadmin.adminRoute') . '/businesscontacts_dt_ajax2', 'LA\BusinessContactController@dtajax2');
//     Route::post(config('laraadmin.adminRoute') . '/businesscontacts_edit/{id}', 'LA\BusinessContactController@edit');
//     Route::post(config('laraadmin.adminRoute') . '/businesscontacts_active/{id}', 'LA\BusinessContactController@active');
//     Route::post(config('laraadmin.adminRoute') . '/businesscontacts_inactive/{id}', 'LA\BusinessContactController@inactive');

//     Route::post('/importcsv', 'LA\BusinessContactController@importc');
//     Route::post('/importxlsx', 'LA\BusinessContactController@importx');
//     Route::post('/update_businesscontact', 'LA\BusinessContactController@update');

//     /*================Newsletter Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/newsletters', 'LA\NewsletterController');
//     Route::get(config('laraadmin.adminRoute') . '/newsletters_dt_ajax', 'LA\NewsletterController@dtajax');

//     /*================Membership Plans Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/membershipplans', 'LA\MembershipPlanController');
//     Route::get(config('laraadmin.adminRoute') . '/membershipplans_dt_ajax', 'LA\MembershipPlanController@dtajax');

//     /*================ Business Healthcare Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/businesshealthcares', 'LA\BusinessHealthcareController');
//     Route::get(config('laraadmin.adminRoute') . '/businesshealthcares_dt_ajax', 'LA\BusinessHealthcareController@dtajax');

//     Route::post('/import_csv', 'LA\BusinessHealthcareController@importcsv');

//     /*================ Real Estate Agent Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/realestateagents', 'LA\RealEstateAgentController');
//     Route::get(config('laraadmin.adminRoute') . '/realestateagents_dt_ajax', 'LA\RealEstateAgentController@dtajax');

//     Route::post('/import_csv', 'LA\RealEstateAgentController@import');

//     /*================ Job Levels Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/joblevels', 'LA\JobLevelController');
//     Route::get(config('laraadmin.adminRoute') . '/joblevels_dt_ajax', 'LA\JobLevelController@dtajax');

//     /*================ Job Title Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/jobtitles', 'LA\JobTitleController');
//     Route::get(config('laraadmin.adminRoute') . '/jobtitles_dt_ajax', 'LA\JobTitleController@dtajax');

//     /*================ Job Function Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/jobfunctions', 'LA\JobFunctionController');
//     Route::get(config('laraadmin.adminRoute') . '/jobfunctions_dt_ajax', 'LA\JobFunctionController@dtajax');

//     /*================ Industries Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/industries', 'LA\IndustryController');
//     Route::get(config('laraadmin.adminRoute') . '/industries_dt_ajax', 'LA\IndustryController@dtajax');


//     /* ================== Coupons ================== */
//     Route::resource(config('laraadmin.adminRoute') . '/coupons', 'LA\CouponsController');
//     Route::get(config('laraadmin.adminRoute') . '/coupon_dt_ajax', 'LA\CouponsController@dtajax');



//     /*================ International Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/internationals', 'LA\InternationalsController');
//     Route::get(config('laraadmin.adminRoute') . '/international_dt_ajax', 'LA\InternationalsController@dtajax');

//     /*================ States Pages ================*/

//     /*================ Health Professional Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/healthprofessionals', 'LA\HealthProfessionalController');
//     Route::get(config('laraadmin.adminRoute') . '/healthprofessionals_dt_ajax', 'LA\HealthProfessionalController@dtajax');

//     /*================ Real Estate Agents Data Pages ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/realestateagentdatas', 'LA\RealEstateAgentDataController');
//     Route::get(config('laraadmin.adminRoute') . '/realestateagentdatas_dt_ajax', 'LA\RealEstateAgentDataController@dtajax');


//     /*================ Slider Images ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/slider_images', 'LA\SliderController');
//     Route::get(config('laraadmin.adminRoute') . '/slider_images_dt_ajax', 'LA\SliderController@dtajax');

//     /*================ Advisor ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/advisors', 'LA\AdvisorsController');
//     Route::get(config('laraadmin.adminRoute') . '/advisors_dt_ajax', 'LA\AdvisorsController@dtajax');
//     Route::post(config('laraadmin.adminRoute') . '/change_passwords/{id}', 'LA\AdvisorsController@change_password');


//     /*================ Backups ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
//     Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
//     Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
//     Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');

//     /*================ Employees ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
//     Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeesController@dtajax');
//     Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\EmployeesController@change_password');

//     /*================ Contact Us ================*/
//     Route::resource(config('laraadmin.adminRoute') . '/contacts', 'LA\ContactsController');
//     Route::get(config('laraadmin.adminRoute') . '/contacts_dt_ajax', 'LA\ContactsController@dtajax');
//     Route::post('/contactus/{front}', 'LA\ContactsController@store');

//     /* ================== Newsletters ================== */
//     Route::resource(config('laraadmin.adminRoute') . '/newsletters', 'LA\NewslettersController');
//     Route::get(config('laraadmin.adminRoute') . '/newsletter_dt_ajax', 'LA\NewslettersController@dtajax');

//     /* ================== States ================== */
//     Route::resource(config('laraadmin.adminRoute') . '/states', 'LA\StatesController');
//     Route::get(config('laraadmin.adminRoute') . '/state_dt_ajax', 'LA\StatesController@dtajax');

//     /* ================== Cities ================== */
//     Route::resource(config('laraadmin.adminRoute') . '/cities', 'LA\CitiesController');
//     Route::get(config('laraadmin.adminRoute') . '/city_dt_ajax', 'LA\CitiesController@dtajax');
// });
