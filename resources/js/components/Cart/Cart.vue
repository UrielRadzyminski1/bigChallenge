<template>
  <div class="">
      <div>
        <cart-item v-for="item in cart" :key="item.id" :meal="item"></cart-item>
      </div>
      <div class="
        w-full
        h-24
        fixed 
        bottom-0
        bg-red-500
        flex
        justify-between
        items-center
        px-24">
        <p>Total: {{this.$store.getters.totalPrice}}</p>
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