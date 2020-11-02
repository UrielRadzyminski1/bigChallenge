<template>
  <div class="flex flex-col items-center">
    <div class="
    flex 
    flex-col 
    items-center
    border-4
    rounded
    text-lg
    bg-white
    border-gray-800
    text-gray-800
    px-8
    pt-4
    pb-6"
    id="checkoutCard">
      <h2>Total: ${{this.$store.getters.totalPrice}}</h2>
      <div class="flex">
        <p class="mr-4">Payment method:</p>
        <div>
          <div title="Sorry, we are currently only accepting cash">
            <input disabled type="radio" id="credit" value="credit" v-model="pMethod">
            <label for="credit">Credit Card</label>
          </div>
          <input type="radio" id="cash" value="cash" v-model="pMethod">
          <label for="cash">Cash</label>
          <br>
        </div>
        

      </div>
      <div v-if="pMethod == 'credit'">
          Credit!
      </div>
      <div class="flex">
        <router-link to="/cart"><button class="checkoutCardButton">Back to cart :(</button></router-link>
        <button class="checkoutCardButton" @click="submit()">Submit :)</button>
      </div>
    </div>
    <div v-if="errors" class="bg-red-500 text-white mt-2 py-2 px-4 rounded font-bold mb-4 shadow-lg">
        <div v-for="(v, k) in errors" :key="k">
          <p v-for="error in v" :key="error" class="text-sm">
            {{ error }}
          </p>
        </div>
      </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      pMethod:'cash',
      errors:null
    }
  },
  methods: {
    goToCart(){
      this.$router.push('/cart')
    },
    submit(){
      let cart = this.$store.state.cart.map( (item)=>{
        let newItem = {
                  'id':item.id,
                  'amount':item.amount,
                  'name':item.name
                };
        return newItem
      });
      axios({
          method: 'post',
          url: '/api/order/create',
          data: {
            'cart': cart,
            'paymentMethod': this.pMethod,
          }
        })
        .then( (response) => {
          this.$store.commit('emptyCart');
          console.log(response.data);
          this.$router.push({
            name:'completed',
            params: response.data
          })
        })
        .catch(errorResponse => {
          this.errors=errorResponse.response.data.errors
        })
    }
  },
}
</script>