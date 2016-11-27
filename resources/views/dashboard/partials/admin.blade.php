<div class="col-sm-6">
    <h3>Businesses <span class="badge">{{ count($businesses) }}</span></h3>
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
    <h3>Users <span class="badge">{{ count($users) }}</span></h3>
    {!! Form::open() !!}
    <div class="input-group">
        {{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
        <span class="input-group-btn">
              <button class="btn btn-primary">View</button>
            </span>
    </div>
    {!! Form::close() !!}

</div>

<div class="col-sm-6">
    <h3>Addresses <span class="badge">{{ count($addresses) }}</span></h3>
    {!! Form::open() !!}
    <div class="input-group">
        {!! Form::select('address_id', $addresses, null, ['class' => 'form-control', 'id' => 'addresses']) !!}
        <span class="input-group-btn">
              <button class="btn btn-primary">View</button>
            </span>
    </div>
    {!! Form::close() !!}

</div>

<div class="col-sm-6">
    <h3>Menus <span class="badge">{{ count($menus) }}</span></h3>
    @if(count($menus) >= 1)
        {!! Form::open() !!}
        <div class="input-group">
            {!! Form::select('menu_id', $menus, null, ['class' => 'form-control']) !!}
            <span class="input-group-btn">
              <button class="btn btn-primary">View</button>
            </span>
        </div>
        {!! Form::close() !!}
    @else
        <a class="btn btn-success btn-block" id="new-menu" href="{{ URL::route('create.menu') }}">Add</a>
    @endif
</div>
@section('scripts')
    <script type="application/javascript">
        /*// TODO: add custom confirm
         var $originalBusinessId = $('#business-id-address').val();

         $('#business-address').change(function () {
         var $selected = $("#business-address option:selected").val();
         console.log($selected);
         if ($selected != $originalBusinessId) {
         var $confirm = confirm("Change Business associated with this address?");
         console.log($confirm);
         if ($confirm == true) {
         console.log("Should change");
         //                changeBusinessId();
         $('#business-id-address').val($selected);
         } else {
         console.log("Should not change, and going back to: " + $originalBusinessId);
         $("#business-address").val($originalBusinessId);
         }
         }

         });*/
    </script>

@endsection

