<template>
  <div class="bb-custom-wrapper">
    <nmessage :nmessage="nmessage" />
    <nerror :error="error" />
    <router-link :to="{name:'book-edit',params:{bk:$route.params.bk}}" class="edit"><i class="material-icons">edit</i><p>edit</p></router-link>
  	<h3 class="center-align">CONTENT</h3>
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
      <textarea name="request[message]" class="materialize-textarea" placeholder="Message" v-model="message">
      </textarea>
      <input type="text" name="request[author]" placeholder="Author" v-model="author">
      <input type="hidden" name="request[email]" v-model="user.email">
      <input type="hidden" name="item[name]" :value="$route.params.bk.book.name">
      <input type="text" name="item[genre]" placeholder="Genre" v-model="genre">
      <input type="hidden" name="book_id" :value="$route.params.bk && $route.params.bk.book.id">      
      <input type="text" name="item[size]" placeholder="Size" v-model="size">
      <input type="hidden" name="item[count_of_pages]" :value="books.length * 2">
      <input type="text" name="item[tags]" placeholder="Tags" v-model="tags">
      <input type="submit" class="send btn cyan">
    </form>
  </div>
</template>

<style scoped>  
  .content{
    position: absolute;
    padding: 0 20px 0 20px;
  }
  .edit {
    position: absolute;
    left:1%;
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: space-between;
    min-width: 68px;
    top: 25px;
  }
  .edit p {
    text-transform: uppercase;
    margin-top: -1px;
    font-size: 16px;
    letter-spacing: 2px;
    font-family: TitilliumWeb-LightItalic;
  }
  .edit i {
    font-size: 20px;
  }
  .bb-custom-wrapper nav a {
    background: #00bcd4;
  }
  h3 {
    margin-top: 2rem;
  }
  form {
    margin-top: 3rem;
  }
  .bb-custom-wrapper {
    min-height: 100vh;
    width:80%;
  }
  .send {
    margin-top: 20px;
  }
  #bb-bookblock {
    height: 73vh;
    margin-top: 2.5rem;
    width: 100%;
  }
  .left-content{
    width: 48%;
    left:0;
  }
  nav {
    background: none;
    box-shadow: none;
    margin-top: 3rem;
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
import { mapGetters, mapActions, mapMutations } from 'vuex'

export default {
  name: 'HelloWorld',
  data:() => ({
    email:'',
    genre:'',
    size:'',
    tags:'',
    author:'',
    message:'',
    books:[],
  }),
  computed: {
    ...mapGetters(['user','error','nmessage'])
  },
  methods:{
    ...mapActions(['auth']),
    ...mapMutations(['setError','setMessage']),
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
      fetch('http://127.0.0.1:8000/api/request', {
        method: 'POST',        
        body: new FormData(form)
      })
      .then(res => res.json())
      .then(res => {
        if(res.errors || res.errors2) {
          this.setError(Object.values(res.errors)[0] && Object.values(res.errors)[0][0] || Object.values(res.errors2)[0] && Object.values(res.errors2)[0][0])
          return
        }
        this.setMessage(res.message || "")
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
    this.bookblock();
    if(this.$route.params.bk) {
      const book = this.$route.params.bk.book;
      const request = this.$route.params.bk.request;
      for(const key in book){
        if(key in this)
        this[key] = book[key]
      }
      for(const key in request){
        if(key in this)
        this[key] = request[key]
      }      
    }
  }
}
</script>
