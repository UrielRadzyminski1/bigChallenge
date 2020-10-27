<template>
  <div>
      <div class="
        grid
        grid-cols-4
        gap-2">
        <div class="cartCell">{{this.meal.name}}</div>
        <div class="cartCell">{{this.meal.amount}}</div>
        <div class="cartCell">{{this.meal.price}}</div>
        <div class="cartCell">{{this.meal.price * this.meal.amount}}</div>
      </div>
  </div>
</template>
<script>
export default {
  props:[
    'meal'
  ]
}
</script>