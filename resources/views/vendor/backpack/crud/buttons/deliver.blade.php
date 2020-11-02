<form style="display:inline" method="POST" action="/admin/order/{{$entry->id}}/deliver">
  @csrf
  <input type="submit" class="btn btn-sm btn-link" value="Deliver">
</form>