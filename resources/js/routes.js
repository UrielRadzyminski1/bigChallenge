import VueRouter from 'vue-router';
import Menu from './components/Menu/Menu.vue';
import Categories from './components/Menu/Categories.vue';
import Category from './components/Category/Category.vue';

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
  }
  
];



export default new VueRouter({
  mode: 'history',
  routes
});