<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('user_id');
      $table->integer('business_id')->unsigned()->nullable();
      $table->integer('address_id')->unsigned()->nullable();
      $table->string('first_name', 50);
      $table->string('last_name', 50);
      $table->string('phone_number', 20);
      $table->enum('user_type', ['admin', 'patron', 'owner', 'guest'])->nullable();
      $table->string('email')->unique();
      $table->string('password');
      $table->rememberToken();
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('users');
  }
}
