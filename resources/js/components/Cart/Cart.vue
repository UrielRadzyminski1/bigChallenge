<template>
  <div>
    <cart-item v-for="item in cart" :key="item.id" :meal="item"></cart-item>
<!--     <p v-for="item in cart">Hola!</p> -->
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