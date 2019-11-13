<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Planfeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('plan_features', function(Blueprint $table) {
        $table->increments('id');
        $table->integer('plan_id')->unsigned();
        $table->foreign('plan_id')->references('id')->on('plan_details')->onDelete('cascade');
        $table->string('Useraccess')->nullable();
        $table->string('spy_dropship')->nullable();
        $table->string('spy_top_trending')->nullable();
        $table->string('spy_on_trending')->nullable();
        $table->string('unlimited_win_prod')->nullable();
        $table->string('ali_ex_best_seler')->nullable();
        $table->string('ali_exp_dropship_prod')->nullable();
        $table->string('aliexp_top_wished')->nullable();
        $table->string('drspy_exculsive')->nullable();
        $table->string('wish_best_seller')->nullable();
        $table->string('new_trending_prod_daily')->nullable();
        $table->string('aliex_insights')->nullable();
        $table->string('compet_intelligence')->nullable();
        $table->string('compet_ad_campaigns')->nullable();
        $table->string('access_saved_products')->nullable();
        $table->string('top_selling_trend_stores')->nullable();
        $table->string('no_access_to_store')->nullable();
        $table->string('acces_saved_store')->nullable();
        $table->string('fb_daily_post_tracking')->nullable();
        $table->string('fb_wining_ad_trend')->nullable();
        $table->string('active_ad_tracking')->nullable();
        $table->string('filter_metrics')->nullable();
        $table->string('limited_email_suport')->nullable();
        $table->string('dropship_market_training')->nullable();
        $table->string('100_extra_boosting_feature')->nullable();
        $table->string('bulk_prod_video_finder')->nullable();
        $table->string('deep_shopify_store_analyzer')->nullable();
        $table->string('deep_prod_analyzer')->nullable();
        $table->string('best_prod_res_chrom_ext')->nullable();
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
      Schema::dropIfExists('plan_features');
    }
}
