<template>
  <div class="row list">
    <vue-glide type="carousel">
      <vue-glide-slide v-for="(el, index) in data" :key="index">
      <div class="col s12 m12">
        <div class="card" @click.prevent="$router.push({name:'book',params:{bk:{book:el,request:el.request}}})">
          <div class="card-image">
            <img src="/images/icons8-open-book-96.png">
          </div>
          <div class="card-content">
            <h5>{{el.pages.length}} pages</h5>
          </div>
          <div class="card-action">
            <a href="" class="text">{{el.name}}</a>            
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
      <template slot="control">
        <button data-glide-dir="<">prev</button>
        <button data-glide-dir=">">next</button>
      </template>
      </vue-glide-slide>
    </vue-glide>
  </div>
  
</template>
<style scoped>
.list {
  max-width: 1000px;
  margin: 0 auto;
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
import { Glide, GlideSlide } from 'vue-glide-js'

export default {
  props: ['data'],
  components: {
    [Glide.name]: Glide,
    [GlideSlide.name]: GlideSlide
  }
}
</script>