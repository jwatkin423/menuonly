<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Addresses;

class UserController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {

  }

  public function index() {

  }

  public function create($businessId = null) {
    $User = new User();

    return view('user.edit')
      ->with('user', $User)
      ->with('edit', false)
      ->with('business_id', $businessId);
  }

  public function store(Request $request) {
    $business_id = $request->input('business_id');
    $user = New User();
    $user->first_name = $request->input('first_name');
    $user->business_id = $business_id;
    $user->last_name = $request->input('last_name');
    $user->user_type = $request->input('user_type');
    $user->email = $request->input('email');
    $user->phone_number = $request->input('phone_number');
    $user->password = $request->input('password');

    $Address = new Addresses();

    $Address->business_id = $request->input('business_id');
    $Address->user_id = $request->input('user_id');
    $Address->address_one = $request->input('address_one');
    $Address->address_two = $request->input('address_two');
    $Address->city = $request->input('city');
    $Address->state = $request->input('state');
    $Address->zip_code = $request->input('zip_code');

    if ($user->save() && $user->address()->save($Address)) {
      return redirect()->route('view.business', ['business_id' => $business_id]);
    }

  }

  public function edit($user_id) {
    $User = User::find($user_id)->with('address')->first();

    return view('user.edit')
      ->with('user', $User)
      ->with('user_id', $user_id)
      ->with('edit', true)
      ->with('business_id', $User->business_id);
  }

  public function update(Request $request) {
    $user = User::find($request->input('user_id'));

    $user->first_name = $request->input('first_name');
    $user->last_name = $request->input('last_name');
    $user->user_type = $request->input('user_type');
    $user->email = $request->input('email');
    $user->phone_number = $request->input('phone_number');
    $business_id = $request->input('business_id');

    $Address = Addresses::findOrFail($request->input('address_id'));

    $Address->business_id = $request->input('business_id');
    $Address->user_id = $request->input('user_id');
    $Address->address_one = $request->input('address_one');
    $Address->address_two = $request->input('address_two');
    $Address->city = $request->input('city');
    $Address->state = $request->input('state');
    $Address->zip_code = $request->input('zip_code');

    if ($user->save() && $user->address()->save($Address)) {
      return redirect()->route('view.business', ['business_id' => $business_id]);
    }

  }

}