import Vue from 'vue'
import Vuex from 'vuex'

import { getCookie } from '../modules'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  	user:'',
    error:'',
    nmessage:''
  },
  mutations: {
    setError(state, mes) {
      if(!mes) return
      state.error = mes;
      setTimeout(() => {
        this.state.error = ''
      },3000)
    },
    setMessage(state,mes) {
      if(!mes) return
      state.nmessage = mes
      setTimeout(() => {
        this.state.nmessage = ''
      },3000)
    }
  },
  actions: {
  	async auth() {
  		const req = await axios.get(`http://127.0.0.1:8000/api/user?token=${getCookie('token')}`)
  		this.state.user = req.data
  	},    
  },
  getters: {
  	user: s => s.user,
    error: s => s.error,
    nmessage: s => s.nmessage
  },
  modules: {
  }
})
