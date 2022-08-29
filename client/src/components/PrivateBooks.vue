<template>
  <div class="books">
    <nmessage :nmessage="nmessage" />
    <nerror :error="error" />
    <Loader class="no-content center-align" v-if="loading" />
    <List :data="books" v-else-if="books.length" />
  </div>
</template>

<style scoped>  
.books{
  position: relative;
  padding: 0 20px 0 20px;
  margin-top: 4rem;
}
.no-content {    
  margin: 0 auto;
  margin-top: 270px;
}
.no-content span{
  font-size: 44px;
  text-transform: uppercase;
  border-bottom: 1px solid rgba(0,0,0,0.2);
  font-family: TitilliumWeb-LightItalic;
}
</style>

<script>
import Loader from './Loader';
import List from './List';
import { mapActions, mapGetters, mapMutations } from 'vuex'

export default {
  name: 'HelloWorld',
  components: {
    Loader,
    List
  },
  data: () => ({
    books:[],
    loading: false
  }),
  computed: {
    ...mapGetters(['user','error','nmessage'])
  },
  methods: {
    ...mapActions(['auth']),
    ...mapMutations(['setError','setMessage']),
    remove(id) {      
      axios.get(`http://127.0.0.1:8000/api/remove-book?book_id=${id}`)
      .then(res => {
        console.log(res)
        if(res.data.errors || res.data.errors2) {
          this.setError(Object.values(res.data.errors)[0] || Object.values(res.data.errors2)[0])
          return
        }
        this.setMessage(res.data.message || '')
        this.books.splice(this.books.findIndex(e => e.id === id),1)
      })
    }
  },
  async mounted() {
    this.loading = true;
    
    await this.auth()
    axios.get(`http://127.0.0.1:8000/api/requests?user_id=${this.user.id}&type=book`)
    .then(res => {
      console.log(res, 'DATA BOOKS');
      this.books = res.data;
      this.loading = false;
    })
    .then(() => {
      $(document).ready(function(){
        $('.modal').modal({
          dismissible:false
        });
      });
    })
  }
}
</script>
