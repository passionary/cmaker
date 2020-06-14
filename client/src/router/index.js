import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    children:[
      {
        path: '/',
        component: () => import('../components/Main')
      },
      {
        path: '/book/create',
        component: () => import('../components/BookCreater')
      },
      {
        path: '/article/create',
        component: () => import('../components/ArticleCreater')
      },
      {
        path: '/video/create',
        component: () => import('../components/VideoCreater')
      },
    	{
      	path: '/self-books',    	
      	component: () => import('../components/PrivateBooks')
    	},
      {
        path: '/self-articles',      
        component: () => import('../components/PrivateArticles')
      },
      {
        path: '/self-videos',      
        component: () => import('../components/PrivateVideos')
      },
    	{
      	path: '/self-book/:bk',    	
      	name:'book',    	
      	component: () => import('../components/Book')
    	}
    ],
  },    
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router