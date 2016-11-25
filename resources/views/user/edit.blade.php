@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{ $user->first_name . ' ' . $user->last_name }}</div>
                <div class="panel-body">
                    @if(!$edit)
                        {!! Form::model($user, ['route' => 'add.user', 'class' => 'form-horizontal']) !!}
                    @else
                        {!! Form::model($user, ['route' => 'update.user', $user->user_id, 'class' => 'form-horizontal']) !!}
                    @endif

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

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            {!! Form::password('password', ['class' => 'form-control']) !!}

                            @if ($errors->has('password'))
                                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password_confirmation" class="col-md-4 control-label">Password Confirmation</label>
                        <div class="col-md-6">
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
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
                    @if($edit)
                        @include('user.partials.edit')
                    @else
                        @include('user.partials.create')
                    @endif
                <!-- Id bit -->
                    {!! Form::hidden('user_id', $user->user_id) !!}
                    {!! Form::hidden('business_id', $business_id) !!}
                    @if($edit)
                        {!! Form::hidden('address_id', $user->address->address_id) !!}
                    @else
                        {!! Form::hidden('address_id', null) !!}
                    @endif

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                @if(!$edit)
                                    Create
                                @else
                                    Update
                                @endif
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection