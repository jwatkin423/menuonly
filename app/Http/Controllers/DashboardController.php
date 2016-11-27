<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Businesses;
use App\Addresses;
use App\BusinessTypes;
use App\User;
use App\Menus;


class DashboardController extends Controller {

  public function index($id) {
    $businesses = null;

    $user = User::find([$id]);

    $collect = collect($user->toArray())->map(function($item) {
      return ['user_type' => $item['user_type']];
    });

    $userArray = $collect->toArray();
    $userType = array_shift($userArray);

    if ($userType['user_type'] == 'admin') {
      $Businesses = Businesses::pluck('business_name', 'business_id');

      $Users = User::select('user_id', 'first_name', 'last_name')->get();
      $users = collect($Users)->map(function($item) {
        return ['user_name' => $item['first_name'] . ' ' . $item['last_name'], 'user_id' => $item['user_id']];
      });

      $Addresses = Addresses::select('state')->distinct()->get();
      $addresses = $Addresses->toArray();

      $Menus = Menus::pluck('menu_name', 'menu_id');
    }

    return view('dashboard.index')
      ->with('businesses', $Businesses)
      ->with('users', $users)
      ->with('addresses', $addresses)
      ->with('menus', $Menus)
      ->with('userData', $user);
  }

  public function business(Request $request) {
    $input = $request->except('_token');
    $businessId = $input['business'];

    $Business = Businesses::where('business_id' ,$businessId)
      ->with('addresses')
      ->first();

    return view('dashboard.business')
      ->with('business', $Business);
  }

}