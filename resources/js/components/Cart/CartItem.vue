<template>
  <div>
      <div class="
        grid
        grid-cols-5
        gap-2">
        <div class="cartCell">{{this.meal.name}}</div>
        <div class="cartCell">{{this.meal.amount}}</div>
        <div class="cartCell">{{this.meal.price}}</div>
        <div class="cartCell">{{this.meal.price * this.meal.amount}}</div>
        <div class="cartCell">
          <span @click="increaseAmount" class="cartButton cartButtonPlus">+1</span>
          <span @click="decreaseAmount" class="cartButton cartButtonMinus">-1</span>
        </div>
      </div>
  </div>
</template>
<script>
export default {
  props:[
    'mealId'
  ],
  methods: {
    increaseAmount(){
      this.$store.commit('increaseItem', 
          {
                'mealId':this.meal.id,
          });
    },
    decreaseAmount(){
      
      if(this.meal.amount<2){
        if (confirm('Are you sure you want to completely remove this item from your cart?')) {
          this.$store.commit('removeItem', 
          {
                'mealId':this.meal.id,
          });
        }
        
      } else {
        this.$store.commit('decreaseItem', 
          {
                'mealId':this.meal.id,
          });
      }
    }
  },
  computed: {
    meal(){
        return this.$store.getters.getMealById(this.mealId);
    }
  },
}
</script>