import Vue from 'vue'
import Vuex from 'vuex'

import { getCookie } from '../modules'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  	user:''
  },
  mutations: {
  },
  actions: {
  	async auth() {
  		const req = await axios.get(`http://127.0.0.1:8000/api/user?token=${getCookie('token')}`)
  		this.state.user = req.data
  	}
  },
  getters: {
  	user: s => s.user
  },
  modules: {
  }
})
