@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    {{ Form::model($address, ['route' => ['update.address', $address->address_id]], ['class' => 'form-inline']) }}
    <div class="form-group">
      {{ Form::label('address_one', 'Address One') }}
      {{ Form::text('address_one', $address['address_one'], ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('address_two', 'Address Two') }}
      {{ Form::text('address_two', $address->address_two, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('city', 'City') }}
      {{ Form::text('city', $address->city, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('state', 'State') }}
      {{ Form::text('state', $address->state, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('zip_code', 'Postal Code') }}
      {{ Form::text('zip_code', $address->zip_code, ['class' => 'form-control']) }}
    </div>
    {{ Form::close() }}
  </div>
</div>
@endsection