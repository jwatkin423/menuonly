<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Businesses;
use App\Addresses;
use App\BusinessTypes;
use App\User;


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
      $businesses = Businesses::pluck('business_name', 'business_id');
    }

    return view('dashboard.index')
      ->with('businesses', $businesses)
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