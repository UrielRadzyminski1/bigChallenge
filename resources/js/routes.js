import VueRouter from 'vue-router';
import Menu from './components/Menu/Menu.vue';
import Categories from './components/Menu/Categories.vue';
import Category from './components/Category/Category.vue';
import Cart from './components/Cart/Cart.vue';
import Checkout from './components/Checkout/Checkout.vue'
import Completed from './components/Checkout/Completed.vue'
let routes = [
  {
    path: '/',
    component: Menu
  },
  {
    path: '/categories',
    component: Categories
  },
  {
    path: '/categories/:id',
    component: Category
  },
  {
    path: '/cart',
    component: Cart
  },
  {
    path: '/checkout',
    component: Checkout
  },
  {
    name: 'completed',
    path: '/completed',
    component: Completed,
    props: true
  },
  
];



export default new VueRouter({
  mode: 'history',
  routes
});