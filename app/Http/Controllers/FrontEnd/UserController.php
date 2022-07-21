<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nationality;
use App\Models\Country;
use App\Models\User;
use App\Models\UserTransactions;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use DB;

use PaypalPayoutsSDK\Core\PayPalHttpClient;
use PaypalPayoutsSDK\Core\SandboxEnvironment;
use PaypalPayoutsSDK\Payouts\PayoutsPostRequest;

//use Srmklive\PayPal\Services\ExpressCheckout;


class UserController extends Controller
{
    public function index(){
		return view('FrontEnd.home');
	}
	public function my_profile(){

		
		$nationalities = Nationality::orderBy('name')->get();
		$countries = Country::orderBy('vCountry')->get();

		$user_id = Auth::id(); 
		$user = User::where('id',$user_id)->first();
		

		return view('FrontEnd.my-profile', compact('user','nationalities','countries'));
	}


	public function update_profile(Request $request){
		$validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'mobile' => ['numeric'],
            ]);  

        if ($validator->fails()) {
            return redirect(route('my-profie'))->with('errors',$validator->errors());
        }

        $user_id = Auth::id();
        $data = $request->all();
    	
    	$birthdate_arr = explode("/", $data['date_of_birth']);
    	$birthdate = $birthdate_arr[2].'-'.$birthdate_arr[1].'-'.$birthdate_arr[0];

        $user = new User;
        $user_data['first_name'] = $data['first_name'];
        $user_data['last_name'] = $data['last_name'];
        $user_data['mobile'] = $data['mobile'];  
        $user_data['gender'] = $data['gender'];
        $user_data['date_of_birth'] = date('Y-m-d',strtotime($birthdate));
        $user_data['nationality_id'] = $data['nationality_id'];
        $user_data['country_id'] = $data['country_id'];	 
        $user_data['paypal_email'] = $data['paypal_email'];   
        $new_user =  $user->where('id',$user_id)->update($user_data);

        $return_arr = [];
        $return_arr['success'] = '1';
        $return_arr['message'] = __('Profile updated successfully.');
        return response()->json($return_arr);
        //return redirect()->back()->with('success',__('Profile updated successfully.'));

	}

    public function change_password(Request $request){
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');

        $user_id = Auth::id();
        $user = new User;        
        $user = $user->where('id',$user_id)->first();
        $user_password = $user->password;
        if(Crypt::decrypt($user_password) == $old_password) {

            $user = new User;
            $new_data = [];
            $new_data['password'] =  Crypt::encrypt($new_password);
            $user::where('id',$user_id)->update($new_data);

            $return_arr = [];
            $return_arr['success'] = '1';
            $return_arr['message'] = 'Password changed successfully.';
            return response()->json($return_arr);

        } else {

            $return_arr = [];
            $return_arr['success'] = '0';
            $return_arr['message'] = 'Old Password does not match.';
            return response()->json($return_arr);
        }
        
    }

	// public function check_email_update(Request $request){
        
 //        $email = $request->input('email');
 //        $return_val = true;
 //        if(!empty($email)) {
 //            $user_model = new User;
 //            $user = $user_model->check_email($email);
 //            if(!empty($user)){
 //                $return_val = false;
 //            }
 //        }
 //        return response()->json($return_val);
 //    }

    public function check_mobile_update(Request $request){
        $mobile = $request->input('mobile');
        $id = $request->input('id');
        $return_val = true;
        if(!empty($mobile)) {
            $user_model = new User;
            $user = $user_model->check_mobile($mobile,$id);
            if(!empty($user)){
                $return_val = false;
            }
        }
        return response()->json($return_val);
    }

    public function add_credit(Request $request){
    	$user_id = Auth::id(); 
		$user = User::where('id',$user_id)->first();
		
		return view('FrontEnd.add-credits',compact('user'));

    }

    public function update_credit(Request $request){

        $user_id = Auth::id(); 
        $credit = $request->input('credit');
        $transaction_data = $request->input('transaction_data');



        if(empty($transaction_data)){
            $return_arr = [];
            $return_arr['success'] = '0';
            $return_arr['message'] = 'There is some error in payment.';
            return response()->json($return_arr);            
        }

        $transaction_data_arr = json_decode($transaction_data,true);
        
        $transaction_id =  $transaction_data_arr['paymentID'];
      
        $user_transactions =  new UserTransactions;
        $tr_data = [];
        $tr_data['user_id'] = $user_id;
        $tr_data['amount'] = $credit;
        $tr_data['transaction_type'] = 'add_wallet';
        $tr_data['transaction_id'] = $transaction_id;
        $tr_data['transaction_data'] = $transaction_data;
        $user_transactions->create($tr_data);


        $user = new User;
        $user::where('id',$user_id)->update(['credit' => DB::raw("`credit` + '".$credit."' ")]);

        $user = User::where('id',$user_id)->first();

        $return_arr = [];
        $return_arr['success'] = '1';
        $return_arr['credit'] = $user->credit;
        $return_arr['message'] = 'Credit added to your wallet.';
        return response()->json($return_arr);

    }

    public function withdraw_credit(Request $request){
        $user_id = Auth::id(); 
        $user = User::where('id',$user_id)->first();
        
        return view('FrontEnd.withdraw-credits',compact('user'));

    }
	

    public function withdraw_user_credit(Request $request){

        $credit = $request->input('credit');
        $user_id = Auth::id(); 
        $user = User::where('id',$user_id)->first();


        if($credit < env('MINIMUM_WITHDRAW')) {
            $return_arr = [];
            $return_arr['success'] = '0';
            $return_arr['message'] = 'You can not withdraw less than '.env('MINIMUM_WITHDRAW').' USD.';
            return response()->json($return_arr);            
        }

        if($user->credit < $credit) {
            $return_arr = [];
            $return_arr['success'] = '0';
            $return_arr['message'] = 'You do not have sufficiant balance to withdraw '.$credit.' USD.';
            return response()->json($return_arr);            
        }

        if(empty($user->paypal_email)) {
            $return_arr = [];
            $return_arr['success'] = '0';
            $return_arr['message'] = 'Please update your Paypal Email Address from My Profile.';
            return response()->json($return_arr);            
        }

        

        $clientId = env('PAYPAL_CLIENT_ID');
        $clientSecret = env('PAYPAL_SECRET_ID');

        $environment = new SandboxEnvironment($clientId, $clientSecret);
        $client = new PayPalHttpClient($environment);


        $request = new PayoutsPostRequest();
        
        $body['sender_batch_header'] = array('email_subject' => '$'.$credit.' Credit from '.env('APP_NAME')) ;

        $item['recipient_type'] = 'EMAIL';
        $item['receiver'] = $user->paypal_email;
        $item['note'] = 'Your '.$credit.'$ payout from '.env('APP_NAME');
        $item['sender_item_id'] = 'ITEM'.rand(7,4);
        $item['amount'] = array('currency' => 'USD', 'value' => $credit);
        $body['items'][] = $item; 
        
         
        //print_r($body); exit;
        $request->body = $body;
        $response = $client->execute($request);

        $status = $response->result->batch_header->batch_status;

        if($status == 'SUCCESS' || $status == 'PROCESSING' || $status == 'PENDING') {

            $user = new User;
            $user::where('id',$user_id)->update(['credit' => DB::raw("`credit` - '".$credit."' ")]);

            $user = User::where('id',$user_id)->first();

            $return_arr = [];
            $return_arr['success'] = '1';
            $return_arr['credit'] = $user->credit;
            $return_arr['message'] = 'Withdraw done to your Paypal Accont.';
            return response()->json($return_arr);


        } else {

            $return_arr = [];
            $return_arr['success'] = '0';
            $return_arr['message'] = 'There is some error in withdraw.';
            return response()->json($return_arr);  
        }



    }
}
