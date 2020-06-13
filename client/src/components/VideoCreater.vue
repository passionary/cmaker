<template>
  <div class="videos" ref="videos">
    <h3 class="my-4">create video</h3>
    <form enctype="multipart/form-data" action="http://127.0.0.1:8000/api/request" method="post" class="form-group mx-auto" >
      <input type="hidden" name="request[type]" value="video">
      <textarea name="request[message]" class="form-control" placeholder="message">
      </textarea><br>
      <input type="text" name="request[author]" class="form-control" placeholder="author"><br>
      <input type="text" name="item[name]" class="form-control" placeholder="name"><br>  
      <input type="hidden" name="MAX_FILE_SIZE" value="3000000000" />          
      <input type="file" name="path" class="form-control" placeholder="path"><br>      
      <input type="tags" name="item[tags]" class="form-control" placeholder="tags"><br>
      <input type="submit" class="btn btn-secondary">
    </form>
  </div>
</template>

<style scoped>
  .videos h3{
    margin-left: 4%;  
  }
  .videos form{
    margin-top: 5%;
    width: 62%;
  }
</style>

<script>
export default {  
}
</script>

<style scoped>

</style>
