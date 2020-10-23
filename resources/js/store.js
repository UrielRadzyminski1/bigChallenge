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

      ],
  },
  mutations:{
    addItem(state,payload){

      let selectedMeal = state.cart.find( (orderItem)=> {
        return orderItem.id==payload.id;
      })
      if(typeof(selectedMeal) == 'undefined'){
        state.cart.push(payload);
      }else{
        selectedMeal.amount+=payload.amount;
      }
    }
  },
  getters: {
    totalPrice(state){
      let price = 0;
      state.cart.forEach( (item) => {
        price += item.amount*item.price;
      });
      return price;
    }
  },
}