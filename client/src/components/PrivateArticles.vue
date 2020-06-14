<template>
  <div class="books h-75">
    <h3 class="text-center mt-3">Content</h3>
    <div class="mx-auto mt-5 d-flex justify-content-around flex-wrap" v-if="books">
      <div class="child mt-3" v-for="(el,index) in books" :key="index">        
      <p class="title text-center"><a href="" @click.prevent="$router.push({name:'book',params:{bk:el.content}})">{{el.name}}</a></p>
      </div>
    </div>
    <h1 v-else class="text-center">No content</h1>    
  </div>
</template>

<style scoped>  
  .books{
    position: relative;
  }    
  .title{
    margin-top: 62%;
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
    content: '',
    index:0,
    books:[],
    offset:0,
    pages:[]
  }),   
    
  mounted(){        
    for(let i=0;i<Object.keys(localStorage).length;i++){
      if (Object.keys(localStorage)[i] != 'loglevel:webpack-dev-server')      
      this.books.push({name:Object.keys(localStorage)[i],content:JSON.parse(localStorage.getItem(Object.keys(localStorage)[i]))})
    }       
  }
}
</script>
