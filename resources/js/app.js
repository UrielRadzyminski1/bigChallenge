/* import './bootstrap'; */

import 'es6-promise/auto'
import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import Vuex from 'vuex';

window.axios = axios;
window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(Vuex);


window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';



import router from './routes';
import MainApp from './components/MainApp.vue';

const store = new Vuex.Store({
  state: {
    cart: {

    },

  },
  mutations: {

  },
  getters: {

  }
})

const app = new Vue({
  
  el:'#app',
  store,
  components: {
    MainApp
  },
  router
});