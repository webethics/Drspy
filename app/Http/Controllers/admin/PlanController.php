<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Models\plandetails;
use App\Models\Admin\Make;
use Illuminate\Support\Facades\Hash;
use DB, Input, Validator, Auth, Redirect, Session, Image, Excel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Stripe\Stripe;

class PlanController extends Controller {
  /*Call index*/
  public function index() {
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    $plan_details = DB::table('plan_details')->get();
    return view('admin.admin.plan.index')->with('plan_details', $plan_details);
  }

  /*add plan section start*/
  public function addplan() {
      return view('admin.admin.plan.add-plan');
  }

  /*add create plan section start*/
  public function create_plan(Request $request) {
    try {
      $rules = array(
                'plan_name' => 'required',
                'plan_price' => 'required',
                'plan_features' => 'required',
              );

      $validator = Validator::make($request->input(), $rules);

      if ($validator->fails()) {
  			return redirect('/admin/plan/add-plan')->withErrors($validator)->withInput($request->except('password'));
  		} else {
        if(!empty($request->input('plan_name'))) {
          \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
          $data = \Stripe\Plan::create(array(
                    "amount" => $request->input('plan_price'),
                    "interval" => "month",
                    "product" => [
                       "name" => $request->input('plan_name')
                     ],
                    "currency" => "usd",
                    "id" => $request->input('plan_name'))
                  );

          $res = $data->__toArray(true);
          if(!empty($res['product'])) {
            $array = array('planName'=>$request->input('plan_name'), 'planPrice' => $request->input('plan_price'), 'planFeatures' => $request->input('plan_features'), 'stripeplanid' => $request->input('plan_name'));
            $response = plandetails::insert($array);
            if($response = 1) {
              $request->session()->flash('message.level', 'success');
        			$request->session()->flash('message.content', 'Plan was successfully created!');
        			return Redirect::to('/admin/plan/manage-plan');
            }
          } else {
            $log = ['message' => 'Error in creating plan', 'description' =>  $data];
      			admin_write_log($log);
      			$request->session()->flash('message.level', 'danger');
      			$request->session()->flash('message.content', 'Error in creating plan!');
      			return Redirect::to('/admin/plan/add-plan');
          }
        }
      }
    } catch (\Exception $e) {

      $log = ['message' => 'Error in creating plan', 'description' =>  $e->getMessage()];
      admin_write_log($log);
      $request->session()->flash('message.level', 'danger');
      $request->session()->flash('message.content', 'Error in creating plan!');
      return Redirect::to('/admin/plan/add-plan');
    }
  }

  /*add edit plan section start*/
  public function editplan(Request $request, $id) {
    if(!empty($id)) {
      $user_details = DB::table('plan_details')->where('id', $id)->get();
      return view('admin.admin.plan.edit-plan')->with('user_details', $user_details);
    } else {
      $log = ['message' => 'Error in admin plan details', 'description' =>  'Plan details were not found'];
      admin_write_log($log);
      $request->session()->flash('message.level', 'danger');
      $request->session()->flash('message.content', 'Error in getting plan details!');
      return Redirect::to('/admin/plan/add-plan');
    }
  }

  /*add update plan section start*/
  public function update_plan_details($data) {
    $video = empty($data['video']) ? "no" : $data['video'];
    $brandname = empty($data['brandname']) ? "no" : $data['brandname'];
    $shipfromcountry = empty($data['shipfromcountry']) ? "no" : $data['shipfromcountry'];
    $Ad = empty($data['Ad']) ? "no" : $data['Ad'];
    $Adlink = empty($data['Adlink']) ? "no" : $data['Adlink'];

    $update_array = array('name'=>$data['plan_name'],  'Productsave'=>$data['Productsave'], 'video'=>$video, 'brandname'=>$brandname, 'shipfromcountry'=>$shipfromcountry, 'Ad'=>$Ad,'Adlink'=>$Adlink);
    $result = DB::table('plan')->where('id', $data['plan_id'])->update($update_array);
    return $result;
  }

  /*add edit plan submit section start*/
  public function editplansubmit(Request $request) {
    $rules = array(
              'plan_name' => 'required'
            );
    $validator = Validator::make($request->input(), $rules);
    if ($validator->fails()) {
      return redirect('/admin/plan/add-plan')->withErrors($validator)->withInput($request->except('password'));
    } else {
      $plandata = DB::table('plan')->where('id', $request->input('plan_id'))->get();
      if(!empty($plandata[0])) {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $data = \Stripe\Plan::update($plandata[0]->name,   [ "metadata" => ["name" => $request->input('plan_name')] ]);
        $response = $data->__toArray(true);
        if(!empty($response['id'])) {
          $inputvalue = $request->all();
          $response = $this->update_plan_details($inputvalue);

          $request->session()->flash('message.level', 'success');
          $request->session()->flash('message.content', 'Plan was successfully updated!');
          return Redirect::to('/admin/plan/manage-plan');
        } else {
          $request->session()->flash('message.level', 'danger');
          $request->session()->flash('message.content', 'Error in updating plan!');
          return Redirect::to('/admin/plan/manage-plan');
        }
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Error in getting plan data!');
        return Redirect::to('/admin/plan/manage-plan');
      }
    }
  }
}
