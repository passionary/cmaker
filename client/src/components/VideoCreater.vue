<template>
  <div class="videos" ref="videos">
    <input type="text" name="item[name]" class="form-control" placeholder="name" v-model="name">
    <form id="form" enctype="multipart/form-data" action="http://127.0.0.1:8000/api/request" method="post" class="form-group mx-auto" @submit.prevent="submitHandler">
      <input type="hidden" name="request[type]" value="video">
      <textarea name="request[message]" class="materialize-textarea" placeholder="message" v-model="message">
      </textarea>
      <input type="text" name="request[author]" class="form-control" placeholder="author" v-model="author">
      <input type="hidden" name="item[name]" class="form-control" placeholder="name" :value="name">
      <input type="hidden" name="request[email]" class="form-control" placeholder="name" v-model="email">
      <input type="hidden" name="MAX_FILE_SIZE" value="3000000000" />          
      <div class="file-field input-field">
      <div class="btn cyan">
          <span>File</span>
          <input type="file" name="file">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
        </div>
      </div>      
      <input type="text" name="item[tags]" class="form-control" placeholder="tags" v-model="tags">
      <input type="submit" class="btn cyan">
    </form>
  </div>
</template>

<style scoped>
  .videos h3{
    margin-left: 4%;  
  }
  .videos {
    width: 62%;
    margin: 0 auto;
    margin-top: 5%;
  }  
</style>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  data:() => ({    
    name:'',
    email:'',
    message:'',
    author:'',
    tags:''
  }),
  methods: {
    ...mapActions(['auth']),
    submitHandler() {
      axios.post('http://127.0.0.1:8000/api/request',new FormData(form))
      .then(res => {
        this.path = res.data.video
        localStorage.setItem(`type=video,name=${this.name}`,this.path)
      })
    }
  },
  computed: {
    ...mapGetters(['user'])
  },
  async mounted() {
    await this.auth()
    this.email = this.user.email    
  }
}
</script>

<style scoped>

</style>
