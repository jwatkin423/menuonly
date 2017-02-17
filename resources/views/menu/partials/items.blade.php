<div class="col-sm-12">
  @if(count($items) != 0)
    @foreach($items as $item)
      {{ "This is the item?" }}
    @endforeach
  @else
    <h3>Menu Items
      <span class="badge">{{ count($items) }}</span>
      <a class="btn btn-success btn-sm pull-right" id="new-business" href="{{ URL::route('create.menuItem') }}">Add</a>
    </h3>
  @endif
</div>