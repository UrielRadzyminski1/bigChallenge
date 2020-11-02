<form style="display:inline" method="POST" action="/admin/order/delivered" onSubmit="return confirm('Are you sure you wish to delete all orders marked as delivered?');">
  @csrf
  @method('delete')
  <input type="submit" class="btn btn-primary" value="Delete delivered orders">
</form>