<template>
  <div class="bb-custom-wrapper">
    <div class="green lighten-3" v-if="message">
      <p class="center-align white-text">{{message}}</p>
    </div>
    <div v-else-if="error" class="materialize-red lighten-3">
      <p class="center-align white-text">{{error}}</p>
    </div>
    <router-link :to="{name:'book-edit',params:{bk:$route.params.bk}}">edit book</router-link>
  	<h3 class="center-align">Content</h3>
    <div class="bb-bookblock" v-if="books.length" id="bb-bookblock">
      <div class="bb-item" v-for="(el,index) in books" :style="{backgroundColor:el.name,zIndex:Math.abs(index - books.length)}" :ref="index" :key="index">        
        <p class="content left-content">
          {{el['left'] && el['left'].content}}
        </p>
        <p class="page">{{el['left'] && el['left'].order_id}}</p>
        <p class="content right-content">
          {{el['right'] && el['right'].content}}
        </p>
        <p class="page2">{{el['right'] && el['right'].order_id}}</p>
      </div>
    </div>
    <h1 v-else class="text-center">No content</h1>      
    <nav>
      <a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">First page</a>
      <a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Previous</a>
      <a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Next</a>
      <a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Last page</a>
    </nav>
    <form action="http://127.0.0.1:8000/api/request" id="form" method="post" @submit.prevent="submitHandler">
      <input type="hidden" name="request[type]" value="book">
      <textarea name="request[message]" class="materialize-textarea" placeholder="Message">
      </textarea>
      <input type="text" name="request[author]" placeholder="Author">
      <input type="hidden" name="request[email]" v-model="user.email">
      <input type="hidden" name="request[user_id]" v-model="user.id">
      <input type="hidden" name="item[name]" :value="$route.params.bk.n">
      <input type="text" name="item[genre]" placeholder="Genre">
      <input type="hidden" name="item[content]" :value="JSON.stringify(books)">
      <input type="text" name="item[size]" placeholder="Size">
      <input type="hidden" name="item[count_of_pages]" :value="books.length * 2">
      <input type="text" name="item[tags]" placeholder="Tags">
      <input type="submit" class="send btn cyan">
    </form>
  </div>
</template>

<style scoped>  
  .content{
    position: absolute;
  }
  .bb-custom-wrapper {
    min-height: 100vh;
  }
  #bb-bookblock {
    height: 100vh;
  }
  .left-content{
    width: 48%;
    left:0;
  }
  nav {
    background: none;
    box-shadow: none;
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
import { mapGetters, mapActions } from 'vuex'

export default {
  name: 'HelloWorld',
  data:() => ({
  	book:'',
    error:'',
    email:'',
    content: '',
    message:'',
    index:0,
    books:[],
    offset:0,
    pages:[],	
  }),
  computed: {
    ...mapGetters(['user'])
  },
  methods:{
    ...mapActions(['auth']),
    initialize(){
      this.books = this.$route.params.bk.book.pages;
      let pages = []
      for(let i=0;i<this.books.length;i++) {
        const b = this.books[i]
        const b2 = this.books[i+1]
        if(b2) {
          pages.push({
            'left': {...b},
            'right': {...b2}
          })
          i++
          continue
        }
      }
      this.books = pages
    },
    submitHandler() {
      axios.post('http://127.0.0.1:8000/api/request',new FormData(form))
      .then(res => {
        this.message = res.data.message
      })
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
    await this.auth()    
    await this.initialize();
    console.log(this.books)
    this.bookblock();
  }
}
</script>
