<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB, Excel, Redirect, File;
use App\Models\categoryModel;
use App\Models\subcategoryModel;
use App\Models\maincategoryModel;
use App\Models\categorydatafieldsModel;
use App\Models\croncsv;
use App\Models\wishfieldmodel;

class ImportWishController extends Controller {

  /*Import section start Please dont change anything untill update this is cron script*/

  public function Updatecsvdata(Request $request) {

    $files = File::files(public_path());

    $files = File::allFiles(public_path());

    $request->validate([
      'select_file' => 'required',
      'extention_type' => 'required',
    ]);

    $file = $request->file('select_file');
    $path = $request->file('select_file')->getRealPath();
    $data = Excel::load($path)->get();
    // pr($data, 1);
    $site_name = $request->extention_type;

    if($data->count()) {
      $array = [];
      foreach ($data as $key => $value) {
        $array[] = array(
          'category' => $value->category,
          'subcategory'=>$value->subcategory,
                'search_phrase' => $value->search_phrase,
                'title'=>$value->title,
                'product_id'=> $value->product_id,
                'product_link' => $value->product_link,
                'product_image' => $value->product_image,
                'price' => $value->price,
                'shipping' => $value->shipping,
                'price_shipping' => $value->price_shipping,
                'currency' => $value->currency,
                'minimum_delivery' => $value->minimum_delivery,
                'maximum_delivery' => $value->maximum_delivery,
                'delivery_difference' => $value->delivery_difference,
                'estimated_arrival'=> $value->estimated_arrival,
                'product_rating'=> $value->product_rating,
                'product_rating_count' => $value->product_rating_count,
                'total_inventory' => $value->total_inventory,
                'orders'=> $value->orders,
                'shipping_badge'=>$value->shipping_badge,
                'variations '=>$value->variations,
                'size_rating_count' => $value->size_rating_count,
                'rating_too_small' => $value->rating_too_small,
                'rating_just_right' => $value->rating_just_right,
                'rating_too_big'=> $value->rating_too_big,
                'description'=>$value->description,
                'keywords'=>$value->keywords,
                'verified_by_wishstore'=>$value->verified_by_wishstore,
                'store'=>$value->store,
                'store_link'=>$value->store_link,
                'store_rating'=>$value->store_rating,
                'store_rating_count'=>$value->store_rating_count,
                );
      }
      //~ pr($array, 1);
      if(count($array) > 0) {
        $res = $this->save_value_to_db($array, $site_name);
        $result = json_decode($res, true);
        // pr($result, 1);
        if($result['status'] == 200) {
          $request->session()->flash('message.level', 'success');
          $request->session()->flash('message.content', 'Data was saved successfully!');
          return Redirect::to('/admin/');
        } else {
          $request->session()->flash('message.level', 'danger');
          $request->session()->flash('message.content', 'Issue in updating fields please try again later or contact admin!');
          return Redirect::to('/admin/');
        }
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Please select a valid csv!');
        return Redirect::to('/admin/');
      }
    }
  }


  function save_value_to_db($arr, $category_type) {
    try {
      $success = 0;
      $fail = 0;
       //~ pr($arr, 1);
      $sitename = explode('-', $category_type);

      $categorymatch = ['name'=>$sitename[1], 'sitename'=>$sitename[0]];
      //~ pr($categorymatch, 1);
      if(count($arr) > 0) {
        /*if main category id exists*/
        $maincategorysiteid = maincategoryModel::select('id')->where($categorymatch)->get();

        if(!empty($maincategorysiteid[0])) {
          $maincatid = $maincategorysiteid[0]->id;
          foreach ($arr as $key => $value) {
            /*Get count for the main category id in the base category table*/
            // pr($value['category'], 1);
            $maincategory = categoryModel::where('category_name', '=', $value['category'])->count();
            // pr($maincategory, 1);
            if($maincategory == 0) {

              $basecategory = categoryModel::create([
                "category_name" => $value['category'],
                "maincategory_id" => $maincatid,
              ]);

              $main_category_id = $basecategory->id;
              /*Check if sub category exists or not*/

              if(!empty($main_category_id)) {
                $response = $this->save_category_products($maincatid,  $value);
                // pr($response);
                $res = json_decode($response, true);

                if($res['status'] == 200) {
                  $success = 0;
                } else {
                  $log = ['message' => 'Error in saving products', 'description' =>  'Error in saving data for save category products'];
                  admin_write_log($log);
                  $fail++;
                }
              } else {
                $log = ['message' => 'Error in inserting main category id', 'description' =>  'maincategory last iserted id was not found'];
                admin_write_log($log);
                $fail++;
              }
            } else {
              /*Get main category id if it already exists*/
              $main_category_id = categoryModel::select('id')->where('category_name', '=', $value['category'])->get();
              $main_id = $main_category_id[0]->id;

              /*if main category exists save the sub category*/
              if(!empty($main_id)) {
                $matchproducts = ['maincategory_id' => $main_id,  'product_id' => $value['product_id']];
                $checkproducts = wishfieldmodel::where($matchproducts)->count();
                if ($checkproducts == 0) {
                  $response = $this->save_category_products($main_id, $value);
                  $res = json_decode($response, true);

                  if($res['status'] == 200) {
                    $success = 0;
                  } else {
                    $log = ['message' => 'Error in saving products', 'description' =>  'Error in saving data for save products check save_category_products'];
                    admin_write_log($log);
                    $fail++;
                  }
                } else {
                  $checkproducts_id = wishfieldmodel::select('*')->where($matchproducts)->get();

                  $product_table_id = $checkproducts_id[0]->id;

                  $response = $this->update_products_data($main_id,  $value, $product_table_id);

                  $res = json_decode($response, true);

                  if($res['status'] == 200) {
                    $success = 0;
                  } else {
                    $log = ['message' => 'Error in saving products', 'description' =>  'Error in saving data for save products check save_category_products'];
                    admin_write_log($log);
                    $fail++;
                  }
                }
              }
            }
          }

        } else {
          $log = ['message' => 'Maincategory id was not found', 'description' => 'Main category id was not found might be some issue in exploding the values'];
          admin_write_log($log);
          return json_encode(['msg'=>'Failed to add the data Please contact admin', 'status'=>400]);
        }

      } else {
          $log = ['message' => 'Uploded sheet is empty', 'description' =>  'Uploaded sheet count was found 0'];
          admin_write_log($log);
          return json_encode(['msg'=>'Failed to add the data Please contact admin', 'status'=>400]);
      }

      if($fail == 0) {
        return json_encode(['msg'=>'Successfully added the data', 'status'=>200]);
      } else {
        return json_encode(['msg'=>'Failed to add the data Please contact admin', 'status'=>400]);
      }

    } catch (\Exception $e) {
      $log = ['message' => 'Error in saving value to database', 'description' =>  $e->getMessage()];
      admin_write_log($log);
      return json_encode(['status'=>400, 'msg'=>'error in saving data']);
    }
  }

  /*save fields data*/
  public function save_category_products($main_cat_id,  $array) {
    try {
      $products_data = new wishfieldmodel();
      $products_data->maincategory_id = $main_cat_id;
      $products_data->product_id = $array['product_id'];
      $products_data->product_link = $array['product_link'];
      $products_data->product_image = $array['product_image'];
      $products_data->search_phrase = $array['search_phrase'];
      $products_data->title = $array['title'];
      $products_data->price = $array['price'];
      $products_data->price_shipping = $array['price_shipping'];
      $products_data->currency = $array['currency'];
      $products_data->minimum_delivery = $array['minimum_delivery'];
      $products_data->maximum_delivery = $array['maximum_delivery'];
      $products_data->delivery_difference = $array['delivery_difference'];
      $products_data->estimated_arrival = $array['estimated_arrival'];
      $products_data->product_rating = $array['product_rating'];
      $products_data->product_rating_count = $array['product_rating_count'];
      $products_data->total_inventory = $array['total_inventory'];
      $products_data->orders = $array['orders'];
      $products_data->shipping_badge = $array['shipping_badge'];
      $products_data->size_rating_count = $array['size_rating_count'];
      $products_data->rating_to_small = $array['rating_too_small'];
      $products_data->rating_just_right = $array['rating_just_right'];
      $products_data->rating_too_big = $array['rating_too_big'];
      $products_data->description = $array['description'];
      $products_data->keywords = $array['keywords'];
      $products_data->verified_by_wishstore = $array['verified_by_wishstore'];
      $products_data->store = $array['store'];
      $products_data->store_link = $array['store_link'];
      $products_data->store_rating = $array['store_rating'];
      $products_data->store_rating_count = $array['store_rating_count'];
       // pr($products_data, 1);
      $products_data->save();

      $last_inserted = $products_data->id;

      if(!empty($last_inserted)) {
        return json_encode(['status' => 200, 'msg' => 'Products are saved successfully', 'lastinserted_id'=>$last_inserted]);
      } else {
        $log = ['status' => 200, 'message' => 'Error in fetching last inserted id', 'description' => 'Please contcat admin there was some issue saving the products details'];
        admin_write_log($log);
        return json_encode(['status' => 400 , 'msg' => 'Error in saving data Please contact admin']);
      }

    } catch (\Exception $e) {
      pr($e->getMessage(), 1);
      $log = ['message' => 'Error in saving products to databse', 'description' =>  $e->getMessage()];
      admin_write_log($log);
      return json_encode(['status'=> 400, 'msg'=>'Error in saving products']);
    }
  }

  /*Update the products category*/

  public function update_products_data($main_cat_id,  $array, $update_id) {

    try {
      $arr = array('maincategory_id'=>$main_cat_id, 'product_id'=>$array['product_id'], 'product_link'=>$array['product_link'], 'product_image'=>$array['product_image'], 'search_phrase'=>$array['search_phrase'], 'title'=>$array['title'],'price'=>$array['price'], 'price_shipping'=>$array['price_shipping'], 'currency'=>$array['currency'], 'minimum_delivery'=>$array['minimum_delivery'], 'maximum_delivery'=>$array['maximum_delivery'], 'delivery_difference'=>$array['delivery_difference'], 'estimated_arrival'=>$array['estimated_arrival'], 'product_rating'=>$array['product_rating'], 'product_rating_count'=>$array['product_rating_count'], 'total_inventory'=>$array['total_inventory'], 'orders'=>$array['orders'], 'shipping_badge'=>$array['shipping_badge'],  'size_rating_count'=>$array['size_rating_count'], 'rating_to_small'=>$array['rating_too_small'], 'rating_just_right'=>$array['rating_just_right'], 'rating_too_big'=>$array['rating_too_big'], 'description'=>$array['description'], 'keywords'=>$array['keywords'], 'verified_by_wishstore'=>$array['verified_by_wishstore'], 'store'=>$array['store'], 'store_link'=>$array['store_link'], 'store_rating'=>$array['store_rating'], 'store_rating_count'=>$array['store_rating_count']);

      DB::table('wishcategoryfields')->where('id', $update_id)->update($arr);
      return json_encode(['status' => 200 , 'msg' => 'Data updated successfully','lastinserted_id'=>$update_id]);
    } catch(\Exception $e) {
      $log = ['message' => 'Error in updating products to database', 'description' =>  $e->getMessage()];
      admin_write_log($log);
      return json_encode(['status'=> 400, 'msg'=>'Error in Updating products']);
    }
  }
}
