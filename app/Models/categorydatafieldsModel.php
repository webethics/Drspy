<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB, App\Models\wishfieldmodel;

class categorydatafieldsModel extends Model
{
   protected $table = 'category_fields';

   public $timestamps = false;


   protected $fillable = ['maincategory_id', 'subcategory_id', 'product_id', 'product_link', 'product_image',
   'brand_name', 'title', 'price', 'video', 'ship_from_country', 'epacket', 'epacketdelivery', 'orders',
   'rating', 'reviews', 'store_age', 'wishes','cashback', 'estimated_monthly_sales', 'estimated_monthly_revenue', 'keywords',
   'store_feedback', 'store_positive_rating', 'store_followers', 'ad', 'ad_link'];

   public function get_data() {
     $result = DB::select( DB::raw('select c.maincategory_id, c.subcategory_id, c.product_image, c.price,
     c.title, c.product_link from category_fields as c UNION ALL  select w.maincategory_id, w.subcategory_id,
     w.product_image, w.price,  w.title, w.product_link from wishcategoryfields as w'));
     return $result;
   }

   public function get_ae_result($table_name, $sid, $mid) {
     $result = DB::select(DB::raw('select * from '.$table_name.' where maincategory_id = '.$mid.' and subcategory_id ='.$sid));
     // pr($result, 1);
     return $result;
   }
}
