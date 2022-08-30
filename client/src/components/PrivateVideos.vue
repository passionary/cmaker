<template>
  <div class="videos">
    <nmessage :nmessage="nmessage" />
    <nerror :error="error" />
    <Loader class="no-content center-align" v-if="loading" />
    <List :data="videos" v-else-if="videos.length">
      <template v-slot:default="props">
        <div class="card small">
          <div class="card-image">
            <video :src="'http://127.0.0.1:8000/storage/' + props.el.path" controls=""></video>
          </div>          
          <div class="card-action">
            <router-link :to="{name:'video-edit',params:{video:{video:props.el,request:props.el.request}}}" class="text">{{props.el.name}}</router-link>
            <a class="remove modal-trigger" :href="'#modal' + props.el.id">&times;</a>
            <div :id="'modal' + props.el.id" class="modal">
              <div class="modal-content">
                <h4>Are you sure ?</h4>
                <p>You now deleting the {{props.el.name}} video(ID:{{props.el.id}})</p>
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
  .videos{
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
  .card-image video {
    width: 100%;
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
    videos:[],
    loading: false
  }),   
  methods: {
    ...mapActions(['auth']),
    ...mapMutations(['setError','setMessage']),
    remove(id) {
      axios.get(`http://127.0.0.1:8000/api/remove-video?video_id=${id}`)
      .then(res => {
        if(res.data.errors || res.data.errors2) {
          this.setError(Object.values(res.data.errors)[0] && Object.values(res.data.errors)[0][0] || Object.values(res.data.errors2)[0] && Object.values(res.data.errors2)[0][0])
          return
        }
        this.setMessage(res.data.message || '')
        this.videos.splice(this.videos.findIndex(e => e.id === id),1)
      })
    }
  },
  computed: {
    ...mapGetters(['user','error','nmessage'])
  },
  async mounted(){
    this.loading = true;

    await this.auth()
    axios.get(`http://127.0.0.1:8000/api/requests?user_id=${this.user.id}&type=video`)
    .then(res => {
      this.videos = res.data;
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
