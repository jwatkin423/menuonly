<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMenuItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menu_items', function ($table) {
        $table->increments('menu_item_id');
        $table->string('menu_item_descr', 255)->nullable();
        $table->integer('menu_id')->unsigned();
        $table->decimal('menu_price', 7, 2)->length(10);
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
      Schema::dropIfExists('menu_items');
    }
}
