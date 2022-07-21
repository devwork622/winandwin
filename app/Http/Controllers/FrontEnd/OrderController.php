<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Draw;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\UserTransactions;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use DB;
use Session;



class OrderController extends Controller
{
    public function index(){
		return view('FrontEnd.home');
	}

	public function place_order(Request $request){

        $user_id = Auth::id(); 
        $user = User::where('id',$user_id)->first();

        $request_data = $request->except('_token');
        $transaction_data = $request->input('transaction_data');
        $transaction_id = '';

        $cart_data = Session::get('cart_data');
        if(empty($cart_data)) {
            $return_arr = [];
            $return_arr['success'] = '0';
            $return_arr['message'] = 'Cart is empty.';
            return response()->json($return_arr);
        }

        if($request_data['payment_mode'] == 'paypal' && empty($transaction_data)) {
            $return_arr = [];
            $return_arr['success'] = '0';
            $return_arr['message'] = 'There is some error in payment.';
            return response()->json($return_arr);

        } else if($request_data['payment_mode'] == 'paypal') {

            $transaction_data_arr = json_decode($transaction_data,true);        
            $transaction_id =  $transaction_data_arr['paymentID'];          
        }		
        

        $draw = Draw::where('is_current','1')->orderBy('id','DESC')->first();
        $draw_id = $draw->id;

        $order = new Order;
        $order_data = [];
        $order_data['user_id'] = $user_id;
        $order_data['user_name'] = $user->first_name.' '.$user->last_name;
        $order_data['email'] = $user->email;
        $order_data['mobile'] = $user->mobile;
        $order_data['total_amount'] = $request_data['total_amount'];
        $order_data['wallet_amount'] = $request_data['wallet_amount'];
        $order_data['paypal_amount'] = $request_data['paypal_amount'];
        $order_data['draw_id'] = $draw_id;
        if($request_data['payment_mode'] == 'paypal') {
            $order_data['transaction_id'] = $transaction_id;
            $order_data['transaction_data'] = $transaction_data;            
        }
        $order = $order->create($order_data);
        $order_id = $order->id;

        if(!empty($order_id) && !empty($cart_data)) {

            $quantity = $cart_data['quantity'];

            for($i = 1 ; $i <= $quantity ; $i++) {
                $ticket_number = $cart_data['selected_number'.$i];

                if(!empty($ticket_number)) {
                    $order_item = new OrderItem;
                    $order_item_data = [];
                    $order_item_data['user_id'] = $user_id;
                    $order_item_data['order_id'] = $order_id;
                    $order_item_data['ticket_number'] = $ticket_number;
                    $order_item_data['ticket_amount'] = env('TICKET_AMOUNT');
                    $order_item_data['draw_id'] = $draw_id;
                    $order_item->create($order_item_data);
                }
            }

        }

        // clear cart data
        $cart_data = [];
        Session::put('cart_data',$cart_data);

        $wallet_amount = $request_data['wallet_amount'];
        if($wallet_amount > 0) {
            $user = new User;
            $user::where('id',$user_id)->update(['credit' => DB::raw("`credit` - '".$wallet_amount."' ")]);

            $user_transactions =  new UserTransactions;
            $tr_data = [];
            $tr_data['user_id'] = $user_id;
            $tr_data['amount'] = '-'.$wallet_amount;
            $tr_data['transaction_type'] = 'order_placed';
            $user_transactions->create($tr_data);
        }


        $return_arr = [];
        $return_arr['success'] = '1';
        $return_arr['redirect_url'] = url('/');
        $return_arr['message'] = 'Order placed successfully.';
        return response()->json($return_arr);

    }


	
}
