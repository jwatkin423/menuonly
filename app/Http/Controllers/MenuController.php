<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Businesses;
use App\Menus;
use App\MenuTypes;
use App\MenuItems;
use Illuminate\Support\Facades\Log;


class MenuController extends Controller {

  public function create() {
    $Menu = new Menus();

    $businesses = Businesses::select('business_id', 'business_name')->pluck('business_name', 'business_id');

    // TODO: Put in a config file
    $businessSelectParams = ['class' => 'form-control', 'id' => 'menu-create'];
    $menuTypeSelectParams = ['class' => 'form-control', 'id' => 'menu-type'];

    $MenuTypes = Menutypes::select('menu_type_id', 'menu_type_descr')->pluck('menu_type_descr', 'menu_type_id');

    return view('menu.edit')
      ->with('menu', $Menu)
      ->with('edit', false)
      ->with('busSelParams', $businessSelectParams)
      ->with('buttonName', 'Create')
      ->with('business', [])
      ->with('menuTypeParams', $menuTypeSelectParams)
      ->with('menuTypes', $MenuTypes)
      ->with('items', $Menu->menuMenuItems)
      ->with('businesses', $businesses);
  }

  public function store(Request $add) {
    $menu = $add->except('_token', 'user_id');
    $userId = $add['user_id'];

    $Menu = new Menus();
    $Menu->fill($menu);

    if ($Menu->save()) {
      Log::debug('Saved!');
      Log::debug("The new menu id: {$Menu->menu_id}");
      return redirect()->route('db.home', $userId);
    } else {
      Log::debug('Not saved!');
    }
  }

  public function view(Request $get) {
    $businessSelectParams = ['class' => 'form-control', 'id' => 'menu-create'];
    $menuTypeSelectParams = ['class' => 'form-control', 'id' => 'menu-create'];
    $menuId = $get->input('menu_id');
    $businesses = Businesses::select('business_id', 'business_name')->pluck('business_name', 'business_id');

    $Menu = Menus::where('menu_id', $menuId)->with('menuType', 'menuMenuItems')->first();
    $MenuTypes = Menutypes::select('menu_type_id', 'menu_type_descr')->get();
    $menuTypes = $MenuTypes->pluck('menu_type_descr', 'menu_type_id');

    return view('menu.view')
      ->with('edit', true)
      ->with('buttonName', 'Edit')
      ->with('busSelParams', $businessSelectParams)
      ->with('business', [])
      ->with('menuTypeParams', $menuTypeSelectParams)
      ->with('menuTypes', $menuTypes)
      ->with('items', $Menu->menuMenuItems)
      ->with('businesses', $businesses)
      ->with('menu', $Menu);
  }

  public function edit(Request $get) {
    $businessSelectParams = ['class' => 'form-control', 'id' => 'menu-create'];
    $menuTypeSelectParams = ['class' => 'form-control', 'id' => 'menu-create'];
    $menuId = $get->input('menu_id');
    $businesses = Businesses::select('business_id', 'business_name')->pluck('business_name', 'business_id');

    $Menu = Menus::where('menu_id', $menuId)->with('menuType', 'menuMenuItems')->first();
    $MenuTypes = Menutypes::select('menu_type_id', 'menu_type_descr')->get();
    $menuTypes = $MenuTypes->pluck('menu_type_descr', 'menu_type_id');

    return view('menu.edit')
      ->with('edit', true)
      ->with('buttonName', 'Edit')
      ->with('busSelParams', $businessSelectParams)
      ->with('business', [])
      ->with('menuTypeParams', $menuTypeSelectParams)
      ->with('menuTypes', $menuTypes)
      ->with('items', $Menu->menuMenuItems)
      ->with('businesses', $businesses)
      ->with('menu', $Menu);
  }

  public function update(Request $update) {
    $menu = $update->except('_token', 'user_id');
    \Log::debug('info');
    $userId = $update['user_id'];

    $Menu = Menus::find($menu['menu_id']);
    $Menu->fill($menu);

    if ($Menu->save()) {
      Log::debug('Updated!');
      Log::debug("The new menu id: {$Menu->menu_id}");
      return redirect()->route('db.home', $userId);
    } else {
      Log::debug('Not updated!');
    }
  }

  private function getBusinesses() {

  }

  private function getMenus() {

  }

}