<div class="col-sm-6">
    <h3>Business</h3>
    <ul>
        <li><a href="{{ URL::route('view.business', ['business_id' => Auth::user()->business_id]) }}">Business Profile</a></li>
    </ul>
</div>