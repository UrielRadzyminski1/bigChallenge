export default {

  state: {
    testingText: `Lorem ipsum dolor sit amet, consectetur 
      adipiscing elit. Donec placerat, enim eu sodales 
      commodo, est augue elementum est, tincidunt iaculis 
      elit est at ante. Donec dolor massa, ultrices quis 
      lacinia ut, porttitor vitae libero. Mauris ultricies 
      enim in felis tempor sollicitudin. Nullam at libero 
      id ex aliquet cursus in nec purus. Nulla nec urna felis. 
      Mauris maximus justo sit amet est semper rhoncus. 
      Morbi maximus egestas posuere. Interdum et malesuada 
      fames ac ante ipsum primis in faucibus. `,
      cart:[
        {
          "id":1,
          "name":"Burger1",
          "amount":1,
          "price":"10.00"
        },
        {
          "id":2,
          "name":"Burger2",
          "amount":1,
          "price":"8.00"
        }
      ],
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