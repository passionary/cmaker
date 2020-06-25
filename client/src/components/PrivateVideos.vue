<template>
  <div class="videos">
    <div class="row" v-if="videos.length">
      <div class="col s4 m4" v-for="(el,index) in videos" :key="index">
        <div class="card small">
          <div class="card-image">
            <video :src="'http://127.0.0.1:8000/storage/' + el.path" controls=""></video>
          </div>          
          <div class="card-action">
            <router-link :to="{name:'video-edit',params:{video:{video:el,request:el.request}}}" class="text">{{el.name}}</router-link>
            <a href="" @click.prevent="remove(el.id)" class="remove">&times;</a>
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
import { mapActions, mapGetters } from 'vuex'
export default {
  name: 'HelloWorld',
  data: () => ({
    content: '',
    index:0,
    videos:[],
    offset:0,
    pages:[]
  }),   
  methods: {
    ...mapActions(['auth']),
    remove(id) {
      axios.get(`http://127.0.0.1:8000/api/remove-video?video_id=${id}`)
      .then(res => {
        this.videos.splice(this.videos.findIndex(e => e.id === id),1)
      })
    }
  },
  computed: {
    ...mapGetters(['user'])
  },
  async mounted(){
    await this.auth()
    axios.get(`http://127.0.0.1:8000/api/requests?user_id=${this.user.id}&type=video`)
    .then(res => {
      this.videos = res.data
    })
    // for(let i=0;i<Object.keys(localStorage).length;i++){
    //   if (Object.keys(localStorage)[i] != 'loglevel:webpack-dev-server'){
    //     const keys = Object.keys(localStorage)[i].split(',')
    //     const vals = keys.map(e => e.split('='))
    //     if(vals[0][1] == 'video')
    //     this.videos.push({
    //       name:vals[1][1],
    //       content:localStorage.getItem(Object.keys(localStorage)[i])
    //     })
    //   }
    // }       
  }
}
</script>
