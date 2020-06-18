import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    meta:{auth:true},
    component: Home,
    children:[
      {
        path: '/',
        component: () => import('../components/Main'),
        meta:{auth:true},
      },
      {
        path: '/book/create',
        component: () => import('../components/BookCreater'),
        meta:{auth:true},
      },
      {
        path: '/article/create',
        component: () => import('../components/ArticleCreater'),
        meta:{auth:true},
      },
      {
        path: '/video/create',
        component: () => import('../components/VideoCreater'),
        meta:{auth:true},
      },
    	{
      	path: '/self-books',    	
      	component: () => import('../components/PrivateBooks'),
        meta:{auth:true},
    	},
      {
        path: '/self-articles',      
        component: () => import('../components/PrivateArticles'),
        meta:{auth:true},
      },
      {
        path: '/self-videos',      
        component: () => import('../components/PrivateVideos'),
        meta:{auth:true},
      },
    	{
      	path: '/self-book/:bk',    	
      	name:'book',
      	component: () => import('../components/Book'),
        meta:{auth:true},
    	}
    ],
  },
  {
    path: '/login',
    name: 'login',
    meta:{auth:false},
    component: () => import('../components/Login')
  },
  {
    path: '/register',
    name: 'login',
    meta:{auth:false},
    component: () => import('../components/Register')
  }
]

const getCookie = (name) => {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  (async function () {
    const request = await axios.get(`http://127.0.0.1:8000/api/token?token=${getCookie('token')}`)
    if(to.meta.auth && !request.data.token) next('/login')
    else next()
  })()  
})
export default router