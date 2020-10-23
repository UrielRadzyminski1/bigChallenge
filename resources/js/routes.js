import VueRouter from 'vue-router';
import Menu from './components/Menu/Menu.vue';
import Categories from './components/Menu/Categories.vue';
import Category from './components/Category/Category.vue';
import Cart from './components/Cart/Cart.vue';

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
  }
  
];



export default new VueRouter({
  mode: 'history',
  routes
});