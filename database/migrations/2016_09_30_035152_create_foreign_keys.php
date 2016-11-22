<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('addresses', function (Blueprint $table) {
      $table->foreign('business_id')->references('business_id')->on('businesses')->onDelete('no action')->update('no action');
      $table->foreign('user_id')->references('user_id')->on('users')->onDelete('no action')->update('no action');
    });

    Schema::table('businesses', function (Blueprint $table) {
      $table->foreign('business_type_id')->references('business_type_id')->on('business_types')->onDelete('no action')->update('no action');
    });

    Schema::table('menus', function (Blueprint $table) {
      $table->foreign('business_id')->references('business_id')->on('businesses')->onDelete('no action')->update('no action');
    });

    Schema::table('users', function (Blueprint $table) {
      $table->foreign('business_id')->references('business_id')->on('businesses')->onDelete('no action')->update('no action');
      $table->foreign('address_id')->references('address_id')->on('addresses')->onDelete('no action')->update('no action');
    });

    Schema::table('menus_menu_types', function (Blueprint $table) {
      $table->foreign('menu_id')->references('menu_id')->on('menus')->onDelete('no action')->update('no action');
      $table->foreign('menu_type_id')->references('menu_type_id')->on('menu_types')->onDelete('no action')->update('no action');
    });

    Schema::table('menu_items_menu_item_types', function (Blueprint $table) {
      $table->foreign('menu_item_id')->references('menu_item_id')->on('menu_items')->onDelete('no action')->update('no action');
      $table->foreign('menu_item_type_id')->references('menu_item_type_id')->on('menu_item_types')->onDelete('no action')->update('no action');
    });

    Schema::table('menu_items', function (Blueprint $table) {
      $table->foreign('menu_id')->references('menu_id')->on('menus')->onDelete('no action')->update('no action');
    });

    Schema::table('ingredients_menu_items', function($table) {
      $table->foreign('ingredient_id')->references('ingredient_id')->on('ingredients')->onDelete('no action')->update('no action');
      $table->foreign('menu_item_id')->references('menu_item_id')->on('menu_items')->onDelete('no action')->update('no action');
    });

    Schema::table('ingredients_ingredient_types', function (Blueprint $table) {
      $table->foreign('ingredient_id')->references('ingredient_id')->on('ingredients')->onDelete('no action')->update('no action');
      $table->foreign('ingredient_type_id')->references('ingredient_type_id')->on('ingredient_types')->onDelete('no action')->update('no action');
    });

  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('businesses', function (Blueprint $table) {
      $table->dropForeign('businesses_business_type_id_foreign');
    });

    Schema::table('users', function (Blueprint $table) {
      $table->dropForeign(['business_id']);
      $table->dropForeign(['address_id']);
      $table->dropUnique('users_email_unique');
    });

    Schema::table('addresses', function (Blueprint $table) {
      $table->dropForeign(['business_id']);
      $table->dropForeign(['user_id']);
    });

    Schema::table('menus', function (Blueprint $table) {
      $table->dropForeign(['business_id']);
    });

    Schema::table('menu_items', function (Blueprint $table) {
      $table->dropForeign(['menu_id']);
    });

    Schema::table('menu_items_menu_item_types', function (Blueprint $table) {
      $table->dropForeign(['menu_item_id']);
      $table->dropForeign(['menu_item_type_id']);
    });

    Schema::table('menus_menu_types', function (Blueprint $table) {
      $table->dropForeign(['menu_id']);
      $table->dropForeign(['menu_type_id']);
    });

    Schema::table('ingredients_ingredient_types', function (Blueprint $table) {
      $table->dropForeign(['ingredient_id']);
      $table->dropForeign(['ingredient_type_id']);
    });

    Schema::table('ingredients_menu_items', function($table) {
      $table->dropForeign(['ingredient_id']);
      $table->dropForeign(['menu_item_id']);
    });

  }
}
