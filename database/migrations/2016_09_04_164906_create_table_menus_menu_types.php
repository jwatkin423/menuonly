<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMenusMenuTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menus_menu_types', function (Blueprint $table) {
        $table->increments('menus_menu_type_id');
        $table->integer('menu_id')->unsigned();
        $table->integer('menu_type_id')->unsigned();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      /*Schema::table('menus_menu_types', function ($table) {
        $table->dropForeign(['menu_id']);
        $table->dropForeign(['menu_type_id']);
      });*/

      Schema::dropIfExists('menus_menu_types');
    }
}
