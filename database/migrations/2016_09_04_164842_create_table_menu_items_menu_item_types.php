<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMenuItemsMenuItemTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menu_items_menu_item_types', function (Blueprint $table) {
        $table->increments('menu_items_types_id');
        $table->integer('menu_item_type_id')->unsigned();
        $table->integer('menu_item_id')->unsigned();
        $table->softDeletes();
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

      /*Schema::table('menu_items_menu_item_types', function ($table) {
        $table->dropForeign(['menu_item_id']);
        $table->dropForeign(['menu_item_type_id']);
      });*/

      Schema::dropIfExists('menu_items_menu_item_types');
    }
}
