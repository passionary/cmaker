<template>
  <div class="videos" ref="videos">
    <div class="green lighten-3" v-if="nmessage">
      <p class="center-align white-text">{{nmessage}}</p>
    </div>
    <div class="center-align materialize-red lighten-3" v-if="$store.state.error">
      <span class="white-text">{{error}}</span>
    </div>
    <input type="text" name="item[name]" class="form-control" placeholder="name" v-model="name">
    <form id="form" enctype="multipart/form-data" action="http://127.0.0.1:8000/api/request" method="post" class="form-group mx-auto" @submit.prevent="submitHandler">
      <input type="hidden" name="request[type]" value="video">
      <textarea name="request[message]" class="materialize-textarea" placeholder="message" v-model="message">
      </textarea>
      <input type="text" name="request[author]" class="form-control" placeholder="author" v-model="author">
      <input type="hidden" name="item[name]" class="form-control" placeholder="name" :value="name">
      <input type="hidden" name="video_id" :value="$route.params.video && $route.params.video.video.id || created[0] && created[1] || ''" :key="created[0]">
      <input type="hidden" name="user_id" :value="user.id">
      <input type="hidden" name="request[email]" class="form-control" placeholder="name" v-model="user.email">
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
        if(res.errors || res.errors2) {
          this.setError(Object.values(res.errors)[0] && Object.values(res.errors)[0][0] || Object.values(res.errors2)[0] && Object.values(res.errors2)[0][0])
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
