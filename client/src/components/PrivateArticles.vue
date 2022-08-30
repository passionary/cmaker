<template>
  <div class="articles">
    <nmessage :nmessage="nmessage" />
    <nerror :error="error" />
    <Loader class="no-content center-align" v-if="loading" />
    <List :data="articles" v-else-if="articles.length">
      <template v-slot:default="props">
        <div class="card">
          <div class="card-image">
            <img src="/images/icons8-edit-file-80.png">
          </div>
          <div class="card-content">
            <h5 class="">{{props.el.content ? props.el.content.slice(0,15) : ""}}</h5>
          </div>
          <div class="card-action">
            <a href="" @click.prevent="$router.push({name:'article-edit',params:{art:{article:props.el,request:props.el.request}}})">{{props.el.name}}</a>
            <a class="remove modal-trigger" :href="'#modal' + props.el.id">&times;</a>
            <div :id="'modal' + props.el.id" class="modal">
              <div class="modal-content">
                <h4>Are you sure ?</h4>
                <p>You now deleting the {{props.el.name}} article(ID:{{props.el.id}})</p>
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
  .articles{
    position: relative;
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
    width: 45%;
    margin: 0 auto;
    padding-top: 50px;
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
import { mapActions, mapGetters, mapMutations } from 'vuex'
export default {
  name: 'HelloWorld',
  components: {
    Loader
  },
  data: () => ({
    articles:[],
    loading: false
  }),
  computed: {
    ...mapGetters(['user','error','nmessage'])
  },
  methods: {
    ...mapActions(['auth']),
    ...mapMutations(['setError','setMessage']),
    remove(id) {
      axios.get(`http://127.0.0.1:8000/api/remove-article?article_id=${id}`)
      .then(res => {
        this.articles.splice(this.articles.findIndex(e => e.id === id),1)
      })
    }
  },
  async mounted(){
    this.loading = true;

    await this.auth()
    axios.get(`http://127.0.0.1:8000/api/requests?user_id=${this.user.id}&type=article`)
    .then(res => {
      this.articles = res.data;
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
