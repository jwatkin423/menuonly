<tr>
  <td>{{ $address['address_one'] }}</td>
  <td>{{ $address['address_two'] }}</td>
  <td>{{ $address['city'] }}</td>
  <td>{{ $address['state'] }}</td>
  <td>{{ $address['zip_code'] }}</td>
  <td>
    <a class="btn btn-xs btn-primary"
       href="{{ URL::route('view.address', ['address_id' => $address['address_id']]) }}">
        <span class="glyphicon glyphicon-eye-open"></span>
    </a>
    <a class="btn btn-xs btn-warning"
       href="{{ URL::route('edit.address', ['address_id' => $address['address_id']]) }}">
        <span class="glyphicon glyphicon-edit"></span>
    </a>
    <a class="btn btn-xs btn-danger" href="{{ URL::route('delete.address', ['address_id' => $address['address_id']]) }}">
      <span class="glyphicon glyphicon-trash"></span>
    </a>
  </td>
</tr>