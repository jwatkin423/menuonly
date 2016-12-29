<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addresses;
use App\Businesses;
use App\User;
use Auth;

class AddressController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function getAddressById($id) {
    $address = $this->_getAddressById($id);

    return $address;
  }

  public function _getAddressById($id) {
    return addr::find($id);
  }

  public function create($ext_id = null, $extType = null) {
    $Address = new Addresses();

    if ($extType == 'B') {
      $Business = ['business_id' => $ext_id];
      $User = [];
    } elseif ($extType == 'U') {
      $Business = [];
      $User = ['user_id' => $ext_id];
    } else {
      $Business = [];
      $User = [];
    }

    $Businesses = Businesses::select('business_id', 'business_name')->get();
    $businesses = $Businesses->pluck('business_name', 'business_id');
    $Users = User::select('user_id', \DB::raw("CONCAT(first_name, ' ', last_name) as name"))->get();
    $users = $Users->pluck('name', 'user_id');

    $businessSelectParams = ['class' => 'form-control', 'id' => 'business-address', 'placeholder' => 'Select a business...'];
    $userSelectParams = ['class' => 'form-control', 'id' => 'user-address', 'placeholder' => 'Select a user...'];

    return view('address.edit')
      ->with('edit', false)
      ->with('address', $Address)
      ->with('business', $Business)
      ->with('user', $User)
      ->with('users', $users)
      ->with('ext_id', $ext_id)
      ->with('extType', $extType)
      ->with('busSelParams', $businessSelectParams)
      ->with('userSelectParams', $userSelectParams)
      ->with('buttonName', 'Create')
      ->with('businesses', $businesses);

  }

  public function store(Request $add) {
    $address = $add->except('_token', 'address_business_id', 'address_user_id');

    $Addresses = new Addresses();
    $Addresses->fill($address);
    if ($Addresses->save()) {
      \Log::debug('Saved!');
      \Log::debug("The new address id: {$Addresses->address_id}");
      return redirect()->route('view.business',
        [
          'business_id' => $address['business_id'],
          'changed' => $Addresses->address_id,
          'msg' => 'Successfully created new address'
        ]
      );
    }
  }

  public function view($address_id) {
    $Address = Addresses::where('address_id', $address_id)->first();

    return view('address.view')->with('address', $Address);
  }

  public function viewByState(Request $state) {
    $AddressesByState = Addresses::where('state', $state['state'])->with('business', 'user')->get();

    return view('address.list_by_state')->with('AddressesByState', $AddressesByState);
  }

  public function edit($address_id, $extType) {
    if ($extType == 'B') {

      $Address = Addresses::where('address_id', $address_id)->with('business')->first();

      $collect = collect($Address)->toArray();

      $Business = $collect['business'];
      $Businesses = Businesses::select('business_id', 'business_name')->get();
      $businesses = $Businesses->pluck('business_name', 'business_id');

      $businessSelectParams = ['class' => 'form-control', 'id' => 'business-address'];

      return view('address.edit')
        ->with('edit', true)
        ->with('extType', $extType)
        ->with('address', $Address)
        ->with('busSelParams', $businessSelectParams)
        ->with('buttonName', 'Update')
        ->with('business', $Business)
        ->with('businesses', $businesses);

    } elseif ($extType == 'U') {

      $Address = Addresses::where('address_id', $address_id)->with('user')->first();

      $collect = collect($Address)->toArray();

      $User = $collect['user'];
      $Users = Users::select('user_id', 'first_name')->get();
      $users = $Users::pluck('user_id', 'first_name');

      return view('address.edit')
        ->with('edit', true)
        ->with('extType', $extType)
        ->with('address', $Address)
        ->with('user', $User)
        ->with('users', $users);

    }

  }

  public function update(Request $update) {
    $data = $update->except('_token', 'address_business_id', 'address_user_id');

    $Addresses = Addresses::find($data['address_id']);

    $Addresses->fill($data);

    if ($Addresses->save()) {
      \Log::debug('Updated!');
      return redirect()->route('view.business',
        [
          'business_id' => $data['business_id'],
          'changed' => $data['address_id'],
          'msg' => 'Updated the address successfully',
          'status' => 1
        ]);
    }

    return false;

  }

  public function delete() {

  }

}