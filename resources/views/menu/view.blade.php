@extends('layouts.app')

@section('content')

  <div class="row">
    @if(!$edit)
      {{ Form::open(['route' => 'add.menu'], ['class' => 'form-inline']) }}
    @else
      {{ Form::model($menu, ['route' => 'update.menu'], ['class' => 'form-inline']) }}
    @endif
    <div class="form-group">
      {!! Form::label('menu_name', 'Menu Name') !!}
      {!! Form::text('menu_name', $menu->menu_name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('menu_type_descr', 'Menu Type') !!}
      {!! Form::select('menu_type_id', $menuTypes, $menu->menu_type_id, $menuTypeParams) !!}
    </div>

    <div class="form-group">
      {!! Form::label('business_name', 'Business') !!}
      @if($edit)
        {!! Form::select('business_id', $businesses, $menu->business_id, $busSelParams) !!}
        {!! Form::hidden('business_id', $menu->business_id, ['id' => 'business-id']) !!}
      @else
        {!! Form::select('business_id', $businesses, null, $busSelParams) !!}
      @endif
    </div>


    <div class="row">
      @include('menu.partials.items')
    </div>

    {!! Form::hidden('user_id', Auth::user()->user_id) !!}
    <div class="form-group">
      <button class="btn btn-block btn-primary"> {{ $buttonName }}</button>
    </div>
    {{ Form::close() }}
  </div>
@endsection

