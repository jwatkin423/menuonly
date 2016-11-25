<div class="form-group{{ $errors->has('address_one') ? ' has-error' : '' }}">
    <label for="address_one" class="col-md-4 control-label">Address One:</label>

    <div class="col-md-6">
        {!! Form::text('address_one', null, ['class' => 'form-control']) !!}
        @if ($errors->has('address_one'))
            <span class="help-block"><strong>{{ $errors->first('address_one') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('address_two') ? ' has-error' : '' }}">
    <label for="address_two" class="col-md-4 control-label">Address Two:</label>

    <div class="col-md-6">
        {!! Form::text('address_two', null, ['class' => 'form-control']) !!}

        @if ($errors->has('address_two'))
            <span class="help-block"><strong>{{ $errors->first('address_two') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    <label for="city" class="col-md-4 control-label">City:</label>

    <div class="col-md-6">
        {!! Form::text('city', null, ['class' => 'form-control']) !!}

        @if ($errors->has('city'))
            <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
    <label for="state" class="col-md-4 control-label">State:</label>

    <div class="col-md-6">
        {!! Form::text('state', null, ['class' => 'form-control']) !!}

        @if ($errors->has('state'))
            <span class="help-block"><strong>{{ $errors->first('state') }}</strong></span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
    <label for="zip_code" class="col-md-4 control-label">Zip code:</label>

    <div class="col-md-6">
        {!! Form::text('zip_code', null, ['class' => 'form-control']) !!}

        @if ($errors->has('zip_code'))
            <span class="help-block"><strong>{{ $errors->first('zip_code') }}</strong></span>
        @endif
    </div>
</div>