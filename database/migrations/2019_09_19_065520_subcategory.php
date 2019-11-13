<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('subcategorytable', function(Blueprint $table) {
        $table->increments('subid');
        $table->integer('category_id')->unsigned();
        $table->foreign('category_id')->references('id')->on('categoryname')->onDelete('cascade');
        $table->integer('maincategory_id')->unsigned();
        $table->foreign('maincategory_id')->references('id')->on('maincategory')->onDelete('cascade');
        $table->string('subcat_name');
        $table->timestamp('created_at')->useCurrent();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('subcategorytable');
    }
}
