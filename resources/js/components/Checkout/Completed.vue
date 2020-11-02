<template>
  <div class="flex flex-col items-center text-center">
    <h2>Thank you for your order!</h2>
    <h2>Order ID: {{this.orderId}}</h2>
    <div
    class="
    xl:w-1/2
    lg:6/12
    md:2/3
    sm:w-3/4
    w-11/12
    place-self-center
    divide-y-2">
      <div class="
      grid 
      gap-2 
      grid-cols-3
      my-6 
      font-bold 
      text-lg
      divide-x-2">
        <div class="cartCell">Name</div>
        <div class="cartCell">Amount</div>
        <div class="cartCell">Price per unit</div>
      </div>
      <div v-for="(item) in this.cart" :key="item.id" 
      class="
      grid 
      gap-2 
      grid-cols-3
      divide-x-2">
        <div class="cartCell">{{item.name}}</div>
        <div class="cartCell">{{item.amount}}</div>
        <div class="cartCell">{{item.price}}</div>
      </div>
    </div>
    <router-link 
    class="
      w-40
      mt-10
      py-1
      px-4
      border-4
      border-solid
      border-black
      rounded-xl
      hover:bg-red-200
      place-self-center
      " 
    :to="'/'">
      <h2>Back</h2>
    </router-link>
  </div>
</template>
<script>
export default {
  props:[
    'cart',
    'orderId'
  ],
  /* data() {
    return {
      cart:[ 
        { 
          "id": 1,
          "amount": 1,
          "name": "Burger1",
          "price": "10.00"
        }, 
        { 
          "id": 2,
          "amount": 1,
          "name": "Burger2",
          "price": "8.00"
        }
      ],
      orderId:1974
    } */
    
  computed: {
    
  },
}
</script>