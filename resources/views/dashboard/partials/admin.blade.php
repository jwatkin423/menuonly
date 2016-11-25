<div class="col-sm-6">
    <h3>Businesses</h3>
    {!! Form::open(['route' => 'view.business', 'method' => 'get'], ['class' => 'form-inline']) !!}
    <div class="input-group">
        {{ Form::select('business_id', $businesses, null, ['class' => 'form-control']) }}
        <span class="input-group-btn">
              <button class="btn btn-primary">View</button>
            </span>
    </div>
    {{ Form::close() }}
</div>
<div class="col-sm-6">
    <h3>Users</h3>
{!! Form::open() !!}

{!! Form::close() !!}

</div>