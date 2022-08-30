<template>
  <div class="container videos" ref="videos">
    <nmessage :nmessage="nmessage" />
    <nerror :error="error" />
    <form id="form" enctype="multipart/form-data" action="http://127.0.0.1:8000/api/request" method="post" class="form-group mx-auto" @submit.prevent="submitHandler">
      <input class="form-control" type="text" name="item[name]" id="name-field" placeholder="name" v-model="name">
      <input type="hidden" name="request[type]" value="video">
      <textarea name="request[message]" class="materialize-textarea form-control" placeholder="message" v-model="message">
      </textarea>
      <input type="text" name="request[author]" class="form-control" placeholder="author" v-model="author">
      <input type="hidden" name="item[name]" class="form-control" placeholder="name" :value="name">
      <input type="hidden" name="video_id" :value="$route.params.video && $route.params.video.video.id || created[0] && created[1] || ''" :key="created[0]">
      <input type="hidden" name="user_id" :value="user.id">
      <input type="hidden" name="request[email]" class="form-control" placeholder="name" v-model="user.email">
      <input type="hidden" name="MAX_FILE_SIZE" value="3000000000" />          
      <div class="file-field form-control">
      <div class="btn">
          <span>File</span>
          <input type="file" name="file">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
        </div>
      </div>      
      <input type="text" name="item[tags]" class="form-control" placeholder="tags" v-model="tags">
      <div class="submit-container">
        <input type="submit" class="btn submit-btn">
      </div>
    </form>
  </div>
</template>

<style scoped>
  .container {
    position: relative;
    padding: 60px 0 100px 0;
  }
  #form {
    margin-top: 2rem;
  }
  .form-control {
    margin-top: 20px !important;
  }
  .form-title {
    margin-top: 4.2rem;
    font-family: AlegreyaSans-Thin;
    font-weight: bold;
  }
  #name {
    margin-top: 5rem;
  }
  .submit-container {
    width: 100%;
    display: flex;
    justify-content: flex-end;
  }
  .submit-btn {
    display: block;
    margin: 30px 0 0 0;
  }
  .videos h3{
    margin-left: 4%;  
  }
</style>

<script>
import { mapActions, mapGetters, mapMutations } from 'vuex'

export default {
  data:() => ({    
    name:'',
    message:'',
    created: [],
    author:'',
    tags:''
  }),
  methods: {
    ...mapActions(['auth']),
    ...mapMutations(['setError','setMessage']),
    submitHandler() {
      fetch('http://127.0.0.1:8000/api/request',{
        method: "POST",
        body: new FormData(form)
      })
      .then(res => res.json())
      .then(res => {
        console.log(res)
        if(res.errors || res.errors2 || res.errors3) {
          this.setError(Object.values(res.errors)[0] && Object.values(res.errors)[0][0] || Object.values(res.errors2)[0] && Object.values(res.errors2)[0][0] || res.errors3.length && res.errors3[0])
          return
        }
        this.setMessage(res.message || "")
        this.created[0] = true
        this.created[1] = res.id
      })
    }
  },
  computed: {
    ...mapGetters(['user','error','nmessage'])
  },
  async mounted() {
    if(M && M.updateTextFields) M.updateTextFields()
    
    await this.auth()
    if(this.$route.params.video) {
      const video = this.$route.params.video.video;
      const request = this.$route.params.video.request;
      for(const key in video){
        if(key in this)
        this[key] = video[key]
      }
      for(const key in request){
        if(key in this)
        this[key] = request[key]
      }      
    }
  }
}
</script>

<style scoped>

</style>
