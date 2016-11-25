<tr>
    <td>{{ $user['first_name'] }}</td>
    <td>{{ $user['last_name'] }}</td>
    <td>{{ $user['phone_number'] }}</td>
    <td>{{ $user['user_type'] }}</td>
    <td>{{ $user['email'] }}</td>
    <td>
        <a class="btn btn-xs btn-primary"
           href="{{ URL::route('view.user', ['ext_id' => $user['user_id']]) }}">
            <span class="glyphicon glyphicon-eye-open"></span> </a>
        <a class="btn btn-xs btn-warning"
           href="{{ URL::route('edit.user', ['ext_id' => $user['user_id']]) }}">
            <span class="glyphicon glyphicon-edit"></span> </a>
        <a class="btn btn-xs btn-danger"
           href="{{ URL::route('delete.user', ['ext_id' => $user['user_id']]) }}">
            <span class="glyphicon glyphicon-trash"></span> </a>
    </td>
</tr>