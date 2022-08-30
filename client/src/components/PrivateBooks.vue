<template>
  <div class="books">
    <nmessage :nmessage="nmessage" />
    <nerror :error="error" />
    <Loader class="no-content center-align" v-if="loading" />
    <List :data="books" v-else-if="books.length">
      <template v-slot:default="props">
        <div class="card">
          <div class="card-image">
            <img src="/images/icons8-open-book-96.png">
          </div>
          <div class="card-content">
            <h5>
              <a class="title" href="" @click.prevent="$router.push({name:'book',params:{bk:{book:props.el,request:props.el.request}}})">{{props.el.name}}</a>
            </h5>
          </div>
          <div class="card-action">
            <div class="text pages">{{props.el.pages.length}} pages</div>
            <div class="text"><a class="remove modal-trigger" :href="'#modal' + props.el.id">&times;</a></div>
            <div :id="'modal' + props.el.id" class="modal">
              <div class="modal-content">
                <h4>Are you sure ?</h4>
                <p>You now deleting the {{props.el.name}} book(ID:{{props.el.id}})</p>
              </div>
              <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">CLOSE</a>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat" @click="remove(props.el.id)">DELETE</a>
              </div>
            </div>
          </div>
        </div>
      </template>
    </List>
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
.pages {
  font-family: AlegreyaSans-Thin;
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
    font-size: 20px;
  }
  .remove {
    font-size: 28px;
    margin-right: 0 !important;
  }
  .card-image img {
    width: 80%;
    margin: 0 auto;
  }
  .title{
    font-family: Brich;
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
