<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categoryfields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      Schema::create('category_fields', function(Blueprint $table) {
        $table->bigIncrements('id');
        $table->integer('maincategory_id')->nullable();
        $table->integer('subcategory_id')->nullable();
        $table->string('product_id')->nullable();
        $table->string('product_link')->nullable();
        $table->string('product_image')->nullable();
        $table->string('brand_name')->nullable();
        $table->string('title')->nullable();
        $table->string('price')->nullable();
        $table->string('video')->nullable();
        $table->string('ship_from_country')->nullable();
        $table->string('epacket')->nullable();
        $table->string('epacketdelivery')->nullable();
        $table->string('orders')->nullable();
        $table->string('rating')->nullable();
        $table->string('reviews')->nullable();
        $table->string('store_age')->nullable();
        $table->string('wishes')->nullable();
        $table->string('cashback')->nullable();
        $table->string('estimated_monthly_sales')->nullable();
        $table->string('estimated_monthly_revenue')->nullable();
        $table->string('keywords')->nullable();
        $table->string('store_feedback')->nullable();
        $table->string('store_positive_rating')->nullable();
        $table->string('store_followers')->nullable();
        $table->string('ad')->nullable();
        $table->string('ad_link')->nullable();
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrent();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::dropIfExists('category_fields');
    }
}
