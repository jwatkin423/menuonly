<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Businesses;
use App\Addresses;
use App\BusinessTypes;
use App\User;
use App\Menus;


class MenuController extends Controller {

  public function create() {
    $Menu = new Menus();

    $Businesses = Businesses::select('business_id', 'business_name')->get();
    $businesses = $Businesses->pluck('business_name', 'business_id');
    $businessSelectParams = ['class' => 'form-control', 'id' => 'menu-create'];

    return view('menu.edit')
      ->with('menu', $Menu)
      ->with('edit', false)
      ->with('buSelParams', $businessSelectParams)
      ->with('buttonName')
      ->with('buttonName', 'Create')
      ->with('businesses', $businesses);
  }

  public function store(Request $request) {

  }

  public function edit($menu_id) {

  }

  public function update(Request $request) {

  }

}