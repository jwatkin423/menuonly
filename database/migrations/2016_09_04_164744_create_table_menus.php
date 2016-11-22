<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menus', function (Blueprint $table) {
        $table->increments('menu_id');
        $table->integer('business_id')->unsigned();
        $table->string('menu_name');
        $table->integer('menu_type_id');
        $table->dateTime('date_valid_from')->nullable();
        $table->dateTime('date_valid_to')->nullable();
        $table->string('days_valid', 20)->nullable();
        $table->date('range_valid_from')->nullable();
        $table->date('range_valid_to')->nullable();
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
      Schema::dropIfExists('menus');
    }
}
