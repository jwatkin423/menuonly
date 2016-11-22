@extends('layouts.app')

@section('content')


  <div class="row">
    <h3><strong>Profile for:</strong> {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h3>
  </div>

  <div class="row">
    <div class="col-sm-6">

      @if(Auth::user()->user_type !== 'admin')
        <h3>Business</h3>
        <ul>
          <li><a href="{{ URL::route('view.business', ['business_id' => Auth::user()->business_id]) }}"> Business
              Profile</a></li>
        </ul>
    </div>
    @else
      <h3>Business</h3>
      {!! Form::open(['route' => 'view.business'], ['class' => 'form-inline']) !!}
      <div class="input-group">
        {{ Form::select('business', $businesses, null, ['class' => 'form-control']) }}
        <span class="input-group-btn">
              <button class="btn btn-primary">View</button>
            </span>
      </div>
      {{ Form::close() }}
    @endif

  </div>


@endsection