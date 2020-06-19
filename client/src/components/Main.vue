<template>
  <div class="books">
    <h4 class="center-align title">Choose a Content Type<div class="i-back"><i class="material-icons">mode_edit</i></div></h4>
    <div class="center-block">
      <router-link :to="obj.path" v-for="obj in paths">
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
    padding-top: 30.2%;
  }
  .i-back {
    margin-top: 9px;
    width: 20px;
    height: 20px;
    background: #969696;
    margin-left: 9px;
    border-radius: 50%;
  }
  .title {
    position: absolute;
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    border-bottom: 1px solid rgba(0,0,0,0.1);
    font-size:32px;
    z-index: 100;
    left:36px;
    padding-bottom: 4px;
    top:24px;
    font-family: TitilliumWeb-LightItalic;
  }
  .title i {
    font-size: 14px;
    color: #fff;
    padding-left: 6px;
    margin-left: -4px;
    display: block;
    margin-top: 2px;    
  }
  a{
    color: #000 !important;
  } 
  .item {    
    -webkit-transition: all .7s;
    -o-transition: all .7s;
    transition: all .7s;
    width: 215px;
    height: 215px;
    text-align: center;
    box-shadow: 0 0 4px grey;
    border-radius: 50%;
    position: absolute;
    cursor: pointer;
  }
  a:hover .item {
    box-shadow: 0 0 4px red;
    transform: scale(1.1,1.1);
  }
  .video{
    right:11.84%;
    top:163px;
  }
  .video img {
    width: 39%;
  }
  .book {
    left:39.4%;
    top:208px;
  }
  .book img {
    padding-top: 34%;
    width: 31.5%;
  }
  .wallpaper {
    left:11.84%;
    top:163px;
  }
  .wallpaper img {
    margin-left: -4px;
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
export default {
  name: 'HelloWorld',
  data: () => ({
    paths:[
      {name:'CREATE BOOK',path:'/book/create',icon:'/images/icons8-book-52.png',name:'book'},
      {name:'CREATE ARTICLE',path:'/article/create',icon:'/images/icons8-edit-file-96.png',name:'wallpaper'},
      {name:'CREATE VIDEO',path:'/video/create',icon:'/images/icons8-video-message-200.png',name:'video'},
    ]
  }),   
    
  mounted(){  
    
  }
}
</script>
