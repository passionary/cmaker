<template>
  <div class="row list">
    <vue-glide :rewind="false" :bullet="true" v-model="active">
      <vue-glide-slide v-for="(el, index) in data" :key="index">
      <div class="col s12 m12">
        <slot v-bind:el="el"></slot>
      </div>
      </vue-glide-slide>
      <template slot="control">
        <button data-glide-dir="<" v-html="'<'"> </button>
        <button data-glide-dir=">" v-html="'>'"></button>
      </template>
    </vue-glide>
  </div>
  
</template>
<style scoped>
.list {
  max-width: 1000px;
  margin: 0 auto;
}
</style>
<script>
import { Glide, GlideSlide } from 'vue-glide-js'

export default {
  props: ['data'],
  components: {
    [Glide.name]: Glide,
    [GlideSlide.name]: GlideSlide
  },
  data() {
    return {
      active: 0
    }
  }
}
</script>