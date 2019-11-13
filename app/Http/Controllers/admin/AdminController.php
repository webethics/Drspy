<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Models\Admin\Make;
use App\Models\Admin\CarModel;
use Illuminate\Support\Facades\Hash;
use DB, Input, Validator, Auth, Redirect, Session, Image, Excel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AdminController extends Controller
{
  public function index(){
		if(Session::get('admin_user_id')) {
            $user_details =  DB::table('users')->select('*')->get();
            return view("admin.admin.dashboard")->with('user_details', $user_details);
        } else{
            return view('admin.admin.login');
		}
  }

  //*******************Login functionality*****************//

    public function login(){
      if(Session::get('admin_user_id'))
          return Redirect::intended('/admin');
      else
          return view('admin.admin.login');
    }

    public function checklogin(Request $request){
      $rules = array('email' => 'required|email',
          'password' => 'required'
      );
      // check login fields validations
      $validator = Validator::make($request->input(), $rules);
      if ($validator->fails()) {
          return redirect('/admin/login')->withErrors($validator)->withInput($request->except('password'));
      }else{
        $result = DB::table('users')
        ->where('email', '=', $request->get('email'))
        ->where('password', '=', md5($request->get('password')))
        ->where('user_type', '=', 'admin')
        ->get();
        // pr($result, 1);

        if(!$result->isEmpty()){
            $first = $result[0]->first_name;
            $last = $result[0]->last_name;
            $email = $result[0]->email;
            $type = $result[0]->user_type;
            $name = $first.' '.$last;
            // set session value
            Session::put('admin_user_id', $result[0]->id);
            Session::put('admin_user_name',ucwords($name));
            Session::put('admin_user_email',$email);
            Session::put('user_type',$type);

            return Redirect::intended('/admin/');
        }else{
            Session::flash('error', 'Please fill correct credential.');
            return Redirect::to('/admin/login');
        }
      }
    }


    public function changepassword(){
      return view('admin.admin.resetpassword');
  	}

    public function password_change(Request $request){
		$rules = array('oldpasssword' => 'required',
		 	'new_password' => 'min:6|required_with:confirmpassword|same:confirmpassword',
		 	);
		 $id = Session::get('admin_user_id');
		 $new_password = $request->get('new_password');
		 $old_password = $request->get('oldpasssword');

		 $validator = Validator::make($request->input(), $rules);
		if ($validator->fails()) {
		 	return back()->withErrors($validator)->withInput();
		 }else{


		  	$result = DB::table('users')
		 	->where('id', '=', $id)
		 	->where('password', '=', md5($old_password))
		 	->get();

		 	if(!$result->isEmpty()){

		 		$data = array('password'=>md5($new_password));
			      DB::table('users')->where('id', '=', $id)
					->update($data);

		 			Session::flash('success', 'Password changed successfully !');
		 			return redirect('admin/change-password');


		 		}else{

		 			Session::flash('error', 'Your current password does not matches with the password you provided. Please try again.');
		 			return redirect('admin/change-password');
		 		}

	   }
   }

    public function logout() {
      Session::flush();
      return Redirect::to('/admin');
    }
}
