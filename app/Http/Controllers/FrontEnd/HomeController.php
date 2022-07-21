<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function index(){
		return view('FrontEnd.home');
	}
	public function buyNow(){
		return view('FrontEnd.buy-now');
	}
	public function pastDrawResults(){
		return view('FrontEnd.past-draw-results');
	}
	public function weeklyLiveStream(){
		return view('FrontEnd.weekly-live-stream');
	}
	public function faq(){
		return view('FrontEnd.faq');
	}
	public function lotteries(){
		return view('FrontEnd.lotteries');
	}
	public function winners(){
		return view('FrontEnd.winners');
	}
	public function login(){
		return view('FrontEnd.login');
	}
	public function register(){
		return view('FrontEnd.register');
	}
	public function checkout(Request $request){

		$data = $request->except('_token');
		Session::put('cart_data',$data);

		$user_id = Auth::id();
		$user = User::where('id',$user_id)->first();
		$wallet_credit = $user->credit;

		return view('FrontEnd.checkout',compact('data','user','wallet_credit'));
	}
	public function legal(){
		return view('FrontEnd.legal');
	}
	public function privacyPolicy(){
		return view('FrontEnd.privacy-policy');
	}
	public function termsAndConditions(){
		return view('FrontEnd.terms-and-conditions');
	}
	public function participateResponsibly(){
		return view('FrontEnd.participate-responsibly');
	}
	public function gamerules(){
		return view('FrontEnd.gamerules');
	}
}
