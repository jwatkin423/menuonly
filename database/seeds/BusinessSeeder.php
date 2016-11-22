<?php

use Illuminate\Database\Seeder;
use App\Addresses;
use App\Businesses;

class BusinessSeeder extends Seeder {

  public function run() {
    DB::table('businesses')->insert([
      'business_name' => 'Menu Only',
      'business_type_id' => 1
                        ]);
    factory(Businesses::class, 20)->create();
    factory(Addresses::class, 100)->create();

    DB::table('users')->insert([
                                 'business_id' => 1,
                                 'first_name' => 'admin',
                                 'last_name' => 'user',
                                 'email' => 'admin@menuonly.com',
                                 'password' => bcrypt('webadmin'),
                                 'user_type' => 'admin',
                                 'phone_number' => '123-456-7894']
    );

    DB::table('users')->insert([
                                 'business_id' => 1,
                                 'first_name' => 'Joseph',
                                 'last_name' => 'Watkin',
                                 'email' => 'joseph.watkin@gmail.com',
                                 'password' => bcrypt('Welcome123'),
                                 'user_type' => 'admin',
                                 'phone_number' => '561-315-4287']
    );

    DB::table('users')->insert([
                                 'business_id' => 1,
                                 'first_name' => 'Kevin',
                                 'last_name' => 'Rose',
                                 'email' => 'kevinrose@gmail.com',
                                 'password' => bcrypt('Welcome123'),
                                 'user_type' => 'admin',
                                 'phone_number' => '347-527-3370']
    );
  }

}