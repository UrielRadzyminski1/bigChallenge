<template>
  <div>
      <div class="
        grid
        grid-cols-4
        gap-2">
        <div>Item name: {{this.meal.name}}</div>
        <div>Amount: {{this.meal.amount}}</div>
        <div>Price per unit: {{this.meal.price}}</div>
        <div>Total Price: {{this.meal.price * this.meal.amount}}</div>
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