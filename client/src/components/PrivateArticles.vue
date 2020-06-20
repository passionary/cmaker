<template>
  <div class="articles h-75">
    <div class="row" v-if="articles.length">
      <div class="col s4 m4" v-for="(el,index) in articles" :key="index">
        <div class="card medium">
          <div class="card-image">
            <img src="/images/icons8-edit-file-80.png">
          </div>
          <div class="card-content">
            <h5 class="">{{el.content.slice(0,15)}}</h5>
          </div>
          <div class="card-action">
            <a href="" @click.prevent="$router.push({name:'article-edit',params:{art:{n:el.name,c:el.content}}})">{{el.name}}</a>
            <a href="" @click.prevent="remove(el)" class="remove">&times;</a>
          </div>
        </div>
      </div>
    </div>
    <div class="no-content center-align" v-else><span>no articles</span></div>
  </div>
</template>

<style scoped>  
  .articles{
    position: relative;
    padding: 0 20px 0 20px;
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
    width: 50%;
    margin: 0 auto;
    margin-top: 64px;
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
export default {
  name: 'HelloWorld',
  data: () => ({
    content: '',
    index:0,
    articles:[],
    offset:0,
    pages:[]
  }),   
  methods: {
    remove(el) {
      const article = Object.keys(localStorage).filter(e => /type=article/.test(e)).find(e => e.match(new RegExp(`name=${el.name}`)))
      this.articles.splice(this.articles.findIndex(e => e.name === el.name),1)
      localStorage.removeItem(article)
    }
  },
  mounted(){        
    for(let i=0;i<Object.keys(localStorage).length;i++){
      if (Object.keys(localStorage)[i] != 'loglevel:webpack-dev-server'){
        const keys = Object.keys(localStorage)[i].split(',')
        const vals = keys.map(e => e.split('='))
        if(vals[0][1] == 'article')
        this.articles.push({
          name:vals[1][1],
          content:localStorage.getItem(Object.keys(localStorage)[i])
        })
      }      
    }       
  }
}
</script>
