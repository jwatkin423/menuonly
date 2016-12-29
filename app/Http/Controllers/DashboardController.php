<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Businesses;
use App\Addresses;
use App\BusinessTypes;
use App\User;
use App\Menus;
//use DB;

class DashboardController extends Controller {

  public function index($id) {
    $Businesses = [];
    $Users = [];
    $Menus = [];
    $addresses = [];

    $user = User::find([$id]);

    $collect = collect($user->toArray())->map(function ($item) {
      return ['user_type' => $item['user_type']];
    });

    $userArray = $collect->toArray();
    $userType = array_shift($userArray);

    if ($userType['user_type'] == 'admin') {
      $Businesses = Businesses::pluck('business_name', 'business_id');

      $states = Config::get('form.state');
      $Addresses = Addresses::select('state')->distinct()->orderBy('state', 'asc')->get();
      $addresses = collect($Addresses)->mapWithKeys(function ($item) use ($states) {
        $temp[$item['state']] = $states[$item['state']];
        return $temp;
      });

      $Users = User::select(\DB::raw("CONCAT(first_name, ' ', last_name) AS name"), 'user_id')->pluck('name', 'user_id');
      $Menus = Menus::pluck('menu_name', 'menu_id');
    }

    return view('dashboard.index')
      ->with('businesses', $Businesses)
      ->with('users', $Users)
      ->with('addresses', $addresses)
      ->with('menus', $Menus)
      ->with('userData', $user);
  }

  public function business(Request $request) {
    $input = $request->except('_token');
    $businessId = $input['business'];

    $Business = Businesses::where('business_id', $businessId)->with('addresses')->first();

    return view('dashboard.business')->with('business', $Business);
  }

}