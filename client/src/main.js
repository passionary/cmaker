import 'materialize-css/dist/css/materialize.min.css'
import 'materialize-css/dist/js/materialize.min'
import Vue from 'vue'
import $ from 'jquery'
import axios from 'axios';
import ckeditor from 'ckeditor4-vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faSignOutAlt } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import App from './App.vue'
import router from './router'
import store from './store'

library.add(faSignOutAlt)

Vue.component('font-awesome-icon',FontAwesomeIcon)
Vue.component('nmessage',require('./components/Nmessage').default)
Vue.component('nerror',require('./components/Nerror').default)

Vue.use(ckeditor)

Vue.config.productionTip = false
window.axios = axios;

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
