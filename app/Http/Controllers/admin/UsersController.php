<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB, Excel, Redirect, Validator, Session;

use App\Models\UsersModel;

class UsersController extends Controller
{
    public function usersdetails() {
		$user_details =  DB::table('users')->select('*')->get();
		//~ pr($user_details, 1);
		return view('admin.admin.user_details')->with('user_details', $user_details);
	}

	public function editUser($id){
		$result = DB::table('users')->where('id', '=' , $id)->get();
		 //~ pr($result, 1);
		return view('admin.admin.edit_user' , compact('result'));
	}

	public function adduser() {
		return view('admin.admin.add_user');
	}

	public function saveuser(Request $request) {

		if($request->input('user_edit_id') != "") {
			$user_id = $request->input('user_edit_id');
		}
		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'address' => 'required',
		);

		$validator = Validator::make($request->input(), $rules);
		if ($validator->fails()) {
			return redirect('admin/user/edit/'.$user_id)->withErrors($validator)->withInput();
		} else {
			$firstname = $request->input('first_name');
			$lastname = $request->input('last_name');
			$address = $request->input('address');

			$data = array('first_name'=>$firstname, 'last_name'=>$lastname, 'address'=>$address);
			DB::table('users')->where('id', '=', $user_id)
			->update($data);
			$request->session()->flash('message.level', 'success');
			$request->session()->flash('message.content', 'Data was saved updated!');
			return redirect('admin/user/edit/'.$user_id);
		}
	}

	public function admin_save_user(Request $request) {
		// pr($request->all(), 1);
		$rules = array(
  		'first_name' => 'required',
      'last_name' => 'required',
  		'email'      => 'required|email|unique:users',
  		'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
  		'address' => 'required'
		);

		$validator = Validator::make($request->input(),$rules);
		//~ @Epr($validator->errors()->first(), 1);
		if ($validator->fails()) {
			return redirect('admin/user/adduser/')->withErrors($validator)->withInput();
		} else {
      // pr($request->all(), 1);
			$firstname = $request->input('first_name');
      $lastname = $request->input('last_name');
			$email = $request->input('email');
			$password = $request->input('password');
			$address = $request->input('address');
			$date = date('Y-m-d H:i:s');
			$token = '';

			$data = array('first_name'=>$firstname,'last_name'=>$lastname, 'address'=>$address,'email'=>$email,'password'=>md5($password),'created_at'=>$date,'register_token'=>$token, 'user_type' => $request->input('user_type') );

			DB::table('users')->insert($data);

			$request->session()->flash('message.level', 'success');
			$request->session()->flash('message.content', 'Data was saved updated!');
			return redirect('admin/users-details');
		}
	}

	public function deleteuser(Request $request, $id) {
		$user = UsersModel::find($id);
		$user->delete();
		$request->session()->flash('message.level', 'success');
		$request->session()->flash('message.content', 'User was deleted successfully!');
		return redirect('admin/users-details');
	}

  /*Enable disable user*/
  public function enable_disableuser(Request $request, $id) {
    try {
      $data = $request->all();
      $ustatus = $data['usatatus'];
      $array = ['user_status' => $ustatus];
      $res = DB::table('users')->where('id', $id)->update($array);
      return json_encode(['status' => 'success']);
    } catch (\Exception $e) {
      return json_encode(['status' => 'failure']);
    }
  }
}
