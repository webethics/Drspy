<?php
  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  class wishfieldmodel extends Model
  {
    protected $table = "wishcategoryfields";

    protected $fillable = ['maincategory_id',
  'subcategory_id',
  'product_id',
  'product_link',
  'product_image',
  'search_phrase',
  'title',
  'price',
  'price_shipping',
  'currency',
  'minimum_delivery',
  'maximum_delivery',
  'delivery_difference',
  'estimated_arrival',
  'product_rating',
  'product_rating_count',
  'total_inventory',
  'orders',
  'shipping_badge',
  'variations',
  'size_rating_count',
  'rating_to_small',
  'rating_just_right',
  'rating_too_big',
  'description',
  'keywords',
  'verified_by_wishstore',
  'store',
  'store_link',
  'store_rating',
  'store_rating_count'];
}
