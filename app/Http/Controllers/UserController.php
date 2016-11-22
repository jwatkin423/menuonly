<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Address as addr;

class UserController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {

  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function getUserById($id) {
    $user = $this->_getUserById($id);
    return view('user.profile')->with('user', $user);
  }

  public function editUserById($id) {
    $user = $this->_getUserById($id);
    return view('user.edit')->with('user', $user);
  }

  private function _getUserById($id) {
    return User::find($id);
  }

  public function create(Request $request) {
    $user = New User();
    $user->first_name = $request->input('first_name');
    $user->last_name = $request->input('last_name');
    $user->user_type = $request->input('user_type');
    $user->password = $request->input('password');

    if ($user->save()) {

      /*$addressData['address_one'] = $request->input('address_one');
      $addressData['address_two'] = $request->input('address_two');
      $addressData['city'] = $request->input('city');
      $addressData['state'] = $request->input('state');
      $addressData['zip_code'] = $request->input('zip_code');
      $addressResult = $this->addAddress($addressData);*/
      return redirect()->route('user.profile', ['user_id' => $user->user_id]);
      /*if ($addressResult) {
        return true;
      } else {
        return view('user.edit')->with('errors', $addressResult->errors);
      }*/

    } else {

    }

  }

  public function update(Request $request) {
    $user = User::find($request->input('user_id'));

    $userData['first_name'] = $request->input('first_name');
    $userData['last_name'] = $request->input('last_name');
    $userData['user_type'] = $request->input('user_type');

    if ($user->save($userData)) {

      $address = new Address;
      $address->user_id = $request->input($user->user_id);
      $address->address_one = $request->input('address_one');
      $address->address_two = $request->input('address_two');
      $address->city = $request->input('city');
      $address->state = $request->input('state');
      $address->zip_code = $request->input('zip_code');

      $addressResult = $user->address()->save($address);

      if ($addressResult) {
        return true;
      } else {
        return view('user.edit')->with('errors', $addressResult->errors);
      }

    }
  }

  public function addresses() {
    return $this->hasMany('App\Address', 'user_id', 'user_id');
  }

  public function business() {
    return $this->belongsTo('App\Business', 'business_id', 'business_id');
  }

}