<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(App\Addresses::class, function(Faker\Generator $faker) {

  return [
    'address_one' => $faker->streetAddress,
    'address_two' => $faker->regexify('[A-Z]{3}'). ' ' . random_int(10, 1456),
    'business_id' => random_int(\DB::table('businesses')->min('business_id'), \DB::table('businesses')->max('business_id')),
    'city' => $faker->city,
    'state' => $faker->stateAbbr,
    'zip_code' => $faker->postcode
  ];

});

$factory->define(App\Businesses::class, function(Faker\Generator $faker) {

  return [
    'business_name' => $faker->company,
    'business_type_id' => random_int(\DB::table('business_types')->min('business_type_id'),
                                     \DB::table('business_types')->max('business_type_id'))
  ];

});
