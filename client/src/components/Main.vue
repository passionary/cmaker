<template>
  <div class="books">
    <div class="center-block">
      <router-link :to="obj.path" v-for="obj in paths" :key="obj.name">
        <div class="item" :class="obj.name">
          <img :src="obj.icon" alt="">
        </div>
      </router-link>      
    </div>
  </div>
</template>

<style scoped>
  .item img{
    width: 34%;
  }
  .i-back {
    margin-top: 9px;
    width: 20px;
    height: 20px;
    background: #969696;
    margin-left: 9px;
    border-radius: 50%;
  }
  a{
    color: #000 !important;
  } 
  .item {    
    -webkit-transition: all .7s;
    -o-transition: all .7s;
    transition: all .7s;
    width: 245px;
    height: 245px;
    text-align: center;
    border-radius: 50%;
    position: absolute;
    cursor: pointer;
  }
  a:hover .item {
    transform: scale(1.1,1.1);
  }
  .video{
    right:11.84%;
    top:163px;
  }
  .video img {
    width: 59%;
    padding-top: 50px;
  }
  .book {
    left:41.7%;
    top:208px;
  }
  .book img {
    padding-top: 28%;
    padding-left: 15px;
    width: 63.5%;
  }
  .wallpaper {
    left:11.84%;
    top:163px;
  }
  .wallpaper img {
    margin-left: -4px;
    width: 50%;
    padding-top: 26%;
  }
  .center-block{
    width: 100%;
    height: 646px;
    position: relative;
  }
  @media screen and (max-width: 1200px) {
    .item {
      width: 180px ;
      height: 180px;
    }    
  }
  @media screen and (max-width: 1100px) {
    .item {
      width: 155px ;
      height: 155px;
    }
  }
  @media screen and (max-width: 993px) {
    .item {
      width: 125px;
      height: 125px;
    }
  }
  @media screen and (max-width: 780px) {
    .item {
      position: static;
      display: -webkit-flex;
      display: -moz-flex;
      display: -ms-flex;
      display: -o-flex;
      display: flex;
      flex-direction: column;
      margin: 0 auto;
      margin-top: 20px;
      width: 155px;
      height: 155px;
    }
    .item img {
      margin: 0 auto;
    }
    .title {
      left:11.5%;
      font-size: 32px;
    }    
    .center-block {
      top:110px;
      height: 100%;
    }
  }
  @media screen and (max-width: 650px) {
    .title {
      font-size: 26px;
      left:14%;
    }
  }
  @media screen and (max-width: 550px) {
    .item {
      width: 130px;
      height: 130px;
      margin-top: 40px;
    }    
    .title {
      left:10%;
    }
    .center-block {
      top:90px;
    }
  }
  @media screen and (max-width: 440px) {
    .item {
      width: 118px;
      height: 118px;
    }
    .title {
      font-size: 23px;
      left:8.5%;
    }
    .center-block {
      top:105px;
    }    
  }
  @keyframes grower {
    from {
      transform: scale(1,1);
    }
    to {
      transform: scale(1.1,1.1);
    }
  }  
</style>

<script>
import { mapActions, mapGetters } from 'vuex'
import { getCookie,deleteCookie } from '@/modules'

export default {
  name: 'HelloWorld',
  data: () => ({
    paths:[
      {name:'CREATE BOOK',path:'/book/create',icon:'/images/create-book.jfif',name:'book'},
      {name:'CREATE ARTICLE',path:'/article/create',icon:'/images/create-article.jfif',name:'wallpaper'},
      {name:'CREATE VIDEO',path:'/video/create',icon:'/images/create-video.png',name:'video'},
    ]
  }),   
  computed: {
    ...mapGetters(['user'])
  },
  methods: {
    ...mapActions(['auth']),
    logout() {
  		const token = getCookie('token')

  		fetch(`http://127.0.0.1:8000/api/logout?token=${token}`)
  		.then(res => res.json())
  		.then(res => {
  			M.toast({html: res.message})
  		})
  		.then(() => {
  			deleteCookie('token')
  			this.$router.push('/login')
  		})
  	},
  },
  mounted(){  
    
  }
}
</script>
