<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('addresses', function (Blueprint $table) {
        $table->increments('address_id');
        $table->integer('business_id')->unsigned()->nullable();
        $table->integer('user_id')->unsigned()->nullable();
        $table->string('address_one', 50);
        $table->string('address_two', 50);
        $table->string('city', 50);
        $table->string('state', 2);
        $table->string('zip_code', 15);
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
      Schema::dropIfExists('addresses');
    }
}
