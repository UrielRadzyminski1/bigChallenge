import VueRouter from 'vue-router';
import Menu from './views/Menu.vue';

let routes = [
  {
    path: '/',
    component: Menu
  }
];


const router = new VueRouter({
  routes
});

export default router;