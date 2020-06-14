import 'materialize-css/dist/css/materialize.min.css'
import 'materialize-css/dist/js/materialize.min'
import $ from 'jquery'
import ckeditor from 'ckeditor4-vue'
import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import axios from 'axios';

Vue.use(ckeditor)

Vue.config.productionTip = false
window.axios = axios;

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
