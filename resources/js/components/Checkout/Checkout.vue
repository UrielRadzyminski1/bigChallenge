<template>
  <div>
    <span>Total: {{this.$store.getters.totalPrice}}</span>
    <div class="flex">
      <p class="mr-4">Payment method:</p>
      <div>
        <input disabled type="radio" id="credit" value="credit" v-model="pMethod">
        <label for="credit">Credit Card</label>
        <br>
        <input type="radio" id="cash" value="cash" v-model="pMethod">
        <label for="cash">Cash</label>
        <br>
      </div>
      

    </div>
    <div v-if="pMethod == 'credit'">
        Credit!
    </div>
    <button @click="submit()">Submit :)</button>
  </div>
</template>
<script>
export default {
  data() {
    return {
      pMethod:'cash'
    }
  },
  methods: {
    submit(){
      let cart = this.$store.state.cart.map( (item)=>{
        let newItem = {
                  'id':item.id,
                  'amount':item.amount
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
          this.$router.push({
            name:'completed',
            params: response.data
          })
      })
    }
  },
}
</script>