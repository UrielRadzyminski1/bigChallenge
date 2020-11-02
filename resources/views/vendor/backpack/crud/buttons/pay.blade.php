@if (!$entry->paid)
  <form style="display:inline" method="POST" action="/admin/order/{{$entry->id}}/pay">
    @csrf
    <input type="submit" class="btn btn-sm btn-link" value="Pay">
  </form>
@endif