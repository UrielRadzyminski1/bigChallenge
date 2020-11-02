<form style="display:inline" method="POST" action="/admin/order/all" onSubmit="return confirm('Are you sure you wish to delete all orders?');">
  @csrf
  @method('delete')
  <input type="submit" class="btn btn-primary" value="Delete ALL orders">
</form>