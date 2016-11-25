@extends('layouts.app')

@section('content')

    <div class="row">
        @if(!$edit)
            {{ Form::open(['route' => 'add.address'], ['class' => 'form-inline']) }}
        @else
            {{ Form::model($address, ['route' => 'update.address'], ['class' => 'form-inline']) }}
        @endif
        <div class="form-group">
            {!! Form::label('address_one', 'Address One') !!}
            {!! Form::text('address_one', $address->address_one, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address_two', 'Address Two') !!}
            {!! Form::text('address_two', $address->address_two, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('city', 'City') !!}
            {!! Form::text('city', $address->city, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('state', 'State') !!}
            {!! Form::text('state', $address->state, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('zip_code', 'Postal Code') !!}
            {!! Form::text('zip_code', $address->zip_code, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            @if($extType == 'B')
                {!! Form::label('business_name', 'Business') !!}
                {!! Form::select('business_id', $businesses, $business['business_id'], $busSelParams) !!}
                {!! Form::hidden('address_business_id', $business['business_id'], ['id' => 'business-id-address']) !!}
                {!! Form::hidden('address_id', $address->address_id, ['id' => 'id-address']) !!}
            @elseif($extType == 'U')
                {!! Form::label('user_name', 'User') !!}
                {!! Form::select('user_id', $users, $user['user_id'], ['class' => 'form-control', 'id' => 'user-address']) !!}
                {!! Form::hidden('address_user_id', $user['user_id'], ['id' => 'user-id-address']) !!}
                {!! Form::hidden('address_id', $address->address_id, ['id' => 'id-address']) !!}
            @endif
        </div>

        <div class="form-group">
            <button class="btn btn-block btn-primary"> {{ $buttonName }}</button>
        </div>
        {{ Form::close() }}
    </div>

@endsection

@section('scripts')
<script type="application/javascript">
    // TODO: add custom confirm
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

    });
</script>

@endsection