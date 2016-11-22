@extends('layouts.app')


@section('content')
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <h3 class="alert alert-info">{{  'User: ' . ucfirst($user->first_name) . ' ' . ucfirst($user->last_name)}}</h3>

      <hr>

    </div>
  </div>

  <div class="row">

    <div class="col-sm-10 col-sm-offset-1">

      <div class="col-sm-6">

        <div class="col-sm-10">

          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">
                <div class="row">
                  <div class="col-sm-10">
                    Profile:
                  </div>
                  <div class="col-sm-2">
                    <a class="btn btn-success btn-xs" href="{{ url('user/edit', $user->user_id) }}"><span
                        class="glyphicon glyphicon-edit"></span> </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <p>{{ $user->email }}</p>
              <p>{{ $user->phone_number == null ? 'No Phone Number' : $user->phone_number }}</p>
              @if (!empty($address))
                {{ $address->address_one }}
                {{ $address->address_two }}
                {{ $address->city }}
                {{ $address->state }}
                {{ $address->zip_code }}
              @else
                <p class="alert alert-warning">No Address information!</p>
              @endif
              @if(!empty($business))
                {{ $business->business_name }}
              @else
                <p class="alert alert-warning">No company information!</p>
              @endif
            </div>
          </div>
        </div>
      </div>

@endsection