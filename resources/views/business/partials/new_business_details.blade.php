@extends('layouts.app')

@section('content')

  <div class="row">
      {{ Form::open(['route' => 'add.business'], ['class' => 'form-inline']) }}
    <div class="form-group">
      {!! Form::label('business_name', 'Business Name') !!}
      {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('business_type_id', 'Business Type') !!}
      {!! Form::select('business_type_id', $businessTypes, null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::hidden('user_id', Auth::user()->user_id) !!}

    <div class="form-group">
      <button class="btn btn-block btn-primary"> Create</button>
    </div>
    {{ Form::close() }}
  </div>

@endsection