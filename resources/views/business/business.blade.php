@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-sm-6">
      <p><strong>Business Profile</strong> {{ $business->business_name }}</p>
    </div>
    <div class="col-sm-6">
      <a class="btn btn-success"
         href="{{ URL::route('view.business', ['business_id' => $business->business_id]) }}"><span
          class="glyphicon glyphicon-edit"></span> Edit</a>
    </div>
  </div>

@endsection