<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subchildcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('subchildcategory', function(Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('maincategory_id');
        $table->string('subcategoryid');
        $table->string('subchildcategoryname');
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
      Schema::dropIfExists('subchildcategory');
    }
}
