<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIngredientsIngredientTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ingredients_ingredient_types', function(Blueprint $table){
        $table->increments('ingrts_ingrt_types_id');
        $table->integer('ingredient_id')->unsigned();
        $table->integer('ingredient_type_id')->unsigned();
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
      /*Schema::table('ingredients_ingredient_types', function ($table) {
        $table->dropForeign(['ingredient_id']);
        $table->dropForeign(['ingredient_type_id']);
      });*/


      Schema::dropIfExists('ingredients_ingredient_types');
    }
}
