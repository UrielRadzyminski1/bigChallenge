<template>
  <div class="">
      <div class="
      divide-y">
        <div class="
        grid
        grid-cols-5
        gap-2">
          <div class="cartCell">Item name</div>
          <div class="cartCell">Amount</div>
          <div class="cartCell">Price per unit</div>
          <div class="cartCell">Total Price</div>
        </div>
        <cart-item v-for="item in cart" :key="item.id" :mealId="item.id"></cart-item>
      </div>


      <div class="
        w-full
        sm:h-24
        h-16
        fixed 
        bottom-0
        bg-red-500
        flex
        justify-between
        items-center
        px-16
        sm:px-24">
        <router-link to="/categories">Back to categories</router-link>
        <router-link to="/checkout">Checkout</router-link>
      </div>
  </div>
</template>
<script>
import CartItem from './CartItem.vue'
export default {
  components:{
    'cart-item':CartItem,
  },
  computed:{
    cart(){
      return this.$store.state.cart
    } 
  }
}
</script>