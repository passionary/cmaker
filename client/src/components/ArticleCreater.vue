<template>
  <div class="container mt-3">
    <div class="green lighten-3" v-if="nmessage">
      <p class="center-align white-text">{{nmessage}}</p>
    </div>
    <div class="center-align materialize-red lighten-3" v-if="error">
      <span class="white-text">{{error}}</span>
    </div>
    <button class="btn cyan save" @click="saveHandler">save</button>
    <input type="text" ref="name" name="item[name]" placeholder="name" v-model="name">
    <ckeditor v-model="content" :config="options" />
    <form action="http://127.0.0.1:8000/api/request" id="form" method="post" class="form-group mx-auto mt-3" @submit.prevent="submitHandler">
      <input type="hidden" name="request[type]" value="article">
      <textarea name="request[message]" class="materialize-textarea" placeholder="message" v-model="message">
      </textarea>
      <input type="text" name="request[author]" class="form-control" placeholder="author" v-model="author">
      <input type="hidden" name="request[email]" v-model="user.email" class="form-control">
      <input type="hidden" name="item[user_id]" v-model="user.id">
      <input type="hidden" name="article_id" :value="$route.params.art && $route.params.art.article.id">
      <input type="text" name="item[subject]" class="form-control" placeholder="subject" v-model="subject">
      <input type="hidden" name="item[content]" v-model="content">
      <input type="hidden" name="item[name]" class="form-control" placeholder="name" v-model="name">
      <input type="text" name="item[tags]" placeholder="tags" v-model="tags">
      <input type="submit" class="send btn cyan">
    </form>
  </div>
</template>

<style scoped>
  .save {
    position: absolute;
    top:12px;
  }
	.send {
    margin-top: 20px;
    position: absolute;
    bottom:40px;
    right: 1px;
  }
  .container {
    position: relative;
    padding: 60px 0 100px 0;
  }
</style>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  name: 'HelloWorld',
  data:() => ({
    name:'',
    subject:'',
    tags:'',
    author:'',
    content:'',
    message:'',
    error:'',
    created: [],
    email:'',
    nmessage:'',
    options: {
      filebrowserUploadUrl: '/image.php',
      filebrowserUploadMethod: 'form'
    },
  }),
  computed: {
    ...mapGetters(['user'])
  },
  methods:{
    ...mapActions(['auth']),
  	saveHandler() {
      // localStorage.setItem(`type=article,name=${this.name}`,this.model)
      if(this.$route.params.art || this.created[0]) {
        axios.post('http://127.0.0.1:8000/api/save-article',{
          id: this.created[0] ? this.created[1] : this.$route.params.art.article.id,
          content: this.content
        })
        .then(res => {
          console.log(res)
        })
        return
      }
      if(!this.name) {
        this.error = 'article must have a name'
        return
      }
      axios.post('http://127.0.0.1:8000/api/create-article',{
        user_id: this.user.id,
        name: this.name,
        content: this.content
      })
      .then(res => {
        console.log(res)
        this.created[0] = true;
        this.created[1] = res.data.id
      })
      // this.message = 'your article saved'
    },
    submitHandler() {
      axios.post('http://127.0.0.1:8000/api/request',new FormData(form))
      .then(res => {
        console.log(res)
      })
    }
  },
  async mounted() {
    await this.auth()
    if(this.$route.params.art) {
      const article = this.$route.params.art.article;
      const request = this.$route.params.art.request;
      for(const key in article){
        if(key in this)
        this[key] = article[key]
      }
      for(const key in request){
        if(key in this)
        this[key] = request[key]
      }      
      this.$refs.name.setAttribute('disabled','true')
    }
  }
}
</script>

<style scoped>

</style>
