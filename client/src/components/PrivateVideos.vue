<template>
  <div class="videos">
    <nmessage :nmessage="nmessage" />
    <nerror :error="error" />
    <div class="row" v-if="videos.length">
      <div class="col s4 m4" v-for="(el,index) in videos" :key="index">
        <div class="card small">
          <div class="card-image">
            <video :src="'http://127.0.0.1:8000/storage/' + el.path" controls=""></video>
          </div>          
          <div class="card-action">
            <router-link :to="{name:'video-edit',params:{video:{video:el,request:el.request}}}" class="text">{{el.name}}</router-link>
            <a class="remove modal-trigger" :href="'#modal' + el.id">&times;</a>
            <div :id="'modal' + el.id" class="modal">
              <div class="modal-content">
                <h4>Are you sure ?</h4>
                <p>You now deleting the {{el.name}} video(ID:{{el.id}})</p>
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
    <div class="no-content center-align" v-else><span>no videos</span></div>  
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
import { mapActions, mapGetters, mapMutations } from 'vuex'

export default {
  name: 'HelloWorld',
  data: () => ({
    videos:[],
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
    await this.auth()
    axios.get(`http://127.0.0.1:8000/api/requests?user_id=${this.user.id}&type=video`)
    .then(res => {
      this.videos = res.data
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
