<div class="col-sm-6">
  <h3>Businesses
    <span class="badge">{{ count($businesses) }}</span>
    <a class="btn btn-success btn-sm pull-right" id="new-business" href="{{ URL::route('create.business') }}">Add</a>
  </h3>
  {!! Form::open(['route' => 'view.business', 'method' => 'get', 'view_edit' => null], ['class' => 'form-inline']) !!}
  <div class="input-group">
    {{ Form::select('business_id', $businesses, null, ['class' => 'form-control', 'id' => 'business-select']) }}
    <span class="input-group-btn">
              <button name="view_edit" value="view" class="btn btn-primary">View</button>
    </span>
  </div>
  {{ Form::close() }}
</div>
<div class="col-sm-6">
  <h3>Users
    <span class="badge">{{ count($users) }}</span>
    <a class="btn btn-success btn-sm pull-right" id="new-user" href="{{ URL::route('create.user') }}">Add</a>
  </h3>
  {!! Form::open() !!}
  <div class="input-group">
    {{ Form::select('user_id', $users, null, ['class' => 'form-control', 'id' => 'user-select']) }}
    <span class="input-group-btn">
              <button class="btn btn-primary">View</button>
    </span>
  </div>
  {!! Form::close() !!}

</div>

<div class="col-sm-6">
  <h3>Addresses by States
    <span class="badge">{{ count($addresses) }}</span>
    <a class="btn btn-success btn-sm pull-right" id="new-menu" href="{{ URL::route('create.address') }}">Add</a></h3>
  {!! Form::open(['route' => 'view.address.by.state', 'state' => 'A', 'method' => 'get']) !!}
  <div class="input-group">
    {!! Form::select('state', $addresses, null, ['class' => 'form-control', 'id' => 'address-select']) !!}
    <span class="input-group-btn">
              <button class="btn btn-primary">View</button>
    </span>
  </div>
  {!! Form::close() !!}

</div>

<div class="col-sm-6">
  @if(count($menus) >= 1)

    <h3>Menus <span class="badge">{{ count($menus) }}</span>
        <a class="btn btn-success btn-sm pull-right" id="new-menu" href="{{ URL::route('create.menu') }}">Add</a></h3>
      {!! Form::open(['route' => 'view.menu', 'method' => 'get']) !!}
        <div class="input-group">
            {!! Form::select('menu_id', $menus, null, ['class' => 'form-control', 'id' => 'menu-select']) !!}
            <span class="input-group-btn">
              <button class="btn btn-primary">View</button>
    </span>
        </div>
        {!! Form::close() !!}
  @else
    <h3>Menus <span class="badge">{{ count($menus) }}</span></h3>
    <a class="btn btn-success btn-block" id="new-menu" href="{{ URL::route('create.menu') }}">Add</a>
  @endif
</div>

