@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-10">

        @if($edit)
          <h3><strong>{{ $business['business_name'] }}:</strong> {{ $business->businessType->business_type_name }}</h3>

          @include('business.partials.new_address')

          @if (!empty($business->addresses))
            <div class="row">
              <table class="table table-responsive table-bordered">
                <thead>
                <tr>
                  <th>Address One</th>
                  <th>Address Two</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Postal Code</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($business->addresses as $address)
                  @include('business.partials.address_business_table', ['$address' => $address])
                @endforeach

                </tbody>
              </table>
            </div>
          @endif

          @include('business.partials.new_user')

          @if(!empty($business->users))
            <div class="row">
              <table class="table table-responsive table-bordered">
                <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Phone Number</th>
                  <th>User Type</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($business->users as $user)
                  @include('business.partials.user_business_table', ['user' => $user])
                @endforeach

                </tbody>
              </table>
            </div>
          @endif

          @include('business.partials.new_menus')

          @if(!empty($menus))
            <div class="row">
              <table class="table table-responsive table-bordered">
                <thead>
                <tr>
                  <th>Menu Name</th>
                  <th>Menu Type</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                  @include('business.partials.menus_business_table', ['menu' => $menu])
                @endforeach
                </tbody>
              </table>
            </div>
          @endif

        @elseif ($edit && empty($business))
          <div class="alert alert-warning">
            <p>No Business with the ID found</p>
          </div>
        @else
          @include('business.partials.new_profile')
        @endif
      </div>
    </div>
  </div>

@endsection