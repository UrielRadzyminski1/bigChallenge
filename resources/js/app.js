import './bootstrap';
import router from './routes';
import MainApp from './components/MainApp.vue';

const app = new Vue({
  
  el:'#app',
  components: {
    MainApp
  },
  router
});