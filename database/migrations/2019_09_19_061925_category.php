<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('categoryname', function(Blueprint $table) {
        $table->increments('id');
        $table->integer('maincategory_id')->unsigned();
        $table->foreign('maincategory_id')->references('id')->on('maincategory')->onDelete('cascade');
        $table->string('category_name');
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
      Schema::dropIfExists('categoryname');
    }
}
