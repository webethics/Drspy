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

class AliexpressController extends Controller
{
  /*aliexpress bestseller views*/
  public function Aebestseller() {
    $category_data = DB::table('category_fields')->where('maincategory_id', 1)->get();
    return view('admin.admin.Aliexpressviews.bestseller')->with('category_data', $category_data);
	}

	public function Aedropshipping() {
    $category_data = DB::table('category_fields')->where('maincategory_id', 2)->get();
		return view('admin.admin.Aliexpressviews.dropshipping')->with('category_data', $category_data);
	}

	public function Aemostwished() {
    $category_data = DB::table('category_fields')->where('maincategory_id', 5)->get();
		return view('admin.admin.Aliexpressviews.mostwished')->with('category_data', $category_data);
	}

	public function Aehandpicked() {
    $category_data = DB::table('category_fields')->where('maincategory_id', 6)->get();
		return view('admin.admin.Aliexpressviews.handpicked')->with('category_data', $category_data);
	}

  public function uploadaecsv() {
		return view('admin.admin.Aliexpressviews.uploadaecsv');
	}

  /*Delete category data*/
  public function deletecategory(Request $request, $id) {
    try {
      if($id) {
        $data = categorydatafieldsModel::find($id);
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


  /*Ali express edit portion*/
  public function aecategory_edit(Request $request, $mid, $id) {
    try {
      if(isset($mid) && isset($id) ) {
        $array = ['maincategory_id' => $mid, 'id' => $id];
        $categorydata = DB::table('category_fields')->where($array)->get();
        if(!empty($categorydata)) {
          return view('admin.admin.categoryedit.categoryedit')->with('categorydata', $categorydata);
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
  public function savecategorydata(Request $request) {
    try {
      $array = $request->all();
      if(!empty($array)) {
        $arr = array(
                      'product_link'=>$array["product_link"],
                      'brand_name'=>$array["brand_name"],
                      'title'=>$array["title"],
                      'price'=>$array["price"],
                      'video'=>$array["video"],
                      'ship_from_country'=>$array["ship_from_country"],
                      'epacket'=>$array["epacket"],
                      'orders'=>$array["orders"],
                      'epacketdelivery'=>$array["epacketdelivery"],
                      'rating'=>$array["rating"],
                      'reviews'=>$array["reviews"],
                      'store_age'=>$array["store_age"],
                      'wishes'=>$array["wishes"],
                      'cashback'=>$array["cashback"],
                      'estimated_monthly_sales'=>$array["estimated_monthly_sales"],
                      'estimated_monthly_revenue'=> $array["estimated_monthly_revenue"],
                      'keywords'=>$array["keywords"], 'store_positive_rating'=>$array["store_positive_rating"],
                      'store_followers'=>$array["store_followers"],
                      'ad'=>$array["ad"],
                      'ad_link'=>$array["ad_link"]);
          $res = DB::table('category_fields')->where('id', $array['id'])->update($arr);
          $request->session()->flash('message.level', 'succes');
          $request->session()->flash('message.content', 'Data was successfully updated!');
          return Redirect::back();
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'No data was found to be updated!');
        return Redirect::back();
      }

    } catch (\Exception $e) {
      pr($e->getMessage(), 1);
      $log = ['message' => 'Error in updating data', 'description' =>  $e->getMessage()];
      admin_write_log($log);
      $request->session()->flash('message.level', 'danger');
      $request->session()->flash('message.content', 'Error in updating data!');
      return Redirect::back();
    }


  }
}
