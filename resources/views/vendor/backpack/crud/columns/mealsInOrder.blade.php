@php
  
@endphp
<div class="container">
  <div class="row">
    <div class="col-sm">Meal name</div>
    <div class="col-sm">Amount</div>
    <div class="col-sm">Price per unit</div>
  </div>
  @foreach ($entry->meals as $meal)
  <div class="row mt-4">
    <div class="col-sm">{{$meal->name}}</div>
    <div class="col-sm">{{$meal->pivot->amount}}</div>
    <div class="col-sm">{{$meal->pivot->price}}</div>
  </div>
  @endforeach
</div>