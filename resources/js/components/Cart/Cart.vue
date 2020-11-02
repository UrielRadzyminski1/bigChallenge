<template>
  <div class="flex flex-col items-center">
      <div class="
      divide-y
      w-11/12
      sm:w-3/4
      md:2/3
      lg:w-1/2
      text-lg">
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
      <h2 class="mt-8">Total: ${{this.$store.getters.totalPrice}}</h2>

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
        px-8
        sm:px-24
      text-white
        font-bold
        tracking-wider
        text-lg">
        <router-link to="/categories">
          <i class="fas fa-shopping-basket text-lg mr-2"></i>
          <span>Back to categories</span> 
        </router-link>
        <router-link to="/checkout">
          <i class="fas fa-cash-register text-lg mr-2"></i>
          <span>Checkout</span>
        </router-link>
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