<template>
  <div class="container mt-3">    
    <input type="text" name="item[name]" placeholder="name" v-model="name">
    <ckeditor v-model="model" :config="options" />
    <form action="http://127.0.0.1:8000/api/request" method="post" class="form-group mx-auto mt-3" >
      <input type="hidden" name="request[type]" value="article">
      <textarea name="request[message]" class="materialize-textarea" placeholder="message">
      </textarea>
      <input type="text" name="request[author]" class="form-control" placeholder="author">
      <input type="text" name="item[subject]" class="form-control" placeholder="subject">
      <input type="hidden" name="item[content]" :value="model">
      <input type="hidden" name="item[name]" placeholder="name" :value="name">
      <input type="text" name="item[name]" class="form-control" placeholder="name" v-model="name">
      <input type="text" name="item[tags]" placeholder="tags">
      <input type="submit" class="send btn cyan">
    </form>
  </div>
</template>

<style scoped>
	.send {
    margin-top: 20px;
    position: absolute;
    top:-14px;
    right:-120px;
  }
  .container {
    position: relative;
  }
</style>

<script>
export default {
  name: 'HelloWorld',
  data:() => ({
    name:'',  
    options: {
      filebrowserUploadUrl: '/image.php',
      filebrowserUploadMethod: 'form'
    },
    model: ''
  }),  
  methods:{ 
  	
  }
}
</script>

<style scoped>

</style>
