<template>
  <div class="books">    
    <div class="row" v-if="books.length">
      <div class="col s4 m4" v-for="(el,index) in books" :key="index">
        <div class="card">
          <div class="card-image">
            <img src="/images/icons8-open-book-96.png">
          </div>
          <div class="card-content">
            <h5>{{el.pages.length}} pages</h5>
          </div>
          <div class="card-action">
            <a href="" @click.prevent="$router.push({name:'book',params:{bk:{book:el,request:el.request}}})" class="text">{{el.name}}</a>
            <a href="" @click.prevent="remove(el.id)" class="remove">&times;</a>
          </div>
        </div>
      </div>
    </div>
    <div class="no-content center-align" v-else><span>no books</span></div>
  </div>
</template>

<style scoped>  
  .books{
    padding: 0 20px 0 20px;
    margin-top: 4rem;
  }
  .card-action {
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: space-between;
  }
  .card-action a {
    line-height: 1;
  }
  .text {
    margin-top: 7px;
  }
  .remove {
    font-size: 28px;
    margin-right: 0 !important;
  }
  .card-image img {
    width: 80%;
    margin: 0 auto;
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
  .title{
    margin-top: 62%;
  }
  .child{
    background: #e3cc9e;
    padding: 10px 20px;
    left:296px;    
    width: 300px;
    height: 390px;    
    top:5px;
    box-shadow:0 0 4px inset #000;
  }
</style>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  name: 'HelloWorld',
  data: () => ({
    content: '',
    index:0,
    books:[],
    offset:0,
    pages:[]
  }),
  computed: {
    ...mapGetters(['user'])
  },
  methods: {
    ...mapActions(['auth']),
    remove(id) {
      axios.get(`http://127.0.0.1:8000/api/remove-book?book_id=${id}`)
      .then(res => {
        this.books.splice(this.books.findIndex(e => e.id === id),1)
      })
    }
  },
  async mounted(){
    await this.auth()
    axios.get(`http://127.0.0.1:8000/api/requests?user_id=${this.user.id}&type=book`)
    .then(res => {
      this.books = res.data
    })    
  }
}
</script>
