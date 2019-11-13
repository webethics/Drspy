<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB, Excel, Redirect;
use App\Models\categoryModel;
use App\Models\subcategoryModel;
use App\Models\maincategoryModel;
use App\Models\categorydatafieldsModel;
use App\Models\croncsv;
use File;

class ImportExcelController extends Controller
{
	/*import section and save file to path and values to database*/
	public function import(Request $request) {
		// pr($request->all(), 1);
		$file = Input::file('select_file');
		if(!empty($file)) {
			try {
				$request->validate([
					'select_file' => 'required',
					'extention_type' => 'required',
				]);
				$fail = 0;

				$site_name = $request->input('extention_type');
				$file_name= Input::file('select_file');
				$table_name = 'croncsv';
				if(!empty($site_name)) {
					$name = explode('-', $site_name);
					if($name[0] == 'ae') {
						$path  = '/Uploads/Aliexpress';
						$response_data = $this->upload_file($file_name, $path);
						$result = json_decode($response_data, true);
						if($result['status'] == 200) {
							$filename = $result['filename'];
							$response = $this->save_values($name[0], $filename, $table_name);
							$res = json_decode($response, true);
							if($res['status'] == 200) {
								$fail = 0;
							} else {
								$fail++;
							}
						} else {
							$fail++;
						}
					} else if($name[0] == 'wish') {
						$path  = '/Uploads/Wish';
						$response_data = $this->upload_file($file_name, $path);
						$result = json_decode($response_data, true);
						if($result['status'] == 200) {
							$filename = $result['filename'];
							$response = $this->save_values($name[0], $filename, $table_name);
							$res = json_decode($response, true);
							if($res['status'] == 200) {
								$fail = 0;
							} else {
								$fail++;
							}
						} else {
							$fail++;
						}
					}

					if($fail != 0) {
						$request->session()->flash('message.level', 'danger');
						$request->session()->flash('message.content', 'Error in updating files Please try again later!');
						return Redirect::back();
					} else {

						$request->session()->flash('message.level', 'success');
						$request->session()->flash('message.content', 'Data was saved successfully!');
						return Redirect::back();
					}
				}
			} catch (\Exception $e) {
				$log = ['message' => 'Error in importing files', 'description' =>  $e->getMessage()];
				admin_write_log($log);
				$request->session()->flash('message.level', 'danger');
				$request->session()->flash('message.content', 'Error in uploading files!');
				return Redirect::back();
			}
		} else {
		 $request->session()->flash('message.level', 'danger');
		 $request->session()->flash('message.content', 'Please select file to upload!');
		 return Redirect::back();
	 }
	}

	/*Method to upload files*/

	public function upload_file($file_name, $path) {
		try {
			$original_file_name = $file_name->getClientOriginalName();
			$extension  = $file_name->getClientOriginalExtension();
			$path = public_path($path);
			$fileWithoutExt  = str_replace(".","",basename($original_file_name, $extension));
			$updated_fileName = $fileWithoutExt."_".rand(0,99).".".$extension;
			$path_nmae = $path.$updated_fileName;
			$uploaded = $file_name->move($path, $updated_fileName);
			return json_encode(['status'=> 200,  'msg'=>'file uploaded successfully', 'filename'=>$updated_fileName]);
		} catch (\Exception $e) {
			$log = ['message' => 'Error in uploading files', 'description' =>  $e->getMessage()];
			admin_write_log($log);
			return json_encode(['status'=> 400,  'msg'=>'Error in uploading files']);
		}
	}

	/*Method to save files*/

	public function save_values($sitename, $filename, $tablename) {
		try {
			$arr = array('sitename'=>$sitename, 'csvfilename'=>$filename);
			DB::table($tablename)->insert($arr);
			return json_encode(['status'=> 200,  'msg'=>'Data saved successfully']);
		} catch (\Exception $e) {
			$log = ['message' => 'Error in saving values', 'description' =>  $e->getMessage()];
			admin_write_log($log);
			return json_encode(['status'=> 400,  'msg'=>'Error in saving values']);
		}
	}

	/*Import section start Please dont change anything untill update this is cron script*/

	public function Updatecsvdata(Request $request) {

		$files = File::files(public_path());
		//~ pr($files, 1);
		$files = File::allFiles(public_path());

		$request->validate([
			'select_file' => 'required',
			'site_name' => 'required',
		]);

		$file = $request->file('select_file');
		$path = $request->file('select_file')->getRealPath();
		$data = Excel::load($path)->get();
		$site_name = $request->site_name;

		if($data->count()) {
			$array = [];
			foreach ($data as $key => $value) {
			  $array[] = array(
						'category' => $value->category,
						'subcategory'=>$value->subcategory,
						'product_link'=> $value->product_link,
						'product_image' => $value->product_image,
						'title' => $value->title,
						'product_id' => $value->product_id,
						'price' => $value->price,
						'price_epacket' => $value->price_epacket,
						'brand_name' => $value->brand_name,
						'video' => $value->video,
						'ship_from_country' => $value->ship_from_country,
						'ship_to_country' => $value->ship_to_country,
						'free_shipping_provider'=> $value->free_shipping_provider,
						'free_shipping_provider'=> $value->free_shipping_provider,
						'epacket' => $value->epacket,
						'epacket_rate' => $value->epacket_rate,
						'epacket_delivery'=> $value->epacket_delivery,
						'variations'=>$value->variations,
						'unit_type '=>$value->unit_type,
						'orders' => $value->orders,
						'rating' => $value->rating,
						'reviews' => $value->reviews,
						'store_name'=> $value->store_name,
						'store_link'=>$value->store_link,
						'top_brand'=>$value->top_brand,
						'store_feedback_link'=>$value->store_feedback_link,
						'store_age'=>$value->store_age,
						'stock'=>$value->stock,
						'wishes'=>$value->wishes,
						'retail_price'=>$value->retail_price,
						'profit'=>$value->profit,
						'cashback'=>$value->cashback,
						'estimated_monthly_sales'=>$value->estimated_monthly_sales,
						'estimated_monthly_revenue'=>$value->estimated_monthly_revenue,
						'keywords'=>$value->keywords,
						'discount'=>$value->discount,
						'store_feedback'=>$value->store_feedback,
						'store_postive_ratings'=>$value->store_postive_ratings,
						'ad'=>$value->ad,
						'Ad_link'=>$value->ad_link,
						'store_followers'=>$value->store_followers);
			}
			//~ pr($array, 1);
			if(count($array) > 0) {
				$res = $this->save_value_to_db($array, $site_name);
				$result = json_decode($res, true);

				if($result['status'] == 200) {
					$request->session()->flash('message.level', 'success');
					$request->session()->flash('message.content', 'Data was saved successfully!');
					return Redirect::to('/admin/aeuploadaecsv');
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

						$maincategory = categoryModel::where('category_name', '=', $value['category'])->count();

						if($maincategory == 0) {

							$basecategory = categoryModel::create([
								"category_name" => $value['category'],
								"maincategory_id" => $maincatid,
							]);

							$main_category_id = $basecategory->id;

							/*Check if sub category exists or not*/

							$matchthese = ['maincategory_id' => $main_category_id, 'subcat_name' => $value['subcategory']];

							$sub_category = subcategoryModel::where($matchthese)->count();

							if(!empty($main_category_id)) {

								if($sub_category == 0) {

									$res = $this->save_sub_category($maincatid, $main_category_id, $value['subcategory']);
									$result = json_decode($res, true);
									if($result['status'] == 200) {

										$inserted_sub_id = $result['lastinserted_id'];

										if(!empty($inserted_sub_id)) {
											$response = $this->save_category_products($maincatid, $inserted_sub_id, $value);
											$res = json_decode($response, true);

											if($res['status'] == 200) {
												$success = 0;
											} else {
												$log = ['message' => 'Error in saving products', 'description' =>  'Error in saving data for save category products'];
												admin_write_log($log);
												$fail++;
											}

										} else {
											$log = ['message' => 'last instered id for subcategories', 'description' =>  'subcategory last iserted id was not found'];
											admin_write_log($log);
											$fail++;
										}


									} else {
										$log = ['message' => 'Error in saving sub categories', 'description' =>  'Error in saving data for save sub category check save_sub_category1s1'];
										admin_write_log($log);
										$fail++;
									}
								}
							}

						}	else {

							/*Get main category id if it already exists*/
							$main_category_id = categoryModel::select('id')->where('category_name', '=', $value['category'])->get();

							$main_id = $main_category_id[0]->id;

							/*Check if sub category exists or not*/

							$matchthese = ['maincategory_id' => $maincatid, 'category_id' => $main_id,  'subcat_name' => $value['subcategory']];

							$sub_category = subcategoryModel::where($matchthese)->count();

							/*if main category exists save the sub category*/
							if(!empty($main_id)) {

								if($sub_category == 0) {

									$res = $this->save_sub_category($maincatid, $main_id, $value['subcategory']);
									$result = json_decode($res, true);


									if($result['status'] == 200) {

										$inserted_sub_id = $result['lastinserted_id'];

										$matchproducts = ['maincategory_id' => $maincatid, 'subcategory_id'=>$inserted_sub_id, 'product_id' => $value['product_id']];

										$checkproducts = categorydatafieldsModel::where($matchproducts)->count();

										if(!empty($inserted_sub_id)) {

											if ($checkproducts == 0) {
												$response = $this->save_category_products($maincatid, $inserted_sub_id, $value);
												$res = json_decode($response, true);

												if($res['status'] == 200) {
													$success = 0;
												} else {
													$log = ['message' => 'Error in saving products', 'description' =>  'Error in saving data for save products check save_category_products'];
													admin_write_log($log);
													$fail++;
												}
											} else {
												$checkproducts_id = categorydatafieldsModel::select('*')->where($matchproducts)->get();

												$product_table_id = $checkproducts_id[0]->id;

												$response = $this->update_products_data($maincatid, $inserted_sub_id, $value, $product_table_id);

												$res = json_decode($response, true);

												if($res['status'] == 200) {
													$success = 0;
												} else {
													$log = ['message' => 'Error in saving products', 'description' =>  'Error in saving data for save products check save_category_products'];
													admin_write_log($log);
													$fail++;
												}
											}
										} else {
											$log = ['message' => 'Error in saving sub categories', 'description' =>  'Error in saving data for save sub categories check save_category_products'];
											admin_write_log($log);
											$fail++;
										}
									} else {
										$log = ['message' => 'Error in saving child categories', 'description' =>  'Error in saving data for save child categories check save_sub_category22'];
										admin_write_log($log);
										$fail++;
									}

								} else {

									/*Getting sub category */

									$sub_category_id = subcategoryModel::select('id')->where($matchthese)->get();
									$subcategory_id = $sub_category_id[0]->id;

									$matchproducts = ['maincategory_id' => $maincatid, 'subcategory_id'=>$subcategory_id, 'product_id' => $value['product_id']];

									$checkproducts = categorydatafieldsModel::where($matchproducts)->count();

									if(!empty($subcategory_id)) {

										if ($checkproducts == 0) {

											$response = $this->save_category_products($maincatid, $subcategory_id, $value);
											$res = json_decode($response, true);

											if($res['status'] == 200) {
												$success = 0;
											} else {
												$log = ['message' => 'Error in saving products', 'description' =>  'Error in saving data for save products check save_category_products'];
												admin_write_log($log);
												$fail++;
											}

										} else {

											$checkproducts_id = categorydatafieldsModel::select('*')->where($matchproducts)->get();

											$product_table_id = $checkproducts_id[0]->id;

											$response = $this->update_products_data($maincatid, $subcategory_id, $value, $product_table_id);

											$res = json_decode($response, true);

											if($res['status'] == 200) {
												$success = 0;
											} else {
												$log = ['message' => 'Error in saving products', 'description' =>  'Error in saving data for save products check save_category_products'];
												admin_write_log($log);
												$fail++;
											}
										}
									} else {
										$log = ['message' => 'Subbcategory exists but id not found', 'description' =>  'subcategory exists but id not comming, Please check matchthese query'];
										admin_write_log($log);
										$fail++;
									}
								}
							} else {
								$log = ['message' => 'Main category exists but id not found', 'description' =>  'Main category exists but id not found, Please check main category query'];
								admin_write_log($log);
								$fail++;
							}
						}
					}
				}  else {
					$log = ['message' => 'Maincategory id was not found', 'description' => 'Main category id was not found might be some issue in explode'];
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

	/*Save the subcategory data*/
	public function save_sub_category($main_id, $baseid, $value) {
		try {
			$subcategorydata = new subcategoryModel();
			$subcategorydata->category_id =  $baseid;
			$subcategorydata->maincategory_id =  $main_id;
			$subcategorydata->subcat_name = $value;
			$subcategorydata->save();

			$last_inserted_id = $subcategorydata->id;

			if(!empty($last_inserted_id)) {
				return json_encode(['status' => 200, 'msg' => 'Subcategory saved successfully', 'lastinserted_id'=>$last_inserted_id]);
			} else {
				$log = ['status' => 200, 'message' => 'Error in fetching last inserted id', 'description' => 'Please contcat admin there was some issue in getting the last inserted id'];
				admin_write_log($log);
				return json_encode(['status' => 400 , 'msg' => 'Error in saving data Please contact admin']);
			}
		} catch (\Exception $e ) {
			$log = ['message' => 'Error in saving subcategory value to the datbase', 'description' =>  $e->getMessage()];
			admin_write_log($log);
			return json_encode(['status'=> 400, 'msg'=>'error in saving subcategorydata']);
		}
	}

	/*Save sub Child category id*/
	public function save_child_categories($main_id, $subcategoryid, $value) {
		try {
			$subchildcategorydata = new subchildcategoryModel();
			$subchildcategorydata->maincategory_id = $main_id;
			$subchildcategorydata->subcategoryid = $subcategoryid;
			$subchildcategorydata->subchildcategoryname = $value;
			$subchildcategorydata->save();

			$last_inserted_id = $subchildcategorydata->id;

			if(!empty($last_inserted_id)) {

				return json_encode(['status' => 200, 'msg' => 'Sub child category saved successfully', 'lastinserted_id'=>$last_inserted_id]);

			} else {
				$log = ['status' => 200, 'message' => 'Error in fetching last inserted id', 'description' => 'Please contcat admin there was some issue in getting the last inserted id for sub child catgeories'];
				admin_write_log($log);
				return json_encode(['status' => 400 , 'msg' => 'Error in saving data Please contact admin']);
			}

		} catch (Exception $e) {
			$log = ['message' => 'Error in saving subchild category value to the datbase', 'description' =>  $e->getMessage()];
			admin_write_log($log);
			return json_encode(['status'=> 400, 'msg'=>'Error in saving sub child categorydata']);
		}
	}

	/*save fields data*/
	public function save_category_products($main_cat_id, $sub_category_id, $array) {
		//~ pr($array, 1);
		try {
			$products_data = new categorydatafieldsModel();
			$products_data->maincategory_id = $main_cat_id;
			$products_data->subcategory_id = $sub_category_id;
			$products_data->product_link = $array['product_link'];
			$products_data->product_image = $array['product_image'];
			$products_data->title = $array['title'];
			$products_data->price = $array['price'];
			$products_data->video = $array['video'];
			$products_data->ship_from_country = $array['ship_from_country'];
			$products_data->epacket = $array['epacket'];
			$products_data->epacketdelivery = $array['epacket_delivery'];
			$products_data->orders = $array['orders'];
			$products_data->rating = $array['rating'];
			$products_data->reviews = $array['reviews'];
			$products_data->store_age = $array['store_age'];
			$products_data->wishes = $array['wishes'];
			$products_data->cashback = $array['cashback'];
			$products_data->estimated_monthly_sales = $array['estimated_monthly_sales'];
			$products_data->estimated_monthly_revenue = $array['estimated_monthly_revenue'];
			$products_data->keywords = $array['keywords'];
			$products_data->store_feedback = $array['store_feedback'];
			$products_data->store_positive_rating = $array['store_postive_ratings'];
			$products_data->store_followers = $array['store_followers'];
			$products_data->product_id = $array['product_id'];
			$products_data->brand_name = $array['brand_name'];
			$products_data->ad = $array['ad'];
			$products_data->ad_link = $array['Ad_link'];

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

			$log = ['message' => 'Error in saving products to databse', 'description' =>  $e->getMessage()];
			admin_write_log($log);
			return json_encode(['status'=> 400, 'msg'=>'Error in saving products']);
		}
	}

	/*Update the products category*/

	public function update_products_data($main_cat_id, $sub_category_id, $array, $update_id) {

		try {
			$arr = array('maincategory_id'=>$main_cat_id, 'subcategory_id'=>$sub_category_id, 'product_link'=>$array['product_link'], 'product_image'=>$array['product_image'], 'title'=>$array['title'], 'price'=>$array['price'], 'video'=>$array['video'], 'ship_from_country'=>$array['ship_from_country'], 'epacket'=>$array['epacket'], 'epacketdelivery'=>$array['epacket_delivery'], 'orders'=>$array['orders'], 'rating'=>$array['rating'], 'reviews'=>$array['reviews'], 'store_age'=>$array['store_age'], 'wishes'=>$array['wishes'], 'cashback'=>$array['cashback'], 'estimated_monthly_sales'=>$array['estimated_monthly_sales'], 'estimated_monthly_revenue'=>$array['estimated_monthly_revenue'], 'keywords'=>$array['keywords'], 'store_feedback'=>$array['store_feedback'], 'store_positive_rating'=>$array['store_postive_ratings'], 'store_followers'=>$array['store_followers'], 'product_id'=>$array['product_id'], 'brand_name'=>$array['brand_name'], 'ad'=>$array['ad'], 'ad_link'=>$array['Ad_link']);

            DB::table('category_fields')->where('id', $update_id)->update($arr);
            return json_encode(['status' => 200 , 'msg' => 'Data updated successfully','lastinserted_id'=>$update_id]);
		} catch(\Exception $e) {
			$log = ['message' => 'Error in updating products to database', 'description' =>  $e->getMessage()];
			admin_write_log($log);
			return json_encode(['status'=> 400, 'msg'=>'Error in Updating products']);
		}
	}
}
