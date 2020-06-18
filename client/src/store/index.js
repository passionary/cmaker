import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const getCookie = (name) => {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

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
