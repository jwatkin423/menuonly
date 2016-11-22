@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-10">
        @if(!empty($business))
          <h3><strong>{{ $business['business_name'] }}:</strong> {{ $business['business_type']['business_type_name'] }}
          </h3>
          @foreach($business as $key => $value)

            @if(!preg_match('/_id$/', $key))

              @if($key == 'addresses')
                <div class="row">
                  <div class="row">
                    <div class="col-sm-6 pull-left"><h4>Addresses</h4></div>
                    <div class="col-sm-6"><a class="btn btn-sm pull-right" href="{{ URL::route('create.business.address', ['address_id' => $business['business_id']]) }}">
                        <span class="glyphicon glyphicon-plus-sign"></span> Add</a></div>
                  </div>

                  <table class="table table-responsive table-bordered">
                    <teahd>
                      <tr>
                        <th>Address One</th>
                        <th>Address Two</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Postal Code</th>
                        <th>Actions</th>
                      </tr>
                    </teahd>
                    <tbody>
                    @foreach($value as $address)
                      @include('business.address_business_table', ['$address' => $address])
                    @endforeach
                    </tbody>
                  </table>
                </div>
              @elseif($key == 'users')
                <div class="row">
                  <h4>Users</h4>
                  <table class="table table-responsive table-bordered">
                    <teahd>
                      <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>User Type</th>
                        <th>Email</th>
                        <th>Actions</th>
                      </tr>
                    </teahd>
                    <tbody>
                    @foreach($value as $user)
                      @include('business.user_business_table', ['user' => $user])
                    @endforeach
                    </tbody>
                  </table>
                </div>
              @elseif($key == 'business_type')
                @foreach($value as $businessType)
                  {{--{{ $businessType }}--}}
                @endforeach
              @else

              @endif

            @endif
          @endforeach
        @else
          <div class="alert alert-warning">
            <p>No Business with the ID found</p>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection