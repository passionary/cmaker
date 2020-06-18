<template>
  <div class="videos h-75">
    <h3 class="center-align">Content</h3>
    <div class="" v-if="videos">
      <div class="" v-for="(el,index) in videos" :key="index">        
        <video :src="'http://127.0.0.1:8000/storage/' + el.content" controls=""></video>
      </div>
    </div>
    <h1 v-else class="text-center">No content</h1>  
  </div>
</template>

<style scoped>  
  .videos{
    position: relative;
  }  
</style>

<script>
export default {
  name: 'HelloWorld',
  data: () => ({
    content: '',
    index:0,
    videos:[],
    offset:0,
    pages:[]
  }),   
    
  mounted(){        
    for(let i=0;i<Object.keys(localStorage).length;i++){
      if (Object.keys(localStorage)[i] != 'loglevel:webpack-dev-server'){
        const keys = Object.keys(localStorage)[i].split(',')
        const vals = keys.map(e => e.split('='))
        if(vals[0][1] == 'video')
        this.videos.push({
          name:vals[1][1],
          content:localStorage.getItem(Object.keys(localStorage)[i])
        })
      }
    }       
  }
}
</script>
