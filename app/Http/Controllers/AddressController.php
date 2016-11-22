<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Addresses;
use App\Businesses;
use Illuminate\Http\Request;
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

  public function create($address_id) {
    $Address = Addresses::where('address_id', $address_id)->with('business')->first();

    $collect = collect($Address)->toArray();

    $Business = $collect['business'];
    $Businesses = Businesses::select('business_id', 'business_name')->get();
    $businesses = $Businesses->pluck('business_name', 'business_id');

    return view('address.edit')
      ->with('edit', false)
      ->with('address', $Address)
      ->with('business', $Business)
      ->with('businesses', $businesses);

  }

  public function store(Request $address) {
    if ($address->input('entity_type') == 'b') {
      $addressData['business_id'] = $address->input('entity_id');
    } else {
      $addressData['user_id'] = $address->input('entity_id');
    }

    $addressData['address_one'] = $address->input('address_one');
    $addressData['address_two'] = $address->input('address_two');
    $addressData['city'] = $address->input('city');
    $addressData['state'] = $address->input('state');
    $addressData['zip_code'] = $address->input('zip_code');

    $address = new Addresses();

    if ($address->save($addressData)) {
      return view();
    }
  }

  public function view($address_id) {
    $Address = Addresses::where('address_id', $address_id)->first();

    return view('address.edit')->with('address', $Address);
  }

  public function edit($address_id) {
    $Address = Addresses::where('address_id', $address_id)->with('business')->first();

    $collect = collect($Address)->toArray();

    $Business = $collect['business'];
    $Businesses = Businesses::select('business_id', 'business_name')->get();
    $businesses = $Businesses->pluck('business_name', 'business_id');

    return view('address.edit')
      ->with('edit', true)
      ->with('address', $Address)
      ->with('business', $Business)
      ->with('businesses', $businesses);
  }

  public function update(Request $update) {
    $data = $update->except('_token', 'address_business_id');

    $Addresses = Addresses::find($data['address_id']);

    foreach ($data as $key => $value) {
      $Addresses->$key = $value;
    }

    if ($Addresses->save()) {
      \Log::debug('Save successful!');
      return redirect()->route('db.home', ['user_id' => Auth::user()->user_id]);
    }

    return false;

  }

  public function delete() {

  }

}