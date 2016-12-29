<tr>
  <td>{{ $menu->menu_name }}</td>
  <td>{{ $menu->menuType->menu_type_descr }}</td>
  <td>
    <div class="pull-right">
    <a class="btn btn-xs btn-primary"
       href="{!! URL::route('view.menu', ['menu_id' => $menu->menu_id]) !!}">
      <span class="glyphicon glyphicon-eye-open"></span> </a>
    <a class="btn btn-xs btn-warning"
       href="{{ URL::route('edit.menu', ['menu_id' => $menu->menu_id]) }}">
      <span class="glyphicon glyphicon-edit"></span> </a>
    <a class="btn btn-xs btn-danger"
       href="{{ URL::route('delete.menu', ['menu_id' => $menu->menu_id]) }}">
      <span class="glyphicon glyphicon-trash"></span> </a>
    </div>
  </td>
</tr>