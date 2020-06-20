<template>
  <div class="container mt-3">
    <div class="green lighten-3" v-if="message">
      <p class="center-align white-text">{{message}}</p>
    </div>
    <button class="btn cyan save" @click="saveHandler">save</button>
    <input type="text" ref="name" name="item[name]" placeholder="name" v-model="name">
    <ckeditor v-model="model" :config="options" />
    <form action="http://127.0.0.1:8000/api/request" id="form" method="post" class="form-group mx-auto mt-3" @submit.prevent="submitHandler">
      <input type="hidden" name="request[type]" value="article">
      <textarea name="request[message]" class="materialize-textarea" placeholder="message">
      </textarea>
      <input type="text" name="request[author]" class="form-control" placeholder="author">
      <input type="hidden" name="request[email]" v-model="email" class="form-control" placeholder="author">
      <input type="text" name="item[subject]" class="form-control" placeholder="subject">
      <input type="hidden" name="item[content]" v-model="model">
      <input type="hidden" name="item[name]" class="form-control" placeholder="name" v-model="name">
      <input type="text" name="item[tags]" placeholder="tags">
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
    email:'',
    message:'',
    options: {
      filebrowserUploadUrl: '/image.php',
      filebrowserUploadMethod: 'form'
    },
    model: ''
  }),
  computed: {
    ...mapGetters(['user'])
  },
  methods:{
    ...mapActions(['auth']),
  	saveHandler() {
      localStorage.setItem(`type=article,name=${this.name}`,this.model)
      this.message = 'your article saved'
    },
    submitHandler() {
      axios.post('http://127.0.0.1:8000/api/request',new FormData(form))
      .then(res => {
        console.log(res)
      })
    }
  },
  async mounted() {
    if(this.$route.params.art) {
      this.model = this.$route.params.art.c
      this.name = this.$route.params.art.n
      this.$refs.name.setAttribute('disabled','true')
    }
    await this.auth()
    this.email = this.user.email
  }
}
</script>

<style scoped>

</style>
