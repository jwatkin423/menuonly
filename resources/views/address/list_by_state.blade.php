@extends('layouts.app')

@section('content')
  <table class="table table-striped table-hover">
    <thead>
    <tr>
      <th>Business</th>
      <th>User</th>
      <th>Address One</th>
      <th>Address Two</th>
      <th>City</th>
      <th>State</th>
      <th>Zip code</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($AddressesByState as $address)
      <tr>
        @if (!empty($address->business))
          <td><a href="{!! URL::route('edit.business', ['business_id' => $address->business->business_id])!!}">{!! $address->business->business_name !!}</a></td>
          @php $type = 'B'; @endphp
        @else
          <td class="alert alert-danger"></td>
        @endif
        @if (!empty($address->user))
          <td>{!! $address->user->first_name . ' ' . $address->user->last_name !!}</td>
          @php $type = 'U'; @endphp
        @else
          <td class="alert alert-danger"></td>
        @endif
        <td>{!! $address->address_one !!}</td>
        <td>{!! $address->address_two !!}</td>
        <td>{!! $address->city !!}</td>
        <td>{!! $address->state !!}</td>
        <td>{!! $address->zip_code !!}</td>
        <td>
          <a href="{!! URL::route('view.address', ['address_id' => $address->address_id]) !!}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-eye-open"></span> </a>
          <a href="{!! URL::route('edit.address', ['address_id' => $address->address_id, 'ext_type' => $type]) !!}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span> </a>
          <a href="{!! URL::route('delete.address', ['address_id' => $address->address_id]) !!}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> </a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection