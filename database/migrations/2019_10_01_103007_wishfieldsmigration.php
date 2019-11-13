<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Wishfieldsmigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('wishcategoryfields', function(Blueprint $table) {
        $table->bigIncrements('id');
        $table->integer('maincategory_id')->nullable();
        $table->integer('subcategory_id')->nullable();
        $table->string('product_id')->nullable();
        $table->string('product_link')->nullable();
        $table->string('product_image')->nullable();
        $table->string('search_phrase')->nullable();
        $table->string('title')->nullable();
        $table->string('price')->nullable();
        $table->string('price_shipping')->nullable();
        $table->string('currency')->nullable();
        $table->string('minimum_delivery')->nullable();
        $table->string('maximum_delivery')->nullable();
        $table->string('delivery_difference')->nullable();
        $table->string('estimated_arrival')->nullable();
        $table->string('product_rating')->nullable();
        $table->string('product_rating_count')->nullable();
        $table->string('total_inventory')->nullable();
        $table->string('orders')->nullable();
        $table->string('shipping_badge')->nullable();
        $table->string('variations')->nullable();
        $table->string('size_rating_count')->nullable();
        $table->string('rating_to_small')->nullable();
        $table->string('rating_just_right')->nullable();
        $table->string('rating_too_big')->nullable();
        $table->string('description')->nullable();
        $table->string('keywords')->nullable();
        $table->string('verified_by_wishstore')->nullable();
        $table->string('store')->nullable();
        $table->string('store_link')->nullable();
        $table->string('store_rating')->nullable();
        $table->string('store_rating_count')->nullable();
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrent();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('wishcategoryfields');
    }
}
