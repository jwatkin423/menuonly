@extends('layouts.app')

@section('content')


    <div class="row">
        <h3><strong>Profile for:</strong> {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h3>
    </div>

    <div class="row">
        @if(Auth::user()->user_type !== 'admin')
            @include('dashboard.partials.nonadmin')
        @else
            @include('dashboard.partials.admin')
        @endif

    </div>


@endsection