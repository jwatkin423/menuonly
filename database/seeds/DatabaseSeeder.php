<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('ingredients')->insert(['ingredient_name' => 'tomato']);
    DB::table('ingredients')->insert(['ingredient_name' => 'onion']);
    DB::table('ingredients')->insert(['ingredient_name' => 'garlic']);
    DB::table('ingredients')->insert(['ingredient_name' => 'carrots']);
    DB::table('ingredients')->insert(['ingredient_name' => 'celery']);
    DB::table('ingredients')->insert(['ingredient_name' => 'honey']);
    DB::table('ingredients')->insert(['ingredient_name' => 'wine', 'ingredient_descr' => 'red']);
    DB::table('ingredients')->insert(['ingredient_name' => 'wine', 'ingredient_descr' => 'white']);
    DB::table('ingredients')->insert(['ingredient_name' => 'salt']);
    DB::table('ingredients')->insert(['ingredient_name' => 'salt', 'ingredient_descr' => 'sea']);
    DB::table('ingredients')->insert(['ingredient_name' => 'pepper', 'ingredient_descr' => 'green']);
    DB::table('ingredients')->insert(['ingredient_name' => 'pepper', 'ingredient_descr' => 'red']);
    DB::table('ingredients')->insert(['ingredient_name' => 'pepper', 'ingredient_descr' => 'yellow']);
    DB::table('ingredients')->insert(['ingredient_name' => 'pepper', 'ingredient_descr' => 'black']);
    DB::table('ingredients')->insert(['ingredient_name' => 'basil', 'ingredient_descr' => 'herb']);
    DB::table('ingredients')->insert(['ingredient_name' => 'thyme', 'ingredient_descr' => 'herb']);
    DB::table('ingredients')->insert(['ingredient_name' => 'oregano', 'ingredient_descr' => 'herb']);
    DB::table('ingredients')->insert(['ingredient_name' => 'rosemary', 'ingredient_descr' => 'herb']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cinnamon', 'ingredient_descr' => 'spice']);
    DB::table('ingredients')->insert(['ingredient_name' => 'ginger', 'ingredient_descr' => 'spice']);
    DB::table('ingredients')->insert(['ingredient_name' => 'nutmeg', 'ingredient_descr' => 'spice']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cloves', 'ingredient_descr' => 'spice']);
    DB::table('ingredients')->insert(['ingredient_name' => 'curry', 'ingredient_descr' => 'spice']);
    DB::table('ingredients')->insert(['ingredient_name' => 'butter', 'ingredient_descr' => 'dairy']);
    DB::table('ingredients')->insert(['ingredient_name' => 'butter', 'ingredient_descr' => 'non-dairy']);
    DB::table('ingredients')->insert(['ingredient_name' => 'olive oil']);
    DB::table('ingredients')->insert(['ingredient_name' => 'soy sauce']);
    DB::table('ingredients')->insert(['ingredient_name' => 'egg']);
    DB::table('ingredients')->insert(['ingredient_name' => 'mushroom']);
    DB::table('ingredients')->insert(['ingredient_name' => 'chicken']);
    DB::table('ingredients')->insert([
                                       'ingredient_name' => 'breaded chicken',
                                       'ingredient_descr' => 'fried breaded chicken'
                                     ]);
    DB::table('ingredients')->insert(['ingredient_name' => 'beef']);
    DB::table('ingredients')->insert(['ingredient_name' => 'turkey']);
    DB::table('ingredients')->insert(['ingredient_name' => 'fish']);
    DB::table('ingredients')->insert(['ingredient_name' => 'pork']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cheese', 'ingredient_descr' => 'american']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cheese', 'ingredient_descr' => 'cheddar']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cheese', 'ingredient_descr' => 'swiss']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cheese', 'ingredient_descr' => 'bleu cheese']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cheese', 'ingredient_descr' => 'mozzarella']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cheese', 'ingredient_descr' => 'parmesan']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cheese', 'ingredient_descr' => 'feta']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cheese', 'ingredient_descr' => 'gouda']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cheese', 'ingredient_descr' => 'monterey jack']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cheese', 'ingredient_descr' => 'pepper jack']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cheese', 'ingredient_descr' => 'colby jack']);
    DB::table('ingredients')->insert(['ingredient_name' => 'cheese', 'ingredient_descr' => 'munster']);
    DB::table('ingredients')->insert(['ingredient_name' => 'noodles']);
    DB::table('ingredients')->insert(['ingredient_name' => 'flour']);
    DB::table('ingredients')->insert(['ingredient_name' => 'rice', 'ingredient_descr' => 'brown']);
    DB::table('ingredients')->insert(['ingredient_name' => 'rice', 'ingredient_descr' => 'white']);
    DB::table('ingredients')->insert(['ingredient_name' => 'wheat', 'ingredient_descr' => 'brown, non processed']);
    DB::table('ingredients')->insert(['ingredient_name' => 'gluten']);
    DB::table('ingredients')->insert(['ingredient_name' => 'sugar', 'ingredient_descr' => 'pure cane/white']);
    DB::table('ingredients')->insert(['ingredient_name' => 'sugar', 'ingredient_descr' => 'pure cane/white/organic']);
    DB::table('ingredients')->insert(['ingredient_name' => 'sugar', 'ingredient_descr' => 'non-gmo']);
    DB::table('ingredients')->insert(['ingredient_name' => 'sugar', 'ingredient_descr' => 'brown']);
    DB::table('ingredients')->insert(['ingredient_name' => 'sugar', 'ingredient_descr' => 'brown organic']);
    DB::table('ingredients')->insert(['ingredient_name' => 'milk', 'ingredient_descr' => 'dairy']);
    DB::table('ingredients')->insert(['ingredient_name' => 'milk', 'ingredient_descr' => 'non-dairy']);

    DB::table('menu_types')->insert(['menu_type_descr' => 'breakfast']);
    DB::table('menu_types')->insert(['menu_type_descr' => 'brunch']);
    DB::table('menu_types')->insert(['menu_type_descr' => 'dinner']);
    DB::table('menu_types')->insert(['menu_type_descr' => 'Kosher']);
    DB::table('menu_types')->insert(['menu_type_descr' => 'lunch']);
    DB::table('menu_types')->insert(['menu_type_descr' => 'permanent']);
    DB::table('menu_types')->insert(['menu_type_descr' => 'seasonal']);
    DB::table('menu_types')->insert(['menu_type_descr' => 'temporary']);
    DB::table('menu_types')->insert(['menu_type_descr' => 'Vegan']);

    DB::table('menu_item_types')->insert(['menu_item_type_descr' => 'Bitter']);
    DB::table('menu_item_types')->insert(['menu_item_type_descr' => 'Kosher']);
    DB::table('menu_item_types')->insert(['menu_item_type_descr' => 'Hot']);
    DB::table('menu_item_types')->insert(['menu_item_type_descr' => 'Parv']);
    DB::table('menu_item_types')->insert(['menu_item_type_descr' => 'Savory']);
    DB::table('menu_item_types')->insert(['menu_item_type_descr' => 'Seasonal']);
    DB::table('menu_item_types')->insert(['menu_item_type_descr' => 'Spicy']);
    DB::table('menu_item_types')->insert(['menu_item_type_descr' => 'Sweet']);
    DB::table('menu_item_types')->insert(['menu_item_type_descr' => 'Vegan']);

    DB::table('business_types')->insert(['business_type_name' => 'Admin-menuonly']);
    DB::table('business_types')->insert(['business_type_name' => 'American']);
    DB::table('business_types')->insert(['business_type_name' => 'Asian-Fusion']);
    DB::table('business_types')->insert(['business_type_name' => 'Breakfast']);
    DB::table('business_types')->insert(['business_type_name' => 'Buffet']);
    DB::table('business_types')->insert(['business_type_name' => 'Caribbean']);
    DB::table('business_types')->insert(['business_type_name' => 'Chinese']);
    DB::table('business_types')->insert(['business_type_name' => 'Diner']);
    DB::table('business_types')->insert(['business_type_name' => 'Dinner']);
    DB::table('business_types')->insert(['business_type_name' => 'European']);
    DB::table('business_types')->insert(['business_type_name' => 'French']);
    DB::table('business_types')->insert(['business_type_name' => 'German']);
    DB::table('business_types')->insert(['business_type_name' => 'Greek']);
    DB::table('business_types')->insert(['business_type_name' => 'Indian']);
    DB::table('business_types')->insert(['business_type_name' => 'Italian']);
    DB::table('business_types')->insert(['business_type_name' => 'Japanese']);
    DB::table('business_types')->insert(['business_type_name' => 'Jewish']);
    DB::table('business_types')->insert(['business_type_name' => 'Lunch']);
    DB::table('business_types')->insert(['business_type_name' => 'Mediterranean']);
    DB::table('business_types')->insert(['business_type_name' => 'Mexican']);
    DB::table('business_types')->insert(['business_type_name' => 'Middle Eastern']);
    DB::table('business_types')->insert(['business_type_name' => 'Steak House']);
    DB::table('business_types')->insert(['business_type_name' => 'Street meet']);

  }
}