<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Plan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('plan_details', function(Blueprint $table) {
        $table->increments('id');
        $table->string('plan_name')->nullable();
        $table->string('plan_price')->nullable();
        $table->string('stripeplanid')->nullable();
        $table->string('planfeaturesid')->nullable();
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
      Schema::dropIfExists('plan_details');
    }
}
