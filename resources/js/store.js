export default {

  state: {
      cart:[],
  },
  mutations:{
    emptyCart(state){
      state.cart = []
    },
    addItem(state,payload){

      let selectedMeal = state.cart.find( (orderItem)=> {
        return orderItem.id==payload.id;
      })
      if(typeof(selectedMeal) == 'undefined'){
        state.cart.push(payload);
      }else{
        selectedMeal.amount+=payload.amount;
      }
    },
    increaseItem(state,payload){
      for (var i = 0; i < state.cart.length; i++) {
        if (state.cart[i].id==payload.mealId) {
            state.cart[i].amount++
            break;
        }
      }
    },
    decreaseItem(state,payload){
      for (var i = 0; i < state.cart.length; i++) {
        if (state.cart[i].id==payload.mealId) {
            state.cart[i].amount--;
            break;
        }
      }
    },
    removeItem(state,payload){
      payload.mealId

      for (var i = 0; i < state.cart.length; i++) {
        if (state.cart[i].id==payload.mealId) {
            state.cart.splice(i, 1);
            break;
        }
      }
    }
  },
  getters: {
    totalPrice: (state) => {
      let price = 0;
      state.cart.forEach( (item) => {
        price += item.amount*item.price;
      });
      return price;
    },
    getMealById: (state) => (id) => {
          return state.cart.find(meal => meal.id == id)
        }
  },
}