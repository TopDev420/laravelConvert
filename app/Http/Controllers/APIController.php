<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Organization;
    // use DB;
use Illuminate\Support\Facades\DB;

    class APIController extends Controller
    {

        public function checkCode(Request $request)
        {
            echo '<pre>';print_r(getallheaders());exit;
            $purcode = $request->all()['code'];
            $purchase_code = DB::table('organizations')->select('purchase_code')->get();
            foreach ($purchase_code as $code){
            	if ($purcode ==$code->purchase_code){
            		return response(array(
	                    'error' => false,
	                    'message' =>'matching',
	                   ),200);
            	}
            }
           return response(array(
	                    'error' => true,
	                    'message' =>'not found',
	                   ),404);

        }

    }
    ?>