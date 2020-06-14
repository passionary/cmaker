<template>
  <div class="books">
    <h3 class="center-align title">Choose your content type</h3>
    <div class="center-block" v-for="obj in paths">
      <p class="center">
        <router-link tag="a" :to="{path:obj.path}" class="">
          {{obj.name}}
        </router-link>
      </p>
    </div>
  </div>
</template>

<style scoped>
  .title {
    margin-top: 8%;
    margin-bottom: 40px;
  }
  .book{
    height: 300px;
  }
  .book img{
    margin-right:2rem;
  }
  .card{
    height: 71%;
    margin:4.2% 0 0 2rem;
    width: 60%;
  }
  .card-header a{
    border-bottom:1px solid gray;
    padding-bottom: 5px;
  }
  .child{
    background: #e3cc9e;
    padding: 10px 20px;
    left:296px;
    width: 300px;
    height: 390px;
    top:5px;
    box-shadow:0 0 4px inset #000;
  }
</style>

<script>
export default {
  name: 'HelloWorld',
  data: () => ({
    paths:[
      {name:'CREATE BOOK',path:'/book/create'},
      {name:'CREATE ARTICLE',path:'/article/create'},
      {name:'CREATE VIDEO',path:'/video/create'},
    ]
  }),   
    
  mounted(){  
    
  }
}
</script>
