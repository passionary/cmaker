<template>
  <div class="container mt-3">
    {{result}}
    <jodit-editor v-model="model" :config="options"/>
    <form action="http://127.0.0.1:8000/api/request" method="post" class="form-group mx-auto mt-3" >
      <input type="hidden" name="request[type]" value="article">
      <textarea name="request[message]" class="form-control" placeholder="message">
      </textarea><br>
      <input type="text" name="request[author]" class="form-control" placeholder="author"><br>
      <input type="text" name="item[subject]" class="form-control" placeholder="subject"><br>
      <input type="hidden" name="item[content]" :value="result">
      <input type="text" name="item[name]" class="form-control" placeholder="name" v-model="name"><br>      
      <input type="tags" name="item[tags]" class="form-control" placeholder="tags"><br>
      <input type="submit" class="btn btn-secondary">
    </form>
  </div>
</template>

<style scoped>
	
</style>

<script>
export default {
  name: 'HelloWorld',
  data:() => ({
    // ...jodit,
    name:'',  
    options: {
      
    },
    model: ''
  }),  
  methods:{ 
  	
  },
  watch:{
    name(value){
      // this.config.imageUploadParams.name = value;
    }
  },
  computed:{
    result(){
      return this.model;
    }
  },
  created(){    
    this.options = {
      enableDragAndDropFileToEditor: true,
      uploader: {
        url: '/image_upload.php',
        format: 'json'        
      }
    }
  }
}
</script>

<style scoped>

</style>
