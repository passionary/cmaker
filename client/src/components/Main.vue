<template>
  <div class="books">
    <h4 class="center-align title">Choose a Content Type<div class="i-back"><i class="material-icons">mode_edit</i></div></h4>
    <div class="center-block">
      <router-link :to="obj.path" v-for="obj in paths">
        <div class="item" :class="obj.name">
          <img :src="obj.icon" alt="">
        </div>
      </router-link>
      <!-- <p class="center">
        <router-link tag="a" :to="{path:obj.path}" class="">
          {{obj.name}}
        </router-link>
      </p> -->
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
    left:30px;
    padding-bottom: 4px;
    top:16px;
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
    padding-top: 6%;
    right:120px;
    top:140px;
  }
  .video img {
    width: 39%;
  }
  .book {
    left:390px;
    top:40%;
    padding-top: 7.2%;
  }
  .book img {
    width: 31.5%;
  }
  .wallpaper {
    padding-top: 6.5%;
    left:120px;
    top:140px;
  }
  .wallpaper img {
    margin-left: -4px;
  }
  .center-block{
    width: 100%;
    height: 646px;
    position: relative;
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
