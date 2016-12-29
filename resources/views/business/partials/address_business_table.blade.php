@if($changed == $address->address_id)
  @php $class = 'alert alert-success'; @endphp
@else
  @php $class = ''; @endphp
@endif
<tr class="{{ $class }}">
  <td>{{ $address->address_one }}</td>
  <td>{{ $address->address_two }}</td>
  <td>{{ $address->city }}</td>
  <td>{{ $address->state }}</td>
  <td>{{ $address->zip_code }}</td>
  <td>
    <div class="pull-right">
      <a class="btn btn-xs btn-primary"
         href="{{ URL::route('view.address', ['address_id' => $address->address_id]) }}">
        <span class="glyphicon glyphicon-eye-open"></span>
      </a>
      <a class="btn btn-xs btn-warning"
         href="{{ URL::route('edit.address', ['ext_id' => $address->address_id, 'extType' => 'B']) }}">
        <span class="glyphicon glyphicon-edit"></span>
      </a>
      <a class="btn btn-xs btn-danger"
         href="{{ URL::route('delete.address', ['address_id' => $address->address_id]) }}">
        <span class="glyphicon glyphicon-trash"></span>
      </a>
    </div>
  </td>
</tr>