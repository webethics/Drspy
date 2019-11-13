<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB,  Session;
class ManageaccountController extends Controller {

  /*Account setting code*/
  public function accountsetting() {
    $user_id = Session::get('user_id');
    $data =  DB::table('users')->where('id', $user_id)->get();
    return view('site.profile.account-setting')->with('data', $data);
  }

  public function profile_update(Request $request) {
    try {
      // pr($request->all(), 1);
      $array = array('first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->user_email, 'address' => $request->address);
      DB::table('users')->where('id', $request->id)->update($array);
      $request->session()->flash('message.level', 'success');
      $request->session()->flash('message.content', 'Profile updated successfully!');
      return back();
    } catch (\Exception $e) {
      $request->session()->flash('message.level', 'danger');
      $request->session()->flash('message.content', 'Error in updating files!');
      return back();
    }
  }


}
