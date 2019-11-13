<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use DB, Excel, Redirect;
use App\Models\categoryModel;
use App\Models\subcategoryModel;
use App\Models\subchildcategoryModel;
use App\Models\categorydatafieldsModel;
use App\Models\wishfieldmodel;

class WishController extends Controller
{
	public function wishBestSeller() {
		$category_data = DB::table('wishcategoryfields')->where('maincategory_id', 17)->get();
		return view('admin.admin.wish_views.wish_bestseller')->with('category_data', $category_data);
	}

	public function uploadwishcsv() {
		return view('admin.admin.wish_views.uploadwish');
	}

	public function wishcategorydelete(Request $request, $id) {
		try {
      if($id) {
        $data = wishfieldmodel::find($id);
        $data->delete();
        $request->session()->flash('message.level', 'succes');
        $request->session()->flash('message.content', 'Data deleted successfully!');
        return Redirect::back();
      } else{
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Error in deleting data! ');
        return Redirect::back();
      }
    } catch (\Exception $e) {
      $log = ['message' => 'Error in deleting user', 'description' =>  $e->getMessage()];
      admin_write_log($log);
      $request->session()->flash('message.level', 'danger');
      $request->session()->flash('message.content', 'Error in deleting user data!');
      return Redirect::back();
    }
	}

	public function wishcategoryedit(Request $request, $mid, $id) {
    try {
      if(isset($mid) && isset($id) ) {
        $array = ['maincategory_id' => $mid, 'id' => $id];
        $categorydata = DB::table('wishcategoryfields')->where($array)->get();
        if(!empty($categorydata)) {
          return view('admin.admin.categoryedit.wishcategoryedit')->with('categorydata', $categorydata);
        } else {
          $request->session()->flash('message.level', 'danger');
          $request->session()->flash('message.content', 'Data not available! Please contact admin!');
          return Redirect::back();
        }
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Data was not found!');
        return Redirect::back();
      }
    } catch (\Exception $e) {
      $log = ['message' => 'Error in fetching data for user  with $id'.$id, 'description' =>  $e->getMessage()];
      admin_write_log($log);
      $request->session()->flash('message.level', 'danger');
      $request->session()->flash('message.content', 'Error in fetching data!');
      return Redirect::back();
    }
  }

	/*function to save category data*/
  public function savewishcategoryedit(Request $request) {
    try {
      $array = $request->all();
      if(!empty($array)) {
        $arr = array(
                      'product_id'=>$array["product_id"],
                      'product_link'=>$array["product_link"],
                      'product_image'=>$array["product_image"],
                      'title'=>$array["title"],
                      'price'=>$array["price"],
                      'price_shipping'=>$array["price_shipping"],
                      'currency'=>$array["currency"],
                      'minimum_delivery'=>$array["minimum_delivery"],
                      'delivery_difference'=>$array["delivery_difference"],
                      'estimated_arrival'=>$array["estimated_arrival"],
                      'product_rating'=>$array["product_rating"],
                      'product_rating_count'=>$array["product_rating_count"],
                      'total_inventory'=>$array["total_inventory"],
                      'orders'=>$array["orders"],
                      'shipping_badge'=>$array["shipping_badge"],
                      'size_rating_count'=> $array["size_rating_count"],
                      'rating_to_small'=>$array["rating_to_small"], 'rating_just_right'=>$array["rating_just_right"],
                      'rating_too_big'=>$array["rating_too_big"],
                      'description'=>$array["description"],
                      'keywords'=>$array["keywords"],'verified_by_wishstore'=>$array["verified_by_wishstore"], 'store'=>$array["store"],
                      'store_link'=>$array["store_link"],
                      'store_rating'=>$array["store_rating"],
                      'store_rating_count'=>$array["store_rating_count"]);
          $res = DB::table('wishcategoryfields')->where('id', $array['id'])->update($arr);
					// pr($res, 1);
          $request->session()->flash('message.level', 'succes');
          $request->session()->flash('message.content', 'Data was successfully updated!');
          return Redirect::back();
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'No data was found to be updated!');
        return Redirect::back();
      }

    } catch (\Exception $e) {

      $log = ['message' => 'Error in updating data', 'description' =>  $e->getMessage()];
      admin_write_log($log);
      $request->session()->flash('message.level', 'danger');
      $request->session()->flash('message.content', 'Error in updating data!');
      return Redirect::back();
    }
  }

	/* Download json file */
  public function download_json_data(Request $request) {
		$file= public_path(). "/Uploads/testwish.csv";
    $headers = array(
              'Content-Type: application/json',
            );
    return  response()->download($file,"testwish.csv",$headers);
  }


}
