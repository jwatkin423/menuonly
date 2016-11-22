<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIngredientsMenuItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ingredients_menu_items', function (Blueprint $table) {
        $table->increments('ingts_menu_item_id');
        $table->integer('ingredient_id')->unsigned();
        $table->integer('menu_item_id')->unsigned();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      /*Schema::table('ingredients_menu_items', function($table) {
        $table->dropForeign(['ingredient_id']);
        $table->dropForeign(['menu_item_id']);
      });*/

      Schema::dropIfExists('ingredients_menu_items');
    }
}
