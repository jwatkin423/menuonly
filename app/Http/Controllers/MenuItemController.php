<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menus;
use App\MenuTypes;
use App\MenuItems;


class MenuItemController extends Controller {

  public function list($menu_id) {
    $MenuItems = MenuItems::select('menu_id', 'menu_item_descr', 'menu_price')->where('menu_id', $menu_id)->get();

    return $MenuItems;

  }

  public function create() {
    $businessSelectParams = ['class' => 'form-control', 'id' => 'menu-create'];
    $menuTypeSelectParams = ['class' => 'form-control', 'id' => 'menu-type'];

    return view('menu.edit')->with();
  }

  public function store(Request $addMenuItem) {
    $menu = $addMenuItem->except('_token', 'user_id');

  }

  public function view(Request $get) {
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

  public function edit(Request $get) {
    $menuId = $get->input('menu_id');
    $Menu = Menus::where('menu_id', $menuId)->with('menuType', 'menuMenuItems')->first();

    return view('menu.edit')
      ->with('edit', true)
      ->with('Menu', $Menu);
  }

  public function update(Request $request) {

  }

}