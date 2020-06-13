<template>
  <div class="bb-custom-wrapper h-100">    
  	<h3 class="text-center mt-3">Content</h3>
    <div class="bb-bookblock mx-auto mt-5" v-if="books.length" id="bb-bookblock">
      <div class="bb-item" v-for="(el,index) in books" :style="{backgroundColor:el.name,zIndex:Math.abs(index - books.length)}" :ref="index" :key="index">        
        <p class="content left-content">
          {{el['1'] ? el['1'].cont : ''}}
        </p>
        <p class="page">{{el['1'] ? el['1'].page : ''}}</p>
        <p class="content right-content">
          {{el['2'] ? el['2'].cont : ''}}
        </p>
        <p class="page2">{{el['2'] ? el['2'].page : ''}}</p>
      </div>
    </div>
    <h1 v-else class="text-center">No content</h1>      
    <nav>
      <a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">First page</a>
      <a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Previous</a>
      <a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Next</a>
      <a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Last page</a>
    </nav>
  </div>
</template>

<style scoped>  
  .content{
    position: absolute;
  }
  .left-content{
    width: 48%;
    left:0;
  }
  .right-content{
    width: 48%;
    left:50%;
  }    
  .page{
    position: absolute;
    bottom:2%;
    left:4%;
  }
  .page2{
    position: absolute;
    bottom:2%;
    right:4%;
  }
</style>

<script>
export default {
  name: 'HelloWorld',
  data:() => ({
  	book:'',
    content: '',
    index:0,
    books:[],
    offset:0,
    pages:[],	
  }),  
  methods:{
    initialize(){
      this.books = this.$route.params.bk;
    },
    bookblock(){
      var Page = (function() {
      
      var config = {
          $bookBlock : $( '#bb-bookblock' ),
          $navNext : $( '#bb-nav-next' ),
          $navPrev : $( '#bb-nav-prev' ),
          $navFirst : $( '#bb-nav-first' ),
          $navLast : $( '#bb-nav-last' )
        },
        init = function() {
          config.$bookBlock.bookblock( {
            speed : 800,
            shadowSides : 0.8,
            shadowFlip : 0.7
          } );
          initEvents();
        },
        initEvents = function() {
          
          var $slides = config.$bookBlock.children();

          // add navigation events
          config.$navNext.on( 'click touchstart', function() {
            config.$bookBlock.bookblock( 'next' );
            return false;
          } );

          config.$navPrev.on( 'click touchstart', function() {
            config.$bookBlock.bookblock( 'prev' );
            return false;
          } );

          config.$navFirst.on( 'click touchstart', function() {
            config.$bookBlock.bookblock( 'first' );
            return false;
          } );

          config.$navLast.on( 'click touchstart', function() {
            config.$bookBlock.bookblock( 'last' );
            return false;
          } );
          
          // add swipe events
          $slides.on( {
            'swipeleft' : function( event ) {
              config.$bookBlock.bookblock( 'next' );
              return false;
            },
            'swiperight' : function( event ) {
              config.$bookBlock.bookblock( 'prev' );
              return false;
            }
          } );

          // add keyboard events
          $( document ).keydown( function(e) {
            var keyCode = e.keyCode || e.which,
              arrow = {
                left : 37,
                up : 38,
                right : 39,
                down : 40
              };

            switch (keyCode) {
              case arrow.left:
                config.$bookBlock.bookblock( 'prev' );
                break;
              case arrow.right:
                config.$bookBlock.bookblock( 'next' );
                break;
            }
          } );
        };

        return { init : init };

    })();
    Page.init();  
    }
  },
  async mounted(){
    await this.initialize();
    this.bookblock();
  }
}
</script>
