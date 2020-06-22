<template>
  <div class="books" ref="books">
  	<button class="save btn cyan" @click="show">save</button>
  	<div class="green lighten-3" v-if="message">
  		<p class="center-align white-text">{{message}}</p>
  	</div>
    <div class="center-align materialize-red lighten-3" v-if="error">
      <span class="white-text">{{error}}</span>
    </div>
    <div class="input-field">
      <input id="name" :value="$route.params.bk.n" type="text" class="validate" placeholder="Book name" v-if="$route.params.bk && $route.params.bk.n" disabled="true">
      <input v-model="name" type="text" id="name" class="validate" placeholder="Book name" v-else>
    </div>  	
  	<div class="articles d-flex justify-content-between flex-wrap">
  		<div class="article" v-for="(list,index) in bookData" ref="article">
        <div class="input-field">
          <textarea v-if="$route.params.bk && $route.params.bk.book" id="first" class="materialize-textarea" :name="index" placeholder="left page" @change="save($event)" :value="list.left.get ? list.left.get('content') : ''"></textarea>
          <textarea id="first" class="materialize-textarea" :name="index" placeholder="left page" @change="save($event)" v-else></textarea>
        </div>
        <div class="input-field">
          <textarea v-if="$route.params.bk && $route.params.bk.book" id="second" class="materialize-textarea" :name="index" placeholder="right page" @change="save($event)" :value="list.right.get('content') ? list.right.get('content') : ''"></textarea>
          <textarea id="second" class="materialize-textarea" :name="index" placeholder="right page" @change="save($event)" v-else></textarea>
        </div>
	    </div>      
  	</div>
    <button class="adder btn cyan" @click="addPages">add pages</button>
  </div>
</template>

<style scoped>
	.adder{
    position: relative;
    margin-top: 40px;
    margin-bottom: 40px;
    left:80%;
	}
  .input-field {
    width: 89%;
    margin: 0 auto;
  }
	.articles{
		width: 80%;
    border-top: 1px solid rgba(0,0,0,0.4);
		margin: 0 auto;
    position: relative;
    margin-top: 50px;
	}
	.article{
		opacity: 0;
		transition: opacity 1.5s ease;
		width: 100%;
    margin-top: 10%;
    min-height: 200px;
    border-bottom: 1px solid rgba(0,0,0,0.4);
	}
	.appearing{
		opacity: 1;
	}
	.save{
		position: relative;
		left: 85.7%;
    top:20px;
		letter-spacing: 3px;
		text-transform: uppercase;
		font-size: 14px;
		width: 88px;
	}
</style>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  name: 'HelloWorld',
  data:() => ({
  	bookData:[],
  	lastIndex:3,
  	sendData:[],
    name:'',
    error:'',
    created:[],
  	message:'',
  	lev:false,
  	name:''  	  	
  }),
  computed: {
    ...mapGetters(['user'])
  },
  methods:{
    ...mapActions(['auth']), 
  	addPages(){
      this.bookData.push(new Map())
  		setTimeout(() => {
  			this.$refs.article[this.$refs.article.length - 1].classList.add('appearing')
  		},100)
  	},
  	save(event){      
  	 	let key = event.target.placeholder == 'left page' ? 0 : 1;
      let page      
  		this.bookData[+event.target.name].set(key,{content:event.target.value});
  	},
  	show(){  		  		  	  			  	
  		this.bookData.forEach((item,i) => {
        if(item.size) {
          let jitem = []
          jitem.push(item.get(0) || {content:""},item.get(1) || {content:""})
          this.sendData.push(jitem)
        }        
  		})
      console.log(JSON.stringify(this.sendData))
      if(this.$route.params.bk || this.created[0]) {
        axios.post('http://127.0.0.1:8000/api/save-book', {
          id:this.created[0] ? this.created[1] : this.$route.params.bk.book.id,
          pages:JSON.stringify(this.sendData)
        })
        .then(res => {
          console.log(res)
        })
        return
      }
      if(!this.name) {
        this.error = 'article must have a name'
        return
      }
      fetch('http://127.0.0.1:8000/api/create-book', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify({
          user_id: this.user.id,
          name: this.name,
          pages:JSON.stringify(this.sendData)
        })
      })
      .then(res => res.json())
      .then(data => {
        console.log(data)
        this.created[0] = true
        this.created[1] = res.data.id
      })      
      if(this.sendData.length)
      this.message = 'your book saved'
  	},
  	bookFuller(){
  		for(let i=0;i<3;i++){
	    	this.bookData.push(new Map());
	    }
  	}
  },
  async mounted(){
    await this.auth()
    if(this.$route.params.bk) {      
      this.name = this.$route.params.bk.book.name;
      this.bookData = this.$route.params.bk.book.pages.map((e,i) => new Map(
        Object.entries(e))
      )
      let pages = []
      for(let i=0;i<this.bookData.length;i++) {
        const b = this.bookData[i]
        const b2 = this.bookData[i+1]
        if(b2) {
          pages.push({
            'left': b,
            'right': b2
          })
          i++
          continue
        }
      }
      this.bookData = pages
      setTimeout(() => {
        this.$refs.article.forEach(e => e.classList.add('appearing'))
      },100)
    }
   	else {
      this.bookFuller();
      setTimeout(() => {
        this.$refs.article.forEach(e => e.classList.add('appearing'))
      },100)
    }
  }
}
</script>

<style scoped>

</style>
