@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Edit {{ $user->first_name . ' ' . $user->last_name }}</div>
        <div class="panel-body">
          {!! Form::model($user, ['route' => 'update', $user->user_id, 'class' => 'form-horizontal']) !!}
          {{--          {!! Form::open(['route' => 'update', 'class' => 'form-horizontal']) !!}--}}
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
              {!! Form::Label('first_name', 'First Name', ['class' => 'col-md-4 control-label']) !!}

              <div class="col-md-6">
                {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}

                @if ($errors->has('first_name'))
                  <span class="help-block"><strong>{{ $errors->first('first_name') }}</strong></span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <label for="last_name" class="col-md-4 control-label">Last Name</label>

              <div class="col-md-6">
                {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}

                @if ($errors->has('last_name'))
                  <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

              <div class="col-md-6">
                {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}

                @if ($errors->has('email'))
                  <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
              <label for="phone_number" class="col-md-4 control-label">Phone Number</label>
              <div class="col-md-6">
                {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control']) !!}

                @if ($errors->has('phone_number'))
                  <span class="help-block"><strong>{{ $errors->first('phone_number') }}</strong></span>
                @endif
              </div>
            </div>

          <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
            <label for="user_type" class="col-md-4 control-label">User Type</label>
            <div class="col-md-6">
              {!! Form::select('user_type', ['admin' => 'admin', 'patron' => 'patron', 'owner' => 'owner', 'guest' => 'guest'],
                              $user->user_type, ['class' => 'form-control', 'placeholder' => 'Select user type']) !!}

              @if ($errors->has('user_type'))
                <span class="help-block"><strong>{{ $errors->first('user_type') }}</strong></span>
              @endif
            </div>
          </div>

            <!-- Address bit -->

            <div class="form-group{{ $errors->has('address_one') ? ' has-error' : '' }}">
              <label for="password-confirm" class="col-md-4 control-label">Address One:</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="address_one">

                @if ($errors->has('address_one'))
                  <span class="help-block"><strong>{{ $errors->first('address_one') }}</strong></span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('address_two') ? ' has-error' : '' }}">
              <label for="password-confirm" class="col-md-4 control-label">Address Two:</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="address_two">

                @if ($errors->has('address_two'))
                  <span class="help-block"><strong>{{ $errors->first('address_two') }}</strong></span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
              <label for="password-confirm" class="col-md-4 control-label">City:</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="city">

                @if ($errors->has('city'))
                  <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
              <label for="password-confirm" class="col-md-4 control-label">State:</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="state">

                @if ($errors->has('state'))
                  <span class="help-block"><strong>{{ $errors->first('state') }}</strong></span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
              <label for="password-confirm" class="col-md-4 control-label">Zip code:</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="zip_code">

                @if ($errors->has('zip_code'))
                  <span class="help-block"><strong>{{ $errors->first('zip_code') }}</strong></span>
                @endif
              </div>
            </div>

            <!-- Company bit -->
            {!! Form::hidden('user_id', $user->user_id, ['class' => 'form-control']) !!}

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-user"></i> Update</button>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
  @endsection