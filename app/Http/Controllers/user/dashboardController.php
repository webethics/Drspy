<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator, Auth, Redirect, Session, DB, View, Input, Hash, File, Response;
use App\User, App\Models\categorydatafieldsModel,  App\Models\wishfieldmodel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class dashboardController extends Controller
{
	/*User dashboard section*/
	public function index(Request $request) {
		$user_id = Session::get('user_id');
		if(!empty($user_id)) {
			$category_fields = new categorydatafieldsModel();
			$result = $category_fields->get_data();
			// pr($result, 1);
			return view('site/dashboard')->with('result', $result);
		} else {
		  $request->session()->flash('message.level', 'danger');
		  $request->session()->flash('message.content', 'Please login  to continue!');
		  return view('site.login');
		}
	}

	/*Get the detail page */
	public function product_detail_page(Request $request, $sid, $mid) {
		$category_fields = new categorydatafieldsModel();
		$main_category = DB::table('maincategory')->select('*')->where('id', $mid)->get();
		$primarycategoryname = $main_category[0]->sitename;

		if($primarycategoryname == 'ae') {
			$table_name = 'category_fields';
			$result = $category_fields->get_ae_result($table_name, $sid, $mid);
		} else if ($primarycategoryname == 'wish') {
			$table_name = 'wishcategoryfields';
			$result = $wish_fields->get_wish_result($table_name, $sid, $mid);
		}
		return view('site/productdetailpage')->with('result', $result);
	}

	/*Account detail page*/
	public function account_detail_page(Request $request, $id) {
		try {
			$user_id = Session::get('user_id');
			$result = DB::table('plan_details')->where('id', $id)->get();
			// pr($result[0]->stripeplanid, 1);
			if($result[0]->stripeplanid == 'startup') {
				$array =  array('is_trial' => 1);
				DB::table('users')->where('id', $user_id)->update($array);
				return Redirect::to('/user/refer-page');
			} else {
				$data = DB::table('users')->select('*')->where('id', $user_id)->get();
				return view('site.register_steps.account_page')->with(['data'=>$data, 'id'=>$id]);
			}
		} catch (\Exception $e) {
			pr($e->getMessage(), 1);
		}
	}

	/*function for refer page section*/
	public function refer_page() {
		return view('site.register_steps.refer');
	}

	/*Pricing page section*/
	public function pricing_page() {
		$user_id = Session::get('user_id');
		if($user_id != '') {
		   $result = DB::table('users')
				  ->where('id', '=', $user_id)
				  ->get();
			$check_trial_or_subscribed = $result[0]->is_trial;
			//~ pr($check_trial_or_subscribed, 1);
			if(!empty($check_trial_or_subscribed)) {
				return Redirect('/user/dashboard');
			} else {
				$result = DB::table('plan_details')->get();
				return view('site.register_steps.pricing')->with('result', $result);
			}
		} else {
			return Redirect('/login');
		}
	}

}
