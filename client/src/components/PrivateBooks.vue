<template>
  <div class="books">
    <nmessage :nmessage="nmessage" />
    <nerror :error="error" />
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
            <a class="remove modal-trigger" :href="'#modal' + el.id">&times;</a>
            <div :id="'modal' + el.id" class="modal">
              <div class="modal-content">
                <h4>Are you sure ?</h4>
                <p>You now deleting the {{el.name}} book(ID:{{el.id}})</p>
              </div>
              <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">CLOSE</a>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat" @click="remove(el.id)">DELETE</a>
              </div>
            </div>
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
import { mapActions, mapGetters, mapMutations } from 'vuex'

export default {
  name: 'HelloWorld',
  data: () => ({
    books:[],
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
  async mounted(){
    await this.auth()
    axios.get(`http://127.0.0.1:8000/api/requests?user_id=${this.user.id}&type=book`)
    .then(res => {
      this.books = res.data
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
