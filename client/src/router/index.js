import Vue from 'vue'
import axios from 'axios'
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
        name:'base',
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
    	},
      {
        path: '/book/edit/:bk',     
        name:'book-edit',
        component: () => import('../components/BookCreater'),
        meta:{auth:true},
      },
      {
        path: '/article/edit/:art',
        name:'article-edit',
        component: () => import('../components/ArticleCreater'),
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
    name: 'register',
    meta:{auth:false},
    component: () => import('../components/Register')
  },
  {
    path: '/error',
    name: 'error',
    meta:{auth:false,error:true},
    component: () => import('../components/Error')
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
const reducedRoutes = routes.reduce((p,i) => 
  i.children ? 
    p.concat([{name:i.name},...i.children])
  : p.concat(i.path !== '/error' && i)
,[]).filter(e => !!e)
router.beforeEach(async (to, from, next) => {  
  let request
  try {
    request = await axios.get(`http://127.0.0.1:8000/api/token?token=${getCookie('token')}`)
  } catch (e) {
    console.log('errors with server connection')
  }
  if(request === undefined && reducedRoutes.findIndex(e => e.name === to.name) !== -1)
    next('/error')
  else if(to.meta.auth && request.data.token === false) next('/login')
  else {
    if(request !== undefined && !to.meta.error && reducedRoutes.findIndex(e => e.name === to.name) !== -1) next()
    else if(request === undefined) next()
    else console.log('no route')
  }
})
export default router